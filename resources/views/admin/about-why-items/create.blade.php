@extends('layouts.admin')

@section('page-title', 'Add Why Choose Item')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.about-why-items.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add Why Choose Item</h2>

        <p class="admin-page-subtitle">
            Add a new card for the About Academy why choose section
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.about-why-items.store') }}">
    @include('admin.about-why-items._form')

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.about-why-items.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection
