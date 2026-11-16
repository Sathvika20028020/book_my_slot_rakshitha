
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Book My Slot')</title>

    <!-- Single font family used throughout the portal -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Azures PWA theme CSS -->
    <link rel="stylesheet" href="{{ asset('pwa/styles/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('pwa/styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('pwa/fonts/css/fontawesome-all.min.css') }}">

    <!-- PWA -->
    <link rel="manifest" href="{{ asset('pwa/_manifest.json') }}">
    <link rel="apple-touch-icon" href="{{ asset('pwa/app/icons/icon-192x192.png') }}">

    <style>
        :root {
            --bms-dark: #0A0F1D;
            --bms-dark-card: #141B2D;
            --bms-gold: #F59E0B;
            --bms-gold-hover: #D97706;
            --bms-primary: #4F46E5;
            --bms-muted: #64748B;
            --bms-border: #E2E8F0;
            --bms-bg: #FAFAFB;
        }

        /* ONE FONT FAMILY THROUGHOUT */
        /* ONE FONT FAMILY THROUGHOUT THE PORTAL */
html,
body,
input,
button,
select,
textarea {
    font-family: 'Plus Jakarta Sans', sans-serif !important;
}

/* Preserve Font Awesome icon font */
.fa,
.fas,
.far,
.fab,
.fa-solid,
.fa-regular,
.fa-brands {
    font-family: "Font Awesome 5 Free" !important;
}

.fas,
.fa-solid {
    font-weight: 900 !important;
}

.far,
.fa-regular {
    font-weight: 400 !important;
}

.fab,
.fa-brands {
    font-family: "Font Awesome 5 Brands" !important;
    font-weight: 400 !important;
}

        body {
            font-size: 14px;
        }

        a {
            text-decoration: none;
        }

        /* TOP HEADER */
        .bms-header {
            position: fixed !important;
            top: 0;
            left: 0;
            right: 0;
            height: 62px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 18px;
            background: var(--bms-dark) !important;
            border-bottom: 1px solid rgba(255,255,255,.08);
            box-shadow: 0 4px 16px rgba(10,15,29,.12);
            z-index: 9999;
        }

        .bms-header-brand {
            color: #FFFFFF !important;
            font-size: 17px;
            font-weight: 800;
            letter-spacing: -.4px;
        }

        .bms-header-action {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            color: var(--bms-gold) !important;
            font-size: 18px;
        }

        .bms-header-action:hover {
            background: rgba(245,158,11,.12);
        }

        /* PAGE */
        #page {
            min-height: 100vh;
            background: var(--bms-bg);
        }

        .page-content {
            padding-top: 76px !important;
            padding-bottom: 88px !important;
            min-height: 100vh;
        }

        .content {
            margin-left: 15px !important;
            margin-right: 15px !important;
        }

        /* WELCOME */
        .bms-welcome {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            background: linear-gradient(135deg, #0A0F1D, #141B2D);
            border-radius: 17px;
            padding: 20px 18px;
            margin: 8px 15px 24px;
        }

        .bms-welcome h2 {
            color: #FFFFFF;
            font-size: 19px;
            font-weight: 800;
            line-height: 1.4;
            margin: 0 0 5px;
        }

        .bms-welcome p {
            color: #94A3B8;
            font-size: 12px;
            line-height: 1.6;
            margin: 0;
        }

        .bms-welcome-icon {
            width: 45px;
            height: 45px;
            min-width: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            color: var(--bms-gold);
            background: rgba(245,158,11,.14);
            font-size: 20px;
        }

        /* SECTION HEADINGS */
        .bms-section-title {
            color: var(--bms-dark);
            font-size: 16px;
            font-weight: 800;
            margin-bottom: 14px;
        }

        /* SUMMARY CARDS */
        .bms-stat-card {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
            min-height: 94px;
            padding: 13px 11px;
            background: #FFFFFF;
            border: 1px solid var(--bms-border);
            border-radius: 15px;
            box-shadow: 0 5px 18px rgba(15,23,42,.035);
        }

        .bms-stat-icon {
            width: 36px;
            height: 36px;
            min-width: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: rgba(245,158,11,.13);
            color: var(--bms-gold-hover);
            font-size: 16px;
        }

        .bms-stat-info {
            min-width: 0;
            flex: 1;
        }

        .bms-stat-info h3 {
            color: var(--bms-dark);
            font-size: 22px;
            font-weight: 800;
            line-height: 1.2;
            margin: 0 0 3px;
        }

        .bms-stat-info p {
            color: var(--bms-muted);
            font-size: 11px;
            font-weight: 500;
            line-height: 1.4;
            margin: 0;
        }

        /* QUICK ACTIONS */
        .bms-action-card {
            padding: 2px 15px;
            background: #FFFFFF;
            border: 1px solid var(--bms-border);
            border-radius: 16px;
            box-shadow: 0 5px 18px rgba(15,23,42,.035);
        }

        .bms-action-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 0;
            border-bottom: 1px solid #F1F5F9;
        }

        .bms-action-item:last-child {
            border-bottom: 0;
        }

        .bms-action-icon {
            width: 39px;
            height: 39px;
            min-width: 39px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 11px;
            background: rgba(245,158,11,.13);
            color: var(--bms-gold-hover);
            font-size: 16px;
        }

        .bms-action-info {
            min-width: 0;
            flex: 1;
        }

        .bms-action-info h5 {
            color: var(--bms-dark);
            font-size: 12px;
            font-weight: 800;
            line-height: 1.4;
            margin: 0 0 4px;
        }

        .bms-action-info p {
            color: var(--bms-muted);
            font-size: 11px;
            line-height: 1.5;
            margin: 0;
        }

        .bms-action-arrow {
            color: var(--bms-gold-hover);
            font-size: 14px;
        }

        /* FOOTER */
        .bms-footer {
            margin: 24px 10px 8px;
            padding: 21px 12px;
            text-align: center;
            background: var(--bms-dark);
            border-radius: 16px 16px 0 0;
        }

        .bms-footer h5 {
            color: #FFFFFF;
            font-size: 14px;
            font-weight: 800;
            margin: 0 0 8px;
        }

        .bms-footer p {
            color: #94A3B8;
            font-size: 11px;
            line-height: 1.6;
            margin: 0 0 5px;
        }

        /* BOTTOM NAVIGATION */
        #footer-bar {
            position: fixed !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            width: 100% !important;
            height: 65px !important;
            display: flex;
            align-items: center;
            justify-content: space-around;
            background: #FFFFFF !important;
            border-top: 1px solid var(--bms-border);
            box-shadow: 0 -4px 16px rgba(10,15,29,.06);
            z-index: 9998 !important;
        }

        #footer-bar a {
            flex: 1;
            height: 100%;
            display: flex !important;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 4px;
            color: var(--bms-muted) !important;
            font-size: 10px !important;
            font-weight: 600;
        }

        #footer-bar a i {
            font-size: 17px;
        }

        #footer-bar a.active-nav,
        #footer-bar a.active-nav i {
            color: var(--bms-gold-hover) !important;
        }

        /* SIDEBAR */
        #menu-main {
            z-index: 10001 !important;
            background: #FFFFFF;
        }

        #menu-main .menu-title h1 {
            color: var(--bms-dark);
            font-size: 20px;
            font-weight: 800;
        }

        #menu-main .menu-title p {
            color: var(--bms-muted);
        }

        #menu-main .list-group a {
            color: var(--bms-dark);
            font-size: 13px;
            font-weight: 600;
        }

        #menu-main .list-group a i:first-child {
            color: var(--bms-gold-hover);
        }

        /* MOBILE WIDTH */
        @media (max-width: 380px) {
            .bms-welcome h2 {
                font-size: 17px;
            }

            .bms-stat-card {
                gap: 7px;
                padding: 11px 8px;
            }

            .bms-stat-icon {
                width: 32px;
                min-width: 32px;
                height: 32px;
                font-size: 14px;
            }

            .bms-stat-info h3 {
                font-size: 20px;
            }

            .bms-stat-info p {
                font-size: 10px;
            }
        }

        @supports (padding-bottom: env(safe-area-inset-bottom)) {
            #footer-bar {
                padding-bottom: env(safe-area-inset-bottom);
            }

            .page-content {
                padding-bottom: calc(68px + env(safe-area-inset-bottom)) !important;
            }
        }


/* =====================================
   BOOK MY SLOT - INCREASE FONT SIZES
===================================== */

/* Default text */
body {
    font-size: 15px !important;
    line-height: 1.6;
}

/* Header */
.bms-header-brand {
    font-size: 19px !important;
}

/* Welcome banner */
.bms-welcome h2 {
    font-size: 22px !important;
}

.bms-welcome p {
    font-size: 14px !important;
}

/* Section headings */
.bms-section-title {
    font-size: 19px !important;
    font-weight: 800 !important;
}

/* Overview cards */
.bms-stat-info h3 {
    font-size: 27px !important;
}

.bms-stat-info p {
    font-size: 13px !important;
    line-height: 1.5;
}

.bms-stat-icon {
    font-size: 19px !important;
}

/* Quick action items */
.bms-action-info h5 {
    font-size: 15px !important;
    line-height: 1.5;
}

.bms-action-info p {
    font-size: 13px !important;
    line-height: 1.6;
}

.bms-action-icon {
    font-size: 19px !important;
}

.bms-action-arrow {
    font-size: 17px !important;
}

/* Footer */
.bms-footer h5 {
    font-size: 16px !important;
}

.bms-footer p {
    font-size: 13px !important;
    line-height: 1.7;
}

/* Bottom navigation */
#footer-bar a {
    font-size: 12px !important;
    font-weight: 600 !important;
}

#footer-bar a i {
    font-size: 20px !important;
}

/* Sidebar */
#menu-main .menu-title h1 {
    font-size: 22px !important;
}

#menu-main .menu-title p {
    font-size: 14px !important;
}

#menu-main .list-group a {
    font-size: 15px !important;
}

/* Small mobile screens */
@media (max-width: 380px) {
    .bms-welcome h2 {
        font-size: 20px !important;
    }

    .bms-welcome p {
        font-size: 13px !important;
    }

    .bms-stat-info h3 {
        font-size: 24px !important;
    }

    .bms-stat-info p {
        font-size: 12px !important;
    }

    .bms-action-info h5 {
        font-size: 14px !important;
    }

    .bms-action-info p {
        font-size: 12px !important;
    }
}

    </style>

    @stack('styles')
</head>

<body class="theme-light" data-highlight="blue2">

    <div id="page">

        @include('includes.header')

        <div class="page-content">
            @yield('content')

            @include('includes.footer')
        </div>

        @include('includes.sidebar')

        @include('includes.bottom-nav')

    </div>

    <!-- Azures PWA JavaScript -->
    <script src="{{ asset('pwa/scripts/bootstrap.min.js') }}"></script>
    <script src="{{ asset('pwa/scripts/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')

</body>
</html>
