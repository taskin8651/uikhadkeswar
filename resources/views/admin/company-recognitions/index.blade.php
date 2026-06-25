@extends('layouts.admin')

@section('page-title', 'Company Recognitions')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Company Recognitions</h2>
        <p class="admin-page-subtitle">
            Manage recognition and certification cards shown on the company information page
        </p>
    </div>

    @can('company_recognition_create')
        <a href="{{ route('admin.company-recognitions.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Recognition
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Cards</p>
        <p class="stat-value">{{ $recognitions->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $recognitions->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $recognitions->where('status', false)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Added Today</p>
        <p class="stat-value">{{ $recognitions->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Recognition Cards</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Icons use Bootstrap icon classes
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-CompanyRecognition">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Title</th>
                    <th>Icon</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($recognitions as $recognition)
                    <tr data-entry-id="{{ $recognition->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $recognition->id }}</span>
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ str_pad($recognition->sort_order, 2, '0', STR_PAD_LEFT) }}
                            </span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
                                    $color  = $colors[$recognition->id % count($colors)];
                                @endphp

                                <div class="avatar-circle" style="background: {{ $color }};">
                                    {{ strtoupper(substr($recognition->title, 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $recognition->title }}</p>
                                    <p class="table-sub-text">Company Recognition</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">
                                <i class="{{ $recognition->icon ?: 'bi bi-award-fill' }}"></i>
                                {{ $recognition->icon ?: 'bi bi-award-fill' }}
                            </span>
                        </td>

                        <td style="color:#475569; max-width:420px;">
                            {{ \Illuminate\Support\Str::limit(strip_tags($recognition->description), 95) ?: '-' }}
                        </td>

                        <td>
                            @if($recognition->status)
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
                                @can('company_recognition_access')
                                    <a href="{{ route('admin.company-recognitions.show', $recognition->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('company_recognition_edit')
                                    <a href="{{ route('admin.company-recognitions.edit', $recognition->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('company_recognition_delete')
                                    <form action="{{ route('admin.company-recognitions.destroy', $recognition->id) }}"
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
    initAdminDataTable('.datatable-CompanyRecognition', {
        canDelete: @can('company_recognition_delete') true @else false @endcan,
        searchPlaceholder: 'Search recognitions...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ recognition cards'
    });
});
</script>
@endsection
