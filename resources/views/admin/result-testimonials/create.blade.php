@extends('layouts.admin')

@section('page-title', 'Add Result Testimonial')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.result-testimonials.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>
        <h2 class="admin-page-title">Add Result Testimonial</h2>
        <p class="admin-page-subtitle">Add a new review card for the results page</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.result-testimonials.store') }}">
    @include('admin.result-testimonials._form')

    <div class="form-actions">
        <button type="submit" class="btn-primary"><i class="fas fa-check"></i>{{ trans('global.save') }}</button>
        <a href="{{ route('admin.result-testimonials.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a>
    </div>
</form>

@endsection
