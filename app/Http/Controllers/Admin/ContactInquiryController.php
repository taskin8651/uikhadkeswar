<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ContactInquiryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contact_inquiry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inquiries = ContactInquiry::latest()->get();

        return view('admin.contact-inquiries.index', compact('inquiries'));
    }

    public function destroy(ContactInquiry $contactInquiry)
    {
        abort_if(Gate::denies('contact_inquiry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactInquiry->delete();

        return back()->with('message', 'Contact inquiry deleted successfully.');
    }
}
