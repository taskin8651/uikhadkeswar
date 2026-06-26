@csrf

@if(isset($startupCard))
    @method('PUT')
@endif

<div class="admin-form-grid">
    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-rocket"></i></div>
            <div>
                <p class="form-card-title">Startup Card Content</p>
                <p class="form-card-subtitle">Overview or roadmap card details</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label" for="section">Section <span class="req">*</span></label>
                <select name="section" id="section" class="field-input">
                    <option value="overview" {{ old('section', $startupCard->section ?? 'overview') === 'overview' ? 'selected' : '' }}>Vision Overview</option>
                    <option value="roadmap" {{ old('section', $startupCard->section ?? '') === 'roadmap' ? 'selected' : '' }}>Growth Roadmap</option>
                </select>
            </div>

            <div class="field-group">
                <label class="field-label" for="title">Title <span class="req">*</span></label>
                <div class="input-icon-wrap">
                    <i class="fas fa-heading icon"></i>
                    <input type="text" name="title" id="title" value="{{ old('title', $startupCard->title ?? '') }}" required class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                </div>
                @if($errors->has('title'))<p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('title') }}</p>@endif
            </div>

            <div class="field-group">
                <label class="field-label" for="description">Description</label>
                <textarea name="description" id="description" rows="6" class="field-input {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $startupCard->description ?? '') }}</textarea>
                @if($errors->has('description'))<p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('description') }}</p>@endif
            </div>

            <div class="field-group">
                <label class="field-label" for="icon">Bootstrap Icon Class</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-icons icon"></i>
                    <input type="text" name="icon" id="icon" value="{{ old('icon', $startupCard->icon ?? '') }}" placeholder="bi bi-robot" class="field-input">
                </div>
            </div>
        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-sliders-h"></i></div>
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
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $startupCard->sort_order ?? 0) }}" min="0" class="field-input">
                </div>
            </div>

            <div class="checkbox-grid">
                <label class="role-checkbox-item {{ old('is_featured', $startupCard->is_featured ?? false) ? 'checked' : '' }}">
                    <input type="checkbox" name="is_featured" value="1" class="role-checkbox" {{ old('is_featured', $startupCard->is_featured ?? false) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Use featured card style</span>
                </label>

                <label class="role-checkbox-item {{ old('status', $startupCard->status ?? true) ? 'checked' : '' }}">
                    <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $startupCard->status ?? true) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Publish this card</span>
                </label>
            </div>
        </div>
    </div>
</div>
