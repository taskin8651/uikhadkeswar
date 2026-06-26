@extends('frontend.master')
@section('content')


<!-- ========================= GALLERY PAGE START ========================== -->

<main class="galleryx-page">

  <!-- HERO START -->
  <section class="galleryx-hero">
    <div class="galleryx-bg-grid"></div>
    <div class="galleryx-orb galleryx-orb-1"></div>
    <div class="galleryx-orb galleryx-orb-2"></div>
    <div class="galleryx-orb galleryx-orb-3"></div>

    <div class="container">

      <nav class="galleryx-breadcrumb" data-aos="fade-up">
        <a href="index.html">
          <i class="bi bi-house-door-fill"></i>
          Home
        </a>
        <i class="bi bi-chevron-right"></i>
        <span>Gallery</span>
      </nav>

      <div class="galleryx-hero-card" data-aos="fade-up">
        <div class="galleryx-hero-shine"></div>

        <div class="row g-0 align-items-stretch">

          <div class="col-lg-7">
            <div class="galleryx-hero-content">

              <span class="galleryx-kicker">
                <i class="bi bi-images"></i>
                Academy Photos & Videos
              </span>

              <h1>
                Life at
                <span>Khadkeshwar Academy</span>
              </h1>

              <p>
                Explore our classrooms, student activities, academic events, seminars,
                learning environment and videos from Khadkeshwar NEET JEE Academy.
                This gallery is designed to support photos, videos, MP4 clips and YouTube embeds.
              </p>

              <div class="galleryx-hero-tags">
                <span><i class="bi bi-check-circle-fill"></i> Photos</span>
                <span><i class="bi bi-check-circle-fill"></i> Videos</span>
                <span><i class="bi bi-check-circle-fill"></i> Classroom</span>
                <span><i class="bi bi-check-circle-fill"></i> Events</span>
              </div>

              <div class="galleryx-hero-actions">
                <a href="#gallery-media" class="btn-main">
                  View Gallery
                  <i class="bi bi-arrow-right"></i>
                </a>

                <button class="galleryx-outline-btn" data-bs-toggle="modal" data-bs-target="#admissionModal">
                  Apply Now
                  <i class="bi bi-mortarboard-fill"></i>
                </button>
              </div>

            </div>
          </div>

          <div class="col-lg-5">
            <div class="galleryx-hero-visual">

              <div class="galleryx-visual-grid">

                <button class="galleryx-visual-card tall galleryx-open-lightbox"
                  type="button"
                  data-type="image"
                  data-src="assets/img/img3.jpeg"
                  data-title="Classroom Learning">
                  <img src="assets/img/img3.jpeg" alt="Classroom learning at Khadkeshwar Academy" loading="lazy">
                  <span>Classroom</span>
                </button>

                <button class="galleryx-visual-card galleryx-open-lightbox"
                  type="button"
                  data-type="image"
                  data-src="assets/img/img4.jpeg"
                  data-title="Student Activity">
                  <img src="assets/img/img2.jpeg" alt="Student activity at Khadkeshwar Academy" loading="lazy">
                  <span>Activities</span>
                </button>

                <button class="galleryx-visual-card video galleryx-open-lightbox"
                  type="button"
                  data-type="youtube"
                  data-src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                  data-title="Academy Video">
                  <img src="assets/img/img4.jpeg" alt="Academy video thumbnail" loading="lazy">
                  <i class="bi bi-play-fill"></i>
                  <span>Video</span>
                </button>

              </div>

              <div class="galleryx-hero-info-row">
                <div>
                  <i class="bi bi-camera-fill"></i>
                  <span>Photo Gallery</span>
                </div>

                <div>
                  <i class="bi bi-play-btn-fill"></i>
                  <span>Video Gallery</span>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>

    </div>
  </section>
  <!-- HERO END -->


  <!-- GALLERY OVERVIEW START -->
  <section class="galleryx-overview section-padding">
    <div class="container">

      <div class="galleryx-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-grid-3x3-gap-fill"></i>
          Gallery Overview
        </span>

        <h2>Photos, videos, events and academy moments in one place.</h2>

        <p>
          Gallery page is built with filters, lightbox image preview, video popup,
          responsive masonry layout and lazy loading support.
        </p>
      </div>

      <div class="galleryx-overview-grid">

        <div class="galleryx-overview-card" data-aos="fade-up" data-aos-delay="100">
          <i class="bi bi-images"></i>
          <h3>Photo Gallery</h3>
          <p>Show classroom, academy, event and student activity photos in a premium grid.</p>
        </div>

        <div class="galleryx-overview-card featured" data-aos="fade-up" data-aos-delay="180">
          <i class="bi bi-play-btn-fill"></i>
          <h3>Video Gallery</h3>
          <p>Support MP4 videos and YouTube embedded videos with popup preview.</p>
        </div>

        <div class="galleryx-overview-card" data-aos="fade-up" data-aos-delay="260">
          <i class="bi bi-funnel-fill"></i>
          <h3>Smart Filters</h3>
          <p>Filter gallery by Photos, Videos, Events, Classroom, Seminars and Activities.</p>
        </div>

        <div class="galleryx-overview-card" data-aos="fade-up" data-aos-delay="340">
          <i class="bi bi-phone-fill"></i>
          <h3>Responsive Layout</h3>
          <p>Clean masonry-style layout for desktop, tablet and mobile screens.</p>
        </div>

      </div>

    </div>
  </section>
  <!-- GALLERY OVERVIEW END -->


  <!-- GALLERY MEDIA START -->
  <section class="galleryx-media-section section-padding" id="gallery-media">
    <div class="container">

      <div class="galleryx-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-collection-play-fill"></i>
          Full Gallery
        </span>

        <h2>Explore classrooms, seminars, student activities and videos.</h2>

        <p>
          Replace placeholder image paths with real academy photos and videos from client.
        </p>
      </div>

      <!-- FILTER TABS -->
      @if(isset($galleryCategories) && $galleryCategories->count())
      <div class="galleryx-filter-wrap" data-aos="fade-up">
        <button class="galleryx-filter active" type="button" data-filter="all">
          <i class="bi bi-grid-fill"></i>
          All
        </button>

        @foreach($galleryCategories as $category)
          <button class="galleryx-filter" type="button" data-filter="{{ $category->slug }}">
            <i class="{{ $category->icon ?: 'bi bi-grid-fill' }}"></i>
            {{ $category->name }}
          </button>
        @endforeach
      </div>
      @else
      <div class="galleryx-filter-wrap" data-aos="fade-up">
        <button class="galleryx-filter active" type="button" data-filter="all">
          <i class="bi bi-grid-fill"></i>
          All
        </button>
      </div>
      @endif

      <!-- MASONRY GRID -->
      @if(isset($galleryItems) && $galleryItems->count())
      <div class="galleryx-grid">
        @foreach($galleryItems as $index => $item)
          @php
            $itemClass = $item->layout === 'tall' ? ' galleryx-tall' : ($item->layout === 'wide' ? ' galleryx-wide' : '');
            $thumb = $item->thumbnailSource();
            $src = $item->mediaSource();
            $delay = 80 + ($index * 40);
          @endphp
          <div class="galleryx-item{{ $itemClass }}" data-category="{{ $item->category_slugs }}" data-aos="fade-up" data-aos-delay="{{ $delay }}">
            <button class="galleryx-card {{ $item->media_type !== 'image' ? 'video' : '' }} galleryx-open-lightbox"
              type="button"
              data-type="{{ $item->media_type }}"
              data-src="{{ $src }}"
              data-title="{{ $item->title }}">
              <img src="{{ $thumb }}" alt="{{ $item->alt_text ?: $item->title }}" loading="lazy">
              <div class="galleryx-action-btn zoom">
                <i class="bi bi-zoom-in"></i>
              </div>
              @if($item->media_type !== 'image')
                <i class="bi bi-play-fill galleryx-play-icon"></i>
              @endif
              <div class="galleryx-card-overlay">
                @if($item->label)
                  <span>{{ $item->label }}</span>
                @endif
                <h3>{{ $item->title }}</h3>
                <small>
                  <i class="bi {{ $item->media_type === 'image' ? 'bi-zoom-in' : 'bi-play-circle-fill' }}"></i>
                  {{ $item->media_type === 'image' ? 'View Photo' : 'Watch Video' }}
                </small>
              </div>
            </button>
          </div>
        @endforeach
      </div>
      @else
      <div class="galleryx-grid">

        <!-- PHOTO 01 -->
        <div class="galleryx-item galleryx-tall" data-category="photos classroom" data-aos="fade-up" data-aos-delay="80">
          <button class="galleryx-card galleryx-open-lightbox"
            type="button"
            data-type="image"
            data-src="assets/img/img2.jpeg"
            data-title="Classroom Learning Environment">
            <img src="assets/img/img2.jpeg" alt="Classroom learning environment" loading="lazy">
            <div class="galleryx-action-btn zoom">
            <i class="bi bi-zoom-in"></i>
            </div>
            <div class="galleryx-card-overlay">
              <span>Classroom</span>
              <h3>Classroom Learning Environment</h3>
              <small><i class="bi bi-zoom-in"></i> View Photo</small>
            </div>
          </button>
        </div>

        <!-- PHOTO 02 -->
        <div class="galleryx-item" data-category="photos activities" data-aos="fade-up" data-aos-delay="120">
          <button class="galleryx-card galleryx-open-lightbox"
            type="button"
            data-type="image"
            data-src="assets/img/img3.jpeg"
            data-title="Student Activity">
            <img src="assets/img/img3.jpeg" alt="Student activity" loading="lazy">
            <div class="galleryx-action-btn zoom">
            <i class="bi bi-zoom-in"></i>
            </div>
            <div class="galleryx-card-overlay">
              <span>Activities</span>
              <h3>Student Activity</h3>
              <small><i class="bi bi-zoom-in"></i> View Photo</small>
            </div>
          </button>
        </div>

        <!-- VIDEO 01 YOUTUBE -->
        <div class="galleryx-item galleryx-wide" data-category="videos events" data-aos="fade-up" data-aos-delay="160">
          <button class="galleryx-card video galleryx-open-lightbox"
            type="button"
            data-type="youtube"
            data-src="assets/img/img2.jpeg"
            data-title="Academy Event Video">
            <img src="assets/img/img2.jpeg" alt="Academy event video" loading="lazy">
            <div class="galleryx-action-btn zoom">
            <i class="bi bi-zoom-in"></i>
            </div>
            <i class="bi bi-play-fill galleryx-play-icon"></i>
            <div class="galleryx-card-overlay">
              <span>Video</span>
              <h3>Academy Event Video</h3>
              <small><i class="bi bi-play-circle-fill"></i> Watch Video</small>
            </div>
          </button>
        </div>

        <!-- PHOTO 03 -->
        <div class="galleryx-item" data-category="photos seminars" data-aos="fade-up" data-aos-delay="200">
          <button class="galleryx-card galleryx-open-lightbox"
            type="button"
            data-type="image"
            data-src="assets/images/gallery/seminar-1.jpg"
            data-title="Career Guidance Seminar">
            <img src="assets/img/img5.jpeg" alt="Career guidance seminar" loading="lazy">
            <div class="galleryx-action-btn zoom">
            <i class="bi bi-zoom-in"></i>
            </div>
            <div class="galleryx-card-overlay">
              <span>Seminar</span>
              <h3>Career Guidance Seminar</h3>
              <small><i class="bi bi-zoom-in"></i> View Photo</small>
            </div>
          </button>
        </div>

        <!-- PHOTO 04 -->
        <div class="galleryx-item galleryx-tall" data-category="photos events" data-aos="fade-up" data-aos-delay="240">
          <button class="galleryx-card galleryx-open-lightbox"
            type="button"
            data-type="image"
            data-src="assets/images/gallery/event-1.jpg"
            data-title="Academic Event">
            <img src="assets/img/img6.jpeg" alt="Academic event" loading="lazy">
            <div class="galleryx-action-btn zoom">
            <i class="bi bi-zoom-in"></i>
            </div>
            <div class="galleryx-card-overlay">
              <span>Event</span>
              <h3>Academic Event</h3>
              <small><i class="bi bi-zoom-in"></i> View Photo</small>
            </div>
          </button>
        </div>

        <!-- VIDEO 02 MP4 -->
        <div class="galleryx-item" data-category="videos classroom" data-aos="fade-up" data-aos-delay="280">
          <button class="galleryx-card video galleryx-open-lightbox"
            type="button"
            data-type="video"
            data-src="assets/videos/academy-video-1.mp4"
            data-title="Classroom Video">
            <img src="assets/img/img4.jpeg" alt="Classroom video thumbnail" loading="lazy">
            <div class="galleryx-action-btn zoom">
            <i class="bi bi-zoom-in"></i>
            </div>
            <i class="bi bi-play-fill galleryx-play-icon"></i>
            <div class="galleryx-card-overlay">
              <span>MP4 Video</span>
              <h3>Classroom Video</h3>
              <small><i class="bi bi-play-circle-fill"></i> Watch Video</small>
            </div>
          </button>
        </div>

        <!-- PHOTO 05 -->
        <div class="galleryx-item" data-category="photos classroom" data-aos="fade-up" data-aos-delay="320">
          <button class="galleryx-card galleryx-open-lightbox"
            type="button"
            data-type="image"
            data-src="assets/img/img8.jpeg"
            data-title="Focused Study Session">
            <img src="assets/img/img8.jpeg" alt="Focused study session" loading="lazy">
            <div class="galleryx-action-btn zoom">
            <i class="bi bi-zoom-in"></i>
            </div>
            <div class="galleryx-card-overlay">
              <span>Classroom</span>
              <h3>Focused Study Session</h3>
              <small><i class="bi bi-zoom-in"></i> View Photo</small>
            </div>
          </button>
        </div>

         <div class="galleryx-item" data-category="photos classroom" data-aos="fade-up" data-aos-delay="320">
          <button class="galleryx-card galleryx-open-lightbox"
            type="button"
            data-type="image"
            data-src="assets/img/img9.jpeg"
            data-title="Focused Study Session">
            <img src="assets/img/img9.jpeg" alt="Focused study session" loading="lazy">
            <div class="galleryx-action-btn zoom">
            <i class="bi bi-zoom-in"></i>
            </div>
            <div class="galleryx-card-overlay">
              <span>Classroom</span>
              <h3>Focused Study Session</h3>
              <small><i class="bi bi-zoom-in"></i> View Photo</small>
            </div>
          </button>
        </div>

         <div class="galleryx-item" data-category="photos classroom" data-aos="fade-up" data-aos-delay="320">
          <button class="galleryx-card galleryx-open-lightbox"
            type="button"
            data-type="image"
            data-src="assets/img/img10.jpeg"
            data-title="Focused Study Session">
            <img src="assets/img/img10.jpeg" alt="Focused study session" loading="lazy">
            <div class="galleryx-action-btn zoom">
            <i class="bi bi-zoom-in"></i>
            </div>
            <div class="galleryx-card-overlay">
              <span>Classroom</span>
              <h3>Focused Study Session</h3>
              <small><i class="bi bi-zoom-in"></i> View Photo</small>
            </div>
          </button>
        </div>

        <!-- PHOTO 06 -->
        <div class="galleryx-item galleryx-wide" data-category="photos activities" data-aos="fade-up" data-aos-delay="360">
          <button class="galleryx-card galleryx-open-lightbox"
            type="button"
            data-type="image"
            data-src="assets/img/img3.jpeg"
            data-title="Student Activities">
            <img src="assets/img/img3.jpeg" alt="Student activities" loading="lazy">
            <div class="galleryx-action-btn zoom">
            <i class="bi bi-zoom-in"></i>
            </div>
            <div class="galleryx-card-overlay">
              <span>Activities</span>
              <h3>Student Activities</h3>
              <small><i class="bi bi-zoom-in"></i> View Photo</small>
            </div>
          </button>
        </div>

        <!-- PHOTO 07 -->
        <div class="galleryx-item" data-category="photos seminars" data-aos="fade-up" data-aos-delay="400">
          <button class="galleryx-card galleryx-open-lightbox"
            type="button"
            data-type="image"
            data-src="assets/img/img4.jpeg"
            data-title="Academic Seminar">
            <img src="assets/img/img4.jpeg" alt="Academic seminar" loading="lazy">
            <div class="galleryx-action-btn zoom">
            <i class="bi bi-zoom-in"></i>
            </div>
            <div class="galleryx-card-overlay">
              <span>Seminar</span>
              <h3>Academic Seminar</h3>
              <small><i class="bi bi-zoom-in"></i> View Photo</small>
            </div>
          </button>
        </div>

        <!-- VIDEO 03 -->
        <div class="galleryx-item" data-category="videos activities" data-aos="fade-up" data-aos-delay="440">
          <button class="galleryx-card video galleryx-open-lightbox"
            type="button"
            data-type="youtube"
            data-src="assets/img/img2.jpeg"
            data-title="Student Activity Video">
            <img src="assets/img/img2.jpeg" alt="Student activity video thumbnail" loading="lazy">
            <div class="galleryx-action-btn zoom">
            <i class="bi bi-zoom-in"></i>
            </div>
            <i class="bi bi-play-fill galleryx-play-icon"></i>
            <div class="galleryx-card-overlay">
              <span>Video</span>
              <h3>Student Activity Video</h3>
              <small><i class="bi bi-play-circle-fill"></i> Watch Video</small>
            </div>
          </button>
        </div>

      </div>
      @endif

    </div>
  </section>
  <!-- GALLERY MEDIA END -->


  <!-- MEDIA SUPPORT START -->
  <section class="galleryx-support section-padding">
    <div class="galleryx-dark-grid"></div>

    <div class="container">

      <div class="galleryx-section-head light" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-file-earmark-play-fill"></i>
          Media Support
        </span>

        <h2>Built for real academy photos, videos and future media updates.</h2>

        <p>
          This gallery supports multiple media types and can be updated later with real client photos and videos.
        </p>
      </div>

      <div class="galleryx-support-grid">

        <div class="galleryx-support-card" data-aos="zoom-in" data-aos-delay="100">
          <span>01</span>
          <i class="bi bi-filetype-jpg"></i>
          <h3>JPG / PNG / WebP</h3>
          <p>Supports optimized photo formats for fast loading and clean display.</p>
        </div>

        <div class="galleryx-support-card" data-aos="zoom-in" data-aos-delay="180">
          <span>02</span>
          <i class="bi bi-filetype-mp4"></i>
          <h3>MP4 Video</h3>
          <p>Direct MP4 videos can open inside a video popup player.</p>
        </div>

        <div class="galleryx-support-card" data-aos="zoom-in" data-aos-delay="260">
          <span>03</span>
          <i class="bi bi-youtube"></i>
          <h3>YouTube Embed</h3>
          <p>YouTube videos can be opened in a clean popup modal.</p>
        </div>

        <div class="galleryx-support-card" data-aos="zoom-in" data-aos-delay="340">
          <span>04</span>
          <i class="bi bi-speedometer2"></i>
          <h3>Lazy Loading</h3>
          <p>Images use lazy loading for better mobile and page performance.</p>
        </div>

      </div>

    </div>
  </section>
  <!-- MEDIA SUPPORT END -->


  <!-- CTA START -->
  <section class="galleryx-cta-section section-padding">
    <div class="container">

      <div class="galleryx-cta" data-aos="zoom-in">

        <div>
          <span>
            <i class="bi bi-mortarboard-fill"></i>
            Visit Khadkeshwar Academy
          </span>

          <h2>Want to know more about our classroom environment?</h2>

          <p>
            Contact Khadkeshwar NEET JEE Academy for admission inquiry, course details,
            test series support and student guidance.
          </p>
        </div>

        <div class="galleryx-cta-actions">
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


  <!-- LIGHTBOX MODAL START -->
  <div class="galleryx-lightbox" id="galleryxLightbox" aria-hidden="true">
    <div class="galleryx-lightbox-backdrop" data-gallery-close></div>

    <div class="galleryx-lightbox-dialog">
      <div class="galleryx-lightbox-header">
        <h3 id="galleryxLightboxTitle">Gallery Preview</h3>

        <button type="button" class="galleryx-lightbox-close" data-gallery-close aria-label="Close gallery preview">
          <i class="bi bi-x-lg"></i>
        </button>
      </div>

      <div class="galleryx-lightbox-body" id="galleryxLightboxBody"></div>
    </div>
  </div>
  <!-- LIGHTBOX MODAL END -->

</main>

<!-- ========================= GALLERY PAGE END ========================== -->
@endsection
