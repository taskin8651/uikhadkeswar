@extends('layouts.admin')

@section('page-title', 'Admission Inquiries')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Admission Inquiries</h2>

        <p class="admin-page-subtitle">
            Admission form and modal inquiry submissions
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
        <p class="stat-label">Sources</p>
        <p class="stat-value">{{ $inquiries->pluck('source')->filter()->unique()->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Admission Inquiries</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Admission forms and popup submissions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-AdmissionInquiry">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Student</th>
                    <th>Parent</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Class</th>
                    <th>Source</th>
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
                                    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
                                    $color = $colors[$inquiry->id % count($colors)];
                                @endphp

                                <div class="avatar-circle" style="background: {{ $color }};">
                                    {{ strtoupper(substr($inquiry->student_name, 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $inquiry->student_name }}</p>
                                    <p class="table-sub-text">Admission Inquiry</p>
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
                            @if($inquiry->email)
                                <a href="mailto:{{ $inquiry->email }}" style="color:#2563EB;">
                                    {{ $inquiry->email }}
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
                            {{ $inquiry->student_class ?: '—' }}
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ $inquiry->source ?: 'Website' }}
                            </span>
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
                                @can('admission_inquiry_delete')
                                    <form action="{{ route('admin.admission-inquiries.destroy', $inquiry->id) }}"
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
    initAdminDataTable('.datatable-AdmissionInquiry', {
        canDelete: @can('admission_inquiry_delete') true @else false @endcan,
        searchPlaceholder: 'Search admission inquiries...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ admission inquiries'
    });
});
</script>
@endsection