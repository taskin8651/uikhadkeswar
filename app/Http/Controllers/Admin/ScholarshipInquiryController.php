<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScholarshipInquiry;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ScholarshipInquiryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('scholarship_inquiry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inquiries = ScholarshipInquiry::latest()->get();

        return view('admin.scholarship-inquiries.index', compact('inquiries'));
    }

    public function destroy(ScholarshipInquiry $scholarshipInquiry)
    {
        abort_if(Gate::denies('scholarship_inquiry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $scholarshipInquiry->delete();

        return back()->with('message', 'Scholarship inquiry deleted successfully.');
    }
}
