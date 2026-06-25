<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutWhyItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AboutWhyItemController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('about_why_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $whyItems = AboutWhyItem::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.about-why-items.index', compact('whyItems'));
    }

    public function create()
    {
        abort_if(Gate::denies('about_why_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.about-why-items.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('about_why_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validatedData($request);
        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        AboutWhyItem::create($data);

        return redirect()
            ->route('admin.about-why-items.index')
            ->with('message', 'Why choose item created successfully.');
    }

    public function show(AboutWhyItem $aboutWhyItem)
    {
        abort_if(Gate::denies('about_why_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.about-why-items.show', compact('aboutWhyItem'));
    }

    public function edit(AboutWhyItem $aboutWhyItem)
    {
        abort_if(Gate::denies('about_why_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.about-why-items.edit', compact('aboutWhyItem'));
    }

    public function update(Request $request, AboutWhyItem $aboutWhyItem)
    {
        abort_if(Gate::denies('about_why_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validatedData($request);
        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $aboutWhyItem->update($data);

        return redirect()
            ->route('admin.about-why-items.index')
            ->with('message', 'Why choose item updated successfully.');
    }

    public function destroy(AboutWhyItem $aboutWhyItem)
    {
        abort_if(Gate::denies('about_why_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aboutWhyItem->delete();

        return redirect()
            ->route('admin.about-why-items.index')
            ->with('message', 'Why choose item deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['nullable', 'boolean'],
        ]);
    }
}
