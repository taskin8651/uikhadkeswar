@csrf

@if(isset($resultRanker))
    @method('PUT')
@endif

<div class="admin-form-grid">
    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-trophy"></i>
            </div>

            <div>
                <p class="form-card-title">Ranker Information</p>
                <p class="form-card-subtitle">Student and result card content</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label" for="exam_type">Exam Type <span class="req">*</span></label>
                <div class="input-icon-wrap">
                    <i class="fas fa-graduation-cap icon"></i>
                    <input type="text" name="exam_type" id="exam_type" value="{{ old('exam_type', $resultRanker->exam_type ?? '') }}" required placeholder="NEET" class="field-input {{ $errors->has('exam_type') ? 'error' : '' }}">
                </div>
                @if($errors->has('exam_type'))<p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('exam_type') }}</p>@endif
            </div>

            <div class="field-group">
                <label class="field-label" for="badge_text">Badge Text <span class="req">*</span></label>
                <div class="input-icon-wrap">
                    <i class="fas fa-tag icon"></i>
                    <input type="text" name="badge_text" id="badge_text" value="{{ old('badge_text', $resultRanker->badge_text ?? '') }}" required placeholder="Top Performer" class="field-input {{ $errors->has('badge_text') ? 'error' : '' }}">
                </div>
                @if($errors->has('badge_text'))<p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('badge_text') }}</p>@endif
            </div>

            <div class="field-group">
                <label class="field-label" for="student_name">Student Name <span class="req">*</span></label>
                <div class="input-icon-wrap">
                    <i class="fas fa-user icon"></i>
                    <input type="text" name="student_name" id="student_name" value="{{ old('student_name', $resultRanker->student_name ?? '') }}" required placeholder="Student Name" class="field-input {{ $errors->has('student_name') ? 'error' : '' }}">
                </div>
                @if($errors->has('student_name'))<p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('student_name') }}</p>@endif
            </div>

            <div class="field-group">
                <label class="field-label" for="description">Description</label>
                <textarea name="description" id="description" rows="5" placeholder="NEET achievement details will be added after result confirmation." class="field-input {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $resultRanker->description ?? '') }}</textarea>
                @if($errors->has('description'))
                    <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('description') }}</p>
                @else
                    <p class="field-hint"><i class="fas fa-align-left"></i> Keep it short for better frontend card design.</p>
                @endif
            </div>

            <div class="field-group">
                <label class="field-label" for="icon">Bootstrap Icon Class</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-icons icon"></i>
                    <input type="text" name="icon" id="icon" value="{{ old('icon', $resultRanker->icon ?? 'bi bi-person-fill') }}" placeholder="bi bi-person-fill" class="field-input {{ $errors->has('icon') ? 'error' : '' }}">
                </div>
                @if($errors->has('icon'))<p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('icon') }}</p>@endif
            </div>

            <div class="field-group">
                <label class="field-label" for="image">Student Image</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-image icon"></i>
                    <input type="file" name="image" id="image" accept="image/*" class="field-input {{ $errors->has('image') ? 'error' : '' }}">
                </div>

                @if($errors->has('image'))
                    <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('image') }}</p>
                @else
                    <p class="field-hint"><i class="fas fa-info-circle"></i> Recommended format: JPG, PNG or WEBP. Max size 2MB.</p>
                @endif

                @if(isset($resultRanker) && $resultRanker->getFirstMediaUrl('ranker_image'))
                    <div style="margin-top:14px;">
                        <img src="{{ $resultRanker->getFirstMediaUrl('ranker_image') }}"
                             alt="{{ $resultRanker->student_name }}"
                             style="width:150px;height:150px;object-fit:cover;border-radius:16px;border:1px solid #e5e7eb;">
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-chart-line"></i>
            </div>

            <div>
                <p class="form-card-title">Result Meta</p>
                <p class="form-card-subtitle">Two small metric blocks inside the card</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label" for="meta_one_label">Meta 1 Label</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-font icon"></i>
                    <input type="text" name="meta_one_label" id="meta_one_label" value="{{ old('meta_one_label', $resultRanker->meta_one_label ?? '') }}" placeholder="Score" class="field-input {{ $errors->has('meta_one_label') ? 'error' : '' }}">
                </div>
            </div>

            <div class="field-group">
                <label class="field-label" for="meta_one_value">Meta 1 Value</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-hashtag icon"></i>
                    <input type="text" name="meta_one_value" id="meta_one_value" value="{{ old('meta_one_value', $resultRanker->meta_one_value ?? '') }}" placeholder="Update Soon" class="field-input {{ $errors->has('meta_one_value') ? 'error' : '' }}">
                </div>
            </div>

            <div class="field-group">
                <label class="field-label" for="meta_two_label">Meta 2 Label</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-font icon"></i>
                    <input type="text" name="meta_two_label" id="meta_two_label" value="{{ old('meta_two_label', $resultRanker->meta_two_label ?? '') }}" placeholder="Year" class="field-input {{ $errors->has('meta_two_label') ? 'error' : '' }}">
                </div>
            </div>

            <div class="field-group">
                <label class="field-label" for="meta_two_value">Meta 2 Value</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-calendar-alt icon"></i>
                    <input type="text" name="meta_two_value" id="meta_two_value" value="{{ old('meta_two_value', $resultRanker->meta_two_value ?? '') }}" placeholder="2026" class="field-input {{ $errors->has('meta_two_value') ? 'error' : '' }}">
                </div>
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
                <p class="form-card-subtitle">Manage order, featured style and visibility</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label" for="sort_order">Sort Order</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-sort-numeric-down icon"></i>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $resultRanker->sort_order ?? 0) }}" min="0" class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                </div>
                @if($errors->has('sort_order'))
                    <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('sort_order') }}</p>
                @else
                    <p class="field-hint"><i class="fas fa-info-circle"></i> Lower number will appear first.</p>
                @endif
            </div>

            <div class="checkbox-grid">
                <label class="role-checkbox-item {{ old('is_featured', $resultRanker->is_featured ?? false) ? 'checked' : '' }}">
                    <input type="checkbox" name="is_featured" value="1" class="role-checkbox" {{ old('is_featured', $resultRanker->is_featured ?? false) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Use featured card style</span>
                </label>

                <label class="role-checkbox-item {{ old('status', $resultRanker->status ?? true) ? 'checked' : '' }}">
                    <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $resultRanker->status ?? true) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Publish this ranker card</span>
                </label>
            </div>
        </div>
    </div>
</div>
