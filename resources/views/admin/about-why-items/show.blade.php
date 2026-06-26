@extends('layouts.admin')

@section('page-title', 'View Why Choose Item')

@section('content')

@php
    $colors = ['#d40d1f','#a60717','#111116','#ef4444','#f97316','#0f766e','#be123c','#7f1d1d'];
    $color = $colors[$aboutWhyItem->id % count($colors)];

    $defaultIcon = $aboutWhyItem->icon ?: 'bi bi-award-fill';
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.about-why-items.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Why Choose Item Details</h2>

        <p class="admin-page-subtitle">
            Full details and frontend preview information for this Why Choose card
        </p>
    </div>

    <div class="show-actions">
        @can('about_why_item_edit')
            <a href="{{ route('admin.about-why-items.edit', $aboutWhyItem->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Item
            </a>
        @endcan

        @can('about_why_item_delete')
            <form action="{{ route('admin.about-why-items.destroy', $aboutWhyItem->id) }}"
                  method="POST"
                  onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                @method('DELETE')
                @csrf

                <button type="submit" class="btn-danger">
                    <i class="fas fa-trash-alt"></i>
                    Delete
                </button>
            </form>
        @endcan
    </div>
</div>

<div class="show-grid">

    {{-- LEFT PROFILE / PREVIEW --}}
    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <div class="profile-avatar-lg" style="background: {{ $color }};">
                    <i class="{{ $defaultIcon }}"></i>
                </div>

                <p class="profile-title">{{ $aboutWhyItem->title }}</p>
                <p class="profile-subtitle">Why Choose Card</p>

                @if($aboutWhyItem->status)
                    <span class="status-pill success">
                        <i class="fas fa-check-circle"></i>
                        Published
                    </span>
                @else
                    <span class="status-pill warning">
                        <i class="fas fa-clock"></i>
                        Draft
                    </span>
                @endif
            </div>

            <div class="detail-section-pad-sm">
                <div class="d-grid gap-2" style="grid-template-columns: 1fr 1fr;">
                    <div class="stat-mini">
                        <p class="stat-mini-label">Item ID</p>
                        <p class="stat-mini-value">#{{ $aboutWhyItem->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">
                            {{ str_pad($aboutWhyItem->sort_order, 2, '0', STR_PAD_LEFT) }}
                        </p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Created On</p>
                        <p class="stat-mini-value-sm">
                            {{ optional($aboutWhyItem->created_at)->format('d M Y') ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('about_why_item_edit')
                    <a href="{{ route('admin.about-why-items.edit', $aboutWhyItem->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Item
                    </a>
                @endcan

                <a href="{{ route('admin.about-why-items.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Why Choose Items
                </a>

                @can('about_why_item_create')
                    <a href="{{ route('admin.about-why-items.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Item
                    </a>
                @endcan
            </div>
        </div>
    </div>

    {{-- RIGHT DETAILS --}}
    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-id-card"></i>
                </div>

                <p class="detail-section-title">Item Details</p>
            </div>

            <div class="detail-section-body">

                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $aboutWhyItem->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $aboutWhyItem->title }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">
                        {{ $aboutWhyItem->description ?: '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Icon</span>

                    <div class="d-flex align-items-center gap-2">
                        <i class="{{ $defaultIcon }}" style="font-size:18px;"></i>
                        <span class="detail-value code-pill">{{ $defaultIcon }}</span>
                    </div>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value code-pill">
                        {{ str_pad($aboutWhyItem->sort_order, 2, '0', STR_PAD_LEFT) }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($aboutWhyItem->status)
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-check-circle text-success"></i>
                            <span class="detail-value" style="color:#065F46;">Published</span>
                        </div>
                    @else
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-exclamation-circle text-warning"></i>
                            <span class="detail-value" style="color:#92400E;">Draft</span>
                        </div>
                    @endif
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">
                        {{ optional($aboutWhyItem->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($aboutWhyItem->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head between">
                <div class="d-flex align-items-center gap-2">
                    <div class="detail-section-icon">
                        <i class="fas fa-eye"></i>
                    </div>

                    <p class="detail-section-title">Frontend Preview Info</p>
                </div>

                <span class="status-pill success">
                    Dynamic Card
                </span>
            </div>

            <div class="detail-section-pad-sm">

                <div class="permission-summary">
                    <p class="permission-summary-title">Frontend card structure</p>

                    <div class="d-flex flex-wrap gap-1">
                        <span class="mini-permission">
                            Title: Dynamic
                        </span>

                        <span class="mini-permission">
                            Description: Dynamic
                        </span>

                        <span class="mini-permission">
                            Icon: Dynamic
                        </span>

                        <span class="mini-permission">
                            Number: Static Loop
                        </span>

                        <span class="mini-permission">
                            Animation: Static
                        </span>
                    </div>
                </div>

                <div class="assign-empty mt-3">
                    <div class="assign-empty-icon">
                        <i class="{{ $defaultIcon }}"></i>
                    </div>

                    <p class="assign-empty-title">{{ $aboutWhyItem->title }}</p>

                    <p class="assign-empty-text">
                        {{ $aboutWhyItem->description ?: 'No description added yet.' }}
                    </p>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection