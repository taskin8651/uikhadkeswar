@extends('frontend.master')
@section('content')


<!-- ========================= ADMISSION PAGE START ========================== -->

<main class="admissionx-page">

  <!-- HERO START -->
  <section class="admissionx-hero">
    <div class="admissionx-bg-grid"></div>
    <div class="admissionx-orb admissionx-orb-1"></div>
    <div class="admissionx-orb admissionx-orb-2"></div>
    <div class="admissionx-orb admissionx-orb-3"></div>

    <div class="container">

      <nav class="admissionx-breadcrumb" data-aos="fade-up">
        <a href="index.html">
          <i class="bi bi-house-door-fill"></i>
          Home
        </a>
        <i class="bi bi-chevron-right"></i>
        <span>Admission</span>
      </nav>

      <div class="admissionx-hero-card" data-aos="fade-up">
        <div class="admissionx-hero-shine"></div>

        <div class="row g-0 align-items-stretch">

          <div class="col-lg-7">
            <div class="admissionx-hero-content">

              <span class="admissionx-kicker">
                <i class="bi bi-mortarboard-fill"></i>
                Admission Open 2026
              </span>

              <h1>
                Start Your NEET & JEE Preparation
                <span>with the Right Guidance.</span>
              </h1>

              <p>
                Apply for NEET, JEE, Foundation Course or Test Series at Khadkeshwar NEET JEE Academy.
                Get quality coaching, personal mentorship, regular tests, revision support and student-focused guidance.
              </p>

              <div class="admissionx-alert-note">
                <i class="bi bi-info-circle-fill"></i>
                <span>
                  Fee concession support may be available for eligible students based on required documents and academy guidelines.
                </span>
              </div>

              <div class="admissionx-hero-tags">
                <span><i class="bi bi-check-circle-fill"></i> NEET Coaching</span>
                <span><i class="bi bi-check-circle-fill"></i> JEE Coaching</span>
                <span><i class="bi bi-check-circle-fill"></i> Foundation Course</span>
                <span><i class="bi bi-check-circle-fill"></i> Test Series</span>
              </div>

              <div class="admissionx-hero-actions">
                <a href="#admission-form" class="btn-main">
                  Apply Now
                  <i class="bi bi-arrow-right"></i>
                </a>

                <a href="tel:+918856822032" class="admissionx-outline-btn">
                  <i class="bi bi-telephone-fill"></i>
                  Call Now
                </a>
              </div>

            </div>
          </div>

          <div class="col-lg-5">
            <div class="admissionx-hero-visual">

              <div class="admissionx-visual-card">
                <div class="admissionx-visual-head">
                  <div>
                    <span></span>
                    <span></span>
                    <span></span>
                  </div>
                  <strong>Admission Desk</strong>
                </div>

                <div class="admissionx-visual-body">

                  <div class="admissionx-student-card">
                    <div class="admissionx-avatar">
                      <i class="bi bi-person-fill-check"></i>
                    </div>
                    <div>
                      <span>New Student Inquiry</span>
                      <h3>Course Admission</h3>
                      <p>NEET / JEE / Foundation / Test Series</p>
                    </div>
                  </div>

                  <div class="admissionx-process-mini">
                    <div>
                      <i class="bi bi-send-fill"></i>
                      <strong>Submit Inquiry</strong>
                      <span>Step 01</span>
                    </div>

                    <div>
                      <i class="bi bi-telephone-fill"></i>
                      <strong>Academy Call</strong>
                      <span>Step 02</span>
                    </div>

                    <div>
                      <i class="bi bi-file-earmark-check-fill"></i>
                      <strong>Document Check</strong>
                      <span>Step 03</span>
                    </div>

                    <div>
                      <i class="bi bi-mortarboard-fill"></i>
                      <strong>Start Classes</strong>
                      <span>Step 04</span>
                    </div>
                  </div>

                </div>
              </div>

              <div class="admissionx-hero-info-row">
                <div class="admissionx-info-card">
                  <i class="bi bi-percent"></i>
                  <div>
                    <strong>Up to 50%</strong>
                    <span>Fee concession</span>
                  </div>
                </div>

                <div class="admissionx-info-card">
                  <i class="bi bi-geo-alt-fill"></i>
                  <div>
                    <strong>Lonar</strong>
                    <span>Maharashtra</span>
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


  <!-- ADMISSION FORM START -->
  <section class="admissionx-form-section section-padding" id="admission-form">
    <div class="container">

      <div class="row g-5 align-items-start">

        <div class="col-lg-5">
          <div class="admissionx-form-intro" data-aos="fade-right">
            <span class="section-badge">
              <i class="bi bi-pencil-square"></i>
              Admission Inquiry Form
            </span>

            <h2>Submit your admission inquiry in a few simple steps.</h2>

            <p>
              Fill the form with student details and course interest. Our admission team will contact you for guidance,
              course details, fee structure and further process.
            </p>

            <div class="admissionx-contact-card">
              <div>
                <i class="bi bi-telephone-fill"></i>
                <span>Call Admission Desk</span>
                <strong>+91 88568 22032</strong>
              </div>

              <div>
                <i class="bi bi-envelope-fill"></i>
                <span>Email</span>
                <strong>info@khadkeshwaracademy.com</strong>
              </div>

              <div>
                <i class="bi bi-geo-alt-fill"></i>
                <span>Address</span>
                <strong>Lonar, Buldhana, Maharashtra - 443302</strong>
              </div>
            </div>

          </div>
        </div>

        <div class="col-lg-7">
          <div class="admissionx-form-card" data-aos="fade-left">

            <div class="admissionx-form-head">
              <div>
                <span>Admission Open</span>
                <h3>Apply for Course Admission</h3>
              </div>
              <i class="bi bi-mortarboard-fill"></i>
            </div>

            <form class="admissionx-form" id="admissionxForm" method="POST" action="{{ route('frontend.admission-inquiry.store') }}" novalidate>
              @csrf

              <div class="row g-3">

                <div class="col-md-6">
                  <label for="studentName">Student Name <span>*</span></label>
                  <input type="text" id="studentName" name="student_name" placeholder="Enter student name" required>
                </div>

                <div class="col-md-6">
                  <label for="parentName">Parent Name</label>
                  <input type="text" id="parentName" name="parent_name" placeholder="Enter parent name">
                </div>

                <div class="col-md-6">
                  <label for="mobileNumber">Mobile Number <span>*</span></label>
                  <input type="tel" id="mobileNumber" name="mobile_number" placeholder="Enter 10 digit mobile number" maxlength="10" required>
                </div>

                <div class="col-md-6">
                  <label for="emailAddress">Email Address</label>
                  <input type="email" id="emailAddress" name="email" placeholder="Enter email address">
                </div>

                <div class="col-md-6">
                  <label for="courseInterested">Course Interested In <span>*</span></label>
                  <select id="courseInterested" name="course_interested" required>
                    <option value="">Select Course</option>
                    <option value="NEET Preparation">NEET Preparation</option>
                    <option value="JEE Preparation">JEE Preparation</option>
                    <option value="Foundation Course">Foundation Course</option>
                    <option value="Test Series">Test Series</option>
                    <option value="Scholarship / Fee Concession">Scholarship / Fee Concession</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="studentClass">Current Class</label>
                  <select id="studentClass" name="student_class">
                    <option value="">Select Class</option>
                    <option>Class 8</option>
                    <option>Class 9</option>
                    <option>Class 10</option>
                    <option>Class 11</option>
                    <option>Class 12</option>
                    <option>12th Passed</option>
                  </select>
                </div>

                <div class="col-12">
                  <label for="message">Message</label>
                  <textarea id="message" name="message" rows="5" placeholder="Write your message, course query or admission requirement"></textarea>
                </div>

                <div class="col-12">
                  <div class="admissionx-form-check">
                    <input type="checkbox" id="agreeCheck" name="agree" value="1" required>
                    <label for="agreeCheck">
                      I agree to be contacted by Khadkeshwar NEET JEE Academy for admission inquiry.
                    </label>
                  </div>
                </div>

                <div class="col-12">
                  <div class="admissionx-form-message" id="admissionxFormMessage"></div>
                </div>

                <div class="col-12">
                  <button type="submit" class="btn-main admissionx-submit-btn">
                    Submit Inquiry
                    <i class="bi bi-send-fill"></i>
                  </button>
                </div>

              </div>

            </form>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- ADMISSION FORM END -->


  <!-- COURSES START -->
  <section class="admissionx-courses section-padding">
    <div class="container">

      <div class="admissionx-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-book-half"></i>
          Courses Available
        </span>

        <h2>Choose the right program for your preparation journey.</h2>

        <p>
          Admission inquiry is available for NEET, JEE, Foundation Course and Test Series.
        </p>
      </div>

      <div class="admissionx-course-grid">

        <div class="admissionx-course-card" data-aos="fade-up" data-aos-delay="100">
          <i class="bi bi-heart-pulse-fill"></i>
          <span>Medical Entrance</span>
          <h3>NEET Preparation</h3>
          <p>Biology, Physics and Chemistry focused preparation with revision and tests.</p>
          <a href="neet-program.html">View Course <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="admissionx-course-card featured" data-aos="fade-up" data-aos-delay="180">
          <i class="bi bi-lightning-charge-fill"></i>
          <span>Engineering Entrance</span>
          <h3>JEE Preparation</h3>
          <p>Physics, Chemistry and Mathematics preparation with problem-solving practice.</p>
          <a href="jee-program.html">View Course <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="admissionx-course-card" data-aos="fade-up" data-aos-delay="260">
          <i class="bi bi-mortarboard-fill"></i>
          <span>Early Preparation</span>
          <h3>Foundation Course</h3>
          <p>Strong base-building program for school students and future competitive exams.</p>
          <a href="foundation-course.html">View Course <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="admissionx-course-card" data-aos="fade-up" data-aos-delay="340">
          <i class="bi bi-clipboard2-check-fill"></i>
          <span>Practice & Revision</span>
          <h3>Test Series</h3>
          <p>Chapter-wise tests, revision tests and full syllabus mock test support.</p>
          <a href="test-series.html">View Test Series <i class="bi bi-arrow-right"></i></a>
        </div>

      </div>

    </div>
  </section>
  <!-- COURSES END -->


  <!-- FEE CONCESSION START -->
  <section class="admissionx-concession section-padding">
    <div class="admissionx-dark-grid"></div>

    <div class="container">

      <div class="row g-5 align-items-center">

        <div class="col-lg-5">
          <div class="admissionx-concession-content" data-aos="fade-right">
            <span class="section-badge">
              <i class="bi bi-percent"></i>
              Education Support & Fee Concession
            </span>

            <h2>Fee Concession Available Up To 50%</h2>

            <p>
              Khadkeshwar NEET JEE Academy supports deserving students through special fee concession
              based on eligibility and required documents.
            </p>

            <div class="admissionx-concession-note">
              <i class="bi bi-shield-check"></i>
              <span>
                Relevant certificates/documents are mandatory. Only one concession is applicable per student.
              </span>
            </div>

            <div class="admissionx-concession-actions">
              <a href="#admission-form" class="btn-main">
                Apply for Admission
                <i class="bi bi-arrow-right"></i>
              </a>

              <a href="tel:+918856822032" class="btn-white">
                Check Eligibility
              </a>
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="admissionx-eligibility-grid" data-aos="fade-left">

            <div class="admissionx-eligibility-card">
              <i class="bi bi-award-fill"></i>
              <span>40% or More</span>
              <p>Children scoring 40% or more</p>
            </div>

            <div class="admissionx-eligibility-card">
              <i class="bi bi-universal-access-circle"></i>
              <span>Special Support</span>
              <p>Children of differently-abled parents</p>
            </div>

            <div class="admissionx-eligibility-card">
              <i class="bi bi-heart-fill"></i>
              <span>Orphan Students</span>
              <p>Support for orphan students</p>
            </div>

            <div class="admissionx-eligibility-card">
              <i class="bi bi-tree-fill"></i>
              <span>Farmer Families</span>
              <p>Children of farmers with less than 5 hectares land</p>
            </div>

            <div class="admissionx-eligibility-card">
              <i class="bi bi-shield-fill-check"></i>
              <span>Ex-Servicemen</span>
              <p>Children of ex-servicemen</p>
            </div>

            <div class="admissionx-eligibility-card">
              <i class="bi bi-house-heart-fill"></i>
              <span>Landless Parents</span>
              <p>Children of landless parents</p>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- FEE CONCESSION END -->


  <!-- PROCESS START -->
  <section class="admissionx-process section-padding">
    <div class="container">

      <div class="admissionx-section-head" data-aos="fade-up">
        <span class="section-badge">
          <i class="bi bi-diagram-3-fill"></i>
          Admission Process
        </span>

        <h2>Simple, student-friendly admission process.</h2>

        <p>
          Submit inquiry, connect with the academy team, choose course and complete the admission process.
        </p>
      </div>

      <div class="admissionx-process-grid">

        <div class="admissionx-process-card" data-aos="zoom-in" data-aos-delay="100">
          <span>01</span>
          <i class="bi bi-pencil-square"></i>
          <h3>Submit Inquiry</h3>
          <p>Fill the admission form with student details and preferred course.</p>
        </div>

        <div class="admissionx-process-card" data-aos="zoom-in" data-aos-delay="180">
          <span>02</span>
          <i class="bi bi-telephone-fill"></i>
          <h3>Get a Call</h3>
          <p>Academy team will contact you with course and admission guidance.</p>
        </div>

        <div class="admissionx-process-card" data-aos="zoom-in" data-aos-delay="260">
          <span>03</span>
          <i class="bi bi-file-earmark-check-fill"></i>
          <h3>Document Check</h3>
          <p>Submit required documents for admission and fee concession if applicable.</p>
        </div>

        <div class="admissionx-process-card" data-aos="zoom-in" data-aos-delay="340">
          <span>04</span>
          <i class="bi bi-mortarboard-fill"></i>
          <h3>Start Learning</h3>
          <p>Begin structured NEET/JEE preparation with faculty guidance.</p>
        </div>

      </div>

    </div>
  </section>
  <!-- PROCESS END -->


  <!-- CONTACT STRIP START -->
  <section class="admissionx-contact-strip section-padding">
    <div class="container">

      <div class="admissionx-contact-wrap" data-aos="fade-up">

        <div class="admissionx-contact-item">
          <i class="bi bi-telephone-fill"></i>
          <div>
            <span>Phone</span>
            <a href="tel:+918856822032">+91 88568 22032</a>
          </div>
        </div>

        <div class="admissionx-contact-item">
          <i class="bi bi-envelope-fill"></i>
          <div>
            <span>Email</span>
            <a href="mailto:info@khadkeshwaracademy.com">info@khadkeshwaracademy.com</a>
          </div>
        </div>

        <div class="admissionx-contact-item">
          <i class="bi bi-geo-alt-fill"></i>
          <div>
            <span>Location</span>
            <p>Lonar, Buldhana, Maharashtra - 443302</p>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- CONTACT STRIP END -->


  <!-- FINAL CTA START -->
  <section class="admissionx-cta-section section-padding">
    <div class="container">

      <div class="admissionx-cta" data-aos="zoom-in">

        <div>
          <span>
            <i class="bi bi-mortarboard-fill"></i>
            Admission Open 2026
          </span>

          <h2>Ready to begin your NEET & JEE success journey?</h2>

          <p>
            Join Khadkeshwar NEET JEE Academy for quality coaching, personal mentorship,
            test series, revision support and future-ready learning guidance.
          </p>
        </div>

        <div class="admissionx-cta-actions">
          <a href="#admission-form" class="btn-main">
            Apply Now
            <i class="bi bi-arrow-right"></i>
          </a>

          <a href="tel:+918856822032" class="btn-white">
            <i class="bi bi-telephone-fill"></i>
            Call Now
          </a>
        </div>

      </div>

    </div>
  </section>
  <!-- FINAL CTA END -->

</main>

<!-- ========================= ADMISSION PAGE END ========================== -->

@endsection
