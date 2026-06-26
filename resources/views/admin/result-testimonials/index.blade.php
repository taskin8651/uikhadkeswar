@extends('layouts.admin')

@section('page-title', 'Result Testimonials')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Result Testimonials</h2>
        <p class="admin-page-subtitle">Manage review cards shown on the results page</p>
    </div>

    @can('result_testimonial_create')
        <a href="{{ route('admin.result-testimonials.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Testimonial
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card"><p class="stat-label">Total Cards</p><p class="stat-value">{{ $testimonials->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">Published</p><p class="stat-value">{{ $testimonials->where('status', true)->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">Featured</p><p class="stat-value">{{ $testimonials->where('is_featured', true)->count() }}</p></div>
    <div class="stat-card"><p class="stat-label">Draft</p><p class="stat-value">{{ $testimonials->where('status', false)->count() }}</p></div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Testimonials</p>
        <span class="page-card-note"><i class="fas fa-info-circle"></i> Rating controls frontend stars</span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ResultTestimonial">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Reviewer</th>
                    <th>Review</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimonials as $testimonial)
                    <tr data-entry-id="{{ $testimonial->id }}">
                        <td></td>
                        <td><span class="id-text">#{{ $testimonial->id }}</span></td>
                        <td><span class="role-tag">{{ str_pad($testimonial->sort_order, 2, '0', STR_PAD_LEFT) }}</span></td>
                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $colors = ['#d40d1f','#a60717','#111116','#ef4444','#f97316','#0f766e','#be123c','#7f1d1d'];
                                    $color = $colors[$testimonial->id % count($colors)];
                                @endphp
                                <div class="avatar-circle" style="background: {{ $color }};">{{ strtoupper(substr($testimonial->reviewer_name, 0, 1)) }}</div>
                                <div>
                                    <p class="table-main-text">{{ $testimonial->reviewer_name }}</p>
                                    <p class="table-sub-text">{{ $testimonial->reviewer_type ?: 'Reviewer' }}{{ $testimonial->is_featured ? ' | Featured' : '' }}</p>
                                </div>
                            </div>
                        </td>
                        <td style="color:#475569; max-width:420px;">{{ \Illuminate\Support\Str::limit($testimonial->review_text, 100) }}</td>
                        <td><span class="role-tag">{{ $testimonial->rating }} / 5</span></td>
                        <td>
                            @if($testimonial->status)
                                <div class="d-flex align-items-center gap-2"><span class="status-dot status-success"></span><span style="font-size:12.5px; color:#065F46;">Published</span></div>
                            @else
                                <div class="d-flex align-items-center gap-2"><span class="status-dot status-warning"></span><span style="font-size:12.5px; color:#92400E;">Draft</span></div>
                            @endif
                        </td>
                        <td>
                            <div class="action-row">
                                @can('result_testimonial_access')
                                    <a href="{{ route('admin.result-testimonials.show', $testimonial->id) }}" class="btn-outline"><i class="fas fa-eye"></i>View</a>
                                @endcan
                                @can('result_testimonial_edit')
                                    <a href="{{ route('admin.result-testimonials.edit', $testimonial->id) }}" class="btn-outline btn-outline-edit"><i class="fas fa-pencil-alt"></i>Edit</a>
                                @endcan
                                @can('result_testimonial_delete')
                                    <form action="{{ route('admin.result-testimonials.destroy', $testimonial->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
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
    initAdminDataTable('.datatable-ResultTestimonial', {
        canDelete: @can('result_testimonial_delete') true @else false @endcan,
        searchPlaceholder: 'Search testimonials...',
        infoText: 'Showing _START_-_END_ of _TOTAL_ testimonials'
    });
});
</script>
@endsection
