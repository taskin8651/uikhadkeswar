<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutWhyItem;
use App\Models\CompanyRecognition;
use App\Models\FounderSection;
use App\Models\FounderResponsibility;
use App\Models\FounderTimeline;

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

    $founderTimelines = FounderTimeline::query()
        ->where('status', true)
        ->orderBy('sort_order')
        ->orderBy('id')
        ->get();

       


    return view('frontend.founders-journey', compact(
        'founderSection',
        'founderResponsibilities',
        'founderTimelines',
         
    ));
}

    public function academy()
    {
        $aboutWhyItems = AboutWhyItem::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->take(6)
            ->get();

        return view('frontend.about-academy', compact('aboutWhyItems'));
    }

    public function company()
    {
        $companyRecognitions = CompanyRecognition::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.company-information', compact('companyRecognitions'));
    }
}
