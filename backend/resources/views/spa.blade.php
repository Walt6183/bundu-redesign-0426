<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- SEO Meta Tags -->
    <title>B&U BundU - Beratung und Unterstützung | Systemische Online-Familienberatung</title>
    <meta name="description" content="B&U BundU bietet systemische Online-Beratung, Supervision und Kurse zu Neuer Autorität. Starke Eltern - starke Kinder: Erziehung mit Haltung statt Härte." />
    <meta name="keywords" content="Familienberatung Online, Neue Autorität, systemische Beratung, Erziehungsberatung, Supervision, Bremgarten, Elternkurse, BundU" />
    <meta name="author" content="B&U BundU - Beratung und Unterstützung" />
    <meta name="robots" content="index, follow" />
    <meta name="language" content="de" />
    <meta name="revisit-after" content="7 days" />

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="B&U BundU - Beratung und Unterstützung | Systemische Familienberatung" />
    <meta property="og:description" content="Systemische Beratung und Neue Autorität für Familien, Schulen und Institutionen. Erziehung mit Haltung statt Härte - Online." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://bundu.ch" />
    <meta property="og:image" content="https://bundu.ch/og-image.jpg" />
    <meta property="og:site_name" content="B&U BundU" />
    <meta property="og:locale" content="de_CH" />

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="B&U BundU - Beratung und Unterstützung" />
    <meta name="twitter:description" content="Systemische Beratung und Neue Autorität für Familien, Schulen und Institutionen." />
    <meta name="twitter:image" content="https://bundu.ch/twitter-image.jpg" />

    <!-- Canonical Link -->
    <link rel="canonical" href="https://bundu.ch" />

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />
    <link rel="manifest" href="/site.webmanifest" />

    <!-- Theme and Mobile Meta Tags -->
    <meta name="theme-color" content="#002C63" />
    <meta name="msapplication-TileColor" content="#002C63" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

    <!-- Preconnect for Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "B&U BundU - Beratung und Unterstützung",
      "alternateName": "BundU",
      "url": "https://bundu.ch",
      "logo": "https://bundu.ch/logo.png",
      "description": "Systemische Online-Beratung, Supervision und Kurse zu Neuer Autorität für Familien, Schulen und Institutionen.",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Klosterstrasse 5",
        "addressLocality": "Bremgarten",
        "postalCode": "5626",
        "addressCountry": "CH"
      },
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+41-55-505-62-03",
        "contactType": "customer service",
        "availableLanguage": ["German"]
      },
      "sameAs": [
        "https://www.linkedin.com/company/bundu-ch"
      ]
    }
    </script>

    {{-- Vite SPA Assets --}}
    @php
        $manifest = json_decode(file_get_contents(public_path('build/.vite/manifest.json')), true);
        $entry = $manifest['index.html'] ?? $manifest['src/main.jsx'] ?? null;
    @endphp

    @if($entry)
        @if(isset($entry['css']))
            @foreach($entry['css'] as $css)
                <link rel="stylesheet" href="/build/{{ $css }}" />
            @endforeach
        @endif
    @endif
</head>
<body>
    <div id="root"></div>

    @if($entry)
        <script type="module" src="/build/{{ $entry['file'] }}"></script>
    @endif
</body>
</html>
