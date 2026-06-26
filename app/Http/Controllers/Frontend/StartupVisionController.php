<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\StartupCard;

class StartupVisionController extends Controller
{
    public function index()
    {
        $startupOverviewCards = StartupCard::query()
            ->where('section', 'overview')
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $startupRoadmapCards = StartupCard::query()
            ->where('section', 'roadmap')
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.startup-vision', compact('startupOverviewCards', 'startupRoadmapCards'));
    }
}
