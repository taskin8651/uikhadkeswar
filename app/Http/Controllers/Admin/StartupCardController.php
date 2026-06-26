<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StartupCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StartupCardController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('startup_card_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $startupCards = StartupCard::query()
            ->orderBy('section')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.startup-cards.index', compact('startupCards'));
    }

    public function create()
    {
        abort_if(Gate::denies('startup_card_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.startup-cards.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('startup_card_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validatedData($request);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        StartupCard::create($data);

        return redirect()->route('admin.startup-cards.index')->with('message', 'Startup card created successfully.');
    }

    public function edit(StartupCard $startupCard)
    {
        abort_if(Gate::denies('startup_card_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.startup-cards.edit', compact('startupCard'));
    }

    public function update(Request $request, StartupCard $startupCard)
    {
        abort_if(Gate::denies('startup_card_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validatedData($request);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $startupCard->update($data);

        return redirect()->route('admin.startup-cards.index')->with('message', 'Startup card updated successfully.');
    }

    public function destroy(StartupCard $startupCard)
    {
        abort_if(Gate::denies('startup_card_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $startupCard->delete();

        return redirect()->route('admin.startup-cards.index')->with('message', 'Startup card deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'section' => ['required', 'in:overview,roadmap'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:100'],
            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['nullable', 'boolean'],
        ]);
    }
}
