@props([
    'metaTitle' => null,
    'metaDescription' => null,
    'canonical' => null,
    'ogType' => 'website',
    'ogImage' => null,
])

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

    {{-- PrivacyBee Widget --}}
    @php $pbWidgetId = \App\Models\Global_::where('key', 'site')->first()?->content['externalLinks']['privacyBeeWidgetId'] ?? null; @endphp
    @if($pbWidgetId)
    <script src="https://app.privacybee.io/imprint-widget.js"></script>
    <script src="https://app.privacybee.io/widget.js" defer></script>
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    {{-- JSON-LD: Organization --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "ProfessionalService",
        "name": "B&U BundU – Walter Uehli",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('images/bundu-logo.svg') }}",
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

    {{-- GA4 – nur mit Cookie-Consent --}}
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        function loadGA4() {
            var s = document.createElement('script');
            s.src = 'https://www.googletagmanager.com/gtag/js?id=G-G775R9XKMV';
            s.async = true;
            document.head.appendChild(s);
            gtag('js', new Date());
            gtag('config', 'G-G775R9XKMV');
        }
        if (localStorage.getItem('cookie_consent') === 'accepted') { loadGA4(); }
    </script>
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

    {{-- Cookie Consent Banner (Alpine.js für Livewire SPA-Kompatibilität) --}}
    <div x-data="{
            show: !localStorage.getItem('cookie_consent'),
            accept() {
                localStorage.setItem('cookie_consent', 'accepted');
                this.show = false;
                if (typeof loadGA4 === 'function') loadGA4();
            },
            decline() {
                localStorage.setItem('cookie_consent', 'declined');
                this.show = false;
            }
         }"
         x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="translate-y-full"
         x-transition:enter-end="translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="translate-y-0"
         x-transition:leave-end="translate-y-full"
         class="fixed bottom-0 inset-x-0 z-50"
         style="display:none"
    >
        <div class="max-w-4xl mx-auto px-4 py-4">
            <div class="bg-navy text-white rounded-xl shadow-2xl p-6 flex flex-col sm:flex-row items-start sm:items-center gap-4">
                <div class="flex-1 text-sm leading-relaxed">
                    Wir verwenden Cookies und Google Analytics, um unsere Website zu verbessern.
                    Weitere Informationen finden Sie in unserer
                    <a href="/datenschutz" class="underline hover:text-teal">Datenschutzerklärung</a>.
                </div>
                <div class="flex gap-3 shrink-0">
                    <button @click="decline()"
                            class="px-4 py-2 text-sm border border-white/30 rounded-lg hover:bg-white/10 transition">
                        Ablehnen
                    </button>
                    <button @click="accept()"
                            class="px-4 py-2 text-sm bg-teal text-white rounded-lg hover:bg-teal/90 transition font-medium">
                        Akzeptieren
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
