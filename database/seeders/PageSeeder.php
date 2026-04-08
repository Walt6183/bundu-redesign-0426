<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // =====================================================
        // HOME PAGE
        // =====================================================
        Page::create([
            'slug' => 'home',
            'title' => 'B&U BundU - Starke Eltern, starke Kinder',
            'seo_title' => 'B&U BundU | Online Beratung für Familien | Neue Autorität',
            'seo_description' => 'Erziehung mit Haltung statt Härte. Professionelle Online-Beratung für Eltern und Familien. Systemische Beratung und Neue Autorität.',
            'is_published' => true,
            'blocks' => [
                [
                    'type' => 'hero',
                    'data' => [
                        'title' => 'Starke Eltern –',
                        'titleHighlight' => 'starke Kinder',
                        'subtitle' => 'Erziehung mit Haltung statt Härte. Ich berate dich professionell und ortsunabhängig per Video-Call.',
                        'ctaPrimary' => ['text' => 'Termin buchen', 'link' => '/contact'],
                        'ctaSecondary' => ['text' => 'Über mich', 'link' => '/about'],
                        'badges' => [
                            '100% Online Beratung',
                            'DSGVO-sichere Plattform',
                            'Neue Autorität'
                        ]
                    ]
                ],
                [
                    'type' => 'features',
                    'data' => [
                        'title' => 'Warum B&U BundU?',
                        'subtitle' => 'Ich begleite dich mit praxisnahen Ansätzen – individuell, empathisch und lösungsorientiert.',
                        'items' => [
                            ['icon' => 'FiHeart', 'title' => 'Empathische Begleitung', 'description' => 'Ich verstehe deine Herausforderungen und begleite dich online mit Empathie und Professionalität.'],
                            ['icon' => 'FiUsers', 'title' => 'Familienzentriert', 'description' => 'Meine digitalen Ansätze stärken die gesamte Familie und fördern gesunde Beziehungen.'],
                            ['icon' => 'FiBookOpen', 'title' => 'Praxisnah', 'description' => 'Konkrete Strategien und Methoden, die sich im Alltag bewährt haben.'],
                            ['icon' => 'FiTrendingUp', 'title' => 'Nachhaltig', 'description' => 'Langfristige Lösungen, die Familien stärken und Wachstum ermöglichen.']
                        ]
                    ]
                ],
                [
                    'type' => 'services',
                    'data' => [
                        'title' => 'Meine Online-Leistungen',
                        'subtitle' => 'Professionelle digitale Unterstützung für Familien, Schulen und Institutionen',
                        'items' => [
                            ['title' => 'Online Beratung & Coaching', 'description' => 'Individuelle Unterstützung für Eltern, Familien und Fachpersonen via coachingspace', 'icon' => 'FiUsers', 'link' => '/services#coaching'],
                            ['title' => 'Online Supervision', 'description' => 'Professionelle digitale Begleitung für Teams und Institutionen', 'icon' => 'FiShield', 'link' => '/services#supervision'],
                            ['title' => 'Webinare & Kurse', 'description' => 'Praxisnahe Online-Weiterbildungen zu Neuer Autorität und Systemik', 'icon' => 'FiBookOpen', 'link' => '/services#workshops']
                        ]
                    ]
                ],
                [
                    'type' => 'blogSection',
                    'data' => [
                        'title' => 'Aktuelles aus dem',
                        'titleHighlight' => 'Blog',
                        'subtitle' => 'Impulse, Fachwissen und praktische Tipps für deinen Familienalltag.',
                        'ctaText' => 'Alle Artikel ansehen'
                    ]
                ],
                [
                    'type' => 'cta',
                    'data' => [
                        'title' => 'Bereit für den nächsten Schritt?',
                        'subtitle' => 'Lass uns gemeinsam Lösungen finden. Buche jetzt dein kostenloses, unverbindliches Online-Erstgespräch.',
                        'primaryButton' => ['text' => 'Termin buchen', 'link' => '/contact'],
                        'secondaryButton' => ['text' => 'Kostenlose Ressourcen', 'link' => '/resources']
                    ]
                ]
            ]
        ]);

        // =====================================================
        // ABOUT PAGE
        // =====================================================
        Page::create([
            'slug' => 'about',
            'title' => 'Über B&U BundU',
            'seo_title' => 'Über mich | B&U BundU | Walter Uehli',
            'seo_description' => 'Lernen Sie B&U BundU kennen - Ihr Partner für systemische Beratung, Supervision und Weiterbildung mit Expertise in Neuer Autorität.',
            'is_published' => true,
            'blocks' => [
                [
                    'type' => 'hero',
                    'data' => [
                        'title' => 'Über',
                        'titleHighlight' => 'B&U BundU',
                        'subtitle' => 'Ich bin dein Partner für systemische Beratung, Supervision und Weiterbildung. Mit Expertise in Neuer Autorität begleite ich Familien und Institutionen zu nachhaltigen Lösungen - komplett digital und DSGVO Sicher.'
                    ]
                ],
                [
                    'type' => 'mission',
                    'data' => [
                        'title' => 'Ich stehe für:',
                        'paragraphs' => [
                            'B&U BundU steht für praxiserfahrene Beratung und Unterstützung. Ich glaube daran, dass jede Familie und jede Institution über die Ressourcen verfügt, um Herausforderungen erfolgreich zu bewältigen.',
                            'Mein systemischer Ansatz kombiniert mit den Prinzipien der Neuen Autorität ermöglicht es mir, nachhaltige Veränderungen zu bewirken – ohne Gewalt, aber mit klarer Haltung und Präsenz.'
                        ],
                        'quote' => 'Wenn Verhalten auffällt, braucht es Beziehung – nicht Strafe.'
                    ]
                ],
                [
                    'type' => 'values',
                    'data' => [
                        'title' => 'Meine Werte',
                        'subtitle' => 'Diese Grundsätze leiten mein Handeln und prägen meine Arbeitsweise',
                        'items' => [
                            ['icon' => 'FiHeart', 'title' => 'Empathie', 'description' => 'Ich begegne allen Beteiligten mit Verständnis und Respekt.'],
                            ['icon' => 'FiUsers', 'title' => 'Zusammenarbeit', 'description' => 'Gemeinsam entwickeln wir nachhaltige Lösungen.'],
                            ['icon' => 'FiTarget', 'title' => 'Lösungsorientierung', 'description' => 'Ich fokussiere auf praktikable Wege und Ressourcen.'],
                            ['icon' => 'FiTrendingUp', 'title' => 'Nachhaltigkeit', 'description' => 'Meine Ansätze wirken langfristig und stärken Beziehungen.']
                        ]
                    ]
                ],
                [
                    'type' => 'about_person',
                    'data' => [
                        'title' => 'Über mich'
                    ]
                ],
                [
                    'type' => 'approach',
                    'data' => [
                        'title' => 'Mein Ansatz',
                        'subtitle' => 'Systemische Beratung trifft auf Neue Autorität',
                        'systemicCounseling' => [
                            'title' => 'Systemische Beratung',
                            'items' => [
                                'Ressourcenorientierter Blick auf Familiensysteme',
                                'Lösungsfokussierte Gesprächsführung',
                                'Einbezug aller relevanten Akteure',
                                'Zirkuläre Fragetechniken',
                                'Hypothesenbildung und -überprüfung'
                            ]
                        ],
                        'newAuthority' => [
                            'title' => 'Neue Autorität',
                            'items' => [
                                'Präsenz statt Macht und Kontrolle',
                                'Gewaltloser Widerstand',
                                'Beziehungsaufbau und -pflege',
                                'Transparenz und Ankündigung',
                                'Unterstützungsnetzwerke aufbauen'
                            ]
                        ]
                    ]
                ]
            ]
        ]);

        // =====================================================
        // SERVICES PAGE
        // =====================================================
        Page::create([
            'slug' => 'services',
            'title' => 'Meine Online-Leistungen',
            'seo_title' => 'Online-Leistungen | Beratung, Supervision, Coaching | B&U BundU',
            'seo_description' => 'Professionelle Online-Unterstützung für Familien, Schulen und Institutionen. Systemische Beratung und Neue Autorität via coachingspace.',
            'is_published' => true,
            'blocks' => [
                [
                    'type' => 'hero',
                    'data' => [
                        'title' => 'Meine',
                        'titleHighlight' => 'Online-Leistungen',
                        'subtitle' => 'Professionelle Unterstützung für Familien, Schulen und Institutionen. Systemische Beratung trifft auf Neue Autorität – rein digital über coachingspace.'
                    ]
                ],
                [
                    'type' => 'services_overview',
                    'data' => [
                        'items' => [
                            [
                                'id' => 'coaching',
                                'title' => 'Online Beratung & Coaching',
                                'icon' => 'FiUsers',
                                'subtitle' => 'Individuelle digitale Unterstützung für Familien und Fachpersonen',
                                'description' => 'Systemische Beratung und Coaching für Eltern, Familien und pädagogische Fachkräfte bequem von zu Hause aus. Ich begleite dich bei herausfordernden Situationen mit praxisnahen Lösungsansätzen per Video-Call.',
                                'features' => [
                                    'Einzelberatung für Eltern (Online)',
                                    'Familienberatung (Online)',
                                    'Coaching für Fachpersonen',
                                    'Krisenintervention',
                                    'Langzeitbegleitung via Video'
                                ],
                                'duration' => '60-90 Minuten',
                                'location' => 'Online via coachingspace',
                                'price' => '60 Minuten: CHF 135.--',
                                'buttonText' => 'Erstgespräch vereinbaren',
                                'buttonLink' => 'https://calendar.app.google/BRnxiHKRVhJACs2j6',
                                'isExternal' => true
                            ],
                            [
                                'id' => 'supervision',
                                'title' => 'Team-Resonanz-System',
                                'icon' => 'FiShield',
                                'subtitle' => 'Digitale professionelle Begleitung für Teams und Institutionen',
                                'description' => 'Sparen Sie Reisekosten, nicht an der Beziehungsqualität. Das Team-Resonanz-System ist die effiziente Lösung für Teamentwicklung und Supervision im virtuellen Raum.',
                                'features' => [
                                    'Teamsupervision (Online) - ohne Reisekosten',
                                    'Einzelsupervision',
                                    'Fallsupervision',
                                    'Institutionelle Beratung',
                                    'Organisationsentwicklung'
                                ],
                                'duration' => '120 Minuten',
                                'location' => 'Online via coachingspace',
                                'price' => 'Auf Anfrage',
                                'buttonText' => 'Erstgespräch vereinbaren',
                                'buttonLink' => 'https://calendar.app.google/BRnxiHKRVhJACs2j6',
                                'isExternal' => true
                            ],
                            [
                                'id' => 'workshops',
                                'title' => 'Webinare & Kurse',
                                'icon' => 'FiBookOpen',
                                'subtitle' => 'Praxisnahe Online-Weiterbildungen zu Neuer Autorität und Systemik',
                                'description' => 'Webinare und Online-Kurse für Eltern, Fachpersonen und Teams. Vermittlung von Methoden der Neuen Autorität und systemischen Ansätzen.',
                                'features' => [
                                    'Elternkurse "Starke Eltern" (Webinar)',
                                    'Neue Autorität Grundkurs (Online)',
                                    'Systemische Gesprächsführung',
                                    'Krisenmanagement',
                                    'Digitale Inhouse-Schulungen'
                                ],
                                'duration' => 'Halbtags bis mehrtägig',
                                'location' => 'Online Live-Stream',
                                'price' => 'Je nach Format',
                                'buttonText' => 'Zum Kursangebot',
                                'buttonLink' => '/courses',
                                'isExternal' => false
                            ]
                        ]
                    ]
                ],
                [
                    'type' => 'process',
                    'data' => [
                        'title' => 'Mein Vorgehen',
                        'subtitle' => 'Strukturiert und transparent – so begleite ich dich digital zum Erfolg',
                        'steps' => [
                            ['step' => 1, 'title' => 'Erstgespräch', 'description' => 'Kostenfreies Online-Kennenlernen und Bedarfsklärung'],
                            ['step' => 2, 'title' => 'Analyse', 'description' => 'Gemeinsame Situationsanalyse und Zieldefinition'],
                            ['step' => 3, 'title' => 'Begleitung', 'description' => 'Individuelle Online-Beratung und Lösungsentwicklung'],
                            ['step' => 4, 'title' => 'Evaluation', 'description' => 'Überprüfung der Fortschritte und Anpassungen']
                        ]
                    ]
                ],
                [
                    'type' => 'cta',
                    'data' => [
                        'title' => 'Hast du Fragen zu meinen Online-Leistungen?',
                        'subtitle' => 'Ich berate dich gerne und finde gemeinsam mit dir die passende Lösung.',
                        'primaryButton' => ['text' => 'Kostenfreies Erstgespräch', 'link' => '/contact'],
                        'secondaryButton' => ['text' => 'Direkt anrufen', 'link' => 'tel:+41555056203']
                    ]
                ]
            ]
        ]);

        // =====================================================
        // COURSES PAGE
        // =====================================================
        Page::create([
            'slug' => 'courses',
            'title' => 'Online Kurse & Weiterbildungen',
            'seo_title' => 'Online Kurse & Weiterbildungen | Neue Autorität | B&U BundU',
            'seo_description' => 'Praxisnahe Webinare zu Neuer Autorität und systemischen Ansätzen.',
            'is_published' => true,
            'blocks' => [
                [
                    'type' => 'hero',
                    'data' => [
                        'title' => 'Online Kurse &',
                        'titleHighlight' => 'Weiterbildungen',
                        'subtitle' => 'Praxisnahe Webinare zu Neuer Autorität und systemischen Ansätzen. Stärke deine Kompetenzen in der Arbeit mit Kindern und Familien – bequem von überall.'
                    ]
                ],
                [
                    'type' => 'courses',
                    'data' => [
                        'items' => [
                            [
                                'title' => 'Erziehungsratgeber 7 - 12 jährige Kinder (Online)',
                                'subtitle' => 'Elternkurs basierend auf dem BundU® Prinzip (Neue Autorität)',
                                'description' => 'Ein selbstlern Online-Kurs für Eltern, die ihre Erziehungskompetenz stärken möchten.',
                                'duration' => '5 Module',
                                'sessions' => '1 - 2 Stunden Wöchentlich',
                                'participants' => 'unbeschränkt',
                                'price' => 'CHF 350.-',
                                'nextDate' => '01. Dezember 2025',
                                'highlights' => [
                                    'Neue Autorität verstehen und anwenden',
                                    'Gewaltloser Widerstand im Alltag',
                                    'Beziehungsaufbau stärken',
                                    'Unterstützungsnetzwerke entwickeln',
                                    'E-Mail-Coaching nach jedem Modul',
                                    'Community'
                                ],
                                'target' => 'Eltern von Kindern im Alter von 7 - 12 Jahren',
                                'isFullyBooked' => false,
                                'bookingUrl' => 'https://www.checkout-ds24.com/product/590767'
                            ],
                            [
                                'title' => 'Neue Autorität für Fachpersonen (Webinar)',
                                'subtitle' => 'Grundkurs für pädagogische Fachkräfte',
                                'description' => 'Intensive 3-tägige Online-Weiterbildung für Lehr- und Fachpersonen.',
                                'duration' => '3 Tage',
                                'sessions' => '3 x 7 Stunden',
                                'participants' => 'Max. 16 Teilnehmer',
                                'price' => 'CHF 750.-',
                                'nextDate' => '22. April 2025',
                                'highlights' => [
                                    'Theoretische Grundlagen der Neuen Autorität',
                                    'Präsenz und gewaltloser Widerstand',
                                    'Systemische Sichtweisen',
                                    'Fallarbeit und Online-Supervision',
                                    'Zertifikat nach erfolgreichem Abschluss'
                                ],
                                'target' => 'Lehrpersonen, Sozialarbeiter, Erzieher, Therapeuten',
                                'isFullyBooked' => true
                            ],
                            [
                                'title' => 'Systemische Gesprächsführung (Online)',
                                'subtitle' => 'Kommunikation die verbindet',
                                'description' => '2-tägiger Workshop zu systemischen Gesprächstechniken via coachingspace.',
                                'duration' => '2 Tage',
                                'sessions' => '2 x 7 Stunden',
                                'participants' => 'Max. 14 Teilnehmer',
                                'price' => 'CHF 520.-',
                                'nextDate' => '10. Mai 2025',
                                'highlights' => [
                                    'Zirkuläre Fragetechniken',
                                    'Lösungsfokussierte Gesprächsführung',
                                    'Reframing und Perspektivenwechsel',
                                    'Umgang mit Widerstand',
                                    'Praktische Gesprächsübungen in Breakout-Rooms'
                                ],
                                'target' => 'Alle, die professionell Gespräche führen',
                                'isFullyBooked' => true
                            ]
                        ]
                    ]
                ],
                [
                    'type' => 'testimonials',
                    'data' => [
                        'items' => [
                            [
                                'quote' => 'Der Online-Elternkurs hat unser Familienleben verändert.',
                                'author' => 'Sandra M.',
                                'course' => 'Starke Eltern - Starke Kinder'
                            ],
                            [
                                'quote' => 'Endlich ein Webinar, das konkrete Werkzeuge vermittelt.',
                                'author' => 'Thomas K.',
                                'course' => 'Neue Autorität für Fachpersonen'
                            ]
                        ]
                    ]
                ],
                [
                    'type' => 'benefits',
                    'data' => [
                        'title' => 'Warum B&U BundU Online-Kurse?',
                        'subtitle' => 'Meine Webinare verbinden Theorie mit Praxis',
                        'items' => [
                            ['icon' => 'FiAward', 'title' => 'Zertifizierte Qualität', 'description' => 'Alle Kurse werden von mir als zertifizierter Fachperson geleitet.'],
                            ['icon' => 'FiUsers', 'title' => 'Kleine Gruppen', 'description' => 'Maximale Teilnehmerzahl für intensiven Austausch.'],
                            ['icon' => 'FiBookOpen', 'title' => 'Praxisnah', 'description' => 'Konkrete Methoden, die du sofort anwenden kannst.']
                        ]
                    ]
                ],
                [
                    'type' => 'cta',
                    'data' => [
                        'title' => 'Bereit für deine Weiterbildung?',
                        'subtitle' => 'Melde dich jetzt an oder lass dich unverbindlich beraten.',
                        'primaryButton' => ['text' => 'Kursanmeldung', 'link' => '/contact'],
                        'secondaryButton' => ['text' => 'Beratung anfordern', 'link' => 'mailto:info@bundu.ch']
                    ]
                ]
            ]
        ]);

        // =====================================================
        // RESOURCES PAGE
        // =====================================================
        Page::create([
            'slug' => 'resources',
            'title' => 'Kostenlose Ressourcen',
            'seo_title' => 'Kostenlose Ressourcen | Downloads & Podcast | B&U BundU',
            'seo_description' => 'Wertvolle Materialien, Videos und Guides zur Neuen Autorität.',
            'is_published' => true,
            'blocks' => [
                [
                    'type' => 'hero',
                    'data' => [
                        'title' => 'Kostenlose',
                        'titleHighlight' => 'Ressourcen',
                        'subtitle' => 'Wertvolle Materialien, Videos und Guides zur Neuen Autorität und systemischen Ansätzen.'
                    ]
                ],
                [
                    'type' => 'downloads',
                    'data' => [
                        'title' => 'Kostenlose Downloads',
                        'subtitle' => 'Praktische Guides und Checklisten für den Alltag',
                        'items' => [
                            ['title' => 'Neue Autorität - Grundlagen', 'description' => 'Einführung in die Prinzipien der Neuen Autorität für Eltern', 'type' => 'PDF Guide', 'pages' => '12 Seiten', 'icon' => 'FiFileText', 'downloadUrl' => '#'],
                            ['title' => 'Gesprächsleitfaden für schwierige Situationen', 'description' => 'Praktische Hilfe für herausfordernde Gespräche mit Kindern', 'type' => 'Checkliste', 'pages' => '4 Seiten', 'icon' => 'FiFileText', 'downloadUrl' => '#'],
                            ['title' => 'Unterstützungsnetzwerk aufbauen', 'description' => 'Schritt-für-Schritt Anleitung zur Netzwerkbildung', 'type' => 'Workbook', 'pages' => '8 Seiten', 'icon' => 'FiBook', 'downloadUrl' => '#'],
                            ['title' => 'Krisenplan für Familien', 'description' => 'Vorlage für einen strukturierten Krisenplan', 'type' => 'Template', 'pages' => '2 Seiten', 'icon' => 'FiFileText', 'downloadUrl' => '#']
                        ]
                    ]
                ],
                [
                    'type' => 'podcast',
                    'data' => [
                        'title' => 'Familien Radar Podcast',
                        'subtitle' => 'Jeden Mittwoch geben Lisa und Walter praktische Tipps für den Alltag'
                    ]
                ],
                [
                    'type' => 'books',
                    'data' => [
                        'title' => 'Empfohlene Fachliteratur',
                        'subtitle' => 'Vertiefende Lektüre zu Neuer Autorität',
                        'items' => [
                            ['title' => 'Neue Autorität', 'author' => 'Haim Omer', 'description' => 'Das Standardwerk zur Neuen Autorität', 'isbn' => '978-3525014684', 'link' => '#'],
                            ['title' => 'Systemische Familientherapie', 'author' => 'Arist von Schlippe', 'description' => 'Grundlagen systemischer Therapie', 'isbn' => '978-3525462403', 'link' => '#'],
                            ['title' => 'Stärke statt Macht', 'author' => 'Haim Omer & Philip Streit', 'description' => 'Neue Autorität in Familie, Schule und Gemeinde', 'isbn' => '978-3525804087', 'link' => '#']
                        ]
                    ]
                ],
                [
                    'type' => 'newsletter',
                    'data' => [
                        'title' => 'Bleibe auf dem Laufenden',
                        'subtitle' => 'Abonniere meinen Newsletter für neue Ressourcen und Kurstermine.'
                    ]
                ]
            ]
        ]);

        // =====================================================
        // CONTACT PAGE
        // =====================================================
        Page::create([
            'slug' => 'contact',
            'title' => 'Kontakt & Buchung',
            'seo_title' => 'Kontakt & Buchung | B&U BundU | Termin buchen',
            'seo_description' => 'Buche direkt dein kostenloses Erstgespräch oder schreibe mir eine Nachricht.',
            'is_published' => true,
            'blocks' => [
                [
                    'type' => 'hero',
                    'data' => [
                        'title' => 'Kontakt &',
                        'titleHighlight' => 'Buchung',
                        'subtitle' => 'Buche direkt dein kostenloses Erstgespräch oder schreibe mir eine Nachricht.'
                    ]
                ],
                [
                    'type' => 'booking',
                    'data' => [
                        'title' => 'Online-Terminbuchung',
                        'fallbackText' => 'Kalender wird nicht angezeigt?',
                        'fallbackButton' => 'Direkt zur Buchungsseite'
                    ]
                ],
                [
                    'type' => 'form',
                    'data' => [
                        'title' => 'Nachricht senden',
                        'subtitle' => 'Du hast keinen passenden Termin gefunden? Nutze das Kontaktformular.',
                        'labels' => ['name' => 'Name *', 'email' => 'E-Mail *', 'phone' => 'Telefon', 'service' => 'Gewünschte Leistung', 'subject' => 'Betreff *', 'message' => 'Nachricht *'],
                        'placeholders' => ['name' => 'Ihr vollständiger Name', 'email' => 'ihre.email@beispiel.ch', 'phone' => '+41 (0)55 505 62 03', 'subject' => 'Worum geht es in Ihrer Anfrage?', 'message' => 'Beschreiben Sie Ihre Situation oder Ihre Frage...'],
                        'serviceOptions' => ['Online Beratung & Coaching', 'Online Supervision', 'Webinare / Workshops', 'Online Kurse', 'Krisenintervention (Online)', 'Sonstiges'],
                        'disclaimer' => '* Pflichtfelder. Deine Daten werden vertraulich behandelt.',
                        'submitButton' => 'Nachricht senden',
                        'successMessage' => 'Vielen Dank! Deine Nachricht wurde erfolgreich gesendet.',
                        'errorMessage' => 'Ups! Da ist etwas schiefgelaufen. Bitte versuche es später noch einmal.'
                    ]
                ],
                [
                    'type' => 'contactInfo',
                    'data' => [
                        'title' => 'Kontaktinformationen',
                        'quickHelp' => ['title' => 'Schnelle Hilfe benötigt?', 'subtitle' => 'Ich bin per E-Mail oder Telefon erreichbar.', 'callButton' => 'Anrufen', 'emailButton' => 'E-Mail schreiben']
                    ]
                ],
                [
                    'type' => 'location',
                    'data' => [
                        'title' => 'Ortsunabhängige Beratung',
                        'subtitle' => 'Meine Dienstleistungen finden ausschließlich online über coachingspace statt.',
                        'postal' => ['title' => 'Postadresse', 'subtitle' => 'Für schriftliche Korrespondenz:'],
                        'coachingspace' => ['title' => 'coachingspace', 'features' => ['DSGVO-konforme Plattform', 'Keine Installation notwendig', 'Computer/Tablet mit Kamera erforderlich']]
                    ]
                ]
            ]
        ]);

        // =====================================================
        // BLOG PAGE
        // =====================================================
        Page::create([
            'slug' => 'blog',
            'title' => 'Blog & Impulse',
            'seo_title' => 'Blog | Fachwissen & Tipps | B&U BundU',
            'seo_description' => 'Aktuelle Gedanken, Fachwissen und praktische Tipps rund um Erziehung.',
            'is_published' => true,
            'blocks' => [
                [
                    'type' => 'hero',
                    'data' => [
                        'title' => 'Blog &',
                        'titleHighlight' => 'Impulse',
                        'subtitle' => 'Aktuelle Gedanken, Fachwissen und praktische Tipps rund um Erziehung, Neue Autorität und systemische Arbeit.'
                    ]
                ]
            ]
        ]);

        // =====================================================
        // DATENSCHUTZ PAGE
        // =====================================================
        Page::create([
            'slug' => 'datenschutz',
            'title' => 'Datenschutzerklärung',
            'seo_title' => 'Datenschutzerklärung | B&U BundU',
            'seo_description' => 'Datenschutzerklärung von B&U BundU.',
            'is_published' => true,
            'blocks' => [
                [
                    'type' => 'widget_embed',
                    'data' => [
                        'title' => 'Datenschutzerklärung',
                        'widgetId' => 'cm5cc17et0029m2ibxw5ya0f7'
                    ]
                ]
            ]
        ]);

        // =====================================================
        // IMPRESSUM PAGE
        // =====================================================
        Page::create([
            'slug' => 'impressum',
            'title' => 'Impressum',
            'seo_title' => 'Impressum | B&U BundU',
            'seo_description' => 'Impressum von B&U BundU.',
            'is_published' => true,
            'blocks' => [
                [
                    'type' => 'impressum',
                    'data' => [
                        'title' => 'Impressum',
                        'sections' => [
                            ['title' => null, 'content' => "B&U BundU\nKlosterstrasse 5\nCH-5626 Bremgarten"],
                            ['title' => 'Kontakt', 'content' => "Telefon: +41 (0)55 505 62 03\nE-Mail: info@bundu.ch"],
                            ['title' => 'Vertretungsberechtigte Person', 'content' => 'Walter Uehli']
                        ]
                    ]
                ]
            ]
        ]);
    }
}
