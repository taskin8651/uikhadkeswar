@csrf

@if(isset($resourceItem))
    @method('PUT')
@endif

<div class="admin-form-grid">
    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-folder-open"></i></div>
            <div>
                <p class="form-card-title">Resource Content</p>
                <p class="form-card-subtitle">Card text, icon and resource filter categories</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label" for="title">Title <span class="req">*</span></label>
                <div class="input-icon-wrap">
                    <i class="fas fa-heading icon"></i>
                    <input type="text" name="title" id="title" value="{{ old('title', $resourceItem->title ?? '') }}" required class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                </div>
                @if($errors->has('title'))<p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('title') }}</p>@endif
            </div>

            <div class="field-group">
                <label class="field-label" for="description">Description</label>
                <textarea name="description" id="description" rows="5" class="field-input {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $resourceItem->description ?? '') }}</textarea>
                @if($errors->has('description'))<p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('description') }}</p>@endif
            </div>

            <div class="field-group">
                <label class="field-label" for="category_slugs">Filter Categories</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-filter icon"></i>
                    <input type="text" name="category_slugs" id="category_slugs" value="{{ old('category_slugs', $resourceItem->category_slugs ?? '') }}" placeholder="study downloads" class="field-input">
                </div>
                <p class="field-hint"><i class="fas fa-info-circle"></i>Use: study, notices, exam, downloads, tips. Multiple values space se separate karein.</p>
            </div>

            <div class="field-group">
                <label class="field-label" for="badge_text">Badge Text</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-tag icon"></i>
                    <input type="text" name="badge_text" id="badge_text" value="{{ old('badge_text', $resourceItem->badge_text ?? '') }}" placeholder="PDF Notes" class="field-input">
                </div>
            </div>

            <div class="field-group">
                <label class="field-label" for="icon">Main Icon Class</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-icons icon"></i>
                    <input type="text" name="icon" id="icon" value="{{ old('icon', $resourceItem->icon ?? 'bi bi-file-earmark-pdf-fill') }}" placeholder="bi bi-file-earmark-pdf-fill" class="field-input">
                </div>
            </div>
        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-list"></i></div>
            <div>
                <p class="form-card-title">Meta & Button</p>
                <p class="form-card-subtitle">Small labels and call-to-action link</p>
            </div>
        </div>

        <div class="form-card-body">
            @foreach([
                'meta_one_icon' => 'Meta One Icon',
                'meta_one_text' => 'Meta One Text',
                'meta_two_icon' => 'Meta Two Icon',
                'meta_two_text' => 'Meta Two Text',
                'button_text' => 'Button Text',
                'button_icon' => 'Button Icon',
            ] as $field => $label)
                <div class="field-group">
                    <label class="field-label" for="{{ $field }}">{{ $label }}</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-edit icon"></i>
                        <input type="text" name="{{ $field }}" id="{{ $field }}" value="{{ old($field, $resourceItem->{$field} ?? '') }}" class="field-input">
                    </div>
                </div>
            @endforeach

            <div class="field-group">
                <label class="field-label" for="link_type">Button Link Type</label>
                <select name="link_type" id="link_type" class="field-input">
                    @foreach(['route' => 'Website Route', 'file' => 'Uploaded File', 'custom' => 'Custom URL / #'] as $value => $label)
                        <option value="{{ $value }}" {{ old('link_type', $resourceItem->link_type ?? 'route') === $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="field-group">
                <label class="field-label" for="route_name">Website Route</label>
                <select name="route_name" id="route_name" class="field-input">
                    <option value="">Select Route</option>
                    @foreach($frontendRoutes as $routeName => $label)
                        <option value="{{ $routeName }}" {{ old('route_name', $resourceItem->route_name ?? '') === $routeName ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="field-group">
                <label class="field-label" for="custom_url">Custom URL</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-link icon"></i>
                    <input type="text" name="custom_url" id="custom_url" value="{{ old('custom_url', $resourceItem->custom_url ?? '') }}" placeholder="https://... or #" class="field-input">
                </div>
            </div>

            <div class="field-group">
                <label class="field-label" for="resource_file">Upload File</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-file-upload icon"></i>
                    <input type="file" name="resource_file" id="resource_file" class="field-input">
                </div>
                @if(isset($resourceItem) && $resourceItem->getFirstMediaUrl('resource_file'))
                    <p class="field-hint"><i class="fas fa-link"></i><a href="{{ $resourceItem->getFirstMediaUrl('resource_file') }}" target="_blank" rel="noopener noreferrer">Current uploaded file</a></p>
                @endif
            </div>
        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-sliders-h"></i></div>
            <div>
                <p class="form-card-title">Display Settings</p>
                <p class="form-card-subtitle">Order, featured style and publish status</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label" for="sort_order">Sort Order</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-sort-numeric-down icon"></i>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $resourceItem->sort_order ?? 0) }}" min="0" class="field-input">
                </div>
            </div>

            <div class="checkbox-grid">
                <label class="role-checkbox-item {{ old('is_featured', $resourceItem->is_featured ?? false) ? 'checked' : '' }}">
                    <input type="checkbox" name="is_featured" value="1" class="role-checkbox" {{ old('is_featured', $resourceItem->is_featured ?? false) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Featured card style</span>
                </label>

                <label class="role-checkbox-item {{ old('status', $resourceItem->status ?? true) ? 'checked' : '' }}">
                    <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $resourceItem->status ?? true) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Publish this resource</span>
                </label>
            </div>
        </div>
    </div>
</div>

<div class="form-actions mt-4">
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i>
        Save Resource
    </button>
</div>
