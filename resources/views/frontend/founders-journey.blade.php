@extends('frontend.master')
@section('content')



<!-- ========================= FOUNDER JOURNEY PAGE START ========================== -->
<main class="fjx-founder-page">

  <!-- ================= HERO + BREADCRUMB START ================= -->
  <section class="fjx-hero-section">
    <div class="fjx-bg-grid"></div>
    <div class="fjx-orb fjx-orb-one"></div>
    <div class="fjx-orb fjx-orb-two"></div>
    <div class="fjx-orb fjx-orb-three"></div>

    <div class="container">

      <!-- Breadcrumb Start -->
      <nav class="fjx-breadcrumb" data-aos="fade-up">
        <a href="index.html">
          <i class="bi bi-house-door-fill"></i>
          Home
        </a>

        <i class="bi bi-chevron-right"></i>

        <a href="about-academy.html">About Us</a>

        <i class="bi bi-chevron-right"></i>

        <span>Founder’s Journey</span>
      </nav>
      <!-- Breadcrumb End -->

      <div class="fjx-hero-card" data-aos="fade-up">
        <div class="fjx-hero-pattern"></div>

        @if($founderSection)
    <div class="row g-0 align-items-stretch">

        <!-- Founder Image -->
        <div class="col-lg-5">
            <div class="fjx-photo-area">

                <div class="fjx-photo-card">
                    <img
                        src="{{ $founderSection->getFirstMediaUrl('founder_image') ?: asset('assets/img/vi.png') }}"
                        alt="{{ $founderSection->image_alt ?: 'Dr. Vitthal Nagare Founder of Khadkeshwar NEET JEE Academy' }}"
                    >

                    <div class="fjx-photo-glass"></div>

                    <div class="fjx-founder-id-card">
                        <span>OUR FOUNDER</span>

                        <h3>{{ $founderSection->founder_name ?: 'Dr. Vitthal Nagare' }}</h3>

                        @if($founderSection->qualification)
                            <p>({{ $founderSection->qualification }})</p>
                        @endif

                        @if($founderSection->designation)
                            <strong>{{ $founderSection->designation }}</strong>
                        @endif
                    </div>
                </div>

                <div class="fjx-photo-badge-row">
                    <div>
                        <i class="bi bi-award-fill"></i>
                        <span>Education Visionary</span>
                    </div>

                    <div>
                        <i class="bi bi-people-fill"></i>
                        <span>Rural Education Mission</span>
                    </div>
                </div>

            </div>
        </div>

        <!-- Hero Content -->
        <div class="col-lg-7">
            <div class="fjx-hero-content">

                <span class="fjx-top-badge">
                    <i class="bi bi-stars"></i>
                    Founder’s Journey
                </span>

                <h1>
                    {{ $founderSection->hero_title ?: 'A Rural Education Vision Led by' }}
                    <span>{{ $founderSection->hero_highlight_text ?: 'Dr. Vitthal Nagare' }}</span>
                </h1>

                @if($founderSection->hero_description)
                    <p>
                        {{ $founderSection->hero_description }}
                    </p>
                @endif

                <div class="fjx-hero-info-grid">

                    <div class="fjx-hero-info-card">
                        <i class="bi bi-mortarboard-fill"></i>
                        <span>Education</span>
                        <strong>{{ $founderSection->education_value ?: 'Ph.D. in Economics' }}</strong>
                    </div>

                    <div class="fjx-hero-info-card">
                        <i class="bi bi-person-badge-fill"></i>
                        <span>Designation</span>
                        <strong>{{ $founderSection->designation_value ?: 'Founder & Managing Director' }}</strong>
                    </div>

                    <div class="fjx-hero-info-card">
                        <i class="bi bi-building-check"></i>
                        <span>Company</span>
                        <strong>{{ $founderSection->company_value ?: 'Khadkeshwar Development Services Pvt Ltd' }}</strong>
                    </div>

                    <div class="fjx-hero-info-card">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>Location</span>
                        <strong>{{ $founderSection->location_value ?: 'Lonar, Maharashtra' }}</strong>
                    </div>

                </div>

                <div class="fjx-hero-actions">
                    <a href="tel:+918856822032" class="btn-main">
                        <i class="bi bi-telephone-fill"></i>
                        Call Admission Team
                    </a>

                    <a href="company-information.html" class="fjx-outline-btn">
                        Company Information
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

            </div>
        </div>

    </div>
@endif

      </div>

    </div>
  </section>
  <!-- ================= HERO + BREADCRUMB END ================= -->


  <!-- ================= STORY + COMPANY START ================= -->
  <section class="fjx-story-section section-padding">
    <div class="container">

      <div class="fjx-section-heading" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-journal-richtext"></i>
          Founder Story
        </span>

        <h2>From rural education challenges to a future-ready learning mission.</h2>

        <p>
          The founder’s journey is built on a strong belief that quality coaching,
          mentorship and technology should reach every deserving rural student.
        </p>
      </div>

      <div class="row g-4 align-items-stretch">

        <!-- Story -->
        @if($founderSection)
    <!-- Story -->
    <div class="col-lg-8">
        <div class="fjx-story-card" data-aos="fade-right">

            <div class="fjx-story-icon">
                <i class="bi bi-lightbulb-fill"></i>
            </div>

            @if($founderSection->story_title)
                <h3>{{ $founderSection->story_title }}</h3>
            @else
                <h3>A mission to bridge the education gap for rural students.</h3>
            @endif

            @if($founderSection->story_description)
                <div class="fjx-story-description">
                    {!! $founderSection->story_description !!}
                </div>
            @else
                <p>
                    Dr. Vitthal Nagare started Khadkeshwar Development Services Pvt Ltd with a
                    clear vision to help rural students who often struggle due to lack of affordable
                    coaching, digital access, expert guidance and structured academic mentorship.
                </p>

                <p>
                    Coming from a rural background, he understood that many talented students do
                    not fail because of lack of ability, but because of lack of guidance, confidence,
                    exposure and a disciplined preparation environment.
                </p>

                <p>
                    Through Khadkeshwar NEET JEE Academy, his goal is to create a premium yet
                    affordable learning ecosystem where students can prepare for NEET, JEE and
                    Foundation courses with personal mentoring, regular tests, revision support,
                    scholarships and future AI-enabled progress tracking.
                </p>
            @endif

            @if($founderSection->quote_text || $founderSection->quote_author)
                <div class="fjx-premium-quote">
                    <i class="bi bi-quote"></i>

                    <div>
                        @if($founderSection->quote_text)
                            <h4>
                                {{ $founderSection->quote_text }}
                            </h4>
                        @endif

                        @if($founderSection->quote_author)
                            <span>— {{ $founderSection->quote_author }}</span>
                        @endif
                    </div>
                </div>
            @else
                <div class="fjx-premium-quote">
                    <i class="bi bi-quote"></i>

                    <div>
                        <h4>
                            My mission is simple — empower every rural student with quality education,
                            technology and the right guidance to build a better tomorrow.
                        </h4>
                        <span>— Dr. Vitthal Nagare</span>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endif

        <!-- Company Panel -->
        <div class="col-lg-4">
          <aside class="fjx-company-panel" data-aos="fade-left">

            <div class="fjx-company-head">
              <div>
                <i class="bi bi-building-fill-check"></i>
              </div>

              <span>Official Details</span>
              <h3>Company Information</h3>
            </div>

            <div class="fjx-company-list">

              <div>
                <span>Company Name</span>
                <strong>Khadkeshwar Development Services Pvt Ltd</strong>
              </div>

              <div>
                <span>Operational Number</span>
                <strong><a href="tel:+918856822032">+91 88568 22032</a></strong>
              </div>

              <div>
                <span>Email</span>
                <strong><a href="mailto:info@khadkeshwaracademy.com">info@khadkeshwaracademy.com</a></strong>
              </div>

              <div>
                <span>GSTIN</span>
                <strong>27AAVCKD9876K1ZL</strong>
              </div>

              <div>
                <span>CIN</span>
                <strong>U80904MH2022PTC400123</strong>
              </div>

              <div>
                <span>PAN</span>
                <strong>AAVCKD9876K</strong>
              </div>

              <div>
                <span>Registered Address</span>
                <strong>Lonar, Buldhana, Maharashtra - 443302, India</strong>
              </div>

            </div>

            <a href="company-information.html" class="fjx-company-btn">
              View Company Page
              <i class="bi bi-arrow-right"></i>
            </a>

          </aside>
        </div>

      </div>

    </div>
  </section>
  <!-- ================= STORY + COMPANY END ================= -->


  <!-- ================= RESPONSIBILITIES START ================= -->
  <section class="fjx-responsibility-section section-padding">
    <div class="fjx-dark-grid"></div>

    <div class="container">

      <div class="fjx-section-heading light" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-diagram-3-fill"></i>
          Key Responsibilities
        </span>

        <h2>Leadership that connects education, technology and social impact.</h2>

        <p>
          The founder leads the academy with a clear balance of academic quality,
          digital innovation, student support and rural development.
        </p>
      </div>

      <div class="fjx-resp-grid">

        <div class="fjx-resp-card" data-aos="fade-up" data-aos-delay="100">
          <span>01</span>
          <i class="bi bi-bullseye"></i>
          <h3>Strategic Leadership & Vision</h3>
          <p>Driving long-term vision and mission alignment for rural education transformation.</p>
        </div>

        <div class="fjx-resp-card" data-aos="fade-up" data-aos-delay="160">
          <span>02</span>
          <i class="bi bi-handshake-fill"></i>
          <h3>Business Development & Partnerships</h3>
          <p>Building collaborations, strategic alliances and growth opportunities.</p>
        </div>

        <div class="fjx-resp-card" data-aos="fade-up" data-aos-delay="220">
          <span>03</span>
          <i class="bi bi-cpu-fill"></i>
          <h3>Technology & AI Integration</h3>
          <p>Planning AI-based test analysis, dashboard, performance tracking and digital support.</p>
        </div>

        <div class="fjx-resp-card" data-aos="fade-up" data-aos-delay="280">
          <span>04</span>
          <i class="bi bi-mortarboard-fill"></i>
          <h3>Academic System Development</h3>
          <p>Creating a disciplined NEET/JEE preparation model with mentorship and test practice.</p>
        </div>

        <div class="fjx-resp-card" data-aos="fade-up" data-aos-delay="340">
          <span>05</span>
          <i class="bi bi-percent"></i>
          <h3>Scholarship & Fee Support</h3>
          <p>Supporting deserving rural students through fee concession and scholarship support.</p>
        </div>

        <div class="fjx-resp-card" data-aos="fade-up" data-aos-delay="400">
          <span>06</span>
          <i class="bi bi-graph-up-arrow"></i>
          <h3>Impact Measurement</h3>
          <p>Creating measurable academic and social impact for students and families.</p>
        </div>

      </div>

    </div>
  </section>
  <!-- ================= RESPONSIBILITIES END ================= -->


  <!-- ================= TIMELINE + IMPACT START ================= -->
  <section class="fjx-roadmap-section section-padding">
    <div class="container">

      <div class="row g-4 align-items-stretch">

        <!-- Timeline -->
        <div class="col-lg-6">
          <div class="fjx-roadmap-card" data-aos="fade-right">

            <div class="fjx-card-title">
              <i class="bi bi-clock-history"></i>
              <div>
                <span>Journey Timeline</span>
                <h3>Roadmap of the academy vision</h3>
              </div>
            </div>

            <div class="fjx-timeline-list">

              <div>
                <strong>2022</strong>
                <p>Khadkeshwar Development Services Pvt Ltd vision started with a focus on education development.</p>
              </div>

              <div>
                <strong>2023</strong>
                <p>Rural education support and affordable academic planning began for deserving students.</p>
              </div>

              <div>
                <strong>2024</strong>
                <p>NEET/JEE coaching model strengthened with test practice and mentorship support.</p>
              </div>

              <div>
                <strong>2025</strong>
                <p>Scholarship, fee concession and free coaching support expanded for rural students.</p>
              </div>

              <div>
                <strong>2026</strong>
                <p>AI learning dashboard, smart test analysis and student progress roadmap planned.</p>
              </div>

              <div>
                <strong>2030</strong>
                <p>Long-term vision to become a rural AI education platform and future national brand.</p>
              </div>

            </div>

          </div>
        </div>

        <!-- Impact -->
        <div class="col-lg-6">
          <div class="fjx-impact-card" data-aos="fade-left">

            <div class="fjx-card-title">
              <i class="bi bi-graph-up-arrow"></i>
              <div>
                <span>Impact at a Glance</span>
                <h3>Rural education support in numbers</h3>
              </div>
            </div>

            <div class="fjx-impact-grid">

              <div>
                <i class="bi bi-people-fill"></i>
                <strong>80+</strong>
                <span>Active Students</span>
              </div>

              <div>
                <i class="bi bi-mortarboard-fill"></i>
                <strong>500+</strong>
                <span>Rural Students Impacted</span>
              </div>

              <div>
                <i class="bi bi-geo-alt-fill"></i>
                <strong>10+</strong>
                <span>Villages Covered</span>
              </div>

              <div>
                <i class="bi bi-percent"></i>
                <strong>50%</strong>
                <span>Fee Concession Available</span>
              </div>

            </div>

            <div class="fjx-impact-image">
              <img src="assets/img/img5.jpeg" alt="Khadkeshwar Academy students learning environment">
              <div>
                <i class="bi bi-quote"></i>
                <p>Quality education is not a privilege, it is a right for every rural student.</p>
              </div>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- ================= TIMELINE + IMPACT END ================= -->


  <!-- ================= RECOGNITION START ================= -->
  <section class="fjx-recognition-section section-padding">
    <div class="container">

      <div class="fjx-section-heading" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-award-fill"></i>
          Recognition & Certifications
        </span>

        <h2>Building trust with official identity and future-ready vision.</h2>

        <p>
          The academy is positioned with a strong institutional identity, compliance focus
          and startup-oriented rural EdTech roadmap.
        </p>
      </div>

      <div class="fjx-recognition-grid">

        <div class="fjx-recognition-card" data-aos="zoom-in" data-aos-delay="100">
          <i class="bi bi-shield-check"></i>
          <h3>ISO 9001:2015</h3>
          <p>Quality-focused education process and organized academic support system.</p>
        </div>

        <div class="fjx-recognition-card" data-aos="zoom-in" data-aos-delay="160">
          <i class="bi bi-patch-check-fill"></i>
          <h3>Trademark Registered</h3>
          <p>Khadkeshwar NEET/JEE Academy brand identity and recognition.</p>
        </div>

        <div class="fjx-recognition-card" data-aos="zoom-in" data-aos-delay="220">
          <i class="bi bi-rocket-takeoff-fill"></i>
          <h3>Startup India Vision</h3>
          <p>Rural education and EdTech startup vision for future learning growth.</p>
        </div>

        <div class="fjx-recognition-card" data-aos="zoom-in" data-aos-delay="280">
          <i class="bi bi-stars"></i>
          <h3>DPIIT Recognition</h3>
          <p>Startup-focused recognition roadmap and future-ready education mission.</p>
        </div>

      </div>

    </div>
  </section>
  <!-- ================= RECOGNITION END ================= -->


  <!-- ================= VALUE STRIP START ================= -->
  <section class="fjx-value-section">
    <div class="container">
      <div class="fjx-value-strip" data-aos="fade-up">

        <div>
          <i class="bi bi-mortarboard"></i>
          <strong>Affordable Education</strong>
          <span>Quality coaching at affordable fees</span>
        </div>

        <div>
          <i class="bi bi-cpu"></i>
          <strong>AI-Powered Learning</strong>
          <span>Smart technology for better outcomes</span>
        </div>

        <div>
          <i class="bi bi-people"></i>
          <strong>Rural-First Approach</strong>
          <span>Focused on uplifting rural Bharat</span>
        </div>

        <div>
          <i class="bi bi-bullseye"></i>
          <strong>Measurable Impact</strong>
          <span>Creating real change in communities</span>
        </div>

      </div>
    </div>
  </section>
  <!-- ================= VALUE STRIP END ================= -->


  <!-- ================= CTA START ================= -->
  <section class="fjx-final-cta-section section-padding">
    <div class="container">

      <div class="fjx-cta-card" data-aos="zoom-in">

        <div>
          <span>
            <i class="bi bi-mortarboard-fill"></i>
            Admission Open 2026
          </span>

          <h2>Start your NEET & JEE preparation with the right guidance.</h2>

          <p>
            Connect with Khadkeshwar Academy for admission, scholarship eligibility,
            fee concession and course guidance.
          </p>
        </div>

        <div class="fjx-cta-actions">
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
  <!-- ================= CTA END ================= -->

</main>
<!-- ========================= FOUNDER JOURNEY PAGE END ========================== -->






@endsection