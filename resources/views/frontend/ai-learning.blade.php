

@extends('frontend.master')
@section('content')
@php
  $settingDefaults = \App\Models\WebsiteSetting::defaults();
  try {
    $settings = $websiteSetting ?? \App\Models\WebsiteSetting::current();
  } catch (\Throwable $exception) {
    $settings = null;
  }
  $siteName = $settings?->site_name ?? $settingDefaults['site_name'];
  $phonePrimary = $settings?->phone_primary ?? $settingDefaults['phone_primary'];
  $phoneDigits = $settings?->cleanPhone($phonePrimary) ?? preg_replace('/\D+/', '', $phonePrimary);
  $emailPrimary = $settings?->email_primary ?? $settingDefaults['email_primary'];
  $address = $settings?->address ?? $settingDefaults['address'];
  $shortAddress = str_contains($address, ',') ? collect(explode(',', $address))->take(2)->implode(',') : $address;
  $telPrimary = $settings?->telLink($phonePrimary) ?? 'tel:' . preg_replace('/\s+/', '', $phonePrimary);
  $mailPrimary = $settings?->mailLink($emailPrimary) ?? 'mailto:' . $emailPrimary;
  $whatsappUrl = $settings?->whatsappLink('Hello, I want admission information.') ?? 'https://wa.me/' . $phoneDigits;
  $admissionBadgeText = $settings?->admission_badge_text ?? $settingDefaults['admission_badge_text'];
  $siteUrl = $settings?->canonical_url ?: url('/');
@endphp
<!-- ========================= AI LEARNING PAGE START ========================== -->

<main class="aix-page">

  <!-- HERO START -->
<section class="aix-hero">
  <div class="aix-bg-grid"></div>
  <div class="aix-orb aix-orb-1"></div>
  <div class="aix-orb aix-orb-2"></div>
  <div class="aix-orb aix-orb-3"></div>

  <div class="container">

    <nav class="aix-breadcrumb" data-aos="fade-up">
      <a href="{{ route('frontend.home') }}">
        <i class="bi bi-house-door-fill"></i>
        Home
      </a>
      <i class="bi bi-chevron-right"></i>
      <span>AI Learning</span>
    </nav>

    <div class="aix-hero-card" data-aos="fade-up">
      <div class="aix-hero-shine"></div>

      <div class="row g-0 align-items-stretch">

        <div class="col-lg-7">
          <div class="aix-hero-content">

            <span class="aix-kicker">
              <i class="bi bi-robot"></i>
              Phase 2 Upcoming Initiative
            </span>

            <h1>
              AI-Powered Learning
              <span>Coming in Phase 2</span>
            </h1>

            <p>
              At Khadkeshwar NEET JEE Academy, we believe the future of education will
              combine strong mentorship with intelligent technology. In Phase 1, we are
              building our official digital presence through this website. In Phase 2,
              our focus will be on developing an AI-enabled learning system for NEET and
              JEE aspirants.
            </p>

            <div class="aix-alert-note">
              <i class="bi bi-info-circle-fill"></i>
              <span>
                AI Learning is a planned Phase 2 initiative. It is not shown as a fully launched product yet.
              </span>
            </div>

            <div class="aix-hero-tags">
              <span><i class="bi bi-check-circle-fill"></i> Personalized Learning</span>
              <span><i class="bi bi-check-circle-fill"></i> Smart Test Analysis</span>
              <span><i class="bi bi-check-circle-fill"></i> Progress Tracking</span>
              <span><i class="bi bi-check-circle-fill"></i> Smart Revision Planner</span>
            </div>

            <div class="aix-hero-actions">
              <button class="btn-main border-0" data-bs-toggle="modal" data-bs-target="#admissionModal">
                Apply Now
                <i class="bi bi-arrow-right"></i>
              </button>

              <a href="{{ $telPrimary }}" class="aix-outline-btn">
                <i class="bi bi-telephone-fill"></i>
                Call Now
              </a>
            </div>

          </div>
        </div>

        <div class="col-lg-5">
          <div class="aix-hero-visual">

            <div class="aix-ai-device">
              <div class="aix-device-head">
                <span></span>
                <span></span>
                <span></span>
              </div>

              <div class="aix-device-screen">
                <div class="aix-ai-core">
                  <i class="bi bi-cpu-fill"></i>
                  <span class="aix-ring aix-ring-1"></span>
                  <span class="aix-ring aix-ring-2"></span>
                  <span class="aix-ring aix-ring-3"></span>
                </div>

                <div class="aix-screen-lines">
                  <div style="width: 84%;"></div>
                  <div style="width: 62%;"></div>
                  <div style="width: 74%;"></div>
                </div>

                <div class="aix-ai-metrics">
                  <div>
                    <strong>AI</strong>
                    <span>Smart Analysis</span>
                  </div>

                  <div>
                    <strong>24x7</strong>
                    <span>Planned Support</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="aix-hero-info-row">
              <div class="aix-hero-info-card">
                <i class="bi bi-graph-up-arrow"></i>
                <div>
                  <strong>Progress Tracking</strong>
                  <span>Phase 2 planned</span>
                </div>
              </div>

              <div class="aix-hero-info-card">
                <i class="bi bi-lightbulb-fill"></i>
                <div>
                  <strong>Weak Topic Finder</strong>
                  <span>Future AI feature</span>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>

  </div>
</section>
<!-- HERO END -->


  <!-- PHASE 2 VISION START -->
  <section class="aix-vision section-padding">
    <div class="container">

      <div class="row g-5 align-items-center">

        <div class="col-lg-5">
          <div class="aix-intro-card" data-aos="fade-right">
            <span class="section-badge">
              <i class="bi bi-stars"></i>
              Phase 2 Vision
            </span>

            <h2>Mentorship plus intelligent technology for better preparation.</h2>

            <p>
              In Phase 2, Khadkeshwar Academy plans to build an AI-enabled learning system
              that supports students with personalized guidance, smart test analysis,
              progress tracking and better preparation planning.
            </p>

            <div class="aix-highlight-box">
              <i class="bi bi-quote"></i>
              <div>
                <strong>Our goal is to make structured and intelligent learning support accessible for rural NEET and JEE aspirants.</strong>
                <span>Future-ready education vision</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="aix-vision-grid" data-aos="fade-left">

            <div class="aix-vision-card">
              <i class="bi bi-person-check-fill"></i>
              <h3>Personalized Guidance</h3>
              <p>AI-based learning direction planned around student performance and preparation needs.</p>
            </div>

            <div class="aix-vision-card">
              <i class="bi bi-clipboard-data-fill"></i>
              <h3>Smart Assessment</h3>
              <p>Test analysis and performance insights to identify strong and weak areas.</p>
            </div>

            <div class="aix-vision-card">
              <i class="bi bi-arrow-repeat"></i>
              <h3>Revision Planning</h3>
              <p>Smart revision support for important chapters, weak topics and practice discipline.</p>
            </div>

            <div class="aix-vision-card">
              <i class="bi bi-people-fill"></i>
              <h3>Parent Dashboard</h3>
              <p>Future parent/student progress dashboard for transparent academic tracking.</p>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- PHASE 2 VISION END -->

<!-- WHAT WE ARE PLANNING START -->
<section class="aix-planning section-padding">
  <div class="container">

    <div class="aix-section-head" data-aos="fade-up">
      <span class="section-badge">
        <i class="bi bi-diagram-3-fill"></i>
        What We Are Planning
      </span>

      <h2>A future AI learning ecosystem for NEET and JEE preparation.</h2>

      <p>
        This initiative is designed especially for NEET and JEE aspirants who need
        structured learning, regular assessment and clear direction to improve performance.
      </p>
    </div>

    <div class="aix-plan-card-grid">

      <!-- CARD 01 -->
      <div class="aix-plan-card" data-aos="fade-up" data-aos-delay="100">
        <div class="aix-plan-card-top">
          <span class="aix-plan-count">01</span>
          <span class="aix-plan-icon">
            <i class="bi bi-globe2"></i>
          </span>
        </div>

        <h3>Phase 1: Official Digital Presence</h3>

        <p>
          Website, public pages, admission inquiry, gallery, course information and academy branding.
        </p>
      </div>

      <!-- CARD 02 -->
      <div class="aix-plan-card active" data-aos="fade-up" data-aos-delay="180">
        <div class="aix-plan-card-top">
          <span class="aix-plan-count">02</span>
          <span class="aix-plan-icon">
            <i class="bi bi-robot"></i>
          </span>
        </div>

        <h3>Phase 2: AI-Enabled Learning System</h3>

        <p>
          Personalized learning, smart test analysis, progress tracking and revision planning.
        </p>
      </div>

      <!-- CARD 03 -->
      <div class="aix-plan-card" data-aos="fade-up" data-aos-delay="260">
        <div class="aix-plan-card-top">
          <span class="aix-plan-count">03</span>
          <span class="aix-plan-icon">
            <i class="bi bi-graph-up-arrow"></i>
          </span>
        </div>

        <h3>Future: Performance Improvement Ecosystem</h3>

        <p>
          Weak-topic identification, dashboard, digital resources and improvement suggestions.
        </p>
      </div>

    </div>

  </div>
</section>
<!-- WHAT WE ARE PLANNING END -->


  <!-- WHY AI MATTERS START -->
  <section class="aix-matters section-padding">
    <div class="aix-dark-grid"></div>

    <div class="container">

      <div class="aix-section-head light" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-lightning-charge-fill"></i>
          Why AI Learning Matters
        </span>

        <h2>AI can help students prepare with better clarity and direction.</h2>

        <p>
          AI learning is planned to support mentorship, not replace teachers. The goal is to
          help students understand where they need improvement and how to revise better.
        </p>
      </div>

      <div class="aix-matters-grid">

        <div class="aix-matter-card" data-aos="zoom-in" data-aos-delay="100">
          <span>01</span>
          <i class="bi bi-bullseye"></i>
          <h3>Clear Direction</h3>
          <p>Students can understand what to study next and where to focus.</p>
        </div>

        <div class="aix-matter-card" data-aos="zoom-in" data-aos-delay="180">
          <span>02</span>
          <i class="bi bi-clipboard2-pulse-fill"></i>
          <h3>Better Test Analysis</h3>
          <p>Smart analysis can help identify mistakes, weak chapters and accuracy gaps.</p>
        </div>

        <div class="aix-matter-card" data-aos="zoom-in" data-aos-delay="260">
          <span>03</span>
          <i class="bi bi-calendar2-check-fill"></i>
          <h3>Revision Discipline</h3>
          <p>Planned revision support can help students stay consistent.</p>
        </div>

        <div class="aix-matter-card" data-aos="zoom-in" data-aos-delay="340">
          <span>04</span>
          <i class="bi bi-person-workspace"></i>
          <h3>Teacher + AI Support</h3>
          <p>Human mentorship with intelligent insights for better student support.</p>
        </div>

      </div>

    </div>
  </section>
  <!-- WHY AI MATTERS END -->


  <!-- PLANNED FEATURES START -->
  <section class="aix-features section-padding">
    <div class="container">

      <div class="aix-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-grid-3x3-gap-fill"></i>
          Planned Features
        </span>

        <h2>Phase 2 AI features planned for future development.</h2>

        <p>
          These features are future plans and will be developed only in Phase 2 after confirmation.
        </p>
      </div>

      <div class="aix-feature-grid">

        <div class="aix-feature-card" data-aos="fade-up" data-aos-delay="80">
          <i class="bi bi-signpost-split-fill"></i>
          <h3>Personalized Learning Path</h3>
          <p>Student-specific study direction based on performance and learning needs.</p>
        </div>

        <div class="aix-feature-card featured" data-aos="fade-up" data-aos-delay="130">
          <i class="bi bi-clipboard-data-fill"></i>
          <h3>Smart Test Analysis</h3>
          <p>AI-based review of test performance, weak areas and improvement direction.</p>
        </div>

        <div class="aix-feature-card" data-aos="fade-up" data-aos-delay="180">
          <i class="bi bi-chat-dots-fill"></i>
          <h3>AI-Based Doubt Support</h3>
          <p>Planned support to help students understand doubts faster with guided help.</p>
        </div>

        <div class="aix-feature-card" data-aos="fade-up" data-aos-delay="230">
          <i class="bi bi-graph-up-arrow"></i>
          <h3>Student Progress Tracking</h3>
          <p>Track learning progress, test results, improvement and revision needs.</p>
        </div>

        <div class="aix-feature-card" data-aos="fade-up" data-aos-delay="280">
          <i class="bi bi-stars"></i>
          <h3>Improvement Suggestions</h3>
          <p>Smart suggestions for chapters, practice sets and revision focus.</p>
        </div>

        <div class="aix-feature-card" data-aos="fade-up" data-aos-delay="330">
          <i class="bi bi-bar-chart-line-fill"></i>
          <h3>Chapter-wise Analytics</h3>
          <p>Chapter-level performance analytics for NEET and JEE preparation.</p>
        </div>

        <div class="aix-feature-card" data-aos="fade-up" data-aos-delay="380">
          <i class="bi bi-calendar2-week-fill"></i>
          <h3>Smart Revision Planner</h3>
          <p>Planned revision timetable based on weak topics and test performance.</p>
        </div>

        <div class="aix-feature-card" data-aos="fade-up" data-aos-delay="430">
          <i class="bi bi-search-heart-fill"></i>
          <h3>Weak-topic Identification</h3>
          <p>Identify chapters that need more practice and revision support.</p>
        </div>

        <div class="aix-feature-card" data-aos="fade-up" data-aos-delay="480">
          <i class="bi bi-folder2-open"></i>
          <h3>Digital Study Resources</h3>
          <p>Future digital resources for structured preparation and practice.</p>
        </div>

        <div class="aix-feature-card" data-aos="fade-up" data-aos-delay="530">
          <i class="bi bi-people-fill"></i>
          <h3>Parent / Student Dashboard</h3>
          <p>Progress dashboard for students and parents to track preparation journey.</p>
        </div>

      </div>

    </div>
  </section>
  <!-- PLANNED FEATURES END -->


  <!-- VISUAL SECTION START -->
  <section class="aix-visual-section section-padding">
    <div class="container">

      <div class="row g-5 align-items-center">

        <div class="col-lg-6">
          <div class="aix-dashboard-wrap" data-aos="fade-right">

            <div class="aix-dashboard">
              <div class="aix-dashboard-top">
                <div>
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
                <strong>AI Learning Dashboard</strong>
              </div>

              <div class="aix-dashboard-body">

                <div class="aix-score-ring">
                  <div>
                    <strong>82%</strong>
                    <span>Practice Growth</span>
                  </div>
                </div>

                <div class="aix-dashboard-list">
                  <div>
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Physics weak topic identified</span>
                  </div>

                  <div>
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Biology revision planned</span>
                  </div>

                  <div>
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Maths practice suggested</span>
                  </div>
                </div>

                <div class="aix-dashboard-bars">
                  <div><span style="width: 82%;"></span></div>
                  <div><span style="width: 68%;"></span></div>
                  <div><span style="width: 74%;"></span></div>
                </div>

              </div>
            </div>

          </div>
        </div>

        <div class="col-lg-6">
          <div class="aix-visual-content" data-aos="fade-left">
            <span class="section-badge">
              <i class="bi bi-window-stack"></i>
              Image / Visual Section
            </span>

            <h2>Future dashboard-style learning experience for students and parents.</h2>

            <p>
              The planned AI learning platform will help students see progress, analyze test
              performance, find weak topics and follow a smarter revision plan. Parents can
              also get better visibility of academic progress in the future dashboard.
            </p>

            <div class="aix-visual-points">
              <div>
                <i class="bi bi-check-circle-fill"></i>
                <span>Student progress tracking</span>
              </div>

              <div>
                <i class="bi bi-check-circle-fill"></i>
                <span>Smart revision recommendations</span>
              </div>

              <div>
                <i class="bi bi-check-circle-fill"></i>
                <span>Parent/student performance dashboard</span>
              </div>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- VISUAL SECTION END -->


  <!-- COMING SOON CTA START -->
  <section class="aix-cta-section section-padding">
    <div class="container">

      <div class="aix-cta" data-aos="zoom-in">

        <div>
          <span>
            <i class="bi bi-rocket-takeoff-fill"></i>
            Coming in Phase 2
          </span>

          <h2>AI-Powered Learning is planned for the next development phase.</h2>

          <p>
            Join Khadkeshwar Academy’s current NEET, JEE and Foundation programs today.
            AI-enabled learning features will be introduced as a future Phase 2 initiative.
          </p>
        </div>

        <div class="aix-cta-actions">
          <button class="btn-main border-0" data-bs-toggle="modal" data-bs-target="#admissionModal">
            Apply for Admission
            <i class="bi bi-arrow-right"></i>
          </button>

          <a href="{{ $telPrimary }}" class="btn-white">
            <i class="bi bi-telephone-fill"></i>
            Call Now
          </a>
        </div>

      </div>

    </div>
  </section>
  <!-- COMING SOON CTA END -->

</main>

<!-- ========================= AI LEARNING PAGE END ========================== -->
@endsection