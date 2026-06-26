@csrf

@if(isset($resultTestimonial))
    @method('PUT')
@endif

<div class="admin-form-grid">
    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-comment-dots"></i>
            </div>

            <div>
                <p class="form-card-title">Testimonial Information</p>
                <p class="form-card-subtitle">Review text and reviewer details</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label" for="review_text">Review Text <span class="req">*</span></label>
                <textarea name="review_text" id="review_text" rows="7" required placeholder="The academy focuses on regular practice..." class="field-input {{ $errors->has('review_text') ? 'error' : '' }}">{{ old('review_text', $resultTestimonial->review_text ?? '') }}</textarea>
                @if($errors->has('review_text'))
                    <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('review_text') }}</p>
                @else
                    <p class="field-hint"><i class="fas fa-align-left"></i> Quotes are added by the frontend design.</p>
                @endif
            </div>

            <div class="field-group">
                <label class="field-label" for="reviewer_name">Reviewer Name <span class="req">*</span></label>
                <div class="input-icon-wrap">
                    <i class="fas fa-user icon"></i>
                    <input type="text" name="reviewer_name" id="reviewer_name" value="{{ old('reviewer_name', $resultTestimonial->reviewer_name ?? '') }}" required placeholder="Student Review" class="field-input {{ $errors->has('reviewer_name') ? 'error' : '' }}">
                </div>
                @if($errors->has('reviewer_name'))<p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('reviewer_name') }}</p>@endif
            </div>

            <div class="field-group">
                <label class="field-label" for="reviewer_type">Reviewer Type</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-tag icon"></i>
                    <input type="text" name="reviewer_type" id="reviewer_type" value="{{ old('reviewer_type', $resultTestimonial->reviewer_type ?? '') }}" placeholder="NEET / JEE Aspirant" class="field-input {{ $errors->has('reviewer_type') ? 'error' : '' }}">
                </div>
                @if($errors->has('reviewer_type'))<p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('reviewer_type') }}</p>@endif
            </div>
        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-sliders-h"></i>
            </div>

            <div>
                <p class="form-card-title">Display Settings</p>
                <p class="form-card-subtitle">Rating, order, featured style and visibility</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label" for="rating">Rating</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-star icon"></i>
                    <input type="number" name="rating" id="rating" value="{{ old('rating', $resultTestimonial->rating ?? 5) }}" min="1" max="5" class="field-input {{ $errors->has('rating') ? 'error' : '' }}">
                </div>
                @if($errors->has('rating'))
                    <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('rating') }}</p>
                @else
                    <p class="field-hint"><i class="fas fa-info-circle"></i> Use a value from 1 to 5.</p>
                @endif
            </div>

            <div class="field-group">
                <label class="field-label" for="sort_order">Sort Order</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-sort-numeric-down icon"></i>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $resultTestimonial->sort_order ?? 0) }}" min="0" class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                </div>
                @if($errors->has('sort_order'))
                    <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('sort_order') }}</p>
                @else
                    <p class="field-hint"><i class="fas fa-info-circle"></i> Lower number will appear first.</p>
                @endif
            </div>

            <div class="checkbox-grid">
                <label class="role-checkbox-item {{ old('is_featured', $resultTestimonial->is_featured ?? false) ? 'checked' : '' }}">
                    <input type="checkbox" name="is_featured" value="1" class="role-checkbox" {{ old('is_featured', $resultTestimonial->is_featured ?? false) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Use featured card style</span>
                </label>

                <label class="role-checkbox-item {{ old('status', $resultTestimonial->status ?? true) ? 'checked' : '' }}">
                    <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $resultTestimonial->status ?? true) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Publish this testimonial</span>
                </label>
            </div>
        </div>
    </div>
</div>
