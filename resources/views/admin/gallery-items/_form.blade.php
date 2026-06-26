@csrf

@if(isset($galleryItem))
    @method('PUT')
@endif

@php
    $selectedCategories = old('category_slugs', isset($galleryItem) ? explode(' ', (string) $galleryItem->category_slugs) : []);
@endphp

<div class="admin-form-grid">
    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-images"></i></div>
            <div>
                <p class="form-card-title">Gallery Content</p>
                <p class="form-card-subtitle">Title, media type and uploaded files</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label" for="title">Title <span class="req">*</span></label>
                <div class="input-icon-wrap">
                    <i class="fas fa-heading icon"></i>
                    <input type="text" name="title" id="title" value="{{ old('title', $galleryItem->title ?? '') }}" required class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                </div>
                @if($errors->has('title'))<p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('title') }}</p>@endif
            </div>

            <div class="field-group">
                <label class="field-label" for="label">Overlay Label</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-tag icon"></i>
                    <input type="text" name="label" id="label" value="{{ old('label', $galleryItem->label ?? '') }}" placeholder="Classroom" class="field-input">
                </div>
            </div>

            <div class="field-group">
                <label class="field-label" for="alt_text">Alt Text</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-align-left icon"></i>
                    <input type="text" name="alt_text" id="alt_text" value="{{ old('alt_text', $galleryItem->alt_text ?? '') }}" class="field-input">
                </div>
            </div>

            <div class="field-group">
                <label class="field-label" for="media_type">Media Type <span class="req">*</span></label>
                <select name="media_type" id="media_type" class="field-input">
                    @foreach(['image' => 'Image', 'video' => 'MP4 Video', 'youtube' => 'YouTube'] as $value => $label)
                        <option value="{{ $value }}" {{ old('media_type', $galleryItem->media_type ?? 'image') === $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="field-group">
                <label class="field-label" for="media_file">Media File</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-file-upload icon"></i>
                    <input type="file" name="media_file" id="media_file" accept="image/*,video/mp4" class="field-input {{ $errors->has('media_file') ? 'error' : '' }}">
                </div>
                @if($errors->has('media_file'))
                    <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('media_file') }}</p>
                @else
                    <p class="field-hint"><i class="fas fa-info-circle"></i> Upload image or MP4. For YouTube, use Source URL.</p>
                @endif
            </div>

            <div class="field-group">
                <label class="field-label" for="thumbnail_file">Thumbnail Image</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-image icon"></i>
                    <input type="file" name="thumbnail_file" id="thumbnail_file" accept="image/*" class="field-input {{ $errors->has('thumbnail_file') ? 'error' : '' }}">
                </div>
                @if($errors->has('thumbnail_file'))<p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first('thumbnail_file') }}</p>@endif
            </div>

            @if(isset($galleryItem) && $galleryItem->thumbnailSource())
                <div style="margin-top:14px;">
                    <img src="{{ $galleryItem->thumbnailSource() }}" alt="{{ $galleryItem->alt_text ?: $galleryItem->title }}" style="width:180px;height:130px;object-fit:cover;border-radius:16px;border:1px solid #e5e7eb;">
                </div>
            @endif
        </div>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon"><i class="fas fa-sliders-h"></i></div>
            <div>
                <p class="form-card-title">Display Settings</p>
                <p class="form-card-subtitle">Filters, source URL, layout and visibility</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="field-group">
                <label class="field-label" for="source_url">Source URL / Path</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-link icon"></i>
                    <input type="text" name="source_url" id="source_url" value="{{ old('source_url', $galleryItem->source_url ?? '') }}" placeholder="https://www.youtube.com/embed/..." class="field-input">
                </div>
            </div>

            <div class="field-group">
                <label class="field-label" for="thumbnail_url">Fallback Thumbnail Path</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-image icon"></i>
                    <input type="text" name="thumbnail_url" id="thumbnail_url" value="{{ old('thumbnail_url', $galleryItem->thumbnail_url ?? '') }}" placeholder="assets/img/img2.jpeg" class="field-input">
                </div>
            </div>

            <div class="field-group">
                <label class="field-label">Filter Categories</label>
                <div class="checkbox-grid">
                    @foreach($categories as $category)
                        <label class="role-checkbox-item {{ in_array($category->slug, $selectedCategories, true) ? 'checked' : '' }}">
                            <input type="checkbox" name="category_slugs[]" value="{{ $category->slug }}" class="role-checkbox" {{ in_array($category->slug, $selectedCategories, true) ? 'checked' : '' }}>
                            <div class="check-icon"></div>
                            <span class="checkbox-text">{{ $category->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="field-group">
                <label class="field-label" for="layout">Card Layout</label>
                <select name="layout" id="layout" class="field-input">
                    @foreach(['normal' => 'Normal', 'tall' => 'Tall', 'wide' => 'Wide'] as $value => $label)
                        <option value="{{ $value }}" {{ old('layout', $galleryItem->layout ?? 'normal') === $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="field-group">
                <label class="field-label" for="sort_order">Sort Order</label>
                <div class="input-icon-wrap">
                    <i class="fas fa-sort-numeric-down icon"></i>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $galleryItem->sort_order ?? 0) }}" min="0" class="field-input">
                </div>
            </div>

            <div class="checkbox-grid">
                <label class="role-checkbox-item {{ old('status', $galleryItem->status ?? true) ? 'checked' : '' }}">
                    <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $galleryItem->status ?? true) ? 'checked' : '' }}>
                    <div class="check-icon"></div>
                    <span class="checkbox-text">Publish this gallery item</span>
                </label>
            </div>
        </div>
    </div>
</div>
