@extends('layouts.admin')

@section('page-title', 'Result Rankers')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Result Rankers</h2>
        <p class="admin-page-subtitle">
            Manage topper, ranker and selected student cards shown on the results page
        </p>
    </div>

    @can('result_ranker_create')
        <a href="{{ route('admin.result-rankers.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Ranker
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Cards</p>
        <p class="stat-value">{{ $rankers->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $rankers->where('status', true)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Featured</p>
        <p class="stat-value">{{ $rankers->where('is_featured', true)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $rankers->where('status', false)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Ranker Cards</p>
        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Featured card uses highlighted frontend style
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ResultRanker">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Student</th>
                    <th>Exam</th>
                    <th>Meta</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($rankers as $ranker)
                    <tr data-entry-id="{{ $ranker->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $ranker->id }}</span></td>
                        <td><span class="role-tag">{{ str_pad($ranker->sort_order, 2, '0', STR_PAD_LEFT) }}</span></td>
                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $colors = ['#d40d1f','#a60717','#111116','#ef4444','#f97316','#0f766e','#be123c','#7f1d1d'];
                                    $color  = $colors[$ranker->id % count($colors)];
                                @endphp
                                <div class="avatar-circle" style="background: {{ $color }};">
                                    {{ strtoupper(substr($ranker->student_name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="table-main-text">{{ $ranker->student_name }}</p>
                                    <p class="table-sub-text">{{ $ranker->badge_text }}{{ $ranker->is_featured ? ' | Featured' : '' }}</p>
                                </div>
                            </div>
                        </td>
                        <td><span class="role-tag">{{ $ranker->exam_type }}</span></td>
                        <td style="color:#475569;">
                            {{ $ranker->meta_one_label }}: {{ $ranker->meta_one_value }}<br>
                            {{ $ranker->meta_two_label }}: {{ $ranker->meta_two_value }}
                        </td>
                        <td>
                            @if($ranker->status)
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
                                @can('result_ranker_access')
                                    <a href="{{ route('admin.result-rankers.show', $ranker->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan
                                @can('result_ranker_edit')
                                    <a href="{{ route('admin.result-rankers.edit', $ranker->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan
                                @can('result_ranker_delete')
                                    <form action="{{ route('admin.result-rankers.destroy', $ranker->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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
    initAdminDataTable('.datatable-ResultRanker', {
        canDelete: @can('result_ranker_delete') true @else false @endcan,
        searchPlaceholder: 'Search rankers...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ ranker cards'
    });
});
</script>
@endsection
