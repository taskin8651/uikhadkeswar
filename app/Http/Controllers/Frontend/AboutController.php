<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FounderSection;
use App\Models\FounderResponsibility;

class AboutController extends Controller
{
    public function index()
    {
        $founderSection = FounderSection::query()
            ->where('status', true)
            ->first();

        $founderResponsibilities = FounderResponsibility::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->take(6)
            ->get();

        return view('frontend.about', compact(
            'founderSection',
            'founderResponsibilities'
        ));
    }
}