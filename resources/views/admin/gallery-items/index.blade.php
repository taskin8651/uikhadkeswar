@extends('layouts.admin')

@section('page-title', 'Gallery Items')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Gallery Items</h2>

        <p class="admin-page-subtitle">
            Manage photos, videos, filters and masonry layout shown on the gallery page
        </p>
    </div>

    @can('gallery_item_create')
        <a href="{{ route('admin.gallery-items.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Item
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Items</p>
        <p class="stat-value">{{ $galleryItems->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Photos</p>
        <p class="stat-value">{{ $galleryItems->where('media_type', 'photo')->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Videos</p>
        <p class="stat-value">{{ $galleryItems->where('media_type', 'video')->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $galleryItems->where('status', true)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Gallery Items</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Images can be uploaded through media library
        </span>
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

                        <td>
                            <span class="id-text">#{{ $item->id }}</span>
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ str_pad($item->sort_order, 2, '0', STR_PAD_LEFT) }}
                            </span>
                        </td>

                        <td>
                            @if($item->thumbnailSource())
                                <img src="{{ $item->thumbnailSource() }}"
                                     alt="{{ $item->title }}"
                                     style="width:74px;height:54px;object-fit:cover;border-radius:12px;border:1px solid #E2E8F0;">
                            @else
                                @php
                                    $colors = ['#d40d1f','#a60717','#111116','#ef4444','#f97316','#0f766e','#be123c','#7f1d1d'];
                                    $color  = $colors[$item->id % count($colors)];
                                @endphp

                                <div class="avatar-circle" style="background: {{ $color }};">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </td>

                        <td>
                            <div>
                                <p class="table-main-text">{{ $item->title }}</p>
                                <p class="table-sub-text">{{ $item->label ?: 'Gallery Item' }}</p>
                            </div>
                        </td>

                        <td>
                            @if($item->media_type === 'video')
                                <span class="role-tag">
                                    <i class="fas fa-play-circle" style="margin-right:5px;"></i>
                                    VIDEO
                                </span>
                            @else
                                <span class="role-tag">
                                    <i class="fas fa-image" style="margin-right:5px;"></i>
                                    PHOTO
                                </span>
                            @endif
                        </td>

                        <td style="color:#475569; max-width:260px;">
                            {{ $item->category_slugs ?: '—' }}
                        </td>

                        <td>
                            @if($item->status)
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
                                @can('gallery_item_show')
                                    <a href="{{ route('admin.gallery-items.show', $item->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('gallery_item_edit')
                                    <a href="{{ route('admin.gallery-items.edit', $item->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('gallery_item_delete')
                                    <form action="{{ route('admin.gallery-items.destroy', $item->id) }}"
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
    initAdminDataTable('.datatable-GalleryItem', {
        canDelete: @can('gallery_item_delete') true @else false @endcan,
        searchPlaceholder: 'Search gallery...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ gallery items'
    });
});
</script>
@endsection