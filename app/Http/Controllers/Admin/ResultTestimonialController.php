<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResultTestimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ResultTestimonialController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('result_testimonial_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testimonials = ResultTestimonial::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.result-testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        abort_if(Gate::denies('result_testimonial_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.result-testimonials.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('result_testimonial_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validatedData($request);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        ResultTestimonial::create($data);

        return redirect()
            ->route('admin.result-testimonials.index')
            ->with('message', 'Result testimonial created successfully.');
    }

    public function show(ResultTestimonial $resultTestimonial)
    {
        abort_if(Gate::denies('result_testimonial_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.result-testimonials.show', compact('resultTestimonial'));
    }

    public function edit(ResultTestimonial $resultTestimonial)
    {
        abort_if(Gate::denies('result_testimonial_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.result-testimonials.edit', compact('resultTestimonial'));
    }

    public function update(Request $request, ResultTestimonial $resultTestimonial)
    {
        abort_if(Gate::denies('result_testimonial_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validatedData($request);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $resultTestimonial->update($data);

        return redirect()
            ->route('admin.result-testimonials.index')
            ->with('message', 'Result testimonial updated successfully.');
    }

    public function destroy(ResultTestimonial $resultTestimonial)
    {
        abort_if(Gate::denies('result_testimonial_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resultTestimonial->delete();

        return redirect()
            ->route('admin.result-testimonials.index')
            ->with('message', 'Result testimonial deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'review_text' => ['required', 'string'],
            'reviewer_name' => ['required', 'string', 'max:255'],
            'reviewer_type' => ['nullable', 'string', 'max:255'],
            'rating' => ['nullable', 'integer', 'min:1', 'max:5'],
            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['nullable', 'boolean'],
        ]);
    }
}
