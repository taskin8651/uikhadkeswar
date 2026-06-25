<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FounderSection;

class AboutController extends Controller
{
    public function index()
    {
        $founderSection = FounderSection::query()
            ->where('status', true)
            ->first();

        return view('frontend.founders-journey', compact('founderSection'));
    }
}