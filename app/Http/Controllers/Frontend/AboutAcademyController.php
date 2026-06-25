<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutPageContent;
use App\Models\AboutWhyItem;

class AboutAcademyController extends Controller
{
    public function index()
    {
        $aboutPageContent = AboutPageContent::query()
            ->where('status', true)
            ->first();

        $aboutWhyItems = AboutWhyItem::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->take(6)
            ->get();

        return view('frontend.about-academy', compact(
            'aboutPageContent',
            'aboutWhyItems'
        ));
    }
}