@csrf

@if(isset($companyRecognition))
    @method('PUT')
@endif

<div class="admin-form-grid">
    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-certificate"></i>
            </div>

            <div>
                <p class="form-card-title">Recognition Information</p>
                <p class="form-card-subtitle">Card content shown on company information page</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label" for="title">
                    Title <span class="req">*</span>
                </label>

                <div class="input-icon-wrap">
                    <i class="fas fa-heading icon"></i>

                    <input type="text"
                           name="title"
                           id="title"
                           value="{{ old('title', $companyRecognition->title ?? '') }}"
                           required
                           placeholder="ISO 9001:2015 Certified Institute"
                           class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                </div>

                @if($errors->has('title'))
                    <p class="field-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first('title') }}
                    </p>
                @endif
            </div>

            <div class="field-group">
                <label class="field-label" for="description">Description</label>

                <textarea name="description"
                          id="description"
                          rows="6"
                          placeholder="Quality-focused education process and organized academic support system."
                          class="field-input {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $companyRecognition->description ?? '') }}</textarea>

                @if($errors->has('description'))
                    <p class="field-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first('description') }}
                    </p>
                @else
                    <p class="field-hint">
                        <i class="fas fa-align-left"></i>
                        Keep it short for better frontend card design.
                    </p>
                @endif
            </div>

            <div class="field-group">
                <label class="field-label" for="icon">Bootstrap Icon Class</label>

                <div class="input-icon-wrap">
                    <i class="fas fa-icons icon"></i>

                    <input type="text"
                           name="icon"
                           id="icon"
                           value="{{ old('icon', $companyRecognition->icon ?? '') }}"
                           placeholder="bi bi-shield-check"
                           class="field-input {{ $errors->has('icon') ? 'error' : '' }}">
                </div>

                @if($errors->has('icon'))
                    <p class="field-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first('icon') }}
                    </p>
                @else
                    <p class="field-hint">
                        <i class="fas fa-info-circle"></i>
                        Example: bi bi-shield-check, bi bi-stars, bi bi-patch-check-fill.
                    </p>
                @endif
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
                <p class="form-card-subtitle">Manage order and visibility</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label" for="sort_order">Sort Order</label>

                <div class="input-icon-wrap">
                    <i class="fas fa-sort-numeric-down icon"></i>

                    <input type="number"
                           name="sort_order"
                           id="sort_order"
                           value="{{ old('sort_order', $companyRecognition->sort_order ?? 0) }}"
                           min="0"
                           class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                </div>

                @if($errors->has('sort_order'))
                    <p class="field-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first('sort_order') }}
                    </p>
                @else
                    <p class="field-hint">
                        <i class="fas fa-info-circle"></i>
                        Lower number will appear first.
                    </p>
                @endif
            </div>

            <div class="checkbox-grid">
                <label class="role-checkbox-item {{ old('status', $companyRecognition->status ?? true) ? 'checked' : '' }}">
                    <input type="checkbox"
                           name="status"
                           value="1"
                           class="role-checkbox"
                           {{ old('status', $companyRecognition->status ?? true) ? 'checked' : '' }}>

                    <div class="check-icon"></div>

                    <span class="checkbox-text">Publish this recognition card</span>
                </label>
            </div>

            <div class="form-info-box">
                <p>
                    <i class="fas fa-info-circle"></i>
                    Animation delay is generated automatically from card order.
                </p>
            </div>
        </div>
    </div>
</div>
