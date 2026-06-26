@extends('layouts.admin')

@section('page-title', 'Resource Items')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Resource Items</h2>
        <p class="admin-page-subtitle">Manage study resources, notices, downloads, exam updates and tips</p>
    </div>

    @can('resource_item_create')
        <a href="{{ route('admin.resource-items.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Resource
        </a>
    @endcan
</div>

@if(session('message'))
    <div class="alert alert-success mb-3">{{ session('message') }}</div>
@endif

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Resources</p>
        <p class="stat-value">{{ $resourceItems->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $resourceItems->where('status', true)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $resourceItems->where('status', false)->count() }}</p>
    </div>
    <div class="stat-card">
        <p class="stat-label">Featured</p>
        <p class="stat-value">{{ $resourceItems->where('is_featured', true)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Resource Items</p>
        <span class="page-card-note"><i class="fas fa-info-circle"></i> Filters use category slugs</span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ResourceItem">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Resource</th>
                    <th>Categories</th>
                    <th>Link</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($resourceItems as $item)
                    <tr data-entry-id="{{ $item->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $item->id }}</span></td>
                        <td><span class="role-tag">{{ str_pad($item->sort_order, 2, '0', STR_PAD_LEFT) }}</span></td>
                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle">
                                    <i class="{{ $item->icon ?: 'bi bi-folder-fill' }}"></i>
                                </div>
                                <div>
                                    <p class="table-main-text">{{ $item->title }}</p>
                                    <p class="table-sub-text">{{ \Illuminate\Support\Str::limit($item->description, 90) ?: 'No description added' }}</p>
                                </div>
                            </div>
                        </td>
                        <td><span class="role-tag">{{ $item->category_slugs ?: 'all' }}</span></td>
                        <td><span class="role-tag">{{ ucfirst($item->link_type) }}{{ $item->route_name ? ' - '.$item->route_name : '' }}</span></td>
                        <td>
                            @if($item->status)
                                <div class="d-flex align-items-center gap-2"><span class="status-dot status-success"></span><span style="font-size:12.5px;color:#065F46;">Published</span></div>
                            @else
                                <div class="d-flex align-items-center gap-2"><span class="status-dot status-warning"></span><span style="font-size:12.5px;color:#92400E;">Draft</span></div>
                            @endif
                        </td>
                        <td>
                            <div class="action-row">
                                @can('resource_item_edit')
                                    <a href="{{ route('admin.resource-items.edit', $item->id) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan
                                @can('resource_item_delete')
                                    <form action="{{ route('admin.resource-items.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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
    initAdminDataTable('.datatable-ResourceItem', {
        canDelete: @can('resource_item_delete') true @else false @endcan,
        searchPlaceholder: 'Search resources...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ resources'
    });
});
</script>
@endsection
