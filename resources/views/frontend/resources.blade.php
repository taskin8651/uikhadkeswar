
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
<!-- ========================= RESOURCES PAGE START ========================== -->

<main class="resx-page">

  <!-- HERO START -->
  <section class="resx-hero">
    <div class="resx-bg-grid"></div>
    <div class="resx-orb resx-orb-1"></div>
    <div class="resx-orb resx-orb-2"></div>
    <div class="resx-orb resx-orb-3"></div>

    <div class="container">

      <nav class="resx-breadcrumb" data-aos="fade-up">
        <a href="{{ route('frontend.home') }}">
          <i class="bi bi-house-door-fill"></i>
          Home
        </a>
        <i class="bi bi-chevron-right"></i>
        <span>Resources</span>
      </nav>

      <div class="resx-hero-card" data-aos="fade-up">
        <div class="resx-hero-shine"></div>

        <div class="row g-0 align-items-stretch">

          <div class="col-lg-7">
            <div class="resx-hero-content">

              <span class="resx-kicker">
                <i class="bi bi-journal-bookmark-fill"></i>
                Study Resources & Academic Updates
              </span>

              <h1>
                Useful resources for
                <span>NEET & JEE preparation.</span>
              </h1>

              <p>
                Find study material, notices, exam updates, downloads, preparation tips and
                important announcements from Khadkeshwar NEET JEE Academy.
              </p>

              <div class="resx-alert-note">
                <i class="bi bi-info-circle-fill"></i>
                <span>
                  Resource cards are update-ready. Replace placeholder files with actual PDFs, notices, study material and exam updates when available.
                </span>
              </div>

              <div class="resx-hero-tags">
                <span><i class="bi bi-check-circle-fill"></i> Study Material</span>
                <span><i class="bi bi-check-circle-fill"></i> Notices</span>
                <span><i class="bi bi-check-circle-fill"></i> Exam Updates</span>
                <span><i class="bi bi-check-circle-fill"></i> Downloads</span>
              </div>

              <div class="resx-hero-actions">
                <a href="#resources-list" class="btn-main">
                  View Resources
                  <i class="bi bi-arrow-right"></i>
                </a>

                <a href="{{ $telPrimary }}" class="resx-outline-btn">
                  <i class="bi bi-telephone-fill"></i>
                  Call Now
                </a>
              </div>

            </div>
          </div>

          <div class="col-lg-5">
            <div class="resx-hero-visual">

              <div class="resx-visual-card">
                <div class="resx-visual-head">
                  <div>
                    <span></span>
                    <span></span>
                    <span></span>
                  </div>
                  <strong>Resource Hub</strong>
                </div>

                <div class="resx-visual-body">

                  <div class="resx-resource-main">
                    <div class="resx-resource-icon">
                      <i class="bi bi-folder2-open"></i>
                    </div>
                    <div>
                      <span>Academic Library</span>
                      <h3>Study • Notices • Downloads</h3>
                      <p>NEET / JEE / Foundation Support</p>
                    </div>
                  </div>

                  <div class="resx-mini-grid">
                    <div>
                      <i class="bi bi-file-earmark-pdf-fill"></i>
                      <strong>PDF Notes</strong>
                      <span>Study material</span>
                    </div>

                    <div>
                      <i class="bi bi-megaphone-fill"></i>
                      <strong>Notices</strong>
                      <span>Latest updates</span>
                    </div>

                    <div>
                      <i class="bi bi-calendar2-check-fill"></i>
                      <strong>Exam Updates</strong>
                      <span>Important dates</span>
                    </div>

                    <div>
                      <i class="bi bi-lightbulb-fill"></i>
                      <strong>Tips</strong>
                      <span>Preparation guide</span>
                    </div>
                  </div>

                </div>
              </div>

              <div class="resx-hero-info-row">
                <div class="resx-info-card">
                  <i class="bi bi-download"></i>
                  <div>
                    <strong>Downloads</strong>
                    <span>PDF ready</span>
                  </div>
                </div>

                <div class="resx-info-card">
                  <i class="bi bi-bell-fill"></i>
                  <div>
                    <strong>Updates</strong>
                    <span>Notice board</span>
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


  <!-- QUICK CATEGORIES START -->
  <section class="resx-categories section-padding">
    <div class="container">

      <div class="resx-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-grid-3x3-gap-fill"></i>
          Resource Categories
        </span>

        <h2>Everything students need for academic support and updates.</h2>

        <p>
          Browse study resources, notices, exam updates, preparation tips and important downloads.
        </p>
      </div>

      <div class="resx-category-grid">

        <a href="#resources-list" class="resx-category-card" data-filter-jump="study" data-aos="fade-up" data-aos-delay="100">
          <i class="bi bi-book-half"></i>
          <h3>Study Resources</h3>
          <p>Notes, worksheets and chapter support material.</p>
        </a>

        <a href="#resources-list" class="resx-category-card featured" data-filter-jump="notices" data-aos="fade-up" data-aos-delay="180">
          <i class="bi bi-megaphone-fill"></i>
          <h3>Notices</h3>
          <p>Academy announcements and student notices.</p>
        </a>

        <a href="#resources-list" class="resx-category-card" data-filter-jump="exam" data-aos="fade-up" data-aos-delay="260">
          <i class="bi bi-calendar-event-fill"></i>
          <h3>Exam Updates</h3>
          <p>NEET/JEE dates, test schedules and updates.</p>
        </a>

        <a href="#resources-list" class="resx-category-card" data-filter-jump="downloads" data-aos="fade-up" data-aos-delay="340">
          <i class="bi bi-cloud-arrow-down-fill"></i>
          <h3>Downloads</h3>
          <p>PDFs, forms and downloadable resources.</p>
        </a>

      </div>

    </div>
  </section>
  <!-- QUICK CATEGORIES END -->


  <!-- RESOURCES LIST START -->
  <section class="resx-list-section section-padding" id="resources-list">
    <div class="container">

      <div class="resx-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-folder2-open"></i>
          Resource Library
        </span>

        <h2>Update-ready resource cards for students and parents.</h2>

        <p>
          Use filters to show study material, notices, exam updates, downloads and preparation tips.
        </p>
      </div>

      <div class="resx-filter-wrap" data-aos="fade-up">
        <button class="resx-filter active" type="button" data-filter="all">All</button>
        <button class="resx-filter" type="button" data-filter="study">Study Resources</button>
        <button class="resx-filter" type="button" data-filter="notices">Notices</button>
        <button class="resx-filter" type="button" data-filter="exam">Exam Updates</button>
        <button class="resx-filter" type="button" data-filter="downloads">Downloads</button>
        <button class="resx-filter" type="button" data-filter="tips">Preparation Tips</button>
      </div>

      <div class="resx-resource-grid">
        @forelse($resourceItems as $index => $resourceItem)
          <div class="resx-resource-card {{ $resourceItem->is_featured ? 'featured' : '' }}"
               data-category="{{ $resourceItem->category_slugs ?: 'study' }}"
               data-aos="fade-up"
               data-aos-delay="{{ 100 + (($index % 3) * 80) }}">
            <div class="resx-resource-top">
              <div class="resx-resource-icon-sm">
                <i class="{{ $resourceItem->icon ?: 'bi bi-folder-fill' }}"></i>
              </div>
              <span>{{ $resourceItem->badge_text ?: 'Resource' }}</span>
            </div>

            <h3>{{ $resourceItem->title }}</h3>
            <p>{{ $resourceItem->description }}</p>

            <div class="resx-resource-meta">
              @if($resourceItem->meta_one_text)
                <span><i class="{{ $resourceItem->meta_one_icon ?: 'bi bi-calendar2-check' }}"></i> {{ $resourceItem->meta_one_text }}</span>
              @endif
              @if($resourceItem->meta_two_text)
                <span><i class="{{ $resourceItem->meta_two_icon ?: 'bi bi-download' }}"></i> {{ $resourceItem->meta_two_text }}</span>
              @endif
            </div>

            <a href="{{ $resourceItem->buttonUrl() }}"
               class="resx-download-btn"
               @if(in_array($resourceItem->link_type, ['custom', 'file']) && $resourceItem->buttonUrl() !== '#') target="_blank" rel="noopener noreferrer" @endif>
              {{ $resourceItem->button_text ?: 'View Resource' }}
              <i class="{{ $resourceItem->button_icon ?: 'bi bi-arrow-right-circle-fill' }}"></i>
            </a>
          </div>
        @empty
          <div class="resx-resource-card" data-category="study" data-aos="fade-up">
            <div class="resx-resource-top">
              <div class="resx-resource-icon-sm">
                <i class="bi bi-folder2-open"></i>
              </div>
              <span>Resources</span>
            </div>
            <h3>No resources added yet</h3>
            <p>Admin panel se resources, notices, downloads aur tips add karein.</p>
          </div>
        @endforelse

      </div>

    </div>
  </section>
  <!-- RESOURCES LIST END -->


  <!-- NOTICES + UPDATES START -->
  <section class="resx-updates section-padding">
    <div class="resx-dark-grid"></div>

    <div class="container">

      <div class="row g-5 align-items-center">

        <div class="col-lg-5">
          <div class="resx-update-content" data-aos="fade-right">
            <span class="section-badge">
              <i class="bi bi-bell-fill"></i>
              Important Announcements
            </span>

            <h2>Stay updated with academy notices and preparation alerts.</h2>

            <p>
              This section can be updated with exam dates, batch announcements, test schedule,
              admission updates and important academic notices.
            </p>

            <div class="resx-update-note">
              <i class="bi bi-info-circle-fill"></i>
              <span>
                Developer can later make this dynamic from admin panel or keep it static in Phase 1.
              </span>
            </div>

            <div class="resx-update-actions">
              <a href="{{ route('frontend.admission') }}" class="btn-main">
                Apply Now
                <i class="bi bi-arrow-right"></i>
              </a>

              <a href="{{ $telPrimary }}" class="btn-white">
                Call Now
              </a>
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="resx-timeline" data-aos="fade-left">

            <div class="resx-timeline-item">
              <span>01</span>
              <div>
                <strong>Admission Open Update</strong>
                <p>NEET, JEE, Foundation and Test Series admissions can be highlighted here.</p>
              </div>
            </div>

            <div class="resx-timeline-item">
              <span>02</span>
              <div>
                <strong>Test Series Schedule</strong>
                <p>Chapter-wise tests, revision tests and full syllabus mock test dates can be added.</p>
              </div>
            </div>

            <div class="resx-timeline-item">
              <span>03</span>
              <div>
                <strong>Exam Reminder</strong>
                <p>NEET/JEE application date, admit card date and official exam updates can be added.</p>
              </div>
            </div>

            <div class="resx-timeline-item">
              <span>04</span>
              <div>
                <strong>Scholarship & Fee Concession</strong>
                <p>Eligibility updates, document requirements and concession details can be shown.</p>
              </div>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- NOTICES + UPDATES END -->


  <!-- PREPARATION TIPS START -->
  <section class="resx-tips section-padding">
    <div class="container">

      <div class="resx-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-lightbulb-fill"></i>
          NEET/JEE Preparation Tips
        </span>

        <h2>Smart preparation habits for better performance.</h2>

        <p>
          These tip cards can be updated with real articles, blogs or academic guidance.
        </p>
      </div>

      <div class="resx-tips-grid">

        <div class="resx-tip-card" data-aos="fade-up" data-aos-delay="100">
          <span>01</span>
          <i class="bi bi-journal-check"></i>
          <h3>Revise Daily</h3>
          <p>Small daily revision helps students retain formulas, concepts and key NCERT points.</p>
        </div>

        <div class="resx-tip-card active" data-aos="fade-up" data-aos-delay="180">
          <span>02</span>
          <i class="bi bi-stopwatch-fill"></i>
          <h3>Practice Timed Tests</h3>
          <p>Time-bound tests improve exam speed, accuracy and confidence.</p>
        </div>

        <div class="resx-tip-card" data-aos="fade-up" data-aos-delay="260">
          <span>03</span>
          <i class="bi bi-bullseye"></i>
          <h3>Track Weak Topics</h3>
          <p>Identify weak chapters after tests and revise them with focused practice.</p>
        </div>

        <div class="resx-tip-card" data-aos="fade-up" data-aos-delay="340">
          <span>04</span>
          <i class="bi bi-person-check-fill"></i>
          <h3>Ask Doubts Early</h3>
          <p>Clear doubts quickly so small confusion does not become a big preparation gap.</p>
        </div>

      </div>

    </div>
  </section>
  <!-- PREPARATION TIPS END -->


  <!-- CTA START -->
  <section class="resx-cta-section section-padding">
    <div class="container">

      <div class="resx-cta" data-aos="zoom-in">

        <div>
          <span>
            <i class="bi bi-mortarboard-fill"></i>
            Need Admission Guidance?
          </span>

          <h2>Start your NEET & JEE preparation with the right resources and mentorship.</h2>

          <p>
            Contact Khadkeshwar NEET JEE Academy for course details, test series, admission inquiry,
            fee concession and preparation support.
          </p>
        </div>

        <div class="resx-cta-actions">
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

<!-- ========================= RESOURCES PAGE END ========================== -->
@endsection
