<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HomeHeroSetting;
use App\Models\KeyPointTrustCard;
use App\Models\StartupTrustCard;

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

        return view('frontend.index', compact('homeHero', 'startupTrustCards', 'keyPointTrustCards'));
    }
}
