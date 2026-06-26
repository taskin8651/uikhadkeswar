<aside id="sidebar">

    {{-- BRAND --}}
    <div class="sidebar-brand">
        <div class="brand-area">
            <div class="brand-icon">
                <i class="fas fa-bolt"></i>
            </div>

            <span class="brand-text">
                {{ trans('panel.site_title') }}
            </span>
        </div>
    </div>

    {{-- USER MINI CARD --}}
    <div class="user-info">
        <div class="user-avatar">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>

        <div class="user-meta">
            <p class="user-name">{{ auth()->user()->name }}</p>
            <p class="user-role">Administrator</p>
        </div>
    </div>

    {{-- NAV --}}
    <nav class="sidebar-nav">

        <p class="sidebar-section-title nav-label">Main</p>

        {{-- Dashboard --}}
        <a href="{{ route('admin.home') }}"
           data-tooltip="Dashboard"
           class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}">
            <i class="fas fa-chart-pie nav-icon"></i>
            <span class="nav-label">{{ trans('global.dashboard') }}</span>
        </a>

        {{-- USER MANAGEMENT GROUP --}}
        @can('user_management_access')
            @php
                $umActive = request()->is('admin/permissions*')
                    || request()->is('admin/roles*')
                    || request()->is('admin/users*')
                    || request()->is('admin/audit-logs*');
            @endphp

            <div x-data="{ open: {{ $umActive ? 'true' : 'false' }} }">

                <button type="button"
                        @click="open = !open"
                        data-tooltip="Users"
                        class="nav-link nav-group-btn {{ $umActive ? 'active' : '' }}">

                    <div class="nav-group-left">
                        <i class="fas fa-users nav-icon"></i>
                        <span class="nav-label">{{ trans('cruds.userManagement.title') }}</span>
                    </div>

                    <i class="fas fa-chevron-right chevron"
                       :style="open ? 'transform:rotate(90deg)' : ''"></i>
                </button>

                <div class="submenu"
                     x-show="open"
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 -translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 -translate-y-1">

                    @can('permission_access')
                        <a href="{{ route('admin.permissions.index') }}"
                           class="sub-link {{ request()->is('admin/permissions*') ? 'active' : '' }}">
                            <i class="fas fa-key"></i>
                            {{ trans('cruds.permission.title') }}
                        </a>
                    @endcan

                    @can('role_access')
                        <a href="{{ route('admin.roles.index') }}"
                           class="sub-link {{ request()->is('admin/roles*') ? 'active' : '' }}">
                            <i class="fas fa-shield-alt"></i>
                            {{ trans('cruds.role.title') }}
                        </a>
                    @endcan

                    @can('user_access')
                        <a href="{{ route('admin.users.index') }}"
                           class="sub-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                            <i class="fas fa-user-circle"></i>
                            {{ trans('cruds.user.title') }}
                        </a>
                    @endcan

                    @can('audit_log_access')
                        <a href="{{ route('admin.audit-logs.index') }}"
                           class="sub-link {{ request()->is('admin/audit-logs*') ? 'active' : '' }}">
                            <i class="fas fa-history"></i>
                            {{ trans('cruds.auditLog.title') }}
                        </a>
                    @endcan

                </div>
            </div>
        @endcan

        @can('result_ranker_access')
            <a href="{{ route('admin.result-rankers.index') }}"
               data-tooltip="Results"
               class="nav-link {{ request()->is('admin/result-rankers*') ? 'active' : '' }}">
                <i class="fas fa-trophy nav-icon"></i>
                <span class="nav-label">Result Rankers</span>
            </a>
        @endcan

        @can('home_hero_setting_access')
            <a href="{{ route('admin.home-hero-settings.edit') }}"
               data-tooltip="Home Hero"
               class="nav-link {{ request()->is('admin/home-hero-settings*') ? 'active' : '' }}">
                <i class="fas fa-home nav-icon"></i>
                <span class="nav-label">Home Hero</span>
            </a>
        @endcan

        @can('startup_trust_card_access')
            <a href="{{ route('admin.startup-trust-cards.index') }}"
               data-tooltip="Trust"
               class="nav-link {{ request()->is('admin/startup-trust-cards*') ? 'active' : '' }}">
                <i class="fas fa-handshake nav-icon"></i>
                <span class="nav-label">Startup Trust Cards</span>
            </a>
        @endcan

        @can('key_point_trust_card_access')
            <a href="{{ route('admin.key-point-trust-cards.index') }}"
               data-tooltip="Parent Trust"
               class="nav-link {{ request()->is('admin/key-point-trust-cards*') ? 'active' : '' }}">
                <i class="fas fa-shield-alt nav-icon"></i>
                <span class="nav-label">Parent Trust Cards</span>
            </a>
        @endcan

        @can('result_testimonial_access')
            <a href="{{ route('admin.result-testimonials.index') }}"
               data-tooltip="Reviews"
               class="nav-link {{ request()->is('admin/result-testimonials*') ? 'active' : '' }}">
                <i class="fas fa-comment-dots nav-icon"></i>
                <span class="nav-label">Result Testimonials</span>
            </a>
        @endcan

        @can('gallery_item_access')
            <a href="{{ route('admin.gallery-items.index') }}"
               data-tooltip="Gallery"
               class="nav-link {{ request()->is('admin/gallery-items*') ? 'active' : '' }}">
                <i class="fas fa-images nav-icon"></i>
                <span class="nav-label">Gallery Items</span>
            </a>
        @endcan

        @can('resource_item_access')
            <a href="{{ route('admin.resource-items.index') }}"
               data-tooltip="Resources"
               class="nav-link {{ request()->is('admin/resource-items*') ? 'active' : '' }}">
                <i class="fas fa-folder-open nav-icon"></i>
                <span class="nav-label">Resource Items</span>
            </a>
        @endcan

        @can('faculty_member_access')
            <a href="{{ route('admin.faculty-members.index') }}"
               data-tooltip="Faculty"
               class="nav-link {{ request()->is('admin/faculty-members*') ? 'active' : '' }}">
                <i class="fas fa-chalkboard-teacher nav-icon"></i>
                <span class="nav-label">Faculty Members</span>
            </a>
        @endcan

        @can('startup_card_access')
            <a href="{{ route('admin.startup-cards.index') }}"
               data-tooltip="Startup"
               class="nav-link {{ request()->is('admin/startup-cards*') ? 'active' : '' }}">
                <i class="fas fa-rocket nav-icon"></i>
                <span class="nav-label">Startup Cards</span>
            </a>
        @endcan

        @can('contact_inquiry_access')
            <a href="{{ route('admin.contact-inquiries.index') }}"
               data-tooltip="Contact"
               class="nav-link {{ request()->is('admin/contact-inquiries*') ? 'active' : '' }}">
                <i class="fas fa-envelope nav-icon"></i>
                <span class="nav-label">Contact Inquiries</span>
            </a>
        @endcan

        @can('admission_inquiry_access')
            <a href="{{ route('admin.admission-inquiries.index') }}"
               data-tooltip="Admission"
               class="nav-link {{ request()->is('admin/admission-inquiries*') ? 'active' : '' }}">
                <i class="fas fa-user-graduate nav-icon"></i>
                <span class="nav-label">Admission Inquiries</span>
            </a>
        @endcan

        @can('scholarship_inquiry_access')
            <a href="{{ route('admin.scholarship-inquiries.index') }}"
               data-tooltip="Scholarship"
               class="nav-link {{ request()->is('admin/scholarship-inquiries*') ? 'active' : '' }}">
                <i class="fas fa-award nav-icon"></i>
                <span class="nav-label">Scholarship Inquiries</span>
            </a>
        @endcan

       {{-- ABOUT US GROUP --}}
@can('about_us_access')
    @php
        $aboutActive = request()->is('admin/founder-section*')
            || request()->is('admin/founder-responsibilities*')
            || request()->is('admin/founder-timelines*')
            || request()->is('admin/about-why-items*')
            || request()->is('admin/company-recognitions*')
             || request()->is('admin/about-page-content*');
    @endphp

    <div x-data="{ open: {{ $aboutActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="About Us"
                class="nav-link nav-group-btn {{ $aboutActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-info-circle nav-icon"></i>
                <span class="nav-label">About Us</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('founder_section_access')
                <a href="{{ route('admin.founder-section.edit') }}"
                   class="sub-link {{ request()->is('admin/founder-section*') ? 'active' : '' }}">
                    <i class="fas fa-user-tie"></i>
                    Founder Section
                </a>
            @endcan

            @can('founder_responsibility_access')
                <a href="{{ route('admin.founder-responsibilities.index') }}"
                   class="sub-link {{ request()->is('admin/founder-responsibilities*') ? 'active' : '' }}">
                    <i class="fas fa-tasks"></i>
                    Founder Responsibilities
                </a>
            @endcan
            @can('founder_timeline_access')
    <a href="{{ route('admin.founder-timelines.index') }}"
       class="sub-link {{ request()->is('admin/founder-timelines*') ? 'active' : '' }}">
        <i class="fas fa-clock"></i>
        Founder Timeline
    </a>
@endcan
@can('about_page_content_access')
    <a href="{{ route('admin.about-page-content.edit') }}"
       class="sub-link {{ request()->is('admin/about-page-content*') ? 'active' : '' }}">
        <i class="fas fa-building"></i>
        About Page Content
    </a>
@endcan

            @can('about_why_item_access')
                <a href="{{ route('admin.about-why-items.index') }}"
                   class="sub-link {{ request()->is('admin/about-why-items*') ? 'active' : '' }}">
                    <i class="fas fa-award"></i>
                    Why Choose Cards
                </a>
            @endcan

            @can('company_recognition_access')
                <a href="{{ route('admin.company-recognitions.index') }}"
                   class="sub-link {{ request()->is('admin/company-recognitions*') ? 'active' : '' }}">
                    <i class="fas fa-certificate"></i>
                    Company Recognitions
                </a>
            @endcan

        </div>
    </div>
@endcan

        <div class="nav-divider"></div>

        <p class="sidebar-section-title compact nav-label">Account</p>

        {{-- Change Password --}}
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <a href="{{ route('profile.password.edit') }}"
                   data-tooltip="Password"
                   class="nav-link {{ request()->is('profile/password*') ? 'active' : '' }}">
                    <i class="fas fa-key nav-icon"></i>
                    <span class="nav-label">{{ trans('global.change_password') }}</span>
                </a>
            @endcan
        @endif

        {{-- Settings --}}
        @can('website_setting_access')
            <a href="{{ route('admin.website-settings.edit') }}"
               data-tooltip="Settings"
               class="nav-link {{ request()->is('admin/website-settings*') ? 'active' : '' }}">
                <i class="fas fa-cog nav-icon"></i>
                <span class="nav-label">Website Settings</span>
            </a>
        @endcan

    </nav>

    {{-- LOGOUT --}}
    <div class="sidebar-footer">
        <a href="#"
           onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
           data-tooltip="Logout"
           class="nav-link logout-link">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <span class="nav-label">{{ trans('global.logout') }}</span>
        </a>
    </div>

</aside>
