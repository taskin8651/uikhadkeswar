@extends('layouts.admin')

@section('page-title', 'Edit Company Recognition')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.company-recognitions.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Company Recognition</h2>

        <p class="admin-page-subtitle">
            Update recognition card content, icon, order and visibility
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.company-recognitions.update', $companyRecognition->id) }}">
    @include('admin.company-recognitions._form', ['companyRecognition' => $companyRecognition])

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Update Recognition
        </button>

        <a href="{{ route('admin.company-recognitions.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection
