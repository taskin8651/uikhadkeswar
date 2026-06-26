<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KeyPointTrustCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class KeyPointTrustCardController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('key_point_trust_card_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cards = KeyPointTrustCard::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.key-point-trust-cards.index', compact('cards'));
    }

    public function create()
    {
        abort_if(Gate::denies('key_point_trust_card_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.key-point-trust-cards.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('key_point_trust_card_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validatedData($request);
        $data['status'] = $request->boolean('status');
        KeyPointTrustCard::create($data);

        return redirect()->route('admin.key-point-trust-cards.index')->with('message', 'Parent trust card created successfully.');
    }

    public function edit(KeyPointTrustCard $keyPointTrustCard)
    {
        abort_if(Gate::denies('key_point_trust_card_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.key-point-trust-cards.edit', ['card' => $keyPointTrustCard]);
    }

    public function update(Request $request, KeyPointTrustCard $keyPointTrustCard)
    {
        abort_if(Gate::denies('key_point_trust_card_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validatedData($request);
        $data['status'] = $request->boolean('status');
        $keyPointTrustCard->update($data);

        return redirect()->route('admin.key-point-trust-cards.index')->with('message', 'Parent trust card updated successfully.');
    }

    public function destroy(KeyPointTrustCard $keyPointTrustCard)
    {
        abort_if(Gate::denies('key_point_trust_card_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keyPointTrustCard->delete();

        return redirect()->route('admin.key-point-trust-cards.index')->with('message', 'Parent trust card deleted successfully.');
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
