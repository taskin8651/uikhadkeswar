<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class GalleryItemController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gallery_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $galleryItems = GalleryItem::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.gallery-items.index', compact('galleryItems'));
    }

    public function create()
    {
        abort_if(Gate::denies('gallery_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = GalleryCategory::query()->where('status', true)->orderBy('sort_order')->get();

        return view('admin.gallery-items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('gallery_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validatedData($request);
        $data['category_slugs'] = implode(' ', $request->input('category_slugs', []));
        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        unset($data['media_file'], $data['thumbnail_file']);

        $galleryItem = GalleryItem::create($data);
        $this->syncMedia($request, $galleryItem);

        return redirect()->route('admin.gallery-items.index')->with('message', 'Gallery item created successfully.');
    }

    public function edit(GalleryItem $galleryItem)
    {
        abort_if(Gate::denies('gallery_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = GalleryCategory::query()->where('status', true)->orderBy('sort_order')->get();

        return view('admin.gallery-items.edit', compact('galleryItem', 'categories'));
    }

    public function update(Request $request, GalleryItem $galleryItem)
    {
        abort_if(Gate::denies('gallery_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validatedData($request);
        $data['category_slugs'] = implode(' ', $request->input('category_slugs', []));
        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        unset($data['media_file'], $data['thumbnail_file']);

        $galleryItem->update($data);
        $this->syncMedia($request, $galleryItem);

        return redirect()->route('admin.gallery-items.index')->with('message', 'Gallery item updated successfully.');
    }

    public function destroy(GalleryItem $galleryItem)
    {
        abort_if(Gate::denies('gallery_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $galleryItem->delete();

        return redirect()->route('admin.gallery-items.index')->with('message', 'Gallery item deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'label' => ['nullable', 'string', 'max:100'],
            'alt_text' => ['nullable', 'string', 'max:255'],
            'media_type' => ['required', 'in:image,video,youtube'],
            'source_url' => ['nullable', 'string', 'max:500'],
            'thumbnail_url' => ['nullable', 'string', 'max:500'],
            'category_slugs' => ['nullable', 'array'],
            'category_slugs.*' => ['string', 'max:100'],
            'layout' => ['nullable', 'in:normal,tall,wide'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['nullable', 'boolean'],
            'media_file' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,mp4', 'max:10240'],
            'thumbnail_file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);
    }

    private function syncMedia(Request $request, GalleryItem $galleryItem): void
    {
        if ($request->hasFile('media_file')) {
            $galleryItem->addMediaFromRequest('media_file')->toMediaCollection('gallery_media');
        }

        if ($request->hasFile('thumbnail_file')) {
            $galleryItem->addMediaFromRequest('thumbnail_file')->toMediaCollection('gallery_thumbnail');
        }
    }
}
