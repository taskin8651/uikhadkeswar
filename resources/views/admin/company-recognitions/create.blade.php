@extends('layouts.admin')

@section('page-title', 'Add Company Recognition')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.company-recognitions.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add Company Recognition</h2>

        <p class="admin-page-subtitle">
            Add a new recognition card for the company information page
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.company-recognitions.store') }}">
    @include('admin.company-recognitions._form')

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.company-recognitions.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection
