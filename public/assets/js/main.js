

/* =========================================================
   KHADKESWAR NEET JEE ACADEMY - MAIN JS
   File: assets/js/main.js
   Features:
   1. Sticky header
   2. Gallery tabs
   3. Image lightbox
   4. Video modal
   5. Admission form validation
   6. Mobile menu close
   7. AOS animation init
   8. Premium hover tilt animation
========================================================= */

"use strict";

/* =========================
   STICKY HEADER JS
========================= */
const mainHeader = document.getElementById("mainHeader");

window.addEventListener("scroll", () => {
  if (window.scrollY > 40) {
    mainHeader.classList.add("scrolled");
  } else {
    mainHeader.classList.remove("scrolled");
  }
});

/* =========================
   GALLERY TAB JS
========================= */
const galleryTabs = document.querySelectorAll(".gallery-tab");
const photoGallery = document.getElementById("photoGallery");
const videoGallery = document.getElementById("videoGallery");

galleryTabs.forEach((tab) => {
  tab.addEventListener("click", () => {
    galleryTabs.forEach((btn) => btn.classList.remove("active"));
    tab.classList.add("active");

    const filter = tab.getAttribute("data-filter");

    if (filter === "photos") {
      photoGallery.classList.remove("hidden-gallery");
      videoGallery.classList.add("hidden-gallery");
    } else {
      videoGallery.classList.remove("hidden-gallery");
      photoGallery.classList.add("hidden-gallery");
    }

    if (typeof AOS !== "undefined") {
      AOS.refresh();
    }
  });
});



document.addEventListener("DOMContentLoaded", function () {
  const tabs = document.querySelectorAll(".gallery-tab");
  const photoGallery = document.getElementById("photoGallery");
  const videoGallery = document.getElementById("videoGallery");

  const lightbox = document.getElementById("galleryLightbox");
  const lightboxImage = document.getElementById("lightboxImage");
  const lightboxVideo = document.getElementById("lightboxVideo");
  const lightboxTitle = document.getElementById("lightboxTitle");

  const closeBtn = document.querySelector(".lightbox-close");
  const prevBtn = document.querySelector(".lightbox-prev");
  const nextBtn = document.querySelector(".lightbox-next");

  let currentItems = [];
  let currentIndex = 0;
  let currentType = "image";

  tabs.forEach((tab) => {
    tab.addEventListener("click", function () {
      tabs.forEach((btn) => btn.classList.remove("active"));
      this.classList.add("active");

      const filter = this.getAttribute("data-filter");

      if (filter === "photos") {
        photoGallery.classList.remove("hidden-gallery");
        videoGallery.classList.add("hidden-gallery");
      } else {
        videoGallery.classList.remove("hidden-gallery");
        photoGallery.classList.add("hidden-gallery");
      }
    });
  });

  function openImageLightbox(index) {
    currentType = "image";
    currentItems = Array.from(document.querySelectorAll("#photoGallery .gallery-item"));
    currentIndex = index;
    showCurrentItem();
  }

  function openVideoLightbox(index) {
    currentType = "video";
    currentItems = Array.from(document.querySelectorAll("#videoGallery .video-item"));
    currentIndex = index;
    showCurrentItem();
  }

  function showCurrentItem() {
    const item = currentItems[currentIndex];
    const title = item.getAttribute("data-title") || "Gallery Preview";

    lightbox.classList.add("active");
    document.body.style.overflow = "hidden";
    lightboxTitle.textContent = title;

    if (currentType === "image") {
      const imageSrc = item.getAttribute("data-img");

      lightboxImage.src = imageSrc;
      lightboxImage.style.display = "block";

      lightboxVideo.src = "";
      lightboxVideo.style.display = "none";
    } else {
      const videoSrc = item.getAttribute("data-video");

      lightboxVideo.src = videoSrc + "?autoplay=1";
      lightboxVideo.style.display = "block";

      lightboxImage.src = "";
      lightboxImage.style.display = "none";
    }
  }

  function closeLightbox() {
    lightbox.classList.remove("active");
    document.body.style.overflow = "";
    lightboxImage.src = "";
    lightboxVideo.src = "";
  }

  function showPrev() {
    currentIndex = (currentIndex - 1 + currentItems.length) % currentItems.length;
    showCurrentItem();
  }

  function showNext() {
    currentIndex = (currentIndex + 1) % currentItems.length;
    showCurrentItem();
  }

  document.querySelectorAll("#photoGallery .gallery-item").forEach((item, index) => {
    item.addEventListener("click", function () {
      openImageLightbox(index);
    });
  });

  document.querySelectorAll("#videoGallery .video-item").forEach((item, index) => {
    item.addEventListener("click", function () {
      openVideoLightbox(index);
    });
  });

  closeBtn.addEventListener("click", closeLightbox);
  prevBtn.addEventListener("click", showPrev);
  nextBtn.addEventListener("click", showNext);

  lightbox.addEventListener("click", function (e) {
    if (e.target === lightbox) {
      closeLightbox();
    }
  });

  document.addEventListener("keydown", function (e) {
    if (!lightbox.classList.contains("active")) return;

    if (e.key === "Escape") closeLightbox();
    if (e.key === "ArrowLeft") showPrev();
    if (e.key === "ArrowRight") showNext();
  });
});



/* =========================
   IMAGE LIGHTBOX JS
========================= */
const imageLightboxEl = document.getElementById("imageLightbox");
const lightboxImg = document.getElementById("lightboxImg");

if (imageLightboxEl && lightboxImg) {
  const imageLightbox = new bootstrap.Modal(imageLightboxEl);

  document.querySelectorAll(".gallery-item[data-img]").forEach((item) => {
    item.addEventListener("click", () => {
      const img = item.getAttribute("data-img");
      lightboxImg.src = img;
      imageLightbox.show();
    });
  });

  imageLightboxEl.addEventListener("hidden.bs.modal", () => {
    lightboxImg.src = "";
  });
}

/* =========================
   VIDEO MODAL JS
========================= */
const videoModalEl = document.getElementById("videoModal");
const videoFrame = document.getElementById("videoFrame");

if (videoModalEl && videoFrame) {
  const videoModal = new bootstrap.Modal(videoModalEl);

  document.querySelectorAll(".video-item").forEach((item) => {
    item.addEventListener("click", () => {
      const video = item.getAttribute("data-video");
      videoFrame.src = video + "?autoplay=1";
      videoModal.show();
    });
  });

  videoModalEl.addEventListener("hidden.bs.modal", () => {
    videoFrame.src = "";
  });
}

/* =========================
   ADMISSION FORM VALIDATION JS
========================= */
const admissionForm = document.getElementById("admissionForm");
const successMsg = document.getElementById("successMsg");

if (admissionForm && successMsg) {
  admissionForm.addEventListener("submit", (e) => {
    const phoneInput = admissionForm.querySelector('input[name="mobile_number"]');
    const phone = phoneInput.value.trim();
    const phoneValid = /^[0-9]{10}$/.test(phone);

    if (!phoneValid) {
      e.preventDefault();
      alert("Please enter a valid 10 digit mobile number.");
      phoneInput.focus();
      return;
    }
  });
}

/* =========================
   MOBILE MENU CLOSE JS
========================= */
const navCollapse = document.getElementById("mainNav");

if (navCollapse) {
  const bsCollapse = new bootstrap.Collapse(navCollapse, { toggle: false });

  document.querySelectorAll(".navbar-nav .nav-link, .dropdown-item").forEach((link) => {
    link.addEventListener("click", () => {
      if (window.innerWidth < 1200 && navCollapse.classList.contains("show")) {
        bsCollapse.hide();
      }
    });
  });
}

/* =========================
   AOS ANIMATION JS
========================= */
if (typeof AOS !== "undefined") {
  AOS.init({
    duration: 900,
    easing: "ease-out-cubic",
    once: true,
    offset: 90,
    delay: 0
  });
}

/* =========================
   PREMIUM HOVER TILT JS
========================= */
const tiltCards = document.querySelectorAll(".tilt-card");

tiltCards.forEach((card) => {
  card.addEventListener("mousemove", (e) => {
    if (window.innerWidth < 992) return;

    const rect = card.getBoundingClientRect();

    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    const centerX = rect.width / 2;
    const centerY = rect.height / 2;

    const rotateX = ((y - centerY) / centerY) * -4;
    const rotateY = ((x - centerX) / centerX) * 4;

    card.style.transform = `perspective(900px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-4px)`;
  });

  card.addEventListener("mouseleave", () => {
    card.style.transform = "";
  });
});

/* =========================
   BUTTON RIPPLE JS
========================= */
document.querySelectorAll(".btn-main, .btn-white, .btn-outline-main").forEach((button) => {
  button.addEventListener("mouseenter", () => {
    button.style.letterSpacing = ".2px";
  });

  button.addEventListener("mouseleave", () => {
    button.style.letterSpacing = "0";
  });
});



/* =========================================================
   FACULTY INTRO VIDEO MODAL
========================================================= */
document.addEventListener("DOMContentLoaded", function () {
  const videoModal = document.getElementById("facultyVideoModal");
  const videoFrame = document.getElementById("facultyVideoFrame");
  const videoTitle = document.getElementById("facultyVideoTitle");
  const videoButtons = document.querySelectorAll(".faculty-video-btn");

  videoButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const videoUrl = this.getAttribute("data-video");
      const title = this.getAttribute("data-title") || "Faculty Intro Video";

      videoFrame.src = videoUrl;
      videoTitle.textContent = title;
    });
  });

  if (videoModal) {
    videoModal.addEventListener("hidden.bs.modal", function () {
      videoFrame.src = "";
    });
  }
});











/* =========================================================
   CERTIFICATE IMAGE ZOOM LIGHTBOX
========================================================= */
document.addEventListener("DOMContentLoaded", function () {
  const certificateCards = document.querySelectorAll(
    ".certificate-feature-card, .certificate-mini-card"
  );

  const lightbox = document.getElementById("certificateLightbox");
  const lightboxImg = document.getElementById("certificateLightboxImg");
  const closeBtn = document.querySelector(".certificate-lightbox-close");
  const prevBtn = document.querySelector(".certificate-lightbox-prev");
  const nextBtn = document.querySelector(".certificate-lightbox-next");

  if (!certificateCards.length || !lightbox || !lightboxImg) return;

  const images = Array.from(certificateCards)
    .map((card) => card.querySelector("img"))
    .filter(Boolean);

  let currentIndex = 0;

  function openCertificate(index) {
    currentIndex = index;
    lightboxImg.src = images[currentIndex].src;
    lightboxImg.alt = images[currentIndex].alt || "Certificate Preview";
    lightbox.classList.add("active");
    document.body.classList.add("certificate-lightbox-open");
  }

  function closeCertificate() {
    lightbox.classList.remove("active");
    document.body.classList.remove("certificate-lightbox-open");
    lightboxImg.src = "";
  }

  function showNextCertificate() {
    currentIndex = (currentIndex + 1) % images.length;
    lightboxImg.src = images[currentIndex].src;
    lightboxImg.alt = images[currentIndex].alt || "Certificate Preview";
  }

  function showPrevCertificate() {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    lightboxImg.src = images[currentIndex].src;
    lightboxImg.alt = images[currentIndex].alt || "Certificate Preview";
  }

  certificateCards.forEach((card, index) => {
    const zoomBtn = card.querySelector(".certificate-zoom-btn");

    card.addEventListener("click", function (e) {
      if (e.target.closest(".certificate-zoom-btn") || e.target.tagName === "IMG") {
        openCertificate(index);
      }
    });

    if (zoomBtn) {
      zoomBtn.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        openCertificate(index);
      });
    }
  });

  if (closeBtn) {
    closeBtn.addEventListener("click", closeCertificate);
  }

  if (nextBtn) {
    nextBtn.addEventListener("click", showNextCertificate);
  }

  if (prevBtn) {
    prevBtn.addEventListener("click", showPrevCertificate);
  }

  lightbox.addEventListener("click", function (e) {
    if (e.target === lightbox) {
      closeCertificate();
    }
  });

  document.addEventListener("keydown", function (e) {
    if (!lightbox.classList.contains("active")) return;

    if (e.key === "Escape") closeCertificate();
    if (e.key === "ArrowRight") showNextCertificate();
    if (e.key === "ArrowLeft") showPrevCertificate();
  });
});



/* =========================================================
   CERTIFICATE CAROUSEL + LIGHTBOX
========================================================= */
document.addEventListener("DOMContentLoaded", function () {
  const carousel = document.getElementById("certificateCarousel");
  if (!carousel) return;

  const slides = Array.from(carousel.querySelectorAll(".certificate-carousel-slide"));
  const dots = Array.from(carousel.querySelectorAll(".certificate-carousel-dots button"));
  const prevBtn = carousel.querySelector(".certificate-carousel-prev");
  const nextBtn = carousel.querySelector(".certificate-carousel-next");

  const lightbox = document.getElementById("certificateLightbox");
  const lightboxImg = document.getElementById("certificateLightboxImg");
  const lightboxClose = document.querySelector(".certificate-lightbox-close");
  const lightboxPrev = document.querySelector(".certificate-lightbox-prev");
  const lightboxNext = document.querySelector(".certificate-lightbox-next");

  let currentIndex = 0;
  let timer = null;

  function showSlide(index) {
    currentIndex = (index + slides.length) % slides.length;

    slides.forEach((slide, i) => {
      slide.classList.toggle("active", i === currentIndex);
    });

    dots.forEach((dot, i) => {
      dot.classList.toggle("active", i === currentIndex);
    });
  }

  function nextSlide() {
    showSlide(currentIndex + 1);
  }

  function prevSlide() {
    showSlide(currentIndex - 1);
  }

  function startAuto() {
    stopAuto();
    timer = setInterval(nextSlide, 3500);
  }

  function stopAuto() {
    if (timer) {
      clearInterval(timer);
      timer = null;
    }
  }

  if (nextBtn) {
    nextBtn.addEventListener("click", function () {
      nextSlide();
      startAuto();
    });
  }

  if (prevBtn) {
    prevBtn.addEventListener("click", function () {
      prevSlide();
      startAuto();
    });
  }

  dots.forEach((dot, index) => {
    dot.addEventListener("click", function () {
      showSlide(index);
      startAuto();
    });
  });

  carousel.addEventListener("mouseenter", stopAuto);
  carousel.addEventListener("mouseleave", startAuto);

  function openLightbox(index) {
    if (!lightbox || !lightboxImg) return;

    const img = slides[index].querySelector("img");
    if (!img) return;

    currentIndex = index;
    lightboxImg.src = img.src;
    lightboxImg.alt = img.alt || "Certificate Preview";

    lightbox.classList.add("active");
    document.body.classList.add("certificate-lightbox-open");
    stopAuto();
  }

  function closeLightbox() {
    if (!lightbox || !lightboxImg) return;

    lightbox.classList.remove("active");
    document.body.classList.remove("certificate-lightbox-open");
    lightboxImg.src = "";
    startAuto();
  }

  function lightboxNextSlide() {
    currentIndex = (currentIndex + 1) % slides.length;
    const img = slides[currentIndex].querySelector("img");
    if (!img) return;

    lightboxImg.src = img.src;
    lightboxImg.alt = img.alt || "Certificate Preview";
    showSlide(currentIndex);
  }

  function lightboxPrevSlide() {
    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
    const img = slides[currentIndex].querySelector("img");
    if (!img) return;

    lightboxImg.src = img.src;
    lightboxImg.alt = img.alt || "Certificate Preview";
    showSlide(currentIndex);
  }

  slides.forEach((slide, index) => {
    const img = slide.querySelector("img");
    const zoomBtn = slide.querySelector(".certificate-zoom-btn");

    if (img) {
      img.addEventListener("click", function () {
        openLightbox(index);
      });
    }

    if (zoomBtn) {
      zoomBtn.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        openLightbox(index);
      });
    }
  });

  if (lightboxClose) {
    lightboxClose.addEventListener("click", closeLightbox);
  }

  if (lightboxNext) {
    lightboxNext.addEventListener("click", lightboxNextSlide);
  }

  if (lightboxPrev) {
    lightboxPrev.addEventListener("click", lightboxPrevSlide);
  }

  if (lightbox) {
    lightbox.addEventListener("click", function (e) {
      if (e.target === lightbox) closeLightbox();
    });
  }

  document.addEventListener("keydown", function (e) {
    if (!lightbox || !lightbox.classList.contains("active")) return;

    if (e.key === "Escape") closeLightbox();
    if (e.key === "ArrowRight") lightboxNextSlide();
    if (e.key === "ArrowLeft") lightboxPrevSlide();
  });

  showSlide(0);
  startAuto();
});







document.querySelectorAll(".video-item").forEach((item) => {
  item.addEventListener("click", () => {
    const videoSrc = item.getAttribute("data-video");

    const modal = document.createElement("div");
    modal.className = "custom-video-modal";

    modal.innerHTML = `
      <div class="custom-video-box">
        <button class="custom-video-close" type="button">
          <i class="bi bi-x-lg"></i>
        </button>

        <video controls autoplay playsinline>
          <source src="${videoSrc}" type="video/mp4">
        </video>
      </div>
    `;

    document.body.appendChild(modal);

    modal.querySelector(".custom-video-close").addEventListener("click", () => {
      modal.remove();
    });

    modal.addEventListener("click", (e) => {
      if (e.target === modal) {
        modal.remove();
      }
    });
  });
});
























/* =========================================================
   GALLERY FILTER + IMAGE ZOOM + VIDEO POPUP FINAL
========================================================= */

(function () {
  const filterButtons = document.querySelectorAll(".galleryx-filter");
  const galleryItems = document.querySelectorAll(".galleryx-item");
  const openButtons = document.querySelectorAll(".galleryx-open-lightbox");
  const lightbox = document.getElementById("galleryxLightbox");
  const lightboxBody = document.getElementById("galleryxLightboxBody");
  const lightboxTitle = document.getElementById("galleryxLightboxTitle");
  const closeButtons = document.querySelectorAll("[data-gallery-close]");

  /* filter */
  filterButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const filter = this.getAttribute("data-filter");

      filterButtons.forEach((btn) => btn.classList.remove("active"));
      this.classList.add("active");

      galleryItems.forEach((item) => {
        const categories = item.getAttribute("data-category") || "";

        if (filter === "all" || categories.includes(filter)) {
          item.classList.remove("is-hidden");
        } else {
          item.classList.add("is-hidden");
        }
      });
    });
  });

  /* autoplay muted preview video on hover */
  document.querySelectorAll(".galleryx-video-thumb").forEach((video) => {
    video.addEventListener("mouseenter", function () {
      this.play().catch(() => {});
    });

    video.addEventListener("mouseleave", function () {
      this.pause();
    });
  });

  function openLightbox(type, src, title) {
    if (!lightbox || !lightboxBody || !lightboxTitle) return;

    lightboxTitle.textContent = title || "Gallery Preview";
    lightboxBody.innerHTML = "";

    if (type === "image") {
      const img = document.createElement("img");
      img.src = src;
      img.alt = title || "Gallery image preview";
      img.loading = "eager";
      lightboxBody.appendChild(img);
    }

    if (type === "video") {
      const video = document.createElement("video");
      video.controls = true;
      video.autoplay = true;
      video.playsInline = true;
      video.setAttribute("controlsList", "nodownload");

      const source = document.createElement("source");
      source.src = src;
      source.type = "video/mp4";

      video.appendChild(source);
      lightboxBody.appendChild(video);

      setTimeout(() => {
        video.play().catch(() => {});
      }, 150);
    }

    if (type === "youtube") {
      const iframe = document.createElement("iframe");
      iframe.src = src + (src.includes("?") ? "&" : "?") + "autoplay=1";
      iframe.title = title || "Gallery video preview";
      iframe.allow =
        "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
      iframe.allowFullscreen = true;
      lightboxBody.appendChild(iframe);
    }

    lightbox.classList.add("is-open");
    lightbox.setAttribute("aria-hidden", "false");
    document.body.style.overflow = "hidden";
  }

  function closeLightbox() {
    if (!lightbox || !lightboxBody) return;

    lightbox.classList.remove("is-open");
    lightbox.setAttribute("aria-hidden", "true");
    lightboxBody.innerHTML = "";
    document.body.style.overflow = "";
  }

  openButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const type = this.getAttribute("data-type");
      const src = this.getAttribute("data-src");
      const title = this.getAttribute("data-title");

      if (!src) return;
      openLightbox(type, src, title);
    });
  });

  closeButtons.forEach((button) => {
    button.addEventListener("click", closeLightbox);
  });

  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") closeLightbox();
  });
})();






























/* =========================================================
   ADMISSION PAGE FORM VALIDATION
========================================================= */

(function () {
  const form = document.getElementById("admissionxForm");
  const messageBox = document.getElementById("admissionxFormMessage");

  if (!form || !messageBox) return;

  function showMessage(type, message) {
    messageBox.className = "admissionx-form-message show " + type;
    messageBox.textContent = message;
  }

  form.addEventListener("submit", function (event) {
    const studentName = form.querySelector("#studentName").value.trim();
    const mobileNumber = form.querySelector("#mobileNumber").value.trim();
    const courseInterested = form.querySelector("#courseInterested").value.trim();
    const agreeCheck = form.querySelector("#agreeCheck").checked;

    const phonePattern = /^[6-9]\d{9}$/;

    if (!studentName) {
      event.preventDefault();
      showMessage("error", "Please enter student name.");
      return;
    }

    if (!phonePattern.test(mobileNumber)) {
      event.preventDefault();
      showMessage("error", "Please enter a valid 10 digit mobile number.");
      return;
    }

    if (!courseInterested) {
      event.preventDefault();
      showMessage("error", "Please select course interested in.");
      return;
    }

    if (!agreeCheck) {
      event.preventDefault();
      showMessage("error", "Please accept contact permission before submitting.");
      return;
    }
  });

  const mobileInput = form.querySelector("#mobileNumber");
  if (mobileInput) {
    mobileInput.addEventListener("input", function () {
      this.value = this.value.replace(/\D/g, "").slice(0, 10);
    });
  }
})();

["contactPhone", "scholarMobile"].forEach((inputId) => {
  const input = document.getElementById(inputId);
  if (!input) return;

  input.addEventListener("input", function () {
    this.value = this.value.replace(/\D/g, "").slice(0, 10);
  });
});














document.addEventListener("DOMContentLoaded", function () {
  const drawer = document.getElementById("premiumMobileDrawer");
  const openButton = document.getElementById("mobileMenuOpen");
  const closeButton = document.getElementById("mobileMenuClose");

  if (!drawer || !openButton || !closeButton) return;

  function openMobileMenu() {
    drawer.classList.add("open");
    drawer.setAttribute("aria-hidden", "false");
    openButton.setAttribute("aria-expanded", "true");
    document.body.classList.add("mobile-menu-open");
  }

  function closeMobileMenu() {
    drawer.classList.remove("open");
    drawer.setAttribute("aria-hidden", "true");
    openButton.setAttribute("aria-expanded", "false");
    document.body.classList.remove("mobile-menu-open");
  }

  openButton.addEventListener("click", openMobileMenu);
  closeButton.addEventListener("click", closeMobileMenu);

  drawer.querySelectorAll("a").forEach(function (link) {
    link.addEventListener("click", closeMobileMenu);
  });

  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
      closeMobileMenu();
    }
  });

  window.addEventListener("resize", function () {
    if (window.innerWidth >= 1200) {
      closeMobileMenu();
    }
  });
});
