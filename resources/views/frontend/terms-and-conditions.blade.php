@extends('frontend.master')

@section('content')

<main class="contactx-page">
  <section class="contactx-hero">
    <div class="container">
      <div class="contactx-hero-card" data-aos="fade-up">
        <div class="contactx-hero-content">
          <span class="contactx-kicker">
            <i class="bi bi-file-earmark-text-fill"></i>
            Terms
          </span>
          <h1>Terms &amp; Conditions</h1>
          <p>
            Website information, course details, scholarship support and admissions guidance are
            subject to academy confirmation and applicable eligibility.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="contactx-details section-padding">
    <div class="container">
      <div class="contactx-detail-grid">
        <div class="contactx-detail-card">
          <i class="bi bi-mortarboard-fill"></i>
          <span>Admissions</span>
          <h3>Final Confirmation</h3>
          <p>Admission, batch and fee details are confirmed by the academy team.</p>
        </div>
        <div class="contactx-detail-card featured">
          <i class="bi bi-award-fill"></i>
          <span>Scholarship</span>
          <h3>Eligibility Based</h3>
          <p>Scholarship or concession approval depends on eligibility, documents and decision.</p>
        </div>
        <div class="contactx-detail-card">
          <i class="bi bi-info-circle-fill"></i>
          <span>Website</span>
          <h3>Information Updates</h3>
          <p>Website content may be updated as courses, results and academy services change.</p>
        </div>
      </div>
    </div>
  </section>
</main>

@endsection
