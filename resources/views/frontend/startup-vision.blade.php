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
<!-- ========================= STARTUP VISION PAGE START ========================== -->

<main class="startupx-page">

  <!-- HERO START -->
  <section class="startupx-hero">
    <div class="startupx-bg-grid"></div>
    <div class="startupx-orb startupx-orb-1"></div>
    <div class="startupx-orb startupx-orb-2"></div>
    <div class="startupx-orb startupx-orb-3"></div>

    <div class="container">

      <nav class="startupx-breadcrumb" data-aos="fade-up">
        <a href="{{ route('frontend.home') }}">
          <i class="bi bi-house-door-fill"></i>
          Home
        </a>
        <i class="bi bi-chevron-right"></i>
        <span>Startup Vision</span>
      </nav>

      <div class="startupx-hero-card" data-aos="fade-up">
        <div class="startupx-hero-shine"></div>

        <div class="row g-0 align-items-stretch">

          <div class="col-lg-7">
            <div class="startupx-hero-content">

              <span class="startupx-kicker">
                <i class="bi bi-rocket-takeoff-fill"></i>
                Startup Vision & Future Roadmap
              </span>

              <h1>
                Building a future-ready
                <span>NEET & JEE learning ecosystem.</span>
              </h1>

              <p>
                Khadkeshwar NEET JEE Academy is built with a rural-first education vision:
                to make quality coaching, personal mentorship, test support and future AI-enabled
                learning accessible for NEET and JEE aspirants.
              </p>

              <div class="startupx-alert-note">
                <i class="bi bi-info-circle-fill"></i>
                <span>
                  AI-enabled learning features are planned as Phase 2 and should be shown as upcoming future plans, not as already launched services.
                </span>
              </div>

              <div class="startupx-hero-tags">
                <span><i class="bi bi-check-circle-fill"></i> Startup India Recognized</span>
                <span><i class="bi bi-check-circle-fill"></i> DPIIT Recognition</span>
                <span><i class="bi bi-check-circle-fill"></i> Rural-First Mission</span>
                <span><i class="bi bi-check-circle-fill"></i> Future AI Learning</span>
              </div>

              <div class="startupx-hero-actions">
                <a href="{{ route('frontend.admission') }}" class="btn-main">
                  Apply Now
                  <i class="bi bi-arrow-right"></i>
                </a>

                <a href="{{ route('frontend.ai-learning') }}" class="startupx-outline-btn">
                  <i class="bi bi-cpu-fill"></i>
                  AI Vision
                </a>
              </div>

            </div>
          </div>

          <div class="col-lg-5">
            <div class="startupx-hero-visual">

              <div class="startupx-visual-card">
                <div class="startupx-visual-head">
                  <div>
                    <span></span>
                    <span></span>
                    <span></span>
                  </div>
                  <strong>Startup Roadmap</strong>
                </div>

                <div class="startupx-visual-body">

                  <div class="startupx-rocket-core">
                    <i class="bi bi-rocket-takeoff-fill"></i>
                    <span class="startupx-ring startupx-ring-1"></span>
                    <span class="startupx-ring startupx-ring-2"></span>
                    <span class="startupx-ring startupx-ring-3"></span>
                  </div>

                  <div class="startupx-mini-grid">
                    <div>
                      <i class="bi bi-globe2"></i>
                      <strong>Phase 1</strong>
                      <span>Website & Digital Presence</span>
                    </div>

                    <div>
                      <i class="bi bi-cpu-fill"></i>
                      <strong>Phase 2</strong>
                      <span>AI Learning Platform</span>
                    </div>
                  </div>

                  <div class="startupx-visual-note">
                    <i class="bi bi-award-fill"></i>
                    <div>
                      <strong>Recognized Startup</strong>
                      <span>Innovation-driven education mission</span>
                    </div>
                  </div>

                </div>
              </div>

              <div class="startupx-hero-info-row">
                <div class="startupx-info-card">
                  <i class="bi bi-buildings-fill"></i>
                  <div>
                    <strong>KDS Pvt Ltd</strong>
                    <span>Parent Company</span>
                  </div>
                </div>

                <div class="startupx-info-card">
                  <i class="bi bi-geo-alt-fill"></i>
                  <div>
                    <strong>Lonar</strong>
                    <span>Maharashtra</span>
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


  <!-- VISION OVERVIEW START -->
  <section class="startupx-overview section-padding">
    <div class="container">

      <div class="startupx-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-lightbulb-fill"></i>
          Vision Overview
        </span>

        <h2>A startup vision focused on quality education, accessibility and innovation.</h2>

        <p>
          The academy vision combines strong classroom mentorship with digital systems,
          structured preparation and future AI-enabled learning for NEET and JEE aspirants.
        </p>
      </div>

      @php
        $startupOverviewDelays = [100, 180, 260, 340, 420, 500];
      @endphp

      @if(isset($startupOverviewCards) && $startupOverviewCards->count())
      <div class="startupx-overview-grid">
        @foreach($startupOverviewCards as $index => $card)
          <div class="startupx-overview-card {{ $card->is_featured ? 'featured' : '' }}" data-aos="fade-up" data-aos-delay="{{ $startupOverviewDelays[$index] ?? 100 }}">
            <i class="{{ $card->icon ?: 'bi bi-lightbulb-fill' }}"></i>
            <h3>{{ $card->title }}</h3>
            @if($card->description)
              <p>{{ $card->description }}</p>
            @endif
          </div>
        @endforeach
      </div>
      @else
      <div class="startupx-overview-grid">

        <div class="startupx-overview-card" data-aos="fade-up" data-aos-delay="100">
          <i class="bi bi-people-fill"></i>
          <h3>Rural-First Education</h3>
          <p>Focused on supporting students from rural and semi-urban regions with quality guidance.</p>
        </div>

        <div class="startupx-overview-card featured" data-aos="fade-up" data-aos-delay="180">
          <i class="bi bi-cash-coin"></i>
          <h3>Affordable Learning Mission</h3>
          <p>Designed to make NEET/JEE coaching more accessible through support and concession programs.</p>
        </div>

        <div class="startupx-overview-card" data-aos="fade-up" data-aos-delay="260">
          <i class="bi bi-person-check-fill"></i>
          <h3>Personal Mentorship</h3>
          <p>Student-focused mentorship, regular assessment and guidance-led academic improvement.</p>
        </div>

        <div class="startupx-overview-card" data-aos="fade-up" data-aos-delay="340">
          <i class="bi bi-robot"></i>
          <h3>Future AI Learning</h3>
          <p>Phase 2 plan includes smart test analysis, progress tracking and personalized learning support.</p>
        </div>

      </div>
      @endif

    </div>
  </section>
  <!-- VISION OVERVIEW END -->


  <!-- RECOGNITION START -->
  <section class="startupx-recognition section-padding">
    <div class="startupx-dark-grid"></div>

    <div class="container">

      <div class="row g-5 align-items-center">

        <div class="col-lg-5">
          <div class="startupx-recognition-content" data-aos="fade-right">
            <span class="section-badge">
              <i class="bi bi-patch-check-fill"></i>
              Recognition & Trust
            </span>

            <h2>Official recognition that supports credibility and growth.</h2>

            <p>
              {{ $settings?->company_name ?? $settingDefaults['company_name'] }} represents the vision behind Khadkeshwar NEET JEE Academy,
              with a professional and scalable education-focused direction.
            </p>

            <div class="startupx-trust-note">
              <i class="bi bi-shield-check"></i>
              <div>
                <strong>Professional Education Initiative</strong>
                <span>Built for long-term trust, quality academic support and future digital learning.</span>
              </div>
            </div>

            <div class="startupx-recognition-actions">
              <a href="{{ route('frontend.company-information') }}" class="btn-main">
                Company Info
                <i class="bi bi-arrow-right"></i>
              </a>

              <a href="{{ route('frontend.contact') }}" class="btn-white">
                Contact Us
              </a>
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="startupx-recognition-grid" data-aos="fade-left">

            <div class="startupx-recognition-card">
              <i class="bi bi-award-fill"></i>
              <span>Certification</span>
              <h3>ISO 9001:2015 Certified Institute</h3>
            </div>

            <div class="startupx-recognition-card">
              <i class="bi bi-patch-check-fill"></i>
              <span>Trademark</span>
              <h3>Trademark Registered Academy</h3>
            </div>

            <div class="startupx-recognition-card">
              <i class="bi bi-rocket-takeoff-fill"></i>
              <span>Startup</span>
              <h3>Startup India Recognized Startup</h3>
            </div>

            <div class="startupx-recognition-card">
              <i class="bi bi-buildings-fill"></i>
              <span>Recognition</span>
              <h3>DPIIT Recognition</h3>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- RECOGNITION END -->


  <!-- ROADMAP START -->
  <section class="startupx-roadmap section-padding">
    <div class="container">

      <div class="startupx-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-diagram-3-fill"></i>
          Growth Roadmap
        </span>

        <h2>Step-by-step roadmap for academic and digital growth.</h2>

        <p>
          The project is planned in phases so the academy can begin with a strong public website
          and later scale into advanced AI-enabled learning support.
        </p>
      </div>

      @php
        $startupRoadmapDelays = [100, 180, 260, 340, 420, 500];
      @endphp

      @if(isset($startupRoadmapCards) && $startupRoadmapCards->count())
      <div class="startupx-roadmap-grid">
        @foreach($startupRoadmapCards as $index => $card)
          <div class="startupx-roadmap-card {{ $card->is_featured ? 'featured' : '' }}" data-aos="zoom-in" data-aos-delay="{{ $startupRoadmapDelays[$index] ?? 100 }}">
            <span>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
            <i class="{{ $card->icon ?: 'bi bi-diagram-3-fill' }}"></i>
            <h3>{{ $card->title }}</h3>
            @if($card->description)
              <p>{{ $card->description }}</p>
            @endif
          </div>
        @endforeach
      </div>
      @else
      <div class="startupx-roadmap-grid">

        <div class="startupx-roadmap-card" data-aos="zoom-in" data-aos-delay="100">
          <span>01</span>
          <i class="bi bi-window-stack"></i>
          <h3>Phase 1: Website Development</h3>
          <p>Professional website, public pages, gallery, founder story, course details and admission inquiry.</p>
        </div>

        <div class="startupx-roadmap-card featured" data-aos="zoom-in" data-aos-delay="180">
          <span>02</span>
          <i class="bi bi-person-lines-fill"></i>
          <h3>Student Admission System</h3>
          <p>Admission inquiry forms, contact support, course guidance and fee concession communication.</p>
        </div>

        <div class="startupx-roadmap-card" data-aos="zoom-in" data-aos-delay="260">
          <span>03</span>
          <i class="bi bi-images"></i>
          <h3>Academy Media & Trust</h3>
          <p>Gallery, videos, testimonials, result placeholders and academic achievement sections.</p>
        </div>

        <div class="startupx-roadmap-card" data-aos="zoom-in" data-aos-delay="340">
          <span>04</span>
          <i class="bi bi-robot"></i>
          <h3>Phase 2: AI Learning Platform</h3>
          <p>Future plan for personalized paths, smart test analysis, weak-topic tracking and dashboards.</p>
        </div>

      </div>
      @endif

    </div>
  </section>
  <!-- ROADMAP END -->


  <!-- AI FUTURE START -->
  <section class="startupx-ai section-padding">
    <div class="container">

      <div class="row g-5 align-items-center">

        <div class="col-lg-6">
          <div class="startupx-ai-card" data-aos="fade-right">
            <span class="section-badge">
              <i class="bi bi-cpu-fill"></i>
              Phase 2 Future Plan
            </span>

            <h2>Future AI-enabled learning ecosystem for NEET and JEE preparation.</h2>

            <p>
              In Phase 2, the vision is to build an AI-enabled learning system that supports students
              with personalized guidance, smart test analysis, progress tracking and better preparation planning.
            </p>

            <div class="startupx-ai-note">
              <i class="bi bi-info-circle-fill"></i>
              <span>
                This should be presented as an upcoming/planned initiative only, not as a fully launched feature.
              </span>
            </div>

            <a href="{{ route('frontend.ai-learning') }}" class="btn-main">
              Explore AI Learning Plan
              <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="startupx-ai-grid" data-aos="fade-left">

            <div>
              <i class="bi bi-signpost-split-fill"></i>
              <h3>Personalized Learning Path</h3>
            </div>

            <div>
              <i class="bi bi-clipboard-data-fill"></i>
              <h3>Smart Test Analysis</h3>
            </div>

            <div>
              <i class="bi bi-chat-dots-fill"></i>
              <h3>AI-Based Doubt Support</h3>
            </div>

            <div>
              <i class="bi bi-graph-up-arrow"></i>
              <h3>Progress Tracking</h3>
            </div>

            <div>
              <i class="bi bi-bullseye"></i>
              <h3>Weak Topic Identification</h3>
            </div>

            <div>
              <i class="bi bi-layout-text-window-reverse"></i>
              <h3>Parent / Student Dashboard</h3>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- AI FUTURE END -->


  <!-- COMPANY SNAPSHOT START -->
  <section class="startupx-company section-padding">
    <div class="container">

      <div class="startupx-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-building-check"></i>
          Company Snapshot
        </span>

        <h2>Official company information for trust and transparency.</h2>

        <p>
          Keep these details editable and synced with the company information page.
        </p>
      </div>

      <div class="startupx-company-grid">

        <div class="startupx-company-card" data-aos="fade-up" data-aos-delay="100">
          <i class="bi bi-buildings-fill"></i>
          <span>Company Name</span>
          <h3>{{ $settings?->company_name ?? $settingDefaults['company_name'] }}</h3>
        </div>

        <div class="startupx-company-card" data-aos="fade-up" data-aos-delay="180">
          <i class="bi bi-telephone-fill"></i>
          <span>Operational Number</span>
          <h3>{{ $phonePrimary }}</h3>
        </div>

        <div class="startupx-company-card" data-aos="fade-up" data-aos-delay="260">
          <i class="bi bi-envelope-fill"></i>
          <span>Email</span>
          <h3>{{ $emailPrimary }}</h3>
        </div>

        <div class="startupx-company-card" data-aos="fade-up" data-aos-delay="340">
          <i class="bi bi-geo-alt-fill"></i>
          <span>Registered Address</span>
          <h3>{{ $address }}</h3>
        </div>

        <div class="startupx-company-card" data-aos="fade-up" data-aos-delay="420">
          <i class="bi bi-receipt-cutoff"></i>
          <span>GSTIN</span>
          <h3>{{ $settings?->gstin ?? $settingDefaults['gstin'] }}</h3>
        </div>

        <div class="startupx-company-card" data-aos="fade-up" data-aos-delay="500">
          <i class="bi bi-file-earmark-lock-fill"></i>
          <span>CIN</span>
          <h3>{{ $settings?->cin ?? $settingDefaults['cin'] }}</h3>
        </div>

      </div>

    </div>
  </section>
  <!-- COMPANY SNAPSHOT END -->


  <!-- CTA START -->
  <section class="startupx-cta-section section-padding">
    <div class="container">

      <div class="startupx-cta" data-aos="zoom-in">

        <div>
          <span>
            <i class="bi bi-mortarboard-fill"></i>
            Join the Future of Learning
          </span>

          <h2>Be part of a future-ready NEET & JEE education mission.</h2>

          <p>
            Start your preparation with Khadkeshwar Academy and experience quality coaching,
            personal mentorship, regular tests and future-ready academic support.
          </p>
        </div>

        <div class="startupx-cta-actions">
          <a href="{{ route('frontend.admission') }}" class="btn-main">
            Apply Now
            <i class="bi bi-arrow-right"></i>
          </a>

          <a href="{{ $telPrimary }}" class="btn-white">
            <i class="bi bi-telephone-fill"></i>
            Call Now
          </a>
        </div>

      </div>

    </div>
  </section>
  <!-- CTA END -->

</main>

<!-- ========================= STARTUP VISION PAGE END ========================== -->
@endsection
