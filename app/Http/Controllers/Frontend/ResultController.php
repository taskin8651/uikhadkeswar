<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ResultRanker;

class ResultController extends Controller
{
    public function index()
    {
        $resultRankers = ResultRanker::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.results', compact('resultRankers'));
    }
}
