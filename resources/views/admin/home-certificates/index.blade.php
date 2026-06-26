@extends('layouts.admin')

@section('page-title', 'Home Certificates')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Home Certificates</h2>
        <p class="admin-page-subtitle">Manage government scholarship certificate carousel shown on home page</p>
    </div>

    @can('home_certificate_create')
        <a href="{{ route('admin.home-certificates.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Certificate
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total</p>
        <p class="stat-value">{{ $homeCertificates->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $homeCertificates->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $homeCertificates->where('status', false)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Certificates</p>
        <span class="page-card-note"><i class="fas fa-images"></i> Upload image or keep asset path</span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-HomeCertificate">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($homeCertificates as $certificate)
                    <tr data-entry-id="{{ $certificate->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $certificate->id }}</span></td>
                        <td><span class="role-tag">{{ $certificate->sort_order }}</span></td>
                        <td>
                            @if($certificate->imageUrl())
                                <img src="{{ $certificate->imageUrl() }}"
                                     alt="{{ $certificate->alt_text ?: $certificate->title }}"
                                     style="width:74px;height:54px;object-fit:cover;border-radius:12px;border:1px solid #E2E8F0;">
                            @else
                                <div class="avatar-circle"><i class="fas fa-certificate"></i></div>
                            @endif
                        </td>
                        <td>
                            <p class="table-main-text">{{ $certificate->title }}</p>
                            <p class="table-sub-text">{{ $certificate->year_text ?: '-' }}</p>
                        </td>
                        <td>{{ $certificate->subtitle ?: '-' }}</td>
                        <td>
                            <span class="inline-flex-center">
                                <span class="status-dot {{ $certificate->status ? 'status-success' : 'status-warning' }}"></span>
                                {{ $certificate->status ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td>
                            <div class="action-row">
                                @can('home_certificate_edit')
                                    <a href="{{ route('admin.home-certificates.edit', $certificate->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('home_certificate_delete')
                                    <form action="{{ route('admin.home-certificates.destroy', $certificate->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-outline btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
