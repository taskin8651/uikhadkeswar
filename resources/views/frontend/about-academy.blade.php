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
<!-- ========================= ABOUT PAGE START ========================== -->

<main class="aboutv2-page">

  <!-- ================= HERO START ================= -->
  <section class="aboutv2-hero">
    <div class="aboutv2-grid-bg"></div>
    <div class="aboutv2-orb aboutv2-orb-1"></div>
    <div class="aboutv2-orb aboutv2-orb-2"></div>
    <div class="aboutv2-orb aboutv2-orb-3"></div>

    <div class="container">

      <!-- BREADCRUMB -->
      <nav class="aboutv2-breadcrumb" data-aos="fade-up">
        <a href="{{ route('frontend.home') }}">
          <i class="bi bi-house-door-fill"></i>
          Home
        </a>
        <i class="bi bi-chevron-right"></i>
        <span>About Khadkeshwar Academy</span>
      </nav>

      @if($aboutPageContent)
<div class="aboutv2-hero-card" data-aos="fade-up">
    <div class="aboutv2-hero-shine"></div>

    <div class="row g-0 align-items-stretch">

        <div class="col-lg-7">
            <div class="aboutv2-hero-content">

                <span class="aboutv2-kicker">
                    <i class="bi bi-building-check"></i>
                    About Khadkeshwar Academy
                </span>

                <h1>
                    {{ $aboutPageContent->hero_title }}
                    <span>{{ $aboutPageContent->hero_highlight_text }}</span>
                </h1>

                <p>{{ $aboutPageContent->hero_description }}</p>

                <div class="aboutv2-hero-tags">
                    @foreach([
                        $aboutPageContent->hero_tag_one,
                        $aboutPageContent->hero_tag_two,
                        $aboutPageContent->hero_tag_three,
                        $aboutPageContent->hero_tag_four,
                    ] as $tag)
                        @if($tag)
                            <span><i class="bi bi-check-circle-fill"></i> {{ $tag }}</span>
                        @endif
                    @endforeach
                </div>

                <div class="aboutv2-hero-actions">
                    <a href="{{ route('frontend.admission') }}" class="btn-main">
                        Apply for Admission
                        <i class="bi bi-arrow-right"></i>
                    </a>

                    <a href="{{ $telPrimary }}" class="aboutv2-outline-btn">
                        <i class="bi bi-telephone-fill"></i>
                        Call Academy
                    </a>
                </div>

            </div>
        </div>

        <div class="col-lg-5">
            <div class="aboutv2-hero-visual">

                <div class="aboutv2-image-frame">
                    <img
                        src="{{ $aboutPageContent->getFirstMediaUrl('about_hero_image') ?: asset('assets/img/img5.jpeg') }}"
                        alt="{{ $aboutPageContent->hero_image_alt ?: 'Khadkeshwar Academy classroom learning environment' }}"
                    >

                    <div class="aboutv2-image-badge">
                        <i class="bi bi-stars"></i>
                        Rural-First Education Mission
                    </div>

                    <div class="aboutv2-image-info">
                        <span>{{ $aboutPageContent->hero_focus_label }}</span>
                        <h3>{{ $aboutPageContent->hero_focus_title }}</h3>
                        <p>{{ $aboutPageContent->hero_focus_description }}</p>
                    </div>
                </div>

                <div class="aboutv2-floating-stat aboutv2-stat-1">
                    <i class="bi bi-percent"></i>
                    <div>
                        <strong>{{ $aboutPageContent->hero_stat_one_value }}</strong>
                        <span>{{ $aboutPageContent->hero_stat_one_label }}</span>
                    </div>
                </div>

                <div class="aboutv2-floating-stat aboutv2-stat-2">
                    <i class="bi bi-clipboard2-check-fill"></i>
                    <div>
                        <strong>{{ $aboutPageContent->hero_stat_two_value }}</strong>
                        <span>{{ $aboutPageContent->hero_stat_two_label }}</span>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endif

    </div>
  </section>
  <!-- ================= HERO END ================= -->


  <!-- ================= INTRO START ================= -->
 @if($aboutPageContent)
<section class="aboutv2-intro section-padding">
    <div class="container">

        <div class="aboutv2-section-head" data-aos="fade-up">
            <span class="section-badge">
                <i class="bi bi-info-circle-fill"></i>
                Academy Introduction
            </span>

            <h2>{{ $aboutPageContent->intro_heading }}</h2>
            <p>{!! $aboutPageContent->intro_description !!}</p>
        </div>

        <div class="aboutv2-intro-card" data-aos="fade-up">
            <div class="row g-4 align-items-center">

                <div class="col-lg-6">
                    <div class="aboutv2-intro-text">
                        <h3>{{ $aboutPageContent->intro_card_title }}</h3>

                        {!! $aboutPageContent->intro_card_description !!}

                        <div class="aboutv2-quote-box">
                            <i class="bi bi-quote"></i>
                            <div>
                                <strong>“{{ $aboutPageContent->intro_quote_text }}”</strong>
                                <span>{{ $aboutPageContent->intro_quote_author }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="aboutv2-core-grid">

                        <div class="aboutv2-core-card dark">
                            <span>01</span>
                            <i class="bi bi-bullseye"></i>
                            <h3>{{ $aboutPageContent->intro_core_one_title }}</h3>
                            <p>{!! $aboutPageContent->intro_core_one_description !!}</p>
                        </div>

                        <div class="aboutv2-core-card">
                            <span>02</span>
                            <i class="bi bi-person-check-fill"></i>
                            <h3>{{ $aboutPageContent->intro_core_two_title }}</h3>
                            <p>{!! $aboutPageContent->intro_core_two_description !!}</p>
                        </div>

                        <div class="aboutv2-core-card">
                            <span>03</span>
                            <i class="bi bi-graph-up-arrow"></i>
                            <h3>{{ $aboutPageContent->intro_core_three_title }}</h3>
                            <p>{!! $aboutPageContent->intro_core_three_description !!}</p>
                        </div>

                        <div class="aboutv2-core-card">
                            <span>04</span>
                            <i class="bi bi-cpu-fill"></i>
                            <h3>{{ $aboutPageContent->intro_core_four_title }}</h3>
                            <p>{!! $aboutPageContent->intro_core_four_description !!}</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
@endif
  <!-- ================= INTRO END ================= -->


  <!-- ================= VISION MISSION START ================= -->
 @if($aboutPageContent)
<section class="aboutv2-vm section-padding">
    <div class="container">

        <div class="aboutv2-section-head" data-aos="fade-up">
            <span class="section-badge">
                <i class="bi bi-bullseye"></i>
                Vision & Mission
            </span>

            <h2>{{ $aboutPageContent->vm_heading }}</h2>
            <p>{!! $aboutPageContent->vm_description !!}</p>
        </div>

        <div class="aboutv2-vm-grid">

            <div class="aboutv2-vm-card dark" data-aos="fade-up" data-aos-delay="100">
                <div class="aboutv2-icon">
                    <i class="bi bi-eye-fill"></i>
                </div>
                <h3>{{ $aboutPageContent->vision_title }}</h3>
                <p>{!! $aboutPageContent->vision_description !!}</p>
            </div>

            <div class="aboutv2-vm-card" data-aos="fade-up" data-aos-delay="180">
                <div class="aboutv2-icon">
                    <i class="bi bi-rocket-takeoff-fill"></i>
                </div>
                <h3>{{ $aboutPageContent->mission_title }}</h3>
                <p>{!! $aboutPageContent->mission_description !!}</p>
            </div>

            <div class="aboutv2-vm-card" data-aos="fade-up" data-aos-delay="260">
                <div class="aboutv2-icon">
                    <i class="bi bi-stars"></i>
                </div>
                <h3>{{ $aboutPageContent->future_title }}</h3>
                <p>{!! $aboutPageContent->future_description !!}</p>
            </div>

        </div>

    </div>
</section>
@endif
  <!-- ================= VISION MISSION END ================= -->


  <!-- ================= TEACHING METHOD START ================= -->
  @if($aboutPageContent)
<section class="aboutv2-support section-padding">
    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">
                <div class="aboutv2-support-main" data-aos="fade-right">
                    <span class="section-badge">
                        <i class="bi bi-person-hearts"></i>
                        Student Support System
                    </span>

                    <h2>{{ $aboutPageContent->support_heading }}</h2>

                    <p>{!! $aboutPageContent->support_description !!}</p>

                    <div class="aboutv2-support-highlight">
                        <i class="bi bi-building-fill-check"></i>
                        <div>
                            <h3>{{ $aboutPageContent->support_highlight_title }}</h3>
                            <p>{!! $aboutPageContent->support_highlight_description !!}</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-6">
                <div class="aboutv2-support-grid">

                    <div class="aboutv2-support-item" data-aos="fade-up" data-aos-delay="100">
                        <i class="bi bi-person-check-fill"></i>
                        <h3>{{ $aboutPageContent->support_one_title }}</h3>
                        <p>{!! $aboutPageContent->support_one_description !!}</p>
                    </div>

                    <div class="aboutv2-support-item" data-aos="fade-up" data-aos-delay="160">
                        <i class="bi bi-percent"></i>
                        <h3>{{ $aboutPageContent->support_two_title }}</h3>
                        <p>{!! $aboutPageContent->support_two_description !!}</p>
                    </div>

                    <div class="aboutv2-support-item" data-aos="fade-up" data-aos-delay="220">
                        <i class="bi bi-clipboard2-check-fill"></i>
                        <h3>{{ $aboutPageContent->support_three_title }}</h3>
                        <p>{!! $aboutPageContent->support_three_description !!}</p>
                    </div>

                    <div class="aboutv2-support-item" data-aos="fade-up" data-aos-delay="280">
                        <i class="bi bi-robot"></i>
                        <h3>{{ $aboutPageContent->support_four_title }}</h3>
                        <p>{!! $aboutPageContent->support_four_description !!}</p>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
@endif
  <!-- ================= TEACHING METHOD END ================= -->


  <!-- ================= PROGRAMS START ================= -->
  <section class="aboutv2-programs section-padding">
    <div class="container">

      <div class="aboutv2-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-journal-bookmark-fill"></i>
          NEET & JEE Preparation Approach
        </span>

        <h2>Focused programs for medical and engineering entrance goals.</h2>

        <p>
          Students get course-wise preparation support with subject planning, tests,
          revision and mentoring designed for competitive exam success.
        </p>
      </div>

      <div class="aboutv2-program-grid">

        <div class="aboutv2-program-card" data-aos="fade-up" data-aos-delay="100">
          <div class="aboutv2-program-top">
            <i class="bi bi-heart-pulse-fill"></i>
            <span>Medical Entrance</span>
          </div>
          <h3>NEET Preparation</h3>
          <p>
            Focused support for Biology, Physics and Chemistry with NCERT-based clarity,
            practice tests, revision and exam strategy.
          </p>
          <ul>
            <li><i class="bi bi-check-circle-fill"></i> Biology concept learning</li>
            <li><i class="bi bi-check-circle-fill"></i> Physics numericals</li>
            <li><i class="bi bi-check-circle-fill"></i> Chemistry practice</li>
          </ul>
          <a href="{{ route('frontend.neet-program') }}">View NEET Program <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="aboutv2-program-card featured" data-aos="fade-up" data-aos-delay="180">
          <div class="aboutv2-program-top">
            <i class="bi bi-cpu-fill"></i>
            <span>Engineering Entrance</span>
          </div>
          <h3>JEE Preparation</h3>
          <p>
            Strong foundation in Physics, Chemistry and Mathematics with regular problem
            solving, mock tests and performance improvement.
          </p>
          <ul>
            <li><i class="bi bi-check-circle-fill"></i> Maths problem solving</li>
            <li><i class="bi bi-check-circle-fill"></i> Physics application</li>
            <li><i class="bi bi-check-circle-fill"></i> Mock test practice</li>
          </ul>
          <a href="{{ route('frontend.jee-program') }}">View JEE Program <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="aboutv2-program-card" data-aos="fade-up" data-aos-delay="260">
          <div class="aboutv2-program-top">
            <i class="bi bi-lightbulb-fill"></i>
            <span>Early Preparation</span>
          </div>
          <h3>Foundation Course</h3>
          <p>
            Early preparation support for students who want to build a strong academic
            base for future NEET/JEE goals.
          </p>
          <ul>
            <li><i class="bi bi-check-circle-fill"></i> Concept building</li>
            <li><i class="bi bi-check-circle-fill"></i> Study discipline</li>
            <li><i class="bi bi-check-circle-fill"></i> Mentorship support</li>
          </ul>
          <a href="{{ route('frontend.foundation-course') }}">View Foundation Course <i class="bi bi-arrow-right"></i></a>
        </div>

      </div>

    </div>
  </section>
  <!-- ================= PROGRAMS END ================= -->


  <!-- ================= SUPPORT START ================= -->
 @if($aboutPageContent)
<section class="aboutv2-support section-padding">
    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">
                <div class="aboutv2-support-main" data-aos="fade-right">
                    <span class="section-badge">
                        <i class="bi bi-person-hearts"></i>
                        Student Support System
                    </span>

                    <h2>{{ $aboutPageContent->support_heading }}</h2>

                    <p>{!! $aboutPageContent->support_description !!}</p>

                    <div class="aboutv2-support-highlight">
                        <i class="bi bi-building-fill-check"></i>
                        <div>
                            <h3>{{ $aboutPageContent->support_highlight_title }}</h3>
                            <p>{!! $aboutPageContent->support_highlight_description !!}</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-6">
                <div class="aboutv2-support-grid">

                    <div class="aboutv2-support-item" data-aos="fade-up" data-aos-delay="100">
                        <i class="bi bi-person-check-fill"></i>
                        <h3>{{ $aboutPageContent->support_one_title }}</h3>
                        <p>{!! $aboutPageContent->support_one_description !!}</p>
                    </div>

                    <div class="aboutv2-support-item" data-aos="fade-up" data-aos-delay="160">
                        <i class="bi bi-percent"></i>
                        <h3>{{ $aboutPageContent->support_two_title }}</h3>
                        <p>{!! $aboutPageContent->support_two_description !!}</p>
                    </div>

                    <div class="aboutv2-support-item" data-aos="fade-up" data-aos-delay="220">
                        <i class="bi bi-clipboard2-check-fill"></i>
                        <h3>{{ $aboutPageContent->support_three_title }}</h3>
                        <p>{!! $aboutPageContent->support_three_description !!}</p>
                    </div>

                    <div class="aboutv2-support-item" data-aos="fade-up" data-aos-delay="280">
                        <i class="bi bi-robot"></i>
                        <h3>{{ $aboutPageContent->support_four_title }}</h3>
                        <p>{!! $aboutPageContent->support_four_description !!}</p>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
@endif
  <!-- ================= SUPPORT END ================= -->


  <!-- ================= WHY CHOOSE START ================= -->
  <section class="aboutv2-why section-padding">
    <div class="container">

      <div class="aboutv2-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-award-fill"></i>
          Why Students Choose Us
        </span>

        <h2>A trusted academic environment for rural aspirants.</h2>

        <p>
          Our approach combines quality coaching, discipline, affordability, personal
          mentorship and future AI-enabled learning vision.
        </p>
      </div>

      @php
        $whyDelays = [100, 160, 220, 280, 340, 400];
      @endphp

      @if(isset($aboutWhyItems) && $aboutWhyItems->count())
        <div class="aboutv2-why-grid">
          @foreach($aboutWhyItems as $index => $whyItem)
            <div class="aboutv2-why-card" data-aos="zoom-in" data-aos-delay="{{ $whyDelays[$index] ?? 100 }}">
              <span>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
              <i class="{{ $whyItem->icon ?: 'bi bi-award-fill' }}"></i>
              <h3>{{ $whyItem->title }}</h3>

              @if($whyItem->description)
                <p>{{ $whyItem->description }}</p>
              @endif
            </div>
          @endforeach
        </div>
      @endif

    </div>
  </section>
  <!-- ================= WHY CHOOSE END ================= -->


  <!-- ================= CTA START ================= -->
  <section class="aboutv2-cta-section section-padding">
    <div class="container">
      <div class="aboutv2-cta" data-aos="zoom-in">

        <div>
          <span>
            <i class="bi bi-mortarboard-fill"></i>
            {{ $admissionBadgeText }}
          </span>

          <h2>Start your NEET & JEE preparation with the right guidance.</h2>

          <p>
            Connect with Khadkeshwar Academy for course details, scholarship eligibility,
            fee concession and admission support.
          </p>
        </div>

        <div class="aboutv2-cta-actions">
          <button class="btn-main border-0" data-bs-toggle="modal" data-bs-target="#admissionModal">
            <i class="bi bi-pencil-square"></i>
            Apply Now
          </button>

          <a href="{{ $telPrimary }}" class="btn-white">
            <i class="bi bi-telephone-fill"></i>
            Call Now
          </a>
        </div>

      </div>
    </div>
  </section>
  <!-- ================= CTA END ================= -->

</main>

<!-- ========================= ABOUT PAGE END ========================== -->


@endsection
