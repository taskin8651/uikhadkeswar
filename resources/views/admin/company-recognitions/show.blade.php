@extends('layouts.admin')

@section('page-title', 'View Company Recognition')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.company-recognitions.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">{{ $companyRecognition->title }}</h2>

        <p class="admin-page-subtitle">
            Company recognition card details
        </p>
    </div>

    @can('company_recognition_edit')
        <a href="{{ route('admin.company-recognitions.edit', $companyRecognition->id) }}" class="btn-primary">
            <i class="fas fa-pencil-alt"></i>
            Edit Recognition
        </a>
    @endcan
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">Recognition Details</p>
    </div>

    <div class="page-card-table">
        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>#{{ $companyRecognition->id }}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{ $companyRecognition->title }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $companyRecognition->description ?: '-' }}</td>
                </tr>
                <tr>
                    <th>Icon</th>
                    <td><i class="{{ $companyRecognition->icon ?: 'bi bi-award-fill' }}"></i> {{ $companyRecognition->icon ?: 'bi bi-award-fill' }}</td>
                </tr>
                <tr>
                    <th>Sort Order</th>
                    <td>{{ $companyRecognition->sort_order }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $companyRecognition->status ? 'Published' : 'Draft' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
