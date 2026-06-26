
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
@php
  $contactSettings = $settings;
  $contactPhone = $phonePrimary ?? $contactSettings?->phone_primary;
  $contactEmail = $emailPrimary ?? $contactSettings?->email_primary;
  $contactAddress = $address ?? $contactSettings?->address;
  $contactWorkingHours = $contactSettings?->working_hours ?? ($settingDefaults['working_hours'] ?? 'Admission Support');
  $contactTel = $telPrimary ?? $contactSettings?->telLink($contactPhone);
  $contactMail = $mailPrimary ?? $contactSettings?->mailLink($contactEmail);
  $contactMapSrc = $contactSettings?->map_embed_url ?: 'https://www.google.com/maps?q=' . urlencode($contactAddress ?: 'India') . '&output=embed';
@endphp

<!-- ========================= CONTACT PAGE START ========================== -->

<main class="contactx-page">

  <!-- HERO START -->
  <section class="contactx-hero">
    <div class="contactx-bg-grid"></div>
    <div class="contactx-orb contactx-orb-1"></div>
    <div class="contactx-orb contactx-orb-2"></div>
    <div class="contactx-orb contactx-orb-3"></div>

    <div class="container">

      <nav class="contactx-breadcrumb" data-aos="fade-up">
        <a href="{{ route('frontend.home') }}">
          <i class="bi bi-house-door-fill"></i>
          Home
        </a>
        <i class="bi bi-chevron-right"></i>
        <span>Contact Us</span>
      </nav>

      <div class="contactx-hero-card" data-aos="fade-up">
        <div class="contactx-hero-shine"></div>

        <div class="row g-0 align-items-stretch">

          <div class="col-lg-7">
            <div class="contactx-hero-content">

              <span class="contactx-kicker">
                <i class="bi bi-telephone-fill"></i>
                Contact & Admission Inquiry
              </span>

              <h1>
                Connect with Khadkeshwar
                <span>NEET JEE Academy.</span>
              </h1>

              <p>
                Contact our admission team for NEET, JEE, Foundation Course, Test Series,
                scholarship support, fee concession details and personal guidance.
              </p>

              <div class="contactx-alert-note">
                <i class="bi bi-info-circle-fill"></i>
                <span>
                  Submit your inquiry form and our academy team will contact you for course details, admission guidance and next steps.
                </span>
              </div>

              <div class="contactx-hero-tags">
                <span><i class="bi bi-check-circle-fill"></i> Admission Inquiry</span>
                <span><i class="bi bi-check-circle-fill"></i> Course Guidance</span>
                <span><i class="bi bi-check-circle-fill"></i> Fee Concession</span>
                <span><i class="bi bi-check-circle-fill"></i> Student Support</span>
              </div>

              <div class="contactx-hero-actions">
                <a href="#contact-form" class="btn-main">
                  Submit Inquiry
                  <i class="bi bi-arrow-right"></i>
                </a>

                <a href="{{ $contactTel }}" class="contactx-outline-btn">
                  <i class="bi bi-telephone-fill"></i>
                  Call Now
                </a>
              </div>

            </div>
          </div>

          <div class="col-lg-5">
            <div class="contactx-hero-visual">

              <div class="contactx-visual-card">
                <div class="contactx-visual-head">
                  <div>
                    <span></span>
                    <span></span>
                    <span></span>
                  </div>
                  <strong>Contact Desk</strong>
                </div>

                <div class="contactx-visual-body">

                  <div class="contactx-contact-main">
                    <div class="contactx-contact-icon">
                      <i class="bi bi-headset"></i>
                    </div>
                    <div>
                      <span>Admission Helpline</span>
                      <h3>{{ $contactPhone }}</h3>
                      <p>NEET / JEE / Foundation / Test Series</p>
                    </div>
                  </div>

                  <div class="contactx-mini-grid">
                    <div>
                      <i class="bi bi-envelope-fill"></i>
                      <strong>Email</strong>
                      <span>{{ $contactEmail }}</span>
                    </div>

                    <div>
                      <i class="bi bi-geo-alt-fill"></i>
                      <strong>Location</strong>
                      <span>{{ $contactAddress }}</span>
                    </div>

                    <div>
                      <i class="bi bi-clock-fill"></i>
                      <strong>Hours</strong>
                      <span>{{ $contactWorkingHours }}</span>
                    </div>

                    <div>
                      <i class="bi bi-mortarboard-fill"></i>
                      <strong>Courses</strong>
                      <span>NEET / JEE</span>
                    </div>
                  </div>

                </div>
              </div>

              <div class="contactx-hero-info-row">
                <div class="contactx-info-card">
                  <i class="bi bi-chat-dots-fill"></i>
                  <div>
                    <strong>Quick Response</strong>
                    <span>Inquiry support</span>
                  </div>
                </div>

                <div class="contactx-info-card">
                  <i class="bi bi-person-check-fill"></i>
                  <div>
                    <strong>Guidance</strong>
                    <span>Course counseling</span>
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


  <!-- CONTACT DETAILS START -->
  <section class="contactx-details section-padding">
    <div class="container">

      <div class="contactx-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-address-book-fill"></i>
          Contact Details
        </span>

        <h2>Reach the academy for admission, course and support queries.</h2>

        <p>
          Use phone, email, address or inquiry form to connect with Khadkeshwar NEET JEE Academy.
        </p>
      </div>

      <div class="contactx-detail-grid">

        <a href="{{ $contactTel }}" class="contactx-detail-card" data-aos="fade-up" data-aos-delay="100">
          <i class="bi bi-telephone-fill"></i>
          <span>Phone Number</span>
          <h3>{{ $contactPhone }}</h3>
          <p>Click to call admission desk</p>
        </a>

        <a href="{{ $contactMail }}" class="contactx-detail-card featured" data-aos="fade-up" data-aos-delay="180">
          <i class="bi bi-envelope-fill"></i>
          <span>Email Address</span>
          <h3>{{ $contactEmail }}</h3>
          <p>Send course or admission inquiry</p>
        </a>

        <div class="contactx-detail-card" data-aos="fade-up" data-aos-delay="260">
          <i class="bi bi-geo-alt-fill"></i>
          <span>Registered Address</span>
          <h3>{{ $contactAddress }}</h3>
          <p>Academy location information</p>
        </div>

        <div class="contactx-detail-card" data-aos="fade-up" data-aos-delay="340">
          <i class="bi bi-building-fill-check"></i>
          <span>Academy Address</span>
          <h3>{{ $address }}</h3>
          <p>Additional address from academy poster</p>
        </div>

      </div>

    </div>
  </section>
  <!-- CONTACT DETAILS END -->


  <!-- CONTACT FORM + SIDEBAR START -->
  <section class="contactx-form-section section-padding" id="contact-form">
    <div class="container">

      <div class="row g-5 align-items-start">

        <div class="col-lg-7">
          <div class="contactx-form-card" data-aos="fade-right">

            <div class="contactx-form-head">
              <div>
                <span>Inquiry Form</span>
                <h3>Submit Your Admission Inquiry</h3>
              </div>
              <i class="bi bi-send-fill"></i>
            </div>

            <form class="contactx-form" id="contactxForm" method="POST" action="{{ route('frontend.contact-inquiry.store') }}" novalidate>
              @csrf

              <div class="row g-3">

                <div class="col-md-6">
                  <label for="contactName">Student Name <span>*</span></label>
                  <input type="text" id="contactName" name="name" placeholder="Enter student name" required>
                </div>

                <div class="col-md-6">
                  <label for="contactPhone">Phone Number <span>*</span></label>
                  <input type="tel" id="contactPhone" name="phone" placeholder="Enter 10 digit mobile number" maxlength="10" required>
                </div>

                <div class="col-md-6">
                  <label for="contactEmail">Email Address</label>
                  <input type="email" id="contactEmail" name="email" placeholder="Enter email address">
                </div>

                <div class="col-md-6">
                  <label for="contactCourse">Course Interested In <span>*</span></label>
                  <select id="contactCourse" name="course" required>
                    <option value="">Select Course</option>
                    <option>NEET Preparation</option>
                    <option>JEE Preparation</option>
                    <option>Foundation Course</option>
                    <option>Test Series</option>
                    <option>Scholarship / Fee Concession</option>
                    <option>General Inquiry</option>
                  </select>
                </div>

                <div class="col-12">
                  <label for="contactMessage">Message</label>
                  <textarea id="contactMessage" name="message" rows="5" placeholder="Write your admission, course or support query"></textarea>
                </div>

                <div class="col-12">
                  <div class="contactx-form-check">
                    <input type="checkbox" id="contactAgree" name="agree" value="1" required>
                    <label for="contactAgree">
                      I agree to be contacted by Khadkeshwar NEET JEE Academy for my inquiry.
                    </label>
                  </div>
                </div>

                <div class="col-12">
                  <div class="contactx-form-message" id="contactxFormMessage"></div>
                </div>

                <div class="col-12">
                  <button type="submit" class="btn-main contactx-submit-btn">
                    Submit Inquiry
                    <i class="bi bi-send-fill"></i>
                  </button>
                </div>

              </div>

            </form>

          </div>
        </div>

        <div class="col-lg-5">
          <div class="contactx-sidebar" data-aos="fade-left">

            <span class="section-badge">
              <i class="bi bi-info-circle-fill"></i>
              Academy Support
            </span>

            <h2>Need guidance before admission?</h2>

            <p>
              Our team can guide you about course selection, admission process, test series,
              scholarship support and fee concession eligibility.
            </p>

            <div class="contactx-sidebar-list">

              <div>
                <i class="bi bi-mortarboard-fill"></i>
                <div>
                  <strong>Course Counseling</strong>
                  <span>NEET, JEE, Foundation and Test Series guidance.</span>
                </div>
              </div>

              <div>
                <i class="bi bi-percent"></i>
                <div>
                  <strong>Fee Concession Support</strong>
                  <span>Eligibility-based concession information and document guidance.</span>
                </div>
              </div>

              <div>
                <i class="bi bi-clipboard2-check-fill"></i>
                <div>
                  <strong>Admission Process</strong>
                  <span>Complete support for inquiry and admission next steps.</span>
                </div>
              </div>

            </div>

            <div class="contactx-sidebar-actions">
              <a href="{{ $contactTel }}" class="btn-main">
                Call Now
                <i class="bi bi-telephone-fill"></i>
              </a>

              <a href="{{ $contactMail }}" class="contactx-light-btn">
                Email Us
              </a>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- CONTACT FORM + SIDEBAR END -->


  <!-- MAP START -->
  <section class="contactx-map-section section-padding">
    <div class="container">

      <div class="contactx-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-map-fill"></i>
          Google Map
        </span>

        <h2>Find Khadkeshwar NEET JEE Academy location.</h2>

        <p>
          Use the academy location map for visit planning and admission support.
        </p>
      </div>

      <div class="contactx-map-wrap" data-aos="zoom-in">
        <div class="contactx-map-info">
          <i class="bi bi-geo-alt-fill"></i>
          <div>
            <span>Academy Location</span>
            <h3>{{ $contactAddress }}</h3>
          </div>
        </div>

        <iframe
          src="{{ $contactMapSrc }}"
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          title="Khadkeshwar NEET JEE Academy Location">
        </iframe>
      </div>

    </div>
  </section>
  <!-- MAP END -->


  <!-- QUICK CONTACT START -->
  <section class="contactx-quick-section section-padding">
    <div class="contactx-dark-grid"></div>

    <div class="container">

      <div class="contactx-section-head light" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-lightning-charge-fill"></i>
          Quick Contact
        </span>

        <h2>Choose the fastest way to connect with the academy.</h2>

        <p>
          Phone, email, location and admission inquiry options are available for students and parents.
        </p>
      </div>

      <div class="contactx-quick-grid">

        <a href="{{ $contactTel }}" class="contactx-quick-card" data-aos="zoom-in" data-aos-delay="100">
          <span>01</span>
          <i class="bi bi-telephone-fill"></i>
          <h3>Call Admission Desk</h3>
          <p>Speak directly with academy support.</p>
        </a>

        <a href="{{ $contactMail }}" class="contactx-quick-card" data-aos="zoom-in" data-aos-delay="180">
          <span>02</span>
          <i class="bi bi-envelope-fill"></i>
          <h3>Send Email</h3>
          <p>Share your course or admission query.</p>
        </a>

        <a href="#contact-form" class="contactx-quick-card" data-aos="zoom-in" data-aos-delay="260">
          <span>03</span>
          <i class="bi bi-pencil-square"></i>
          <h3>Submit Inquiry</h3>
          <p>Fill the form and get a callback.</p>
        </a>

        <a href="{{ route('frontend.admission') }}" class="contactx-quick-card" data-aos="zoom-in" data-aos-delay="340">
          <span>04</span>
          <i class="bi bi-mortarboard-fill"></i>
          <h3>Admission Page</h3>
          <p>Start the admission process online.</p>
        </a>

      </div>

    </div>
  </section>
  <!-- QUICK CONTACT END -->


  <!-- FINAL CTA START -->
  <section class="contactx-cta-section section-padding">
    <div class="container">

      <div class="contactx-cta" data-aos="zoom-in">

        <div>
          <span>
            <i class="bi bi-mortarboard-fill"></i>
            {{ $admissionBadgeText }}
          </span>

          <h2>Start your NEET & JEE preparation with the right guidance.</h2>

          <p>
            Contact Khadkeshwar NEET JEE Academy for admission, course guidance,
            test series support and fee concession details.
          </p>
        </div>

        <div class="contactx-cta-actions">
          <a href="#contact-form" class="btn-main">
            Submit Inquiry
            <i class="bi bi-arrow-right"></i>
          </a>

          <a href="{{ $contactTel }}" class="btn-white">
            <i class="bi bi-telephone-fill"></i>
            Call Now
          </a>
        </div>

      </div>

    </div>
  </section>
  <!-- FINAL CTA END -->

</main>

<!-- ========================= CONTACT PAGE END ========================== -->
@endsection
