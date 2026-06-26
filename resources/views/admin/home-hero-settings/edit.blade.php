@extends('layouts.admin')

@section('page-title', 'Home Hero Settings')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.home') }}" class="admin-back-link">Back to Dashboard</a>
        <h2 class="admin-page-title">Home Hero Settings</h2>
        <p class="admin-page-subtitle">Update home hero text, images, stats, classroom, counselling and trust content</p>
    </div>
</div>

@if(session('message'))
    <div class="alert alert-success mb-3">{{ session('message') }}</div>
@endif

@php
    $groups = [
        'Hero Text' => [
            'hero_title_top' => 'Hero Title Top',
            'hero_title_highlight' => 'Hero Title Highlight',
            'hero_title_bottom' => 'Hero Title Bottom',
            'hero_description' => 'Hero Description',
            'hero_strong_text' => 'Hero Strong Text',
            'hero_image_alt' => 'Hero Image Alt',
        ],
        'Top Features' => [
            'feature_one_title' => 'Feature 1 Title',
            'feature_one_subtitle' => 'Feature 1 Subtitle',
            'feature_two_title' => 'Feature 2 Title',
            'feature_two_subtitle' => 'Feature 2 Subtitle',
            'feature_three_title' => 'Feature 3 Title',
            'feature_three_subtitle' => 'Feature 3 Subtitle',
        ],
        'Statistics' => [
            'stat_one_value' => 'Stat 1 Value',
            'stat_one_label' => 'Stat 1 Label',
            'stat_two_value' => 'Stat 2 Value',
            'stat_two_label' => 'Stat 2 Label',
            'stat_three_value' => 'Stat 3 Value',
            'stat_three_label' => 'Stat 3 Label',
            'stat_four_value' => 'Stat 4 Value',
            'stat_four_label' => 'Stat 4 Label',
        ],
        'Classroom Panel' => [
            'classroom_image_alt' => 'Classroom Image Alt',
            'year_card_value' => 'Year Card Value',
            'year_card_label' => 'Year Card Label',
            'ai_card_title' => 'AI Card Title',
            'ai_card_subtitle' => 'AI Card Subtitle',
            'classroom_feature_one_title' => 'Classroom Feature 1 Title',
            'classroom_feature_one_subtitle' => 'Classroom Feature 1 Subtitle',
            'classroom_feature_two_title' => 'Classroom Feature 2 Title',
            'classroom_feature_two_subtitle' => 'Classroom Feature 2 Subtitle',
            'classroom_feature_three_title' => 'Classroom Feature 3 Title',
            'classroom_feature_three_subtitle' => 'Classroom Feature 3 Subtitle',
            'classroom_feature_four_title' => 'Classroom Feature 4 Title',
            'classroom_feature_four_subtitle' => 'Classroom Feature 4 Subtitle',
        ],
        'Counselling CTA' => [
            'counselling_title' => 'Counselling Title',
            'counselling_description' => 'Counselling Description',
            'counselling_point_one' => 'Counselling Point 1',
            'counselling_point_two' => 'Counselling Point 2',
            'counselling_point_three' => 'Counselling Point 3',
        ],
        'Trust Points' => [
            'trust_heading' => 'Trust Heading',
            'trust_one_title' => 'Trust 1 Title',
            'trust_one_subtitle' => 'Trust 1 Subtitle',
            'trust_two_title' => 'Trust 2 Title',
            'trust_two_subtitle' => 'Trust 2 Subtitle',
            'trust_three_title' => 'Trust 3 Title',
            'trust_three_subtitle' => 'Trust 3 Subtitle',
            'trust_four_title' => 'Trust 4 Title',
            'trust_four_subtitle' => 'Trust 4 Subtitle',
            'trust_five_title' => 'Trust 5 Title',
            'trust_five_subtitle' => 'Trust 5 Subtitle',
        ],
    ];
@endphp

<form method="POST" action="{{ route('admin.home-hero-settings.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-image"></i></div>
                <div>
                    <p class="form-card-title">Hero Images</p>
                    <p class="form-card-subtitle">Only images are editable here; icons/buttons/badges stay fixed</p>
                </div>
            </div>
            <div class="form-card-body">
                @foreach(['hero_image' => 'Hero Image', 'classroom_image' => 'Classroom Image'] as $field => $label)
                    <div class="field-group">
                        <label class="field-label" for="{{ $field }}">{{ $label }}</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-image icon"></i>
                            <input type="file" name="{{ $field }}" id="{{ $field }}" accept="image/*" class="field-input {{ $errors->has($field) ? 'error' : '' }}">
                        </div>
                        @if($errors->has($field))
                            <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first($field) }}</p>
                        @else
                            <p class="field-hint"><i class="fas fa-info-circle"></i>Recommended JPG, PNG or WEBP.</p>
                        @endif

                        @if($homeHeroSetting->getFirstMediaUrl($field))
                            <div style="margin-top:12px;">
                                <img src="{{ $homeHeroSetting->getFirstMediaUrl($field) }}" alt="{{ $label }}" style="width:180px;height:100px;object-fit:cover;border-radius:12px;border:1px solid #e5e7eb;">
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        @foreach($groups as $groupTitle => $fields)
            <div class="form-card">
                <div class="form-card-header">
                    <div class="form-card-icon"><i class="fas fa-edit"></i></div>
                    <div>
                        <p class="form-card-title">{{ $groupTitle }}</p>
                        <p class="form-card-subtitle">Frontend text content</p>
                    </div>
                </div>

                <div class="form-card-body">
                    @foreach($fields as $field => $label)
                        <div class="field-group">
                            <label class="field-label" for="{{ $field }}">{{ $label }}</label>
                            @if(str_contains($field, 'description') || str_contains($field, 'label'))
                                <textarea name="{{ $field }}" id="{{ $field }}" rows="3" class="field-input {{ $errors->has($field) ? 'error' : '' }}">{{ old($field, $homeHeroSetting->{$field}) }}</textarea>
                            @else
                                <div class="input-icon-wrap">
                                    <i class="fas fa-pen icon"></i>
                                    <input type="text" name="{{ $field }}" id="{{ $field }}" value="{{ old($field, $homeHeroSetting->{$field}) }}" class="field-input {{ $errors->has($field) ? 'error' : '' }}">
                                </div>
                            @endif
                            @if($errors->has($field))
                                <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $errors->first($field) }}</p>
                            @elseif(str_contains($field, 'label'))
                                <p class="field-hint"><i class="fas fa-info-circle"></i>Line break ke liye &lt;br&gt; use kar sakte hain.</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon"><i class="fas fa-toggle-on"></i></div>
                <div>
                    <p class="form-card-title">Publish</p>
                    <p class="form-card-subtitle">Hero section visibility</p>
                </div>
            </div>
            <div class="form-card-body">
                <div class="checkbox-grid">
                    <label class="role-checkbox-item {{ old('status', $homeHeroSetting->status) ? 'checked' : '' }}">
                        <input type="checkbox" name="status" value="1" class="role-checkbox" {{ old('status', $homeHeroSetting->status) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Show hero section</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions mt-4">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i>
            Save Home Hero
        </button>
    </div>
</form>

@endsection
