@extends('layouts.admin')

@section('page-title', 'Website Settings')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.home') }}" class="admin-back-link">
            Back to Dashboard
        </a>

        <h2 class="admin-page-title">
            Website Settings
        </h2>

        <p class="admin-page-subtitle">
            Manage logo, favicon, SEO, contact details, social links and footer information
        </p>
    </div>
</div>

@if(session('message'))
    <div class="alert alert-success mb-3">
        {{ session('message') }}
    </div>
@endif

@php
    $mediaFields = [
        'logo' => ['label' => 'Header Logo', 'hint' => 'Recommended: transparent PNG, WEBP or SVG'],
        'footer_logo' => ['label' => 'Footer Logo', 'hint' => 'Optional footer-specific logo'],
        'favicon' => ['label' => 'Favicon', 'hint' => 'Recommended: 32x32 or 64x64 PNG/ICO'],
        'apple_touch_icon' => ['label' => 'Apple Touch Icon', 'hint' => 'Recommended: 180x180 PNG'],
        'og_image' => ['label' => 'Open Graph Image', 'hint' => 'Recommended: 1200x630 image'],
        'twitter_image' => ['label' => 'Twitter/X Image', 'hint' => 'Recommended: 1200x630 image'],
    ];
@endphp

<form method="POST"
      action="{{ route('admin.website-settings.update') }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-paint-brush"></i>
                </div>
                <div>
                    <p class="form-card-title">Branding</p>
                    <p class="form-card-subtitle">Website name, tagline and logo media</p>
                </div>
            </div>

            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="site_name">Site Name <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-building icon"></i>
                        <input type="text" name="site_name" id="site_name" required
                               value="{{ old('site_name', $websiteSetting->site_name) }}"
                               class="field-input {{ $errors->has('site_name') ? 'error' : '' }}">
                    </div>
                    @error('site_name') <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p> @enderror
                </div>

                <div class="field-group">
                    <label class="field-label" for="site_tagline">Site Tagline</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-quote-right icon"></i>
                        <input type="text" name="site_tagline" id="site_tagline"
                               value="{{ old('site_tagline', $websiteSetting->site_tagline) }}"
                               class="field-input {{ $errors->has('site_tagline') ? 'error' : '' }}">
                    </div>
                    @error('site_tagline') <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p> @enderror
                </div>

                <div class="field-group">
                    <label class="field-label" for="logo_alt">Logo Alt Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text" name="logo_alt" id="logo_alt"
                               value="{{ old('logo_alt', $websiteSetting->logo_alt) }}"
                               class="field-input {{ $errors->has('logo_alt') ? 'error' : '' }}">
                    </div>
                    @error('logo_alt') <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p> @enderror
                </div>

                @foreach($mediaFields as $field => $media)
                    <div class="field-group">
                        <label class="field-label" for="{{ $field }}">{{ $media['label'] }}</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-image icon"></i>
                            <input type="file" name="{{ $field }}" id="{{ $field }}" accept="image/*"
                                   class="field-input {{ $errors->has($field) ? 'error' : '' }}">
                        </div>
                        @error($field)
                            <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>
                        @else
                            <p class="field-hint"><i class="fas fa-info-circle"></i>{{ $media['hint'] }}</p>
                        @enderror

                        @if($websiteSetting->getFirstMediaUrl($field))
                            <div style="margin-top:12px;">
                                <img src="{{ $websiteSetting->getFirstMediaUrl($field) }}"
                                     alt="{{ $media['label'] }}"
                                     style="max-width:180px;width:auto;height:84px;object-fit:contain;border:1px solid #e5e7eb;border-radius:12px;background:#fff;padding:8px;">
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-search"></i>
                </div>
                <div>
                    <p class="form-card-title">SEO</p>
                    <p class="form-card-subtitle">Default meta tags and social preview text</p>
                </div>
            </div>

            <div class="form-card-body">
                @foreach([
                    'meta_title' => 'Meta Title',
                    'canonical_url' => 'Canonical URL',
                    'robots' => 'Robots',
                    'og_title' => 'Open Graph Title',
                    'twitter_title' => 'Twitter/X Title',
                    'twitter_card' => 'Twitter Card',
                ] as $field => $label)
                    <div class="field-group">
                        <label class="field-label" for="{{ $field }}">{{ $label }}</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-heading icon"></i>
                            <input type="text" name="{{ $field }}" id="{{ $field }}"
                                   value="{{ old($field, $websiteSetting->{$field}) }}"
                                   class="field-input {{ $errors->has($field) ? 'error' : '' }}">
                        </div>
                        @error($field) <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p> @enderror
                    </div>
                @endforeach

                @foreach([
                    'meta_description' => 'Meta Description',
                    'meta_keywords' => 'Meta Keywords',
                    'og_description' => 'Open Graph Description',
                    'twitter_description' => 'Twitter/X Description',
                ] as $field => $label)
                    <div class="field-group">
                        <label class="field-label" for="{{ $field }}">{{ $label }}</label>
                        <textarea name="{{ $field }}" id="{{ $field }}" rows="3"
                                  class="field-input {{ $errors->has($field) ? 'error' : '' }}">{{ old($field, $websiteSetting->{$field}) }}</textarea>
                        @error($field) <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p> @enderror
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-address-book"></i>
                </div>
                <div>
                    <p class="form-card-title">Contact Details</p>
                    <p class="form-card-subtitle">Phone, email, address and map information</p>
                </div>
            </div>

            <div class="form-card-body">
                @foreach([
                    'phone_primary' => 'Primary Phone',
                    'phone_secondary' => 'Secondary Phone',
                    'whatsapp_number' => 'WhatsApp Number',
                    'email_primary' => 'Primary Email',
                    'email_secondary' => 'Secondary Email',
                    'google_map_link' => 'Google Map Link',
                    'working_hours' => 'Working Hours',
                ] as $field => $label)
                    <div class="field-group">
                        <label class="field-label" for="{{ $field }}">{{ $label }}</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-phone icon"></i>
                            <input type="text" name="{{ $field }}" id="{{ $field }}"
                                   value="{{ old($field, $websiteSetting->{$field}) }}"
                                   class="field-input {{ $errors->has($field) ? 'error' : '' }}">
                        </div>
                        @error($field) <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p> @enderror
                    </div>
                @endforeach

                <div class="field-group">
                    <label class="field-label" for="address">Address</label>
                    <textarea name="address" id="address" rows="3"
                              class="field-input {{ $errors->has('address') ? 'error' : '' }}">{{ old('address', $websiteSetting->address) }}</textarea>
                    @error('address') <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p> @enderror
                </div>

                <div class="field-group">
                    <label class="field-label" for="map_embed_url">Map Embed URL / Iframe Src</label>
                    <textarea name="map_embed_url" id="map_embed_url" rows="3"
                              class="field-input {{ $errors->has('map_embed_url') ? 'error' : '' }}">{{ old('map_embed_url', $websiteSetting->map_embed_url) }}</textarea>
                    @error('map_embed_url') <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-share-alt"></i>
                </div>
                <div>
                    <p class="form-card-title">Social Links</p>
                    <p class="form-card-subtitle">Footer and top bar social URLs</p>
                </div>
            </div>

            <div class="form-card-body">
                @foreach([
                    'facebook_url' => 'Facebook URL',
                    'instagram_url' => 'Instagram URL',
                    'youtube_url' => 'YouTube URL',
                    'linkedin_url' => 'LinkedIn URL',
                    'x_url' => 'X URL',
                    'telegram_url' => 'Telegram URL',
                ] as $field => $label)
                    <div class="field-group">
                        <label class="field-label" for="{{ $field }}">{{ $label }}</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-link icon"></i>
                            <input type="url" name="{{ $field }}" id="{{ $field }}"
                                   value="{{ old($field, $websiteSetting->{$field}) }}"
                                   class="field-input {{ $errors->has($field) ? 'error' : '' }}">
                        </div>
                        @error($field) <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p> @enderror
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div>
                    <p class="form-card-title">Footer, Legal & Tracking</p>
                    <p class="form-card-subtitle">Business details, footer copy and analytics IDs</p>
                </div>
            </div>

            <div class="form-card-body">
                @foreach([
                    'company_name' => 'Company Name',
                    'gstin' => 'GSTIN',
                    'cin' => 'CIN',
                    'pan' => 'PAN',
                    'tan' => 'TAN',
                    'admission_badge_text' => 'Admission Badge Text',
                    'google_analytics_id' => 'Google Analytics ID',
                    'google_tag_manager_id' => 'Google Tag Manager ID',
                    'facebook_pixel_id' => 'Facebook Pixel ID',
                ] as $field => $label)
                    <div class="field-group">
                        <label class="field-label" for="{{ $field }}">{{ $label }}</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-edit icon"></i>
                            <input type="text" name="{{ $field }}" id="{{ $field }}"
                                   value="{{ old($field, $websiteSetting->{$field}) }}"
                                   class="field-input {{ $errors->has($field) ? 'error' : '' }}">
                        </div>
                        @error($field) <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p> @enderror
                    </div>
                @endforeach

                <div class="field-group">
                    <label class="field-label" for="footer_description">Footer Description</label>
                    <textarea name="footer_description" id="footer_description" rows="4"
                              class="field-input {{ $errors->has('footer_description') ? 'error' : '' }}">{{ old('footer_description', $websiteSetting->footer_description) }}</textarea>
                    @error('footer_description') <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p> @enderror
                </div>

                <div class="field-group">
                    <label class="field-label" for="copyright_text">Copyright Text</label>
                    <textarea name="copyright_text" id="copyright_text" rows="2"
                              class="field-input {{ $errors->has('copyright_text') ? 'error' : '' }}">{{ old('copyright_text', $websiteSetting->copyright_text) }}</textarea>
                    @error('copyright_text') <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p> @enderror
                </div>

                <div class="field-group">
                    <label class="field-label" for="status">Status</label>
                    <label style="display:flex;align-items:center;gap:10px;">
                        <input type="checkbox" name="status" id="status" value="1"
                               {{ old('status', $websiteSetting->status) ? 'checked' : '' }}>
                        Active
                    </label>
                    @error('status') <p class="field-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

    </div>

    <div class="form-actions mt-4">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i>
            Save Website Settings
        </button>
    </div>
</form>

@endsection
