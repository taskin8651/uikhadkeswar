<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AboutPageContentController extends Controller
{
    public function edit()
    {
        abort_if(Gate::denies('about_page_content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aboutPageContent = AboutPageContent::query()->firstOrCreate(
            ['id' => 1],
            $this->defaultData()
        );

        return view('admin.about-page-content.edit', compact('aboutPageContent'));
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('about_page_content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aboutPageContent = AboutPageContent::query()->firstOrCreate(
            ['id' => 1],
            $this->defaultData()
        );

        $data = $request->validate($this->rules());

        $data['status'] = $request->boolean('status');

        unset($data['hero_image']);

        $aboutPageContent->update($data);

        if ($request->hasFile('hero_image')) {
            $aboutPageContent
                ->addMediaFromRequest('hero_image')
                ->toMediaCollection('about_hero_image');
        }

        return redirect()
            ->route('admin.about-page-content.edit')
            ->with('message', 'About page content updated successfully.');
    }

    private function rules(): array
    {
        return [
            'hero_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            'hero_title' => ['nullable', 'string', 'max:255'],
            'hero_highlight_text' => ['nullable', 'string', 'max:255'],
            'hero_description' => ['nullable', 'string'],
            'hero_tag_one' => ['nullable', 'string', 'max:100'],
            'hero_tag_two' => ['nullable', 'string', 'max:100'],
            'hero_tag_three' => ['nullable', 'string', 'max:100'],
            'hero_tag_four' => ['nullable', 'string', 'max:100'],
            'hero_image_alt' => ['nullable', 'string', 'max:255'],
            'hero_focus_label' => ['nullable', 'string', 'max:100'],
            'hero_focus_title' => ['nullable', 'string', 'max:255'],
            'hero_focus_description' => ['nullable', 'string'],
            'hero_stat_one_value' => ['nullable', 'string', 'max:100'],
            'hero_stat_one_label' => ['nullable', 'string', 'max:100'],
            'hero_stat_two_value' => ['nullable', 'string', 'max:100'],
            'hero_stat_two_label' => ['nullable', 'string', 'max:100'],

            'intro_heading' => ['nullable', 'string', 'max:255'],
            'intro_description' => ['nullable', 'string'],
            'intro_card_title' => ['nullable', 'string', 'max:255'],
            'intro_card_description' => ['nullable', 'string'],
            'intro_quote_text' => ['nullable', 'string'],
            'intro_quote_author' => ['nullable', 'string', 'max:255'],

            'intro_core_one_title' => ['nullable', 'string', 'max:255'],
            'intro_core_one_description' => ['nullable', 'string'],
            'intro_core_two_title' => ['nullable', 'string', 'max:255'],
            'intro_core_two_description' => ['nullable', 'string'],
            'intro_core_three_title' => ['nullable', 'string', 'max:255'],
            'intro_core_three_description' => ['nullable', 'string'],
            'intro_core_four_title' => ['nullable', 'string', 'max:255'],
            'intro_core_four_description' => ['nullable', 'string'],

            'vm_heading' => ['nullable', 'string', 'max:255'],
            'vm_description' => ['nullable', 'string'],
            'vision_title' => ['nullable', 'string', 'max:255'],
            'vision_description' => ['nullable', 'string'],
            'mission_title' => ['nullable', 'string', 'max:255'],
            'mission_description' => ['nullable', 'string'],
            'future_title' => ['nullable', 'string', 'max:255'],
            'future_description' => ['nullable', 'string'],

            'method_heading' => ['nullable', 'string', 'max:255'],
            'method_description' => ['nullable', 'string'],
            'method_note' => ['nullable', 'string', 'max:255'],
            'method_one_title' => ['nullable', 'string', 'max:255'],
            'method_one_description' => ['nullable', 'string'],
            'method_two_title' => ['nullable', 'string', 'max:255'],
            'method_two_description' => ['nullable', 'string'],
            'method_three_title' => ['nullable', 'string', 'max:255'],
            'method_three_description' => ['nullable', 'string'],
            'method_four_title' => ['nullable', 'string', 'max:255'],
            'method_four_description' => ['nullable', 'string'],

            'support_heading' => ['nullable', 'string', 'max:255'],
            'support_description' => ['nullable', 'string'],
            'support_highlight_title' => ['nullable', 'string', 'max:255'],
            'support_highlight_description' => ['nullable', 'string'],
            'support_one_title' => ['nullable', 'string', 'max:255'],
            'support_one_description' => ['nullable', 'string'],
            'support_two_title' => ['nullable', 'string', 'max:255'],
            'support_two_description' => ['nullable', 'string'],
            'support_three_title' => ['nullable', 'string', 'max:255'],
            'support_three_description' => ['nullable', 'string'],
            'support_four_title' => ['nullable', 'string', 'max:255'],
            'support_four_description' => ['nullable', 'string'],

            'status' => ['nullable', 'boolean'],
        ];
    }

    private function defaultData(): array
    {
        return [
            'hero_title' => 'Building Rural India’s Future',
            'hero_highlight_text' => 'NEET & JEE Learning Ecosystem',
            'hero_description' => 'Khadkeshwar NEET JEE Academy, Lonar is a rural-first coaching institute with personal mentorship, affordable academic support, disciplined preparation and a future-ready AI education vision.',
            'hero_tag_one' => 'NEET Preparation',
            'hero_tag_two' => 'JEE Preparation',
            'hero_tag_three' => 'Foundation Course',
            'hero_tag_four' => 'AI Learning Vision',
            'hero_image_alt' => 'Khadkeshwar Academy classroom learning environment',
            'hero_focus_label' => 'Academy Focus',
            'hero_focus_title' => 'NEET / JEE / Foundation',
            'hero_focus_description' => 'Premium academic preparation for rural aspirants.',
            'hero_stat_one_value' => '50%',
            'hero_stat_one_label' => 'Fee Concession',
            'hero_stat_two_value' => 'Regular Tests',
            'hero_stat_two_label' => 'Performance Practice',

            'intro_heading' => 'Premium coaching with personal guidance for rural students.',
            'intro_description' => 'A focused academic environment designed to help students prepare for NEET, JEE and Foundation goals with confidence, consistency and the right guidance.',
            'intro_card_title' => 'Quality preparation should not depend on city location.',
            'intro_card_description' => '<p>Khadkeshwar NEET JEE Academy is created with a clear mission — to make quality NEET, JEE and Foundation preparation accessible for rural students. The academy focuses on disciplined classroom learning, regular tests, revision support and personal mentorship.</p><p>We believe rural students deserve the same academic guidance, confidence and preparation environment that students get in larger cities. The future roadmap includes AI-enabled learning support, performance tracking and smart study planning.</p>',
            'intro_quote_text' => 'Education with discipline, mentorship and technology can transform rural talent.',
            'intro_quote_author' => 'Khadkeshwar NEET JEE Academy',

            'intro_core_one_title' => 'Exam-Focused Learning',
            'intro_core_one_description' => 'NEET, JEE and Foundation preparation with proper academic planning.',
            'intro_core_two_title' => 'Personal Mentorship',
            'intro_core_two_description' => 'Guidance, doubt support and motivation for consistent preparation.',
            'intro_core_three_title' => 'Progress Tracking',
            'intro_core_three_description' => 'Tests, revision and improvement-focused student performance support.',
            'intro_core_four_title' => 'AI Learning Vision',
            'intro_core_four_description' => 'Future roadmap for AI test analysis and smart student dashboard.',

            'vm_heading' => 'Focused on affordable, disciplined and future-ready education.',
            'vm_description' => 'Our vision is to create a trusted rural education platform where students can prepare confidently for competitive exams with the right academic system.',
            'vision_title' => 'Our Vision',
            'vision_description' => 'To build a strong rural learning ecosystem where NEET, JEE and Foundation students can access quality coaching, mentorship, test practice and future AI-enabled learning support.',
            'mission_title' => 'Our Mission',
            'mission_description' => 'To support rural students through affordable education, personal guidance, scholarship support, hostel and reading room facilities, regular revision and disciplined preparation.',
            'future_title' => 'Future Goal',
            'future_description' => 'To grow from a coaching institute into a future AI education platform and rural EdTech startup working toward a national learning brand for rural India.',

            'method_heading' => 'Structured learning system for strong preparation.',
            'method_description' => 'Our teaching system is built around concept clarity, exam-oriented practice, regular tests, revision planning and doubt support.',
            'method_note' => 'Daily discipline + regular tests + personal guidance',
            'method_one_title' => 'Concept Clarity',
            'method_one_description' => 'Strong subject foundation through classroom explanation and practice.',
            'method_two_title' => 'Daily Practice',
            'method_two_description' => 'Problem solving, question practice and chapter-wise revision support.',
            'method_three_title' => 'Regular Tests',
            'method_three_description' => 'Chapter tests, mock tests and performance-based improvement planning.',
            'method_four_title' => 'Doubt Support',
            'method_four_description' => 'Personal academic guidance to clear doubts and improve confidence.',

            'support_heading' => 'Support beyond classroom learning.',
            'support_description' => 'Khadkeshwar Academy supports students with mentorship, scholarship guidance, test feedback, doubt support and a focused learning environment.',
            'support_highlight_title' => 'Hostel & Reading Room Facilities',
            'support_highlight_description' => 'Hostel and Reading Room facilities are provided for students through the academy for a focused and disciplined learning environment.',
            'support_one_title' => 'Personal Mentorship',
            'support_one_description' => 'Regular guidance to keep students focused and consistent.',
            'support_two_title' => 'Fee Concession',
            'support_two_description' => 'Support for eligible and deserving students up to 50%.',
            'support_three_title' => 'Test Series',
            'support_three_description' => 'Chapter-wise tests, revision tests and full mock practice.',
            'support_four_title' => 'AI Learning Vision',
            'support_four_description' => 'Future roadmap for AI test analysis and progress tracking.',

            'status' => true,
        ];
    }
}