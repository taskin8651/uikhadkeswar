@extends('layouts.admin')

@section('page-title', 'Founder Timeline')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Founder Timeline</h2>
        <p class="admin-page-subtitle">
            Manage journey timeline years and roadmap content shown on the About Us page
        </p>
    </div>

    @can('founder_timeline_create')
        <a href="{{ route('admin.founder-timelines.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Timeline
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Items</p>
        <p class="stat-value">{{ $timelines->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $timelines->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $timelines->where('status', false)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $timelines->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Timeline Items</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Only year and title are dynamic on frontend
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-FounderTimeline">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Year</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($timelines as $timeline)
                    <tr data-entry-id="{{ $timeline->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $timeline->id }}</span>
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ str_pad($timeline->sort_order, 2, '0', STR_PAD_LEFT) }}
                            </span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $colors = ['#d40d1f','#a60717','#111116','#ef4444','#f97316','#0f766e','#be123c','#7f1d1d'];
                                    $color  = $colors[$timeline->id % count($colors)];
                                @endphp

                                <div class="avatar-circle" style="background: {{ $color }};">
                                    {{ substr($timeline->year, 0, 2) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $timeline->year }}</p>
                                    <p class="table-sub-text">Timeline Year</p>
                                </div>
                            </div>
                        </td>

                        <td style="color:#475569; max-width:520px;">
                            {{ \Illuminate\Support\Str::limit($timeline->title, 120) }}
                        </td>

                        <td>
                            @if($timeline->status)
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
                                @can('founder_timeline_access')
                                    <a href="{{ route('admin.founder-timelines.show', $timeline->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('founder_timeline_edit')
                                    <a href="{{ route('admin.founder-timelines.edit', $timeline->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('founder_timeline_delete')
                                    <form action="{{ route('admin.founder-timelines.destroy', $timeline->id) }}"
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
    initAdminDataTable('.datatable-FounderTimeline', {
        canDelete: @can('founder_timeline_delete') true @else false @endcan,
        searchPlaceholder: 'Search timeline...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ timeline items'
    });
});
</script>
@endsection