@extends('layouts.admin')

@section('page-title', 'Edit Result Testimonial')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.result-testimonials.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>
        <h2 class="admin-page-title">Edit Result Testimonial</h2>
        <p class="admin-page-subtitle">Update review text, rating and display settings</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.result-testimonials.update', $resultTestimonial->id) }}">
    @include('admin.result-testimonials._form', ['resultTestimonial' => $resultTestimonial])

    <div class="form-actions">
        <button type="submit" class="btn-primary"><i class="fas fa-check"></i>Update Testimonial</button>
        <a href="{{ route('admin.result-testimonials.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a>
    </div>
</form>

@endsection
