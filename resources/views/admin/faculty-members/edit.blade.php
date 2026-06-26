@extends('layouts.admin')

@section('page-title', 'Edit Faculty Member')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.faculty-members.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Faculty Member</h2>

        <p class="admin-page-subtitle">
            Update faculty profile, image, bullet points and display settings
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.faculty-members.update', $facultyMember->id) }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        {{-- FACULTY PROFILE --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>

                <div>
                    <p class="form-card-title">Faculty Profile</p>
                    <p class="form-card-subtitle">Teacher details and image</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="name">
                        Faculty Name <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-user icon"></i>

                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name', $facultyMember->name) }}"
                               required
                               placeholder="Enter faculty name"
                               class="field-input {{ $errors->has('name') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('name'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="subject">
                        Subject / Role <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-book icon"></i>

                        <input type="text"
                               name="subject"
                               id="subject"
                               value="{{ old('subject', $facultyMember->subject) }}"
                               required
                               placeholder="Physics Faculty"
                               class="field-input {{ $errors->has('subject') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('subject'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('subject') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="badge">
                        Badge
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="badge"
                               id="badge"
                               value="{{ old('badge', $facultyMember->badge) }}"
                               placeholder="NEET / JEE"
                               class="field-input {{ $errors->has('badge') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('badge'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('badge') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">
                        Description
                    </label>

                    <textarea name="description"
                              id="description"
                              rows="5"
                              placeholder="Write short faculty profile description"
                              class="field-input {{ $errors->has('description') ? 'error' : '' }}">{{ old('description', $facultyMember->description) }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-info-circle"></i>
                            Keep description short for better card design.
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="image">
                        Faculty Image
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
                            JPG, PNG or WEBP. Max size 2MB. Uploading a new image will replace the old image.
                        </p>
                    @endif

                    @if($facultyMember->imageUrl())
                        <div style="margin-top:14px;">
                            <img src="{{ $facultyMember->imageUrl() }}"
                                 alt="{{ $facultyMember->image_alt ?: $facultyMember->name }}"
                                 style="width:160px;height:120px;object-fit:cover;border-radius:16px;border:1px solid #e5e7eb;">
                        </div>
                    @endif
                </div>

            </div>
        </div>

        {{-- CARD DETAILS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-list-check"></i>
                </div>

                <div>
                    <p class="form-card-title">Card Details</p>
                    <p class="form-card-subtitle">Bullet points, fallback image and display settings</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="point_one">
                        Point 1
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-check icon"></i>

                        <input type="text"
                               name="point_one"
                               id="point_one"
                               value="{{ old('point_one', $facultyMember->point_one) }}"
                               placeholder="Concept clarity"
                               class="field-input {{ $errors->has('point_one') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('point_one'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('point_one') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="point_two">
                        Point 2
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-check icon"></i>

                        <input type="text"
                               name="point_two"
                               id="point_two"
                               value="{{ old('point_two', $facultyMember->point_two) }}"
                               placeholder="Regular doubt support"
                               class="field-input {{ $errors->has('point_two') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('point_two'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('point_two') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="point_three">
                        Point 3
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-check icon"></i>

                        <input type="text"
                               name="point_three"
                               id="point_three"
                               value="{{ old('point_three', $facultyMember->point_three) }}"
                               placeholder="Exam-focused preparation"
                               class="field-input {{ $errors->has('point_three') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('point_three'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('point_three') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="image_alt">
                        Image Alt Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>

                        <input type="text"
                               name="image_alt"
                               id="image_alt"
                               value="{{ old('image_alt', $facultyMember->image_alt) }}"
                               placeholder="Faculty member at Khadkeshwar Academy"
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
                    <label class="field-label" for="fallback_image">
                        Fallback Image Path
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>

                        <input type="text"
                               name="fallback_image"
                               id="fallback_image"
                               value="{{ old('fallback_image', $facultyMember->fallback_image) }}"
                               placeholder="assets/img/faculty-1.jpg"
                               class="field-input {{ $errors->has('fallback_image') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('fallback_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('fallback_image') }}
                        </p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-info-circle"></i>
                            Used only when no uploaded image is available.
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
                               value="{{ old('sort_order', $facultyMember->sort_order) }}"
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
                    <label class="role-checkbox-item {{ old('is_active', $facultyMember->is_active) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="is_active"
                               value="1"
                               class="role-checkbox"
                               {{ old('is_active', $facultyMember->is_active) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">Use active card style</span>
                    </label>

                    <label class="role-checkbox-item {{ old('status', $facultyMember->status) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $facultyMember->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">Publish this faculty member</span>
                    </label>
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Faculty image will be updated through media library.
                    </p>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Update Faculty
        </button>

        <a href="{{ route('admin.faculty-members.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@endsection