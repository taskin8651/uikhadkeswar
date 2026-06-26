<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResourceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ResourceItemController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('resource_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resourceItems = ResourceItem::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.resource-items.index', compact('resourceItems'));
    }

    public function create()
    {
        abort_if(Gate::denies('resource_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $frontendRoutes = ResourceItem::frontendRoutes();

        return view('admin.resource-items.create', compact('frontendRoutes'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('resource_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validatedData($request);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $resourceItem = ResourceItem::create($data);

        if ($request->hasFile('resource_file')) {
            $resourceItem->addMediaFromRequest('resource_file')->toMediaCollection('resource_file');
        }

        return redirect()->route('admin.resource-items.index')->with('message', 'Resource item created successfully.');
    }

    public function edit(ResourceItem $resourceItem)
    {
        abort_if(Gate::denies('resource_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $frontendRoutes = ResourceItem::frontendRoutes();

        return view('admin.resource-items.edit', compact('resourceItem', 'frontendRoutes'));
    }

    public function update(Request $request, ResourceItem $resourceItem)
    {
        abort_if(Gate::denies('resource_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validatedData($request);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $resourceItem->update($data);

        if ($request->hasFile('resource_file')) {
            $resourceItem->addMediaFromRequest('resource_file')->toMediaCollection('resource_file');
        }

        return redirect()->route('admin.resource-items.index')->with('message', 'Resource item updated successfully.');
    }

    public function destroy(ResourceItem $resourceItem)
    {
        abort_if(Gate::denies('resource_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resourceItem->delete();

        return redirect()->route('admin.resource-items.index')->with('message', 'Resource item deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'category_slugs' => ['nullable', 'string', 'max:255'],
            'badge_text' => ['nullable', 'string', 'max:100'],
            'icon' => ['nullable', 'string', 'max:100'],
            'meta_one_icon' => ['nullable', 'string', 'max:100'],
            'meta_one_text' => ['nullable', 'string', 'max:100'],
            'meta_two_icon' => ['nullable', 'string', 'max:100'],
            'meta_two_text' => ['nullable', 'string', 'max:100'],
            'button_text' => ['nullable', 'string', 'max:100'],
            'button_icon' => ['nullable', 'string', 'max:100'],
            'link_type' => ['required', 'in:route,custom,file'],
            'route_name' => ['nullable', 'string', 'max:150'],
            'custom_url' => ['nullable', 'string', 'max:255'],
            'resource_file' => ['nullable', 'file', 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,webp,zip', 'max:10240'],
            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['nullable', 'boolean'],
        ]);
    }
}
