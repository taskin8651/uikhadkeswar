@extends('layouts.admin')

@section('page-title', 'Add Certificate')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.home-certificates.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>
        <h2 class="admin-page-title">Add Certificate</h2>
        <p class="admin-page-subtitle">Create a certificate slide for home page carousel</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.home-certificates.store') }}" enctype="multipart/form-data">
    @include('admin.home-certificates._form')

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.home-certificates.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection
