@extends('layouts.admin')

@section('page-title', 'Edit Why Choose Item')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.about-why-items.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Why Choose Item</h2>

        <p class="admin-page-subtitle">
            Update card content, icon, order and visibility
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.about-why-items.update', $aboutWhyItem->id) }}">
    @include('admin.about-why-items._form', ['aboutWhyItem' => $aboutWhyItem])

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Update Item
        </button>

        <a href="{{ route('admin.about-why-items.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection
