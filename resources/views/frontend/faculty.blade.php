@extends('frontend.master')
@section('content')

<!-- ========================= FACULTY PAGE START ========================== -->

<main class="facultyx-page">

  <!-- HERO START -->
  <section class="facultyx-hero">
    <div class="facultyx-bg-grid"></div>
    <div class="facultyx-orb facultyx-orb-1"></div>
    <div class="facultyx-orb facultyx-orb-2"></div>
    <div class="facultyx-orb facultyx-orb-3"></div>

    <div class="container">

      <nav class="facultyx-breadcrumb" data-aos="fade-up">
        <a href="index.html">
          <i class="bi bi-house-door-fill"></i>
          Home
        </a>
        <i class="bi bi-chevron-right"></i>
        <span>Faculty</span>
      </nav>

      <div class="facultyx-hero-card" data-aos="fade-up">
        <div class="facultyx-hero-shine"></div>

        <div class="row g-0 align-items-stretch">

          <div class="col-lg-7">
            <div class="facultyx-hero-content">

              <span class="facultyx-kicker">
                <i class="bi bi-person-workspace"></i>
                Experienced Faculty & Mentors
              </span>

              <h1>
                Learn from teachers who guide
                <span>NEET & JEE success journeys.</span>
              </h1>

              <p>
                Khadkeshwar NEET JEE Academy focuses on strong concept clarity, personal
                guidance, regular practice, revision support and student-focused mentorship
                for NEET, JEE and Foundation aspirants.
              </p>

              <div class="facultyx-alert-note">
                <i class="bi bi-info-circle-fill"></i>
                <span>
                  Faculty profiles can be updated later with real teacher photos, qualifications, experience and subject details.
                </span>
              </div>

              <div class="facultyx-hero-tags">
                <span><i class="bi bi-check-circle-fill"></i> Concept Clarity</span>
                <span><i class="bi bi-check-circle-fill"></i> Doubt Support</span>
                <span><i class="bi bi-check-circle-fill"></i> Test Guidance</span>
                <span><i class="bi bi-check-circle-fill"></i> Personal Mentorship</span>
              </div>

              <div class="facultyx-hero-actions">
                <button class="btn-main border-0" data-bs-toggle="modal" data-bs-target="#admissionModal">
                  Apply Now
                  <i class="bi bi-arrow-right"></i>
                </button>

                <a href="tel:+918856822032" class="facultyx-outline-btn">
                  <i class="bi bi-telephone-fill"></i>
                  Call Now
                </a>
              </div>

            </div>
          </div>

          <div class="col-lg-5">
            <div class="facultyx-hero-visual">

              <div class="facultyx-teacher-board">
                <div class="facultyx-board-head">
                  <div>
                    <span></span>
                    <span></span>
                    <span></span>
                  </div>
                  <strong>Faculty System</strong>
                </div>

                <div class="facultyx-board-body">

                  <div class="facultyx-teacher-main">
                    <div class="facultyx-teacher-avatar">
                      <i class="bi bi-person-video3"></i>
                    </div>
                    <div>
                      <span>Academic Mentor</span>
                      <h3>Expert Subject Faculty</h3>
                      <p>NEET, JEE & Foundation Guidance</p>
                    </div>
                  </div>

                  <div class="facultyx-subject-list">
                    <div>
                      <i class="bi bi-heart-pulse-fill"></i>
                      <strong>Biology</strong>
                      <span>NEET Focus</span>
                    </div>

                    <div>
                      <i class="bi bi-lightning-charge-fill"></i>
                      <strong>Physics</strong>
                      <span>Concept + Numericals</span>
                    </div>

                    <div>
                      <i class="bi bi-droplet-fill"></i>
                      <strong>Chemistry</strong>
                      <span>Theory + Practice</span>
                    </div>

                    <div>
                      <i class="bi bi-calculator-fill"></i>
                      <strong>Maths</strong>
                      <span>JEE Foundation</span>
                    </div>
                  </div>

                </div>
              </div>

              <div class="facultyx-hero-info-row">
                <div class="facultyx-info-card">
                  <i class="bi bi-clipboard2-check-fill"></i>
                  <div>
                    <strong>Regular Tests</strong>
                    <span>Performance review</span>
                  </div>
                </div>

                <div class="facultyx-info-card">
                  <i class="bi bi-chat-dots-fill"></i>
                  <div>
                    <strong>Doubt Support</strong>
                    <span>Personal guidance</span>
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


  <!-- FACULTY HIGHLIGHTS START -->
  <section class="facultyx-highlights section-padding">
    <div class="container">

      <div class="facultyx-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-stars"></i>
          Faculty Highlights
        </span>

        <h2>Teachers focused on clarity, discipline and exam-oriented preparation.</h2>

        <p>
          Our faculty approach supports students with subject clarity, guided practice,
          regular revision, doubt solving and personal academic monitoring.
        </p>
      </div>

      <div class="facultyx-highlight-grid">

        <div class="facultyx-highlight-card" data-aos="fade-up" data-aos-delay="100">
          <i class="bi bi-book-half"></i>
          <h3>Concept-Based Teaching</h3>
          <p>Classes focus on building strong concepts before moving to exam-level questions.</p>
        </div>

        <div class="facultyx-highlight-card featured" data-aos="fade-up" data-aos-delay="180">
          <i class="bi bi-person-check-fill"></i>
          <h3>Personal Guidance</h3>
          <p>Students receive personal attention, mentorship and academic direction.</p>
        </div>

        <div class="facultyx-highlight-card" data-aos="fade-up" data-aos-delay="260">
          <i class="bi bi-clipboard-data-fill"></i>
          <h3>Test-Based Improvement</h3>
          <p>Regular tests help identify weak topics and improve exam confidence.</p>
        </div>

        <div class="facultyx-highlight-card" data-aos="fade-up" data-aos-delay="340">
          <i class="bi bi-people-fill"></i>
          <h3>Rural-First Support</h3>
          <p>Teaching is designed to support students from rural and semi-urban backgrounds.</p>
        </div>

      </div>

    </div>
  </section>
  <!-- FACULTY HIGHLIGHTS END -->


  <!-- FACULTY TEAM START -->
  <section class="facultyx-team section-padding">
    <div class="container">

      <div class="facultyx-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-person-badge-fill"></i>
          Our Faculty Team
        </span>

        <h2>Subject-wise faculty cards ready for real teacher details.</h2>

        <p>
          Replace these placeholder profiles with real faculty name, photo, qualification,
          subject, experience and short teaching message.
        </p>
      </div>

      @php
        $facultyDelays = [100, 180, 260, 340, 420, 500, 580, 660];
      @endphp

      @if(isset($facultyMembers) && $facultyMembers->count())
      <div class="facultyx-team-grid">
        @foreach($facultyMembers as $index => $member)
          <div class="facultyx-teacher-card {{ $member->is_active ? 'active' : '' }}" data-aos="fade-up" data-aos-delay="{{ $facultyDelays[$index] ?? 100 }}">
            <div class="facultyx-teacher-img">
              <img src="{{ $member->imageUrl() ?: asset('assets/img/faculty-1.jpg') }}" alt="{{ $member->image_alt ?: $member->subject . ' at Khadkeshwar Academy' }}" loading="lazy">
              @if($member->badge)
                <span>{{ $member->badge }}</span>
              @endif
            </div>

            <div class="facultyx-teacher-content">
              <span class="facultyx-subject">{{ $member->subject }}</span>
              <h3>{{ $member->name }}</h3>

              @if($member->description)
                <p>{{ $member->description }}</p>
              @endif

              <ul>
                @foreach([$member->point_one, $member->point_two, $member->point_three] as $point)
                  @if($point)
                    <li><i class="bi bi-check-circle-fill"></i> {{ $point }}</li>
                  @endif
                @endforeach
              </ul>
            </div>
          </div>
        @endforeach
      </div>
      @else
      <div class="facultyx-team-grid">

        <!-- FACULTY 01 -->
        <div class="facultyx-teacher-card" data-aos="fade-up" data-aos-delay="100">
          <div class="facultyx-teacher-img">
            <img src="assets/img/faculty-1.jpg" alt="Biology faculty at Khadkeshwar Academy" loading="lazy">
            <span>NEET</span>
          </div>

          <div class="facultyx-teacher-content">
            <span class="facultyx-subject">Biology Faculty</span>
            <h3>Faculty Name</h3>
            <p>
              Focused on NCERT clarity, diagrams, concept revision and NEET Biology practice.
            </p>

            <ul>
              <li><i class="bi bi-check-circle-fill"></i> Botany & Zoology Support</li>
              <li><i class="bi bi-check-circle-fill"></i> NCERT-Based Preparation</li>
              <li><i class="bi bi-check-circle-fill"></i> Revision & Test Guidance</li>
            </ul>
          </div>
        </div>

        <!-- FACULTY 02 -->
        <div class="facultyx-teacher-card active" data-aos="fade-up" data-aos-delay="180">
          <div class="facultyx-teacher-img">
            <img src="assets/img/faculty-2.jpg" alt="Physics faculty at Khadkeshwar Academy" loading="lazy">
            <span>NEET / JEE</span>
          </div>

          <div class="facultyx-teacher-content">
            <span class="facultyx-subject">Physics Faculty</span>
            <h3>Faculty Name</h3>
            <p>
              Helps students understand concepts, formulas, numericals and application-based questions.
            </p>

            <ul>
              <li><i class="bi bi-check-circle-fill"></i> Concept + Numerical Practice</li>
              <li><i class="bi bi-check-circle-fill"></i> Doubt Solving Sessions</li>
              <li><i class="bi bi-check-circle-fill"></i> Mock Test Improvement</li>
            </ul>
          </div>
        </div>

        <!-- FACULTY 03 -->
        <div class="facultyx-teacher-card" data-aos="fade-up" data-aos-delay="260">
          <div class="facultyx-teacher-img">
            <img src="assets/img/faculty-3.jpg" alt="Chemistry faculty at Khadkeshwar Academy" loading="lazy">
            <span>NEET / JEE</span>
          </div>

          <div class="facultyx-teacher-content">
            <span class="facultyx-subject">Chemistry Faculty</span>
            <h3>Faculty Name</h3>
            <p>
              Covers Physical, Organic and Inorganic Chemistry with regular practice and revision.
            </p>

            <ul>
              <li><i class="bi bi-check-circle-fill"></i> Organic Reaction Practice</li>
              <li><i class="bi bi-check-circle-fill"></i> Physical Chemistry Numericals</li>
              <li><i class="bi bi-check-circle-fill"></i> Inorganic Revision</li>
            </ul>
          </div>
        </div>

        <!-- FACULTY 04 -->
        <div class="facultyx-teacher-card" data-aos="fade-up" data-aos-delay="340">
          <div class="facultyx-teacher-img">
            <img src="assets/img/faculty-4.jpg" alt="Mathematics faculty at Khadkeshwar Academy" loading="lazy">
            <span>JEE</span>
          </div>

          <div class="facultyx-teacher-content">
            <span class="facultyx-subject">Mathematics Faculty</span>
            <h3>Faculty Name</h3>
            <p>
              Supports JEE and Foundation students with formulas, problem solving and practice plans.
            </p>

            <ul>
              <li><i class="bi bi-check-circle-fill"></i> JEE Problem Practice</li>
              <li><i class="bi bi-check-circle-fill"></i> Formula Revision</li>
              <li><i class="bi bi-check-circle-fill"></i> Step-by-Step Solutions</li>
            </ul>
          </div>
        </div>

        <!-- FACULTY 05 -->
        <div class="facultyx-teacher-card" data-aos="fade-up" data-aos-delay="420">
          <div class="facultyx-teacher-img">
            <img src="assets/img/faculty-5.jpg" alt="Foundation faculty at Khadkeshwar Academy" loading="lazy">
            <span>Foundation</span>
          </div>

          <div class="facultyx-teacher-content">
            <span class="facultyx-subject">Foundation Faculty</span>
            <h3>Faculty Name</h3>
            <p>
              Builds early academic base for students preparing for future NEET/JEE competition.
            </p>

            <ul>
              <li><i class="bi bi-check-circle-fill"></i> Basic Concept Building</li>
              <li><i class="bi bi-check-circle-fill"></i> School + Competitive Support</li>
              <li><i class="bi bi-check-circle-fill"></i> Regular Practice Habit</li>
            </ul>
          </div>
        </div>

        <!-- FACULTY 06 -->
        <div class="facultyx-teacher-card active" data-aos="fade-up" data-aos-delay="500">
          <div class="facultyx-teacher-img">
            <img src="assets/img/faculty-6.jpg" alt="Academic mentor at Khadkeshwar Academy" loading="lazy">
            <span>Mentor</span>
          </div>

          <div class="facultyx-teacher-content">
            <span class="facultyx-subject">Academic Mentor</span>
            <h3>Faculty Name</h3>
            <p>
              Guides students with study planning, discipline, revision tracking and confidence building.
            </p>

            <ul>
              <li><i class="bi bi-check-circle-fill"></i> Study Plan Support</li>
              <li><i class="bi bi-check-circle-fill"></i> Progress Monitoring</li>
              <li><i class="bi bi-check-circle-fill"></i> Parent/Student Guidance</li>
            </ul>
          </div>
        </div>

      </div>
      @endif

    </div>
  </section>
  <!-- FACULTY TEAM END -->


  <!-- TEACHING APPROACH START -->
  <section class="facultyx-approach section-padding">
    <div class="facultyx-dark-grid"></div>

    <div class="container">

      <div class="facultyx-section-head light" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-diagram-3-fill"></i>
          Teaching Approach
        </span>

        <h2>Our faculty system is built around student improvement.</h2>

        <p>
          From classroom teaching to test analysis, every step is designed to help students
          build confidence and improve performance.
        </p>
      </div>

      <div class="facultyx-approach-grid">

        <div class="facultyx-approach-card" data-aos="zoom-in" data-aos-delay="100">
          <span>01</span>
          <i class="bi bi-easel2-fill"></i>
          <h3>Classroom Teaching</h3>
          <p>Topic-wise explanation with simple language, examples and exam-focused direction.</p>
        </div>

        <div class="facultyx-approach-card" data-aos="zoom-in" data-aos-delay="180">
          <span>02</span>
          <i class="bi bi-pencil-square"></i>
          <h3>Practice & Assignments</h3>
          <p>Regular questions and assignments help students improve speed and accuracy.</p>
        </div>

        <div class="facultyx-approach-card" data-aos="zoom-in" data-aos-delay="260">
          <span>03</span>
          <i class="bi bi-chat-dots-fill"></i>
          <h3>Doubt Solving</h3>
          <p>Doubt support helps students clear confusion and strengthen weak topics.</p>
        </div>

        <div class="facultyx-approach-card" data-aos="zoom-in" data-aos-delay="340">
          <span>04</span>
          <i class="bi bi-clipboard2-check-fill"></i>
          <h3>Test Review</h3>
          <p>Test performance review helps students understand mistakes and improve planning.</p>
        </div>

      </div>

    </div>
  </section>
  <!-- TEACHING APPROACH END -->


  <!-- MENTORSHIP START -->
  <section class="facultyx-mentorship section-padding">
    <div class="container">

      <div class="row g-5 align-items-center">

        <div class="col-lg-6">
          <div class="facultyx-mentor-card" data-aos="fade-right">
            <span class="section-badge">
              <i class="bi bi-person-heart"></i>
              Student Mentorship
            </span>

            <h2>Personal mentorship for NEET, JEE and Foundation students.</h2>

            <p>
              The faculty team supports students not only with subjects but also with study
              discipline, revision planning, regular assessment and motivation.
            </p>

            <div class="facultyx-mentor-points">
              <div>
                <i class="bi bi-check2-circle"></i>
                <span>Individual performance tracking</span>
              </div>

              <div>
                <i class="bi bi-check2-circle"></i>
                <span>Weak topic identification through tests</span>
              </div>

              <div>
                <i class="bi bi-check2-circle"></i>
                <span>Revision planning and academic guidance</span>
              </div>

              <div>
                <i class="bi bi-check2-circle"></i>
                <span>Parent and student communication support</span>
              </div>
            </div>

          </div>
        </div>

        <div class="col-lg-6">
          <div class="facultyx-mentor-dashboard" data-aos="fade-left">

            <div class="facultyx-dashboard-head">
              <strong>Mentorship Dashboard</strong>
              <span>Student Growth Plan</span>
            </div>

            <div class="facultyx-dashboard-row">
              <div>
                <i class="bi bi-graph-up-arrow"></i>
                <strong>Progress</strong>
                <span>Regular Review</span>
              </div>

              <div>
                <i class="bi bi-bullseye"></i>
                <strong>Targets</strong>
                <span>Weekly Goals</span>
              </div>
            </div>

            <div class="facultyx-progress-wrap">
              <div>
                <span>Concept Clarity</span>
                <strong>88%</strong>
              </div>
              <div class="facultyx-progress"><span style="width:88%;"></span></div>

              <div>
                <span>Test Practice</span>
                <strong>76%</strong>
              </div>
              <div class="facultyx-progress"><span style="width:76%;"></span></div>

              <div>
                <span>Revision Consistency</span>
                <strong>92%</strong>
              </div>
              <div class="facultyx-progress"><span style="width:92%;"></span></div>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- MENTORSHIP END -->


  <!-- CTA START -->
  <section class="facultyx-cta-section section-padding">
    <div class="container">

      <div class="facultyx-cta" data-aos="zoom-in">

        <div>
          <span>
            <i class="bi bi-mortarboard-fill"></i>
            Admission Open 2026
          </span>

          <h2>Study with experienced faculty and structured mentorship.</h2>

          <p>
            Join Khadkeshwar NEET JEE Academy for quality coaching, personal guidance,
            test series support and focused exam preparation.
          </p>
        </div>

        <div class="facultyx-cta-actions">
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
  <!-- CTA END -->

</main>

<!-- ========================= FACULTY PAGE END ========================== -->
@endsection
