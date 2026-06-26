@extends('layouts.admin')

@section('page-title', 'Show Founder Responsibility')

@section('content')

@php
    $colors = ['#d40d1f','#a60717','#111116','#ef4444','#f97316','#0f766e','#be123c','#7f1d1d'];
    $color = $colors[$founderResponsibility->id % count($colors)];

    $staticIcons = [
        'bi bi-bullseye',
        'bi bi-handshake-fill',
        'bi bi-cpu-fill',
        'bi bi-mortarboard-fill',
        'bi bi-percent',
        'bi bi-graph-up-arrow',
    ];

    $iconIndex = max((int) $founderResponsibility->sort_order - 1, 0);
    $frontendIcon = $staticIcons[$iconIndex] ?? 'bi bi-bullseye';
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.founder-responsibilities.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Founder Responsibility Details</h2>

        <p class="admin-page-subtitle">
            Full details for this founder responsibility card
        </p>
    </div>

    <div class="show-actions">
        @can('founder_responsibility_edit')
            <a href="{{ route('admin.founder-responsibilities.edit', $founderResponsibility->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Responsibility
            </a>
        @endcan

        @can('founder_responsibility_delete')
            <form action="{{ route('admin.founder-responsibilities.destroy', $founderResponsibility->id) }}"
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

    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <div class="profile-avatar-lg" style="background: {{ $color }};">
                    {{ strtoupper(substr($founderResponsibility->title, 0, 1)) }}
                </div>

                <p class="profile-title">{{ $founderResponsibility->title }}</p>
                <p class="profile-subtitle">Founder Responsibility Card</p>

                @if($founderResponsibility->status)
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
                        <p class="stat-mini-label">Card ID</p>
                        <p class="stat-mini-value">#{{ $founderResponsibility->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">
                            {{ str_pad($founderResponsibility->sort_order, 2, '0', STR_PAD_LEFT) }}
                        </p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Created On</p>
                        <p class="stat-mini-value-sm">
                            {{ optional($founderResponsibility->created_at)->format('d M Y') ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('founder_responsibility_edit')
                    <a href="{{ route('admin.founder-responsibilities.edit', $founderResponsibility->id) }}" class="quick-link primary">
                        <i class="fas fa-edit"></i>
                        Edit Card
                    </a>
                @endcan

                <a href="{{ route('admin.founder-responsibilities.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Responsibilities
                </a>

                @can('founder_responsibility_create')
                    <a href="{{ route('admin.founder-responsibilities.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Card
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-id-card"></i>
                </div>

                <p class="detail-section-title">Responsibility Details</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $founderResponsibility->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $founderResponsibility->title }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">
                        {{ $founderResponsibility->description ?: '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value code-pill">
                        {{ str_pad($founderResponsibility->sort_order, 2, '0', STR_PAD_LEFT) }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($founderResponsibility->status)
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
                        {{ optional($founderResponsibility->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($founderResponsibility->updated_at)->format('d M Y, H:i') ?? '-' }}
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
                    Static Icon
                </span>
            </div>

            <div class="detail-section-pad-sm">
                <div class="permission-summary">
                    <p class="permission-summary-title">Frontend card structure</p>

                    <div class="d-flex flex-wrap gap-1">
                        <span class="mini-permission">
                            Number: {{ str_pad($founderResponsibility->sort_order, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <span class="mini-permission">
                            Icon: {{ $frontendIcon }}
                        </span>

                        <span class="mini-permission">
                            Animation: Static
                        </span>

                        <span class="mini-permission">
                            Title: Dynamic
                        </span>

                        <span class="mini-permission">
                            Description: Dynamic
                        </span>
                    </div>
                </div>

                <div class="assign-empty mt-3">
                    <div class="assign-empty-icon">
                        <i class="{{ $frontendIcon }}"></i>
                    </div>

                    <p class="assign-empty-title">{{ $founderResponsibility->title }}</p>

                    <p class="assign-empty-text">
                        {{ $founderResponsibility->description ?: 'No description added yet.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection