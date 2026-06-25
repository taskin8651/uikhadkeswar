<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FounderSection;
use Illuminate\Http\Request;

class FounderSectionController extends Controller
{
    public function edit()
    {
        $founderSection = FounderSection::query()->firstOrCreate(
            ['id' => 1],
            [
                'image_alt' => 'Dr. Vitthal Nagare Founder of Khadkeshwar NEET JEE Academy',
                'founder_name' => 'Dr. Vitthal Nagare',
                'qualification' => 'M.A., M.Phil., Ph.D. in Economics',
                'designation' => 'Founder & Managing Director',
                'hero_title' => 'A Rural Education Vision Led by',
                'hero_highlight_text' => 'Dr. Vitthal Nagare',
                'hero_description' => 'A mission-driven leadership journey focused on affordable NEET/JEE coaching, rural student empowerment, personal mentorship, scholarship support and future AI-powered learning.',
                'education_value' => 'Ph.D. in Economics',
                'designation_value' => 'Founder & Managing Director',
                'company_value' => 'Khadkeshwar Development Services Pvt Ltd',
                'location_value' => 'Lonar, Maharashtra',
                'status' => true,
            ]
        );

        return view('admin.founder-section.edit', compact('founderSection'));
    }

    public function update(Request $request)
    {
        $founderSection = FounderSection::query()->firstOrCreate(['id' => 1]);

        $data = $request->validate([
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:6048'],
            'image_alt' => ['nullable', 'string', 'max:255'],

            'founder_name' => ['required', 'string', 'max:255'],
            'qualification' => ['nullable', 'string', 'max:255'],
            'designation' => ['nullable', 'string', 'max:255'],

            'hero_title' => ['required', 'string', 'max:255'],
            'hero_highlight_text' => ['required', 'string', 'max:255'],
            'hero_description' => ['nullable', 'string'],

            'education_value' => ['nullable', 'string', 'max:255'],
            'designation_value' => ['nullable', 'string', 'max:255'],
            'company_value' => ['nullable', 'string', 'max:255'],
            'location_value' => ['nullable', 'string', 'max:255'],

            'status' => ['nullable', 'boolean'],
        ]);

        $data['status'] = $request->boolean('status');

        unset($data['image']);

        $founderSection->update($data);

        if ($request->hasFile('image')) {
            $founderSection
                ->addMediaFromRequest('image')
                ->toMediaCollection('founder_image');
        }

        return redirect()
            ->route('admin.founder-section.edit')
            ->with('message', 'Founder section updated successfully.');
    }
}