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
<main class="contactx-page">
  <section class="contactx-hero">
    <div class="container">
      <div class="contactx-hero-card" data-aos="fade-up">
        <div class="contactx-hero-content">
          <span class="contactx-kicker">
            <i class="bi bi-shield-check"></i>
            Policy
          </span>
          <h1>Privacy Policy</h1>
          <p>
            Khadkeshwar NEET JEE Academy uses submitted inquiry details only for admission,
            course guidance, scholarship support and student communication.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="contactx-details section-padding">
    <div class="container">
      <div class="contactx-detail-grid">
        <div class="contactx-detail-card">
          <i class="bi bi-person-lock"></i>
          <span>Data Use</span>
          <h3>Inquiry Support</h3>
          <p>Student and parent details are used to respond to submitted requests.</p>
        </div>
        <div class="contactx-detail-card featured">
          <i class="bi bi-envelope-check"></i>
          <span>Communication</span>
          <h3>Admission Updates</h3>
          <p>The academy may contact users by phone, WhatsApp or email for relevant guidance.</p>
        </div>
        <div class="contactx-detail-card">
          <i class="bi bi-shield-lock"></i>
          <span>Protection</span>
          <h3>Responsible Handling</h3>
          <p>Information is handled responsibly and is not meant for unrelated public sharing.</p>
        </div>
      </div>
    </div>
  </section>
</main>

@endsection
