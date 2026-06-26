@php
    $settingDefaults = \App\Models\WebsiteSetting::defaults();
    try {
        $settings = $websiteSetting ?? \App\Models\WebsiteSetting::current();
    } catch (\Throwable $exception) {
        $settings = null;
    }

    $siteName = $settings?->site_name ?? $settingDefaults['site_name'];
    $siteTagline = $settings?->site_tagline ?? $settingDefaults['site_tagline'];

    $logoAlt = $settings?->logo_alt ?? $siteName . ' Logo';

    $authLogo = $settings?->mediaUrl('logo', asset('assets/img/imageedit_1_8311115967.png'))
        ?? asset('assets/img/imageedit_1_8311115967.png');

    $favicon = $settings?->mediaUrl('favicon');

    $metaTitle = $settings?->meta_title ?? $siteName . ' | Login';
@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title', $metaTitle)</title>

    @if($favicon)
        <link rel="icon" href="{{ $favicon }}">
    @endif

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Optional Theme CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        :root {
            --auth-primary-dark: #000B26;
            --auth-primary-blue: #071B4D;
            --auth-accent-red: #D40D1F;
            --auth-accent-red-dark: #A60816;
            --auth-white: #ffffff;
            --auth-muted: rgba(255, 255, 255, .68);
            --auth-soft: rgba(255, 255, 255, .08);
            --auth-border: rgba(255, 255, 255, .14);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Manrope", sans-serif;
            background:
                radial-gradient(circle at 8% 10%, rgba(212, 13, 31, .26), transparent 26%),
                radial-gradient(circle at 94% 14%, rgba(255, 255, 255, .12), transparent 26%),
                radial-gradient(circle at 78% 92%, rgba(45, 103, 225, .16), transparent 28%),
                linear-gradient(135deg, var(--auth-primary-dark), var(--auth-primary-blue));
            color: var(--auth-white);
            overflow-x: hidden;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            background-image:
                linear-gradient(rgba(255, 255, 255, .035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, .035) 1px, transparent 1px);
            background-size: 42px 42px;
            opacity: .55;
        }

        .auth-page {
            position: relative;
            z-index: 2;
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 34px 18px;
        }

        .auth-shell {
            width: min(100%, 1060px);
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            overflow: hidden;
            border-radius: 34px;
            background:
                radial-gradient(circle at 8% 10%, rgba(212, 13, 31, .14), transparent 30%),
                linear-gradient(145deg, rgba(255, 255, 255, .105), rgba(255, 255, 255, .045));
            border: 1px solid rgba(255, 255, 255, .16);
            box-shadow:
                0 34px 100px rgba(0, 0, 0, .34),
                inset 0 1px 0 rgba(255, 255, 255, .08);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        .auth-brand-panel {
            position: relative;
            min-height: 650px;
            padding: 42px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background:
                radial-gradient(circle at 16% 16%, rgba(212, 13, 31, .25), transparent 30%),
                linear-gradient(150deg, rgba(0, 11, 38, .88), rgba(7, 27, 77, .62));
            overflow: hidden;
        }

        .auth-brand-panel::before {
            content: "";
            position: absolute;
            width: 360px;
            height: 360px;
            right: -170px;
            bottom: -160px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, .08);
            background: rgba(255, 255, 255, .035);
        }

        .auth-brand-top {
            position: relative;
            z-index: 2;
        }

        .auth-logo-wrap {
            width: 122px;
            height: 92px;
            display: grid;
            place-items: center;
            margin-bottom: 28px;
            border-radius: 24px;
            background: rgba(255, 255, 255, .96);
            border: 1px solid rgba(255, 255, 255, .18);
            box-shadow: 0 20px 52px rgba(0, 0, 0, .22);
        }

        .auth-logo-wrap img {
            width: 108px;
            height: 78px;
            object-fit: contain;
            display: block;
        }

        .auth-badge {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            min-height: 40px;
            padding: 10px 15px;
            border-radius: 999px;
            color: #ffffff;
            background: rgba(212, 13, 31, .20);
            border: 1px solid rgba(212, 13, 31, .42);
            font-size: 12px;
            line-height: 1;
            font-weight: 900;
            margin-bottom: 20px;
        }

        .auth-brand-panel h1 {
            max-width: 480px;
            margin: 0 0 16px;
            color: #ffffff;
            font-size: clamp(34px, 4vw, 54px);
            line-height: 1.02;
            letter-spacing: -2.2px;
            font-weight: 950;
        }

        .auth-brand-panel h1 span {
            display: block;
            color: #ff3d55;
        }

        .auth-brand-panel p {
            max-width: 470px;
            margin: 0;
            color: rgba(255, 255, 255, .72);
            font-size: 15px;
            line-height: 1.75;
            font-weight: 600;
        }

        .auth-feature-list {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
            margin-top: 34px;
        }

        .auth-feature {
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: 72px;
            padding: 13px;
            border-radius: 18px;
            background: rgba(255, 255, 255, .075);
            border: 1px solid rgba(255, 255, 255, .12);
        }

        .auth-feature i {
            width: 42px;
            height: 42px;
            min-width: 42px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            color: #ffffff;
            background: linear-gradient(135deg, var(--auth-accent-red), var(--auth-accent-red-dark));
            font-size: 17px;
        }

        .auth-feature strong {
            display: block;
            color: #ffffff;
            font-size: 12px;
            line-height: 1.3;
            font-weight: 900;
        }

        .auth-feature small {
            display: block;
            margin-top: 3px;
            color: rgba(255, 255, 255, .58);
            font-size: 10px;
            line-height: 1.25;
            font-weight: 650;
        }

        .auth-brand-bottom {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255, 255, 255, .72);
            font-size: 12px;
            font-weight: 700;
        }

        .auth-brand-bottom i {
            color: #ff3d55;
            font-size: 18px;
        }

        .auth-form-panel {
            position: relative;
            padding: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, .96);
            color: #071B4D;
        }

        .auth-form-card {
            width: 100%;
            max-width: 430px;
        }

        .auth-form-head {
            margin-bottom: 28px;
        }

        .auth-form-kicker {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            min-height: 36px;
            padding: 9px 13px;
            border-radius: 999px;
            color: var(--auth-accent-red);
            background: rgba(212, 13, 31, .08);
            font-size: 11px;
            line-height: 1;
            font-weight: 950;
            margin-bottom: 14px;
        }

        .auth-form-head h2 {
            margin: 0 0 8px;
            color: #071B4D;
            font-size: 31px;
            line-height: 1.1;
            font-weight: 950;
            letter-spacing: -.8px;
        }

        .auth-form-head p {
            margin: 0;
            color: rgba(7, 27, 77, .58);
            font-size: 13px;
            line-height: 1.6;
            font-weight: 650;
        }

        .auth-alert {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 12px 14px;
            margin-bottom: 18px;
            border-radius: 16px;
            color: #075985;
            background: #E0F2FE;
            border: 1px solid #BAE6FD;
            font-size: 13px;
            font-weight: 700;
        }

        .auth-field {
            margin-bottom: 17px;
        }

        .auth-label {
            display: block;
            margin-bottom: 7px;
            color: #071B4D;
            font-size: 13px;
            line-height: 1;
            font-weight: 900;
        }

        .auth-input-wrap {
            position: relative;
        }

        .auth-input-wrap > i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(7, 27, 77, .48);
            font-size: 16px;
            pointer-events: none;
        }

        .auth-input {
            width: 100%;
            min-height: 54px;
            padding: 14px 16px 14px 46px;
            border-radius: 17px;
            border: 1.5px solid rgba(7, 27, 77, .12);
            outline: none;
            color: #071B4D;
            background: #F8F9FC;
            font-size: 14px;
            font-weight: 700;
            transition: .25s ease;
        }

        .auth-input:focus {
            border-color: rgba(212, 13, 31, .55);
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(212, 13, 31, .09);
        }

        .auth-input.error {
            border-color: #dc2626;
            background: #fff7f7;
        }

        .auth-error {
            display: flex;
            align-items: center;
            gap: 7px;
            margin: 7px 0 0;
            color: #dc2626;
            font-size: 12px;
            font-weight: 750;
        }

        .auth-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin: 8px 0 22px;
        }

        .auth-check {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: rgba(7, 27, 77, .68);
            font-size: 13px;
            font-weight: 750;
        }

        .auth-check input {
            width: 16px;
            height: 16px;
            accent-color: var(--auth-accent-red);
        }

        .auth-link {
            color: var(--auth-accent-red);
            font-size: 13px;
            font-weight: 900;
            text-decoration: none;
        }

        .auth-link:hover {
            color: var(--auth-accent-red-dark);
            text-decoration: underline;
        }

        .auth-submit {
            width: 100%;
            min-height: 55px;
            border: 0;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            color: #ffffff;
            background: linear-gradient(135deg, var(--auth-accent-red), var(--auth-accent-red-dark));
            box-shadow: 0 18px 42px rgba(212, 13, 31, .30);
            font-size: 14px;
            line-height: 1;
            font-weight: 950;
            cursor: pointer;
            transition: .25s ease;
        }

        .auth-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 24px 52px rgba(212, 13, 31, .38);
        }

        .auth-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 24px 0 18px;
            color: rgba(7, 27, 77, .45);
            font-size: 11px;
            font-weight: 850;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .auth-divider::before,
        .auth-divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: rgba(7, 27, 77, .10);
        }

        .auth-register {
            text-align: center;
            color: rgba(7, 27, 77, .62);
            font-size: 13px;
            font-weight: 700;
        }

        .auth-register a {
            color: var(--auth-accent-red);
            font-weight: 950;
            text-decoration: none;
        }

        .auth-register a:hover {
            text-decoration: underline;
        }

        @media (max-width: 991px) {
            .auth-shell {
                grid-template-columns: 1fr;
                max-width: 620px;
            }

            .auth-brand-panel {
                min-height: auto;
                padding: 34px;
                text-align: center;
                align-items: center;
            }

            .auth-logo-wrap {
                margin-left: auto;
                margin-right: auto;
            }

            .auth-feature-list {
                width: 100%;
            }

            .auth-brand-bottom {
                margin-top: 28px;
            }

            .auth-form-panel {
                padding: 38px 28px;
            }
        }

        @media (max-width: 575px) {
            .auth-page {
                padding: 16px 10px;
            }

            .auth-shell {
                border-radius: 24px;
            }

            .auth-brand-panel {
                padding: 26px 18px;
            }

            .auth-logo-wrap {
                width: 106px;
                height: 80px;
                border-radius: 20px;
                margin-bottom: 22px;
            }

            .auth-logo-wrap img {
                width: 94px;
                height: 66px;
            }

            .auth-brand-panel h1 {
                font-size: 30px;
                letter-spacing: -1.2px;
            }

            .auth-brand-panel p {
                font-size: 13px;
            }

            .auth-feature-list {
                grid-template-columns: 1fr;
                gap: 9px;
            }

            .auth-feature {
                min-height: 64px;
            }

            .auth-form-panel {
                padding: 28px 16px;
            }

            .auth-form-head h2 {
                font-size: 26px;
            }

            .auth-row {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>

    @yield('styles')
</head>

<body>

    <main class="auth-page">
        <div class="auth-shell">

            <aside class="auth-brand-panel">
                <div class="auth-brand-top">
                    <a href="{{ url('/') }}" class="auth-logo-wrap" aria-label="{{ $siteName }}">
                        <img src="{{ $authLogo }}" alt="{{ $logoAlt }}">
                    </a>

                    <span class="auth-badge">
                        <i class="bi bi-stars"></i>
                        {{ $siteTagline }}
                    </span>

                    <h1>
                        Welcome to
                        <span>{{ $siteName }}</span>
                    </h1>

                    <p>
                        Manage admissions, inquiries, content, faculty, gallery and website settings from a secure premium dashboard.
                    </p>

                    <div class="auth-feature-list">
                        <div class="auth-feature">
                            <i class="bi bi-shield-lock-fill"></i>
                            <div>
                                <strong>Secure Admin Access</strong>
                                <small>Protected login panel</small>
                            </div>
                        </div>

                        <div class="auth-feature">
                            <i class="bi bi-mortarboard-fill"></i>
                            <div>
                                <strong>Academy Management</strong>
                                <small>NEET / JEE CMS control</small>
                            </div>
                        </div>

                        <div class="auth-feature">
                            <i class="bi bi-graph-up-arrow"></i>
                            <div>
                                <strong>Lead Tracking</strong>
                                <small>Admission inquiry records</small>
                            </div>
                        </div>

                        <div class="auth-feature">
                            <i class="bi bi-cpu-fill"></i>
                            <div>
                                <strong>Future AI Vision</strong>
                                <small>Smart education platform</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="auth-brand-bottom">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Lonar, Buldhana, Maharashtra</span>
                </div>
            </aside>

            <section class="auth-form-panel">
                <div class="auth-form-card">
                    @yield('content')
                </div>
            </section>

        </div>
    </main>

    @yield('scripts')
</body>

</html>
