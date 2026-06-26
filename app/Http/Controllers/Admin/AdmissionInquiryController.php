<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdmissionInquiry;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AdmissionInquiryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('admission_inquiry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inquiries = AdmissionInquiry::latest()->get();

        return view('admin.admission-inquiries.index', compact('inquiries'));
    }

    public function destroy(AdmissionInquiry $admissionInquiry)
    {
        abort_if(Gate::denies('admission_inquiry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admissionInquiry->delete();

        return back()->with('message', 'Admission inquiry deleted successfully.');
    }
}
