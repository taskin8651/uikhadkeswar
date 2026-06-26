@extends('layouts.admin')

@section('page-title', 'Faculty Members')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Faculty Members</h2>

        <p class="admin-page-subtitle">
            Manage faculty cards shown on the faculty page
        </p>
    </div>

    @can('faculty_member_create')
        <a href="{{ route('admin.faculty-members.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Faculty
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Faculty</p>
        <p class="stat-value">{{ $facultyMembers->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $facultyMembers->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $facultyMembers->where('status', false)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active Faculty</p>
        <p class="stat-value">{{ $facultyMembers->where('is_active', true)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Faculty Members</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Faculty images use media library
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-FacultyMember">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Order</th>
                    <th>Faculty</th>
                    <th>Subject</th>
                    <th>Active</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($facultyMembers as $member)
                    <tr data-entry-id="{{ $member->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $member->id }}</span>
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ str_pad($member->sort_order, 2, '0', STR_PAD_LEFT) }}
                            </span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                @if($member->imageUrl())
                                    <img src="{{ $member->imageUrl() }}"
                                         alt="{{ $member->name }}"
                                         style="width:48px;height:48px;object-fit:cover;border-radius:50%;border:1px solid #E2E8F0;">
                                @else
                                    @php
                                        $colors = ['#d40d1f','#a60717','#111116','#ef4444','#f97316','#0f766e','#be123c','#7f1d1d'];
                                        $color  = $colors[$member->id % count($colors)];
                                    @endphp

                                    <div class="avatar-circle" style="background: {{ $color }};">
                                        {{ strtoupper(substr($member->name, 0, 1)) }}
                                    </div>
                                @endif

                                <div>
                                    <p class="table-main-text">{{ $member->name }}</p>
                                    <p class="table-sub-text">{{ $member->badge ?: 'Faculty Member' }}</p>
                                </div>
                            </div>
                        </td>

                        <td style="color:#475569;">
                            {{ $member->subject ?: '—' }}
                        </td>

                        <td>
                            @if($member->is_active)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#065F46;">Active</span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px; color:#92400E;">Inactive</span>
                                </div>
                            @endif
                        </td>

                        <td>
                            @if($member->status)
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
                              

                                @can('faculty_member_edit')
                                    <a href="{{ route('admin.faculty-members.edit', $member->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('faculty_member_delete')
                                    <form action="{{ route('admin.faculty-members.destroy', $member->id) }}"
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
    initAdminDataTable('.datatable-FacultyMember', {
        canDelete: @can('faculty_member_delete') true @else false @endcan,
        searchPlaceholder: 'Search faculty...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ faculty members'
    });
});
</script>
@endsection