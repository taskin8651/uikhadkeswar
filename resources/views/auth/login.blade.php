@extends('layouts.app')

@section('page-title', trans('global.login') . ' | ' . trans('panel.site_title'))

@section('content')

<div class="auth-form-head">
    <span class="auth-form-kicker">
        <i class="bi bi-lock-fill"></i>
        Secure Login
    </span>

    <h2>{{ trans('global.login') }}</h2>

    <p>
        Enter your registered email and password to access the admin dashboard.
    </p>
</div>

@if(session('message'))
    <div class="auth-alert">
        <i class="bi bi-info-circle-fill"></i>
        <span>{{ session('message') }}</span>
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

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
                   autofocus
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
                   autocomplete="current-password"
                   placeholder="Enter password"
                   class="auth-input {{ $errors->has('password') ? 'error' : '' }}">
        </div>

        @if($errors->has('password'))
            <p class="auth-error">
                <i class="bi bi-exclamation-circle-fill"></i>
                {{ $errors->first('password') }}
            </p>
        @endif
    </div>

    {{-- REMEMBER + FORGOT --}}
    <div class="auth-row">
        <label class="auth-check">
            <input type="checkbox" name="remember">
            <span>{{ trans('global.remember_me') }}</span>
        </label>

        @if(Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="auth-link">
                {{ trans('global.forgot_password') }}
            </a>
        @endif
    </div>

    {{-- LOGIN BUTTON --}}
    <button type="submit" class="auth-submit">
        <i class="bi bi-box-arrow-in-right"></i>
        {{ trans('global.login') }}
    </button>

    @if(Route::has('register'))
        <div class="auth-divider">
            <span>New User</span>
        </div>

        <div class="auth-register">
            Don’t have an account?
            <a href="{{ route('register') }}">
                {{ trans('global.register') }}
            </a>
        </div>
    @endif
</form>

@endsection