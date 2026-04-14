<?php
/**
 * Phase 3: Migrate 6 content pages to CMS Page records.
 * Pages: impressum, datenschutz, ueber-bundu, ueber-bundu/haltung-und-anspruch,
 *        ueber-bundu/walter-uehli, kontakt
 *
 * Upload to public/, then access:
 * https://bundu.ch/_phase3_deploy.php?key=BundU-Deploy-2026-X9k
 */

if (($_GET['key'] ?? '') !== 'BundU-Deploy-2026-X9k') {
    http_response_code(403);
    die('Forbidden');
}

header('Content-Type: text/plain; charset=utf-8');

// Bootstrap Laravel (same pattern as _kontakt_deploy.php)
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(Illuminate\Http\Request::capture());

use App\Models\Page;

// ── Shared bio text ──
$walterBio = '<p>Ich kenne die Arbeit mit Kindern, Jugendlichen und Familien von innen. Mehr als 25 Jahre habe ich in der stationären Kinder- und Jugendhilfe gearbeitet, zunächst als Pädagogischer Leiter, ab 2015 als Gesamtleiter eines Schulheims. Parallel dazu war ich als diplomierter Paar- und Familientherapeut ZAK tätig und habe Familien in belasteten Lebenssituationen begleitet. In dieser Zeit habe ich erlebt, wie viel von der Beziehungsqualität zwischen Erwachsenen und Kindern abhängt, und wie wenig davon mit Druck allein zu erreichen ist.</p>'
    . '<p>Heute begleite ich Familien, pädagogische Fachpersonen und Institutionen als systemischer Berater und Coach. Mein Ansatz, das BundU-Prinzip, integriert die Methoden der Neuen Autorität nach Haim Omer, lösungsfokussierte Gesprächsführung und systemisches Denken. In der Praxis bedeutet das: Ich arbeite nicht gegen Widerstand, sondern helfe, tragfähige Beziehungen wiederherzustellen, klare Haltungen zu entwickeln und Eskalationen zu unterbrechen, bevor sie sich festigen.</p>'
    . '<p>Als akkreditierter Berater des Bündner Standards begleite ich Institutionen in der Deutschschweiz und im deutschsprachigen Raum bei der Einführung dieses praxiserprobten Instruments. Der Bündner Standard umfasst zehn Kernelemente zur strukturierten Erfassung und professionellen Bearbeitung von Grenzverletzungen im organisierten Kontext und schafft damit eine verlässliche Grundlage für den Schutz aller Beteiligten.</p>'
    . '<p>Beratung und Coaching biete ich persönlich sowie über eine DSGVO-konforme Online-Plattform an, die eine ortsunabhängige Zusammenarbeit ermöglicht. Institutionen, die den Bündner Standard einführen oder ihr Schutzkonzept weiterentwickeln möchten, begleite ich im Rahmen von massgeschneiderten Projekten, von der Analyse bis zur nachhaltigen Verankerung im Alltag.</p>'
    . '<p>Das Wissen, das ich weitergebe, habe ich selbst angewendet, überprüft und angepasst.</p>';

$focusTags = [
    'Dipl. Sozialpädagoge FH',
    'Coach für Neue Autorität',
    'Berater Bündner Standard',
    'Dipl. Paar- und Familientherapeut ZAK',
    'SVEB I',
];

// ── Page definitions ──
$pages = [

    // 1. Impressum
    [
        'slug' => 'impressum',
        'title' => 'Impressum',
        'seo_title' => 'Impressum',
        'seo_description' => 'Impressum von B&U BundU – Walter Uehli, Klosterstrasse 5, CH-5626 Bremgarten.',
        'is_published' => true,
        'blocks' => [
            ['type' => 'hero', 'data' => ['title' => 'Impressum']],
            ['type' => 'impressum', 'data' => [
                'companyName' => 'B&U BundU',
                'address' => "Walter Uehli\nKlosterstrasse 5\nCH-5626 Bremgarten",
                'email' => 'info@bundu.ch',
                'phone' => '+41 (0)55 505 62 03',
                'representative' => 'Walter Uehli, Inhaber',
            ]],
        ],
    ],

    // 2. Datenschutz
    [
        'slug' => 'datenschutz',
        'title' => 'Datenschutzerklärung',
        'seo_title' => 'Datenschutz',
        'seo_description' => 'Datenschutzerklärung von B&U BundU – Informationen zum Umgang mit personenbezogenen Daten.',
        'is_published' => true,
        'blocks' => [
            ['type' => 'hero', 'data' => ['title' => 'Datenschutzerklärung']],
            ['type' => 'widget_embed', 'data' => ['widgetType' => 'privacybee']],
        ],
    ],

    // 3. Über BundU
    [
        'slug' => 'ueber-bundu',
        'title' => 'Über B&U',
        'seo_title' => 'Über B&U',
        'seo_description' => 'Walter Uehli – Dipl. Sozialpädagoge, Coach für Neue Autorität. Über 20 Jahre Erfahrung in der stationären Kinder- und Jugendhilfe.',
        'is_published' => true,
        'blocks' => [
            ['type' => 'hero', 'data' => [
                'title' => 'Über B&U BundU',
                'subtitle' => 'Beratung & Unterstützung – mit Erfahrung, Empathie und Haltung.',
            ]],
            ['type' => 'about_person', 'data' => [
                'name' => 'Walter Uehli',
                'photo' => 'images/walter-uehli.png',
                'bio' => $walterBio,
                'focusTags' => $focusTags,
            ]],
            ['type' => 'mission', 'data' => [
                'title' => 'Haltung & Anspruch',
                'content' => '<p>B&U BundU steht für Beratung und Unterstützung. Ich begleite Eltern, Fachpersonen und Institutionen dabei, tragfähige Beziehungen zu gestalten. Im Zentrum stehen Methoden, die im Alltag wirksam und umsetzbar sind.</p>'
                    . '<p>Grundlage meiner Arbeit ist eine gewaltfreie Autorität. Sie zeigt sich in Präsenz, Klarheit und Beharrlichkeit. Coaching verstehe ich als Prozess, der vorhandene Ressourcen stärkt und neue Handlungsmöglichkeiten eröffnet. Die Beratung erfolgt auf Augenhöhe, empathisch, respektvoll und konsequent lösungsorientiert.</p>',
            ]],
            ['type' => 'features', 'data' => [
                'title' => 'Meine Ansätze',
                'items' => [
                    ['title' => 'Neue Autorität', 'description' => 'Basierend auf dem Konzept von Haim Omer – Beziehung statt Macht, Präsenz statt Kontrolle.', 'icon' => true],
                    ['title' => 'Systemische Beratung', 'description' => 'Den Blick aufs ganze System richten – Lösungen im Kontext finden, Ressourcen aktivieren.', 'icon' => true],
                    ['title' => 'Lösungsfokussiertes Coaching', 'description' => 'Zukunftsorientiert arbeiten – kleine Schritte, die zu nachhaltigen Veränderungen führen.', 'icon' => true],
                ],
            ]],
            ['type' => 'cta', 'data' => [
                'title' => 'Das BundU-Prinzip',
                'subtitle' => 'Ein integrativer Ansatz, der bewährte Methoden verbindet: Neue Autorität, systemische Gesprächsführung und lösungsfokussiertes Coaching. Massgeschneidert für die Praxis.',
                'buttons' => [
                    ['label' => 'Kostenloses Erstgespräch', 'href' => '/kontakt', 'style' => 'primary'],
                    ['label' => 'Angebote ansehen', 'href' => '/angebote', 'style' => 'secondary'],
                ],
            ]],
        ],
    ],

    // 4. Haltung & Anspruch
    [
        'slug' => 'ueber-bundu/haltung-und-anspruch',
        'title' => 'Haltung & Anspruch',
        'seo_title' => 'Haltung & Anspruch – B&U BundU',
        'seo_description' => 'B&U BundU steht für Beratung und Unterstützung. Gewaltfreie Autorität, systemische Beratung und lösungsfokussiertes Coaching.',
        'is_published' => true,
        'blocks' => [
            ['type' => 'hero', 'data' => [
                'title' => 'Haltung & Anspruch',
                'subtitle' => 'Beratung und Unterstützung – mit Klarheit, Empathie und Wirkung.',
            ]],
            ['type' => 'text_content', 'data' => [
                'content' => '<p>B&U BundU steht für Beratung und Unterstützung. Ich begleite Eltern, Fachpersonen und Institutionen dabei, tragfähige Beziehungen zu gestalten. Im Zentrum stehen Methoden, die im Alltag wirksam und umsetzbar sind.</p>'
                    . '<p>Grundlage meiner Arbeit ist eine gewaltfreie Autorität. Sie zeigt sich in Präsenz, Klarheit und Beharrlichkeit. Coaching verstehe ich als Prozess, der vorhandene Ressourcen stärkt und neue Handlungsmöglichkeiten eröffnet. Die Beratung erfolgt auf Augenhöhe, empathisch, respektvoll und konsequent lösungsorientiert.</p>',
            ]],
            ['type' => 'features', 'data' => [
                'title' => 'Meine Ansätze',
                'items' => [
                    ['title' => 'Neue Autorität', 'description' => 'Basierend auf dem Konzept von Haim Omer – Beziehung statt Macht, Präsenz statt Kontrolle.', 'icon' => true],
                    ['title' => 'Systemische Beratung', 'description' => 'Den Blick aufs ganze System richten – Lösungen im Kontext finden, Ressourcen aktivieren.', 'icon' => true],
                    ['title' => 'Lösungsfokussiertes Coaching', 'description' => 'Zukunftsorientiert arbeiten – kleine Schritte, die zu nachhaltigen Veränderungen führen.', 'icon' => true],
                ],
            ]],
            ['type' => 'cta', 'data' => [
                'title' => 'Das BundU-Prinzip',
                'subtitle' => 'Ein integrativer Ansatz, der bewährte Methoden verbindet: Neue Autorität, systemische Gesprächsführung und lösungsfokussiertes Coaching. Massgeschneidert für die Praxis.',
                'buttons' => [
                    ['label' => 'Kostenloses Erstgespräch', 'href' => '/kontakt', 'style' => 'primary'],
                    ['label' => 'Angebote ansehen', 'href' => '/angebote', 'style' => 'secondary'],
                ],
            ]],
        ],
    ],

    // 5. Walter Uehli
    [
        'slug' => 'ueber-bundu/walter-uehli',
        'title' => 'Walter Uehli',
        'seo_title' => 'Walter Uehli – B&U BundU',
        'seo_description' => 'Walter Uehli – Dipl. Sozialpädagoge FH, Coach für Neue Autorität, Berater Bündner Standard. Über 25 Jahre Erfahrung in der Kinder- und Jugendhilfe.',
        'is_published' => true,
        'blocks' => [
            ['type' => 'hero', 'data' => [
                'title' => 'Walter Uehli',
                'subtitle' => 'Systemischer Berater, Coach und Therapeut – mit über 25 Jahren Erfahrung.',
            ]],
            ['type' => 'about_person', 'data' => [
                'name' => 'Walter Uehli',
                'photo' => 'images/walter-uehli.png',
                'bio' => $walterBio,
                'focusTags' => $focusTags,
            ]],
            ['type' => 'cta', 'data' => [
                'title' => 'Lassen Sie uns ins Gespräch kommen',
                'subtitle' => 'Ein erstes Kennenlernen ist kostenlos und unverbindlich. Erzählen Sie mir von Ihrem Anliegen.',
                'buttons' => [
                    ['label' => 'Kostenloses Erstgespräch buchen', 'href' => '/kontakt', 'style' => 'primary'],
                ],
            ]],
        ],
    ],

    // 6. Kontakt
    [
        'slug' => 'kontakt',
        'title' => 'Kontakt',
        'seo_title' => 'Kontakt',
        'seo_description' => 'Buchen Sie direkt ein kostenloses Erstgespräch oder kontaktieren Sie B&U BundU – ich melde mich innerhalb von 24 Stunden.',
        'is_published' => true,
        'blocks' => [
            ['type' => 'hero', 'data' => [
                'title' => 'Kontakt',
                'subtitle' => 'Sind Sie bereit, den nächsten Schritt zu gehen? Lassen Sie uns in einem kostenlosen und unverbindlichen Erstgespräch herausfinden, wie ich Sie am besten unterstützen kann.',
            ]],
            ['type' => 'calendar_embed', 'data' => [
                'title' => 'Termin direkt buchen',
                'fallbackText' => 'Die Online-Terminbuchung wird in Kürze verfügbar sein. Nutzen Sie in der Zwischenzeit das Kontaktformular.',
            ]],
            ['type' => 'contact_form', 'data' => [
                'title' => 'Kontaktformular',
                'subtitle' => 'Ich melde mich innerhalb von 24 Stunden bei Ihnen.',
            ]],
            ['type' => 'contact_info', 'data' => [
                'title' => 'Direkt erreichen',
                'items' => [
                    ['icon' => 'phone', 'title' => 'Telefon', 'content' => '<a href="tel:+41555056203">+41 (0)55 505 62 03</a>'],
                    ['icon' => 'mail', 'title' => 'E-Mail', 'content' => '<a href="mailto:info@bundu.ch">info@bundu.ch</a>'],
                    ['icon' => 'map', 'title' => 'Adresse', 'content' => 'Klosterstrasse 5<br>CH-5626 Bremgarten'],
                ],
            ]],
        ],
    ],
];

// ── Create/update Page records ──
$created = 0;
$updated = 0;

foreach ($pages as $pageData) {
    $existing = Page::where('slug', $pageData['slug'])->first();
    if ($existing) {
        $existing->update($pageData);
        echo "UPDATED: {$pageData['slug']}\n";
        $updated++;
    } else {
        Page::create($pageData);
        echo "CREATED: {$pageData['slug']}\n";
        $created++;
    }
}

echo "\nTotal: {$created} created, {$updated} updated\n";

// ── Clear caches ──
echo "\n=== Clearing caches ===\n";
Illuminate\Support\Facades\Artisan::call('view:clear');
echo Illuminate\Support\Facades\Artisan::output();
Illuminate\Support\Facades\Artisan::call('route:clear');
echo Illuminate\Support\Facades\Artisan::output();
Illuminate\Support\Facades\Artisan::call('cache:clear');
echo Illuminate\Support\Facades\Artisan::output();

// ── Verify ──
echo "\n=== Verification ===\n";
$allPages = Page::whereIn('slug', array_column($pages, 'slug'))->pluck('slug')->toArray();
echo "Pages in DB: " . implode(', ', $allPages) . "\n";
echo "Expected: " . count($pages) . ", Found: " . count($allPages) . "\n";

// Self-delete
unlink(__FILE__);
echo "\n_phase3_deploy.php self-deleted\n";
echo "\n=== Phase 3 Done ===\n";
