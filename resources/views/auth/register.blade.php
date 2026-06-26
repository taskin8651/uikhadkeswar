@extends('layouts.app')

@section('page-title', trans('global.register') . ' | ' . trans('panel.site_title'))

@section('content')

<div class="auth-form-head">
    <span class="auth-form-kicker">
        <i class="bi bi-person-plus-fill"></i>
        Create Account
    </span>

    <h2>{{ trans('global.register') }}</h2>

    <p>
        Create your account to access Khadkeshwar Academy dashboard and management panel.
    </p>
</div>

<form method="POST" action="{{ route('register') }}">
    @csrf

    {{-- NAME --}}
    <div class="auth-field">
        <label class="auth-label" for="name">
            {{ trans('global.user_name') }}
        </label>

        <div class="auth-input-wrap">
            <i class="bi bi-person-fill"></i>

            <input type="text"
                   name="name"
                   id="name"
                   value="{{ old('name') }}"
                   required
                   autofocus
                   autocomplete="name"
                   placeholder="Enter full name"
                   class="auth-input {{ $errors->has('name') ? 'error' : '' }}">
        </div>

        @if($errors->has('name'))
            <p class="auth-error">
                <i class="bi bi-exclamation-circle-fill"></i>
                {{ $errors->first('name') }}
            </p>
        @endif
    </div>

    {{-- EMAIL --}}
    <div class="auth-field">
        <label class="auth-label" for="email">
            {{ trans('global.login_email') }}
        </label>

        <div class="auth-input-wrap">
            <i class="bi bi-envelope-fill"></i>

            <input type="email"
                   name="email"
                   id="email"
                   value="{{ old('email') }}"
                   required
                   autocomplete="email"
                   placeholder="Enter email address"
                   class="auth-input {{ $errors->has('email') ? 'error' : '' }}">
        </div>

        @if($errors->has('email'))
            <p class="auth-error">
                <i class="bi bi-exclamation-circle-fill"></i>
                {{ $errors->first('email') }}
            </p>
        @endif
    </div>

    {{-- PASSWORD --}}
    <div class="auth-field">
        <label class="auth-label" for="password">
            {{ trans('global.login_password') }}
        </label>

        <div class="auth-input-wrap">
            <i class="bi bi-key-fill"></i>

            <input type="password"
                   name="password"
                   id="password"
                   required
                   autocomplete="new-password"
                   placeholder="Create password"
                   class="auth-input {{ $errors->has('password') ? 'error' : '' }}">
        </div>

        @if($errors->has('password'))
            <p class="auth-error">
                <i class="bi bi-exclamation-circle-fill"></i>
                {{ $errors->first('password') }}
            </p>
        @endif
    </div>

    {{-- CONFIRM PASSWORD --}}
    <div class="auth-field">
        <label class="auth-label" for="password_confirmation">
            {{ trans('global.login_password_confirmation') }}
        </label>

        <div class="auth-input-wrap">
            <i class="bi bi-shield-lock-fill"></i>

            <input type="password"
                   name="password_confirmation"
                   id="password_confirmation"
                   required
                   autocomplete="new-password"
                   placeholder="Confirm password"
                   class="auth-input {{ $errors->has('password_confirmation') ? 'error' : '' }}">
        </div>

        @if($errors->has('password_confirmation'))
            <p class="auth-error">
                <i class="bi bi-exclamation-circle-fill"></i>
                {{ $errors->first('password_confirmation') }}
            </p>
        @endif
    </div>

    {{-- REGISTER BUTTON --}}
    <button type="submit" class="auth-submit">
        <i class="bi bi-person-check-fill"></i>
        {{ trans('global.register') }}
    </button>

    @if(Route::has('login'))
        <div class="auth-divider">
            <span>Already Registered</span>
        </div>

        <div class="auth-register">
            Already have an account?
            <a href="{{ route('login') }}">
                Login
            </a>
        </div>
    @endif

</form>

@endsection