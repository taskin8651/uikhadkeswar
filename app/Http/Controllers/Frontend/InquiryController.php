<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AdmissionInquiry;
use App\Models\ContactInquiry;
use App\Models\ScholarshipInquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function storeContact(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^[6-9][0-9]{9}$/'],
            'email' => ['nullable', 'email', 'max:255'],
            'course' => ['required', 'string', 'max:255'],
            'message' => ['nullable', 'string'],
            'agree' => ['accepted'],
        ]);

        unset($data['agree']);
        ContactInquiry::create($data);

        return back()->with('contact_success', 'Thank you. Your inquiry has been submitted successfully.');
    }

    public function storeAdmission(Request $request)
    {
        $data = $request->validate([
            'student_name' => ['required', 'string', 'max:255'],
            'parent_name' => ['nullable', 'string', 'max:255'],
            'mobile_number' => ['required', 'regex:/^[6-9][0-9]{9}$/'],
            'email' => ['nullable', 'email', 'max:255'],
            'course_interested' => ['required', 'string', 'max:255'],
            'student_class' => ['nullable', 'string', 'max:100'],
            'fee_concession' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string'],
            'agree' => ['nullable', 'accepted'],
            'source' => ['nullable', 'string', 'max:100'],
        ]);

        unset($data['agree']);
        $data['source'] = $data['source'] ?? 'admission_page';

        AdmissionInquiry::create($data);

        return back()->with('admission_success', 'Thank you. Your admission inquiry has been submitted successfully.');
    }

    public function storeScholarship(Request $request)
    {
        $data = $request->validate([
            'student_name' => ['required', 'string', 'max:255'],
            'parent_name' => ['nullable', 'string', 'max:255'],
            'mobile_number' => ['required', 'regex:/^[6-9][0-9]{9}$/'],
            'email' => ['nullable', 'email', 'max:255'],
            'course_interested' => ['required', 'string', 'max:255'],
            'current_class' => ['nullable', 'string', 'max:100'],
            'eligibility_category' => ['required', 'string', 'max:255'],
            'last_percentage' => ['nullable', 'string', 'max:50'],
            'message' => ['nullable', 'string'],
            'agree' => ['accepted'],
        ]);

        unset($data['agree']);
        ScholarshipInquiry::create($data);

        return back()->with('scholarship_success', 'Thank you. Your scholarship inquiry has been submitted successfully.');
    }
}
