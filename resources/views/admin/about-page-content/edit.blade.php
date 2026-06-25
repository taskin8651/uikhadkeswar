@extends('layouts.admin')

@section('page-title', 'About Page Content')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.home') }}" class="admin-back-link">
            ← Back to Dashboard
        </a>

        <h2 class="admin-page-title">
            About Page Content
        </h2>

        <p class="admin-page-subtitle">
            Update hero, introduction, vision mission, teaching method and student support sections
        </p>
    </div>
</div>

@if(session('message'))
    <div class="alert alert-success mb-3">
        {{ session('message') }}
    </div>
@endif

<form method="POST" action="{{ route('admin.about-page-content.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        {{-- HERO SECTION --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div>
                    <p class="form-card-title">Hero Section</p>
                    <p class="form-card-subtitle">Main about page hero content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Hero Image</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-image icon"></i>
                        <input type="file" name="hero_image" accept="image/*"
                               class="field-input {{ $errors->has('hero_image') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('hero_image'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('hero_image') }}</p>
                    @endif

                    @if($aboutPageContent->getFirstMediaUrl('about_hero_image'))
                        <div style="margin-top:14px;">
                            <img src="{{ $aboutPageContent->getFirstMediaUrl('about_hero_image') }}"
                                 alt="About Hero"
                                 style="width:160px;height:120px;object-fit:cover;border-radius:16px;border:1px solid #e5e7eb;">
                        </div>
                    @endif
                </div>

                @foreach([
                    'hero_image_alt' => ['Image Alt Text', 'Khadkeshwar Academy classroom learning environment', 'fas fa-tag'],
                    'hero_title' => ['Hero Title', 'Building Rural India’s Future', 'fas fa-heading'],
                    'hero_highlight_text' => ['Hero Highlight Text', 'NEET & JEE Learning Ecosystem', 'fas fa-star'],
                    'hero_tag_one' => ['Hero Tag One', 'NEET Preparation', 'fas fa-check'],
                    'hero_tag_two' => ['Hero Tag Two', 'JEE Preparation', 'fas fa-check'],
                    'hero_tag_three' => ['Hero Tag Three', 'Foundation Course', 'fas fa-check'],
                    'hero_tag_four' => ['Hero Tag Four', 'AI Learning Vision', 'fas fa-check'],
                    'hero_focus_label' => ['Focus Label', 'Academy Focus', 'fas fa-tag'],
                    'hero_focus_title' => ['Focus Title', 'NEET / JEE / Foundation', 'fas fa-graduation-cap'],
                    'hero_stat_one_value' => ['Floating Stat One Value', '50%', 'fas fa-percent'],
                    'hero_stat_one_label' => ['Floating Stat One Label', 'Fee Concession', 'fas fa-tag'],
                    'hero_stat_two_value' => ['Floating Stat Two Value', 'Regular Tests', 'fas fa-clipboard-check'],
                    'hero_stat_two_label' => ['Floating Stat Two Label', 'Performance Practice', 'fas fa-tag'],
                ] as $field => $meta)
                    <div class="field-group">
                        <label class="field-label" for="{{ $field }}">{{ $meta[0] }}</label>
                        <div class="input-icon-wrap">
                            <i class="{{ $meta[2] }} icon"></i>
                            <input type="text"
                                   name="{{ $field }}"
                                   id="{{ $field }}"
                                   value="{{ old($field, $aboutPageContent->{$field}) }}"
                                   placeholder="{{ $meta[1] }}"
                                   class="field-input {{ $errors->has($field) ? 'error' : '' }}">
                        </div>

                        @if($errors->has($field))
                            <p class="field-error">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $errors->first($field) }}
                            </p>
                        @endif
                    </div>
                @endforeach

                <div class="field-group">
                    <label class="field-label" for="hero_description">Hero Description</label>
                    <textarea name="hero_description" id="hero_description" rows="5"
                              class="field-input {{ $errors->has('hero_description') ? 'error' : '' }}">{{ old('hero_description', $aboutPageContent->hero_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="hero_focus_description">Focus Description</label>
                    <textarea name="hero_focus_description" id="hero_focus_description" rows="4"
                              class="field-input {{ $errors->has('hero_focus_description') ? 'error' : '' }}">{{ old('hero_focus_description', $aboutPageContent->hero_focus_description) }}</textarea>
                </div>

            </div>
        </div>

        {{-- INTRO SECTION --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div>
                    <p class="form-card-title">Academy Introduction</p>
                    <p class="form-card-subtitle">Intro heading, content and core cards</p>
                </div>
            </div>

            <div class="form-card-body">

                @foreach([
                    'intro_heading' => ['Intro Heading', 'Premium coaching with personal guidance for rural students.', 'fas fa-heading'],
                    'intro_card_title' => ['Intro Card Title', 'Quality preparation should not depend on city location.', 'fas fa-lightbulb'],
                    'intro_quote_text' => ['Quote Text', 'Education with discipline...', 'fas fa-quote-left'],
                    'intro_quote_author' => ['Quote Author', 'Khadkeshwar NEET JEE Academy', 'fas fa-user-edit'],
                    'intro_core_one_title' => ['Core Card One Title', 'Exam-Focused Learning', 'fas fa-heading'],
                    'intro_core_two_title' => ['Core Card Two Title', 'Personal Mentorship', 'fas fa-heading'],
                    'intro_core_three_title' => ['Core Card Three Title', 'Progress Tracking', 'fas fa-heading'],
                    'intro_core_four_title' => ['Core Card Four Title', 'AI Learning Vision', 'fas fa-heading'],
                ] as $field => $meta)
                    <div class="field-group">
                        <label class="field-label" for="{{ $field }}">{{ $meta[0] }}</label>
                        <div class="input-icon-wrap">
                            <i class="{{ $meta[2] }} icon"></i>
                            <input type="text" name="{{ $field }}" id="{{ $field }}"
                                   value="{{ old($field, $aboutPageContent->{$field}) }}"
                                   placeholder="{{ $meta[1] }}"
                                   class="field-input {{ $errors->has($field) ? 'error' : '' }}">
                        </div>
                    </div>
                @endforeach

                @foreach([
                    'intro_description' => 'Intro Description',
                    'intro_card_description' => 'Intro Card Description',
                    'intro_core_one_description' => 'Core Card One Description',
                    'intro_core_two_description' => 'Core Card Two Description',
                    'intro_core_three_description' => 'Core Card Three Description',
                    'intro_core_four_description' => 'Core Card Four Description',
                ] as $field => $label)
                    <div class="field-group">
                        <label class="field-label" for="{{ $field }}">{{ $label }}</label>
                        <textarea name="{{ $field }}" id="{{ $field }}" rows="5"
                                  class="field-input ckeditor {{ $errors->has($field) ? 'error' : '' }}">{{ old($field, $aboutPageContent->{$field}) }}</textarea>
                    </div>
                @endforeach

            </div>
        </div>

        {{-- VISION MISSION SECTION --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-bullseye"></i>
                </div>
                <div>
                    <p class="form-card-title">Vision & Mission</p>
                    <p class="form-card-subtitle">Vision, mission and future goal content</p>
                </div>
            </div>

            <div class="form-card-body">

                @foreach([
                    'vm_heading' => ['Section Heading', 'Focused on affordable...', 'fas fa-heading'],
                    'vision_title' => ['Vision Card Title', 'Our Vision', 'fas fa-eye'],
                    'mission_title' => ['Mission Card Title', 'Our Mission', 'fas fa-rocket'],
                    'future_title' => ['Future Card Title', 'Future Goal', 'fas fa-star'],
                ] as $field => $meta)
                    <div class="field-group">
                        <label class="field-label" for="{{ $field }}">{{ $meta[0] }}</label>
                        <div class="input-icon-wrap">
                            <i class="{{ $meta[2] }} icon"></i>
                            <input type="text" name="{{ $field }}" id="{{ $field }}"
                                   value="{{ old($field, $aboutPageContent->{$field}) }}"
                                   placeholder="{{ $meta[1] }}"
                                   class="field-input {{ $errors->has($field) ? 'error' : '' }}">
                        </div>
                    </div>
                @endforeach

                @foreach([
                    'vm_description' => 'Section Description',
                    'vision_description' => 'Vision Description',
                    'mission_description' => 'Mission Description',
                    'future_description' => 'Future Goal Description',
                ] as $field => $label)
                    <div class="field-group">
                        <label class="field-label" for="{{ $field }}">{{ $label }}</label>
                        <textarea name="{{ $field }}" id="{{ $field }}" rows="5"
                                  class="field-input ckeditor {{ $errors->has($field) ? 'error' : '' }}">{{ old($field, $aboutPageContent->{$field}) }}</textarea>
                    </div>
                @endforeach

            </div>
        </div>

        {{-- TEACHING METHOD SECTION --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div>
                    <p class="form-card-title">Teaching Methodology</p>
                    <p class="form-card-subtitle">Teaching method section and cards</p>
                </div>
            </div>

            <div class="form-card-body">

                @foreach([
                    'method_heading' => ['Method Heading', 'Structured learning system...', 'fas fa-heading'],
                    'method_note' => ['Method Note', 'Daily discipline + regular tests...', 'fas fa-check-circle'],
                    'method_one_title' => ['Method Card One Title', 'Concept Clarity', 'fas fa-heading'],
                    'method_two_title' => ['Method Card Two Title', 'Daily Practice', 'fas fa-heading'],
                    'method_three_title' => ['Method Card Three Title', 'Regular Tests', 'fas fa-heading'],
                    'method_four_title' => ['Method Card Four Title', 'Doubt Support', 'fas fa-heading'],
                ] as $field => $meta)
                    <div class="field-group">
                        <label class="field-label" for="{{ $field }}">{{ $meta[0] }}</label>
                        <div class="input-icon-wrap">
                            <i class="{{ $meta[2] }} icon"></i>
                            <input type="text" name="{{ $field }}" id="{{ $field }}"
                                   value="{{ old($field, $aboutPageContent->{$field}) }}"
                                   placeholder="{{ $meta[1] }}"
                                   class="field-input {{ $errors->has($field) ? 'error' : '' }}">
                        </div>
                    </div>
                @endforeach

                @foreach([
                    'method_description' => 'Method Description',
                    'method_one_description' => 'Method Card One Description',
                    'method_two_description' => 'Method Card Two Description',
                    'method_three_description' => 'Method Card Three Description',
                    'method_four_description' => 'Method Card Four Description',
                ] as $field => $label)
                    <div class="field-group">
                        <label class="field-label" for="{{ $field }}">{{ $label }}</label>
                        <textarea name="{{ $field }}" id="{{ $field }}" rows="5"
                                  class="field-input ckeditor {{ $errors->has($field) ? 'error' : '' }}">{{ old($field, $aboutPageContent->{$field}) }}</textarea>
                    </div>
                @endforeach

            </div>
        </div>

        {{-- SUPPORT SECTION --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-hands-helping"></i>
                </div>
                <div>
                    <p class="form-card-title">Student Support System</p>
                    <p class="form-card-subtitle">Support content and support cards</p>
                </div>
            </div>

            <div class="form-card-body">

                @foreach([
                    'support_heading' => ['Support Heading', 'Support beyond classroom learning.', 'fas fa-heading'],
                    'support_highlight_title' => ['Highlight Title', 'Hostel & Reading Room Facilities', 'fas fa-building'],
                    'support_one_title' => ['Support Card One Title', 'Personal Mentorship', 'fas fa-heading'],
                    'support_two_title' => ['Support Card Two Title', 'Fee Concession', 'fas fa-heading'],
                    'support_three_title' => ['Support Card Three Title', 'Test Series', 'fas fa-heading'],
                    'support_four_title' => ['Support Card Four Title', 'AI Learning Vision', 'fas fa-heading'],
                ] as $field => $meta)
                    <div class="field-group">
                        <label class="field-label" for="{{ $field }}">{{ $meta[0] }}</label>
                        <div class="input-icon-wrap">
                            <i class="{{ $meta[2] }} icon"></i>
                            <input type="text" name="{{ $field }}" id="{{ $field }}"
                                   value="{{ old($field, $aboutPageContent->{$field}) }}"
                                   placeholder="{{ $meta[1] }}"
                                   class="field-input {{ $errors->has($field) ? 'error' : '' }}">
                        </div>
                    </div>
                @endforeach

                @foreach([
                    'support_description' => 'Support Description',
                    'support_highlight_description' => 'Highlight Description',
                    'support_one_description' => 'Support Card One Description',
                    'support_two_description' => 'Support Card Two Description',
                    'support_three_description' => 'Support Card Three Description',
                    'support_four_description' => 'Support Card Four Description',
                ] as $field => $label)
                    <div class="field-group">
                        <label class="field-label" for="{{ $field }}">{{ $label }}</label>
                        <textarea name="{{ $field }}" id="{{ $field }}" rows="5"
                                  class="field-input ckeditor {{ $errors->has($field) ? 'error' : '' }}">{{ old($field, $aboutPageContent->{$field}) }}</textarea>
                    </div>
                @endforeach

            </div>
        </div>

        {{-- STATUS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-toggle-on"></i>
                </div>
                <div>
                    <p class="form-card-title">Page Status</p>
                    <p class="form-card-subtitle">Enable or disable dynamic about content</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="checkbox-grid">
                    <label class="role-checkbox-item {{ old('status', $aboutPageContent->status) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $aboutPageContent->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">Publish About Page Content</span>
                    </label>
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Icons, badges, button text and button links are static on frontend.
                    </p>
                </div>
            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Update About Page
        </button>

        <a href="{{ route('admin.home') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@endsection

@section('scripts')
@parent
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.ckeditor').forEach(function (textarea) {
            ClassicEditor
                .create(textarea, {
                    toolbar: [
                        'heading',
                        '|',
                        'bold',
                        'italic',
                        'link',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'undo',
                        'redo'
                    ]
                })
                .catch(function (error) {
                    console.error(error);
                });
        });
    });
</script>
@endsection