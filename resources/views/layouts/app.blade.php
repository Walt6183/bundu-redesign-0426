<!DOCTYPE html>
<html lang="de" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $metaTitle ?? ($title ?? 'B&U BundU') }} | B&U BundU</title>
    <meta name="description" content="{{ $metaDescription ?? 'Systemische Beratung, Neue Autorität und Coaching – individuell, empathisch und lösungsorientiert.' }}">

    @if(isset($canonical))
        <link rel="canonical" href="{{ $canonical }}">
    @endif

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
</body>
</html>
