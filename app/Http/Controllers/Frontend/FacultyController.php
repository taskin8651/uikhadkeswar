<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FacultyMember;

class FacultyController extends Controller
{
    public function index()
    {
        $facultyMembers = FacultyMember::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.faculty', compact('facultyMembers'));
    }
}
