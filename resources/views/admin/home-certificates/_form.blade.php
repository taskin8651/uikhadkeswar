@csrf

@if(isset($homeCertificate))
    @method('PUT')
@endif

<div class="admin-form-grid">
    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-certificate"></i>
            </div>
            <div>
                <p class="form-card-title">Certificate Content</p>
                <p class="form-card-subtitle">Text and image shown inside the carousel card</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label" for="title">Title <span class="req">*</span></label>
                <input type="text"
                       name="title"
                       id="title"
                       value="{{ old('title', $homeCertificate->title ?? '') }}"
                       required
                       class="field-input {{ $errors->has('title') ? 'error' : '' }}"
                       placeholder="Free Coaching Support Certificate">
                @if($errors->has('title'))
                    <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('title') }}</p>
                @endif
            </div>

            <div class="field-group">
                <label class="field-label" for="subtitle">Subtitle</label>
                <input type="text"
                       name="subtitle"
                       id="subtitle"
                       value="{{ old('subtitle', $homeCertificate->subtitle ?? '') }}"
                       class="field-input {{ $errors->has('subtitle') ? 'error' : '' }}"
                       placeholder="Government Scholarship Initiative">
            </div>

            <div class="field-group">
                <label class="field-label" for="year_text">Year / Meta Text</label>
                <input type="text"
                       name="year_text"
                       id="year_text"
                       value="{{ old('year_text', $homeCertificate->year_text ?? '') }}"
                       class="field-input {{ $errors->has('year_text') ? 'error' : '' }}"
                       placeholder="Academic Year 2025-26">
            </div>

            <div class="field-group">
                <label class="field-label" for="button_text">Button Text</label>
                <input type="text"
                       name="button_text"
                       id="button_text"
                       value="{{ old('button_text', $homeCertificate->button_text ?? 'View Certificate') }}"
                       class="field-input {{ $errors->has('button_text') ? 'error' : '' }}"
                       placeholder="View Certificate">
            </div>

            <div class="field-group">
                <label class="field-label" for="alt_text">Image Alt Text</label>
                <input type="text"
                       name="alt_text"
                       id="alt_text"
                       value="{{ old('alt_text', $homeCertificate->alt_text ?? '') }}"
                       class="field-input {{ $errors->has('alt_text') ? 'error' : '' }}"
                       placeholder="Government scholarship certificate">
            </div>
        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-image"></i>
            </div>
            <div>
                <p class="form-card-title">Image & Settings</p>
                <p class="form-card-subtitle">Upload image or keep existing public asset path</p>
            </div>
        </div>

        <div class="form-card-body">
            @if(isset($homeCertificate) && $homeCertificate->imageUrl())
                <div class="field-group">
                    <label class="field-label">Current Image</label>
                    <img src="{{ $homeCertificate->imageUrl() }}"
                         alt="{{ $homeCertificate->alt_text ?: $homeCertificate->title }}"
                         style="width:100%;max-height:240px;object-fit:contain;border-radius:14px;border:1px solid #E2E8F0;background:#F8FAFC;">
                </div>
            @endif

            <div class="field-group">
                <label class="field-label" for="certificate_image">Upload Certificate Image</label>
                <input type="file"
                       name="certificate_image"
                       id="certificate_image"
                       accept="image/*"
                       class="field-input {{ $errors->has('certificate_image') ? 'error' : '' }}">
                <p class="field-hint">JPG, PNG or WEBP. Max 4 MB.</p>
            </div>

            <div class="field-group">
                <label class="field-label" for="image_path">Fallback Asset Path</label>
                <input type="text"
                       name="image_path"
                       id="image_path"
                       value="{{ old('image_path', $homeCertificate->image_path ?? '') }}"
                       class="field-input {{ $errors->has('image_path') ? 'error' : '' }}"
                       placeholder="assets/img/certificate-1.jpeg">
            </div>

            <div class="field-group">
                <label class="field-label" for="sort_order">Sort Order</label>
                <input type="number"
                       name="sort_order"
                       id="sort_order"
                       value="{{ old('sort_order', $homeCertificate->sort_order ?? 0) }}"
                       min="0"
                       class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
            </div>

            <label class="admin-checkbox-item {{ old('status', $homeCertificate->status ?? true) ? 'checked' : '' }}">
                <input type="checkbox" name="status" value="1" {{ old('status', $homeCertificate->status ?? true) ? 'checked' : '' }}>
                <span class="check-icon"></span>
                <span class="checkbox-text">Published</span>
            </label>
        </div>
    </div>
</div>
