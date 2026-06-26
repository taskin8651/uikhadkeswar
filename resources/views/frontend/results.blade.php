@extends('frontend.master')
@section('content')


<!-- ========================= RESULTS PAGE START ========================== -->

<main class="resultx-page">

  <!-- HERO START -->
  <section class="resultx-hero">
    <div class="resultx-bg-grid"></div>
    <div class="resultx-orb resultx-orb-1"></div>
    <div class="resultx-orb resultx-orb-2"></div>
    <div class="resultx-orb resultx-orb-3"></div>

    <div class="container">

      <nav class="resultx-breadcrumb" data-aos="fade-up">
        <a href="{{ route('frontend.home') }}">
          <i class="bi bi-house-door-fill"></i>
          Home
        </a>
        <i class="bi bi-chevron-right"></i>
        <span>Results</span>
      </nav>

      <div class="resultx-hero-card" data-aos="fade-up">
        <div class="resultx-hero-shine"></div>

        <div class="row g-0 align-items-stretch">

          <div class="col-lg-7">
            <div class="resultx-hero-content">

              <span class="resultx-kicker">
                <i class="bi bi-trophy-fill"></i>
                Student Success & Academy Performance
              </span>

              <h1>
                Results, Achievements &
                <span>Student Success Stories</span>
              </h1>

              <p>
                Khadkeshwar NEET JEE Academy is committed to helping students build strong
                academic performance through quality coaching, personal guidance, regular
                test series, revision support and focused mentorship.
              </p>

              <div class="resultx-alert-note">
                <i class="bi bi-info-circle-fill"></i>
                <span>
                  Real student result data can be added or updated later. This page is designed with editable result cards and future-ready sections.
                </span>
              </div>

              <div class="resultx-hero-tags">
                <span><i class="bi bi-check-circle-fill"></i> NEET Achievements</span>
                <span><i class="bi bi-check-circle-fill"></i> JEE Achievements</span>
                <span><i class="bi bi-check-circle-fill"></i> Test Performance</span>
                <span><i class="bi bi-check-circle-fill"></i> Student Testimonials</span>
              </div>

              <div class="resultx-hero-actions">
                <button class="btn-main border-0" data-bs-toggle="modal" data-bs-target="#admissionModal">
                  Apply Now
                  <i class="bi bi-arrow-right"></i>
                </button>

                <a href="tel:+918856822032" class="resultx-outline-btn">
                  <i class="bi bi-telephone-fill"></i>
                  Call Now
                </a>
              </div>

            </div>
          </div>

          <div class="col-lg-5">
            <div class="resultx-hero-visual">

              <div class="resultx-score-card">
                <div class="resultx-score-top">
                  <div>
                    <span></span>
                    <span></span>
                    <span></span>
                  </div>
                  <strong>Result Dashboard</strong>
                </div>

                <div class="resultx-score-body">

                  <div class="resultx-rank-badge">
                    <i class="bi bi-award-fill"></i>
                    <div>
                      <strong>Top Performers</strong>
                      <span>Result section ready</span>
                    </div>
                  </div>

                  <div class="resultx-score-ring">
                    <div>
                      <strong>95%</strong>
                      <span>Practice Growth</span>
                    </div>
                  </div>

                  <div class="resultx-mini-stats">
                    <div>
                      <strong>NEET</strong>
                      <span>Medical Goals</span>
                    </div>
                    <div>
                      <strong>JEE</strong>
                      <span>Engineering Goals</span>
                    </div>
                  </div>

                  <div class="resultx-progress-list">
                    <div><span style="width: 88%;"></span></div>
                    <div><span style="width: 74%;"></span></div>
                    <div><span style="width: 92%;"></span></div>
                  </div>

                </div>
              </div>

              <div class="resultx-hero-info-row">
                <div class="resultx-info-card">
                  <i class="bi bi-graph-up-arrow"></i>
                  <div>
                    <strong>Performance</strong>
                    <span>Track improvement</span>
                  </div>
                </div>

                <div class="resultx-info-card">
                  <i class="bi bi-stars"></i>
                  <div>
                    <strong>Achievements</strong>
                    <span>Showcase success</span>
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


  <!-- RESULT HIGHLIGHTS START -->
  <section class="resultx-highlights section-padding">
    <div class="container">

      <div class="resultx-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-bar-chart-fill"></i>
          Result Highlights
        </span>

        <h2>Academic performance highlights that can be updated every year.</h2>

        <p>
          Use this section to display real result numbers, selected students, test performance
          and academy-level success data once available.
        </p>
      </div>

      <div class="resultx-highlight-grid">

        <div class="resultx-highlight-card" data-aos="fade-up" data-aos-delay="100">
          <i class="bi bi-trophy-fill"></i>
          <strong>Result Data</strong>
          <h3>Coming Soon</h3>
          <p>Final NEET/JEE result details can be updated here after confirmation.</p>
        </div>

        <div class="resultx-highlight-card featured" data-aos="fade-up" data-aos-delay="180">
          <i class="bi bi-person-check-fill"></i>
          <strong>Students</strong>
          <h3>Editable Cards</h3>
          <p>Ranker cards and student achievements can be managed easily later.</p>
        </div>

        <div class="resultx-highlight-card" data-aos="fade-up" data-aos-delay="260">
          <i class="bi bi-clipboard2-check-fill"></i>
          <strong>Test Series</strong>
          <h3>Performance Focus</h3>
          <p>Mock tests, revision tests and progress review help students improve.</p>
        </div>

        <div class="resultx-highlight-card" data-aos="fade-up" data-aos-delay="340">
          <i class="bi bi-stars"></i>
          <strong>Mentorship</strong>
          <h3>Guided Growth</h3>
          <p>Personal guidance helps students build confidence and consistency.</p>
        </div>

      </div>

    </div>
  </section>
  <!-- RESULT HIGHLIGHTS END -->


  <!-- ACHIEVEMENT CARDS START -->
  <section class="resultx-achievements section-padding">
    <div class="container">

      <div class="row g-5 align-items-center">

        <div class="col-lg-5">
          <div class="resultx-intro-card" data-aos="fade-right">
            <span class="section-badge">
              <i class="bi bi-award-fill"></i>
              Student Achievements
            </span>

            <h2>Achievement cards ready for student success updates.</h2>

            <p>
              This section is built for showing student achievements, scores, ranks,
              exam selections or special academic performance. If real data is not available
              now, placeholder cards can be replaced later.
            </p>

            <div class="resultx-highlight-box">
              <i class="bi bi-quote"></i>
              <div>
                <strong>Success comes from strong concepts, regular practice, revision and the right mentorship.</strong>
                <span>Khadkeshwar NEET JEE Academy</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="resultx-achievement-grid" data-aos="fade-left">

            <div class="resultx-achievement-card">
              <div class="resultx-student-avatar">
                <i class="bi bi-person-fill"></i>
              </div>

              <div>
                <span>NEET Aspirant</span>
                <h3>Student Name</h3>
                <p>Result details will be updated after official confirmation.</p>
              </div>

              <ul>
                <li><i class="bi bi-check-circle-fill"></i> Biology improvement</li>
                <li><i class="bi bi-check-circle-fill"></i> Regular mock practice</li>
                <li><i class="bi bi-check-circle-fill"></i> Personal guidance</li>
              </ul>
            </div>

            <div class="resultx-achievement-card active">
              <div class="resultx-student-avatar">
                <i class="bi bi-person-fill"></i>
              </div>

              <div>
                <span>JEE Aspirant</span>
                <h3>Student Name</h3>
                <p>Score, rank or selection details can be added here later.</p>
              </div>

              <ul>
                <li><i class="bi bi-check-circle-fill"></i> PCM practice</li>
                <li><i class="bi bi-check-circle-fill"></i> Chapter-wise tests</li>
                <li><i class="bi bi-check-circle-fill"></i> Performance review</li>
              </ul>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- ACHIEVEMENT CARDS END -->


  <!-- RANKER CARDS START -->
  <section class="resultx-rankers section-padding">
    <div class="container">

      <div class="resultx-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-trophy-fill"></i>
          Ranker Cards
        </span>

        <h2>Showcase toppers, rankers and selected students beautifully.</h2>

        <p>
          Add real student photo, name, exam type, score, rank and testimonial once results are available.
        </p>
      </div>

      @php
        $rankerDelays = [100, 180, 260, 340, 420, 500];
      @endphp

      @if(isset($resultRankers) && $resultRankers->count())
        <div class="resultx-ranker-grid">
          @foreach($resultRankers as $index => $ranker)
            <div class="resultx-ranker-card {{ $ranker->is_featured ? 'featured' : '' }}" data-aos="fade-up" data-aos-delay="{{ $rankerDelays[$index] ?? 100 }}">
              <div class="resultx-ranker-image">
                @if($ranker->getFirstMediaUrl('ranker_image'))
                  <img src="{{ $ranker->getFirstMediaUrl('ranker_image') }}" alt="{{ $ranker->student_name }}">
                @else
                  <i class="{{ $ranker->icon ?: 'bi bi-person-fill' }}"></i>
                @endif
                <span>{{ $ranker->exam_type }}</span>
              </div>

              <div class="resultx-ranker-content">
                <span>{{ $ranker->badge_text }}</span>
                <h3>{{ $ranker->student_name }}</h3>

                @if($ranker->description)
                  <p>{{ $ranker->description }}</p>
                @endif

                <div class="resultx-ranker-meta">
                  @if($ranker->meta_one_label || $ranker->meta_one_value)
                    <div>
                      <strong>{{ $ranker->meta_one_label }}</strong>
                      <small>{{ $ranker->meta_one_value }}</small>
                    </div>
                  @endif

                  @if($ranker->meta_two_label || $ranker->meta_two_value)
                    <div>
                      <strong>{{ $ranker->meta_two_label }}</strong>
                      <small>{{ $ranker->meta_two_value }}</small>
                    </div>
                  @endif
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @endif

    </div>
  </section>
  <!-- RANKER CARDS END -->


  <!-- YEAR-WISE RESULTS START -->
  <section class="resultx-yearwise section-padding">
    <div class="resultx-dark-grid"></div>

    <div class="container">

      <div class="resultx-section-head light" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-calendar2-check-fill"></i>
          Year-wise Results
        </span>

        <h2>Year-wise result section for future updates.</h2>

        <p>
          This section is designed so academy results can be added year by year in a clean format.
        </p>
      </div>

      <div class="resultx-year-grid">

        <div class="resultx-year-card" data-aos="zoom-in" data-aos-delay="100">
          <span>2026</span>
          <i class="bi bi-hourglass-split"></i>
          <h3>Upcoming Batch Results</h3>
          <p>Result details will be updated after the academic session and exam results.</p>
        </div>

        <div class="resultx-year-card" data-aos="zoom-in" data-aos-delay="180">
          <span>2025</span>
          <i class="bi bi-clipboard-data-fill"></i>
          <h3>Performance Records</h3>
          <p>Mock test, revision test and internal performance records can be added here.</p>
        </div>

        <div class="resultx-year-card" data-aos="zoom-in" data-aos-delay="260">
          <span>Future</span>
          <i class="bi bi-graph-up-arrow"></i>
          <h3>Scalable Result System</h3>
          <p>More yearly result cards can be added easily as academy performance grows.</p>
        </div>

      </div>

    </div>
  </section>
  <!-- YEAR-WISE RESULTS END -->


  <!-- TESTIMONIALS START -->
  <section class="resultx-testimonials section-padding">
    <div class="container">

      <div class="resultx-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-chat-quote-fill"></i>
          Student & Parent Testimonials
        </span>

        <h2>Trust stories from students and parents.</h2>

        <p>
          Replace these placeholder reviews with real student or parent testimonials once available.
        </p>
      </div>

      @php
        $testimonialDelays = [100, 180, 260, 340, 420, 500];
      @endphp

      @if(isset($resultTestimonials) && $resultTestimonials->count())
        <div class="resultx-testimonial-grid">
          @foreach($resultTestimonials as $index => $testimonial)
            <div class="resultx-testimonial-card {{ $testimonial->is_featured ? 'featured' : '' }}" data-aos="fade-up" data-aos-delay="{{ $testimonialDelays[$index] ?? 100 }}">
              <div class="resultx-stars">
                @for($star = 1; $star <= (int) $testimonial->rating; $star++)
                  <i class="bi bi-star-fill"></i>
                @endfor
              </div>

              <p>
                "{{ $testimonial->review_text }}"
              </p>

              <div class="resultx-reviewer">
                <div><i class="bi bi-person-fill"></i></div>
                <div>
                  <strong>{{ $testimonial->reviewer_name }}</strong>
                  @if($testimonial->reviewer_type)
                    <span>{{ $testimonial->reviewer_type }}</span>
                  @endif
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @else
      <div class="resultx-testimonial-grid">

        <div class="resultx-testimonial-card" data-aos="fade-up" data-aos-delay="100">
          <div class="resultx-stars">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
          </div>

          <p>
            “The academy focuses on regular practice, doubt support and personal guidance.
            This type of support helps students stay consistent.”
          </p>

          <div class="resultx-reviewer">
            <div><i class="bi bi-person-fill"></i></div>
            <div>
              <strong>Student Review</strong>
              <span>NEET / JEE Aspirant</span>
            </div>
          </div>
        </div>

        <div class="resultx-testimonial-card featured" data-aos="fade-up" data-aos-delay="180">
          <div class="resultx-stars">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
          </div>

          <p>
            “Personal mentoring and test analysis are very important for competitive exam
            preparation. The academy’s approach is student-focused.”
          </p>

          <div class="resultx-reviewer">
            <div><i class="bi bi-person-fill"></i></div>
            <div>
              <strong>Parent Review</strong>
              <span>Student Parent</span>
            </div>
          </div>
        </div>

        <div class="resultx-testimonial-card" data-aos="fade-up" data-aos-delay="260">
          <div class="resultx-stars">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
          </div>

          <p>
            “A good result journey starts with strong concepts, revision and regular tests.
            The academy gives direction for focused preparation.”
          </p>

          <div class="resultx-reviewer">
            <div><i class="bi bi-person-fill"></i></div>
            <div>
              <strong>Academic Feedback</strong>
              <span>Foundation Student</span>
            </div>
          </div>
        </div>

      </div>
      @endif

    </div>
  </section>
  <!-- TESTIMONIALS END -->


  <!-- ADMISSION CTA START -->
  <section class="resultx-cta-section section-padding">
    <div class="container">

      <div class="resultx-cta" data-aos="zoom-in">

        <div>
          <span>
            <i class="bi bi-mortarboard-fill"></i>
            Admission Open 2026
          </span>

          <h2>Start your NEET & JEE preparation with result-focused guidance.</h2>

          <p>
            Join Khadkeshwar Academy for quality coaching, regular tests, personal guidance,
            revision support and a student-focused learning environment.
          </p>
        </div>

        <div class="resultx-cta-actions">
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
  <!-- ADMISSION CTA END -->

</main>

<!-- ========================= RESULTS PAGE END ========================== -->
@endsection
