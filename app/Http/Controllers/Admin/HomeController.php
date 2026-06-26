<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutPageContent;
use App\Models\AboutWhyItem;
use App\Models\AdmissionInquiry;
use App\Models\AuditLog;
use App\Models\CompanyRecognition;
use App\Models\ContactInquiry;
use App\Models\FacultyMember;
use App\Models\FounderResponsibility;
use App\Models\FounderSection;
use App\Models\FounderTimeline;
use App\Models\GalleryCategory;
use App\Models\GalleryItem;
use App\Models\HomeHeroSetting;
use App\Models\KeyPointTrustCard;
use App\Models\Permission;
use App\Models\ResourceItem;
use App\Models\ResultRanker;
use App\Models\ResultTestimonial;
use App\Models\Role;
use App\Models\ScholarshipInquiry;
use App\Models\StartupCard;
use App\Models\StartupTrustCard;
use App\Models\User;
use App\Models\WebsiteSetting;

class HomeController
{
    public function index()
    {
        $contentCards = [
            ['label' => 'Home Hero', 'count' => HomeHeroSetting::count(), 'icon' => 'fa-home', 'route' => route('admin.home-hero-settings.edit'), 'color' => '#4F46E5'],
            ['label' => 'Website Settings', 'count' => WebsiteSetting::count(), 'icon' => 'fa-cog', 'route' => route('admin.website-settings.edit'), 'color' => '#0EA5E9'],
            ['label' => 'Founder Section', 'count' => FounderSection::count(), 'icon' => 'fa-user-tie', 'route' => route('admin.founder-section.edit'), 'color' => '#10B981'],
            ['label' => 'Founder Responsibilities', 'count' => FounderResponsibility::count(), 'icon' => 'fa-tasks', 'route' => route('admin.founder-responsibilities.index'), 'color' => '#F59E0B'],
            ['label' => 'Founder Timeline', 'count' => FounderTimeline::count(), 'icon' => 'fa-clock', 'route' => route('admin.founder-timelines.index'), 'color' => '#8B5CF6'],
            ['label' => 'About Page Content', 'count' => AboutPageContent::count(), 'icon' => 'fa-building', 'route' => route('admin.about-page-content.edit'), 'color' => '#EF4444'],
            ['label' => 'Why Choose Cards', 'count' => AboutWhyItem::count(), 'icon' => 'fa-award', 'route' => route('admin.about-why-items.index'), 'color' => '#14B8A6'],
            ['label' => 'Company Recognitions', 'count' => CompanyRecognition::count(), 'icon' => 'fa-certificate', 'route' => route('admin.company-recognitions.index'), 'color' => '#EC4899'],
            ['label' => 'Result Rankers', 'count' => ResultRanker::count(), 'icon' => 'fa-trophy', 'route' => route('admin.result-rankers.index'), 'color' => '#D97706'],
            ['label' => 'Result Testimonials', 'count' => ResultTestimonial::count(), 'icon' => 'fa-comment-dots', 'route' => route('admin.result-testimonials.index'), 'color' => '#6366F1'],
            ['label' => 'Gallery Categories', 'count' => GalleryCategory::count(), 'icon' => 'fa-tags', 'route' => route('admin.gallery-items.index'), 'color' => '#0891B2'],
            ['label' => 'Gallery Items', 'count' => GalleryItem::count(), 'icon' => 'fa-images', 'route' => route('admin.gallery-items.index'), 'color' => '#059669'],
            ['label' => 'Faculty Members', 'count' => FacultyMember::count(), 'icon' => 'fa-chalkboard-teacher', 'route' => route('admin.faculty-members.index'), 'color' => '#7C3AED'],
            ['label' => 'Startup Cards', 'count' => StartupCard::count(), 'icon' => 'fa-rocket', 'route' => route('admin.startup-cards.index'), 'color' => '#EA580C'],
            ['label' => 'Startup Trust Cards', 'count' => StartupTrustCard::count(), 'icon' => 'fa-handshake', 'route' => route('admin.startup-trust-cards.index'), 'color' => '#BE123C'],
            ['label' => 'Parent Trust Cards', 'count' => KeyPointTrustCard::count(), 'icon' => 'fa-shield-alt', 'route' => route('admin.key-point-trust-cards.index'), 'color' => '#1D4ED8'],
            ['label' => 'Resource Items', 'count' => ResourceItem::count(), 'icon' => 'fa-folder-open', 'route' => route('admin.resource-items.index'), 'color' => '#4338CA'],
        ];

        $inquiryCards = [
            ['label' => 'Contact Inquiries', 'count' => ContactInquiry::count(), 'icon' => 'fa-envelope', 'route' => route('admin.contact-inquiries.index'), 'color' => '#0F766E'],
            ['label' => 'Admission Inquiries', 'count' => AdmissionInquiry::count(), 'icon' => 'fa-user-graduate', 'route' => route('admin.admission-inquiries.index'), 'color' => '#2563EB'],
            ['label' => 'Scholarship Inquiries', 'count' => ScholarshipInquiry::count(), 'icon' => 'fa-award', 'route' => route('admin.scholarship-inquiries.index'), 'color' => '#B45309'],
        ];

        $systemCards = [
            ['label' => 'Users', 'count' => User::count(), 'icon' => 'fa-users', 'route' => route('admin.users.index'), 'color' => '#4B5563'],
            ['label' => 'Roles', 'count' => Role::count(), 'icon' => 'fa-shield-alt', 'route' => route('admin.roles.index'), 'color' => '#64748B'],
            ['label' => 'Permissions', 'count' => Permission::count(), 'icon' => 'fa-key', 'route' => route('admin.permissions.index'), 'color' => '#475569'],
            ['label' => 'Audit Logs', 'count' => AuditLog::count(), 'icon' => 'fa-history', 'route' => route('admin.audit-logs.index'), 'color' => '#DC2626'],
        ];

        $recentContactInquiries = ContactInquiry::latest()->take(5)->get();
        $recentAdmissionInquiries = AdmissionInquiry::latest()->take(5)->get();
        $recentScholarshipInquiries = ScholarshipInquiry::latest()->take(5)->get();
        $recentAuditLogs = AuditLog::latest()->take(6)->get();

        return view('home', compact(
            'contentCards',
            'inquiryCards',
            'systemCards',
            'recentContactInquiries',
            'recentAdmissionInquiries',
            'recentScholarshipInquiries',
            'recentAuditLogs'
        ));
    }
}
