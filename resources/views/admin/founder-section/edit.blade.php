@extends('layouts.admin')

@section('page-title', 'Founder Section')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.home') }}" class="admin-back-link">
            ← Back to Dashboard
        </a>

        <h2 class="admin-page-title">
            Founder Section
        </h2>

        <p class="admin-page-subtitle">
            Update founder image, profile details and founder journey content
        </p>
    </div>
</div>

@if(session('message'))
    <div class="alert alert-success mb-3">
        {{ session('message') }}
    </div>
@endif

<form method="POST"
      action="{{ route('admin.founder-section.update') }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        {{-- FOUNDER PROFILE --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-user-tie"></i>
                </div>

                <div>
                    <p class="form-card-title">Founder Profile</p>
                    <p class="form-card-subtitle">Image and basic founder details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="image">
                        Founder Image
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-image icon"></i>

                        <input type="file"
                               name="image"
                               id="image"
                               accept="image/*"
                               class="field-input {{ $errors->has('image') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('image') }}
                        </p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-info-circle"></i>
                            Recommended image format: JPG, PNG or WEBP
                        </p>
                    @endif

                    @if($founderSection->getFirstMediaUrl('founder_image'))
                        <div style="margin-top:14px;">
                            <img src="{{ $founderSection->getFirstMediaUrl('founder_image') }}"
                                 alt="{{ $founderSection->image_alt ?? 'Founder Image' }}"
                                 style="width:150px;height:150px;object-fit:cover;border-radius:16px;border:1px solid #e5e7eb;">
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="image_alt">
                        Image Alt Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="image_alt"
                               id="image_alt"
                               value="{{ old('image_alt', $founderSection->image_alt) }}"
                               placeholder="Dr. Vitthal Nagare Founder of Khadkeshwar NEET JEE Academy"
                               class="field-input {{ $errors->has('image_alt') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('image_alt'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('image_alt') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="founder_name">
                        Founder Name <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-user icon"></i>

                        <input type="text"
                               name="founder_name"
                               id="founder_name"
                               value="{{ old('founder_name', $founderSection->founder_name) }}"
                               required
                               placeholder="Dr. Vitthal Nagare"
                               class="field-input {{ $errors->has('founder_name') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('founder_name'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('founder_name') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="qualification">
                        Qualification
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-graduation-cap icon"></i>

                        <input type="text"
                               name="qualification"
                               id="qualification"
                               value="{{ old('qualification', $founderSection->qualification) }}"
                               placeholder="M.A., M.Phil., Ph.D. in Economics"
                               class="field-input {{ $errors->has('qualification') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('qualification'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('qualification') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="designation">
                        Designation
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-id-badge icon"></i>

                        <input type="text"
                               name="designation"
                               id="designation"
                               value="{{ old('designation', $founderSection->designation) }}"
                               placeholder="Founder & Managing Director"
                               class="field-input {{ $errors->has('designation') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('designation'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('designation') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        {{-- HERO CONTENT --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-star"></i>
                </div>

                <div>
                    <p class="form-card-title">Founder Journey Content</p>
                    <p class="form-card-subtitle">Main heading and description content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="hero_title">
                        Hero Title <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="hero_title"
                               id="hero_title"
                               value="{{ old('hero_title', $founderSection->hero_title) }}"
                               required
                               placeholder="A Rural Education Vision Led by"
                               class="field-input {{ $errors->has('hero_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('hero_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('hero_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="hero_highlight_text">
                        Hero Highlight Text <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-quote-right icon"></i>

                        <input type="text"
                               name="hero_highlight_text"
                               id="hero_highlight_text"
                               value="{{ old('hero_highlight_text', $founderSection->hero_highlight_text) }}"
                               required
                               placeholder="Dr. Vitthal Nagare"
                               class="field-input {{ $errors->has('hero_highlight_text') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('hero_highlight_text'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('hero_highlight_text') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="hero_description">
                        Hero Description
                    </label>

                    <textarea name="hero_description"
                              id="hero_description"
                              rows="6"
                              placeholder="Write founder journey description"
                              class="field-input {{ $errors->has('hero_description') ? 'error' : '' }}">{{ old('hero_description', $founderSection->hero_description) }}</textarea>

                    @if($errors->has('hero_description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('hero_description') }}
                        </p>
                    @endif
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Icons, badges and buttons will remain static on frontend.
                    </p>
                </div>

            </div>
        </div>

        {{-- INFO CARDS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-th-large"></i>
                </div>

                <div>
                    <p class="form-card-title">Founder Info Cards</p>
                    <p class="form-card-subtitle">Values shown inside frontend info boxes</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="education_value">
                        Education Value
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-mortar-pestle icon"></i>

                        <input type="text"
                               name="education_value"
                               id="education_value"
                               value="{{ old('education_value', $founderSection->education_value) }}"
                               placeholder="Ph.D. in Economics"
                               class="field-input {{ $errors->has('education_value') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('education_value'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('education_value') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="designation_value">
                        Designation Value
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-briefcase icon"></i>

                        <input type="text"
                               name="designation_value"
                               id="designation_value"
                               value="{{ old('designation_value', $founderSection->designation_value) }}"
                               placeholder="Founder & Managing Director"
                               class="field-input {{ $errors->has('designation_value') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('designation_value'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('designation_value') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="company_value">
                        Company Value
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-building icon"></i>

                        <input type="text"
                               name="company_value"
                               id="company_value"
                               value="{{ old('company_value', $founderSection->company_value) }}"
                               placeholder="Khadkeshwar Development Services Pvt Ltd"
                               class="field-input {{ $errors->has('company_value') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('company_value'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('company_value') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="location_value">
                        Location Value
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-map-marker-alt icon"></i>

                        <input type="text"
                               name="location_value"
                               id="location_value"
                               value="{{ old('location_value', $founderSection->location_value) }}"
                               placeholder="Lonar, Maharashtra"
                               class="field-input {{ $errors->has('location_value') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('location_value'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('location_value') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        {{-- FOUNDER STORY --}}
<div class="form-card">
    <div class="form-card-header">
        <div class="form-card-icon">
            <i class="fas fa-lightbulb"></i>
        </div>

        <div>
            <p class="form-card-title">Founder Story</p>
            <p class="form-card-subtitle">Story title, rich description and founder quote</p>
        </div>
    </div>

    <div class="form-card-body">

        <div class="field-group">
            <label class="field-label" for="story_title">
                Story Title
            </label>

            <div class="input-icon-wrap">
                <i class="fas fa-heading icon"></i>

                <input type="text"
                       name="story_title"
                       id="story_title"
                       value="{{ old('story_title', $founderSection->story_title) }}"
                       placeholder="A mission to bridge the education gap for rural students."
                       class="field-input {{ $errors->has('story_title') ? 'error' : '' }}">
            </div>

            @if($errors->has('story_title'))
                <p class="field-error">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ $errors->first('story_title') }}
                </p>
            @endif
        </div>

        <div class="field-group">
            <label class="field-label" for="story_description">
                Story Description
            </label>

            <textarea name="story_description"
                      id="story_description"
                      rows="8"
                      class="field-input ckeditor {{ $errors->has('story_description') ? 'error' : '' }}"
                      placeholder="Write founder story description">{{ old('story_description', $founderSection->story_description) }}</textarea>

            @if($errors->has('story_description'))
                <p class="field-error">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ $errors->first('story_description') }}
                </p>
            @else
                <p class="field-hint">
                    <i class="fas fa-info-circle"></i>
                    You can use paragraphs, bold text and formatted content here.
                </p>
            @endif
        </div>

        <div class="field-group">
            <label class="field-label" for="quote_text">
                Quote Text
            </label>

            <textarea name="quote_text"
                      id="quote_text"
                      rows="4"
                      placeholder="My mission is simple..."
                      class="field-input {{ $errors->has('quote_text') ? 'error' : '' }}">{{ old('quote_text', $founderSection->quote_text) }}</textarea>

            @if($errors->has('quote_text'))
                <p class="field-error">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ $errors->first('quote_text') }}
                </p>
            @endif
        </div>

        <div class="field-group">
            <label class="field-label" for="quote_author">
                Quote Author
            </label>

            <div class="input-icon-wrap">
                <i class="fas fa-user-edit icon"></i>

                <input type="text"
                       name="quote_author"
                       id="quote_author"
                       value="{{ old('quote_author', $founderSection->quote_author) }}"
                       placeholder="Dr. Vitthal Nagare"
                       class="field-input {{ $errors->has('quote_author') ? 'error' : '' }}">
            </div>

            @if($errors->has('quote_author'))
                <p class="field-error">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ $errors->first('quote_author') }}
                </p>
            @endif
        </div>

        <div class="form-info-box">
            <p>
                <i class="fas fa-info-circle"></i>
                Frontend story and quote icons will remain static.
            </p>
        </div>

    </div>
</div>

        {{-- STATUS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-toggle-on"></i>
                </div>

                <div>
                    <p class="form-card-title">Section Status</p>
                    <p class="form-card-subtitle">Control frontend visibility</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="checkbox-grid">
                    <label class="role-checkbox-item {{ old('status', $founderSection->status) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $founderSection->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">Show this section on website</span>
                    </label>
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        If disabled, founder section will not be visible on frontend.
                    </p>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Update Founder Section
        </button>

        <a href="{{ route('admin.home') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>
@section('scripts')
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

@endsection