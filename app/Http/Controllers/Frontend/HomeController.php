<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HomeHeroSetting;
use App\Models\KeyPointTrustCard;
use App\Models\StartupTrustCard;
use App\Models\FacultyMember;
use App\Models\FounderSection;
use App\Models\FounderTimeline;
use App\Models\AboutWhyItem;
use App\Models\GalleryItem;
use App\Models\ResultTestimonial;

class HomeController extends Controller
{
    public function index()
    {
        $homeHero = HomeHeroSetting::current();

        $startupTrustCards = StartupTrustCard::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $keyPointTrustCards = KeyPointTrustCard::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $facultyMembers = FacultyMember::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->take(4)
            ->get();

        $founderSection = FounderSection::query()
            ->where('status', true)
            ->first();

        $founderTimelines = FounderTimeline::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
            $aboutWhyItems = AboutWhyItem::query()
    ->where('status', true)
    ->orderBy('sort_order')
    ->orderBy('id')
    ->take(6)
    ->get();

    $photoGalleryItems = GalleryItem::query()
            ->where('status', true)
            ->where('media_type', 'image')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $videoGalleryItems = GalleryItem::query()
            ->where('status', true)
            ->whereIn('media_type', ['video', 'youtube'])
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
            $resultTestimonials = ResultTestimonial::query()
    ->where('status', true)
    ->orderBy('sort_order')
    ->orderBy('id')
    ->take(6)
    ->get();

        return view('frontend.index', compact(
            'homeHero',
            'startupTrustCards',
            'keyPointTrustCards',
            'facultyMembers',
            'founderSection',
            'founderTimelines',
             'aboutWhyItems',
              'photoGalleryItems',
            'videoGalleryItems',
             'resultTestimonials'
        ));
    }
}