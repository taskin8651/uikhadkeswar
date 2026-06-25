<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FounderResponsibility;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FounderResponsibilityController extends Controller
{
    public function index()
    {
        $responsibilities = FounderResponsibility::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.founder-responsibilities.index', compact('responsibilities'));
    }

    public function create()
    {
        return view('admin.founder-responsibilities.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['nullable', 'boolean'],
        ]);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        FounderResponsibility::create($data);

        return redirect()
            ->route('admin.founder-responsibilities.index')
            ->with('message', 'Founder responsibility created successfully.');
    }

    public function edit(FounderResponsibility $founderResponsibility)
    {
        return view('admin.founder-responsibilities.edit', compact('founderResponsibility'));
    }

    public function update(Request $request, FounderResponsibility $founderResponsibility)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['nullable', 'boolean'],
        ]);

        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $founderResponsibility->update($data);

        return redirect()
            ->route('admin.founder-responsibilities.index')
            ->with('message', 'Founder responsibility updated successfully.');
    }

    public function destroy(FounderResponsibility $founderResponsibility)
    {
        $founderResponsibility->delete();

        return redirect()
            ->route('admin.founder-responsibilities.index')
            ->with('message', 'Founder responsibility deleted successfully.');
    }

    public function show(FounderResponsibility $founderResponsibility)
    {
        abort_if(Gate::denies('founder_responsibility_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.founder-responsibilities.show', compact('founderResponsibility'));
    }
}
