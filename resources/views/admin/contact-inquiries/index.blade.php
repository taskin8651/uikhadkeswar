@extends('layouts.admin')

@section('page-title', 'Contact Inquiries')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Contact Inquiries</h2>

        <p class="admin-page-subtitle">
            Manage contact page inquiry submissions
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
        <p class="stat-label">With Email</p>
        <p class="stat-value">{{ $inquiries->whereNotNull('email')->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Courses</p>
        <p class="stat-value">{{ $inquiries->pluck('course')->filter()->unique()->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Contact Inquiries</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Contact page submissions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ContactInquiry">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Message</th>
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
                                    {{ strtoupper(substr($inquiry->name, 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $inquiry->name }}</p>
                                    <p class="table-sub-text">Contact Inquiry</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            @if($inquiry->phone)
                                <a href="tel:{{ $inquiry->phone }}" class="code-pill">
                                    {{ $inquiry->phone }}
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
                                {{ $inquiry->course ?: 'General' }}
                            </span>
                        </td>

                        <td style="color:#475569; max-width:360px;">
                            {{ \Illuminate\Support\Str::limit($inquiry->message, 90) ?: '—' }}
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
                                @can('contact_inquiry_delete')
                                    <form action="{{ route('admin.contact-inquiries.destroy', $inquiry->id) }}"
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
    initAdminDataTable('.datatable-ContactInquiry', {
        canDelete: @can('contact_inquiry_delete') true @else false @endcan,
        searchPlaceholder: 'Search contact inquiries...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ contact inquiries'
    });
});
</script>
@endsection