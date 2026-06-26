
@extends('frontend.master')
@section('content')



<!-- ========================= JEE PROGRAM PAGE START ========================== -->

<main class="jeex-page">

  <!-- HERO START -->
  <section class="jeex-hero">
    <div class="jeex-bg-grid"></div>
    <div class="jeex-orb jeex-orb-1"></div>
    <div class="jeex-orb jeex-orb-2"></div>
    <div class="jeex-orb jeex-orb-3"></div>

    <div class="container">

      <nav class="jeex-breadcrumb" data-aos="fade-up">
        <a href="{{ route('frontend.home') }}">
          <i class="bi bi-house-door-fill"></i>
          Home
        </a>
        <i class="bi bi-chevron-right"></i>
        <a href="{{ route('frontend.courses') }}">Courses</a>
        <i class="bi bi-chevron-right"></i>
        <span>JEE Program</span>
      </nav>

      <div class="jeex-hero-card" data-aos="fade-up">
        <div class="jeex-hero-shine"></div>

        <div class="row g-0 align-items-stretch">

          <div class="col-lg-7">
            <div class="jeex-hero-content">

              <span class="jeex-kicker">
                <i class="bi bi-cpu-fill"></i>
                JEE Engineering Entrance Program
              </span>

              <h1>
                JEE Preparation for Future
                <span>Engineering Aspirants</span>
              </h1>

              <p>
                Khadkeshwar NEET JEE Academy offers structured JEE preparation for students
                targeting engineering entrance exams with strong Physics, Chemistry and
                Mathematics concepts, problem-solving practice, mock tests, revision and
                personal mentoring.
              </p>

              <div class="jeex-hero-tags">
                <span><i class="bi bi-check-circle-fill"></i> Physics</span>
                <span><i class="bi bi-check-circle-fill"></i> Chemistry</span>
                <span><i class="bi bi-check-circle-fill"></i> Mathematics</span>
                <span><i class="bi bi-check-circle-fill"></i> Mock Tests</span>
              </div>

              <div class="jeex-premium-stats">
                <div>
                  <strong>PCM</strong>
                  <span>Subject Focus</span>
                </div>

                <div>
                  <strong>11th / 12th</strong>
                  <span>Eligible Students</span>
                </div>

                <div>
                  <strong>Tests</strong>
                  <span>Practice & Revision</span>
                </div>
              </div>

              <div class="jeex-hero-actions">
                <button class="btn-main border-0" data-bs-toggle="modal" data-bs-target="#admissionModal">
                  Apply for Admission
                  <i class="bi bi-arrow-right"></i>
                </button>

                <a href="tel:+918856822032" class="jeex-outline-btn">
                  <i class="bi bi-telephone-fill"></i>
                  Call Academy
                </a>
              </div>

            </div>
          </div>

          <div class="col-lg-5">
            <div class="jeex-hero-panel">

              <div class="jeex-hero-program-card">
                <div class="jeex-main-icon">
                  <i class="bi bi-cpu-fill"></i>
                </div>

                <span>Engineering Entrance</span>
                <h3>JEE Program</h3>

                <p>
                  Built for aspirants who need concept clarity, speed, accuracy,
                  numerical practice, revision planning and personal academic guidance.
                </p>

                <div class="jeex-hero-mini-grid">
                  <div>
                    <i class="bi bi-lightning-charge-fill"></i>
                    <strong>Physics</strong>
                    <small>Concept + Numericals</small>
                  </div>

                  <div>
                    <i class="bi bi-droplet-fill"></i>
                    <strong>Chemistry</strong>
                    <small>Physical / Organic / Inorganic</small>
                  </div>

                  <div>
                    <i class="bi bi-calculator-fill"></i>
                    <strong>Mathematics</strong>
                    <small>Problem Solving</small>
                  </div>
                </div>
              </div>

              <div class="jeex-premium-trust">
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
  <!-- HERO END -->


  <!-- COURSE OVERVIEW START -->
  <section class="jeex-overview section-padding">
    <div class="container">

      <div class="row align-items-center g-5">

        <div class="col-lg-5">
          <div class="jeex-intro-card" data-aos="fade-right">
            <span class="section-badge">
              <i class="bi bi-info-circle-fill"></i>
              Course Overview
            </span>

            <h2>Complete JEE preparation with focused PCM learning.</h2>

            <p>
              The JEE Program is designed for engineering aspirants who want strong
              foundation in Physics, Chemistry and Mathematics with continuous practice,
              chapter-wise tests, mock exams and guided revision.
            </p>

            <div class="jeex-highlight-box">
              <i class="bi bi-lightning-charge-fill"></i>
              <div>
                <strong>JEE preparation needs strong concepts, speed, accuracy and repeated problem practice.</strong>
                <span>Khadkeshwar NEET JEE Academy</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="jeex-detail-grid" data-aos="fade-left">

            <div class="jeex-detail-card">
              <i class="bi bi-person-plus-fill"></i>
              <h3>Who Can Join</h3>
              <p>Class 11, Class 12 and repeater students preparing for JEE engineering entrance.</p>
            </div>

            <div class="jeex-detail-card">
              <i class="bi bi-journal-bookmark-fill"></i>
              <h3>Subjects Covered</h3>
              <p>Physics, Chemistry and Mathematics with concept clarity and problem practice.</p>
            </div>

            <div class="jeex-detail-card">
              <i class="bi bi-person-video3"></i>
              <h3>Teaching Method</h3>
              <p>Classroom concepts, numerical practice, assignments, doubts and revision sessions.</p>
            </div>

            <div class="jeex-detail-card">
              <i class="bi bi-clipboard2-check-fill"></i>
              <h3>Test Series / Revision</h3>
              <p>Topic tests, chapter tests, full mock tests and exam-style practice.</p>
            </div>

            <div class="jeex-detail-card">
              <i class="bi bi-graph-up-arrow"></i>
              <h3>Performance Tracking</h3>
              <p>Regular feedback to identify weak topics and improve speed, accuracy and confidence.</p>
            </div>

            <div class="jeex-detail-card">
              <i class="bi bi-person-check-fill"></i>
              <h3>Personal Guidance</h3>
              <p>Study planning, motivation, doubt support and individual improvement guidance.</p>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- COURSE OVERVIEW END -->


  <!-- SUBJECTS START -->
  <section class="jeex-subjects section-padding">
    <div class="container">

      <div class="jeex-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-journal-text"></i>
          Subjects Covered
        </span>

        <h2>Strong preparation for Physics, Chemistry and Mathematics.</h2>

        <p>
          The course focuses on concept clarity, numerical practice, revision and test-based improvement.
        </p>
      </div>

      <div class="jeex-subject-grid">

        <div class="jeex-subject-card" data-aos="fade-up" data-aos-delay="100">
          <div class="jeex-subject-icon">
            <i class="bi bi-lightning-charge-fill"></i>
          </div>

          <h3>Physics</h3>
          <p>Concept-based learning with formulas, numericals and application-based questions.</p>

          <ul>
            <li><i class="bi bi-check-circle-fill"></i> Formula clarity</li>
            <li><i class="bi bi-check-circle-fill"></i> Numerical practice</li>
            <li><i class="bi bi-check-circle-fill"></i> Chapter-wise tests</li>
          </ul>
        </div>

        <div class="jeex-subject-card featured" data-aos="fade-up" data-aos-delay="180">
          <div class="jeex-subject-icon">
            <i class="bi bi-droplet-fill"></i>
          </div>

          <h3>Chemistry</h3>
          <p>Physical, Organic and Inorganic Chemistry with topic-wise revision and practice.</p>

          <ul>
            <li><i class="bi bi-check-circle-fill"></i> Physical Chemistry problems</li>
            <li><i class="bi bi-check-circle-fill"></i> Organic reaction clarity</li>
            <li><i class="bi bi-check-circle-fill"></i> Inorganic revision</li>
          </ul>
        </div>

        <div class="jeex-subject-card" data-aos="fade-up" data-aos-delay="260">
          <div class="jeex-subject-icon">
            <i class="bi bi-calculator-fill"></i>
          </div>

          <h3>Mathematics</h3>
          <p>Step-by-step problem solving, shortcut methods, practice sets and mock test preparation.</p>

          <ul>
            <li><i class="bi bi-check-circle-fill"></i> Concept building</li>
            <li><i class="bi bi-check-circle-fill"></i> Problem solving speed</li>
            <li><i class="bi bi-check-circle-fill"></i> Practice assignments</li>
          </ul>
        </div>

      </div>

    </div>
  </section>
  <!-- SUBJECTS END -->


  <!-- TEACHING METHOD START -->
  <section class="jeex-method section-padding">
    <div class="jeex-dark-grid"></div>

    <div class="container">

      <div class="jeex-section-head light" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-person-video3"></i>
          Teaching Method
        </span>

        <h2>Structured learning system for serious JEE aspirants.</h2>

        <p>
          Students learn through classroom concepts, daily practice, doubts, assignments, revision and tests.
        </p>
      </div>

      <div class="jeex-method-grid">

        <div class="jeex-method-card" data-aos="zoom-in" data-aos-delay="100">
          <span>01</span>
          <i class="bi bi-book-fill"></i>
          <h3>Concept Classes</h3>
          <p>Strong subject understanding with clear explanation and examples.</p>
        </div>

        <div class="jeex-method-card" data-aos="zoom-in" data-aos-delay="180">
          <span>02</span>
          <i class="bi bi-pencil-square"></i>
          <h3>Practice Sessions</h3>
          <p>Daily question practice to improve speed, accuracy and confidence.</p>
        </div>

        <div class="jeex-method-card" data-aos="zoom-in" data-aos-delay="260">
          <span>03</span>
          <i class="bi bi-chat-dots-fill"></i>
          <h3>Doubt Support</h3>
          <p>Personal doubt clearing to remove confusion and strengthen concepts.</p>
        </div>

        <div class="jeex-method-card" data-aos="zoom-in" data-aos-delay="340">
          <span>04</span>
          <i class="bi bi-arrow-repeat"></i>
          <h3>Revision Planning</h3>
          <p>Regular revision for formulas, weak chapters and important topics.</p>
        </div>

      </div>

    </div>
  </section>
  <!-- TEACHING METHOD END -->


  <!-- COURSE CARDS START -->
  <section class="jeex-programs section-padding">
    <div class="container">

      <div class="jeex-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-grid-fill"></i>
          Other Academic Programs
        </span>

        <h2>Explore available academic programs at Khadkeshwar Academy.</h2>

        <p>
          Students can choose NEET, JEE or Foundation program according to their preparation goal.
        </p>
      </div>

      <div class="jeex-program-grid">

        <div class="jeex-program-card" data-aos="fade-up" data-aos-delay="100">
          <div class="jeex-program-top">
            <div class="jeex-program-icon">
              <i class="bi bi-heart-pulse-fill"></i>
            </div>
            <span>Medical Entrance</span>
          </div>

          <h3>NEET Course</h3>
          <p>Medical entrance preparation for Biology, Physics and Chemistry.</p>

          <ul>
            <li><i class="bi bi-check-circle-fill"></i> Biology, Physics & Chemistry</li>
            <li><i class="bi bi-check-circle-fill"></i> NCERT focus</li>
            <li><i class="bi bi-check-circle-fill"></i> Mock tests and revision</li>
          </ul>

          <a href="{{ route('frontend.neet-program') }}">
            View NEET Course
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <div class="jeex-program-card featured" data-aos="fade-up" data-aos-delay="180">
          <div class="jeex-program-top">
            <div class="jeex-program-icon">
              <i class="bi bi-cpu-fill"></i>
            </div>
            <span>Engineering Entrance</span>
          </div>

          <h3>JEE Course</h3>
          <p>Engineering entrance preparation for Physics, Chemistry and Mathematics.</p>

          <ul>
            <li><i class="bi bi-check-circle-fill"></i> Physics, Chemistry & Mathematics</li>
            <li><i class="bi bi-check-circle-fill"></i> Numerical practice</li>
            <li><i class="bi bi-check-circle-fill"></i> Personal guidance</li>
          </ul>

          <a href="#top">
            Current Program
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <div class="jeex-program-card" data-aos="fade-up" data-aos-delay="260">
          <div class="jeex-program-top">
            <div class="jeex-program-icon">
              <i class="bi bi-lightbulb-fill"></i>
            </div>
            <span>Early Preparation</span>
          </div>

          <h3>Foundation Course</h3>
          <p>Early preparation for students building strong future academic base.</p>

          <ul>
            <li><i class="bi bi-check-circle-fill"></i> Concept building</li>
            <li><i class="bi bi-check-circle-fill"></i> School + competitive base</li>
            <li><i class="bi bi-check-circle-fill"></i> Mentorship support</li>
          </ul>

          <a href="{{ route('frontend.foundation-course') }}">
            View Foundation
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>

      </div>

    </div>
  </section>
  <!-- COURSE CARDS END -->


  <!-- TEST SERIES START -->
  <section class="jeex-test-section section-padding">
    <div class="container">

      <div class="row g-4 align-items-stretch">

        <div class="col-lg-7">
          <div class="jeex-test-main" data-aos="fade-right">
            <span class="section-badge">
              <i class="bi bi-clipboard2-check-fill"></i>
              Test Series & Revision
            </span>

            <h2>Regular tests and revision support for better JEE performance.</h2>

            <p>
              Students get topic-wise tests, chapter-wise tests, mock tests, revision support
              and feedback to improve accuracy and confidence.
            </p>

            <div class="jeex-test-tags">
              <span><i class="bi bi-check-circle-fill"></i> Topic Tests</span>
              <span><i class="bi bi-check-circle-fill"></i> Mock Tests</span>
              <span><i class="bi bi-check-circle-fill"></i> Revision Sessions</span>
              <span><i class="bi bi-check-circle-fill"></i> Performance Feedback</span>
            </div>
          </div>
        </div>

        <div class="col-lg-5">
          <div class="jeex-guidance-card" data-aos="fade-left">
            <i class="bi bi-person-check-fill"></i>
            <h3>Personal Guidance</h3>
            <p>
              Individual mentoring helps students manage study planning, weak topics,
              test performance and exam confidence.
            </p>

            <button class="btn-main border-0" data-bs-toggle="modal" data-bs-target="#admissionModal">
              Get Admission Guidance
              <i class="bi bi-arrow-right"></i>
            </button>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- TEST SERIES END -->


  <!-- FINAL CTA START -->
  <section class="jeex-cta-section section-padding">
    <div class="container">

      <div class="jeex-cta" data-aos="zoom-in">

        <div>
          <span>
            <i class="bi bi-mortarboard-fill"></i>
            Admission Open 2026
          </span>

          <h2>Start your JEE preparation with the right guidance.</h2>

          <p>
            Contact Khadkeshwar Academy for JEE course details, fee concession support,
            test series and admission guidance.
          </p>
        </div>

        <div class="jeex-cta-actions">
          <button class="btn-main border-0" data-bs-toggle="modal" data-bs-target="#admissionModal">
            Apply Now
            <i class="bi bi-arrow-right"></i>
          </button>

          <a href="tel:+918856822032" class="btn-white">
            <i class="bi bi-telephone-fill"></i>
            Call Now
          </a>
        </div>

      </div>

    </div>
  </section>
  <!-- FINAL CTA END -->

</main>

<!-- ========================= JEE PROGRAM PAGE END ========================== -->

@endsection