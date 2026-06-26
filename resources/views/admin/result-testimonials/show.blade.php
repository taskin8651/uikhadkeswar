@extends('layouts.admin')

@section('page-title', 'View Result Testimonial')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.result-testimonials.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>
        <h2 class="admin-page-title">{{ $resultTestimonial->reviewer_name }}</h2>
        <p class="admin-page-subtitle">Result testimonial details</p>
    </div>

    @can('result_testimonial_edit')
        <a href="{{ route('admin.result-testimonials.edit', $resultTestimonial->id) }}" class="btn-primary">
            <i class="fas fa-pencil-alt"></i>
            Edit Testimonial
        </a>
    @endcan
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">Testimonial Details</p>
    </div>

    <div class="page-card-table">
        <table class="table">
            <tbody>
                <tr><th>ID</th><td>#{{ $resultTestimonial->id }}</td></tr>
                <tr><th>Review</th><td>{{ $resultTestimonial->review_text }}</td></tr>
                <tr><th>Reviewer</th><td>{{ $resultTestimonial->reviewer_name }}</td></tr>
                <tr><th>Type</th><td>{{ $resultTestimonial->reviewer_type ?: '-' }}</td></tr>
                <tr><th>Rating</th><td>{{ $resultTestimonial->rating }}</td></tr>
                <tr><th>Featured</th><td>{{ $resultTestimonial->is_featured ? 'Yes' : 'No' }}</td></tr>
                <tr><th>Status</th><td>{{ $resultTestimonial->status ? 'Published' : 'Draft' }}</td></tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
