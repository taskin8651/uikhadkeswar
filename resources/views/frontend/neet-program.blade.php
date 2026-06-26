


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
<!-- ========================= NEET PROGRAM / COURSES PAGE START ========================== -->

<main class="coursex-page">

  <!-- ================= HERO START ================= -->
  <section class="coursex-hero">
    <div class="coursex-bg-grid"></div>
    <div class="coursex-orb coursex-orb-1"></div>
    <div class="coursex-orb coursex-orb-2"></div>
    <div class="coursex-orb coursex-orb-3"></div>

    <div class="container">

      <nav class="coursex-breadcrumb" data-aos="fade-up">
        <a href="{{ route('frontend.home') }}">
          <i class="bi bi-house-door-fill"></i>
          Home
        </a>
        <i class="bi bi-chevron-right"></i>
        <a href="{{ route('frontend.courses') }}">Courses</a>
        <i class="bi bi-chevron-right"></i>
        <span>NEET Program</span>
      </nav>

      <div class="coursex-hero-card" data-aos="fade-up">
        <div class="coursex-hero-shine"></div>

        <div class="row g-0 align-items-stretch">

          <div class="col-lg-7">
            <div class="coursex-hero-content">

              <span class="coursex-kicker">
                <i class="bi bi-heart-pulse-fill"></i>
                NEET / JEE / Foundation Courses
              </span>

              <h1>
                Premium Academic Programs for
                <span>NEET, JEE & Foundation Students</span>
              </h1>

              <p>
                Khadkeshwar NEET JEE Academy offers structured academic programs for
                medical entrance, engineering entrance and early foundation preparation
                with classroom learning, regular tests, revision, doubt support and
                personal guidance.
              </p>

              <div class="coursex-hero-tags">
                <span><i class="bi bi-check-circle-fill"></i> NEET Course</span>
                <span><i class="bi bi-check-circle-fill"></i> JEE Course</span>
                <span><i class="bi bi-check-circle-fill"></i> Foundation Course</span>
                <span><i class="bi bi-check-circle-fill"></i> Test Series & Revision</span>
              </div>

              <div class="coursex-hero-stats">
                <div>
                  <strong>3</strong>
                  <span>Academic Programs</span>
                </div>

                <div>
                  <strong>50%</strong>
                  <span>Fee Concession</span>
                </div>

                <div>
                  <strong>PCB / PCM</strong>
                  <span>Subject Focus</span>
                </div>
              </div>

              <div class="coursex-hero-actions">
                <button class="btn-main border-0" data-bs-toggle="modal" data-bs-target="#admissionModal">
                  Apply for Admission
                  <i class="bi bi-arrow-right"></i>
                </button>

                <a href="{{ $telPrimary }}" class="coursex-outline-btn">
                  <i class="bi bi-telephone-fill"></i>
                  Call Academy
                </a>
              </div>

            </div>
          </div>

          <div class="col-lg-5">
            <div class="coursex-hero-panel">

              <div class="coursex-hero-program-card">
                <div class="coursex-main-icon">
                  <i class="bi bi-mortarboard-fill"></i>
                </div>

                <span>Available Programs</span>
                <h3>NEET • JEE • Foundation</h3>

                <p>
                  Designed for serious aspirants who need concept clarity, test practice,
                  revision planning and personal mentoring.
                </p>

                <div class="coursex-hero-mini-grid">

                  <div>
                    <i class="bi bi-heart-pulse-fill"></i>
                    <strong>NEET</strong>
                    <small>Medical Entrance</small>
                  </div>

                  <div>
                    <i class="bi bi-cpu-fill"></i>
                    <strong>JEE</strong>
                    <small>Engineering Entrance</small>
                  </div>

                  <div>
                    <i class="bi bi-lightbulb-fill"></i>
                    <strong>Foundation</strong>
                    <small>Early Preparation</small>
                  </div>

                </div>
              </div>

              <div class="coursex-hero-trust-row">
                <div>
                  <i class="bi bi-person-check-fill"></i>
                  <span>Personal Guidance</span>
                </div>

                <div>
                  <i class="bi bi-clipboard2-check-fill"></i>
                  <span>Mock Test Practice</span>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>

    </div>
  </section>
  <!-- ================= HERO END ================= -->


  <!-- ================= PROGRAM CARDS START ================= -->
  <section class="coursex-programs section-padding">
    <div class="container">

      <div class="coursex-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-grid-fill"></i>
          Academic Programs
        </span>

        <h2>Choose the right course for your competitive exam goal.</h2>

        <p>
          Each program includes course overview, eligibility, subjects, teaching method,
          test series, revision support, personal guidance and admission CTA.
        </p>
      </div>

      <div class="coursex-program-grid">

        <!-- NEET COURSE -->
        <div class="coursex-program-card featured" data-aos="fade-up" data-aos-delay="100">
          <div class="coursex-program-top">
            <div class="coursex-program-icon">
              <i class="bi bi-heart-pulse-fill"></i>
            </div>
            <span>Medical Entrance</span>
          </div>

          <h3>NEET Course</h3>

          <p>
            Complete NEET preparation for Biology, Physics and Chemistry with NCERT focus,
            concept clarity, mock tests, revision and doubt support.
          </p>

          <ul>
            <li><i class="bi bi-check-circle-fill"></i> Biology, Physics & Chemistry</li>
            <li><i class="bi bi-check-circle-fill"></i> Class 11, Class 12 & Repeaters</li>
            <li><i class="bi bi-check-circle-fill"></i> Chapter tests and mock tests</li>
            <li><i class="bi bi-check-circle-fill"></i> Personal guidance and revision</li>
          </ul>

          <a href="#neet-course-details">
            View NEET Details
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <!-- JEE COURSE -->
        <div class="coursex-program-card" data-aos="fade-up" data-aos-delay="180">
          <div class="coursex-program-top">
            <div class="coursex-program-icon">
              <i class="bi bi-cpu-fill"></i>
            </div>
            <span>Engineering Entrance</span>
          </div>

          <h3>JEE Course</h3>

          <p>
            JEE preparation for Physics, Chemistry and Mathematics with problem solving,
            concept building, practice tests and performance improvement.
          </p>

          <ul>
            <li><i class="bi bi-check-circle-fill"></i> Physics, Chemistry & Mathematics</li>
            <li><i class="bi bi-check-circle-fill"></i> Class 11, Class 12 & Repeaters</li>
            <li><i class="bi bi-check-circle-fill"></i> Mock tests and practice sessions</li>
            <li><i class="bi bi-check-circle-fill"></i> Doubt support and mentoring</li>
          </ul>

          <a href="#jee-course-details">
            View JEE Details
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <!-- FOUNDATION COURSE -->
        <div class="coursex-program-card" data-aos="fade-up" data-aos-delay="260">
          <div class="coursex-program-top">
            <div class="coursex-program-icon">
              <i class="bi bi-lightbulb-fill"></i>
            </div>
            <span>Early Preparation</span>
          </div>

          <h3>Foundation Course</h3>

          <p>
            Early preparation program for students who want to build strong academic
            base, study discipline and future NEET/JEE readiness.
          </p>

          <ul>
            <li><i class="bi bi-check-circle-fill"></i> Concept building from early level</li>
            <li><i class="bi bi-check-circle-fill"></i> School + competitive foundation</li>
            <li><i class="bi bi-check-circle-fill"></i> Practice, revision and tests</li>
            <li><i class="bi bi-check-circle-fill"></i> Personal mentorship support</li>
          </ul>

          <a href="#foundation-course-details">
            View Foundation Details
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

      </div>

    </div>
  </section>
  <!-- ================= PROGRAM CARDS END ================= -->


  <!-- ================= NEET DETAILS START ================= -->
  <section class="coursex-detail-section section-padding" id="neet-course-details">
    <div class="container">

      <div class="row align-items-center g-5">

        <div class="col-lg-5">
          <div class="coursex-detail-intro" data-aos="fade-right">
            <span class="section-badge">
              <i class="bi bi-heart-pulse-fill"></i>
              NEET Course
            </span>

            <h2>Medical entrance preparation with focused PCB learning.</h2>

            <p>
              NEET Course is designed for medical aspirants who want strong Biology,
              Physics and Chemistry preparation with regular practice, mock tests,
              revision and personal mentoring.
            </p>

            <div class="coursex-highlight-box">
              <i class="bi bi-quote"></i>
              <div>
                <strong>Strong NEET preparation needs NCERT clarity, regular tests and the right guidance.</strong>
                <span>Khadkeshwar NEET JEE Academy</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="coursex-detail-grid" data-aos="fade-left">

            <div class="coursex-detail-card">
              <i class="bi bi-info-circle-fill"></i>
              <h3>Course Overview</h3>
              <p>Complete NEET preparation with classroom teaching, practice, revision and test series.</p>
            </div>

            <div class="coursex-detail-card">
              <i class="bi bi-person-plus-fill"></i>
              <h3>Who Can Join</h3>
              <p>Class 11, Class 12 and repeater/dropper students preparing for NEET.</p>
            </div>

            <div class="coursex-detail-card">
              <i class="bi bi-journal-bookmark-fill"></i>
              <h3>Subjects Covered</h3>
              <p>Biology, Physics and Chemistry with NEET-focused chapter practice.</p>
            </div>

            <div class="coursex-detail-card">
              <i class="bi bi-person-video3"></i>
              <h3>Teaching Method</h3>
              <p>Concept explanation, daily practice, doubt clearing and topic-wise revision.</p>
            </div>

            <div class="coursex-detail-card">
              <i class="bi bi-clipboard2-check-fill"></i>
              <h3>Test Series / Revision</h3>
              <p>Chapter-wise tests, revision tests, mock papers and performance review.</p>
            </div>

            <div class="coursex-detail-card">
              <i class="bi bi-person-check-fill"></i>
              <h3>Personal Guidance</h3>
              <p>Study planning, motivation, doubt support and improvement guidance.</p>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- ================= NEET DETAILS END ================= -->


  <!-- ================= JEE DETAILS START ================= -->
  <section class="coursex-detail-section alt section-padding" id="jee-course-details">
    <div class="container">

      <div class="row align-items-center g-5">

        <div class="col-lg-7 order-lg-1 order-2">
          <div class="coursex-detail-grid" data-aos="fade-right">

            <div class="coursex-detail-card">
              <i class="bi bi-info-circle-fill"></i>
              <h3>Course Overview</h3>
              <p>JEE preparation with concept clarity, numerical practice and mock tests.</p>
            </div>

            <div class="coursex-detail-card">
              <i class="bi bi-person-plus-fill"></i>
              <h3>Who Can Join</h3>
              <p>Class 11, Class 12 and repeater students targeting engineering entrance.</p>
            </div>

            <div class="coursex-detail-card">
              <i class="bi bi-journal-bookmark-fill"></i>
              <h3>Subjects Covered</h3>
              <p>Physics, Chemistry and Mathematics with problem-solving practice.</p>
            </div>

            <div class="coursex-detail-card">
              <i class="bi bi-person-video3"></i>
              <h3>Teaching Method</h3>
              <p>Concept building, formula practice, question solving and doubt support.</p>
            </div>

            <div class="coursex-detail-card">
              <i class="bi bi-clipboard2-check-fill"></i>
              <h3>Test Series / Revision</h3>
              <p>Topic tests, mock tests, revision planning and performance tracking.</p>
            </div>

            <div class="coursex-detail-card">
              <i class="bi bi-person-check-fill"></i>
              <h3>Personal Guidance</h3>
              <p>Mentoring for study consistency, weak areas and exam confidence.</p>
            </div>

          </div>
        </div>

        <div class="col-lg-5 order-lg-2 order-1">
          <div class="coursex-detail-intro" data-aos="fade-left">
            <span class="section-badge">
              <i class="bi bi-cpu-fill"></i>
              JEE Course
            </span>

            <h2>Engineering entrance preparation with PCM practice.</h2>

            <p>
              JEE Course helps engineering aspirants prepare with concept clarity,
              problem solving, chapter-wise practice, mock tests, revision planning
              and personal guidance.
            </p>

            <div class="coursex-highlight-box">
              <i class="bi bi-lightning-charge-fill"></i>
              <div>
                <strong>JEE preparation needs strong concepts, speed, accuracy and regular problem practice.</strong>
                <span>Focused PCM Preparation</span>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- ================= JEE DETAILS END ================= -->


  <!-- ================= FOUNDATION DETAILS START ================= -->
  <section class="coursex-detail-section section-padding" id="foundation-course-details">
    <div class="container">

      <div class="row align-items-center g-5">

        <div class="col-lg-5">
          <div class="coursex-detail-intro" data-aos="fade-right">
            <span class="section-badge">
              <i class="bi bi-lightbulb-fill"></i>
              Foundation Course
            </span>

            <h2>Early preparation for future NEET & JEE goals.</h2>

            <p>
              Foundation Course is designed for students who want to build strong academic
              base, concept clarity, study discipline and early competitive exam readiness.
            </p>

            <div class="coursex-highlight-box">
              <i class="bi bi-stars"></i>
              <div>
                <strong>Early preparation builds confidence, discipline and long-term academic strength.</strong>
                <span>Foundation Learning Program</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="coursex-detail-grid" data-aos="fade-left">

            <div class="coursex-detail-card">
              <i class="bi bi-info-circle-fill"></i>
              <h3>Course Overview</h3>
              <p>Foundation-level academic support for future competitive exam preparation.</p>
            </div>

            <div class="coursex-detail-card">
              <i class="bi bi-person-plus-fill"></i>
              <h3>Who Can Join</h3>
              <p>School students who want early preparation for future NEET/JEE goals.</p>
            </div>

            <div class="coursex-detail-card">
              <i class="bi bi-journal-bookmark-fill"></i>
              <h3>Subjects Covered</h3>
              <p>Science, Mathematics and concept-based academic strengthening.</p>
            </div>

            <div class="coursex-detail-card">
              <i class="bi bi-person-video3"></i>
              <h3>Teaching Method</h3>
              <p>Concept clarity, guided practice, assignments and doubt support.</p>
            </div>

            <div class="coursex-detail-card">
              <i class="bi bi-clipboard2-check-fill"></i>
              <h3>Test Series / Revision</h3>
              <p>Regular practice tests, revision sessions and performance feedback.</p>
            </div>

            <div class="coursex-detail-card">
              <i class="bi bi-person-check-fill"></i>
              <h3>Personal Guidance</h3>
              <p>Mentorship for study discipline, confidence and learning habits.</p>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- ================= FOUNDATION DETAILS END ================= -->


  <!-- ================= TEST REVISION START ================= -->
  <section class="coursex-test-section section-padding">
    <div class="coursex-dark-grid"></div>

    <div class="container">

      <div class="coursex-section-head light" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-clipboard2-check-fill"></i>
          Test Series & Revision
        </span>

        <h2>Regular testing and revision support for better performance.</h2>

        <p>
          All academic programs include tests, revision support, doubt clearing and performance guidance.
        </p>
      </div>

      <div class="coursex-test-grid">

        <div class="coursex-test-card" data-aos="zoom-in" data-aos-delay="100">
          <span>01</span>
          <i class="bi bi-journal-check"></i>
          <h3>Chapter-wise Tests</h3>
          <p>Topic and chapter-based tests to track understanding and weak areas.</p>
        </div>

        <div class="coursex-test-card" data-aos="zoom-in" data-aos-delay="180">
          <span>02</span>
          <i class="bi bi-file-earmark-text-fill"></i>
          <h3>Full Mock Tests</h3>
          <p>Exam-style mock practice to improve speed, accuracy and confidence.</p>
        </div>

        <div class="coursex-test-card" data-aos="zoom-in" data-aos-delay="260">
          <span>03</span>
          <i class="bi bi-arrow-repeat"></i>
          <h3>Revision Sessions</h3>
          <p>Important concepts, weak topics and repeated revision support.</p>
        </div>

        <div class="coursex-test-card" data-aos="zoom-in" data-aos-delay="340">
          <span>04</span>
          <i class="bi bi-graph-up-arrow"></i>
          <h3>Performance Review</h3>
          <p>Feedback and guidance based on test performance and improvement areas.</p>
        </div>

      </div>

    </div>
  </section>
  <!-- ================= TEST REVISION END ================= -->


  <!-- ================= ADMISSION CTA START ================= -->
  <section class="coursex-cta-section section-padding">
    <div class="container">

      <div class="coursex-cta" data-aos="zoom-in">

        <div>
          <span>
            <i class="bi bi-mortarboard-fill"></i>
            {{ $admissionBadgeText }}
          </span>

          <h2>Start your NEET, JEE or Foundation preparation with the right guidance.</h2>

          <p>
            Contact Khadkeshwar Academy for course details, scholarship eligibility,
            fee concession and admission support.
          </p>
        </div>

        <div class="coursex-cta-actions">
          <button class="btn-main border-0" data-bs-toggle="modal" data-bs-target="#admissionModal">
            Apply Now
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
  <!-- ================= ADMISSION CTA END ================= -->

</main>

<!-- ========================= NEET PROGRAM / COURSES PAGE END ========================== -->

@endsection