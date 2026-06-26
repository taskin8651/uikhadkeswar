@extends('layouts.admin')

@section('page-title', 'Founder Responsibilities')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Founder Responsibilities</h2>
        <p class="admin-page-subtitle">
            Manage founder responsibility cards shown on the About Us page
        </p>
    </div>

    @can('founder_responsibility_create')
        <a href="{{ route('admin.founder-responsibilities.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Responsibility
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Cards</p>
        <p class="stat-value">{{ $responsibilities->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $responsibilities->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $responsibilities->where('status', false)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $responsibilities->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Responsibilities</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Icons and numbers are static on frontend
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-FounderResponsibility">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($responsibilities as $responsibility)
                    <tr data-entry-id="{{ $responsibility->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $responsibility->id }}</span>
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ str_pad($responsibility->sort_order, 2, '0', STR_PAD_LEFT) }}
                            </span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $colors = ['#d40d1f','#a60717','#111116','#ef4444','#f97316','#0f766e','#be123c','#7f1d1d'];
                                    $color  = $colors[$responsibility->id % count($colors)];
                                @endphp

                                <div class="avatar-circle" style="background: {{ $color }};">
                                    {{ strtoupper(substr($responsibility->title, 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $responsibility->title }}</p>
                                    <p class="table-sub-text">Responsibility Card</p>
                                </div>
                            </div>
                        </td>

                        <td style="color:#475569; max-width:420px;">
                            {{ \Illuminate\Support\Str::limit(strip_tags($responsibility->description), 95) ?: '—' }}
                        </td>

                        <td>
                            @if($responsibility->status)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#065F46;">Published</span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px; color:#92400E;">Draft</span>
                                </div>
                            @endif
                        </td>

                        <td>
                            <div class="action-row">
                                @can('founder_responsibility_edit')
                                    <a href="{{ route('admin.founder-responsibilities.edit', $responsibility->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan
                                @can('founder_responsibility_access')
    <a href="{{ route('admin.founder-responsibilities.show', $responsibility->id) }}" class="btn-outline">
        <i class="fas fa-eye"></i>
        View
    </a>
@endcan

                                @can('founder_responsibility_delete')
                                    <form action="{{ route('admin.founder-responsibilities.destroy', $responsibility->id) }}"
                                          method="POST"
                                          style="display:inline;"
                                          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn-outline btn-outline-danger">
                                            <i class="fas fa-trash-alt"></i>
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

@section('scripts')
@parent
<script>
$(function () {
    initAdminDataTable('.datatable-FounderResponsibility', {
        canDelete: @can('founder_responsibility_delete') true @else false @endcan,
        searchPlaceholder: 'Search responsibilities...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ responsibilities'
    });
});
</script>
@endsection