@extends('layouts.admin')

@section('page-title', 'Startup Cards')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Startup Cards</h2>

        <p class="admin-page-subtitle">
            Manage startup overview, vision, roadmap and feature cards shown on frontend
        </p>
    </div>

    @can('startup_card_create')
        <a href="{{ route('admin.startup-cards.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Card
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Cards</p>
        <p class="stat-value">{{ $startupCards->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $startupCards->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $startupCards->where('status', false)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Featured</p>
        <p class="stat-value">{{ $startupCards->where('is_featured', true)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Startup Cards</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Section controls frontend placement
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-StartupCard">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Section</th>
                    <th>Order</th>
                    <th>Card</th>
                    <th>Icon</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($startupCards as $card)
                    @php
                        $defaultIcon = $card->icon ?: 'bi bi-lightbulb-fill';

                        $sectionLabels = [
                            'overview' => 'Overview',
                            'roadmap' => 'Roadmap',
                            'vision' => 'Vision',
                            'mission' => 'Mission',
                            'feature' => 'Feature',
                            'startup' => 'Startup',
                        ];

                        $sectionName = $sectionLabels[$card->section] ?? ucfirst((string) $card->section);
                    @endphp

                    <tr data-entry-id="{{ $card->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $card->id }}</span>
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ $sectionName ?: 'General' }}
                            </span>
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ str_pad($card->sort_order, 2, '0', STR_PAD_LEFT) }}
                            </span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
                                    $color  = $colors[$card->id % count($colors)];
                                @endphp

                                <div class="avatar-circle" style="background: {{ $color }};">
                                    <i class="{{ $defaultIcon }}"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $card->title }}</p>

                                    <p class="table-sub-text">
                                        {{ \Illuminate\Support\Str::limit($card->description, 90) ?: 'No description added' }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">
                                <i class="{{ $defaultIcon }}" style="margin-right:5px;"></i>
                                {{ $defaultIcon }}
                            </span>
                        </td>

                        <td>
                            @if($card->is_featured)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#065F46;">Featured</span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px; color:#92400E;">Normal</span>
                                </div>
                            @endif
                        </td>

                        <td>
                            @if($card->status)
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
                                @can('startup_card_show')
                                    <a href="{{ route('admin.startup-cards.show', $card->id) }}" class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('startup_card_edit')
                                    <a href="{{ route('admin.startup-cards.edit', $card->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('startup_card_delete')
                                    <form action="{{ route('admin.startup-cards.destroy', $card->id) }}"
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
    initAdminDataTable('.datatable-StartupCard', {
        canDelete: @can('startup_card_delete') true @else false @endcan,
        searchPlaceholder: 'Search startup cards...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ startup cards'
    });
});
</script>
@endsection