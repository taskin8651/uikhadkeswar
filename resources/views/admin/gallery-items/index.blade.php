@extends('layouts.admin')

@section('page-title', 'Gallery Items')

@section('content')
<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Gallery Items</h2>
        <p class="admin-page-subtitle">Manage photos, videos, filters and masonry layout</p>
    </div>
    @can('gallery_item_create')
        <a href="{{ route('admin.gallery-items.create') }}" class="btn-primary"><i class="fas fa-plus"></i>Add Item</a>
    @endcan
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Gallery Items</p>
        <span class="page-card-note"><i class="fas fa-info-circle"></i> Images can be uploaded through media library</span>
    </div>
    <div class="page-card-table">
        <table class="min-w-full datatable datatable-GalleryItem">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Preview</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Categories</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($galleryItems as $item)
                    <tr data-entry-id="{{ $item->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $item->id }}</span></td>
                        <td><span class="role-tag">{{ str_pad($item->sort_order, 2, '0', STR_PAD_LEFT) }}</span></td>
                        <td>
                            @if($item->thumbnailSource())
                                <img src="{{ $item->thumbnailSource() }}" alt="{{ $item->title }}" style="width:82px;height:58px;object-fit:cover;border-radius:10px;">
                            @else
                                -
                            @endif
                        </td>
                        <td><p class="table-main-text">{{ $item->title }}</p><p class="table-sub-text">{{ $item->label ?: 'Gallery Item' }}</p></td>
                        <td><span class="role-tag">{{ strtoupper($item->media_type) }}</span></td>
                        <td style="color:#475569;">{{ $item->category_slugs }}</td>
                        <td>
                            @if($item->status)
                                <div class="d-flex align-items-center gap-2"><span class="status-dot status-success"></span><span style="font-size:12.5px; color:#065F46;">Published</span></div>
                            @else
                                <div class="d-flex align-items-center gap-2"><span class="status-dot status-warning"></span><span style="font-size:12.5px; color:#92400E;">Draft</span></div>
                            @endif
                        </td>
                        <td>
                            <div class="action-row">
                                @can('gallery_item_edit')
                                    <a href="{{ route('admin.gallery-items.edit', $item->id) }}" class="btn-outline btn-outline-edit"><i class="fas fa-pencil-alt"></i>Edit</a>
                                @endcan
                                @can('gallery_item_delete')
                                    <form action="{{ route('admin.gallery-items.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn-outline btn-outline-danger"><i class="fas fa-trash-alt"></i>Delete</button>
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
    initAdminDataTable('.datatable-GalleryItem', {
        canDelete: @can('gallery_item_delete') true @else false @endcan,
        searchPlaceholder: 'Search gallery...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ gallery items'
    });
});
</script>
@endsection
