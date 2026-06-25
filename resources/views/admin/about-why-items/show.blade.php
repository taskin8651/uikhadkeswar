@extends('layouts.admin')

@section('page-title', 'View Why Choose Item')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.about-why-items.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">{{ $aboutWhyItem->title }}</h2>

        <p class="admin-page-subtitle">
            Why choose card preview information
        </p>
    </div>

    @can('about_why_item_edit')
        <a href="{{ route('admin.about-why-items.edit', $aboutWhyItem->id) }}" class="btn-primary">
            <i class="fas fa-pencil-alt"></i>
            Edit Item
        </a>
    @endcan
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">Item Details</p>
    </div>

    <div class="page-card-table">
        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>#{{ $aboutWhyItem->id }}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{ $aboutWhyItem->title }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $aboutWhyItem->description ?: '-' }}</td>
                </tr>
                <tr>
                    <th>Icon</th>
                    <td><i class="{{ $aboutWhyItem->icon ?: 'bi bi-award-fill' }}"></i> {{ $aboutWhyItem->icon ?: 'bi bi-award-fill' }}</td>
                </tr>
                <tr>
                    <th>Sort Order</th>
                    <td>{{ $aboutWhyItem->sort_order }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $aboutWhyItem->status ? 'Published' : 'Draft' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
