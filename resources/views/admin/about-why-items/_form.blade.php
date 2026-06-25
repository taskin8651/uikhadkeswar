@csrf

@if(isset($aboutWhyItem))
    @method('PUT')
@endif

<div class="admin-form-grid">
    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-award"></i>
            </div>

            <div>
                <p class="form-card-title">Why Choose Information</p>
                <p class="form-card-subtitle">Card content shown on About Academy page</p>
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
                           value="{{ old('title', $aboutWhyItem->title ?? '') }}"
                           required
                           placeholder="Experienced Faculty"
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
                <label class="field-label" for="description">
                    Description
                </label>

                <textarea name="description"
                          id="description"
                          rows="6"
                          placeholder="Subject-focused teaching for NEET, JEE and Foundation preparation."
                          class="field-input {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $aboutWhyItem->description ?? '') }}</textarea>

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
                <label class="field-label" for="icon">
                    Bootstrap Icon Class
                </label>

                <div class="input-icon-wrap">
                    <i class="fas fa-icons icon"></i>

                    <input type="text"
                           name="icon"
                           id="icon"
                           value="{{ old('icon', $aboutWhyItem->icon ?? '') }}"
                           placeholder="bi bi-person-workspace"
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
                        Example: bi bi-award-fill, bi bi-people-fill, bi bi-cpu-fill.
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
                <label class="field-label" for="sort_order">
                    Sort Order
                </label>

                <div class="input-icon-wrap">
                    <i class="fas fa-sort-numeric-down icon"></i>

                    <input type="number"
                           name="sort_order"
                           id="sort_order"
                           value="{{ old('sort_order', $aboutWhyItem->sort_order ?? 0) }}"
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
                <label class="role-checkbox-item {{ old('status', $aboutWhyItem->status ?? true) ? 'checked' : '' }}">
                    <input type="checkbox"
                           name="status"
                           value="1"
                           class="role-checkbox"
                           {{ old('status', $aboutWhyItem->status ?? true) ? 'checked' : '' }}>

                    <div class="check-icon"></div>

                    <span class="checkbox-text">Publish this why choose card</span>
                </label>
            </div>

            <div class="form-info-box">
                <p>
                    <i class="fas fa-info-circle"></i>
                    Card number and animation delay are generated automatically.
                </p>
            </div>
        </div>
    </div>
</div>
