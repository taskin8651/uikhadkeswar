@extends('layouts.admin')

@section('page-title', 'Edit Certificate')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.home-certificates.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>
        <h2 class="admin-page-title">Edit Certificate</h2>
        <p class="admin-page-subtitle">Update certificate details and image</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.home-certificates.update', $homeCertificate->id) }}" enctype="multipart/form-data">
    @include('admin.home-certificates._form', ['homeCertificate' => $homeCertificate])

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Update Certificate
        </button>

        <a href="{{ route('admin.home-certificates.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection
