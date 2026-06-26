@php
  $settings = $websiteSetting ?? null;
  $siteName = $settings?->site_name ?? 'Khadkeshwar NEET JEE Academy';
  $siteTagline = $settings?->site_tagline ?? 'AI Education Platform for Rural India';
  $logoAlt = $settings?->logo_alt ?? $siteName . ' Logo';
  $headerLogo = $settings?->mediaUrl('logo', asset('assets/img/imageedit_1_8311115967.png')) ?? asset('assets/img/imageedit_1_8311115967.png');
  $footerLogo = $settings?->mediaUrl('footer_logo', $settings?->mediaUrl('logo', asset('assets/img/logo.png'))) ?? asset('assets/img/logo.png');
  $favicon = $settings?->mediaUrl('favicon');
  $appleTouchIcon = $settings?->mediaUrl('apple_touch_icon');
  $ogImage = $settings?->mediaUrl('og_image', $headerLogo) ?? $headerLogo;
  $twitterImage = $settings?->mediaUrl('twitter_image', $ogImage) ?? $ogImage;
  $metaTitle = $settings?->meta_title ?? 'Khadkeshwar NEET JEE Academy Lonar | AI-Powered NEET & JEE Learning for Rural India';
  $metaDescription = $settings?->meta_description ?? 'Khadkeshwar NEET JEE Academy, Lonar offers NEET, JEE and Foundation coaching with personal guidance, test series, affordable fee structure and future AI-enabled learning plans.';
  $metaKeywords = $settings?->meta_keywords ?? 'NEET Coaching Lonar, JEE Coaching Lonar, Khadkeshwar Academy, NEET JEE Academy, Foundation Course, Test Series';
  $canonicalUrl = $settings?->canonical_url ?: url()->current();
  $robots = $settings?->robots ?? 'index, follow';
  $phonePrimary = $settings?->phone_primary ?? '+91 88568 22032';
  $emailPrimary = $settings?->email_primary ?? 'info@khadkeshwaracademy.com';
  $address = $settings?->address ?? 'Lonar, Buldhana, Maharashtra, India';
  $shortAddress = str_contains($address, ',') ? collect(explode(',', $address))->take(2)->implode(',') : $address;
  $telPrimary = $settings?->telLink($phonePrimary) ?? 'tel:+918856822032';
  $mailPrimary = $settings?->mailLink($emailPrimary) ?? 'mailto:info@khadkeshwaracademy.com';
  $whatsappUrl = $settings?->whatsappLink('Hello, I want admission information.') ?? 'https://wa.me/918856822032';
  $footerDescription = $settings?->footer_description ?? 'Khadkeshwar Academy is a rural-first AI education platform building a national learning brand for NEET & JEE aspirants through technology, mentorship and quality teaching.';
  $admissionBadgeText = $settings?->admission_badge_text ?? 'Admission Open 2026';
  $copyrightText = $settings?->copyright_text ?? 'Copyright 2026 Khadkeshwar NEET JEE Academy. All Rights Reserved.';
  $socialLinks = [
    'facebook' => ['url' => $settings?->facebook_url ?? null, 'icon' => 'bi bi-facebook', 'class' => 'knj-social-facebook', 'label' => 'Facebook'],
    'instagram' => ['url' => $settings?->instagram_url ?? null, 'icon' => 'bi bi-instagram', 'class' => 'knj-social-instagram', 'label' => 'Instagram'],
    'youtube' => ['url' => $settings?->youtube_url ?? null, 'icon' => 'bi bi-youtube', 'class' => 'knj-social-youtube', 'label' => 'YouTube'],
    'linkedin' => ['url' => $settings?->linkedin_url ?? null, 'icon' => 'bi bi-linkedin', 'class' => 'knj-social-linkedin', 'label' => 'LinkedIn'],
    'x' => ['url' => $settings?->x_url ?? null, 'icon' => 'bi bi-twitter-x', 'class' => 'knj-social-x', 'label' => 'X'],
    'telegram' => ['url' => $settings?->telegram_url ?? null, 'icon' => 'bi bi-telegram', 'class' => 'knj-social-telegram', 'label' => 'Telegram'],
  ];
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- =========================
       BASIC META
  ========================== -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>@yield('meta_title', $metaTitle)</title>

  <meta name="description" content="@yield('meta_description', $metaDescription)" />
  <meta name="keywords" content="@yield('meta_keywords', $metaKeywords)" />
  <meta name="robots" content="{{ $robots }}" />
  <link rel="canonical" href="@yield('canonical_url', $canonicalUrl)" />

  <meta property="og:title" content="@yield('og_title', $settings?->og_title ?? $metaTitle)" />
  <meta property="og:description" content="@yield('og_description', $settings?->og_description ?? $metaDescription)" />
  <meta property="og:image" content="{{ $ogImage }}" />
  <meta property="og:url" content="@yield('canonical_url', $canonicalUrl)" />
  <meta property="og:type" content="website" />

  <meta name="twitter:card" content="{{ $settings?->twitter_card ?? 'summary_large_image' }}" />
  <meta name="twitter:title" content="@yield('twitter_title', $settings?->twitter_title ?? $metaTitle)" />
  <meta name="twitter:description" content="@yield('twitter_description', $settings?->twitter_description ?? $metaDescription)" />
  <meta name="twitter:image" content="{{ $twitterImage }}" />

  @if($favicon)
    <link rel="icon" href="{{ $favicon }}">
  @endif
  @if($appleTouchIcon)
    <link rel="apple-touch-icon" href="{{ $appleTouchIcon }}">
  @endif

  @if(!empty($settings?->google_analytics_id))
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $settings->google_analytics_id }}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '{{ $settings->google_analytics_id }}');
    </script>
  @endif

  @if(!empty($settings?->google_tag_manager_id))
    <script>
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','{{ $settings->google_tag_manager_id }}');
    </script>
  @endif

  @if(!empty($settings?->facebook_pixel_id))
    <script>
      !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
      n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
      document,'script','https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '{{ $settings->facebook_pixel_id }}');
      fbq('track', 'PageView');
    </script>
  @endif

  <!-- =========================
       GOOGLE FONT
  ========================== -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- =========================
       CSS LINKS
  ========================== -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  @if(!empty($settings?->google_tag_manager_id))
    <noscript>
      <iframe src="https://www.googletagmanager.com/ns.html?id={{ $settings->google_tag_manager_id }}"
              height="0"
              width="0"
              style="display:none;visibility:hidden"></iframe>
    </noscript>
  @endif

  @if(!empty($settings?->facebook_pixel_id))
    <noscript>
      <img height="1"
           width="1"
           style="display:none"
           src="https://www.facebook.com/tr?id={{ $settings->facebook_pixel_id }}&ev=PageView&noscript=1"
           alt="">
    </noscript>
  @endif

  <!-- ========================= TOP BAR START ========================== -->
  <div class="top-bar">
    <div class="container">
      <div class="top-bar-wrap">

        <div class="top-info">

          <a href="{{ $telPrimary }}" class="top-info-item top-phone">
            <span class="top-info-icon">
              <i class="bi bi-telephone-fill"></i>
            </span>
            <span class="top-info-text">
              <small>Call Admission</small>
              <strong>{{ $phonePrimary }}</strong>
            </span>
          </a>

          <a href="{{ $mailPrimary }}" class="top-info-item top-email">
            <span class="top-info-icon">
              <i class="bi bi-envelope-fill"></i>
            </span>
            <span class="top-info-text">
              <small>Email Us</small>
              <strong>{{ $emailPrimary }}</strong>
            </span>
          </a>

          <span class="top-info-item top-location">
            <span class="top-info-icon">
              <i class="bi bi-geo-alt-fill"></i>
            </span>
            <span class="top-info-text">
              <small>Academy Location</small>
              <strong>{{ $shortAddress }}</strong>
            </span>
          </span>

        </div>

        <div class="top-right">
          <!-- <span class="top-mini-badge">
            <i class="bi bi-stars"></i>
            Admission Open 2025
          </span> -->

          <div class="top-social">
            @foreach($socialLinks as $social)
              @if($social['url'])
                <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $social['label'] }}">
                  <i class="{{ $social['icon'] }}"></i>
                </a>
              @endif
            @endforeach
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- ========================= TOP BAR END ========================== -->


 <!-- ========================= HEADER START ========================== -->
<header class="main-header" id="mainHeader">

  <nav class="navbar navbar-expand-xl premium-navbar">
    <div class="container-fluid header-fluid">
      <div class="container header-container">

        <!-- LOGO -->
        <a class="navbar-brand brand-wrap"
           href="{{ route('frontend.home') }}"
           aria-label="{{ $siteName }}">

          <img
            src="{{ $headerLogo }}"
            alt="{{ $logoAlt }}"
            class="header-logo">
        </a>

        <!-- MOBILE MENU BUTTON -->
        <button
          class="premium-toggler d-xl-none"
          type="button"
          id="mobileMenuOpen"
          aria-label="Open navigation menu"
          aria-controls="premiumMobileDrawer"
          aria-expanded="false">

          <span class="menu-line"></span>
          <span class="menu-line"></span>
          <span class="menu-line"></span>
        </button>

        <!-- ================= DESKTOP NAVIGATION ================= -->
        <div class="d-none d-xl-flex align-items-center flex-grow-1 desktop-navigation">

          <ul class="navbar-nav ms-auto align-items-center premium-nav-list">

            <li class="nav-item">
              <a class="nav-link" href="{{ route('frontend.home') }}">
                <span>Home</span>
              </a>
            </li>

            <!-- ABOUT DROPDOWN -->
            <li class="nav-item dropdown about-dropdown">

              <a class="nav-link dropdown-toggle"
                 href="#"
                 id="aboutDropdown"
                 role="button"
                 data-bs-toggle="dropdown"
                 aria-expanded="false">
                <span>About Us</span>
              </a>

              <ul class="dropdown-menu premium-dropdown"
                  aria-labelledby="aboutDropdown">

                <li>
                  <a class="dropdown-item" href="{{ route('frontend.founders-journey') }}">
                    <span class="dropdown-icon">
                      <i class="bi bi-person-badge-fill"></i>
                    </span>

                    <span>
                      <strong>Founder’s Journey</strong>
                      <small>Vision, mission and story</small>
                    </span>
                  </a>
                </li>

                <li>
                  <a class="dropdown-item" href="{{ route('frontend.about-academy') }}">
                    <span class="dropdown-icon">
                      <i class="bi bi-building-check"></i>
                    </span>

                    <span>
                      <strong>About Khadkeswar Academy</strong>
                      <small>Academy system and approach</small>
                    </span>
                  </a>
                </li>

                <li>
                  <a class="dropdown-item" href="{{ route('frontend.company-information') }}">
                    <span class="dropdown-icon">
                      <i class="bi bi-file-earmark-text-fill"></i>
                    </span>

                    <span>
                      <strong>Company Information</strong>
                      <small>GSTIN, CIN, PAN and details</small>
                    </span>
                  </a>
                </li>

              </ul>
            </li>

            <!-- COURSES DROPDOWN -->
            <li class="nav-item dropdown courses-dropdown">

              <a class="nav-link dropdown-toggle"
                 href="#"
                 id="coursesDropdown"
                 role="button"
                 data-bs-toggle="dropdown"
                 aria-expanded="false">
                <span>Courses</span>
              </a>

              <ul class="dropdown-menu premium-dropdown"
                  aria-labelledby="coursesDropdown">

                <li>
                  <a class="dropdown-item" href="{{ route('frontend.neet-program') }}">
                    <span class="dropdown-icon">
                      <i class="bi bi-heart-pulse-fill"></i>
                    </span>

                    <span>
                      <strong>NEET Program</strong>
                      <small>Medical entrance preparation</small>
                    </span>
                  </a>
                </li>

                <li>
                  <a class="dropdown-item" href="{{ route('frontend.jee-program') }}">
                    <span class="dropdown-icon">
                      <i class="bi bi-cpu-fill"></i>
                    </span>

                    <span>
                      <strong>JEE Program</strong>
                      <small>Engineering entrance preparation</small>
                    </span>
                  </a>
                </li>

                <li>
                  <a class="dropdown-item" href="{{ route('frontend.foundation-course') }}">
                    <span class="dropdown-icon">
                      <i class="bi bi-lightbulb-fill"></i>
                    </span>

                    <span>
                      <strong>Foundation Course</strong>
                      <small>Early preparation for future goals</small>
                    </span>
                  </a>
                </li>

                <li>
                  <a class="dropdown-item" href="{{ route('frontend.test-series') }}">
                    <span class="dropdown-icon">
                      <i class="bi bi-clipboard2-check-fill"></i>
                    </span>

                    <span>
                      <strong>Test Series</strong>
                      <small>Mock tests and performance practice</small>
                    </span>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('frontend.ai-learning') }}">
                <span>AI Learning</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('frontend.results') }}">
                <span>Results</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('frontend.resources') }}">
                <span>Resources</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('frontend.gallery') }}">
                <span>Gallery</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('frontend.faculty') }}">
                <span>Faculty</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('frontend.scholarship') }}">
                <span>Scholarship</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('frontend.startup-vision') }}">
                <span>Startup Vision</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('frontend.contact') }}">
                <span>Contact</span>
              </a>
            </li>

          </ul>

          <div class="header-actions desktop-header-actions">
            <a href="{{ route('frontend.admission') }}"
               class="btn-main border-0 header-admission-btn">

              <i class="bi bi-pencil-square"></i>
              <span>{{ $admissionBadgeText }}</span>
            </a>
          </div>

        </div>
        <!-- ================= DESKTOP NAVIGATION END ================= -->

      </div>
    </div>
  </nav>

  <!-- =========================================================
       MOBILE / TABLET FULL SCREEN DRAWER
  ========================================================== -->
  <div class="premium-mobile-drawer d-xl-none"
       id="premiumMobileDrawer"
       aria-hidden="true">

    <div class="mobile-drawer-decoration"></div>

    <!-- DRAWER TOP -->
    <div class="mobile-drawer-top">

      <a href="{{ route('frontend.home') }}" class="mobile-drawer-logo">
        <img
          src="{{ $headerLogo }}"
          alt="{{ $logoAlt }}">
      </a>

      <button
        type="button"
        class="mobile-drawer-close"
        id="mobileMenuClose"
        aria-label="Close navigation menu">

        <i class="bi bi-x-lg"></i>
      </button>

    </div>

    <!-- DRAWER TITLE -->
    <div class="mobile-drawer-heading">
      <h2>Menu</h2>
      <span></span>
      <p>Explore Academy</p>
    </div>

    <!-- MENU PANEL -->
    <div class="mobile-menu-panel">

      <!-- MAIN GROUP -->
      <div class="mobile-menu-group">

        <div class="mobile-group-title group-main">
          <i class="bi bi-house-door-fill"></i>
          <span>Main</span>
        </div>

        <a href="{{ route('frontend.home') }}"
           class="mobile-menu-card mobile-menu-card-active">

          <span class="mobile-menu-card-icon icon-red">
            <i class="bi bi-house-door-fill"></i>
          </span>

          <span class="mobile-menu-card-content">
            <strong>Home</strong>
            <small>मुख्यपृष्ठ</small>
          </span>

          <i class="bi bi-chevron-right mobile-card-arrow"></i>
        </a>

        <!-- ABOUT US -->
        <button
          type="button"
          class="mobile-menu-card"
          data-bs-toggle="collapse"
          data-bs-target="#mobileAboutMenu"
          aria-expanded="false"
          aria-controls="mobileAboutMenu">

          <span class="mobile-menu-card-icon icon-red">
            <i class="bi bi-info-circle-fill"></i>
          </span>

          <span class="mobile-menu-card-content">
            <strong>About Us</strong>
            <small>आमच्याबद्दल</small>
          </span>

          <i class="bi bi-chevron-down mobile-card-arrow"></i>
        </button>

        <div class="collapse mobile-submenu" id="mobileAboutMenu">

          <a href="{{ route('frontend.founders-journey') }}">
            <i class="bi bi-person-badge-fill"></i>
            <span>Founder’s Journey</span>
          </a>

          <a href="{{ route('frontend.about-academy') }}">
            <i class="bi bi-building-check"></i>
            <span>About Academy</span>
          </a>

          <a href="{{ route('frontend.company-information') }}">
            <i class="bi bi-file-earmark-text-fill"></i>
            <span>Company Information</span>
          </a>

        </div>

      </div>

      <!-- ACADEMICS GROUP -->
      <div class="mobile-menu-group">

        <div class="mobile-group-title group-academics">
          <i class="bi bi-mortarboard-fill"></i>
          <span>Academics</span>
        </div>

        <!-- COURSES -->
        <button
          type="button"
          class="mobile-menu-card"
          data-bs-toggle="collapse"
          data-bs-target="#mobileCoursesMenu"
          aria-expanded="false"
          aria-controls="mobileCoursesMenu">

          <span class="mobile-menu-card-icon icon-blue">
            <i class="bi bi-journal-bookmark-fill"></i>
          </span>

          <span class="mobile-menu-card-content">
            <strong>Courses</strong>
            <small>कोर्सेस</small>
          </span>

          <i class="bi bi-chevron-down mobile-card-arrow"></i>
        </button>

        <div class="collapse mobile-submenu" id="mobileCoursesMenu">

          <a href="{{ route('frontend.neet-program') }}">
            <i class="bi bi-heart-pulse-fill"></i>
            <span>NEET Program</span>
          </a>

          <a href="{{ route('frontend.jee-program') }}">
            <i class="bi bi-cpu-fill"></i>
            <span>JEE Program</span>
          </a>

          <a href="{{ route('frontend.foundation-course') }}">
            <i class="bi bi-lightbulb-fill"></i>
            <span>Foundation Course</span>
          </a>

          <a href="{{ route('frontend.test-series') }}">
            <i class="bi bi-clipboard2-check-fill"></i>
            <span>Test Series</span>
          </a>

        </div>

        <a href="{{ route('frontend.ai-learning') }}" class="mobile-menu-card">

          <span class="mobile-menu-card-icon icon-blue">
            <i class="bi bi-robot"></i>
          </span>

          <span class="mobile-menu-card-content">
            <strong>AI Learning</strong>
            <small>AI शिक्षण</small>
          </span>

          <i class="bi bi-chevron-right mobile-card-arrow"></i>
        </a>

        <a href="{{ route('frontend.faculty') }}" class="mobile-menu-card">

          <span class="mobile-menu-card-icon icon-blue">
            <i class="bi bi-person-workspace"></i>
          </span>

          <span class="mobile-menu-card-content">
            <strong>Faculty</strong>
            <small>प्राध्यापक</small>
          </span>

          <i class="bi bi-chevron-right mobile-card-arrow"></i>
        </a>

        <a href="{{ route('frontend.results') }}" class="mobile-menu-card">

          <span class="mobile-menu-card-icon icon-blue">
            <i class="bi bi-trophy-fill"></i>
          </span>

          <span class="mobile-menu-card-content">
            <strong>Results</strong>
            <small>निकाल</small>
          </span>

          <i class="bi bi-chevron-right mobile-card-arrow"></i>
        </a>

      </div>

      <!-- OPPORTUNITIES -->
      <div class="mobile-menu-group">

        <div class="mobile-group-title group-opportunities">
          <i class="bi bi-gift-fill"></i>
          <span>Opportunities</span>
        </div>

        <a href="{{ route('frontend.scholarship') }}" class="mobile-menu-card">

          <span class="mobile-menu-card-icon icon-purple">
            <i class="bi bi-award-fill"></i>
          </span>

          <span class="mobile-menu-card-content">
            <strong>Scholarship</strong>
            <small>शिष्यवृत्ती</small>
          </span>

          <i class="bi bi-chevron-right mobile-card-arrow"></i>
        </a>

        <a href="{{ route('frontend.startup-vision') }}" class="mobile-menu-card">

          <span class="mobile-menu-card-icon icon-purple">
            <i class="bi bi-rocket-takeoff-fill"></i>
          </span>

          <span class="mobile-menu-card-content">
            <strong>Startup Vision</strong>
            <small>स्टार्टअप व्हिजन</small>
          </span>

          <i class="bi bi-chevron-right mobile-card-arrow"></i>
        </a>

      </div>

      <!-- MEDIA -->
      <div class="mobile-menu-group">

        <div class="mobile-group-title group-media">
          <i class="bi bi-images"></i>
          <span>Media</span>
        </div>

        <a href="{{ route('frontend.gallery') }}" class="mobile-menu-card">

          <span class="mobile-menu-card-icon icon-orange">
            <i class="bi bi-images"></i>
          </span>

          <span class="mobile-menu-card-content">
            <strong>Gallery</strong>
            <small>गॅलरी</small>
          </span>

          <i class="bi bi-chevron-right mobile-card-arrow"></i>
        </a>

      </div>

      <!-- RESOURCES -->
      <div class="mobile-menu-group">

        <div class="mobile-group-title group-media">
          <i class="bi bi-folder2-open"></i>
          <span>Resources</span>
        </div>

        <a href="{{ route('frontend.resources') }}" class="mobile-menu-card">

          <span class="mobile-menu-card-icon icon-orange">
            <i class="bi bi-folder2-open"></i>
          </span>

          <span class="mobile-menu-card-content">
            <strong>Resources</strong>
            <small>Study material</small>
          </span>

          <i class="bi bi-chevron-right mobile-card-arrow"></i>
        </a>

      </div>

      <!-- SUPPORT -->
      <div class="mobile-menu-group">

        <div class="mobile-group-title group-support">
          <i class="bi bi-headset"></i>
          <span>Support</span>
        </div>

        <a href="{{ route('frontend.contact') }}" class="mobile-menu-card">

          <span class="mobile-menu-card-icon icon-green">
            <i class="bi bi-chat-dots-fill"></i>
          </span>

          <span class="mobile-menu-card-content">
            <strong>Contact</strong>
            <small>संपर्क</small>
          </span>

          <i class="bi bi-chevron-right mobile-card-arrow"></i>
        </a>

      </div>

      <!-- BOTTOM ACTIONS -->
      <div class="mobile-drawer-actions">

        <a href="{{ $whatsappUrl }}"
           target="_blank"
           rel="noopener noreferrer"
           class="mobile-whatsapp-btn">

          <span>
            <i class="bi bi-whatsapp"></i>
          </span>

          <div>
            <strong>Chat Now</strong>
            <small>चॅट करा</small>
          </div>
        </a>

        <a href="{{ route('frontend.admission') }}" class="mobile-admission-btn">

          <span>
            <i class="bi bi-mortarboard-fill"></i>
          </span>

          <div>
            <strong>{{ $admissionBadgeText }}</strong>
            <small>प्रवेश सुरू 2026</small>
          </div>
        </a>

      </div>

    </div>
  </div>

</header>
<!-- ========================= HEADER END ========================== -->


@yield('content')



 <!-- =====================================================
     KHADKESHWAR ULTRA PREMIUM FOOTER START
====================================================== -->
<footer class="knj-footer">

  <!-- BACKGROUND DECORATION -->
  <div class="knj-footer-decoration" aria-hidden="true">
    <span class="knj-footer-glow knj-footer-glow-one"></span>
    <span class="knj-footer-glow knj-footer-glow-two"></span>
    <span class="knj-footer-glow knj-footer-glow-three"></span>
    <span class="knj-footer-grid-pattern"></span>
  </div>

  <div class="container position-relative">

    <!-- =========================================
         FOOTER BRAND HEADER
    ========================================== -->
    <div class="knj-footer-brand-header">

      <a href="{{ route('frontend.home') }}" class="knj-footer-main-brand">

        <div class="knj-footer-logo-wrap">
          <img
            src="{{ $footerLogo }}"
            alt="{{ $logoAlt }}"
          >
        </div>

        <div class="knj-footer-brand-text">
          <h2>{!! nl2br(e($siteName)) !!}</h2>
          <p>{{ $siteTagline }}</p>
        </div>

      </a>

      <a href="#top"
         class="knj-footer-menu-box"
         aria-label="Go to top navigation">
        <i class="bi bi-list"></i>
      </a>

    </div>

    <div class="knj-footer-top-divider"></div>

    <!-- =========================================
         ABOUT + SOCIAL
    ========================================== -->
    <div class="knj-footer-about-row">

      <div class="knj-footer-about-icon">
        KNJ
      </div>

      <div class="knj-footer-about-content">

        <p>{{ $footerDescription }}</p>

        <div class="knj-footer-socials">

          @foreach($socialLinks as $social)
            @if($social['url'])
              <a href="{{ $social['url'] }}"
                 target="_blank"
                 rel="noopener noreferrer"
                 aria-label="{{ $social['label'] }}"
                 class="{{ $social['class'] }}">
                <i class="{{ $social['icon'] }}"></i>
              </a>
            @endif
          @endforeach

          <a href="{{ $whatsappUrl }}"
             target="_blank"
             rel="noopener noreferrer"
             aria-label="WhatsApp"
             class="knj-social-whatsapp">
            <i class="bi bi-whatsapp"></i>
          </a>

        </div>

      </div>

    </div>

    <!-- =========================================
         QUICK LINKS + COURSES
    ========================================== -->
    <div class="knj-footer-links-grid">

      <!-- QUICK LINKS -->
      <div class="knj-footer-link-card">

        <div class="knj-footer-card-heading">
          <span>
            <i class="bi bi-link-45deg"></i>
          </span>
          <h3>Quick Links</h3>
        </div>

        <div class="knj-footer-heading-line"></div>

        <ul class="knj-footer-links">

          <li>
            <a href="{{ route('frontend.home') }}">
              <span>
                <i class="bi bi-chevron-right"></i>
                Home
              </span>
              <i class="bi bi-chevron-right"></i>
            </a>
          </li>

          <li>
            <a href="{{ route('frontend.about-academy') }}">
              <span>
                <i class="bi bi-chevron-right"></i>
                About Academy
              </span>
              <i class="bi bi-chevron-right"></i>
            </a>
          </li>

          <li>
            <a href="{{ route('frontend.founders-journey') }}">
              <span>
                <i class="bi bi-chevron-right"></i>
                Founder's Journey
              </span>
              <i class="bi bi-chevron-right"></i>
            </a>
          </li>

          <li>
            <a href="{{ route('frontend.faculty') }}">
              <span>
                <i class="bi bi-chevron-right"></i>
                Faculty
              </span>
              <i class="bi bi-chevron-right"></i>
            </a>
          </li>

          <li>
            <a href="{{ route('frontend.results') }}">
              <span>
                <i class="bi bi-chevron-right"></i>
                Results
              </span>
              <i class="bi bi-chevron-right"></i>
            </a>
          </li>

          <li>
            <a href="{{ route('frontend.gallery') }}">
              <span>
                <i class="bi bi-chevron-right"></i>
                Gallery
              </span>
              <i class="bi bi-chevron-right"></i>
            </a>
          </li>

          <li>
            <a href="{{ route('frontend.resources') }}">
              <span>
                <i class="bi bi-chevron-right"></i>
                Resources
              </span>
              <i class="bi bi-chevron-right"></i>
            </a>
          </li>

        </ul>

      </div>

      <!-- COURSES -->
      <div class="knj-footer-link-card">

        <div class="knj-footer-card-heading">
          <span>
            <i class="bi bi-mortarboard-fill"></i>
          </span>
          <h3>Courses</h3>
        </div>

        <div class="knj-footer-heading-line"></div>

        <ul class="knj-footer-links">

          <li>
            <a href="{{ route('frontend.neet-program') }}">
              <span>
                <i class="bi bi-chevron-right"></i>
                NEET Program
              </span>
              <i class="bi bi-chevron-right"></i>
            </a>
          </li>

          <li>
            <a href="{{ route('frontend.jee-program') }}">
              <span>
                <i class="bi bi-chevron-right"></i>
                JEE Program
              </span>
              <i class="bi bi-chevron-right"></i>
            </a>
          </li>

          <li>
            <a href="{{ route('frontend.foundation-course') }}">
              <span>
                <i class="bi bi-chevron-right"></i>
                Foundation Course
              </span>
              <i class="bi bi-chevron-right"></i>
            </a>
          </li>

          <li>
            <a href="{{ route('frontend.test-series') }}">
              <span>
                <i class="bi bi-chevron-right"></i>
                Test Series
              </span>
              <i class="bi bi-chevron-right"></i>
            </a>
          </li>

          <li>
            <a href="{{ route('frontend.ai-learning') }}">
              <span>
                <i class="bi bi-chevron-right"></i>
                AI Learning Plan
              </span>
              <i class="bi bi-chevron-right"></i>
            </a>
          </li>

          <li>
            <a href="{{ route('frontend.scholarship') }}">
              <span>
                <i class="bi bi-chevron-right"></i>
                Scholarship Exam
              </span>
              <i class="bi bi-chevron-right"></i>
            </a>
          </li>

        </ul>

      </div>

    </div>

    <!-- =========================================
         CONTACT INFORMATION
    ========================================== -->
    <div class="knj-footer-contact-card">

      <div class="knj-footer-card-heading">
        <span>
          <i class="bi bi-telephone-fill"></i>
        </span>
        <h3>Contact Information</h3>
      </div>

      <div class="knj-footer-heading-line"></div>

      <div class="knj-footer-contact-grid">

        <!-- PHONE -->
        <a href="{{ $telPrimary }}"
           class="knj-footer-contact-item">

          <span class="knj-contact-icon knj-contact-red">
            <i class="bi bi-telephone-fill"></i>
          </span>

          <div>
            <small>Call Admission</small>
            <strong>{{ $phonePrimary }}</strong>
          </div>

        </a>

        <!-- WHATSAPP -->
        <a href="{{ $whatsappUrl }}"
           target="_blank"
           rel="noopener noreferrer"
           class="knj-footer-contact-item">

          <span class="knj-contact-icon knj-contact-green">
            <i class="bi bi-whatsapp"></i>
          </span>

          <div>
            <small>WhatsApp Support</small>
            <strong>Chat with our team</strong>
          </div>

        </a>

        <!-- EMAIL -->
        <a href="{{ $mailPrimary }}"
           class="knj-footer-contact-item">

          <span class="knj-contact-icon knj-contact-red">
            <i class="bi bi-envelope-fill"></i>
          </span>

          <div>
            <small>Email Us</small>
            <strong>{{ $emailPrimary }}</strong>
          </div>

        </a>

        <!-- LOCATION -->
        <div class="knj-footer-contact-item">

          <span class="knj-contact-icon knj-contact-red">
            <i class="bi bi-geo-alt-fill"></i>
          </span>

          <div>
            <small>Location</small>
            <strong>{{ $address }}</strong>
          </div>

        </div>

      </div>

    </div>

    <!-- =========================================
         LEGAL INFORMATION
    ========================================== -->
    <div class="knj-footer-legal-card">

      <button
        class="knj-footer-legal-heading"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#knjLegalInformation"
        aria-expanded="true"
        aria-controls="knjLegalInformation">

        <span class="knj-footer-card-heading">
          <span>
            <i class="bi bi-shield-check"></i>
          </span>
          <h3>Legal Information</h3>
        </span>

        <i class="bi bi-chevron-down"></i>

      </button>

      <div class="collapse show" id="knjLegalInformation">

        <div class="knj-footer-legal-grid">

          <div class="knj-legal-item">
            <span>GSTIN</span>
            <strong>{{ $settings?->gstin ?? '27AAMCK749F1ZY' }}</strong>
          </div>

          <div class="knj-legal-item">
            <span>CIN</span>
            <strong>{{ $settings?->cin ?? 'U85500ME2026PTC474210' }}</strong>
          </div>

          <div class="knj-legal-item">
            <span>PAN</span>
            <strong>{{ $settings?->pan ?? 'AAMCK7494F' }}</strong>
          </div>

          <div class="knj-legal-item">
            <span>TAN</span>
            <strong>{{ $settings?->tan ?? 'NQPK07435B' }}</strong>
          </div>

        </div>

      </div>

    </div>

    <!-- =========================================
         ADMISSION CTA
    ========================================== -->
    <div class="knj-footer-cta">

      <div class="knj-footer-cta-icon">
        <i class="bi bi-rocket-takeoff-fill"></i>
      </div>

      <div class="knj-footer-cta-content">
        <span>{{ $admissionBadgeText }}</span>

        <h3>
          Ready to Start Your<br>
          NEET &amp; JEE Journey?
        </h3>
      </div>

      <div class="knj-footer-cta-actions">

        <button
          type="button"
          class="knj-footer-apply-button"
          data-bs-toggle="modal"
          data-bs-target="#admissionModal">

          Apply Now
          <i class="bi bi-arrow-right"></i>

        </button>

        <a href="{{ $telPrimary }}"
           class="knj-footer-call-button">

          <i class="bi bi-telephone-outbound-fill"></i>
          Call Admission Team

        </a>

        <a href="{{ $whatsappUrl }}"
           target="_blank"
           rel="noopener noreferrer"
           class="knj-footer-whatsapp-button">

          <i class="bi bi-whatsapp"></i>
          WhatsApp Us

        </a>

      </div>

    </div>

    <!-- =========================================
         FOOTER BOTTOM
    ========================================== -->
    <div class="knj-footer-bottom">

      <p>
        {{ $copyrightText }}
      </p>

      <p>
        Empowering Rural Students Through Quality Education.
      </p>

      <div class="knj-footer-policy-links">
        <a href="{{ route('frontend.privacy-policy') }}">Privacy Policy</a>
        <span></span>
        <a href="{{ route('frontend.terms-and-conditions') }}">Terms &amp; Conditions</a>
      </div>

    </div>

  </div>

  <!-- BACK TO TOP -->
  <a href="#top"
     class="knj-footer-back-top"
     aria-label="Back to top">

    <i class="bi bi-arrow-up"></i>

  </a>

</footer>
<!-- =====================================================
     KHADKESHWAR ULTRA PREMIUM FOOTER END
====================================================== -->



  <!-- ========================= FLOATING CONTACT START ========================== -->
  <div class="floating-contact" aria-label="Quick contact buttons">

    <a href="{{ $telPrimary }}" class="floating-btn float-phone" aria-label="Call {{ $siteName }}">
      <span class="floating-pulse"></span>
      <i class="bi bi-telephone-fill"></i>
      <small>Call</small>
    </a>

    <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" class="floating-btn float-whatsapp"
      aria-label="WhatsApp {{ $siteName }}">
      <span class="floating-pulse"></span>
      <i class="bi bi-whatsapp"></i>
      <small>WhatsApp</small>
    </a>

  </div>
  <!-- ========================= FLOATING CONTACT END ========================== -->

  @php
    $inquirySuccessMessage = session('contact_success')
      ?? session('admission_success')
      ?? session('scholarship_success');
  @endphp

  @if($inquirySuccessMessage)
    <div class="success-msg global-success-msg" id="globalSuccessMsg">
      <i class="bi bi-check-circle-fill"></i>
      {{ $inquirySuccessMessage }}
    </div>
  @endif


  <!-- ========================= ADMISSION MODAL START ========================== -->
  <div class="modal fade admission-modal" id="admissionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
      <div class="modal-content admission-modal-content">

        <!-- MODAL HEADER -->
        <div class="admission-form-head">
          <div class="modal-head-content">
            <span class="modal-head-icon">
              <i class="bi bi-mortarboard-fill"></i>
            </span>

            <div>
              <span class="modal-small-badge">
                <i class="bi bi-stars"></i>
                Admission Open 2025
              </span>

              <h3>Admission Inquiry Form</h3>
              <p>Fill the form and our team will contact you shortly.</p>
            </div>
          </div>

          <button type="button" class="modal-close-btn" data-bs-dismiss="modal" aria-label="Close">
            <i class="bi bi-x-lg"></i>
          </button>
        </div>

        <!-- MODAL BODY -->
        <div class="modal-body admission-modal-body">

          <div class="success-msg" id="successMsg">
            <i class="bi bi-check-circle-fill"></i>
            Thank you. Your admission inquiry has been submitted successfully.
          </div>

          <form id="admissionForm" method="POST" action="{{ route('frontend.admission-inquiry.store') }}">
            @csrf
            <input type="hidden" name="source" value="admission_modal">
            <div class="row g-3">

              <div class="col-md-6">
                <label class="form-label">
                  Student Name <span>*</span>
                </label>

                <div class="input-box">
                  <i class="bi bi-person-fill"></i>
                  <input type="text" class="form-control" name="student_name" placeholder="Enter student name" required>
                </div>
              </div>

              <div class="col-md-6">
                <label class="form-label">Parent Name</label>

                <div class="input-box">
                  <i class="bi bi-person-heart"></i>
                  <input type="text" class="form-control" name="parent_name" placeholder="Enter parent name">
                </div>
              </div>

              <div class="col-md-6">
                <label class="form-label">
                  Mobile Number <span>*</span>
                </label>

                <div class="input-box">
                  <i class="bi bi-telephone-fill"></i>
                  <input type="tel" class="form-control" name="mobile_number" placeholder="10 digit mobile number" required
                    pattern="[0-9]{10}">
                </div>
              </div>

              <div class="col-md-6">
                <label class="form-label">Email</label>

                <div class="input-box">
                  <i class="bi bi-envelope-fill"></i>
                  <input type="email" class="form-control" name="email" placeholder="Enter email address">
                </div>
              </div>

              <div class="col-md-6">
                <label class="form-label">
                  Course Interested In <span>*</span>
                </label>

                <div class="input-box select-box">
                  <i class="bi bi-journal-bookmark-fill"></i>
                  <select class="form-select" name="course_interested" required>
                    <option value="">Select Course</option>
                    <option>NEET Preparation</option>
                    <option>JEE Preparation</option>
                    <option>Foundation Course</option>
                    <option>Test Series</option>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <label class="form-label">Fee Concession Inquiry</label>

                <div class="input-box select-box">
                  <i class="bi bi-percent"></i>
                  <select class="form-select" name="fee_concession">
                    <option value="">Select Option</option>
                    <option>Yes, I want to check eligibility</option>
                    <option>No</option>
                  </select>
                </div>
              </div>

              <div class="col-12">
                <label class="form-label">Message</label>

                <div class="input-box textarea-box">
                  <i class="bi bi-chat-left-text-fill"></i>
                  <textarea class="form-control" rows="4" name="message" placeholder="Write your message"></textarea>
                </div>
              </div>

              <div class="col-12">
                <div class="modal-action-row">
                  <button type="button" class="modal-cancel-btn" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i>
                    Close
                  </button>

                  <button type="submit" class="btn-main border-0 modal-submit-btn">
                    Submit Inquiry
                    <i class="bi bi-send-fill"></i>
                  </button>
                </div>
              </div>

            </div>
          </form>

        </div>

      </div>
    </div>
  </div>
  <!-- ========================= ADMISSION MODAL END ========================== -->


  <!-- ========================= IMAGE LIGHTBOX START ========================== -->
  <div class="modal fade lightbox-modal" id="imageLightbox" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <button type="button" class="btn-close btn-close-white ms-auto mb-2" data-bs-dismiss="modal"></button>
        <img src="" class="lightbox-img" id="lightboxImg" alt="Gallery preview">
      </div>
    </div>
  </div>
  <!-- ========================= IMAGE LIGHTBOX END ========================== -->


  <!-- ========================= VIDEO MODAL START ========================== -->
  <div class="modal fade" id="videoModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content p-3">
        <div class="d-flex justify-content-end mb-2">
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <iframe class="video-frame" id="videoFrame" src="" allowfullscreen></iframe>
      </div>
    </div>
  </div>
  <!-- ========================= VIDEO MODAL END ========================== -->


  <!-- ========================= JS LINKS ========================== -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- Custom JS -->
  <script src="assets/js/main.js"></script>

</body>

</html>
