<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use App\Models\GalleryItem;

class GalleryController extends Controller
{
    public function index()
    {
        $galleryCategories = GalleryCategory::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $galleryItems = GalleryItem::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.gallery', compact('galleryCategories', 'galleryItems'));
    }
}
