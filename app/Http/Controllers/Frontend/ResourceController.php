<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ResourceItem;

class ResourceController extends Controller
{
    public function index()
    {
        $resourceItems = ResourceItem::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.resources', compact('resourceItems'));
    }
}
