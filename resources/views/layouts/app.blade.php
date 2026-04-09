<!DOCTYPE html>
<html lang="de" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $metaTitle ?? ($title ?? 'B&U BundU') }} | B&U BundU</title>
    <meta name="description" content="{{ $metaDescription ?? 'Systemische Beratung, Neue Autorität und Coaching – individuell, empathisch und lösungsorientiert.' }}">

    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:title" content="{{ $metaTitle ?? ($title ?? 'B&U BundU') }}">
    <meta property="og:description" content="{{ $metaDescription ?? '' }}">
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    @if(isset($ogImage))
        <meta property="og:image" content="{{ $ogImage }}">
    @endif

    {{-- Google Fonts: Bricolage Grotesque + Instrument Sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@700&family=Instrument+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    {{-- Google Analytics 4 (nur nach Cookie-Consent) --}}
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        function loadGA4() {
            if (document.querySelector('script[src*="googletagmanager"]')) return;
            var s = document.createElement('script');
            s.async = true;
            s.src = 'https://www.googletagmanager.com/gtag/js?id=G-G775R9XKMV';
            document.head.appendChild(s);
            gtag('js', new Date());
            gtag('config', 'G-G775R9XKMV');
        }
        if (localStorage.getItem('cookie_consent') === 'accepted') { loadGA4(); }
    </script>

    {{-- JSON-LD: Organization --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "ProfessionalService",
        "name": "B&U BundU – Walter Uehli",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('images/logo_2026K.png') }}",
        "description": "Systemische Beratung, Neue Autorität und Coaching – individuell, empathisch und lösungsorientiert.",
        "founder": {
            "@@type": "Person",
            "name": "Walter Uehli",
            "jobTitle": "Systemischer Berater & Coach"
        },
        "address": {
            "@@type": "PostalAddress",
            "addressLocality": "Chur",
            "addressRegion": "GR",
            "addressCountry": "CH"
        },
        "areaServed": {
            "@@type": "Country",
            "name": "Switzerland"
        },
        "sameAs": []
    }
    </script>

    {{-- JSON-LD: WebSite with SearchAction --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "WebSite",
        "name": "B&U BundU",
        "url": "{{ url('/') }}"
    }
    </script>

    @stack('jsonld')
    @stack('head')
</head>
<body class="font-body text-ink bg-white antialiased">

    {{-- Skip Navigation (WCAG 2.2 AA) --}}
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-50 focus:bg-navy focus:text-white focus:px-4 focus:py-2 focus:rounded">
        Zum Hauptinhalt springen
    </a>

    {{-- Navigation --}}
    <x-navigation />

    {{-- Hauptinhalt --}}
    <main id="main-content">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <x-footer />

    @livewireScripts
    @stack('scripts')

    {{-- Cookie Consent Banner --}}
    <div id="cookie-banner" class="fixed bottom-0 inset-x-0 z-50 transform transition-transform duration-300" style="display:none">
        <div class="max-w-4xl mx-auto px-4 pb-4">
            <div class="bg-navy text-white rounded-xl p-6 shadow-2xl flex flex-col sm:flex-row items-start sm:items-center gap-4">
                <div class="flex-1 text-sm leading-relaxed">
                    Diese Website verwendet Cookies zur Analyse der Nutzung (Google Analytics).
                    <a href="/datenschutz" class="underline hover:text-teal transition-colors">Mehr erfahren</a>
                </div>
                <div class="flex gap-3 shrink-0">
                    <button onclick="cookieConsent('declined')" class="px-4 py-2 text-sm border border-white/30 rounded-lg hover:bg-white/10 transition-colors">Ablehnen</button>
                    <button onclick="cookieConsent('accepted')" class="px-4 py-2 text-sm bg-teal rounded-lg hover:bg-teal/90 transition-colors font-medium">Akzeptieren</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function cookieConsent(choice) {
            localStorage.setItem('cookie_consent', choice);
            document.getElementById('cookie-banner').style.display = 'none';
            if (choice === 'accepted') { loadGA4(); }
        }
        if (!localStorage.getItem('cookie_consent')) {
            document.getElementById('cookie-banner').style.display = 'block';
        }
    </script>
</body>
</html>
