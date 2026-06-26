
@extends('frontend.master')
@section('content')
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
  $telPrimary = $settings?->telLink($phonePrimary) ?? 'tel:{{ $phonePrimary }}';
  $mailPrimary = $settings?->mailLink($emailPrimary) ?? 'mailto:info@khadkeshwaracademy.com';
  $whatsappUrl = $settings?->whatsappLink('Hello, I want admission information.') ?? 'https://wa.me/91{{ $phonePrimary }}';
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

@php
  $homeHero = $homeHero ?? \App\Models\HomeHeroSetting::current();
  $heroImage = $homeHero->getFirstMediaUrl('hero_image') ?: asset('assets/img/1.png');
  $classroomImage = $homeHero->getFirstMediaUrl('classroom_image') ?: asset('assets/img/img5.jpeg');
@endphp

 <!-- =====================================================
     ULTRA PREMIUM HERO SECTION START
====================================================== -->
@if($homeHero->status)
<section class="knj-hero">

  <div class="knj-hero-grid-bg" aria-hidden="true"></div>
  <div class="knj-hero-glow knj-hero-glow-one" aria-hidden="true"></div>
  <div class="knj-hero-glow knj-hero-glow-two" aria-hidden="true"></div>

  <div class="container">

    <!-- ================= MAIN HERO ================= -->
    <div class="knj-hero-main" data-aos="fade-up">

      <!-- LEFT CONTENT -->
      <div class="knj-hero-content">

        <div class="knj-hero-badges">

          <span class="knj-hero-badge knj-hero-badge-dark">
            <i class="bi bi-cpu-fill"></i>
            AI-Enabled Rural Education Startup
          </span>

          <span class="knj-hero-badge knj-hero-badge-light">
            <i class="bi bi-stars"></i>
            Admissions Open 2026
          </span>

        </div>

        <h1>
          {{ $homeHero->hero_title_top }}
          <span>{{ $homeHero->hero_title_highlight }}</span>
          {{ $homeHero->hero_title_bottom }}
        </h1>

        <p class="knj-hero-description">
          {{ $homeHero->hero_description }}
          <strong>{{ $homeHero->hero_strong_text }}</strong>
        </p>

        <!-- TOP FEATURES -->
        <div class="knj-hero-features">

          <div class="knj-hero-feature-card">
            <span class="knj-feature-icon">
              <i class="bi bi-mortarboard-fill"></i>
            </span>

            <div>
              <strong>{{ $homeHero->feature_one_title }}</strong>
              <small>{{ $homeHero->feature_one_subtitle }}</small>
            </div>
          </div>

          <div class="knj-hero-feature-card">
            <span class="knj-feature-icon">
              <i class="bi bi-bar-chart-line-fill"></i>
            </span>

            <div>
              <strong>{{ $homeHero->feature_two_title }}</strong>
              <small>{{ $homeHero->feature_two_subtitle }}</small>
            </div>
          </div>

          <div class="knj-hero-feature-card">
            <span class="knj-feature-icon">
              <i class="bi bi-award-fill"></i>
            </span>

            <div>
              <strong>{{ $homeHero->feature_three_title }}</strong>
              <small>{{ $homeHero->feature_three_subtitle }}</small>
            </div>
          </div>

        </div>

        <!-- ACTION BUTTONS -->
        <div class="knj-hero-actions">

          <button
            type="button"
            class="knj-primary-btn"
            data-bs-toggle="modal"
            data-bs-target="#admissionModal">

            <i class="bi bi-pencil-square"></i>
            <span>Apply for Admission</span>
            <i class="bi bi-arrow-right"></i>
          </button>

          <a href="{{ route('frontend.ai-learning') }}" class="knj-secondary-btn">
            <i class="bi bi-robot"></i>
            <span>Explore AI Learning</span>
          </a>

          <a href="{{ $telPrimary }}" class="knj-call-btn">
            <span class="knj-call-icon">
              <i class="bi bi-telephone-fill"></i>
            </span>

            <span>
              <small>Call Admission</small>
              <strong>{{ $phonePrimary }}</strong>
            </span>
          </a>

        </div>

      </div>

      <!-- RIGHT IMAGE -->
      <div class="knj-hero-image-wrap">

        <img
          src="{{ $heroImage }}"
          alt="{{ $homeHero->hero_image_alt }}"
          class="knj-hero-image">

        <div class="knj-hero-image-overlay"></div>

        <div class="knj-image-badge">
          <i class="bi bi-patch-check-fill"></i>
          <span>Rural-First Learning</span>
        </div>

      </div>

    </div>

    <!-- ================= STATISTICS ================= -->
    <div class="knj-stats-strip" data-aos="fade-up">

      <div class="knj-stat-item">
        <span class="knj-stat-icon knj-stat-red">
          <i class="bi bi-people-fill"></i>
        </span>

        <div>
          <strong>{{ $homeHero->stat_one_value }}</strong>
          <span>{!! $homeHero->stat_one_label !!}</span>
        </div>
      </div>

      <div class="knj-stat-item">
        <span class="knj-stat-icon knj-stat-blue">
          <i class="bi bi-geo-alt-fill"></i>
        </span>

        <div>
          <strong>{{ $homeHero->stat_two_value }}</strong>
          <span>{!! $homeHero->stat_two_label !!}</span>
        </div>
      </div>

      <div class="knj-stat-item">
        <span class="knj-stat-icon knj-stat-purple">
          <i class="bi bi-graph-up-arrow"></i>
        </span>

        <div>
          <strong>{{ $homeHero->stat_three_value }}</strong>
          <span>{!! $homeHero->stat_three_label !!}</span>
        </div>
      </div>

      <div class="knj-stat-item">
        <span class="knj-stat-icon knj-stat-green">
          <i class="bi bi-patch-check-fill"></i>
        </span>

        <div>
          <strong>{{ $homeHero->stat_four_value }}</strong>
          <span>{!! $homeHero->stat_four_label !!}</span>
        </div>
      </div>

    </div>

    <!-- ================= CLASSROOM PANEL ================= -->
    <div class="knj-classroom-panel" data-aos="fade-up">

      <div class="knj-classroom-image">

        <img
          src="{{ $classroomImage }}"
          alt="{{ $homeHero->classroom_image_alt }}">

        <div class="knj-classroom-overlay"></div>

        <div class="knj-year-card">
          <i class="bi bi-calendar2-check-fill"></i>

          <div>
            <strong>{{ $homeHero->year_card_value }}</strong>
            <span>{{ $homeHero->year_card_label }}</span>
          </div>
        </div>

        <div class="knj-ai-card">
          <i class="bi bi-robot"></i>

          <div>
            <strong>{{ $homeHero->ai_card_title }}</strong>
            <span>{{ $homeHero->ai_card_subtitle }}</span>
          </div>
        </div>

      </div>

      <div class="knj-classroom-features">

        <div class="knj-classroom-feature">
          <span>
            <i class="bi bi-person-fill"></i>
          </span>

          <div>
            <strong>{{ $homeHero->classroom_feature_one_title }}</strong>
            <small>{{ $homeHero->classroom_feature_one_subtitle }}</small>
          </div>
        </div>

        <div class="knj-classroom-feature">
          <span>
            <i class="bi bi-bar-chart-line-fill"></i>
          </span>

          <div>
            <strong>{{ $homeHero->classroom_feature_two_title }}</strong>
            <small>{{ $homeHero->classroom_feature_two_subtitle }}</small>
          </div>
        </div>

        <div class="knj-classroom-feature">
          <span>
            <i class="bi bi-clipboard2-check-fill"></i>
          </span>

          <div>
            <strong>{{ $homeHero->classroom_feature_three_title }}</strong>
            <small>{{ $homeHero->classroom_feature_three_subtitle }}</small>
          </div>
        </div>

        <div class="knj-classroom-feature">
          <span>
            <i class="bi bi-mortarboard-fill"></i>
          </span>

          <div>
            <strong>{{ $homeHero->classroom_feature_four_title }}</strong>
            <small>{{ $homeHero->classroom_feature_four_subtitle }}</small>
          </div>
        </div>

      </div>

    </div>

    <!-- ================= COUNSELLING CTA ================= -->
    <div class="knj-counselling-card" data-aos="fade-up">

      <div class="knj-counselling-content">

        <span class="knj-counselling-icon">
          <i class="bi bi-headset"></i>
        </span>

        <div>
          <h2>{{ $homeHero->counselling_title }}</h2>

          <p>
            {{ $homeHero->counselling_description }}
          </p>
        </div>

      </div>

      <div class="knj-counselling-action">

        <a href="{{ $telPrimary }}" class="knj-counselling-btn">
          <i class="bi bi-telephone-fill"></i>
          Talk to Our Experts
        </a>

        <div class="knj-counselling-points">
          <span><i class="bi bi-patch-check-fill"></i> {{ $homeHero->counselling_point_one }}</span>
          <span><i class="bi bi-shield-check"></i> {{ $homeHero->counselling_point_two }}</span>
          <span><i class="bi bi-stars"></i> {{ $homeHero->counselling_point_three }}</span>
        </div>

      </div>

    </div>

    <!-- ================= TRUST POINTS ================= -->
    <div class="knj-trust-section" data-aos="fade-up">

      <div class="knj-trust-heading">
        <span></span>
        <h2>{{ $homeHero->trust_heading }}</h2>
        <span></span>
      </div>

      <div class="knj-trust-grid">

        <div class="knj-trust-item">
          <i class="bi bi-graph-up-arrow"></i>

          <div>
            <strong>{{ $homeHero->trust_one_title }}</strong>
            <small>{{ $homeHero->trust_one_subtitle }}</small>
          </div>
        </div>

        <div class="knj-trust-item">
          <i class="bi bi-people-fill"></i>

          <div>
            <strong>{{ $homeHero->trust_two_title }}</strong>
            <small>{{ $homeHero->trust_two_subtitle }}</small>
          </div>
        </div>

        <div class="knj-trust-item">
          <i class="bi bi-shield-heart-fill"></i>

          <div>
            <strong>{{ $homeHero->trust_three_title }}</strong>
            <small>{{ $homeHero->trust_three_subtitle }}</small>
          </div>
        </div>

        <div class="knj-trust-item">
          <i class="bi bi-robot"></i>

          <div>
            <strong>{{ $homeHero->trust_four_title }}</strong>
            <small>{{ $homeHero->trust_four_subtitle }}</small>
          </div>
        </div>

        <div class="knj-trust-item">
          <i class="bi bi-geo-alt-fill"></i>

          <div>
            <strong>{{ $homeHero->trust_five_title }}</strong>
            <small>{{ $homeHero->trust_five_subtitle }}</small>
          </div>
        </div>

      </div>

    </div>

  </div>
</section>
@endif
<!-- =====================================================
     ULTRA PREMIUM HERO SECTION END
====================================================== -->
  


<!-- ========================= WHY TRUST US START ========================== -->
<section class="startup-recognition-section trust-us-section">

  <div class="container">

    <div class="startup-recognition-wrap trust-us-wrap" data-aos="fade-up">

      <!-- SECTION HEADING -->
      <div class="startup-recognition-head trust-us-head">

        <span class="section-badge trust-us-badge">
          <i class="bi bi-star-fill"></i>
          Our Promise
        </span>

        <h2>
          Why Students &amp; Parents
          <span>Trust Us</span>
        </h2>

        <p>
          We combine expert mentorship, AI-powered analytics and affordable education
          to help every rural student achieve their dreams.
        </p>

      </div>

      <!-- TRUST CARDS -->
      @include('frontend.partials.startup-trust-cards')
      <!-- BOTTOM COMMITMENT -->
      <div class="trust-commitment-box">

        <div class="trust-commitment-title">

          <span class="trust-commitment-icon">
            <i class="bi bi-shield-fill-check"></i>
          </span>

          <strong>Our Commitment</strong>

        </div>

        <div class="trust-commitment-divider"></div>

        <p>
          Quality education, affordable fees and a safe learning environment
          to shape the future of rural India.
        </p>

        <div class="trust-student-count">

          <span>
            <i class="bi bi-heart-fill"></i>
          </span>

          <div>
            <strong>500+</strong>
            <small>Students Mentored</small>
          </div>

        </div>

      </div>

    </div>

  </div>
</section>
<!-- ========================= WHY TRUST US END ========================== -->



 <!-- =====================================================
     WHY PARENTS TRUST SECTION START
====================================================== -->
<section class="kpt-section">

  <div class="kpt-bg-grid" aria-hidden="true"></div>
  <div class="kpt-bg-glow kpt-bg-glow-one" aria-hidden="true"></div>
  <div class="kpt-bg-glow kpt-bg-glow-two" aria-hidden="true"></div>

  <div class="container">

    <!-- SECTION HEADING -->
    <div class="kpt-heading" data-aos="fade-up">

      <span class="kpt-heading-badge">
        <i class="bi bi-shield-check"></i>
        Trusted by Parents, Chosen by Students
      </span>

      <h2>
        Why Parents Trust
        <span>Khadkeshwar Academy</span>
      </h2>

      <p>
        Expert guidance, transparent operations and result-driven learning
        for every rural student.
      </p>

    </div>

    <!-- TRUST CARDS -->
    @include('frontend.partials.key-point-trust-cards')
    <!-- COMMITMENT BANNER -->
    <div class="kpt-commitment" data-aos="fade-up">

      <div class="kpt-commitment-content">

        <span class="kpt-commitment-label">
          <i class="bi bi-bullseye"></i>
          Our Commitment
        </span>

        <h3>
          Building Future Doctors &amp; Engineers
          <span>for Rural India</span>
        </h3>

        <p>
          We combine expert mentorship, AI-powered analytics and affordable
          coaching to help every student achieve their dreams.
        </p>

        <a href="{{ route('frontend.contact') }}" class="kpt-commitment-btn">
          Book Free Counselling
          <i class="bi bi-arrow-right"></i>
        </a>

      </div>

      <div class="kpt-commitment-visual">

        <img
          src="assets/img/img.png"
          alt="NEET and JEE students at Khadkeshwar Academy">

      </div>

    </div>

    <!-- STATISTICS -->
    <div class="kpt-stats" data-aos="fade-up">

      <div class="kpt-stat">
        <i class="bi bi-person-badge"></i>

        <div>
          <strong>500+</strong>
          <span>Students Mentored</span>
        </div>
      </div>

      <div class="kpt-stat">
        <i class="bi bi-geo-alt"></i>

        <div>
          <strong>15+</strong>
          <span>Villages Connected</span>
        </div>
      </div>

      <div class="kpt-stat">
        <i class="bi bi-graph-up-arrow"></i>

        <div>
          <strong>1000+</strong>
          <span>Tests Conducted</span>
        </div>
      </div>

      <div class="kpt-stat">
        <i class="bi bi-mortarboard"></i>

        <div>
          <strong>50%</strong>
          <span>Scholarship Support</span>
        </div>
      </div>

    </div>

  </div>
</section>
<!-- =====================================================
     WHY PARENTS TRUST SECTION END
====================================================== -->





 <!-- =====================================================
     ABOUT ACADEMY PREMIUM SECTION START
====================================================== -->
<section class="kaa-about-section">

  <div class="kaa-about-grid-bg" aria-hidden="true"></div>
  <div class="kaa-about-glow kaa-about-glow-one" aria-hidden="true"></div>
  <div class="kaa-about-glow kaa-about-glow-two" aria-hidden="true"></div>

  <div class="container">

    <!-- ================= TOP ABOUT CARD ================= -->
    <div class="kaa-about-main-card" data-aos="fade-up">

      <!-- HEADING -->
      <div class="kaa-about-heading">

        <span class="kaa-about-badge">
          <i class="bi bi-building-fill-check"></i>
          About Khadkeshwar Academy
        </span>

        <h2>
          Building Future Doctors &amp; Engineers
          <span>for Rural India</span>
        </h2>

        <p>
          Expert coaching, personal mentorship, AI-powered analytics and
          affordable education for ambitious NEET &amp; JEE aspirants.
        </p>

      </div>

      <!-- FEATURE CARDS -->
      <div class="kaa-about-features">

        <!-- FEATURE 01 -->
        <article class="kaa-about-feature kaa-feature-red">

          <div class="kaa-about-feature-icon">
            <i class="bi bi-people"></i>
          </div>

          <div class="kaa-about-feature-content">
            <h3>Personal Mentorship</h3>
            <span class="kaa-about-feature-line"></span>

            <p>
              One-to-one guidance and personalized study plans for every student.
            </p>
          </div>

        </article>

        <!-- FEATURE 02 -->
        <article class="kaa-about-feature kaa-feature-blue">

          <div class="kaa-about-feature-icon">
            <i class="bi bi-graph-up-arrow"></i>
          </div>

          <div class="kaa-about-feature-content">
            <h3>AI Test Analytics</h3>
            <span class="kaa-about-feature-line"></span>

            <p>
              Smart performance tracking, strength analysis and personalized
              improvement plans.
            </p>
          </div>

        </article>

        <!-- FEATURE 03 -->
        <article class="kaa-about-feature kaa-feature-green">

          <div class="kaa-about-feature-icon">
            <i class="bi bi-clipboard2-check-fill"></i>
          </div>

          <div class="kaa-about-feature-content">
            <h3>Weekly Test Series</h3>
            <span class="kaa-about-feature-line"></span>

            <p>
              Regular mock tests with detailed analysis to improve accuracy
              and confidence.
            </p>
          </div>

        </article>

        <!-- FEATURE 04 -->
        <article class="kaa-about-feature kaa-feature-purple">

          <div class="kaa-about-feature-icon">
            <i class="bi bi-mortarboard-fill"></i>
          </div>

          <div class="kaa-about-feature-content">
            <h3>Scholarship Support</h3>
            <span class="kaa-about-feature-line"></span>

            <p>
              Merit-based scholarships and affordable fees for deserving
              rural students.
            </p>
          </div>

        </article>

      </div>

      <!-- TOP STATS -->
      <div class="kaa-about-top-stats">

        <div class="kaa-about-top-stat">
          <span class="kaa-about-stat-icon">
            <i class="bi bi-people-fill"></i>
          </span>

          <div>
            <strong>500+</strong>
            <span>Students Mentored</span>
          </div>
        </div>

        <div class="kaa-about-top-stat">
          <span class="kaa-about-stat-icon">
            <i class="bi bi-geo-alt-fill"></i>
          </span>

          <div>
            <strong>15+</strong>
            <span>Villages Connected</span>
          </div>
        </div>

        <div class="kaa-about-top-stat">
          <span class="kaa-about-stat-icon">
            <i class="bi bi-patch-check-fill"></i>
          </span>

          <div>
            <strong>50%</strong>
            <span>Scholarship Support</span>
          </div>
        </div>

      </div>

      <!-- CTA -->
      <div class="kaa-about-action">
        <a href="{{ route('frontend.about-academy') }}" class="kaa-about-btn">
          Explore Our Academy
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>

    </div>

    <!-- ================= IMAGE + FEATURES PANEL ================= -->
    <div class="kaa-about-visual-panel" data-aos="fade-up">

      <!-- LEFT IMAGE -->
      <div class="kaa-about-image-wrap">

        <img
          src="assets/img/img3.jpeg"
          alt="Khadkeshwar Academy classroom students">

        <div class="kaa-about-image-overlay"></div>

        <span class="kaa-about-image-badge">
          <i class="bi bi-bullseye"></i>
          NEET &amp; JEE Preparation
        </span>

      </div>

      <!-- RIGHT FEATURES -->
      <div class="kaa-about-side-features">

        <div class="kaa-about-side-card kaa-side-red">

          <span>
            <i class="bi bi-person-fill"></i>
          </span>

          <div>
            <h3>Expert Faculty</h3>
            <p>Subject experts with years of teaching experience.</p>
          </div>

        </div>

        <div class="kaa-about-side-card kaa-side-blue">

          <span>
            <i class="bi bi-person-video3"></i>
          </span>

          <div>
            <h3>Personal Guidance System</h3>
            <p>Regular academic support, exam planning and doubt solving.</p>
          </div>

        </div>

        <div class="kaa-about-side-card kaa-side-green">

          <span>
            <i class="bi bi-bar-chart-line-fill"></i>
          </span>

          <div>
            <h3>AI Performance Tracking</h3>
            <p>Track progress, identify strengths and improve smarter.</p>
          </div>

        </div>

        <div class="kaa-about-side-card kaa-side-purple">

          <span>
            <i class="bi bi-file-earmark-check-fill"></i>
          </span>

          <div>
            <h3>Weekly Mock Tests</h3>
            <p>Real exam experience with detailed analysis and solutions.</p>
          </div>

        </div>

      </div>

    </div>

    <!-- ================= BOTTOM STATS ================= -->
    <div class="kaa-about-bottom-stats" data-aos="fade-up">

      <div class="kaa-about-bottom-stat">
        <i class="bi bi-mortarboard-fill"></i>

        <div>
          <strong>500+</strong>
          <span>Students Guided</span>
        </div>
      </div>

      <div class="kaa-about-bottom-stat">
        <i class="bi bi-geo-alt-fill"></i>

        <div>
          <strong>15+</strong>
          <span>Villages Connected</span>
        </div>
      </div>

      <div class="kaa-about-bottom-stat">
        <i class="bi bi-graph-up-arrow"></i>

        <div>
          <strong>1000+</strong>
          <span>Tests Analysed</span>
        </div>
      </div>

      <div class="kaa-about-bottom-stat">
        <i class="bi bi-patch-check-fill"></i>

        <div>
          <strong>50%</strong>
          <span>Scholarship Support</span>
        </div>
      </div>

    </div>

  </div>
</section>
<!-- =====================================================
     ABOUT ACADEMY PREMIUM SECTION END
====================================================== -->





<!-- =====================================================
     FOUNDER VISION PREMIUM SECTION START
====================================================== -->
@if(isset($founderSection) && $founderSection)
<section class="kfv-section">

    <div class="kfv-grid-bg" aria-hidden="true"></div>
    <div class="kfv-glow kfv-glow-one" aria-hidden="true"></div>
    <div class="kfv-glow kfv-glow-two" aria-hidden="true"></div>

    <div class="container">

        <div class="kfv-wrapper" data-aos="fade-up">

            <!-- ================= TOP AREA ================= -->
            <div class="kfv-top">

                <!-- LEFT CONTENT -->
                <div class="kfv-intro" data-aos="fade-right">

                    <span class="kfv-badge">
                        <i class="bi bi-people-fill"></i>
                        Founder Leadership
                    </span>

                    <h2>
                        {{ $founderSection->hero_title ?: 'Vision From' }}
                        <span>{{ $founderSection->hero_highlight_text ?: 'Our Founder' }}</span>
                    </h2>

                    <div class="kfv-title-divider">
                        <span></span>
                        <i class="bi bi-star-fill"></i>
                        <span></span>
                    </div>

                    <p>
                        {{ $founderSection->hero_description ?: 'Our mission is to empower rural students with affordable NEET & JEE preparation, AI-enabled learning, mentorship, and scholarship opportunities.' }}
                    </p>

                </div>

                <!-- RIGHT FOUNDER IMAGE -->
                <div class="kfv-founder-visual" data-aos="fade-left">

                    <div class="kfv-founder-frame">

                        <img
                            src="{{ $founderSection->getFirstMediaUrl('founder_image') ?: asset('assets/img/vi.png') }}"
                            alt="{{ $founderSection->image_alt ?: 'Dr. Vitthal Nagare, Founder and Managing Director' }}">

                        <div class="kfv-founder-overlay"></div>

                        <div class="kfv-founder-name-card">

                            <span>Our Founder</span>

                            <h3>{{ $founderSection->founder_name ?: 'Dr. Vitthal Nagare' }}</h3>

                            @if($founderSection->qualification)
                                <p>({{ $founderSection->qualification }})</p>
                            @endif

                            @if($founderSection->designation)
                                <strong>{{ $founderSection->designation }}</strong>
                            @else
                                <strong>Founder &amp; Managing Director</strong>
                            @endif

                        </div>

                    </div>

                </div>

            </div>

            <!-- ================= FOUR MAIN FEATURES ================= -->
            <div class="kfv-primary-features">

                <article class="kfv-primary-card">
                    <span class="kfv-primary-icon">
                        <i class="bi bi-mortarboard-fill"></i>
                    </span>

                    <h3>Affordable NEET &amp; JEE Preparation</h3>
                </article>

                <article class="kfv-primary-card">
                    <span class="kfv-primary-icon">
                        <i class="bi bi-cpu-fill"></i>
                    </span>

                    <h3>AI Enabled Learning</h3>
                </article>

                <article class="kfv-primary-card">
                    <span class="kfv-primary-icon">
                        <i class="bi bi-people-fill"></i>
                    </span>

                    <h3>Mentorship &amp; Guidance</h3>
                </article>

                <article class="kfv-primary-card">
                    <span class="kfv-primary-icon">
                        <i class="bi bi-mortarboard-fill"></i>
                    </span>

                    <h3>Scholarship Opportunities</h3>
                </article>

            </div>

            <!-- ================= FOUNDER QUOTE ================= -->
            <div class="kfv-quote-box" data-aos="fade-up">

                <span class="kfv-quote-label">
                    Founder Vision
                </span>

                <i class="bi bi-quote kfv-quote-left"></i>

                <blockquote>
                    {{ $founderSection->quote_text ?: 'Our mission is to empower rural students with affordable NEET & JEE preparation and future-ready AI learning.' }}
                </blockquote>

                <i class="bi bi-quote kfv-quote-right"></i>

                <span class="kfv-quote-line"></span>

            </div>

            <!-- ================= COMMITMENT TITLE ================= -->
            <div class="kfv-commitment-title">

                <span></span>

                <h3>Our Commitment</h3>

                <span></span>

            </div>

            <!-- ================= SIX COMMITMENT CARDS ================= -->
            <div class="kfv-commitment-grid">

                <article class="kfv-commitment-card">

                    <span class="kfv-commitment-icon">
                        <i class="bi bi-book-fill"></i>
                    </span>

                    <div>
                        <h4>NEET &amp; JEE Guidance</h4>
                        <p>Focused academic preparation</p>
                    </div>

                </article>

                <article class="kfv-commitment-card">

                    <span class="kfv-commitment-icon">
                        <i class="bi bi-percent"></i>
                    </span>

                    <div>
                        <h4>Scholarship Support</h4>
                        <p>Support for deserving students</p>
                    </div>

                </article>

                <article class="kfv-commitment-card">

                    <span class="kfv-commitment-icon">
                        <i class="bi bi-pc-display-horizontal"></i>
                    </span>

                    <div>
                        <h4>AI Learning Vision</h4>
                        <p>Future-ready education system</p>
                    </div>

                </article>

                <article class="kfv-commitment-card">

                    <span class="kfv-commitment-icon">
                        <i class="bi bi-person-heart"></i>
                    </span>

                    <div>
                        <h4>Career Mentorship</h4>
                        <p>Guidance for a bright future</p>
                    </div>

                </article>

                <article class="kfv-commitment-card">

                    <span class="kfv-commitment-icon">
                        <i class="bi bi-people-fill"></i>
                    </span>

                    <div>
                        <h4>Expert Faculty</h4>
                        <p>Experienced and dedicated educators</p>
                    </div>

                </article>

                <article class="kfv-commitment-card">

                    <span class="kfv-commitment-icon">
                        <i class="bi bi-globe2"></i>
                    </span>

                    <div>
                        <h4>Digital Learning Platform</h4>
                        <p>Smart, interactive and accessible</p>
                    </div>

                </article>

            </div>

            <!-- ================= COMPANY & LOCATION ================= -->
            <div class="kfv-meta-panel">

                <div class="kfv-meta-item">

                    <span class="kfv-meta-icon">
                        <i class="bi bi-buildings"></i>
                    </span>

                    <div>
                        <small>Company</small>
                        <strong>
                            {{ $founderSection->company_value ?: 'Khadkeshwar Development Services Pvt Ltd' }}
                        </strong>
                    </div>

                </div>

                <span class="kfv-meta-divider"></span>

                <div class="kfv-meta-item">

                    <span class="kfv-meta-icon">
                        <i class="bi bi-geo-alt"></i>
                    </span>

                    <div>
                        <small>Location</small>
                        <strong>
                            {{ $founderSection->location_value ?: 'Lonar, Maharashtra' }}
                        </strong>
                    </div>

                </div>

            </div>

            <!-- ================= ACTION BUTTONS ================= -->
            <div class="kfv-actions">

                <a href="{{ route('frontend.founders-journey') }}" class="kfv-btn kfv-btn-light">
                    <i class="bi bi-book-fill"></i>
                    Read Founder Journey
                    <i class="bi bi-arrow-right"></i>
                </a>

                <a href="{{ route('frontend.startup-vision') }}" class="kfv-btn kfv-btn-red">
                    <i class="bi bi-rocket-takeoff-fill"></i>
                    Startup Vision
                    <i class="bi bi-arrow-right"></i>
                </a>

                <a href="tel:{{ $phonePrimary }}" class="kfv-btn kfv-btn-green">
                    <i class="bi bi-telephone-fill"></i>

                    <span>
                        <small>Contact Founder</small>
                        <strong>{{ $phonePrimary }}</strong>
                    </span>
                </a>

            </div>

        </div>

    </div>
</section>
@endif
<!-- =====================================================
     FOUNDER VISION PREMIUM SECTION END
====================================================== -->




<!-- =====================================================
     VISION 2030 PREMIUM ROADMAP START
====================================================== -->
<section class="kvr-section" id="vision-roadmap">

  <!-- BACKGROUND DECORATION -->
  <div class="kvr-grid-bg" aria-hidden="true"></div>
  <div class="kvr-glow kvr-glow-one" aria-hidden="true"></div>
  <div class="kvr-glow kvr-glow-two" aria-hidden="true"></div>

  <div class="container">

    <!-- =========================
         SECTION HEADING
    ========================== -->
    <div class="kvr-heading" data-aos="fade-up">

      <span class="kvr-badge">
        <i class="bi bi-rocket-takeoff-fill"></i>
        Vision 2030
      </span>

      <h2>
        Vision 2030: Transforming
        <span>Rural Education Through AI</span>
      </h2>

      <div class="kvr-heading-divider">
        <span></span>
        <i class="bi bi-star-fill"></i>
        <span></span>
      </div>

      <p>
        Khadkeshwar Academy aims to build India’s rural AI learning ecosystem with
        classroom mentorship, digital practice, smart analytics and affordable
        preparation support for NEET &amp; JEE aspirants.
      </p>

    </div>

    <!-- =========================
         ROADMAP TIMELINE
    ========================== -->
    @php
    $timelineIcons = [
        'bi bi-mortarboard-fill',
        'bi bi-bar-chart-line-fill',
        'bi bi-phone-fill',
        'bi bi-people-fill',
        'bi bi-person-check-fill',
        'bi bi-rocket-takeoff-fill',
    ];

    $timelineStatuses = [
        0 => [
            'label' => 'Completed',
            'status_class' => 'kvr-status-completed',
            'status_icon' => 'bi bi-check-circle-fill',
            'item_class' => 'kvr-completed',
            'node_class' => 'kvr-node-red',
        ],
        1 => [
            'label' => 'In Progress',
            'status_class' => 'kvr-status-progress',
            'status_icon' => 'bi bi-record-circle-fill',
            'item_class' => 'kvr-current',
            'node_class' => 'kvr-node-red',
        ],
    ];
@endphp

@if(isset($founderTimelines) && $founderTimelines->count())
    <div class="kvr-timeline">

        <!-- CENTER LINE -->
        <div class="kvr-timeline-line" aria-hidden="true"></div>

        @foreach($founderTimelines as $index => $timeline)

            @php
                $sideClass = $loop->iteration % 2 === 1 ? 'kvr-item-left' : 'kvr-item-right';
                $aosEffect = $loop->iteration % 2 === 1 ? 'fade-right' : 'fade-left';

                $statusData = $timelineStatuses[$index] ?? [
                    'label' => 'Planned',
                    'status_class' => 'kvr-status-planned',
                    'status_icon' => 'bi bi-hourglass-split',
                    'item_class' => '',
                    'node_class' => 'kvr-node-blue',
                ];

                $icon = $timelineIcons[$index] ?? 'bi bi-rocket-takeoff-fill';
            @endphp

            <article class="kvr-roadmap-item {{ $sideClass }} {{ $statusData['item_class'] }}"
                     data-aos="{{ $aosEffect }}">

                @if($index === 1)
                    <span class="kvr-current-label">
                        Current Phase
                    </span>
                @endif

                <div class="kvr-roadmap-card">

                    <div class="kvr-roadmap-icon">
                        <i class="{{ $icon }}"></i>
                    </div>

                    <div class="kvr-roadmap-content">

                        <span class="kvr-year">
                            {{ $timeline->year }}
                        </span>

                        <h3>{{ $timeline->title }}</h3>

                        @if($timeline->description)
                            <p>
                                {{ $timeline->description }}
                            </p>
                        @endif

                        <span class="kvr-status {{ $statusData['status_class'] }}">
                            <i class="{{ $statusData['status_icon'] }}"></i>
                            {{ $statusData['label'] }}
                        </span>

                    </div>

                </div>

                <span class="kvr-node {{ $statusData['node_class'] }}"></span>

            </article>

        @endforeach

    </div>
@endif

    <!-- =========================
         2030 GOALS
    ========================== -->
    <div class="kvr-goals-wrap" data-aos="fade-up">

      <div class="kvr-goals-title">
        <span></span>
        <h3>2030 Goals</h3>
        <span></span>
      </div>

      <div class="kvr-goals-grid">

        <div class="kvr-goal-item kvr-goal-red">

          <span class="kvr-goal-icon">
            <i class="bi bi-people-fill"></i>
          </span>

          <strong>1,00,000+</strong>
          <p>Students Empowered</p>

        </div>

        <div class="kvr-goal-item kvr-goal-blue">

          <span class="kvr-goal-icon">
            <i class="bi bi-buildings-fill"></i>
          </span>

          <strong>500+</strong>
          <p>Rural Learning Centers</p>

        </div>

        <div class="kvr-goal-item kvr-goal-purple">

          <span class="kvr-goal-icon">
            <i class="bi bi-cpu-fill"></i>
          </span>

          <strong>AI-Powered</strong>
          <p>Learning Ecosystem</p>

        </div>

        <div class="kvr-goal-item kvr-goal-green">

          <span class="kvr-goal-icon">
            <i class="bi bi-bullseye"></i>
          </span>

          <strong>95%</strong>
          <p>Success Rate Target</p>

        </div>

        <div class="kvr-goal-item kvr-goal-orange">

          <span class="kvr-goal-icon">
            <i class="bi bi-person-check-fill"></i>
          </span>

          <strong>100+</strong>
          <p>Educational Partnerships</p>

        </div>

      </div>

    </div>

    <!-- =========================
         JOIN VISION CTA
    ========================== -->
    <div class="kvr-join-card" data-aos="fade-up">

      <span class="kvr-join-icon">
        <i class="bi bi-rocket-takeoff-fill"></i>
      </span>

      <div>
        <h3>Join Vision 2030</h3>
        <p>Be a part of India’s AI Education Revolution</p>
      </div>

    </div>

    <!-- =========================
         CONTACT STRIP
    ========================== -->
    <div class="kvr-contact-strip" data-aos="fade-up">

      <div class="kvr-contact-item">

        <span class="kvr-contact-icon">
          <i class="bi bi-geo-alt-fill"></i>
        </span>

        <div>
          <strong>{{$address}}</strong>
          <small>India</small>
        </div>

      </div>

      <span class="kvr-contact-divider"></span>

      <a href="https://www.khadkeshwaracademy.com"
         class="kvr-contact-item kvr-contact-link"
         target="_blank"
         rel="noopener noreferrer">

        <span class="kvr-contact-icon">
          <i class="bi bi-globe2"></i>
        </span>

        <div>
          <strong>www.khadkeshwaracademy.com</strong>
          <small>Official Website</small>
        </div>

      </a>

      <span class="kvr-contact-divider"></span>

      <a href="tel:{{ $phonePrimary }}"
         class="kvr-contact-item kvr-contact-link">

        <span class="kvr-contact-icon kvr-contact-phone">
          <i class="bi bi-telephone-fill"></i>
        </span>

        <div>
          <strong>{{ $phonePrimary }}</strong>
          <small>We are here to help you!</small>
        </div>

      </a>

    </div>

  </div>
</section>
<!-- =====================================================
     VISION 2030 PREMIUM ROADMAP END
====================================================== -->



<!-- =====================================================
     PREMIUM COURSES SECTION START
====================================================== -->
<section class="kpc-section" id="courses">

  <!-- BACKGROUND DECORATION -->
  <div class="kpc-grid-bg" aria-hidden="true"></div>
  <div class="kpc-glow kpc-glow-one" aria-hidden="true"></div>
  <div class="kpc-glow kpc-glow-two" aria-hidden="true"></div>

  <div class="container">

    <!-- =================================================
         SECTION HEADING
    ================================================== -->
    <div class="kpc-heading" data-aos="fade-up">

      <span class="kpc-heading-badge">
        <i class="bi bi-book-half"></i>
        Our Courses
      </span>

      <h2>
        Focused Programs for
        <span>
          <b class="kpc-red-text">NEET</b>,
          <b class="kpc-blue-text">JEE</b> &amp;
          <b class="kpc-purple-text">Foundation Preparation</b>
        </span>
      </h2>

      <p>
        Choose the right academic path with structured classes,
        regular tests, revision support and personal mentorship.
      </p>

      <div class="kpc-heading-divider">
        <span></span>
        <i class="bi bi-star-fill"></i>
        <span></span>
      </div>

    </div>

    <!-- =================================================
         COURSES GRID
    ================================================== -->
    <div class="kpc-course-grid">

      <!-- =============================================
           COURSE 01 — NEET
      ============================================== -->
      <article class="kpc-course-card kpc-course-neet"
               data-aos="fade-up"
               data-aos-delay="100">

        <span class="kpc-course-status">
          <i class="bi bi-star-fill"></i>
          Most Popular
        </span>

        <div class="kpc-course-head">

          <span class="kpc-course-icon">
            <i class="bi bi-heart-pulse-fill"></i>
          </span>

          <div>
            <h3>NEET Preparation</h3>

            <p>
              Complete coaching support for NEET aspirants with concept clarity,
              practice tests and revision planning.
            </p>
          </div>

        </div>

        <ul class="kpc-course-features">
          <li>
            <i class="bi bi-check-circle-fill"></i>
            Biology, Physics &amp; Chemistry
          </li>

          <li>
            <i class="bi bi-check-circle-fill"></i>
            Chapter-wise tests
          </li>

          <li>
            <i class="bi bi-check-circle-fill"></i>
            Doubt support &amp; revision
          </li>

          <li>
            <i class="bi bi-check-circle-fill"></i>
            Weekly &amp; full-length tests
          </li>
        </ul>

        <div class="kpc-course-decoration kpc-decoration-neet">
          <i class="bi bi-heart-pulse"></i>
        </div>

        <div class="kpc-course-info-grid">

          <div class="kpc-course-info">
            <i class="bi bi-clock-history"></i>
            <span>
              <strong>1 / 2 Year</strong>
              Duration
            </span>
          </div>

          <div class="kpc-course-info">
            <i class="bi bi-person-video3"></i>
            <span>
              <strong>Offline + Online</strong>
              Mode
            </span>
          </div>

          <div class="kpc-course-info">
            <i class="bi bi-globe2"></i>
            <span>
              <strong>English + Marathi</strong>
              Language
            </span>
          </div>

          <div class="kpc-course-info">
            <i class="bi bi-clipboard2-check-fill"></i>
            <span>
              <strong>Weekly Tests</strong>
              Test Series
            </span>
          </div>

        </div>

        <div class="kpc-course-actions">

          <a href="{{ route('frontend.neet-program') }}" class="kpc-btn kpc-btn-outline">
            Learn More
            <i class="bi bi-arrow-right"></i>
          </a>

          <a href="{{ route('frontend.admission') }}" class="kpc-btn kpc-btn-filled">
            Apply Now
            <i class="bi bi-arrow-right"></i>
          </a>

        </div>

      </article>

      <!-- =============================================
           COURSE 02 — JEE
      ============================================== -->
      <article class="kpc-course-card kpc-course-jee"
               data-aos="fade-up"
               data-aos-delay="180">

        <span class="kpc-course-status">
          <i class="bi bi-star-fill"></i>
          Top Rated
        </span>

        <div class="kpc-course-head">

          <span class="kpc-course-icon">
            <i class="bi bi-cpu-fill"></i>
          </span>

          <div>
            <h3>JEE Preparation</h3>

            <p>
              Focused JEE coaching with strong fundamentals, numerical practice
              and mock-test based improvement.
            </p>
          </div>

        </div>

        <ul class="kpc-course-features">
          <li>
            <i class="bi bi-check-circle-fill"></i>
            Physics, Chemistry &amp; Maths
          </li>

          <li>
            <i class="bi bi-check-circle-fill"></i>
            Full syllabus mock tests
          </li>

          <li>
            <i class="bi bi-check-circle-fill"></i>
            Performance tracking
          </li>

          <li>
            <i class="bi bi-check-circle-fill"></i>
            IIT &amp; NIT focused preparation
          </li>
        </ul>

        <div class="kpc-course-decoration kpc-decoration-jee">
          <i class="bi bi-compass"></i>
        </div>

        <div class="kpc-course-info-grid">

          <div class="kpc-course-info">
            <i class="bi bi-clock-history"></i>
            <span>
              <strong>1 / 2 Year</strong>
              Duration
            </span>
          </div>

          <div class="kpc-course-info">
            <i class="bi bi-person-video3"></i>
            <span>
              <strong>Offline + Online</strong>
              Mode
            </span>
          </div>

          <div class="kpc-course-info">
            <i class="bi bi-globe2"></i>
            <span>
              <strong>English + Marathi</strong>
              Language
            </span>
          </div>

          <div class="kpc-course-info">
            <i class="bi bi-clipboard2-check-fill"></i>
            <span>
              <strong>Weekly Tests</strong>
              Test Series
            </span>
          </div>

        </div>

        <div class="kpc-course-actions">

          <a href="{{ route('frontend.jee-program') }}" class="kpc-btn kpc-btn-outline">
            Learn More
            <i class="bi bi-arrow-right"></i>
          </a>

          <a href="{{ route('frontend.admission') }}" class="kpc-btn kpc-btn-filled">
            Apply Now
            <i class="bi bi-arrow-right"></i>
          </a>

        </div>

      </article>

      <!-- =============================================
           COURSE 03 — FOUNDATION
      ============================================== -->
      <article class="kpc-course-card kpc-course-foundation"
               data-aos="fade-up"
               data-aos-delay="260">

        <span class="kpc-course-status">
          <i class="bi bi-star-fill"></i>
          Best for Early Start
        </span>

        <div class="kpc-course-head">

          <span class="kpc-course-icon">
            <i class="bi bi-lightbulb-fill"></i>
          </span>

          <div>
            <h3>Foundation Course</h3>

            <p>
              Early preparation support for students who want to build a strong
              academic base for future NEET/JEE goals.
            </p>
          </div>

        </div>

        <ul class="kpc-course-features">
          <li>
            <i class="bi bi-check-circle-fill"></i>
            Concept building
          </li>

          <li>
            <i class="bi bi-check-circle-fill"></i>
            Study discipline
          </li>

          <li>
            <i class="bi bi-check-circle-fill"></i>
            Mentorship support
          </li>

          <li>
            <i class="bi bi-check-circle-fill"></i>
            Regular assessments
          </li>
        </ul>

        <div class="kpc-course-decoration kpc-decoration-foundation">
          <i class="bi bi-book"></i>
        </div>

        <div class="kpc-course-info-grid">

          <div class="kpc-course-info">
            <i class="bi bi-mortarboard-fill"></i>
            <span>
              <strong>Classes 8th–10th</strong>
              Student Level
            </span>
          </div>

          <div class="kpc-course-info">
            <i class="bi bi-person-video3"></i>
            <span>
              <strong>Offline + Online</strong>
              Mode
            </span>
          </div>

          <div class="kpc-course-info">
            <i class="bi bi-globe2"></i>
            <span>
              <strong>English + Marathi</strong>
              Language
            </span>
          </div>

          <div class="kpc-course-info">
            <i class="bi bi-clipboard2-check-fill"></i>
            <span>
              <strong>Weekly Tests</strong>
              Test Series
            </span>
          </div>

        </div>

        <div class="kpc-course-actions">

          <a href="{{ route('frontend.foundation-course') }}" class="kpc-btn kpc-btn-outline">
            Learn More
            <i class="bi bi-arrow-right"></i>
          </a>

          <a href="{{ route('frontend.admission') }}" class="kpc-btn kpc-btn-filled">
            Apply Now
            <i class="bi bi-arrow-right"></i>
          </a>

        </div>

      </article>

      <!-- =============================================
           COURSE 04 — AI LEARNING
      ============================================== -->
      <article class="kpc-course-card kpc-course-ai"
               data-aos="fade-up"
               data-aos-delay="340">

        <span class="kpc-course-status">
          <i class="bi bi-rocket-takeoff-fill"></i>
          New Program
        </span>

        <div class="kpc-course-head">

          <span class="kpc-course-icon">
            <i class="bi bi-cpu-fill"></i>
          </span>

          <div>
            <h3>AI Learning Program</h3>

            <p>
              AI-powered personalized learning to improve performance and save
              preparation time with smart analytics.
            </p>
          </div>

        </div>

        <ul class="kpc-course-features">
          <li>
            <i class="bi bi-check-circle-fill"></i>
            AI Study Assistant
          </li>

          <li>
            <i class="bi bi-check-circle-fill"></i>
            Smart Analytics
          </li>

          <li>
            <i class="bi bi-check-circle-fill"></i>
            Personalized Study Plan
          </li>

          <li>
            <i class="bi bi-check-circle-fill"></i>
            Performance Tracking
          </li>
        </ul>

        <div class="kpc-course-decoration kpc-decoration-ai">
          <i class="bi bi-laptop"></i>
        </div>

        <div class="kpc-course-info-grid">

          <div class="kpc-course-info">
            <i class="bi bi-stopwatch-fill"></i>
            <span>
              <strong>1 Year</strong>
              Duration
            </span>
          </div>

          <div class="kpc-course-info">
            <i class="bi bi-wifi"></i>
            <span>
              <strong>Online</strong>
              Mode
            </span>
          </div>

          <div class="kpc-course-info">
            <i class="bi bi-globe2"></i>
            <span>
              <strong>English + Marathi</strong>
              Language
            </span>
          </div>

          <div class="kpc-course-info">
            <i class="bi bi-clipboard-data-fill"></i>
            <span>
              <strong>Adaptive Tests</strong>
              Test Series
            </span>
          </div>

        </div>

        <div class="kpc-course-actions">

          <a href="{{ route('frontend.ai-learning') }}" class="kpc-btn kpc-btn-outline">
            Learn More
            <i class="bi bi-arrow-right"></i>
          </a>

          <a href="{{ route('frontend.admission') }}" class="kpc-btn kpc-btn-filled">
            Apply Now
            <i class="bi bi-arrow-right"></i>
          </a>

        </div>

      </article>

    </div>

    <!-- =================================================
         COURSE STATISTICS
    ================================================== -->
    <div class="kpc-stats" data-aos="fade-up">

      <div class="kpc-stat kpc-stat-red">
        <i class="bi bi-people-fill"></i>

        <div>
          <strong>10,000+</strong>
          <span>Students Trained</span>
        </div>
      </div>

      <div class="kpc-stat kpc-stat-yellow">
        <i class="bi bi-trophy-fill"></i>

        <div>
          <strong>95%</strong>
          <span>Success Rate</span>
        </div>
      </div>

      <div class="kpc-stat kpc-stat-blue">
        <i class="bi bi-person-check-fill"></i>

        <div>
          <strong>100+</strong>
          <span>Expert Faculty</span>
        </div>
      </div>

      <div class="kpc-stat kpc-stat-green">
        <i class="bi bi-cpu-fill"></i>

        <div>
          <strong>AI</strong>
          <span>Enabled Learning</span>
        </div>
      </div>

      <div class="kpc-stat kpc-stat-orange">
        <i class="bi bi-mortarboard-fill"></i>

        <div>
          <strong>Scholarship</strong>
          <span>&amp; Financial Support</span>
        </div>
      </div>

    </div>

    <!-- =================================================
         CONTACT STRIP
    ================================================== -->
    <div class="kpc-contact-strip" data-aos="fade-up">

      <div class="kpc-contact-item">
        <i class="bi bi-geo-alt-fill"></i>
        <span>{{ $address }}</span>
      </div>

      <span class="kpc-contact-divider"></span>

      <a href="https://www.khadkeshwaracademy.com"
         target="_blank"
         rel="noopener noreferrer"
         class="kpc-contact-item">

        <i class="bi bi-globe2"></i>
        <span>www.khadkeshwaracademy.com</span>

      </a>

      <span class="kpc-contact-divider"></span>

      <a href="tel:{{$phonePrimary}}" class="kpc-contact-item">
        <i class="bi bi-telephone-fill"></i>
        <span>{{$phonePrimary}}</span>
      </a>

    </div>

  </div>
</section>
<!-- =====================================================
     PREMIUM COURSES SECTION END
====================================================== -->





  <!-- ========================= FACULTY PREVIEW START ========================== -->
<section class="faculty-preview-section section-padding">
  <div class="faculty-bg-shape faculty-bg-shape-1"></div>
  <div class="faculty-bg-shape faculty-bg-shape-2"></div>

  <div class="container">

    <div class="section-title center faculty-preview-title" data-aos="fade-up">
      <span class="section-badge">
        <i class="bi bi-person-workspace"></i>
        Expert Faculty
      </span>

      <h2>Guidance from experienced subject mentors.</h2>

      <p>
         Learn from expert NEET &amp; JEE mentors with concept-based teaching,
    mentorship and AI-supported learning guidance.
      </p>
    </div>

   @php
    $facultyDelays = [100, 180, 260, 340];
@endphp

@if(isset($facultyMembers) && $facultyMembers->count())
    <div class="faculty-preview-grid">

        @foreach($facultyMembers as $index => $member)
            <div class="faculty-card {{ $member->is_active ? 'featured-faculty-card' : '' }}"
                 data-aos="fade-up"
                 data-aos-delay="{{ $facultyDelays[$index] ?? 100 }}">

                <div class="faculty-photo">
                    <img
                        src="{{ $member->imageUrl() ?: asset('assets/img/faculty-1.png') }}"
                        alt="{{ $member->image_alt ?: $member->name }}"
                    >

                    @if($member->subject)
                        <span class="faculty-subject-badge">
                            {{ $member->subject }}
                        </span>
                    @endif
                </div>

                <div class="faculty-content">
                    <h3>{{ $member->name }}</h3>

                    <span class="faculty-role">
                        {{ $member->badge ?: $member->subject }}
                    </span>

                    <div class="faculty-info-list">

                        @if($member->point_one)
                            <div>
                                <i class="bi bi-mortarboard-fill"></i>
                                <span>
                                    <strong>Qualification:</strong> {{ $member->point_one }}
                                </span>
                            </div>
                        @endif

                        @if($member->point_two)
                            <div>
                                <i class="bi bi-clock-history"></i>
                                <span>
                                    <strong>Experience:</strong> {{ $member->point_two }}
                                </span>
                            </div>
                        @endif

                        @if($member->point_three)
                            <div>
                                <i class="bi bi-bullseye"></i>
                                <span>
                                    <strong>Expertise:</strong> {{ $member->point_three }}
                                </span>
                            </div>
                        @endif

                    </div>

                    <button class="faculty-video-btn"
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#facultyVideoModal"
                            data-video="https://www.youtube.com/embed/dQw4w9WgXcQ"
                            data-title="{{ $member->name }} - Intro Video">
                        <i class="bi bi-play-circle-fill"></i>
                        Intro Video
                    </button>
                </div>
            </div>
        @endforeach

    </div>
@endif

    <div class="faculty-preview-action" data-aos="fade-up">
      <a href="{{ route('frontend.faculty') }}" class="btn-main">
        View All Faculty
        <i class="bi bi-arrow-right"></i>
      </a>
    </div>

  </div>
</section>
<!-- ========================= FACULTY PREVIEW END ========================== -->


<!-- ========================= FACULTY VIDEO MODAL START ========================== -->
<div class="modal fade faculty-video-modal" id="facultyVideoModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content faculty-video-modal-content">

      <div class="faculty-video-head">
        <h3 id="facultyVideoTitle">Faculty Intro Video</h3>

        <button type="button" class="faculty-video-close" data-bs-dismiss="modal" aria-label="Close">
          <i class="bi bi-x-lg"></i>
        </button>
      </div>

      <div class="faculty-video-frame">
        <iframe id="facultyVideoFrame"
                src=""
                title="Faculty Intro Video"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
      </div>

    </div>
  </div>
</div>
<!-- ========================= FACULTY VIDEO MODAL END ========================== -->



<!-- =====================================================
     WHY CHOOSE US PREMIUM SECTION START
====================================================== -->
<section class="kwc-section" id="why-choose-us">

  <!-- BACKGROUND DECORATION -->
  <div class="kwc-grid-bg" aria-hidden="true"></div>
  <div class="kwc-glow kwc-glow-one" aria-hidden="true"></div>
  <div class="kwc-glow kwc-glow-two" aria-hidden="true"></div>

  <div class="container">

    <!-- =================================================
         SECTION HEADING
    ================================================== -->
    <div class="kwc-heading" data-aos="fade-up">

      <span class="kwc-heading-badge">
        <i class="bi bi-people-fill"></i>
        Why Choose Us
      </span>

      <h2>
        Future-Ready
        <span>AI Learning</span>
        Ecosystem
      </h2>

      <p>
        Khadkeshwar Academy combines expert NEET &amp; JEE faculty,
        personal mentorship, test series, scholarship support and future
        AI-enabled learning to help rural students prepare with confidence.
      </p>

    </div>

    <!-- =================================================
         WHY CHOOSE CARDS
    ================================================== -->
   @php
    $kwcCardClasses = [
        'kwc-card-red',
        'kwc-card-blue',
        'kwc-card-green',
        'kwc-card-yellow',
        'kwc-card-purple',
        'kwc-card-cyan',
    ];

    $kwcDelays = [80, 140, 200, 260, 320, 380];

    $kwcFooterData = [
        [
            'icon' => 'bi bi-star-fill',
            'text' => '10+ Years Experience',
        ],
        [
            'icon' => 'bi bi-person-fill',
            'text' => 'Personalized Support',
        ],
        [
            'icon' => 'bi bi-bar-chart-fill',
            'text' => 'Performance Tracking',
        ],
        [
            'icon' => 'bi bi-gift-fill',
            'text' => 'Financial Assistance',
        ],
        [
            'icon' => 'bi bi-people-fill',
            'text' => 'Rural-First Approach',
        ],
        [
            'icon' => 'bi bi-robot',
            'text' => 'Smart Learning System',
        ],
    ];
@endphp

@if(isset($aboutWhyItems) && $aboutWhyItems->count())
    <div class="kwc-grid">

        @foreach($aboutWhyItems as $index => $whyItem)
            @php
                $cardClass = $kwcCardClasses[$index] ?? 'kwc-card-red';
                $delay = $kwcDelays[$index] ?? 80;
                $footer = $kwcFooterData[$index] ?? [
                    'icon' => 'bi bi-star-fill',
                    'text' => 'Trusted Learning Support',
                ];
            @endphp

            <article class="kwc-card {{ $cardClass }}"
                     data-aos="fade-up"
                     data-aos-delay="{{ $delay }}">

                <div class="kwc-card-icon">
                    <i class="{{ $whyItem->icon ?: 'bi bi-award-fill' }}"></i>
                </div>

                <div class="kwc-card-content">

                    <h3>{{ $whyItem->title }}</h3>

                    <span class="kwc-card-line"></span>

                    @if($whyItem->description)
                        <p>
                            {{ $whyItem->description }}
                        </p>
                    @endif

                </div>

                <div class="kwc-card-footer">
                    <i class="{{ $footer['icon'] }}"></i>
                    <strong>{{ $footer['text'] }}</strong>
                </div>

            </article>
        @endforeach

    </div>
@endif
    <!-- =================================================
         STATISTICS PANEL
    ================================================== -->
    <div class="kwc-stats" data-aos="fade-up">

      <div class="kwc-stat kwc-stat-red">

        <span class="kwc-stat-icon">
          <i class="bi bi-people-fill"></i>
        </span>

        <div>
          <strong>10,000+</strong>
          <span>Students Guided</span>
        </div>

      </div>

      <div class="kwc-stat kwc-stat-yellow">

        <span class="kwc-stat-icon">
          <i class="bi bi-trophy-fill"></i>
        </span>

        <div>
          <strong>95%</strong>
          <span>Success Rate</span>
        </div>

      </div>

      <div class="kwc-stat kwc-stat-blue">

        <span class="kwc-stat-icon">
          <i class="bi bi-person-workspace"></i>
        </span>

        <div>
          <strong>20+</strong>
          <span>Expert Faculty</span>
        </div>

      </div>

      <div class="kwc-stat kwc-stat-green">

        <span class="kwc-stat-icon">
          <i class="bi bi-mortarboard-fill"></i>
        </span>

        <div>
          <strong>500+</strong>
          <span>Scholarships Awarded</span>
        </div>

      </div>

      <div class="kwc-stat kwc-stat-purple">

        <span class="kwc-stat-icon">
          <i class="bi bi-cpu-fill"></i>
        </span>

        <div>
          <strong>AI Enabled</strong>
          <span>Smart Learning</span>
        </div>

      </div>

    </div>

    <!-- =================================================
         ADMISSION CTA
    ================================================== -->
    <div class="kwc-admission" data-aos="fade-up">

      <div class="kwc-admission-title">

        <span class="kwc-admission-icon">
          <i class="bi bi-mortarboard-fill"></i>
        </span>

        <div>
          <h3>Admissions Open 2026</h3>
          <p>Limited seats | Start your success journey today!</p>
        </div>

      </div>

      <span class="kwc-admission-divider"></span>

      <a href="tel:{{ $phonePrimary }}" class="kwc-admission-phone">

        <span>
          <i class="bi bi-telephone-fill"></i>
        </span>

        <div>
          <small>Call for Enquiry</small>
          <strong>{{$phonePrimary}}</strong>
        </div>

      </a>

      <a href="{{ route('frontend.admission') }}" class="kwc-apply-btn">
        Apply Now
        <i class="bi bi-chevron-right"></i>
      </a>

    </div>

    <!-- =================================================
         BOTTOM INFORMATION STRIP
    ================================================== -->
    <div class="kwc-bottom-strip" data-aos="fade-up">

      <div class="kwc-bottom-item">
        <i class="bi bi-geo-alt-fill"></i>
        <span>{{ $address }}</span>
      </div>

      <span class="kwc-bottom-divider"></span>

      <a href="https://www.khadkeshwaracademy.com"
         target="_blank"
         rel="noopener noreferrer"
         class="kwc-bottom-item">

        <i class="bi bi-globe2"></i>
        <span>www.khadkeshwaracademy.com</span>

      </a>

      <span class="kwc-bottom-divider"></span>

    @php
    $socialLinks = [
        'facebook' => [
            'url' => $settings?->facebook_url ?? null,
            'icon' => 'bi bi-facebook',
            'class' => 'knj-social-facebook',
            'label' => 'Facebook'
        ],
        'instagram' => [
            'url' => $settings?->instagram_url ?? null,
            'icon' => 'bi bi-instagram',
            'class' => 'knj-social-instagram',
            'label' => 'Instagram'
        ],
        'youtube' => [
            'url' => $settings?->youtube_url ?? null,
            'icon' => 'bi bi-youtube',
            'class' => 'knj-social-youtube',
            'label' => 'YouTube'
        ],
        'linkedin' => [
            'url' => $settings?->linkedin_url ?? null,
            'icon' => 'bi bi-linkedin',
            'class' => 'knj-social-linkedin',
            'label' => 'LinkedIn'
        ],
        'x' => [
            'url' => $settings?->x_url ?? null,
            'icon' => 'bi bi-twitter-x',
            'class' => 'knj-social-x',
            'label' => 'X'
        ],
        'telegram' => [
            'url' => $settings?->telegram_url ?? null,
            'icon' => 'bi bi-telegram',
            'class' => 'knj-social-telegram',
            'label' => 'Telegram'
        ],
    ];

    $whatsappNumber = $settings?->whatsapp_number
        ?? $settings?->phone
        ?? '91{{ $phonePrimary }}';

    $whatsappNumber = preg_replace('/[^0-9]/', '', $whatsappNumber);
@endphp

<div class="kwc-social-wrap">

    <span>Follow Us On</span>

    @foreach($socialLinks as $social)
        @if(!empty($social['url']))
            <a href="{{ $social['url'] }}"
               class="{{ $social['class'] }}"
               target="_blank"
               rel="noopener noreferrer"
               aria-label="{{ $social['label'] }}">
                <i class="{{ $social['icon'] }}"></i>
            </a>
        @endif
    @endforeach

    @if($whatsappNumber)
        <a href="https://wa.me/{{ $whatsappNumber }}"
           class="knj-social-whatsapp"
           target="_blank"
           rel="noopener noreferrer"
           aria-label="WhatsApp">
            <i class="bi bi-whatsapp"></i>
        </a>
    @endif

</div>

    </div>

  </div>
</section>
<!-- =====================================================
     WHY CHOOSE US PREMIUM SECTION END
====================================================== -->


<!-- =====================================================
     SCHOLARSHIP & FINANCIAL ASSISTANCE START
====================================================== -->
<section class="ksf-section" id="scholarship-support">

  <!-- BACKGROUND DECORATION -->
  <div class="ksf-grid-bg" aria-hidden="true"></div>
  <div class="ksf-glow ksf-glow-one" aria-hidden="true"></div>
  <div class="ksf-glow ksf-glow-two" aria-hidden="true"></div>

  <div class="container">

    <!-- =================================================
         TOP HERO AREA
    ================================================== -->
    <div class="ksf-top" data-aos="fade-up">

      <!-- LEFT CONTENT -->
      <div class="ksf-heading">

        <span class="ksf-badge">
          <i class="bi bi-mortarboard-fill"></i>
          Education Support &amp; Fee Concession
        </span>

        <h2>
          Scholarship &amp;
          <span>Financial Assistance</span>
        </h2>

        <p>
          Supporting deserving rural students through scholarships and
          fee concessions.
        </p>

      </div>

      <!-- RIGHT 50% CARD -->
      <div class="ksf-concession-card">

        <span class="ksf-up-to">Up To</span>

        <strong>50%</strong>

        <h3>Fee Concession</h3>

        <p>Based on eligibility</p>

        <div class="ksf-concession-line"></div>

        <span class="ksf-document-note">
          <i class="bi bi-check-circle-fill"></i>
          Document verification required
        </span>

      </div>

    </div>

    <!-- =================================================
         MAIN SCHOLARSHIP PANEL
    ================================================== -->
    <div class="ksf-main-panel">

      <!-- ELIGIBILITY TITLE -->
      <div class="ksf-section-title">
        <span></span>
        <i class="bi bi-circle-fill"></i>
        <h3>Eligibility Criteria</h3>
        <i class="bi bi-circle-fill"></i>
        <span></span>
      </div>

      <!-- ELIGIBILITY CARDS -->
      <div class="ksf-eligibility-grid">

        <!-- CARD 01 -->
        <article class="ksf-eligibility-card ksf-card-red">

          <span class="ksf-eligibility-icon">
            <i class="bi bi-person-arms-up"></i>
          </span>

          <div>
            <h4>Farmer Family</h4>

            <p>
              Children of farmers with less than 5 hectares of land.
            </p>
          </div>

        </article>

        <!-- CARD 02 -->
        <article class="ksf-eligibility-card ksf-card-pink">

          <span class="ksf-eligibility-icon">
            <i class="bi bi-person-fill"></i>
          </span>

          <div>
            <h4>Girls Scholarship</h4>

            <p>
              Girls scoring 90%+ in Class 10 are eligible for up to
              50% fee concession.
            </p>
          </div>

        </article>

        <!-- CARD 03 -->
        <article class="ksf-eligibility-card ksf-card-purple">

          <span class="ksf-eligibility-icon">
            <i class="bi bi-universal-access-circle"></i>
          </span>

          <div>
            <h4>Differently-Abled Family</h4>

            <p>
              Children of differently-abled parents are eligible for concession.
            </p>
          </div>

        </article>

        <!-- CARD 04 -->
        <article class="ksf-eligibility-card ksf-card-blue">

          <span class="ksf-eligibility-icon">
            <i class="bi bi-person-badge-fill"></i>
          </span>

          <div>
            <h4>Ex-Servicemen Family</h4>

            <p>
              Children of ex-servicemen are eligible for fee concession.
            </p>
          </div>

        </article>

        <!-- CARD 05 -->
        <article class="ksf-eligibility-card ksf-card-green">

          <span class="ksf-eligibility-icon">
            <i class="bi bi-people-fill"></i>
          </span>

          <div>
            <h4>Orphan Students</h4>

            <p>
              Orphan students are eligible for scholarship support.
            </p>
          </div>

        </article>

        <!-- CARD 06 -->
        <article class="ksf-eligibility-card ksf-card-orange">

          <span class="ksf-eligibility-icon">
            <i class="bi bi-house-fill"></i>
          </span>

          <div>
            <h4>Landless Families</h4>

            <p>
              Children of landless parents are eligible for financial assistance.
            </p>
          </div>

        </article>

      </div>

      <!-- =================================================
           SCHOLARSHIP PROCESS
      ================================================== -->
      <div class="ksf-section-title ksf-process-title">
        <span></span>
        <i class="bi bi-circle-fill"></i>
        <h3>Our Scholarship Process</h3>
        <i class="bi bi-circle-fill"></i>
        <span></span>
      </div>

      <div class="ksf-process-grid">

        <!-- STEP 01 -->
        <article class="ksf-process-card">

          <span class="ksf-step-number">1</span>

          <div class="ksf-process-icon">
            <i class="bi bi-clipboard2-check"></i>
          </div>

          <h4>Apply</h4>

          <p>
            Fill out the scholarship application form.
          </p>

        </article>

        <!-- ARROW -->
        <span class="ksf-process-arrow">
          <i class="bi bi-arrow-right"></i>
        </span>

        <!-- STEP 02 -->
        <article class="ksf-process-card">

          <span class="ksf-step-number">2</span>

          <div class="ksf-process-icon">
            <i class="bi bi-file-earmark-check"></i>
          </div>

          <h4>Document Verification</h4>

          <p>
            Submit the required documents for verification.
          </p>

        </article>

        <!-- ARROW -->
        <span class="ksf-process-arrow">
          <i class="bi bi-arrow-right"></i>
        </span>

        <!-- STEP 03 -->
        <article class="ksf-process-card">

          <span class="ksf-step-number">3</span>

          <div class="ksf-process-icon">
            <i class="bi bi-patch-check"></i>
          </div>

          <h4>Eligibility Approval</h4>

          <p>
            Eligible students will be notified after verification and review.
          </p>

        </article>

        <!-- ARROW -->
        <span class="ksf-process-arrow">
          <i class="bi bi-arrow-right"></i>
        </span>

        <!-- STEP 04 -->
        <article class="ksf-process-card">

          <span class="ksf-step-number">4</span>

          <div class="ksf-process-icon">
            <i class="bi bi-mortarboard"></i>
          </div>

          <h4>Fee Concession Granted</h4>

          <p>
            Approved students will receive up to 50% fee concession.
          </p>

        </article>

      </div>

      <!-- =================================================
           IMPORTANT NOTES
      ================================================== -->
      <div class="ksf-notes-box">

        <h3>Important Notes</h3>

        <div class="ksf-notes-grid">

          <div class="ksf-note-item">
            <span>
              <i class="bi bi-file-earmark-text-fill"></i>
            </span>

            <p>
              Relevant documents and certificates are mandatory.
            </p>
          </div>

          <div class="ksf-note-item">
            <span>
              <i class="bi bi-shield-check"></i>
            </span>

            <p>
              Only one concession is applicable per student.
            </p>
          </div>

          <div class="ksf-note-item">
            <span>
              <i class="bi bi-exclamation-triangle-fill"></i>
            </span>

            <p>
              If false information is provided, concession will be cancelled.
            </p>
          </div>

          <div class="ksf-note-item">
            <span>
              <i class="bi bi-hammer"></i>
            </span>

            <p>
              Management’s decision will be final.
            </p>
          </div>

        </div>

      </div>

      <!-- =================================================
           STATISTICS
      ================================================== -->
      <div class="ksf-stats">

        <div class="ksf-stat ksf-stat-red">

          <i class="bi bi-people-fill"></i>

          <div>
            <strong>500+</strong>
            <span>Scholarships Awarded</span>
          </div>

        </div>

        <div class="ksf-stat ksf-stat-blue">

          <i class="bi bi-mortarboard-fill"></i>

          <div>
            <strong>10,000+</strong>
            <span>Students Supported</span>
          </div>

        </div>

        <div class="ksf-stat ksf-stat-green">

          <i class="bi bi-trophy-fill"></i>

          <div>
            <strong>95%</strong>
            <span>Success Rate</span>
          </div>

        </div>

        <div class="ksf-stat ksf-stat-orange">

          <i class="bi bi-person-check-fill"></i>

          <div>
            <strong>Committed</strong>
            <span>Rural Education Development</span>
          </div>

        </div>

      </div>

    </div>

    <!-- =================================================
         ADMISSION CTA
    ================================================== -->
    <div class="ksf-admission-box" data-aos="fade-up">

      <div class="ksf-admission-left">

        <span class="ksf-admission-icon">
          <i class="bi bi-mortarboard-fill"></i>
        </span>

        <div>
          <h3>Admissions Open 2026</h3>

          <p>
            Take the first step towards a brighter future.
          </p>

          <div class="ksf-admission-actions">

            <button
              type="button"
              class="ksf-btn ksf-btn-red"
              data-bs-toggle="modal"
              data-bs-target="#admissionModal">

              Apply Now
              <i class="bi bi-arrow-right"></i>
            </button>

            <a href="{{ route('frontend.scholarship') }}" class="ksf-btn ksf-btn-outline">
              Check Eligibility
              <i class="bi bi-chevron-right"></i>
            </a>

          </div>
        </div>

      </div>

      <span class="ksf-admission-divider"></span>

      <div class="ksf-admission-contact">

        <a href="tel:{{ $phonePrimary }}" class="ksf-contact-row">

          <span>
            <i class="bi bi-telephone-fill"></i>
          </span>

          <div>
            <small>Admission Helpline</small>
            <strong>$phonePrimary</strong>
          </div>

        </a>

        <div class="ksf-contact-row">

          <span>
            <i class="bi bi-geo-alt-fill"></i>
          </span>

          <div>
            <small>Academy Address</small>
            <strong>
              {{ $address }}
            </strong>
          </div>

        </div>

      </div>

    </div>

  </div>
</section>
<!-- =====================================================
     SCHOLARSHIP & FINANCIAL ASSISTANCE END
====================================================== -->



<!-- =====================================================
     ACHIEVEMENTS & IMPACT SECTION START
====================================================== -->
<section class="kai-section" id="achievements-impact">

  <!-- BACKGROUND DECORATION -->
  <div class="kai-grid-bg" aria-hidden="true"></div>
  <div class="kai-dot-pattern kai-dot-left" aria-hidden="true"></div>
  <div class="kai-dot-pattern kai-dot-right" aria-hidden="true"></div>
  <div class="kai-glow kai-glow-one" aria-hidden="true"></div>
  <div class="kai-glow kai-glow-two" aria-hidden="true"></div>

  <div class="container">

    <!-- =================================================
         SECTION HEADING
    ================================================== -->
    <div class="kai-heading" data-aos="fade-up">

      <span class="kai-heading-badge">
        <i class="bi bi-trophy-fill"></i>
        Achievements &amp; Impact
      </span>

      <h2>
        Transforming Rural Education
        <span>
          Through <b>AI-Powered</b> Learning
        </span>
      </h2>

      <p>
        Our mission is to make quality NEET &amp; JEE preparation accessible
        for every deserving rural student.
      </p>

      <div class="kai-trust-line">
        <i class="bi bi-mortarboard-fill"></i>

        <span>
          Combining classroom mentorship with future-ready AI learning support.
        </span>
      </div>

    </div>

    <!-- =================================================
         IMPACT CARDS
    ================================================== -->
    <div class="kai-grid">

      <!-- CARD 01 -->
      <article class="kai-card kai-card-red"
               data-aos="fade-up"
               data-aos-delay="100">

        <span class="kai-card-icon">
          <i class="bi bi-people-fill"></i>
        </span>

        <strong>500+</strong>

        <h3>Students Mentored</h3>

        <span class="kai-card-line"></span>

      </article>

      <!-- CARD 02 -->
      <article class="kai-card kai-card-blue"
               data-aos="fade-up"
               data-aos-delay="180">

        <span class="kai-card-icon">
          <i class="bi bi-geo-alt-fill"></i>
        </span>

        <strong>15+</strong>

        <h3>Rural Villages Connected</h3>

        <span class="kai-card-line"></span>

      </article>

      <!-- CARD 03 -->
      <article class="kai-card kai-card-green"
               data-aos="fade-up"
               data-aos-delay="260">

        <span class="kai-card-icon">
          <i class="bi bi-graph-up-arrow"></i>
        </span>

        <strong>85%</strong>

        <h3>Improved Academic Results</h3>

        <span class="kai-card-line"></span>

      </article>

      <!-- CARD 04 -->
      <article class="kai-card kai-card-purple"
               data-aos="fade-up"
               data-aos-delay="340">

        <span class="kai-card-icon">
          <i class="bi bi-person-check-fill"></i>
        </span>

        <strong>100%</strong>

        <h3>Personal Mentorship Support</h3>

        <span class="kai-card-line"></span>

      </article>

      <!-- CARD 05 -->
      <article class="kai-card kai-card-orange"
               data-aos="fade-up"
               data-aos-delay="420">

        <span class="kai-card-icon">
          <i class="bi bi-award-fill"></i>
        </span>

        <strong>50%</strong>

        <h3>Scholarship Support</h3>

        <span class="kai-card-line"></span>

      </article>

      <!-- CARD 06 -->
      <article class="kai-card kai-card-cyan"
               data-aos="fade-up"
               data-aos-delay="500">

        <span class="kai-card-icon">
          <i class="bi bi-cpu-fill"></i>
        </span>

        <strong>AI</strong>

        <h3>Future Learning Support</h3>

        <span class="kai-card-line"></span>

      </article>

    </div>

    <!-- =================================================
         BOTTOM IMPACT PANEL
    ================================================== -->
    <div class="kai-bottom-panel" data-aos="fade-up">

      <div class="kai-bottom-title">

        <span class="kai-target-icon">
          <i class="bi bi-bullseye"></i>
        </span>

        <h3>Our Impact</h3>

      </div>

      <span class="kai-bottom-divider"></span>

      <p>
        We are committed to bridging the education gap in rural areas and
        creating future doctors and engineers with confidence and clarity.
      </p>

      <div class="kai-bottom-visual" aria-hidden="true">

        <i class="bi bi-people-fill"></i>

        <span></span>
        <span></span>
        <span></span>

      </div>

    </div>

  </div>
</section>
<!-- =====================================================
     ACHIEVEMENTS & IMPACT SECTION END
====================================================== -->


<!-- =====================================================
     AI LEARNING ECOSYSTEM SECTION START
====================================================== -->
<section class="kal-section" id="ai-learning">

  <div class="kal-bg-grid" aria-hidden="true"></div>
  <div class="kal-bg-glow kal-bg-glow-one" aria-hidden="true"></div>
  <div class="kal-bg-glow kal-bg-glow-two" aria-hidden="true"></div>

  <div class="container">

    <!-- =================================================
         MAIN AI PANEL
    ================================================== -->
    <div class="kal-main-panel" data-aos="fade-up">

      <div class="kal-panel-grid" aria-hidden="true"></div>
      <div class="kal-dot-pattern kal-dot-left" aria-hidden="true"></div>
      <div class="kal-dot-pattern kal-dot-right" aria-hidden="true"></div>

      <!-- SECTION BADGE -->
      <div class="kal-top-badge-wrap">
        <span class="kal-top-badge">
          <i class="bi bi-calendar2-check-fill"></i>
          Coming in Phase 2
        </span>
      </div>

      <!-- HEADING AREA -->
      <div class="kal-heading-area">

        <div class="kal-ai-symbol">
          <span>AI</span>
        </div>

        <div class="kal-heading-content">

          <h2>
            AI-Powered Learning Ecosystem for
            <span>Rural Students</span>
          </h2>

          <p>
            Khadkeshwar Academy is planning a smart learning ecosystem with test analytics,
            weak-topic tracking, AI revision planning and student progress dashboards
            for NEET &amp; JEE aspirants.
          </p>

        </div>

      </div>

      <!-- TRUST LINE -->
      <div class="kal-trust-line">
        <span class="kal-trust-icon">
          <i class="bi bi-mortarboard-fill"></i>
        </span>

        <p>
          Combining classroom mentorship with
          <strong>future-ready AI learning</strong> support.
        </p>
      </div>

      <!-- =================================================
           AI FEATURES GRID
      ================================================== -->
      <div class="kal-feature-grid">

        <!-- FEATURE 01 -->
        <article class="kal-feature-card kal-feature-red">

          <span class="kal-feature-icon">
            <i class="bi bi-bar-chart-line-fill"></i>
          </span>

          <div>
            <h3>Smart Test Analytics</h3>
            <span class="kal-feature-line"></span>

            <p>
              Detailed test analysis with performance insights.
            </p>
          </div>

        </article>

        <!-- FEATURE 02 -->
        <article class="kal-feature-card kal-feature-orange">

          <span class="kal-feature-icon">
            <i class="bi bi-bullseye"></i>
          </span>

          <div>
            <h3>Weak Topic Detection</h3>
            <span class="kal-feature-line"></span>

            <p>
              AI identifies weak topics and suggests focused practice.
            </p>
          </div>

        </article>

        <!-- FEATURE 03 -->
        <article class="kal-feature-card kal-feature-purple">

          <span class="kal-feature-icon">
            <i class="bi bi-clipboard2-check-fill"></i>
          </span>

          <div>
            <h3>AI Revision Planner</h3>
            <span class="kal-feature-line"></span>

            <p>
              Personalized revision plans based on strengths and weaknesses.
            </p>
          </div>

        </article>

        <!-- FEATURE 04 -->
        <article class="kal-feature-card kal-feature-blue">

          <span class="kal-feature-icon">
            <i class="bi bi-display-fill"></i>
          </span>

          <div>
            <h3>Student Progress Dashboard</h3>
            <span class="kal-feature-line"></span>

            <p>
              Track progress with smart dashboards and reports.
            </p>
          </div>

        </article>

        <!-- FEATURE 05 -->
        <article class="kal-feature-card kal-feature-green">

          <span class="kal-feature-icon">
            <i class="bi bi-person-circle"></i>
          </span>

          <div>
            <h3>Personalized Study Plans</h3>
            <span class="kal-feature-line"></span>

            <p>
              AI creates customized study plans for every student.
            </p>
          </div>

        </article>

        <!-- FEATURE 06 -->
        <article class="kal-feature-card kal-feature-cyan">

          <span class="kal-feature-icon">
            <i class="bi bi-cpu-fill"></i>
          </span>

          <div>
            <h3>AI Performance Reports</h3>
            <span class="kal-feature-line"></span>

            <p>
              AI-generated reports with personalized improvement suggestions.
            </p>
          </div>

        </article>

        <!-- FEATURE 07 -->
        <article class="kal-feature-card kal-feature-pink">

          <span class="kal-feature-icon">
            <i class="bi bi-calendar2-check-fill"></i>
          </span>

          <div>
            <h3>Daily Practice Tracking</h3>
            <span class="kal-feature-line"></span>

            <p>
              Track daily practice, accuracy and preparation time.
            </p>
          </div>

        </article>

        <!-- FEATURE 08 -->
        <article class="kal-feature-card kal-feature-yellow">

          <span class="kal-feature-icon">
            <i class="bi bi-file-earmark-text-fill"></i>
          </span>

          <div>
            <h3>Mock Test Analytics</h3>
            <span class="kal-feature-line"></span>

            <p>
              Comprehensive mock-test analysis and rank prediction.
            </p>
          </div>

        </article>

      </div>

      <!-- =================================================
           BENEFIT CARDS
      ================================================== -->
      <div class="kal-benefit-grid">

        <article class="kal-benefit-card kal-benefit-red">

          <span class="kal-benefit-icon">
            <i class="bi bi-mortarboard-fill"></i>
          </span>

          <div>
            <h3>Personalized Learning</h3>
            <span class="kal-benefit-line"></span>

            <p>
              Student-focused path with AI-driven guidance and continuous support.
            </p>
          </div>

          <i class="bi bi-book-half kal-benefit-watermark"></i>

        </article>

        <article class="kal-benefit-card kal-benefit-blue">

          <span class="kal-benefit-icon">
            <i class="bi bi-brain"></i>
          </span>

          <div>
            <h3>AI Analytics</h3>
            <span class="kal-benefit-line"></span>

            <p>
              Smart performance insights to help every student improve faster.
            </p>
          </div>

          <i class="bi bi-graph-up-arrow kal-benefit-watermark"></i>

        </article>

        <article class="kal-benefit-card kal-benefit-green">

          <span class="kal-benefit-icon">
            <i class="bi bi-trophy-fill"></i>
          </span>

          <div>
            <h3>Future-Ready Preparation</h3>
            <span class="kal-benefit-line"></span>

            <p>
              End-to-end NEET &amp; JEE preparation with AI and expert mentorship.
            </p>
          </div>

          <i class="bi bi-bullseye kal-benefit-watermark"></i>

        </article>

      </div>

      <!-- CTA -->
      <div class="kal-main-action">
        <a href="{{ route('frontend.ai-learning') }}" class="kal-primary-btn">
          Explore AI Learning Plan
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>

    </div>

    <!-- =================================================
         PHASE 2 PLATFORM PANEL
    ================================================== -->
    <div class="kal-platform-panel" data-aos="fade-up">

      <div class="kal-platform-content">

        <span class="kal-platform-badge">
          Phase 2
        </span>

        <h2>
          Upcoming<br>
          AI Education Platform
        </h2>

        <ul class="kal-platform-list">

          <li>
            <i class="bi bi-check-circle-fill"></i>
            AI Mentor Assistant
          </li>

          <li>
            <i class="bi bi-check-circle-fill"></i>
            Smart Revision Planner
          </li>

          <li>
            <i class="bi bi-check-circle-fill"></i>
            Performance Dashboard
          </li>

          <li>
            <i class="bi bi-check-circle-fill"></i>
            Weak Topic Analysis
          </li>

          <li>
            <i class="bi bi-check-circle-fill"></i>
            Adaptive Learning System
          </li>

        </ul>

        <span class="kal-launching-pill">
          Launching Soon
          <i class="bi bi-rocket-takeoff-fill"></i>
        </span>

      </div>

      <div class="kal-platform-visual">

        <img
          src="https://images.unsplash.com/photo-1677442136019-21780ecad995?auto=format&fit=crop&w=1200&q=85"
          alt="Upcoming AI education platform for rural NEET JEE students">

        <div class="kal-platform-overlay"></div>

        <div class="kal-ai-core">
          <span>AI</span>
        </div>

      </div>

    </div>

    <!-- =================================================
         BOTTOM CONTACT STRIP
    ================================================== -->
    <div class="kal-bottom-strip" data-aos="fade-up">

      <div class="kal-bottom-item">

        <span class="kal-bottom-icon kal-bottom-purple">
          <i class="bi bi-rocket-takeoff-fill"></i>
        </span>

        <div>
          <strong>Be Part of the AI Revolution</strong>
          <small>Empowering rural students for a brighter future.</small>
        </div>

      </div>

      <span class="kal-bottom-divider"></span>

      <a href="tel:{{ $phonePrimary }}" class="kal-bottom-item">

        <span class="kal-bottom-icon kal-bottom-red">
          <i class="bi bi-telephone-fill"></i>
        </span>

        <div>
          <small>Call for Enquiry</small>
          <strong>{{ $phonePrimary }}</strong>
        </div>

      </a>

      <span class="kal-bottom-divider"></span>

      <div class="kal-bottom-item">

        <span class="kal-bottom-icon kal-bottom-red">
          <i class="bi bi-geo-alt-fill"></i>
        </span>

        <div>
          <strong>Khadkeshwar Academy</strong>
          <small>{{ $address }}</small>
        </div>

      </div>

    </div>

  </div>
</section>
<!-- =====================================================
     AI LEARNING ECOSYSTEM SECTION END
====================================================== -->





<!-- =====================================================
     FUTURE AI STUDENT DASHBOARD START
====================================================== -->
<section class="future-ai-dashboard-section" id="future-ai-dashboard">

  <!-- BACKGROUND DECORATIONS -->
  <div class="fad-bg-grid" aria-hidden="true"></div>
  <div class="fad-glow fad-glow-left" aria-hidden="true"></div>
  <div class="fad-glow fad-glow-right" aria-hidden="true"></div>

  <div class="container">

    <!-- =================================================
         SECTION HEADING
    ================================================== -->
    <div class="fad-heading" data-aos="fade-up">

      <span class="fad-heading-badge">
        <i class="bi bi-stars"></i>
        Coming Soon
      </span>

      <h2>
        Future <span>AI</span> Student Dashboard
      </h2>

      <p>
        Smart AI dashboard with test analytics, weak-topic tracking,
        study planning and parent progress monitoring.
      </p>

    </div>

    <!-- =================================================
         TOP FEATURE CARDS
    ================================================== -->
    <div class="fad-feature-grid">

      <!-- FEATURE 01 -->
      <article class="fad-feature-card fad-feature-red"
               data-aos="fade-up"
               data-aos-delay="100">

        <span class="fad-feature-icon">
          <i class="bi bi-graph-up-arrow"></i>
        </span>

        <h3>AI Test Analytics</h3>

        <span class="fad-feature-line"></span>

        <p>
          Detailed test performance with smart insights.
        </p>

      </article>

      <!-- FEATURE 02 -->
      <article class="fad-feature-card fad-feature-orange"
               data-aos="fade-up"
               data-aos-delay="180">

        <span class="fad-feature-icon">
          <i class="bi bi-bullseye"></i>
        </span>

        <h3>Weak Topic Detection</h3>

        <span class="fad-feature-line"></span>

        <p>
          AI identifies weak topics and suggests improvement.
        </p>

      </article>

      <!-- FEATURE 03 -->
      <article class="fad-feature-card fad-feature-purple"
               data-aos="fade-up"
               data-aos-delay="260">

        <span class="fad-feature-icon">
          <i class="bi bi-calendar2-check-fill"></i>
        </span>

        <h3>Smart Study Planner</h3>

        <span class="fad-feature-line"></span>

        <p>
          Personalized daily study plan for better results.
        </p>

      </article>

      <!-- FEATURE 04 -->
      <article class="fad-feature-card fad-feature-blue"
               data-aos="fade-up"
               data-aos-delay="340">

        <span class="fad-feature-icon">
          <i class="bi bi-people-fill"></i>
        </span>

        <h3>Parent Monitoring</h3>

        <span class="fad-feature-line"></span>

        <p>
          Real-time progress updates for parents.
        </p>

      </article>

    </div>

    <!-- =================================================
         MAIN ACTION BUTTONS
    ================================================== -->
    <div class="fad-main-actions" data-aos="fade-up">

      <a href="{{ route('frontend.ai-learning') }}" class="fad-primary-btn">
        Explore AI Learning Plan
        <i class="bi bi-arrow-right"></i>
      </a>

      <a href="tel:{{ $phonePrimary }}" class="fad-outline-btn">
        <i class="bi bi-telephone-fill"></i>
        Call Admission Team
      </a>

    </div>

    <!-- =================================================
         MAIN DASHBOARD
    ================================================== -->
    <div class="fad-dashboard-panel" data-aos="fade-up">

      <div class="fad-dashboard-pattern" aria-hidden="true"></div>

      <!-- DASHBOARD HEADER -->
      <div class="fad-dashboard-header">

        <div>
          <span class="fad-dashboard-eyebrow">
            Student Progress
          </span>

          <h3>Learning Overview</h3>
        </div>

        <span class="fad-ai-powered">
          <i class="bi bi-cpu-fill"></i>
          AI Powered
        </span>

      </div>

      <!-- =================================================
           DASHBOARD ANALYTICS TOP
      ================================================== -->
      <div class="fad-analytics-layout">

        <!-- SCORE CARD -->
        <div class="fad-score-card">

          <div class="fad-score-ring">
            <div class="fad-score-inner">
              <strong>85%</strong>
              <span>Overall Score</span>
            </div>
          </div>

          <div class="fad-score-growth">
            <strong>
              <i class="bi bi-arrow-up"></i>
              +12%
            </strong>

            <span>Better than last test</span>
          </div>

        </div>

        <!-- GRAPH CARD -->
        <div class="fad-graph-card">

          <span class="fad-graph-label">
            Test Analytics
          </span>

          <h4>Great improvement this week!</h4>

          <div class="fad-green-progress">
            <span style="width: 72%;"></span>
          </div>

          <div class="fad-chart">

            <div class="fad-chart-grid-line line-1"></div>
            <div class="fad-chart-grid-line line-2"></div>
            <div class="fad-chart-grid-line line-3"></div>
            <div class="fad-chart-grid-line line-4"></div>

            <svg viewBox="0 0 520 180"
                 preserveAspectRatio="none"
                 aria-label="Student weekly performance graph">

              <defs>
                <linearGradient id="fadChartGradient"
                                x1="0"
                                y1="0"
                                x2="1"
                                y2="0">
                  <stop offset="0%" stop-color="#ff2850"/>
                  <stop offset="48%" stop-color="#ffc332"/>
                  <stop offset="100%" stop-color="#32ef78"/>
                </linearGradient>

                <linearGradient id="fadChartArea"
                                x1="0"
                                y1="0"
                                x2="0"
                                y2="1">
                  <stop offset="0%" stop-color="#42eb79" stop-opacity=".28"/>
                  <stop offset="100%" stop-color="#42eb79" stop-opacity="0"/>
                </linearGradient>
              </defs>

              <path
                d="M20 150
                   C80 145, 95 130, 130 125
                   S205 105, 250 90
                   S315 55, 350 54
                   S420 58, 500 20
                   L500 180
                   L20 180 Z"
                fill="url(#fadChartArea)">
              </path>

              <path
                d="M20 150
                   C80 145, 95 130, 130 125
                   S205 105, 250 90
                   S315 55, 350 54
                   S420 58, 500 20"
                fill="none"
                stroke="url(#fadChartGradient)"
                stroke-width="5"
                stroke-linecap="round">
              </path>

              <circle cx="20" cy="150" r="7" fill="#ff2850"></circle>
              <circle cx="130" cy="125" r="7" fill="#ff7544"></circle>
              <circle cx="250" cy="90" r="7" fill="#ffc332"></circle>
              <circle cx="350" cy="54" r="7" fill="#a7e84b"></circle>
              <circle cx="500" cy="20" r="8" fill="#32ef78"></circle>

            </svg>

            <div class="fad-chart-labels">
              <span>Week 1</span>
              <span>Week 2</span>
              <span>Week 3</span>
              <span>Week 4</span>
              <span>This Week</span>
            </div>

          </div>

        </div>

        <!-- PERFORMANCE SUMMARY -->
        <div class="fad-summary-card">

          <h4>Performance Summary</h4>

          <div class="fad-summary-list">

            <div class="fad-summary-item">
              <span class="fad-summary-icon fad-summary-blue">
                <i class="bi bi-clipboard2-check"></i>
              </span>

              <span>Tests Attempted</span>
              <strong>24</strong>
            </div>

            <div class="fad-summary-item">
              <span class="fad-summary-icon fad-summary-red">
                <i class="bi bi-bullseye"></i>
              </span>

              <span>Average Accuracy</span>
              <strong>85%</strong>
            </div>

            <div class="fad-summary-item">
              <span class="fad-summary-icon fad-summary-yellow">
                <i class="bi bi-star-fill"></i>
              </span>

              <span>Top Score</span>
              <strong>94%</strong>
            </div>

            <div class="fad-summary-item">
              <span class="fad-summary-icon fad-summary-cyan">
                <i class="bi bi-clock"></i>
              </span>

              <span>Time Spent</span>
              <strong>48 hrs</strong>
            </div>

          </div>

        </div>

      </div>

      <!-- =================================================
           SUBJECT PERFORMANCE
      ================================================== -->
      <div class="fad-subject-list">

        <!-- PHYSICS -->
        <article class="fad-subject-row fad-subject-physics">

          <span class="fad-subject-icon">
            <i class="bi bi-atom"></i>
          </span>

          <div class="fad-subject-name">
            <strong>Physics</strong>
            <small>Weak Topic: Electrostatics</small>
          </div>

          <div class="fad-subject-progress">
            <span style="width: 72%;"></span>
          </div>

          <strong class="fad-subject-score">72%</strong>

          <span class="fad-subject-status">
            Needs Improvement
          </span>

        </article>

        <!-- CHEMISTRY -->
        <article class="fad-subject-row fad-subject-chemistry">

          <span class="fad-subject-icon">
            <i class="bi bi-flask-fill"></i>
          </span>

          <div class="fad-subject-name">
            <strong>Chemistry</strong>
            <small>Improvement Status: Organic Improving</small>
          </div>

          <div class="fad-subject-progress">
            <span style="width: 88%;"></span>
          </div>

          <strong class="fad-subject-score">88%</strong>

          <span class="fad-subject-status">
            Good Progress
          </span>

        </article>

        <!-- BIOLOGY -->
        <article class="fad-subject-row fad-subject-biology">

          <span class="fad-subject-icon">
            <i class="bi bi-dna"></i>
          </span>

          <div class="fad-subject-name">
            <strong>Biology</strong>
            <small>Recommended Practice: Daily Questions</small>
          </div>

          <div class="fad-subject-progress">
            <span style="width: 79%;"></span>
          </div>

          <strong class="fad-subject-score">79%</strong>

          <span class="fad-subject-status">
            Keep It Up
          </span>

        </article>

        <!-- MATHEMATICS -->
        <article class="fad-subject-row fad-subject-maths">

          <span class="fad-subject-icon">
            <i class="bi bi-calculator-fill"></i>
          </span>

          <div class="fad-subject-name">
            <strong>Mathematics</strong>
            <small>Focus Area: Calculus &amp; Algebra</small>
          </div>

          <div class="fad-subject-progress">
            <span style="width: 82%;"></span>
          </div>

          <strong class="fad-subject-score">82%</strong>

          <span class="fad-subject-status">
            Good Progress
          </span>

        </article>

      </div>

    </div>

    <!-- =================================================
         DASHBOARD TOOLS
    ================================================== -->
    <div class="fad-tool-grid">

      <!-- TOOL 01 -->
      <article class="fad-tool-card fad-tool-red">

        <span class="fad-tool-icon">
          <i class="bi bi-bullseye"></i>
        </span>

        <h4>Weak Topic</h4>
        <p>Electrostatics</p>

        <a href="{{ route('frontend.ai-learning') }}">
          Practice Now
        </a>

      </article>

      <!-- TOOL 02 -->
      <article class="fad-tool-card fad-tool-yellow">

        <span class="fad-tool-icon">
          <i class="bi bi-calendar2-check-fill"></i>
        </span>

        <h4>Study Planner</h4>
        <p>4 Tasks Today</p>

        <a href="{{ route('frontend.ai-learning') }}">
          View Plan
        </a>

      </article>

      <!-- TOOL 03 -->
      <article class="fad-tool-card fad-tool-blue">

        <span class="fad-tool-icon">
          <i class="bi bi-graph-up-arrow"></i>
        </span>

        <h4>Weekly Analytics</h4>
        <p>Detailed Report</p>

        <a href="{{ route('frontend.ai-learning') }}">
          View Report
        </a>

      </article>

      <!-- TOOL 04 -->
      <article class="fad-tool-card fad-tool-purple">

        <span class="fad-tool-icon">
          <i class="bi bi-people-fill"></i>
        </span>

        <h4>Parent Dashboard</h4>
        <p>Progress Monitoring</p>

        <a href="{{ route('frontend.ai-learning') }}">
          Open Dashboard
        </a>

      </article>

      <!-- TOOL 05 -->
      <article class="fad-tool-card fad-tool-orange">

        <span class="fad-tool-icon">
          <i class="bi bi-trophy-fill"></i>
        </span>

        <h4>Rank Predictor</h4>
        <p>Predicted Rank</p>

        <a href="{{ route('frontend.ai-learning') }}">
          Check Rank
        </a>

      </article>

      <!-- TOOL 06 -->
      <article class="fad-tool-card fad-tool-cyan">

        <span class="fad-tool-icon">
          <i class="bi bi-robot"></i>
        </span>

        <h4>AI Mentor</h4>
        <p>AI Doubt Assistant</p>

        <a href="{{ route('frontend.ai-learning') }}">
          Ask Now
        </a>

      </article>

    </div>

    <!-- =================================================
         RURAL AI CTA PANEL
    ================================================== -->
    <div class="fad-rural-panel" data-aos="fade-up">

      <div class="fad-rural-visual">
        <span class="fad-rural-icon">
          <i class="bi bi-mortarboard-fill"></i>
        </span>
      </div>

      <div class="fad-rural-content">

        <h3>
          Empowering Rural Students
          <span>with AI-Powered Learning</span>
        </h3>

        <div class="fad-rural-benefits">

          <span>
            <i class="bi bi-lightbulb-fill"></i>
            Smart Learning
          </span>

          <span>
            <i class="bi bi-bar-chart-fill"></i>
            Better Results
          </span>

          <span>
            <i class="bi bi-mortarboard-fill"></i>
            Bright Future
          </span>

        </div>

      </div>

      <div class="fad-helpline-card">

        <div class="fad-helpline-number">
          <span>
            <i class="bi bi-telephone-fill"></i>
          </span>

          <div>
            <small>Admission Helpline</small>
            <a href="tel:{{ $phonePrimary }}">{{ $phonePrimary }}</a>
          </div>
        </div>

        <p>
          <i class="bi bi-geo-alt-fill"></i>
          {{ $address }}
        </p>

      </div>

    </div>

    <!-- =================================================
         APP COMING SOON STRIP
    ================================================== -->
    <div class="fad-app-strip" data-aos="fade-up">

      <div class="fad-app-info">

        <span class="fad-app-icon">
          <i class="bi bi-phone-fill"></i>
        </span>

        <div>
          <strong>Student App Coming Soon</strong>
          <small>
            AI Learning • Test Analytics • Study Planner
          </small>
          <small>Everything in your pocket!</small>
        </div>

      </div>

      <div class="fad-store-buttons">

        <a href="#" aria-label="Google Play coming soon">
          <i class="bi bi-google-play"></i>

          <span>
            <small>GET IT ON</small>
            <strong>Google Play</strong>
          </span>
        </a>

        <a href="#" aria-label="App Store coming soon">
          <i class="bi bi-apple"></i>

          <span>
            <small>Download on the</small>
            <strong>App Store</strong>
          </span>
        </a>

      </div>

      <a href="{{ route('frontend.ai-learning') }}" class="fad-revolution-card">

        <div>
          <strong>Join the AI Revolution</strong>
          <small>Learn Smarter, Score Higher, Achieve Your Dreams!</small>
        </div>

        <i class="bi bi-rocket-takeoff-fill"></i>

      </a>

    </div>

  </div>
</section>
<!-- =====================================================
     FUTURE AI STUDENT DASHBOARD END
====================================================== -->




 <!-- =====================================================
     RESULTS & ACHIEVEMENTS SECTION START
====================================================== -->
<section class="knj-results-section section-padding" id="results-achievements">

  <!-- BACKGROUND DECORATIONS -->
  <div class="knj-results-grid-pattern" aria-hidden="true"></div>
  <div class="knj-results-glow knj-results-glow-left" aria-hidden="true"></div>
  <div class="knj-results-glow knj-results-glow-right" aria-hidden="true"></div>

  <div class="container">

    <!-- SECTION HEADING -->
    <div class="knj-results-heading" data-aos="fade-up">

      <span class="knj-results-badge">
        <i class="bi bi-trophy-fill"></i>
        Results &amp; Achievements
      </span>

      <h2>
        Our Students’ Success Stories &amp;<br>
        Academic <span>Results</span>
      </h2>

      <p>
        Showcasing NEET, JEE &amp; Board examination achievements,
        topper rankings and yearly academic progress.
      </p>

      <!-- DECORATIVE LAURELS -->
      <span class="knj-results-laurel knj-results-laurel-left" aria-hidden="true">
        <i class="bi bi-stars"></i>
      </span>

      <span class="knj-results-laurel knj-results-laurel-right" aria-hidden="true">
        <i class="bi bi-stars"></i>
      </span>

    </div>

    <!-- =================================================
         RESULTS CARDS
    ================================================== -->
    <div class="knj-results-cards">

      <!-- CARD 01 -->
      <article class="knj-result-card knj-result-card-red"
               data-aos="fade-up"
               data-aos-delay="100">

        <span class="knj-result-number">01</span>

        <div class="knj-result-card-head">
          <span class="knj-result-icon">
            <i class="bi bi-trophy-fill"></i>
          </span>
        </div>

        <div class="knj-result-content">
          <h3>Top Rankers &amp; Scholars</h3>
          <span class="knj-result-line"></span>

          <p>
            Display student photos, scores, AIR ranks, scholarships,
            and success journeys.
          </p>
        </div>

        <!-- DECORATIVE PODIUM -->
        <div class="knj-result-visual knj-podium-visual" aria-hidden="true">
          <span class="knj-podium-star">
            <i class="bi bi-star-fill"></i>
          </span>

          <span class="knj-podium-column knj-podium-small"></span>
          <span class="knj-podium-column knj-podium-large"></span>
          <span class="knj-podium-column knj-podium-medium"></span>

          <span class="knj-result-spark spark-one"></span>
          <span class="knj-result-spark spark-two"></span>
        </div>

      </article>

      <!-- CARD 02 -->
      <article class="knj-result-card knj-result-card-blue"
               data-aos="fade-up"
               data-aos-delay="180">

        <span class="knj-result-number">02</span>

        <div class="knj-result-card-head">
          <span class="knj-result-icon">
            <i class="bi bi-bar-chart-line-fill"></i>
          </span>
        </div>

        <div class="knj-result-content">
          <h3>Year-wise Academic Results</h3>
          <span class="knj-result-line"></span>

          <p>
            Track yearly NEET, JEE &amp; Board examination performance
            with detailed analytics.
          </p>
        </div>

        <!-- DECORATIVE CHART -->
        <div class="knj-result-visual knj-chart-visual" aria-hidden="true">

          <span class="knj-chart-bar bar-one"></span>
          <span class="knj-chart-bar bar-two"></span>
          <span class="knj-chart-bar bar-three"></span>
          <span class="knj-chart-bar bar-four"></span>

          <span class="knj-chart-arrow">
            <i class="bi bi-arrow-up-right"></i>
          </span>

        </div>

      </article>

      <!-- CARD 03 -->
      <article class="knj-result-card knj-result-card-green"
               data-aos="fade-up"
               data-aos-delay="260">

        <span class="knj-result-number">03</span>

        <div class="knj-result-card-head">
          <span class="knj-result-icon">
            <i class="bi bi-graph-up-arrow"></i>
          </span>
        </div>

        <div class="knj-result-content">
          <h3>Student Growth &amp;<br>Performance Insights</h3>
          <span class="knj-result-line"></span>

          <p>
            Highlight mock test improvements, consistency,
            and academic milestones.
          </p>
        </div>

        <!-- DECORATIVE TARGET -->
        <div class="knj-result-visual knj-target-visual" aria-hidden="true">

          <span class="knj-target-ring ring-one"></span>
          <span class="knj-target-ring ring-two"></span>
          <span class="knj-target-ring ring-three"></span>
          <span class="knj-target-center"></span>

          <span class="knj-target-arrow">
            <i class="bi bi-arrow-up-right"></i>
          </span>

        </div>

      </article>

      <!-- CARD 04 -->
      <article class="knj-result-card knj-result-card-wide knj-result-card-purple"
               data-aos="fade-up"
               data-aos-delay="340">

        <span class="knj-result-number">04</span>

        <div class="knj-wide-card-layout">

          <div class="knj-result-card-head">
            <span class="knj-result-icon">
              <i class="bi bi-award-fill"></i>
            </span>
          </div>

          <div class="knj-result-content">
            <h3>Scholarship Achievers</h3>
            <span class="knj-result-line"></span>

            <p>
              Students who secured scholarships and outstanding merit scores.
            </p>
          </div>

        </div>

        <!-- DECORATIVE SCHOLARSHIP -->
        <div class="knj-result-visual knj-scholarship-visual" aria-hidden="true">

          <span class="knj-cap-top"></span>
          <span class="knj-cap-base"></span>
          <span class="knj-cap-tassel"></span>

          <span class="knj-certificate">
            <i class="bi bi-patch-check-fill"></i>
          </span>

        </div>

      </article>

      <!-- CARD 05 -->
      <article class="knj-result-card knj-result-card-wide knj-result-card-orange"
               data-aos="fade-up"
               data-aos-delay="420">

        <span class="knj-result-number">05</span>

        <div class="knj-wide-card-layout">

          <div class="knj-result-card-head">
            <span class="knj-result-icon">
              <i class="bi bi-chat-dots-fill"></i>
            </span>
          </div>

          <div class="knj-result-content">
            <h3>Parent Testimonials</h3>
            <span class="knj-result-line"></span>

            <p>
              Real feedback from parents and students about teaching
              quality and mentorship.
            </p>
          </div>

        </div>

        <!-- DECORATIVE QUOTE -->
        <div class="knj-result-visual knj-quote-visual" aria-hidden="true">
          <span class="knj-quote-box">
            <i class="bi bi-quote"></i>
          </span>

          <span class="knj-result-spark spark-one"></span>
          <span class="knj-result-spark spark-two"></span>
        </div>

      </article>

    </div>

    <!-- =================================================
         BOTTOM TRUST PANEL
    ================================================== -->
    <div class="knj-results-bottom-panel" data-aos="fade-up">

      <div class="knj-results-trust-item">

        <span class="knj-results-trust-icon">
          <i class="bi bi-trophy-fill"></i>
        </span>

        <div>
          <strong>Trusted by Thousands</strong>
          <span>of Students &amp; Parents</span>
        </div>

      </div>

      <span class="knj-results-divider" aria-hidden="true"></span>

      <a href="{{ route('frontend.results') }}" class="knj-results-button">
        View Results
        <i class="bi bi-arrow-right"></i>
      </a>

      <span class="knj-results-divider" aria-hidden="true"></span>

      <div class="knj-results-trust-item knj-results-trust-item-right">

        <span class="knj-results-trust-icon">
          <i class="bi bi-shield-check"></i>
        </span>

        <div>
          <strong>Committed to Excellence</strong>
          <span>Better Guidance. Better Results.</span>
        </div>

      </div>

    </div>

  </div>
</section>
<!-- =====================================================
     RESULTS & ACHIEVEMENTS SECTION END
====================================================== -->




<!-- =====================================================
     MEDIA HUB & SUCCESS STORIES SECTION START
====================================================== -->
<section class="knj-media-section section-padding" id="media-success">

  <!-- BACKGROUND DECORATIONS -->
  <div class="knj-media-grid-bg" aria-hidden="true"></div>
  <div class="knj-media-glow knj-media-glow-left" aria-hidden="true"></div>
  <div class="knj-media-glow knj-media-glow-right" aria-hidden="true"></div>

  <div class="container">

    <!-- SECTION HEADING -->
    <div class="knj-media-heading" data-aos="fade-up">

      <span class="knj-media-badge">
        <i class="bi bi-camera-reels-fill"></i>
        Media &amp; Success Stories
      </span>

      <h2>
        Media Hub &amp; <span>Success Stories</span>
      </h2>

      <p>
        Explore lectures, success stories and academy media updates.
      </p>

      <div class="knj-media-heading-decoration" aria-hidden="true">
        <span></span>
        <i class="bi bi-star-fill"></i>
        <span></span>
      </div>

    </div>

    <!-- =================================================
         MEDIA CARDS GRID
    ================================================== -->
    <div class="knj-media-grid">

      <!-- CARD 01 -->
      <article class="knj-media-card knj-media-card-red"
               data-aos="fade-up"
               data-aos-delay="100">

        <div class="knj-media-card-content">

          <span class="knj-media-icon">
            <i class="bi bi-youtube"></i>
          </span>

          <h3>YouTube Lectures</h3>
          <span class="knj-media-line"></span>

          <ul class="knj-media-list">
            <li>
              <i class="bi bi-check-circle-fill"></i>
              Concept lectures &amp; explanations
            </li>

            <li>
              <i class="bi bi-check-circle-fill"></i>
              NEET, JEE &amp; Foundation content
            </li>

            <li>
              <i class="bi bi-check-circle-fill"></i>
              Subject-wise video lessons
            </li>
          </ul>

          <a href="{{ route('frontend.resources') }}" class="knj-media-link">
            Watch Lectures
            <i class="bi bi-arrow-right"></i>
          </a>

        </div>

        <!-- VIDEO DECORATION -->
        <div class="knj-media-visual knj-video-visual" aria-hidden="true">

          <div class="knj-video-window">
            <span class="knj-video-window-top">
              <i></i>
              <i></i>
              <i></i>
            </span>

            <span class="knj-video-play">
              <i class="bi bi-play-fill"></i>
            </span>

            <span class="knj-video-progress">
              <i></i>
            </span>

            <span class="knj-video-time">04:15 / 12:00</span>
          </div>

        </div>

      </article>

      <!-- CARD 02 -->
      <article class="knj-media-card knj-media-card-blue"
               data-aos="fade-up"
               data-aos-delay="170">

        <div class="knj-media-card-content">

          <span class="knj-media-icon">
            <i class="bi bi-trophy-fill"></i>
          </span>

          <h3>Topper Interviews</h3>
          <span class="knj-media-line"></span>

          <ul class="knj-media-list">
            <li>
              <i class="bi bi-check-circle-fill"></i>
              Interviews with top rankers
            </li>

            <li>
              <i class="bi bi-check-circle-fill"></i>
              Study strategies &amp; preparation tips
            </li>

            <li>
              <i class="bi bi-check-circle-fill"></i>
              Success journey &amp; motivation
            </li>
          </ul>

          <a href="{{ route('frontend.resources') }}" class="knj-media-link">
            View Interviews
            <i class="bi bi-arrow-right"></i>
          </a>

        </div>

        <!-- MICROPHONE DECORATION -->
        <div class="knj-media-visual knj-mic-visual" aria-hidden="true">

          <div class="knj-microphone">
            <span class="knj-mic-head"></span>
            <span class="knj-mic-neck"></span>
            <span class="knj-mic-stand"></span>
            <span class="knj-mic-base"></span>
          </div>

        </div>

      </article>

      <!-- CARD 03 -->
      <article class="knj-media-card knj-media-card-purple"
               data-aos="fade-up"
               data-aos-delay="240">

        <div class="knj-media-card-content">

          <span class="knj-media-icon">
            <i class="bi bi-stars"></i>
          </span>

          <h3>Student Success Stories</h3>
          <span class="knj-media-line"></span>

          <ul class="knj-media-list">
            <li>
              <i class="bi bi-check-circle-fill"></i>
              Real stories from our students
            </li>

            <li>
              <i class="bi bi-check-circle-fill"></i>
              Academic improvement journeys
            </li>

            <li>
              <i class="bi bi-check-circle-fill"></i>
              Mentorship &amp; guidance impact
            </li>
          </ul>

          <a href="{{ route('frontend.resources') }}" class="knj-media-link">
            Read Stories
            <i class="bi bi-arrow-right"></i>
          </a>

        </div>

        <!-- SUCCESS DECORATION -->
        <div class="knj-media-visual knj-success-visual" aria-hidden="true">

          <span class="knj-success-mountain mountain-one"></span>
          <span class="knj-success-mountain mountain-two"></span>

          <span class="knj-success-person">
            <i class="bi bi-person-standing"></i>
          </span>

          <span class="knj-success-flag">
            <i class="bi bi-flag-fill"></i>
          </span>

        </div>

      </article>

      <!-- CARD 04 -->
      <article class="knj-media-card knj-media-card-green"
               data-aos="fade-up"
               data-aos-delay="310">

        <div class="knj-media-card-content">

          <span class="knj-media-icon">
            <i class="bi bi-newspaper"></i>
          </span>

          <h3>News &amp; Articles</h3>
          <span class="knj-media-line"></span>

          <ul class="knj-media-list">
            <li>
              <i class="bi bi-check-circle-fill"></i>
              Education &amp; exam updates
            </li>

            <li>
              <i class="bi bi-check-circle-fill"></i>
              AI learning insights
            </li>

            <li>
              <i class="bi bi-check-circle-fill"></i>
              Academy announcements
            </li>
          </ul>

          <a href="{{ route('frontend.resources') }}" class="knj-media-link">
            Read Articles
            <i class="bi bi-arrow-right"></i>
          </a>

        </div>

        <!-- NEWSPAPER DECORATION -->
        <div class="knj-media-visual knj-news-visual" aria-hidden="true">

          <div class="knj-newspaper">
            <span class="knj-news-title">NEWS</span>
            <span class="knj-news-photo">
              <i class="bi bi-person-fill"></i>
            </span>
            <span class="knj-news-row row-one"></span>
            <span class="knj-news-row row-two"></span>
            <span class="knj-news-row row-three"></span>
            <span class="knj-news-row row-four"></span>
          </div>

        </div>

      </article>

      <!-- CARD 05 -->
      <article class="knj-media-card knj-media-card-orange"
               data-aos="fade-up"
               data-aos-delay="380">

        <div class="knj-media-card-content">

          <span class="knj-media-icon">
            <i class="bi bi-megaphone-fill"></i>
          </span>

          <h3>Press Coverage</h3>
          <span class="knj-media-line"></span>

          <ul class="knj-media-list">
            <li>
              <i class="bi bi-check-circle-fill"></i>
              Academy achievements
            </li>

            <li>
              <i class="bi bi-check-circle-fill"></i>
              News channel coverage
            </li>

            <li>
              <i class="bi bi-check-circle-fill"></i>
              Public recognition
            </li>
          </ul>

          <a href="{{ route('frontend.resources') }}" class="knj-media-link">
            View Coverage
            <i class="bi bi-arrow-right"></i>
          </a>

        </div>

        <!-- PRESS MICROPHONES -->
        <div class="knj-media-visual knj-press-visual" aria-hidden="true">

          <span class="knj-press-mic press-mic-one">
            <i class="bi bi-mic-fill"></i>
            <small>NEWS</small>
          </span>

          <span class="knj-press-mic press-mic-two">
            <i class="bi bi-mic-fill"></i>
            <small>MEDIA</small>
          </span>

          <span class="knj-press-mic press-mic-three">
            <i class="bi bi-mic-fill"></i>
            <small>LIVE</small>
          </span>

        </div>

      </article>

      <!-- CARD 06 -->
      <article class="knj-media-card knj-media-card-cyan"
               data-aos="fade-up"
               data-aos-delay="450">

        <div class="knj-media-card-content">

          <span class="knj-media-icon">
            <i class="bi bi-camera-fill"></i>
          </span>

          <h3>Events &amp; Gallery</h3>
          <span class="knj-media-line"></span>

          <ul class="knj-media-list">
            <li>
              <i class="bi bi-check-circle-fill"></i>
              Seminars &amp; workshops
            </li>

            <li>
              <i class="bi bi-check-circle-fill"></i>
              Classroom activities
            </li>

            <li>
              <i class="bi bi-check-circle-fill"></i>
              Event photos &amp; highlights
            </li>
          </ul>

          <a href="{{ route('frontend.gallery') }}" class="knj-media-link">
            View Photos
            <i class="bi bi-arrow-right"></i>
          </a>

        </div>

        <!-- GALLERY PHOTOS -->
        <div class="knj-media-visual knj-gallery-visual" aria-hidden="true">

          <span class="knj-gallery-photo photo-one">
            <i class="bi bi-people-fill"></i>
          </span>

          <span class="knj-gallery-photo photo-two">
            <i class="bi bi-person-video3"></i>
          </span>

          <span class="knj-gallery-photo photo-three">
            <i class="bi bi-mortarboard-fill"></i>
          </span>

          <span class="knj-gallery-photo photo-four">
            <i class="bi bi-award-fill"></i>
          </span>

        </div>

      </article>

    </div>

    <!-- =================================================
         MEDIA STATISTICS PANEL
    ================================================== -->
    <div class="knj-media-stats-panel" data-aos="fade-up">

      <div class="knj-media-mission">

        <span class="knj-media-mission-icon">
          <i class="bi bi-mortarboard-fill"></i>
        </span>

        <div>
          <h3>
            Empowering Future
            <span>Doctors &amp; Engineers</span>
          </h3>

          <p>Through AI Learning, Mentorship &amp; Excellence.</p>
        </div>

      </div>

      <span class="knj-media-divider"></span>

      <div class="knj-media-stat">

        <span class="knj-media-stat-icon stat-red">
          <i class="bi bi-youtube"></i>
        </span>

        <div>
          <strong>500+</strong>
          <span>Video Lectures</span>
        </div>

      </div>

      <span class="knj-media-divider"></span>

      <div class="knj-media-stat">

        <span class="knj-media-stat-icon stat-blue">
          <i class="bi bi-person-star"></i>
        </span>

        <div>
          <strong>100+</strong>
          <span>Topper Interviews</span>
        </div>

      </div>

      <span class="knj-media-divider"></span>

      <div class="knj-media-stat">

        <span class="knj-media-stat-icon stat-purple">
          <i class="bi bi-file-earmark-text-fill"></i>
        </span>

        <div>
          <strong>200+</strong>
          <span>Articles &amp; Updates</span>
        </div>

      </div>

      <a href="tel:{{ $phonePrimary }}" class="knj-media-call">

        <span>
          <i class="bi bi-telephone-fill"></i>
        </span>

        <div>
          <small>Call for Enquiry</small>
          <strong>{{ $phonePrimary }}</strong>
        </div>

      </a>

    </div>

    <!-- =================================================
         TRUST STRIP
    ================================================== -->
    <div class="knj-media-trust-strip" data-aos="fade-up">

      <div class="knj-media-trust-item">
        <span>
          <i class="bi bi-shield-check"></i>
        </span>

        <div>
          <strong>Trusted by Thousands</strong>
          <small>of Students &amp; Parents</small>
        </div>
      </div>

      <div class="knj-media-trust-item">
        <span>
          <i class="bi bi-patch-check-fill"></i>
        </span>

        <div>
          <strong>Quality Education</strong>
          <small>for Rural India</small>
        </div>
      </div>

      <div class="knj-media-trust-item">
        <span>
          <i class="bi bi-trophy-fill"></i>
        </span>

        <div>
          <strong>Proven Results</strong>
          <small>Every Year</small>
        </div>
      </div>

      <div class="knj-media-trust-item">
        <span>
          <i class="bi bi-geo-alt-fill"></i>
        </span>

        <div>
          <strong>Khadkeshwar Academy</strong>
          <small>{{ $address }}</small>
        </div>
      </div>

    </div>

  </div>
</section>
<!-- =====================================================
     MEDIA HUB & SUCCESS STORIES SECTION END
====================================================== -->




 <!-- =====================================================
     LIFE AT KHADKESHWAR ACADEMY GALLERY START
====================================================== -->
<section class="gallery-section section-padding" id="gallery">

  <!-- BACKGROUND DECORATION -->
  <div class="gallery-bg-shape gallery-bg-shape-1" aria-hidden="true"></div>
  <div class="gallery-bg-shape gallery-bg-shape-2" aria-hidden="true"></div>
  <div class="gallery-dot-pattern" aria-hidden="true"></div>

  <div class="container">

    <!-- SECTION HEADING -->
    <div class="section-title center gallery-title" data-aos="fade-up">

      <span class="section-badge gallery-section-badge">
        <i class="bi bi-building-fill"></i>
        Life at Khadkeshwar Academy
      </span>

      <h2>
        Explore classrooms, student activities
        <span>and learning environment.</span>
      </h2>

      <p>
        Real photos and videos from Khadkeshwar NEET JEE Academy classrooms,
        academic sessions and student activities.
      </p>

    </div>

    <!-- GALLERY FILTER TABS -->
<div class="gallery-tabs" data-aos="fade-up">

    <button
        class="gallery-tab active"
        type="button"
        data-filter="photos"
        aria-label="Show Photos"
    >
        <i class="bi bi-image-fill"></i>
        <span>Photos</span>
    </button>

    <button
        class="gallery-tab"
        type="button"
        data-filter="videos"
        aria-label="Show Videos"
    >
        <i class="bi bi-play-circle-fill"></i>
        <span>Videos</span>
    </button>

</div>

@php
    $galleryIconData = [
        [
            'icon' => 'bi bi-mortarboard-fill',
            'class' => 'gallery-icon-blue',
        ],
        [
            'icon' => 'bi bi-book-half',
            'class' => 'gallery-icon-red',
        ],
        [
            'icon' => 'bi bi-person-video3',
            'class' => 'gallery-icon-green',
        ],
        [
            'icon' => 'bi bi-people-fill',
            'class' => 'gallery-icon-yellow',
        ],
        [
            'icon' => 'bi bi-person-hearts',
            'class' => 'gallery-icon-purple',
        ],
        [
            'icon' => 'bi bi-building-fill-check',
            'class' => 'gallery-icon-indigo',
        ],
        [
            'icon' => 'bi bi-lightbulb-fill',
            'class' => 'gallery-icon-cyan',
        ],
        [
            'icon' => 'bi bi-person-fill',
            'class' => 'gallery-icon-orange',
        ],
        [
            'icon' => 'bi bi-camera-fill',
            'class' => 'gallery-icon-pink',
        ],
        [
            'icon' => 'bi bi-easel2-fill',
            'class' => 'gallery-icon-teal',
        ],
    ];

    $galleryDelays = [0, 100, 160, 220, 280, 340];
@endphp

<!-- =================================================
     PHOTO GALLERY
================================================== -->
<div class="gallery-grid" id="photoGallery">

    @if(isset($photoGalleryItems) && $photoGalleryItems->count())

        @foreach($photoGalleryItems as $index => $item)

            @php
                $iconData = $galleryIconData[$index % count($galleryIconData)];
                $delay = $galleryDelays[$index % count($galleryDelays)];

                $layoutClass = in_array($item->layout, ['wide', 'tall', 'large'], true)
                    ? 'gallery-item-large'
                    : '';

                $imageSource = $item->mediaSource() ?: asset('assets/img/img10.jpeg');
                $thumbSource = $item->thumbnailSource() ?: $imageSource;
            @endphp

            <article
                class="gallery-item {{ $layoutClass }}"
                data-img="{{ $imageSource }}"
                data-title="{{ $item->title }}"
                data-aos="zoom-in"
                @if($delay) data-aos-delay="{{ $delay }}" @endif
            >
                <img
                    src="{{ $thumbSource }}"
                    alt="{{ $item->alt_text ?: $item->title }}"
                    loading="lazy"
                >

                <button
                    class="gallery-zoom-btn"
                    type="button"
                    aria-label="Open {{ $item->title }} Image"
                >
                    <i class="bi bi-arrows-fullscreen"></i>
                </button>

                <div class="gallery-overlay">

                    <span class="gallery-content-icon {{ $iconData['class'] }}">
                        <i class="{{ $iconData['icon'] }}"></i>
                    </span>

                    <div class="gallery-overlay-content">
                        <h3>{{ $item->title }}</h3>

                        @if($item->label)
                            <p>{{ $item->label }}</p>
                        @endif
                    </div>

                </div>
            </article>

        @endforeach

    @endif

</div>

<!-- =================================================
     VIDEO GALLERY
================================================== -->
<div class="gallery-grid hidden-gallery" id="videoGallery">

    @if(isset($videoGalleryItems) && $videoGalleryItems->count())

        @foreach($videoGalleryItems as $index => $item)

            @php
                $iconData = $galleryIconData[$index % count($galleryIconData)];
                $delay = $galleryDelays[$index % count($galleryDelays)];

                $layoutClass = in_array($item->layout, ['wide', 'tall', 'large'], true)
                    ? 'gallery-item-large'
                    : '';

                $videoSource = $item->mediaSource();
                $thumbSource = $item->thumbnailSource();
            @endphp

            <article
                class="gallery-item {{ $layoutClass }} video-item"
                data-video="{{ $videoSource }}"
                data-title="{{ $item->title }}"
                data-aos="zoom-in"
                @if($delay) data-aos-delay="{{ $delay }}" @endif
            >

                @if($item->media_type === 'video')
                    <video class="video-thumb" muted playsinline preload="metadata">
                        <source src="{{ $videoSource }}" type="video/mp4">
                    </video>
                @else
                    <img
                        src="{{ $thumbSource ?: asset('assets/img/img10.jpeg') }}"
                        alt="{{ $item->alt_text ?: $item->title }}"
                        loading="lazy"
                    >
                @endif

                <span class="play-btn">
                    <i class="bi bi-play-fill"></i>
                </span>

                <div class="gallery-overlay">

                    <span class="gallery-content-icon {{ $iconData['class'] }}">
                        <i class="bi bi-camera-video-fill"></i>
                    </span>

                    <div class="gallery-overlay-content">
                        <h3>{{ $item->title }}</h3>

                        @if($item->label)
                            <p>{{ $item->label }}</p>
                        @endif
                    </div>

                </div>
            </article>

        @endforeach

    @endif

</div>

    <!-- TRUST STRIP -->
    <div class="gallery-trust-strip" data-aos="fade-up">

      <div class="gallery-trust-item">
        <i class="bi bi-mortarboard-fill"></i>
        <div>
          <strong>Quality Education</strong>
          <span>Expert faculty &amp; structured learning</span>
        </div>
      </div>

      <div class="gallery-trust-item">
        <i class="bi bi-bullseye"></i>
        <div>
          <strong>NEET | JEE Focus</strong>
          <span>Specialized coaching for success</span>
        </div>
      </div>

      <div class="gallery-trust-item">
        <i class="bi bi-people-fill"></i>
        <div>
          <strong>Student Support</strong>
          <span>Personalized attention &amp; mentoring</span>
        </div>
      </div>

      <div class="gallery-trust-item">
        <i class="bi bi-star-fill"></i>
        <div>
          <strong>Proven Results</strong>
          <span>Consistent performance &amp; success</span>
        </div>
      </div>

    </div>

    <!-- ACTION -->
    <div class="gallery-action" data-aos="fade-up">
      <a href="{{ route('frontend.gallery') }}" class="btn-main">
        View Full Gallery
        <i class="bi bi-arrow-right"></i>
      </a>
    </div>

  </div>
</section>
<!-- =====================================================
     LIFE AT KHADKESHWAR ACADEMY GALLERY END
====================================================== -->


<!-- =====================================================
     GALLERY LIGHTBOX START
====================================================== -->
<div
  class="gallery-lightbox"
  id="galleryLightbox"
  role="dialog"
  aria-modal="true"
  aria-hidden="true"
>
  <button class="lightbox-close" type="button" aria-label="Close Gallery">
    <i class="bi bi-x-lg"></i>
  </button>

  <button
    class="lightbox-nav lightbox-prev"
    type="button"
    aria-label="Previous Image"
  >
    <i class="bi bi-chevron-left"></i>
  </button>

  <div class="lightbox-content">

    <img
      id="lightboxImage"
      src=""
      alt="Gallery Preview"
    >

    <video
      id="lightboxVideo"
      controls
      playsinline
      preload="metadata"
    ></video>

    <div class="lightbox-caption">
      <h4 id="lightboxTitle">Gallery Preview</h4>
    </div>

  </div>

  <button
    class="lightbox-nav lightbox-next"
    type="button"
    aria-label="Next Image"
  >
    <i class="bi bi-chevron-right"></i>
  </button>
</div>
<!-- =====================================================
     GALLERY LIGHTBOX END
====================================================== -->







<!-- =====================================================
     TESTIMONIALS SECTION START
====================================================== -->
<section class="testimonials-section section-padding" id="testimonials">

  <!-- BACKGROUND DECORATION -->
  <div class="testimonial-bg-shape testimonial-bg-shape-1" aria-hidden="true"></div>
  <div class="testimonial-bg-shape testimonial-bg-shape-2" aria-hidden="true"></div>
  <div class="testimonial-dots testimonial-dots-top" aria-hidden="true"></div>
  <div class="testimonial-dots testimonial-dots-bottom" aria-hidden="true"></div>

  <div class="container">

    <!-- SECTION HEADING -->
    <div class="section-title center testimonials-title" data-aos="fade-up">

      <span class="section-badge testimonial-section-badge">
        <i class="bi bi-chat-quote-fill"></i>
        Testimonials
      </span>

      <h2>
        What Our
        <span class="testimonial-red-text">Students</span>
        <span class="testimonial-purple-text">&amp; Parents</span>
        Say
      </h2>

      <p>
        Real experiences shared by our students and parents about their journey
        with Khadkeshwar NEET-JEE Academy.
      </p>

    </div>

    <!-- TESTIMONIAL CARDS -->
  @php
    $testimonialClasses = [
        'testimonial-card-red',
        'testimonial-card-purple',
        'testimonial-card-parent',
        'testimonial-card-red',
        'testimonial-card-red',
        'testimonial-card-parent',
    ];

    $testimonialDelays = [100, 160, 220, 280, 340, 400];
@endphp

@if(isset($resultTestimonials) && $resultTestimonials->count())
    <div class="testimonials-grid">

        @foreach($resultTestimonials as $index => $testimonial)
            @php
                $cardClass = $testimonialClasses[$index] ?? 'testimonial-card-red';
                $delay = $testimonialDelays[$index] ?? 100;
                $rating = (int) ($testimonial->rating ?: 5);

                $isParent = str_contains(strtolower($testimonial->reviewer_type ?? ''), 'parent');
                $userIcon = $isParent ? 'bi bi-people-fill' : 'bi bi-mortarboard-fill';
            @endphp

            <article
                class="testimonial-card {{ $cardClass }}"
                data-aos="fade-up"
                data-aos-delay="{{ $delay }}"
            >
                <div class="testimonial-top">

                    <div class="testimonial-rating">
                        <div class="stars" aria-label="{{ $rating }} out of 5 stars">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $rating)
                                    <i class="bi bi-star-fill"></i>
                                @else
                                    <i class="bi bi-star"></i>
                                @endif
                            @endfor
                        </div>

                        <span class="review-badge">
                            {{ number_format($testimonial->rating ?: 5, 1) }}
                        </span>
                    </div>

                    <span class="testimonial-quote-icon">
                        <i class="bi bi-quote"></i>
                    </span>

                </div>

                <p class="testimonial-text">
                    {{ $testimonial->review_text }}
                </p>

                <div class="student-info">

                    <span class="testimonial-user-icon">
                        <i class="{{ $userIcon }}"></i>
                    </span>

                    <div>
                        <h4>{{ $testimonial->reviewer_name }}</h4>

                        <span>
                            {{ $testimonial->reviewer_type ?: 'Student Review' }}
                        </span>
                    </div>

                </div>
            </article>
        @endforeach

    </div>
@endif

    <!-- TESTIMONIAL ACTIONS -->
    <div class="testimonial-actions" data-aos="fade-up">

      <a href="{{ route('frontend.results') }}" class="testimonial-more-btn">
        <i class="bi bi-star-fill"></i>
        <span>Read More Reviews</span>
        <i class="bi bi-arrow-right"></i>
      </a>

      <a
        href="#"
        class="testimonial-google-btn"
        target="_blank"
        rel="noopener noreferrer"
      >
        <span class="google-icon">G</span>
        <span>View All Google Reviews</span>
        <i class="bi bi-arrow-right"></i>
      </a>

    </div>

  </div>
</section>
<!-- =====================================================
     TESTIMONIALS SECTION END
====================================================== -->






  <!-- =====================================================
     ADMISSION CTA SECTION START
====================================================== -->
<section class="admission-cta-section section-padding" id="admission">

  <!-- DECORATIVE BACKGROUND -->
  <div class="cta-bg-shape cta-bg-shape-1" aria-hidden="true"></div>
  <div class="cta-bg-shape cta-bg-shape-2" aria-hidden="true"></div>

  <div class="container">

    <div class="admission-cta" data-aos="zoom-in">

      <!-- TOP CONTENT -->
      <div class="cta-content">

        <span class="section-badge cta-badge">
          <i class="bi bi-megaphone-fill"></i>
          Admission Open 2026
        </span>

        <h2>
          Start Your NEET &amp; JEE Preparation
          <br>
          with the <span>Right Guidance</span>
        </h2>

        <div class="cta-heading-decoration" aria-hidden="true">
          <span></span>
          <i></i>
          <i></i>
          <i></i>
          <span></span>
        </div>

        <p>
          Admission Open 2026. Connect with Khadkeshwar NEET JEE Academy for course
          details, fee concession eligibility and preparation guidance.
        </p>

        <p>
          Join Khadkeshwar Academy — a future AI education startup working to make
          quality NEET &amp; JEE learning accessible for rural India.
        </p>

        <!-- HIGHLIGHTS -->
        <div class="cta-highlights">

          <!-- ITEM 01 -->
          <div class="cta-highlight-item cta-highlight-red">

            <span class="cta-highlight-icon">
              <i class="bi bi-mortarboard-fill"></i>
            </span>

            <div>
              <strong>NEET JEE Foundation Programs</strong>
              <small>Strong basics for a successful start.</small>
            </div>

          </div>

          <!-- ITEM 02 -->
          <div class="cta-highlight-item cta-highlight-pink">

            <span class="cta-highlight-icon">
              <i class="bi bi-percent"></i>
            </span>

            <div>
              <strong>Scholarship &amp; Fee Concession Support</strong>
              <small>Helping deserving students achieve their dreams.</small>
            </div>

          </div>

          <!-- ITEM 03 -->
          <div class="cta-highlight-item cta-highlight-purple">

            <span class="cta-highlight-icon">
              <i class="bi bi-person-fill"></i>
            </span>

            <div>
              <strong>Personal Mentorship &amp; Weekly Tests</strong>
              <small>Individual attention with regular performance tracking.</small>
            </div>

          </div>

          <!-- ITEM 04 -->
          <div class="cta-highlight-item cta-highlight-blue">

            <span class="cta-highlight-icon">
              <i class="bi bi-graph-up-arrow"></i>
            </span>

            <div>
              <strong>AI-Based Test Analysis</strong>
              <small>Smart analysis for better preparation.</small>
            </div>

          </div>

          <!-- ITEM 05 -->
          <div class="cta-highlight-item cta-highlight-cyan">

            <span class="cta-highlight-icon">
              <i class="bi bi-headset"></i>
            </span>

            <div>
              <strong>Career Guidance &amp; Counselling</strong>
              <small>Expert advice for the right career path.</small>
            </div>

          </div>

        </div>

        <!-- ACTION BUTTONS -->
        <div class="cta-actions">

          <button
            type="button"
            class="cta-apply-btn"
            data-bs-toggle="modal"
            data-bs-target="#admissionModal"
          >
            <i class="bi bi-pencil-square"></i>
            <span>Apply for Admission</span>
            <i class="bi bi-arrow-right"></i>
          </button>

          <a href="tel:{{ $phonePrimary }}" class="cta-call-btn">
            <i class="bi bi-telephone-fill"></i>
            <span>Call Now</span>
          </a>

        </div>

      </div>

      <!-- BOTTOM HELPLINE PANEL -->
      <div class="cta-helpline-panel">

        <!-- HELPLINE LEFT -->
        <div class="cta-helpline-main">

          <span class="cta-helpline-icon">
            <i class="bi bi-telephone-inbound-fill"></i>
          </span>

          <div class="cta-helpline-content">
            <span>Admission Helpline</span>

            <a href="tel:{{ $phonePrimary }}">
              {{ $phonePrimary }}
            </a>

            <p>
              Talk to our admission team for course details and eligibility.
            </p>
          </div>

        </div>

        <!-- TRUST RIGHT -->
        <div class="cta-trust-points">

          <div class="cta-trust-item">
            <span>
              <i class="bi bi-shield-check"></i>
            </span>

            <div>
              <strong>Trusted by Thousands</strong>
              <small>Proven results &amp; happy students</small>
            </div>
          </div>

          <div class="cta-trust-item">
            <span>
              <i class="bi bi-people-fill"></i>
            </span>

            <div>
              <strong>Experienced Faculty</strong>
              <small>Learn from the best educators</small>
            </div>
          </div>

          <div class="cta-trust-item">
            <span>
              <i class="bi bi-award-fill"></i>
            </span>

            <div>
              <strong>Quality Education</strong>
              <small>Affordable, accessible &amp; effective</small>
            </div>
          </div>

        </div>

      </div>

    </div>

  </div>
</section>
<!-- =====================================================
     ADMISSION CTA SECTION END
====================================================== -->






 <!-- =====================================================
     SCHOLARSHIP ENTRANCE TEST SECTION START
====================================================== -->
<section class="scholarship-cta-section section-padding" id="scholarship-exam">

  <!-- BACKGROUND DECORATION -->
  <div class="scholarship-cta-orb scholarship-cta-orb-1" aria-hidden="true"></div>
  <div class="scholarship-cta-orb scholarship-cta-orb-2" aria-hidden="true"></div>

  <div class="container">

    <div class="scholarship-cta-box" data-aos="fade-up">

      <!-- =================================================
           SECTION HEADING
      ================================================== -->
      <div class="scholarship-cta-heading">

        <span class="scholarship-badge">
          <i class="bi bi-mortarboard-fill"></i>
          Scholarship Entrance Test 2026
        </span>

        <h2>
          Get up to <span>50%</span> Fee Support for
          <strong>NEET, JEE</strong> &amp; Foundation Programs
        </h2>

        <div class="scholarship-title-divider" aria-hidden="true">
          <span></span>
          <i class="bi bi-mortarboard-fill"></i>
          <span></span>
        </div>

        <p>
          Khadkeshwar Academy is offering a scholarship entrance test for deserving
          students. Eligible students can receive up to
          <strong>50% fee support</strong> based on test performance, eligibility
          criteria and required documents.
        </p>

      </div>

      <!-- =================================================
           SCHOLARSHIP CARDS
      ================================================== -->
      <div class="scholarship-highlights">

  <!-- CARD 01 -->
  <article class="scholarship-highlight-card">
    <div class="scholarship-highlight-icon">
      <i class="bi bi-percent"></i>
    </div>

    <div class="scholarship-highlight-content">
      <h3>
        <span>Up to 50%</span>
        Scholarship
      </h3>

      <span class="scholarship-highlight-line"></span>

      <p>
        Merit-based scholarship support for deserving students.
      </p>
    </div>
  </article>

  <!-- CARD 02 -->
  <article class="scholarship-highlight-card">
    <div class="scholarship-highlight-icon">
      <i class="bi bi-book-half"></i>
    </div>

    <div class="scholarship-highlight-content">
      <h3>
        <span>NEET · JEE ·</span>
        Foundation Programs
      </h3>

      <span class="scholarship-highlight-line"></span>

      <p>
        Scholarship available for Class 8th to 12th students across all major programs.
      </p>
    </div>
  </article>

  <!-- CARD 03 -->
  <article class="scholarship-highlight-card">
    <div class="scholarship-highlight-icon">
      <i class="bi bi-trophy-fill"></i>
    </div>

    <div class="scholarship-highlight-content">
      <h3>
        <span>Merit-Based</span>
        Selection
      </h3>

      <span class="scholarship-highlight-line"></span>

      <p>
        Awarded based on entrance test performance and academic potential.
      </p>
    </div>
  </article>

      </div>
      <!-- =================================================
           ACTION BUTTONS
      ================================================== -->
      <div class="scholarship-actions">

        <a href="{{ route('frontend.scholarship') }}" class="scholarship-primary-btn">
          <i class="bi bi-pencil-square"></i>
          <span>Register for Scholarship Exam</span>
        </a>

        <a href="assets/pdf/scholarship-brochure.pdf"
           class="scholarship-outline-btn"
           download>
          <i class="bi bi-download"></i>
          <span>Download Exam Brochure</span>
        </a>

      </div>

      <!-- =================================================
           STATISTICS
      ================================================== -->
      <div class="scholarship-stats">

        <div class="scholarship-stat-item">
          <span class="scholarship-stat-icon">
            <i class="bi bi-percent"></i>
          </span>

          <strong>50%</strong>
          <p>Maximum Fee Support</p>
        </div>

        <div class="scholarship-stat-item">
          <span class="scholarship-stat-icon">
            <i class="bi bi-calendar3"></i>
          </span>

          <strong>2026</strong>
          <p>Scholarship Batch</p>
        </div>

        <div class="scholarship-stat-item">
          <span class="scholarship-stat-icon">
            <i class="bi bi-people-fill"></i>
          </span>

          <strong>1000+</strong>
          <p>Students Benefited</p>
        </div>

        <div class="scholarship-stat-item">
          <span class="scholarship-stat-icon">
            <i class="bi bi-book-fill"></i>
          </span>

          <strong>3 Programs</strong>
          <p>NEET · JEE · Foundation</p>
        </div>

      </div>

      <!-- =================================================
           WHY APPLY
      ================================================== -->
      <div class="scholarship-why-box">

        <div class="scholarship-why-content">

          <h3>Why Apply?</h3>
          <span class="scholarship-why-line"></span>

          <div class="scholarship-why-grid">

            <div class="scholarship-why-item">
              <i class="bi bi-check-circle-fill"></i>
              <span>Affordable Quality Education</span>
            </div>

            <div class="scholarship-why-item">
              <i class="bi bi-check-circle-fill"></i>
              <span>Personalized Mentorship</span>
            </div>

            <div class="scholarship-why-item">
              <i class="bi bi-check-circle-fill"></i>
              <span>Regular Tests &amp; Performance Analysis</span>
            </div>

            <div class="scholarship-why-item">
              <i class="bi bi-check-circle-fill"></i>
              <span>Career Guidance &amp; Counselling</span>
            </div>

            <div class="scholarship-why-item">
              <i class="bi bi-check-circle-fill"></i>
              <span>Experienced &amp; Dedicated Faculty</span>
            </div>

            <div class="scholarship-why-item">
              <i class="bi bi-check-circle-fill"></i>
              <span>Bright Future, Strong Foundation</span>
            </div>

          </div>

        </div>

        <div class="scholarship-why-visual" aria-hidden="true">

          <div class="scholarship-book book-one"></div>
          <div class="scholarship-book book-two"></div>

          <div class="scholarship-cap">
            <span class="cap-top"></span>
            <span class="cap-base"></span>
            <span class="cap-string"></span>
          </div>

          <div class="scholarship-certificate">
            <span></span>
          </div>

        </div>

      </div>

      <!-- =================================================
           CONTACT BAR
      ================================================== -->
      <div class="scholarship-contact-bar">

        <div class="scholarship-contact-item">

          <span class="scholarship-contact-icon">
            <i class="bi bi-telephone-fill"></i>
          </span>

          <div>
            <strong>Have Questions?</strong>
            <small>Talk to our admission experts</small>
          </div>

        </div>

        <div class="scholarship-contact-divider"></div>

        <a href="tel:{{ $phonePrimary }}" class="scholarship-phone-item">

          <i class="bi bi-telephone-fill"></i>

          <div>
            <strong>{{ $phonePrimary }}</strong>
            <small>Mon – Sat | 9:00 AM – 6:00 PM</small>
          </div>

        </a>

      </div>

    </div>

  </div>
</section>
<!-- =====================================================
     SCHOLARSHIP ENTRANCE TEST SECTION END
====================================================== -->





<!-- =====================================================
     SCHOLARSHIP SUPPORT & CERTIFICATES SECTION START
====================================================== -->
<section class="kha-scholarship-section" id="scholarship-support">

  <div class="kha-scholarship-glow kha-scholarship-glow-one"></div>
  <div class="kha-scholarship-glow kha-scholarship-glow-two"></div>

  <div class="container">

    <!-- =========================================
         TOP SCHOLARSHIP SUPPORT PANEL
    ========================================== -->
    <div class="kha-scholarship-main-panel" data-aos="fade-up">

      <!-- SECTION HEADING -->
      <div class="kha-scholarship-heading">

        <span class="kha-scholarship-badge">
          <i class="bi bi-mortarboard-fill"></i>
          Scholarship &amp; Free Coaching Support
        </span>

        <h2>
          Empowering Rural Students
          <span>Through Scholarships</span>
        </h2>

        <div class="kha-scholarship-divider">
          <span></span>
          <i class="bi bi-mortarboard-fill"></i>
          <span></span>
        </div>

        <p>
          Khadkeshwar Academy supports deserving rural students through scholarships,
          mentorship, free coaching support, and disciplined academic guidance.
        </p>

      </div>

      <!-- SUPPORT STATS -->
      <div class="kha-support-grid">

        <!-- CARD 01 -->
        <article class="kha-support-card">
          <div class="kha-support-icon">
            <i class="bi bi-people-fill"></i>
          </div>

          <strong>100+</strong>
          <h3>Students Supported</h3>

          <span class="kha-card-line"></span>

          <p>
            Rural students empowered with quality guidance and scholarship support.
          </p>
        </article>

        <!-- CARD 02 -->
        <article class="kha-support-card">
          <div class="kha-support-icon">
            <i class="bi bi-percent"></i>
          </div>

          <strong>50%</strong>
          <h3>Fee Concession</h3>

          <span class="kha-card-line"></span>

          <p>
            Eligible students can receive up to 50% fee concession.
          </p>
        </article>

        <!-- CARD 03 -->
        <article class="kha-support-card">
          <div class="kha-support-icon">
            <i class="bi bi-book-half"></i>
          </div>

          <strong>NEET · JEE</strong>
          <h3>Academic Programs</h3>

          <span class="kha-card-line"></span>

          <p>
            Comprehensive support for NEET, JEE and Foundation preparation.
          </p>
        </article>

        <!-- CARD 04 -->
        <article class="kha-support-card">
          <div class="kha-support-icon">
            <i class="bi bi-house-heart-fill"></i>
          </div>

          <strong>Hostel Facility</strong>
          <h3>Safe Environment</h3>

          <span class="kha-card-line"></span>

          <p>
            Safe hostel and reading room facilities for focused and disciplined study.
          </p>
        </article>

      </div>

      <!-- HOSTEL FACILITY PANEL -->
      <div class="kha-hostel-panel">

        <div class="kha-hostel-visual" aria-hidden="true">
          <div class="kha-hostel-house">
            <i class="bi bi-house-door-fill"></i>
          </div>

          <div class="kha-hostel-books">
            <i class="bi bi-bookshelf"></i>
          </div>
        </div>

        <div class="kha-hostel-content">

          <h3>Hostel &amp; Reading Room Facilities</h3>

          <span class="kha-hostel-line"></span>

          <div class="kha-hostel-points">

            <div>
              <i class="bi bi-check-circle-fill"></i>
              <span>Safe &amp; Secure Hostel Environment</span>
            </div>

            <div>
              <i class="bi bi-check-circle-fill"></i>
              <span>Disciplined &amp; Focused Study Atmosphere</span>
            </div>

            <div>
              <i class="bi bi-check-circle-fill"></i>
              <span>Spacious &amp; Quiet Reading Rooms</span>
            </div>

            <div>
              <i class="bi bi-check-circle-fill"></i>
              <span>24 × 7 Academic Support</span>
            </div>

          </div>

        </div>

      </div>

      <!-- ACTION BUTTONS -->
      <div class="kha-scholarship-actions">

        <a href="{{ route('frontend.scholarship') }}"
           class="kha-scholarship-btn kha-scholarship-btn-primary">
          <span>
            <i class="bi bi-pencil-square"></i>
          </span>

          <span>
            <strong>Apply for Scholarship</strong>
            <small>Register for Scholarship Exam</small>
          </span>
        </a>

        <a href="tel:{{ $phonePrimary }}"
           class="kha-scholarship-btn kha-scholarship-btn-outline">
          <span>
            <i class="bi bi-telephone-fill"></i>
          </span>

          <span>
            <strong>Call Admission Team</strong>
            <small>Talk to our experts</small>
          </span>
        </a>

        <a href="https://wa.me/91{{ $phonePrimary }}"
           target="_blank"
           rel="noopener"
           class="kha-scholarship-btn kha-scholarship-btn-whatsapp">
          <span>
            <i class="bi bi-whatsapp"></i>
          </span>

          <span>
            <strong>WhatsApp Inquiry</strong>
            <small>Get instant support</small>
          </span>
        </a>

      </div>

      <!-- WHY CHOOSE US STRIP -->
      <div class="kha-choose-strip">

        <div class="kha-choose-title">
          <h3>Why Students<br>Choose Us?</h3>
          <span></span>
        </div>

        <div class="kha-choose-items">

          <div class="kha-choose-item">
            <i class="bi bi-people-fill"></i>
            <span>Personal<br>Mentorship</span>
          </div>

          <div class="kha-choose-item">
            <i class="bi bi-clipboard2-check-fill"></i>
            <span>Weekly<br>Tests</span>
          </div>

          <div class="kha-choose-item">
            <i class="bi bi-mortarboard-fill"></i>
            <span>Experienced<br>Faculty</span>
          </div>

          <div class="kha-choose-item">
            <i class="bi bi-currency-rupee"></i>
            <span>Scholarship<br>Support</span>
          </div>

          <div class="kha-choose-item">
            <i class="bi bi-bullseye"></i>
            <span>Career<br>Guidance</span>
          </div>

        </div>

      </div>

      <!-- MISSION STRIP -->
      <div class="kha-mission-strip">

        <div>
          <i class="bi bi-shield-check"></i>
          <span>
            Our mission is to make quality education accessible for every rural student.
          </span>
        </div>

        <strong>Join Us. Achieve More. Succeed Together.</strong>

      </div>

    </div>


    <!-- =========================================
         GOVERNMENT CERTIFICATE PANEL
    ========================================== -->
    <div class="kha-certificate-panel" data-aos="fade-up">

      <!-- CERTIFICATE HEADING -->
      <div class="kha-certificate-heading">

        <span class="kha-certificate-badge">
          <i class="bi bi-bank2"></i>
          Government Scholarship Support
        </span>

        <h2>
          Government Scholarship
          <span>Support Certificates</span>
        </h2>

        <div class="kha-certificate-divider">
          <span></span>
          <i class="bi bi-shield-fill-check"></i>
          <span></span>
        </div>

        <p>
          Recognized support for deserving rural students through free coaching initiatives.
        </p>

      </div>

      <!-- CERTIFICATE CAROUSEL -->
      <div class="kha-certificate-carousel" id="khaCertificateCarousel">

        <div class="kha-certificate-viewport">

          <div class="kha-certificate-track">

            <!-- CERTIFICATE 01 -->
            <article class="kha-certificate-card">
              <div class="kha-certificate-image">
                <img
                  src="assets/img/certificate-1.jpeg"
                  alt="Government free coaching support certificate"
                  loading="lazy">

                <button
                  class="kha-certificate-zoom"
                  type="button"
                  aria-label="View certificate one">
                  <i class="bi bi-arrows-fullscreen"></i>
                </button>
              </div>

              <div class="kha-certificate-card-content">
                <div>
                  <h3>Free Coaching Support Certificate</h3>
                  <p>Government Scholarship Initiative</p>
                  <strong>Academic Year 2025–26</strong>
                </div>

                <button class="kha-view-certificate" type="button">
                  View Certificate
                  <i class="bi bi-box-arrow-up-right"></i>
                </button>
              </div>
            </article>

            <!-- CERTIFICATE 02 -->
            <article class="kha-certificate-card">
              <div class="kha-certificate-image">
                <img
                  src="assets/img/certificate-2.jpeg"
                  alt="Government scholarship certificate"
                  loading="lazy">

                <button
                  class="kha-certificate-zoom"
                  type="button"
                  aria-label="View certificate two">
                  <i class="bi bi-arrows-fullscreen"></i>
                </button>
              </div>

              <div class="kha-certificate-card-content">
                <div>
                  <h3>Free Coaching Support Certificate</h3>
                  <p>Government Scholarship Initiative</p>
                  <strong>Academic Year 2025–26</strong>
                </div>

                <button class="kha-view-certificate" type="button">
                  View Certificate
                  <i class="bi bi-box-arrow-up-right"></i>
                </button>
              </div>
            </article>

            <!-- CERTIFICATE 03 -->
            <article class="kha-certificate-card">
              <div class="kha-certificate-image">
                <img
                  src="assets/img/certificate-3.jpeg"
                  alt="Student free coaching support certificate"
                  loading="lazy">

                <button
                  class="kha-certificate-zoom"
                  type="button"
                  aria-label="View certificate three">
                  <i class="bi bi-arrows-fullscreen"></i>
                </button>
              </div>

              <div class="kha-certificate-card-content">
                <div>
                  <h3>Free Coaching Support Certificate</h3>
                  <p>Government Scholarship Initiative</p>
                  <strong>Academic Year 2025–26</strong>
                </div>

                <button class="kha-view-certificate" type="button">
                  View Certificate
                  <i class="bi bi-box-arrow-up-right"></i>
                </button>
              </div>
            </article>

            <!-- CERTIFICATE 04 -->
            <article class="kha-certificate-card">
              <div class="kha-certificate-image">
                <img
                  src="assets/img/certificate-4.jpeg"
                  alt="Rural student scholarship support certificate"
                  loading="lazy">

                <button
                  class="kha-certificate-zoom"
                  type="button"
                  aria-label="View certificate four">
                  <i class="bi bi-arrows-fullscreen"></i>
                </button>
              </div>

              <div class="kha-certificate-card-content">
                <div>
                  <h3>Free Coaching Support Certificate</h3>
                  <p>Government Scholarship Initiative</p>
                  <strong>Academic Year 2025–26</strong>
                </div>

                <button class="kha-view-certificate" type="button">
                  View Certificate
                  <i class="bi bi-box-arrow-up-right"></i>
                </button>
              </div>
            </article>

            <!-- CERTIFICATE 05 -->
            <!-- <article class="kha-certificate-card">
              <div class="kha-certificate-image">
                <img
                  src="assets/img/certificate-5.jpeg"
                  alt="Scholarship and free coaching certificate"
                  loading="lazy">

                <button
                  class="kha-certificate-zoom"
                  type="button"
                  aria-label="View certificate five">
                  <i class="bi bi-arrows-fullscreen"></i>
                </button>
              </div>

              <div class="kha-certificate-card-content">
                <div>
                  <h3>Free Coaching Support Certificate</h3>
                  <p>Government Scholarship Initiative</p>
                  <strong>Academic Year 2025–26</strong>
                </div>

                <button class="kha-view-certificate" type="button">
                  View Certificate
                  <i class="bi bi-box-arrow-up-right"></i>
                </button>
              </div>
            </article> -->

          </div>

        </div>

        <!-- CAROUSEL ARROWS -->
        <button
          class="kha-certificate-arrow kha-certificate-prev"
          type="button"
          aria-label="Previous certificates">
          <i class="bi bi-chevron-left"></i>
        </button>

        <button
          class="kha-certificate-arrow kha-certificate-next"
          type="button"
          aria-label="Next certificates">
          <i class="bi bi-chevron-right"></i>
        </button>

        <!-- CAROUSEL DOTS -->
        <div class="kha-certificate-dots" aria-label="Certificate slides"></div>

      </div>

      <!-- IMPACT BOX -->
      <div class="kha-impact-box">

        <div class="kha-impact-title">
          <h3>Our Impact</h3>
          <span></span>
        </div>

        <div class="kha-impact-grid">

          <div class="kha-impact-item">
            <span>
              <i class="bi bi-people-fill"></i>
            </span>

            <div>
              <strong>100+</strong>
              <h4>Students Supported</h4>
              <small>From Rural Areas</small>
            </div>
          </div>

          <div class="kha-impact-item">
            <span>
              <i class="bi bi-trophy-fill"></i>
            </span>

            <div>
              <strong>50%</strong>
              <h4>Fee Concession</h4>
              <small>Up to 50% Support</small>
            </div>
          </div>

          <div class="kha-impact-item">
            <span>
              <i class="bi bi-book-half"></i>
            </span>

            <div>
              <strong>NEET · JEE</strong>
              <h4>Academic Programs</h4>
              <small>Foundation to Advanced</small>
            </div>
          </div>

          <div class="kha-impact-item">
            <span>
              <i class="bi bi-shield-fill-check"></i>
            </span>

            <div>
              <strong>Govt. Recognized</strong>
              <h4>Trusted &amp; Approved</h4>
              <small>Government Initiative</small>
            </div>
          </div>

        </div>

      </div>

    </div>

  </div>
</section>
<!-- =====================================================
     SCHOLARSHIP SUPPORT & CERTIFICATES SECTION END
====================================================== -->

<!-- =====================================================
     CERTIFICATE LIGHTBOX START
====================================================== -->
<div class="kha-certificate-lightbox"
     id="khaCertificateLightbox"
     role="dialog"
     aria-modal="true"
     aria-hidden="true">

  <button
    class="kha-lightbox-close"
    type="button"
    aria-label="Close certificate preview">
    <i class="bi bi-x-lg"></i>
  </button>

  <button
    class="kha-lightbox-arrow kha-lightbox-prev"
    type="button"
    aria-label="Previous certificate">
    <i class="bi bi-chevron-left"></i>
  </button>

  <div class="kha-lightbox-content">
    <img
      src=""
      alt="Certificate full screen preview"
      id="khaLightboxImage">
  </div>

  <button
    class="kha-lightbox-arrow kha-lightbox-next"
    type="button"
    aria-label="Next certificate">
    <i class="bi bi-chevron-right"></i>
  </button>

</div>
<!-- =====================================================
     CERTIFICATE LIGHTBOX END
====================================================== -->


@endsection
