@extends('layouts.admin')

@section('page-title', 'Scholarship Inquiries')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Scholarship Inquiries</h2>

        <p class="admin-page-subtitle">
            Scholarship and fee concession inquiry submissions
        </p>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Inquiries</p>
        <p class="stat-value">{{ $inquiries->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Today</p>
        <p class="stat-value">
            {{ $inquiries->filter(fn($inquiry) => optional($inquiry->created_at)->isToday())->count() }}
        </p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Courses</p>
        <p class="stat-value">{{ $inquiries->pluck('course_interested')->filter()->unique()->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Eligibility Types</p>
        <p class="stat-value">{{ $inquiries->pluck('eligibility_category')->filter()->unique()->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Scholarship Inquiries</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Scholarship and concession requests
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ScholarshipInquiry">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Student</th>
                    <th>Parent</th>
                    <th>Mobile</th>
                    <th>Course</th>
                    <th>Class</th>
                    <th>Eligibility</th>
                    <th>Percentage</th>
                    <th>Date</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($inquiries as $inquiry)
                    <tr data-entry-id="{{ $inquiry->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $inquiry->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $colors = ['#d40d1f','#a60717','#111116','#ef4444','#f97316','#0f766e','#be123c','#7f1d1d'];
                                    $color = $colors[$inquiry->id % count($colors)];
                                @endphp

                                <div class="avatar-circle" style="background: {{ $color }};">
                                    {{ strtoupper(substr($inquiry->student_name, 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $inquiry->student_name }}</p>
                                    <p class="table-sub-text">Scholarship Inquiry</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            {{ $inquiry->parent_name ?: '—' }}
                        </td>

                        <td>
                            @if($inquiry->mobile_number)
                                <a href="tel:{{ $inquiry->mobile_number }}" class="code-pill">
                                    {{ $inquiry->mobile_number }}
                                </a>
                            @else
                                —
                            @endif
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ $inquiry->course_interested ?: '—' }}
                            </span>
                        </td>

                        <td>
                            {{ $inquiry->current_class ?: '—' }}
                        </td>

                        <td style="max-width:260px;color:#475569;">
                            {{ $inquiry->eligibility_category ?: '—' }}
                        </td>

                        <td>
                            @if($inquiry->last_percentage)
                                <span class="role-tag">
                                    {{ $inquiry->last_percentage }}
                                </span>
                            @else
                                —
                            @endif
                        </td>

                        <td>
                            <span class="table-main-text">
                                {{ optional($inquiry->created_at)->format('d M Y') }}
                            </span>

                            <p class="table-sub-text">
                                {{ optional($inquiry->created_at)->format('h:i A') }}
                            </p>
                        </td>

                        <td>
                            <div class="action-row">
                                @can('scholarship_inquiry_delete')
                                    <form action="{{ route('admin.scholarship-inquiries.destroy', $inquiry->id) }}"
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
    initAdminDataTable('.datatable-ScholarshipInquiry', {
        canDelete: @can('scholarship_inquiry_delete') true @else false @endcan,
        searchPlaceholder: 'Search scholarship inquiries...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ scholarship inquiries'
    });
});
</script>
@endsection