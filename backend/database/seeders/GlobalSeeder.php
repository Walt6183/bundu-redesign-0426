<?php

namespace Database\Seeders;

use App\Models\Global_;
use Illuminate\Database\Seeder;

class GlobalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Global_::create([
            'key' => 'site',
            'content' => [
                'siteName' => 'B&U BundU',
                'siteTagline' => 'Starke Eltern – starke Kinder',
                'siteDescription' => 'Erziehung mit Haltung statt Härte. Professionelle Online-Beratung.',
                
                'contact' => [
                    'email' => 'info@bundu.ch',
                    'phone' => '+41 (0)55 505 62 03',
                    'phoneClean' => '+41555056203',
                    'address' => [
                        'name' => 'B&U BundU',
                        'street' => 'Klosterstrasse 5',
                        'city' => 'CH-5626 Bremgarten'
                    ]
                ],
                
                'owner' => [
                    'name' => 'Walter Uehli',
                    'role' => 'Inhaber',
                    'bio' => 'Als Gründer von B&U BundU stehe ich für eine Haltung, die Beziehung vor Erziehung stellt. Mit langjähriger Erfahrung in der systemischen Arbeit und als Experte und Coach für Neue Autorität unterstütze ich dich dabei, eigene Lösungswege zu finden und deine Handlungskompetenz zu stärken. Mein Ziel ist es, dich in deiner Rolle zu festigen, damit du Herausforderungen gelassen und präsent begegnen kannst.',
                    'expertise' => [
                        'Systemische Beratung',
                        'Neue Autorität',
                        'Elterncoaching',
                        'Supervision'
                    ]
                ],
                
                'navigation' => [
                    'main' => [
                        ['name' => 'Home', 'href' => '/'],
                        ['name' => 'Über mich', 'href' => '/about'],
                        [
                            'name' => 'Leistungen',
                            'href' => '/services',
                            'dropdown' => [
                                ['name' => 'Beratung & Coaching', 'href' => '/services#coaching'],
                                ['name' => 'Supervision', 'href' => '/services#supervision'],
                                ['name' => 'Workshops', 'href' => '/services#workshops']
                            ]
                        ],
                        ['name' => 'Kurse', 'href' => '/courses'],
                        ['name' => 'Ressourcen', 'href' => '/resources'],
                        ['name' => 'Blog', 'href' => '/blog']
                    ],
                    'footer' => [
                        ['name' => 'Über mich', 'href' => '/about'],
                        ['name' => 'Leistungen', 'href' => '/services'],
                        ['name' => 'Kurse', 'href' => '/courses'],
                        ['name' => 'Ressourcen', 'href' => '/resources']
                    ],
                    'legal' => [
                        ['name' => 'Datenschutz', 'href' => '/datenschutz'],
                        ['name' => 'Impressum', 'href' => '/impressum']
                    ]
                ],
                
                'externalLinks' => [
                    'bookingUrl' => 'https://calendar.app.google/BRnxiHKRVhJACs2j6',
                    'bookingIframe' => 'https://calendar.google.com/calendar/u/0/appointments/schedules/AcZssZ09ao18lmv3WJDmcxPV56j1Yol-rsPfRO04BdfNcNw1C_WZ3IvpGilgvXcwYv1UQRhxLZCqv-jl',
                    'formspreeUrl' => 'https://formspree.io/f/mgvbgzzz',
                    'podcastScript' => 'https://letscast.fm/podcasts/familien-radar-b-u-bundu-online-6f440f6d/player.js',
                    'newsletterIframe' => 'https://assets.klicktipp.com/userimages/1224840/forms/341345/7xmpzsjufz8z6724.html',
                    'privacyBeeWidgetId' => 'cm5cc17et0029m2ibxw5ya0f7'
                ],
                
                'stats' => [
                    'yearsExperience' => '20+',
                    'familiesSupported' => '50+',
                    'institutions' => '10+',
                    'ownConcepts' => '5+'
                ],
                
                'footerText' => 'Starke Eltern – starke Kinder: Erziehung mit Haltung statt Härte. Ich begleite dich mit praxisnahen Ansätzen – individuell, empathisch und lösungsorientiert via Online-Beratung.',
                'copyright' => '© 2025 B&U BundU. Alle Rechte vorbehalten.',
                
                'assets' => [
                    'logo' => '/logo.png',
                    'portrait' => '/portrait.jpg'
                ]
            ]
        ]);
    }
}
