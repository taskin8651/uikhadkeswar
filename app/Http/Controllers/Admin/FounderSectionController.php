<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FounderSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class FounderSectionController extends Controller
{
    public function edit()
    {
        abort_if(Gate::denies('founder_section_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

                'story_title' => 'A mission to bridge the education gap for rural students.',
                'story_description' => '<p>Dr. Vitthal Nagare started Khadkeshwar Development Services Pvt Ltd with a clear vision to help rural students who often struggle due to lack of affordable coaching, digital access, expert guidance and structured academic mentorship.</p><p>Coming from a rural background, he understood that many talented students do not fail because of lack of ability, but because of lack of guidance, confidence, exposure and a disciplined preparation environment.</p><p>Through Khadkeshwar NEET JEE Academy, his goal is to create a premium yet affordable learning ecosystem where students can prepare for NEET, JEE and Foundation courses with personal mentoring, regular tests, revision support, scholarships and future AI-enabled progress tracking.</p>',
                'quote_text' => 'My mission is simple — empower every rural student with quality education, technology and the right guidance to build a better tomorrow.',
                'quote_author' => 'Dr. Vitthal Nagare',

                'status' => true,
            ]
        );

        return view('admin.founder-section.edit', compact('founderSection'));
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('founder_section_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $founderSection = FounderSection::query()->firstOrCreate(['id' => 1]);

        $data = $request->validate([
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'image_alt' => [
                'nullable',
                'string',
                'max:255',
            ],

            'founder_name' => [
                'required',
                'string',
                'max:255',
            ],

            'qualification' => [
                'nullable',
                'string',
                'max:255',
            ],

            'designation' => [
                'nullable',
                'string',
                'max:255',
            ],

            'hero_title' => [
                'required',
                'string',
                'max:255',
            ],

            'hero_highlight_text' => [
                'required',
                'string',
                'max:255',
            ],

            'hero_description' => [
                'nullable',
                'string',
            ],

            'education_value' => [
                'nullable',
                'string',
                'max:255',
            ],

            'designation_value' => [
                'nullable',
                'string',
                'max:255',
            ],

            'company_value' => [
                'nullable',
                'string',
                'max:255',
            ],

            'location_value' => [
                'nullable',
                'string',
                'max:255',
            ],

            'story_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'story_description' => [
                'nullable',
                'string',
            ],

            'quote_text' => [
                'nullable',
                'string',
            ],

            'quote_author' => [
                'nullable',
                'string',
                'max:255',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],
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