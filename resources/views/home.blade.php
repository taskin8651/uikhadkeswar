@extends('layouts.admin')

@section('styles')
<style>
    .dash-hero {
        background: linear-gradient(135deg, #111116 0%, #a60717 58%, #d40d1f 100%);
        border-radius: 18px;
        color: #fff;
        padding: 26px;
        margin-bottom: 22px;
        position: relative;
        overflow: hidden;
    }
    .dash-hero::after {
        content: '';
        position: absolute;
        width: 260px;
        height: 260px;
        border-radius: 50%;
        background: rgba(255,255,255,.11);
        right: -70px;
        top: -90px;
    }
    .dash-hero h2 { margin: 0; font-size: 26px; font-weight: 800; }
    .dash-hero p { margin: 8px 0 0; opacity: .86; max-width: 760px; }
    .dash-section-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        margin: 24px 0 12px;
    }
    .dash-section-head h3 {
        font-size: 17px;
        font-weight: 800;
        color: #111827;
        margin: 0;
    }
    .dash-section-head span {
        font-size: 12px;
        color: #6b7280;
    }
    .dash-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 14px;
    }
    .dash-card {
        background: #fff;
        border: 1px solid #eadfe1;
        border-radius: 14px;
        padding: 16px;
        text-decoration: none;
        display: flex;
        gap: 13px;
        align-items: flex-start;
        transition: transform .18s ease, box-shadow .18s ease;
        min-height: 104px;
    }
    .dash-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 18px 45px rgba(17, 17, 22, .08);
        text-decoration: none;
    }
    .dash-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        flex: 0 0 auto;
    }
    .dash-card small {
        display: block;
        color: #6b7280;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .04em;
        line-height: 1.35;
    }
    .dash-card strong {
        display: block;
        color: #111827;
        font-size: 28px;
        line-height: 1;
        margin-top: 8px;
    }
    .dash-panel-grid {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 14px;
        margin-top: 20px;
    }
    .dash-panel {
        background: #fff;
        border: 1px solid #eadfe1;
        border-radius: 14px;
        overflow: hidden;
    }
    .dash-panel-header {
        padding: 14px 16px;
        border-bottom: 1px solid #f3f4f6;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
    }
    .dash-panel-header h3 {
        margin: 0;
        font-size: 15px;
        font-weight: 800;
        color: #111827;
    }
    .dash-panel-header a {
        font-size: 12px;
        font-weight: 700;
        color: #d40d1f;
        text-decoration: none;
    }
    .dash-list {
        padding: 6px 0;
    }
    .dash-list-item {
        padding: 11px 16px;
        border-bottom: 1px solid #f9fafb;
    }
    .dash-list-item:last-child { border-bottom: 0; }
    .dash-list-item strong {
        display: block;
        color: #111827;
        font-size: 13px;
        line-height: 1.35;
    }
    .dash-list-item span {
        display: block;
        color: #6b7280;
        font-size: 12px;
        margin-top: 4px;
    }
    .dash-actions {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 10px;
        margin-top: 14px;
    }
    .dash-action {
        background: #fff;
        border: 1px solid #eadfe1;
        border-radius: 12px;
        padding: 13px 14px;
        display: flex;
        align-items: center;
        gap: 10px;
        color: #111827;
        text-decoration: none;
        font-size: 13px;
        font-weight: 800;
    }
    .dash-action:hover { text-decoration: none; color: #d40d1f; border-color: #fecdd3; }
    @media(max-width: 1200px) {
        .dash-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
        .dash-panel-grid { grid-template-columns: 1fr; }
        .dash-actions { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    @media(max-width: 700px) {
        .dash-grid { grid-template-columns: 1fr; }
        .dash-actions { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')

<div class="dash-hero">
    <div style="position: relative; z-index: 1;">
        <h2>Dashboard</h2>
        <p>
            Welcome back, <strong>{{ auth()->user()->name }}</strong>. Manage website content, inquiries,
            media, results, faculty, startup sections and system records from one place.
        </p>
    </div>
</div>

<div class="dash-section-head">
    <div>
        <h3>Inquiries</h3>
        <span>Student, admission and scholarship leads</span>
    </div>
</div>

<div class="dash-grid">
    @foreach($inquiryCards as $card)
        <a href="{{ $card['route'] }}" class="dash-card">
            <span class="dash-icon" style="background: {{ $card['color'] }};"><i class="fas {{ $card['icon'] }}"></i></span>
            <span>
                <small>{{ $card['label'] }}</small>
                <strong>{{ $card['count'] }}</strong>
            </span>
        </a>
    @endforeach
</div>

<div class="dash-section-head">
    <div>
        <h3>Website Content Models</h3>
        <span>All dynamic frontend sections and media modules</span>
    </div>
</div>

<div class="dash-grid">
    @foreach($contentCards as $card)
        <a href="{{ $card['route'] }}" class="dash-card">
            <span class="dash-icon" style="background: {{ $card['color'] }};"><i class="fas {{ $card['icon'] }}"></i></span>
            <span>
                <small>{{ $card['label'] }}</small>
                <strong>{{ $card['count'] }}</strong>
            </span>
        </a>
    @endforeach
</div>

<div class="dash-section-head">
    <div>
        <h3>System Models</h3>
        <span>Users, permissions and audit history</span>
    </div>
</div>

<div class="dash-grid">
    @foreach($systemCards as $card)
        <a href="{{ $card['route'] }}" class="dash-card">
            <span class="dash-icon" style="background: {{ $card['color'] }};"><i class="fas {{ $card['icon'] }}"></i></span>
            <span>
                <small>{{ $card['label'] }}</small>
                <strong>{{ $card['count'] }}</strong>
            </span>
        </a>
    @endforeach
</div>

<div class="dash-panel-grid">
    <div class="dash-panel">
        <div class="dash-panel-header">
            <h3>Recent Contact Inquiries</h3>
            <a href="{{ route('admin.contact-inquiries.index') }}">View All</a>
        </div>
        <div class="dash-list">
            @forelse($recentContactInquiries as $inquiry)
                <div class="dash-list-item">
                    <strong>{{ $inquiry->name }} - {{ $inquiry->course }}</strong>
                    <span>{{ $inquiry->phone }} · {{ $inquiry->created_at->diffForHumans() }}</span>
                </div>
            @empty
                <div class="dash-list-item"><span>No contact inquiries yet.</span></div>
            @endforelse
        </div>
    </div>

    <div class="dash-panel">
        <div class="dash-panel-header">
            <h3>Recent Admission Inquiries</h3>
            <a href="{{ route('admin.admission-inquiries.index') }}">View All</a>
        </div>
        <div class="dash-list">
            @forelse($recentAdmissionInquiries as $inquiry)
                <div class="dash-list-item">
                    <strong>{{ $inquiry->student_name }} - {{ $inquiry->course_interested }}</strong>
                    <span>{{ $inquiry->mobile_number }} · {{ $inquiry->created_at->diffForHumans() }}</span>
                </div>
            @empty
                <div class="dash-list-item"><span>No admission inquiries yet.</span></div>
            @endforelse
        </div>
    </div>

    <div class="dash-panel">
        <div class="dash-panel-header">
            <h3>Recent Scholarship Inquiries</h3>
            <a href="{{ route('admin.scholarship-inquiries.index') }}">View All</a>
        </div>
        <div class="dash-list">
            @forelse($recentScholarshipInquiries as $inquiry)
                <div class="dash-list-item">
                    <strong>{{ $inquiry->student_name }} - {{ $inquiry->eligibility_category }}</strong>
                    <span>{{ $inquiry->mobile_number }} · {{ $inquiry->created_at->diffForHumans() }}</span>
                </div>
            @empty
                <div class="dash-list-item"><span>No scholarship inquiries yet.</span></div>
            @endforelse
        </div>
    </div>
</div>

<div class="dash-panel" style="margin-top: 16px;">
    <div class="dash-panel-header">
        <h3>Recent Audit Logs</h3>
        <a href="{{ route('admin.audit-logs.index') }}">View Logs</a>
    </div>
    <div class="dash-list">
        @forelse($recentAuditLogs as $log)
            <div class="dash-list-item">
                <strong>{{ $log->description ?: 'Activity recorded' }}</strong>
                <span>{{ class_basename($log->subject_type) ?: 'System' }} · {{ optional($log->created_at)->diffForHumans() }}</span>
            </div>
        @empty
            <div class="dash-list-item"><span>No audit activity yet.</span></div>
        @endforelse
    </div>
</div>

<div class="dash-section-head">
    <div>
        <h3>Quick Actions</h3>
        <span>Frequently used admin pages</span>
    </div>
</div>

<div class="dash-actions">
    <a href="{{ route('admin.website-settings.edit') }}" class="dash-action"><i class="fas fa-cog"></i> Website Settings</a>
    <a href="{{ route('admin.home-hero-settings.edit') }}" class="dash-action"><i class="fas fa-home"></i> Home Hero</a>
    <a href="{{ route('admin.resource-items.create') }}" class="dash-action"><i class="fas fa-folder-plus"></i> Add Resource</a>
    <a href="{{ route('admin.gallery-items.create') }}" class="dash-action"><i class="fas fa-image"></i> Add Gallery</a>
    <a href="{{ route('admin.faculty-members.create') }}" class="dash-action"><i class="fas fa-chalkboard-teacher"></i> Add Faculty</a>
</div>

@endsection
