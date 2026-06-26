

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
<!-- ========================= TEST SERIES PAGE START ========================== -->

<main class="testx-page">

  <!-- HERO START -->
  <section class="testx-hero">
    <div class="testx-bg-grid"></div>
    <div class="testx-orb testx-orb-1"></div>
    <div class="testx-orb testx-orb-2"></div>
    <div class="testx-orb testx-orb-3"></div>

    <div class="container">

      <nav class="testx-breadcrumb" data-aos="fade-up">
        <a href="{{ route('frontend.home') }}">
          <i class="bi bi-house-door-fill"></i>
          Home
        </a>
        <i class="bi bi-chevron-right"></i>
        <a href="{{ route('frontend.courses') }}">Courses</a>
        <i class="bi bi-chevron-right"></i>
        <span>Test Series</span>
      </nav>

      <div class="testx-hero-card" data-aos="fade-up">
        <div class="testx-hero-shine"></div>

        <div class="row g-0 align-items-stretch">

          <div class="col-lg-7">
            <div class="testx-hero-content">

              <span class="testx-kicker">
                <i class="bi bi-clipboard2-check-fill"></i>
                NEET & JEE Test Series
              </span>

              <h1>
                Practice, Revision & Mock Tests for
                <span>Better Exam Performance</span>
              </h1>

              <p>
                Khadkeshwar NEET JEE Academy provides structured test series for NEET, JEE
                and Foundation students with chapter-wise tests, full syllabus mock tests,
                revision tests, performance review and doubt support after tests.
              </p>

              <div class="testx-hero-tags">
                <span><i class="bi bi-check-circle-fill"></i> Chapter-wise Tests</span>
                <span><i class="bi bi-check-circle-fill"></i> Full Mock Tests</span>
                <span><i class="bi bi-check-circle-fill"></i> Revision Tests</span>
                <span><i class="bi bi-check-circle-fill"></i> Performance Tracking</span>
              </div>

              <div class="testx-premium-stats">
                <div>
                  <strong>NEET</strong>
                  <span>Medical Test Series</span>
                </div>

                <div>
                  <strong>JEE</strong>
                  <span>Engineering Test Series</span>
                </div>

                <div>
                  <strong>Review</strong>
                  <span>Performance Guidance</span>
                </div>
              </div>

              <div class="testx-hero-actions">
                <button class="btn-main border-0" data-bs-toggle="modal" data-bs-target="#admissionModal">
                  Join Test Series
                  <i class="bi bi-arrow-right"></i>
                </button>

                <a href="{{ $telPrimary }}" class="testx-outline-btn">
                  <i class="bi bi-telephone-fill"></i>
                  Call Academy
                </a>
              </div>

            </div>
          </div>

          <div class="col-lg-5">
            <div class="testx-hero-panel">

              <div class="testx-hero-program-card">
                <div class="testx-main-icon">
                  <i class="bi bi-clipboard2-check-fill"></i>
                </div>

                <span>Exam Practice System</span>
                <h3>Test Series & Revision</h3>

                <p>
                  Designed to help students improve speed, accuracy, confidence and exam
                  readiness through regular tests and guided performance feedback.
                </p>

                <div class="testx-hero-mini-grid">
                  <div>
                    <i class="bi bi-journal-check"></i>
                    <strong>Chapter Tests</strong>
                    <small>Topic-wise practice</small>
                  </div>

                  <div>
                    <i class="bi bi-file-earmark-text-fill"></i>
                    <strong>Mock Tests</strong>
                    <small>Exam-style papers</small>
                  </div>

                  <div>
                    <i class="bi bi-graph-up-arrow"></i>
                    <strong>Tracking</strong>
                    <small>Performance review</small>
                  </div>
                </div>
              </div>

              <div class="testx-premium-trust">
                <div>
                  <i class="bi bi-arrow-repeat"></i>
                  <span>Revision Support</span>
                </div>

                <div>
                  <i class="bi bi-chat-dots-fill"></i>
                  <span>Doubt After Tests</span>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>

    </div>
  </section>
  <!-- HERO END -->


  <!-- OVERVIEW START -->
  <section class="testx-overview section-padding">
    <div class="container">

      <div class="row align-items-center g-5">

        <div class="col-lg-5">
          <div class="testx-intro-card" data-aos="fade-right">
            <span class="section-badge">
              <i class="bi bi-info-circle-fill"></i>
              Test Series Overview
            </span>

            <h2>Regular testing system for NEET, JEE and Foundation students.</h2>

            <p>
              Our test series helps students check preparation level, identify weak topics,
              improve speed and accuracy, revise important concepts and build exam confidence.
            </p>

            <div class="testx-highlight-box">
              <i class="bi bi-quote"></i>
              <div>
                <strong>Regular tests, revision and feedback help students improve exam performance.</strong>
                <span>Khadkeshwar NEET JEE Academy</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="testx-detail-grid" data-aos="fade-left">

            <div class="testx-detail-card">
              <i class="bi bi-heart-pulse-fill"></i>
              <h3>NEET Test Series</h3>
              <p>Biology, Physics and Chemistry tests with NEET-style practice and revision.</p>
            </div>

            <div class="testx-detail-card">
              <i class="bi bi-cpu-fill"></i>
              <h3>JEE Test Series</h3>
              <p>Physics, Chemistry and Mathematics practice with engineering entrance pattern.</p>
            </div>

            <div class="testx-detail-card">
              <i class="bi bi-journal-check"></i>
              <h3>Chapter-wise Tests</h3>
              <p>Topic and chapter-based tests to improve concept clarity and consistency.</p>
            </div>

            <div class="testx-detail-card">
              <i class="bi bi-file-earmark-text-fill"></i>
              <h3>Full Syllabus Mock Tests</h3>
              <p>Exam-style full mock papers to improve speed, accuracy and confidence.</p>
            </div>

            <div class="testx-detail-card">
              <i class="bi bi-arrow-repeat"></i>
              <h3>Revision Tests</h3>
              <p>Important chapter revision tests for better retention and weak topic improvement.</p>
            </div>

            <div class="testx-detail-card">
              <i class="bi bi-chat-dots-fill"></i>
              <h3>Doubt Support</h3>
              <p>Doubt clearing after tests to understand mistakes and improve performance.</p>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- OVERVIEW END -->


  <!-- TEST TYPES START -->
  <section class="testx-types section-padding">
    <div class="container">

      <div class="testx-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-grid-fill"></i>
          Test Series Types
        </span>

        <h2>Practice plans for different preparation stages.</h2>

        <p>
          Students get topic-wise practice, full syllabus tests, revision tests and performance guidance.
        </p>
      </div>

      <div class="testx-type-grid">

        <div class="testx-type-card featured" data-aos="fade-up" data-aos-delay="100">
          <div class="testx-type-icon">
            <i class="bi bi-heart-pulse-fill"></i>
          </div>

          <span>Medical Entrance</span>
          <h3>NEET Test Series</h3>
          <p>NEET-focused tests for Biology, Physics and Chemistry with chapter practice and mock papers.</p>

          <ul>
            <li><i class="bi bi-check-circle-fill"></i> Biology, Physics & Chemistry</li>
            <li><i class="bi bi-check-circle-fill"></i> NCERT-focused revision</li>
            <li><i class="bi bi-check-circle-fill"></i> Full mock tests</li>
            <li><i class="bi bi-check-circle-fill"></i> Performance feedback</li>
          </ul>

          <button class="testx-card-btn" data-bs-toggle="modal" data-bs-target="#admissionModal">
            Join NEET Test Series
            <i class="bi bi-arrow-right"></i>
          </button>
        </div>

        <div class="testx-type-card" data-aos="fade-up" data-aos-delay="180">
          <div class="testx-type-icon">
            <i class="bi bi-cpu-fill"></i>
          </div>

          <span>Engineering Entrance</span>
          <h3>JEE Test Series</h3>
          <p>JEE-focused tests for Physics, Chemistry and Mathematics with problem-solving practice.</p>

          <ul>
            <li><i class="bi bi-check-circle-fill"></i> Physics, Chemistry & Mathematics</li>
            <li><i class="bi bi-check-circle-fill"></i> Numerical practice</li>
            <li><i class="bi bi-check-circle-fill"></i> Speed and accuracy focus</li>
            <li><i class="bi bi-check-circle-fill"></i> Mock test analysis</li>
          </ul>

          <button class="testx-card-btn" data-bs-toggle="modal" data-bs-target="#admissionModal">
            Join JEE Test Series
            <i class="bi bi-arrow-right"></i>
          </button>
        </div>

        <div class="testx-type-card" data-aos="fade-up" data-aos-delay="260">
          <div class="testx-type-icon">
            <i class="bi bi-lightbulb-fill"></i>
          </div>

          <span>Early Preparation</span>
          <h3>Foundation Tests</h3>
          <p>Foundation-level tests to improve school concepts, study discipline and learning confidence.</p>

          <ul>
            <li><i class="bi bi-check-circle-fill"></i> Science and Mathematics</li>
            <li><i class="bi bi-check-circle-fill"></i> Concept-based practice</li>
            <li><i class="bi bi-check-circle-fill"></i> Revision and assignments</li>
            <li><i class="bi bi-check-circle-fill"></i> Study habit improvement</li>
          </ul>

          <button class="testx-card-btn" data-bs-toggle="modal" data-bs-target="#admissionModal">
            Join Foundation Tests
            <i class="bi bi-arrow-right"></i>
          </button>
        </div>

      </div>

    </div>
  </section>
  <!-- TEST TYPES END -->


  <!-- PROCESS START -->
  <section class="testx-process section-padding">
    <div class="testx-dark-grid"></div>

    <div class="container">

      <div class="testx-section-head light" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-diagram-3-fill"></i>
          Test Process
        </span>

        <h2>Simple test system with guidance after every performance check.</h2>

        <p>
          Students do not only give tests — they also get revision direction and improvement feedback.
        </p>
      </div>

      <div class="testx-process-grid">

        <div class="testx-process-card" data-aos="zoom-in" data-aos-delay="100">
          <span>01</span>
          <i class="bi bi-journal-bookmark-fill"></i>
          <h3>Prepare Chapter</h3>
          <p>Students revise concepts, formulas, NCERT points and practice questions.</p>
        </div>

        <div class="testx-process-card" data-aos="zoom-in" data-aos-delay="180">
          <span>02</span>
          <i class="bi bi-pencil-square"></i>
          <h3>Attempt Test</h3>
          <p>Chapter tests, revision tests and full mock tests are conducted regularly.</p>
        </div>

        <div class="testx-process-card" data-aos="zoom-in" data-aos-delay="260">
          <span>03</span>
          <i class="bi bi-graph-up-arrow"></i>
          <h3>Review Performance</h3>
          <p>Students understand score, accuracy, weak areas and improvement points.</p>
        </div>

        <div class="testx-process-card" data-aos="zoom-in" data-aos-delay="340">
          <span>04</span>
          <i class="bi bi-chat-dots-fill"></i>
          <h3>Doubt & Revision</h3>
          <p>After test feedback, students get doubt support and revision direction.</p>
        </div>

      </div>

    </div>
  </section>
  <!-- PROCESS END -->


  <!-- PERFORMANCE START -->
  <section class="testx-performance section-padding">
    <div class="container">

      <div class="row g-4 align-items-stretch">

        <div class="col-lg-7">
          <div class="testx-performance-main" data-aos="fade-right">
            <span class="section-badge">
              <i class="bi bi-graph-up-arrow"></i>
              Performance Tracking
            </span>

            <h2>Track weak topics, revision needs and exam readiness.</h2>

            <p>
              Test series helps students understand where they stand and what they need to improve.
              Regular feedback helps in better revision planning and preparation discipline.
            </p>

            <div class="testx-performance-tags">
              <span><i class="bi bi-check-circle-fill"></i> Score Review</span>
              <span><i class="bi bi-check-circle-fill"></i> Accuracy Check</span>
              <span><i class="bi bi-check-circle-fill"></i> Weak Topic Focus</span>
              <span><i class="bi bi-check-circle-fill"></i> Revision Planning</span>
            </div>
          </div>
        </div>

        <div class="col-lg-5">
          <div class="testx-guidance-card" data-aos="fade-left">
            <i class="bi bi-person-check-fill"></i>
            <h3>Personal Guidance After Tests</h3>
            <p>
              Our team guides students after tests so they can improve weak areas,
              revise smartly and build exam confidence.
            </p>

            <button class="btn-main border-0" data-bs-toggle="modal" data-bs-target="#admissionModal">
              Get Test Series Guidance
              <i class="bi bi-arrow-right"></i>
            </button>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- PERFORMANCE END -->


  <!-- FINAL CTA START -->
  <section class="testx-cta-section section-padding">
    <div class="container">

      <div class="testx-cta" data-aos="zoom-in">

        <div>
          <span>
            <i class="bi bi-mortarboard-fill"></i>
            Test Series {{ $admissionBadgeText }}
          </span>

          <h2>Start regular practice with NEET & JEE Test Series.</h2>

          <p>
            Contact Khadkeshwar Academy for test series details, revision plan,
            admission support and performance guidance.
          </p>
        </div>

        <div class="testx-cta-actions">
          <button class="btn-main border-0" data-bs-toggle="modal" data-bs-target="#admissionModal">
            Join Test Series
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
  <!-- FINAL CTA END -->

</main>

<!-- ========================= TEST SERIES PAGE END ========================== -->
@endsection