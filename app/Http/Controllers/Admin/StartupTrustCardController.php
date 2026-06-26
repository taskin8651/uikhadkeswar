<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StartupTrustCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StartupTrustCardController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('startup_trust_card_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cards = StartupTrustCard::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.startup-trust-cards.index', compact('cards'));
    }

    public function create()
    {
        abort_if(Gate::denies('startup_trust_card_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.startup-trust-cards.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('startup_trust_card_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validatedData($request);
        $data['status'] = $request->boolean('status');
        StartupTrustCard::create($data);

        return redirect()->route('admin.startup-trust-cards.index')->with('message', 'Startup trust card created successfully.');
    }

    public function edit(StartupTrustCard $startupTrustCard)
    {
        abort_if(Gate::denies('startup_trust_card_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.startup-trust-cards.edit', ['card' => $startupTrustCard]);
    }

    public function update(Request $request, StartupTrustCard $startupTrustCard)
    {
        abort_if(Gate::denies('startup_trust_card_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validatedData($request);
        $data['status'] = $request->boolean('status');
        $startupTrustCard->update($data);

        return redirect()->route('admin.startup-trust-cards.index')->with('message', 'Startup trust card updated successfully.');
    }

    public function destroy(StartupTrustCard $startupTrustCard)
    {
        abort_if(Gate::denies('startup_trust_card_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $startupTrustCard->delete();

        return redirect()->route('admin.startup-trust-cards.index')->with('message', 'Startup trust card deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:100'],
            'footer_icon' => ['nullable', 'string', 'max:100'],
            'footer_text' => ['nullable', 'string'],
            'color_class' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['nullable', 'boolean'],
        ]);
    }
}
