@extends('layouts.admin')

@section('page-title', 'Add Founder Timeline')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.founder-timelines.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">
            Add Founder Timeline
        </h2>

        <p class="admin-page-subtitle">
            Add a new journey timeline item for the About Us page
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.founder-timelines.store') }}">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-clock"></i>
                </div>

                <div>
                    <p class="form-card-title">Timeline Information</p>
                    <p class="form-card-subtitle">Year and roadmap title shown on frontend</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="year">
                        Year <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-calendar-alt icon"></i>

                        <input type="text"
                               name="year"
                               id="year"
                               value="{{ old('year') }}"
                               required
                               placeholder="2026"
                               class="field-input {{ $errors->has('year') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('year'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('year') }}
                        </p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-info-circle"></i>
                            Example: 2022, 2023, 2026 or 2030
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">
                        Title <span class="req">*</span>
                    </label>

                    <textarea name="title"
                              id="title"
                              rows="5"
                              required
                              placeholder="AI learning dashboard, smart test analysis and student progress roadmap planned."
                              class="field-input {{ $errors->has('title') ? 'error' : '' }}">{{ old('title') }}</textarea>

                    @if($errors->has('title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('title') }}
                        </p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-align-left"></i>
                            This text will appear under the timeline year.
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

                        <span class="checkbox-text">Publish this timeline item</span>
                    </label>
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Card icon, badge and heading will remain static on frontend.
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

        <a href="{{ route('admin.founder-timelines.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@endsection