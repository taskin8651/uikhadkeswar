@extends('layouts.admin')

@section('page-title', 'Add Gallery Item')

@section('content')

@php
    $selectedCategories = old('category_slugs', []);
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.gallery-items.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add Gallery Item</h2>

        <p class="admin-page-subtitle">
            Add photo, MP4 video or YouTube gallery item
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.gallery-items.store') }}"
      enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        {{-- GALLERY CONTENT --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-images"></i>
                </div>

                <div>
                    <p class="form-card-title">Gallery Content</p>
                    <p class="form-card-subtitle">Title, media type and uploaded files</p>
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
                               value="{{ old('title') }}"
                               required
                               placeholder="Classroom Learning Session"
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
                    <label class="field-label" for="label">
                        Overlay Label
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="label"
                               id="label"
                               value="{{ old('label') }}"
                               placeholder="Classroom"
                               class="field-input {{ $errors->has('label') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('label'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('label') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="alt_text">
                        Alt Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>

                        <input type="text"
                               name="alt_text"
                               id="alt_text"
                               value="{{ old('alt_text') }}"
                               placeholder="Khadkeshwar Academy gallery image"
                               class="field-input {{ $errors->has('alt_text') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('alt_text'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('alt_text') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="media_type">
                        Media Type <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-photo-video icon"></i>

                        <select name="media_type"
                                id="media_type"
                                required
                                class="field-input {{ $errors->has('media_type') ? 'error' : '' }}">
                            @foreach(['image' => 'Image', 'video' => 'MP4 Video', 'youtube' => 'YouTube'] as $value => $label)
                                <option value="{{ $value }}" {{ old('media_type', 'image') === $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @if($errors->has('media_type'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('media_type') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="media_file">
                        Media File
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file-upload icon"></i>

                        <input type="file"
                               name="media_file"
                               id="media_file"
                               accept="image/*,video/mp4"
                               class="field-input {{ $errors->has('media_file') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('media_file'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('media_file') }}
                        </p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-info-circle"></i>
                            Upload image or MP4. For YouTube, use Source URL.
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="thumbnail_file">
                        Thumbnail Image
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-image icon"></i>

                        <input type="file"
                               name="thumbnail_file"
                               id="thumbnail_file"
                               accept="image/*"
                               class="field-input {{ $errors->has('thumbnail_file') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('thumbnail_file'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('thumbnail_file') }}
                        </p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-info-circle"></i>
                            Optional thumbnail for videos or YouTube gallery items.
                        </p>
                    @endif
                </div>

            </div>
        </div>

        {{-- DISPLAY SETTINGS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-sliders-h"></i>
                </div>

                <div>
                    <p class="form-card-title">Display Settings</p>
                    <p class="form-card-subtitle">Filters, source URL, layout and visibility</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="source_url">
                        Source URL / Path
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>

                        <input type="text"
                               name="source_url"
                               id="source_url"
                               value="{{ old('source_url') }}"
                               placeholder="https://www.youtube.com/embed/..."
                               class="field-input {{ $errors->has('source_url') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('source_url'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('source_url') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="thumbnail_url">
                        Fallback Thumbnail Path
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-image icon"></i>

                        <input type="text"
                               name="thumbnail_url"
                               id="thumbnail_url"
                               value="{{ old('thumbnail_url') }}"
                               placeholder="assets/img/img2.jpeg"
                               class="field-input {{ $errors->has('thumbnail_url') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('thumbnail_url'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('thumbnail_url') }}
                        </p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-info-circle"></i>
                            Used only when uploaded thumbnail is not available.
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">
                        Filter Categories
                    </label>

                    <div class="checkbox-grid">
                        @foreach($categories as $category)
                            <label class="role-checkbox-item {{ in_array($category->slug, $selectedCategories, true) ? 'checked' : '' }}">
                                <input type="checkbox"
                                       name="category_slugs[]"
                                       value="{{ $category->slug }}"
                                       class="role-checkbox"
                                       {{ in_array($category->slug, $selectedCategories, true) ? 'checked' : '' }}>

                                <div class="check-icon"></div>

                                <span class="checkbox-text">{{ $category->name }}</span>
                            </label>
                        @endforeach
                    </div>

                    @if($errors->has('category_slugs'))
                        <p class="field-error mt-2">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('category_slugs') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="layout">
                        Card Layout
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-border-all icon"></i>

                        <select name="layout"
                                id="layout"
                                class="field-input {{ $errors->has('layout') ? 'error' : '' }}">
                            @foreach(['normal' => 'Normal', 'tall' => 'Tall', 'wide' => 'Wide'] as $value => $label)
                                <option value="{{ $value }}" {{ old('layout', 'normal') === $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @if($errors->has('layout'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('layout') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">
                        Sort Order
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', 0) }}"
                               min="0"
                               placeholder="1"
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
                    <label class="role-checkbox-item {{ old('status', true) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', true) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">Publish this gallery item</span>
                    </label>
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Gallery images and videos will be handled through media library.
                    </p>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.gallery-items.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@endsection