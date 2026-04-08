<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // ── Angebote ──────────────────────────────────────────────
        $angebote = [
            [
                'titel' => 'Online Eltern-Coaching',
                'slug' => 'online-eltern-coaching',
                'zielgruppe' => json_encode(['eltern']),
                'kurzbeschreibung' => 'Individuelle Beratung bei Erziehungsfragen – professionell, empathisch und bequem per Video-Call.',
                'nutzen' => '<ul><li>Klarheit in schwierigen Erziehungssituationen</li><li>Sofort umsetzbare Strategien</li><li>Stärkung der Eltern-Kind-Beziehung</li></ul>',
                'fuer_wen' => '<p>Für Eltern, die sich Unterstützung bei Erziehungsfragen wünschen – unabhängig davon, ob es um Konflikte, Unsicherheiten oder Kommunikation geht.</p>',
                'inhalte' => '<p>Systemische Beratung mit Fokus auf Neue Autorität. Wir erarbeiten gemeinsam Lösungen, die zu Ihrer Familie passen.</p>',
                'ablauf' => '<p>1. Kostenloses 15-Minuten-Erstgespräch<br>2. Beratungssitzungen à 60 Minuten per Video<br>3. Optional: Follow-up nach 4 Wochen</p>',
                'preis_info' => 'Erstgespräch kostenlos. Einzelsitzung CHF 150.–',
                'cta_text' => 'Erstgespräch anfragen',
                'cta_url' => '/kontakt',
                'faqs' => json_encode([]),
                'aktiv' => true,
                'sortierung' => 1,
            ],
            [
                'titel' => 'Kurs: Starke Eltern – starke Kinder',
                'slug' => 'kurs-starke-eltern',
                'zielgruppe' => json_encode(['eltern']),
                'kurzbeschreibung' => 'Praxisnaher Online-Kurs zu Neuer Autorität und lösungsorientierter Erziehung in 6 Modulen.',
                'nutzen' => '<ul><li>Fundiertes Wissen zu Neuer Autorität</li><li>Konkrete Werkzeuge für den Alltag</li><li>Austausch mit anderen Eltern</li></ul>',
                'fuer_wen' => '<p>Eltern, die sich systematisch weiterbilden und ihre Erziehungskompetenz stärken wollen.</p>',
                'inhalte' => '<p>6 Module: Haltung, Präsenz, Deeskalation, Ankerfunktion, Netzwerk, Wiedergutmachung</p>',
                'ablauf' => '<p>6 × 2 Stunden, wöchentlich per Zoom. Aufzeichnungen verfügbar.</p>',
                'preis_info' => 'CHF 490.– pro Person, Paare CHF 780.–',
                'cta_text' => 'Jetzt anmelden',
                'cta_url' => '/kontakt',
                'faqs' => json_encode([]),
                'aktiv' => true,
                'sortierung' => 2,
            ],
            [
                'titel' => 'Online Supervision',
                'slug' => 'online-supervision',
                'zielgruppe' => json_encode(['fachpersonen']),
                'kurzbeschreibung' => 'Professionelle Fallbesprechung und Reflexion für Fachpersonen – digital, flexibel und praxisnah.',
                'nutzen' => '<ul><li>Professionelle Reflexion komplexer Fälle</li><li>Methodische Erweiterung</li><li>Prävention von Burnout</li></ul>',
                'fuer_wen' => '<p>Sozialpädagog:innen, Sozialarbeiter:innen, Lehrpersonen und weitere Fachpersonen im pädagogischen Bereich.</p>',
                'inhalte' => '<p>Systemische Fall-Supervision mit Fokus auf Ressourcen und Lösungsorientierung. Einzeln oder in der Gruppe.</p>',
                'ablauf' => '<p>90 Minuten pro Sitzung. Einzel- oder Gruppenformat möglich.</p>',
                'preis_info' => 'Einzelsupervision CHF 180.–, Gruppensupervision CHF 80.– pro Person',
                'cta_text' => 'Supervision anfragen',
                'cta_url' => '/kontakt',
                'faqs' => json_encode([]),
                'aktiv' => true,
                'sortierung' => 3,
            ],
            [
                'titel' => 'Webinare & Workshops',
                'slug' => 'webinare-workshops',
                'zielgruppe' => json_encode(['fachpersonen']),
                'kurzbeschreibung' => 'Praxisnahe Weiterbildungen zu Neuer Autorität, systemischer Gesprächsführung und pädagogischen Methoden.',
                'nutzen' => '<ul><li>Sofort anwendbare Methoden</li><li>Interaktives Format mit Übungen</li><li>Teilnahmebestätigung</li></ul>',
                'fuer_wen' => '<p>Fachpersonen, die ihr methodisches Repertoire erweitern möchten.</p>',
                'inhalte' => '<p>Themen: Neue Autorität im Berufsalltag, Deeskalation, Systemische Gesprächsführung, Elternarbeit.</p>',
                'ablauf' => '<p>3 Stunden, online via Zoom. Materialien werden vorab zugestellt.</p>',
                'preis_info' => 'CHF 120.– pro Person',
                'cta_text' => 'Nächste Termine',
                'cta_url' => '/kontakt',
                'faqs' => json_encode([]),
                'aktiv' => true,
                'sortierung' => 4,
            ],
            [
                'titel' => 'Inhouse-Fortbildung',
                'slug' => 'inhouse-fortbildung',
                'zielgruppe' => json_encode(['institutionen']),
                'kurzbeschreibung' => 'Massgeschneiderte Weiterbildungen für Ihr Team – vor Ort oder online, flexibel und praxisorientiert.',
                'nutzen' => '<ul><li>Auf Ihre Institution zugeschnittene Inhalte</li><li>Stärkung des gesamten Teams</li><li>Nachhaltige Implementierung</li></ul>',
                'fuer_wen' => '<p>Kinder- und Jugendheime, Schulen, Sozialdienste und weitere Institutionen in der Deutschschweiz.</p>',
                'inhalte' => '<p>Neue Autorität, Schutzkonzepte, Deeskalation, Teamresilienz – individuell zusammengestellt.</p>',
                'ablauf' => '<p>Vorgespräch → Konzept → Durchführung (1-3 Tage) → Follow-up</p>',
                'preis_info' => 'Auf Anfrage',
                'cta_text' => 'Anfrage stellen',
                'cta_url' => '/kontakt',
                'faqs' => json_encode([]),
                'aktiv' => true,
                'sortierung' => 5,
            ],
            [
                'titel' => 'Bündner Standard – Implementierung',
                'slug' => 'buendner-standard',
                'zielgruppe' => json_encode(['institutionen']),
                'kurzbeschreibung' => 'Zertifizierte Implementierung des Bündner Standards für ein sicheres institutionelles Umfeld.',
                'nutzen' => '<ul><li>Klare Strukturen zur Prävention</li><li>Zertifizierung nach Bündner Standard</li><li>Langfristige Begleitung</li></ul>',
                'fuer_wen' => '<p>Institutionen der stationären Jugendhilfe in Graubünden und der Deutschschweiz.</p>',
                'inhalte' => '<p>Analyse, Schulung, Implementierung und Zertifizierung des Bündner Standards.</p>',
                'ablauf' => '<p>Modularer Prozess über 6-12 Monate mit regelmässigen Meilensteinen.</p>',
                'preis_info' => 'Auf Anfrage',
                'cta_text' => 'Beratungsgespräch vereinbaren',
                'cta_url' => '/kontakt',
                'faqs' => json_encode([]),
                'aktiv' => true,
                'sortierung' => 6,
            ],
        ];

        $now = now();
        foreach ($angebote as &$a) {
            $a['created_at'] = $now;
            $a['updated_at'] = $now;
        }
        DB::table('angebote')->insert($angebote);

        // ── Themen ────────────────────────────────────────────────
        $themen = [
            [
                'titel' => 'Neue Autorität',
                'slug' => 'neue-autoritaet',
                'einleitung' => 'Ein Erziehungskonzept, das auf Beziehung, Präsenz und gewaltfreiem Widerstand basiert.',
                'problem' => '<p>Viele Eltern und Fachpersonen stehen vor der Herausforderung, in schwierigen Situationen die Haltung zu bewahren. Machtkämpfe, Eskalationen und Hilflosigkeit prägen den Alltag.</p>',
                'loesungsansatz' => '<p>Neue Autorität nach Haim Omer bietet einen klaren Rahmen: Präsenz, Deeskalation und die Stärkung unterstützender Netzwerke.</p><h3>Kernprinzipien</h3><ul><li>Wachsame Sorge statt Kontrolle</li><li>Gewaltfreier Widerstand</li><li>Ankerfunktion und Beharrlichkeit</li><li>Netzwerk und Transparenz</li></ul>',
                'zielgruppen' => json_encode(['eltern', 'fachpersonen', 'institutionen']),
                'aktiv' => true,
            ],
            [
                'titel' => 'Systemische Beratung',
                'slug' => 'systemische-beratung',
                'einleitung' => 'Lösungsorientierte Beratung, die das ganze System in den Blick nimmt – Familie, Team, Institution.',
                'problem' => '<p>Probleme werden oft isoliert betrachtet. Dabei entstehen sie im Kontext von Beziehungen und Strukturen – und können nur dort nachhaltig gelöst werden.</p>',
                'loesungsansatz' => '<p>Systemische Beratung fokussiert auf Ressourcen und Lösungen statt auf Defizite. Sie bezieht das ganze System ein und schafft nachhaltige Veränderung.</p>',
                'zielgruppen' => json_encode(['eltern', 'fachpersonen']),
                'aktiv' => true,
            ],
            [
                'titel' => 'Deeskalation',
                'slug' => 'deeskalation',
                'einleitung' => 'Strategien und Haltungen für den Umgang mit eskalierenden Situationen im pädagogischen Alltag.',
                'problem' => '<p>Konflikte gehören zum Alltag. Ohne passende Strategien eskalieren sie schnell und belasten alle Beteiligten.</p>',
                'loesungsansatz' => '<p>Deeskalation bedeutet nicht, Konflikte zu vermeiden, sondern sie so zu gestalten, dass Beziehungen intakt bleiben und alle Beteiligten ihre Würde behalten.</p>',
                'zielgruppen' => json_encode(['eltern', 'fachpersonen', 'institutionen']),
                'aktiv' => true,
            ],
            [
                'titel' => 'Eltern-Kind-Kommunikation',
                'slug' => 'eltern-kind-kommunikation',
                'einleitung' => 'Wie Gespräche gelingen – auch wenn es schwierig wird.',
                'problem' => '<p>Gespräche mit Kindern und Jugendlichen enden oft in Streit oder Schweigen. Eltern fühlen sich hilflos und missverstanden.</p>',
                'loesungsansatz' => '<p>Gelungene Kommunikation ist die Basis jeder guten Beziehung. Hier erfahren Sie, wie Sie auch in emotionalen Momenten den Draht zu Ihrem Kind behalten.</p>',
                'zielgruppen' => json_encode(['eltern']),
                'aktiv' => true,
            ],
            [
                'titel' => 'Bündner Standard',
                'slug' => 'buendner-standard',
                'einleitung' => 'Ein schweizweit anerkanntes Schutzkonzept für Institutionen der stationären Jugendhilfe.',
                'problem' => '<p>Institutionen stehen vor der Herausforderung, Kinder und Jugendliche wirksam zu schützen und gleichzeitig einen pädagogisch sinnvollen Rahmen zu bieten.</p>',
                'loesungsansatz' => '<p>Der Bündner Standard definiert klare Qualitätsstandards für den Schutz von Kindern und Jugendlichen in stationären Einrichtungen. Er umfasst Prävention, Intervention und Nachsorge.</p>',
                'zielgruppen' => json_encode(['institutionen']),
                'aktiv' => true,
            ],
            [
                'titel' => 'Burnout-Prävention',
                'slug' => 'burnout-praevention',
                'einleitung' => 'Strategien zur Selbstfürsorge und nachhaltigen Gesundheit im pädagogischen Beruf.',
                'problem' => '<p>Pädagogische Fachpersonen tragen eine hohe emotionale Last. Ohne bewusste Selbstfürsorge droht Erschöpfung.</p>',
                'loesungsansatz' => '<p>Burnout-Prävention beginnt mit Selbstwahrnehmung und reicht bis zu strukturellen Veränderungen im Arbeitsumfeld.</p>',
                'zielgruppen' => json_encode(['fachpersonen']),
                'aktiv' => true,
            ],
        ];

        foreach ($themen as &$t) {
            $t['created_at'] = $now;
            $t['updated_at'] = $now;
        }
        DB::table('themen')->insert($themen);

        // ── Angebot ↔ Thema Pivot ────────────────────────────────
        $angebotIds = DB::table('angebote')->pluck('id', 'slug');
        $themaIds = DB::table('themen')->pluck('id', 'slug');

        $pivot = [
            ['angebot_id' => $angebotIds['online-eltern-coaching'], 'thema_id' => $themaIds['neue-autoritaet']],
            ['angebot_id' => $angebotIds['online-eltern-coaching'], 'thema_id' => $themaIds['eltern-kind-kommunikation']],
            ['angebot_id' => $angebotIds['kurs-starke-eltern'], 'thema_id' => $themaIds['neue-autoritaet']],
            ['angebot_id' => $angebotIds['kurs-starke-eltern'], 'thema_id' => $themaIds['deeskalation']],
            ['angebot_id' => $angebotIds['online-supervision'], 'thema_id' => $themaIds['systemische-beratung']],
            ['angebot_id' => $angebotIds['online-supervision'], 'thema_id' => $themaIds['burnout-praevention']],
            ['angebot_id' => $angebotIds['webinare-workshops'], 'thema_id' => $themaIds['neue-autoritaet']],
            ['angebot_id' => $angebotIds['webinare-workshops'], 'thema_id' => $themaIds['deeskalation']],
            ['angebot_id' => $angebotIds['inhouse-fortbildung'], 'thema_id' => $themaIds['neue-autoritaet']],
            ['angebot_id' => $angebotIds['inhouse-fortbildung'], 'thema_id' => $themaIds['deeskalation']],
            ['angebot_id' => $angebotIds['buendner-standard'], 'thema_id' => $themaIds['buendner-standard']],
        ];
        DB::table('angebot_thema')->insert($pivot);

        // ── Impulse ───────────────────────────────────────────────
        $impulse = [
            [
                'titel' => '5 Strategien für schwierige Alltagssituationen mit Kindern',
                'slug' => '5-strategien-schwierige-alltagssituationen',
                'kategorie' => 'erziehung',
                'autor' => 'Walter Uehli',
                'datum' => '2025-11-15',
                'intro' => 'Wenn der Morgen wieder in Streit endet: Fünf bewährte Strategien aus der Neuen Autorität für einen entspannteren Familienalltag.',
                'inhalt' => '<p>Viele Eltern kennen das: Der Morgen beginnt mit Widerstand, das Abendessen endet in Tränen. Diese fünf Strategien helfen, den Alltag zu entschärfen.</p><h3>1. Präsenz zeigen</h3><p>Seien Sie da – körperlich und emotional. Kinder brauchen die Gewissheit, dass Sie nicht aufgeben.</p><h3>2. Deeskalation statt Eskalation</h3><p>Steigen Sie nicht in den Machtkampf ein. Sagen Sie ruhig: «Ich muss darüber nachdenken.»</p><h3>3. Das Schmiedeeisen nutzen</h3><p>Sprechen Sie Dinge an, wenn alle ruhig sind – nicht im Affekt.</p><h3>4. Netzwerk aktivieren</h3><p>Sie müssen nicht alles alleine schaffen. Holen Sie Unterstützung.</p><h3>5. Wiedergutmachung ermöglichen</h3><p>Geben Sie Ihrem Kind die Chance, etwas wiedergutzumachen – und sich selbst auch.</p>',
                'key_takeaways' => json_encode(['Präsenz statt Kontrolle', 'Deeskalation durch Verzögerung', 'Netzwerk als Ressource']),
                'tags' => json_encode(['Neue Autorität', 'Erziehungstipps', 'Familienalltag']),
                'aktiv' => true,
                'featured' => true,
            ],
            [
                'titel' => 'Neue Autorität in der Sozialpädagogik – ein Praxisbericht',
                'slug' => 'neue-autoritaet-sozialpaedagogik-praxisbericht',
                'kategorie' => 'fachbeitrag',
                'autor' => 'Walter Uehli',
                'datum' => '2025-10-20',
                'intro' => 'Wie die Prinzipien der Neuen Autorität den Alltag in einem Kinder- und Jugendheim verändert haben.',
                'inhalt' => '<p>In diesem Artikel berichte ich aus meiner Erfahrung der Implementierung von Neuer Autorität in einem Deutschschweizer Kinder- und Jugendheim.</p><h3>Ausgangslage</h3><p>Das Team war erschöpft, die Eskalationen häuften sich. Der Wunsch nach einem neuen Ansatz war gross.</p><h3>Der Weg</h3><p>Über 12 Monate haben wir schrittweise die Prinzipien eingeführt: erst im Team, dann mit den Jugendlichen, schliesslich mit den Familien.</p><h3>Ergebnisse</h3><p>Weniger Eskalationen, stabilere Teamdynamik, bessere Zusammenarbeit mit Familien. Der Prozess braucht Zeit – aber er lohnt sich.</p>',
                'key_takeaways' => json_encode(['Implementierung braucht Geduld', 'Teamstärkung als Fundament', 'Messbare Verbesserung nach 6 Monaten']),
                'tags' => json_encode(['Neue Autorität', 'Sozialpädagogik', 'Praxisbericht', 'Institution']),
                'aktiv' => true,
                'featured' => false,
            ],
            [
                'titel' => 'Was tun, wenn mein Kind nicht hört?',
                'slug' => 'was-tun-wenn-kind-nicht-hoert',
                'kategorie' => 'erziehung',
                'autor' => 'Walter Uehli',
                'datum' => '2025-09-05',
                'intro' => 'Die häufigste Frage in der Elternberatung – und warum die Antwort anders ist, als Sie denken.',
                'inhalt' => '<p>«Mein Kind hört einfach nicht» – diesen Satz höre ich fast täglich. Aber was steckt eigentlich dahinter?</p><h3>Hören vs. Gehorchen</h3><p>Kinder hören meistens sehr gut. Sie gehorchen nur nicht immer. Und das ist ein wichtiger Unterschied.</p><h3>Beziehung vor Gehorsam</h3><p>Neue Autorität setzt auf Beziehung statt auf Durchsetzung. Das bedeutet nicht Nachgeben – sondern Dranbleiben.</p><h3>Drei Schritte</h3><p>1. Überprüfen Sie Ihre Erwartungen. 2. Klären Sie die Beziehung. 3. Zeigen Sie Präsenz.</p>',
                'key_takeaways' => json_encode(['Hören ≠ Gehorchen', 'Beziehung geht vor Gehorsam', 'Präsenz zeigen statt Druck machen']),
                'tags' => json_encode(['Eltern', 'Erziehung', 'Neue Autorität']),
                'aktiv' => true,
                'featured' => false,
            ],
        ];

        foreach ($impulse as &$imp) {
            $imp['created_at'] = $now;
            $imp['updated_at'] = $now;
        }
        DB::table('impulse')->insert($impulse);

        // ── Referenzen ────────────────────────────────────────────
        $referenzen = [
            [
                'name' => 'Sarah M.',
                'organisation' => 'Mutter von 3 Kindern',
                'zitat' => 'Endlich fühle ich mich sicher in schwierigen Situationen. Die Beratung hat unsere ganze Familie verändert.',
                'zielgruppe' => 'eltern',
                'aktiv' => true,
                'sortierung' => 1,
            ],
            [
                'name' => 'Thomas K.',
                'organisation' => 'Sozialpädagoge',
                'zitat' => 'Die Supervision mit Walter hat mir neue Perspektiven eröffnet und meine Arbeit mit den Jugendlichen deutlich verbessert.',
                'zielgruppe' => 'fachpersonen',
                'aktiv' => true,
                'sortierung' => 2,
            ],
            [
                'name' => 'Andrea B.',
                'organisation' => 'Leiterin Kinder- und Jugendheim',
                'zitat' => 'Die Zusammenarbeit mit Walter hat unser Team nachhaltig gestärkt. Die Methoden sind praxisnah und sofort umsetzbar.',
                'zielgruppe' => 'institutionen',
                'aktiv' => true,
                'sortierung' => 3,
            ],
            [
                'name' => 'Michael R.',
                'organisation' => 'Vater von 2 Teenagern',
                'zitat' => 'Ich hätte nie gedacht, dass ein Online-Kurs so viel verändern kann. Die Tools aus der Neuen Autorität helfen uns jeden Tag.',
                'zielgruppe' => 'eltern',
                'aktiv' => true,
                'sortierung' => 4,
            ],
            [
                'name' => 'Dr. Claudia W.',
                'organisation' => 'Schulpsychologischer Dienst GR',
                'zitat' => 'Walters Webinare sind inhaltlich fundiert und methodisch hervorragend aufgebaut. Absolute Empfehlung.',
                'zielgruppe' => 'fachpersonen',
                'aktiv' => true,
                'sortierung' => 5,
            ],
        ];

        foreach ($referenzen as &$r) {
            $r['created_at'] = $now;
            $r['updated_at'] = $now;
        }
        DB::table('referenzen')->insert($referenzen);

        // ── Downloads ─────────────────────────────────────────────
        $downloads = [
            [
                'titel' => 'Checkliste: Deeskalation zu Hause',
                'beschreibung' => 'Ein kompaktes A4-PDF mit den 5 wichtigsten Deeskalationsstrategien für den Familienalltag.',
                'datei' => 'downloads/checkliste-deeskalation.pdf',
                'zielgruppe' => 'eltern',
                'kategorie' => 'checkliste',
                'aktiv' => true,
            ],
            [
                'titel' => 'Arbeitsblatt: Ankerfunktion stärken',
                'beschreibung' => 'Selbstreflexion in 10 Fragen – für Eltern, die ihre Ankerfunktion ausbauen möchten.',
                'datei' => 'downloads/arbeitsblatt-ankerfunktion.pdf',
                'zielgruppe' => 'eltern',
                'kategorie' => 'arbeitsblatt',
                'aktiv' => true,
            ],
            [
                'titel' => 'Leitfaden: Supervision vorbereiten',
                'beschreibung' => 'Tipps zur optimalen Vorbereitung auf Einzel- und Gruppensupervision.',
                'datei' => 'downloads/leitfaden-supervision.pdf',
                'zielgruppe' => 'fachpersonen',
                'kategorie' => 'leitfaden',
                'aktiv' => true,
            ],
            [
                'titel' => 'Factsheet: Bündner Standard',
                'beschreibung' => 'Kompaktübersicht über die Kernelemente des Bündner Standards.',
                'datei' => 'downloads/factsheet-buendner-standard.pdf',
                'zielgruppe' => 'institutionen',
                'kategorie' => 'factsheet',
                'aktiv' => true,
            ],
        ];

        foreach ($downloads as &$d) {
            $d['created_at'] = $now;
            $d['updated_at'] = $now;
        }
        DB::table('downloads')->insert($downloads);

        // ── FAQs ──────────────────────────────────────────────────
        $faqs = [
            ['frage' => 'Was kostet ein Erstgespräch?', 'antwort' => 'Das erste Kennenlern-Gespräch (15 Minuten) ist kostenlos und unverbindlich. So können wir gemeinsam klären, ob und wie ich Sie unterstützen kann.', 'zielgruppe' => 'alle', 'sortierung' => 1],
            ['frage' => 'Wie funktioniert die Online-Beratung?', 'antwort' => 'Wir treffen uns per Zoom-Videokonferenz. Sie brauchen lediglich eine stabile Internetverbindung und einen ruhigen Ort. Den Einladungslink erhalten Sie per E-Mail.', 'zielgruppe' => 'alle', 'sortierung' => 2],
            ['frage' => 'Wie lange dauert eine Beratung?', 'antwort' => 'Eine reguläre Beratungssitzung dauert 60 Minuten. Die Anzahl der Sitzungen richtet sich nach Ihrem Anliegen – viele Eltern spüren bereits nach 2-3 Sitzungen deutliche Veränderungen.', 'zielgruppe' => 'eltern', 'sortierung' => 3],
            ['frage' => 'Bieten Sie auch Gruppensupervision an?', 'antwort' => 'Ja, Supervision ist als Einzel- oder Gruppenformat möglich. Gruppen bestehen aus 3-6 Fachpersonen und treffen sich in der Regel monatlich.', 'zielgruppe' => 'fachpersonen', 'sortierung' => 4],
            ['frage' => 'Können Inhouse-Fortbildungen auch online stattfinden?', 'antwort' => 'Ja, alle Inhouse-Angebote sind sowohl vor Ort als auch online oder hybrid durchführbar. Das Format stimmen wir auf Ihre Bedürfnisse ab.', 'zielgruppe' => 'institutionen', 'sortierung' => 5],
            ['frage' => 'Was ist Neue Autorität?', 'antwort' => 'Neue Autorität ist ein von Haim Omer entwickeltes Konzept, das auf Beziehung, Präsenz und gewaltfreiem Widerstand basiert. Es bietet einen klaren Rahmen für Eltern, Fachpersonen und Institutionen.', 'zielgruppe' => 'alle', 'sortierung' => 6],
            ['frage' => 'Arbeiten Sie mit Krankenkassen zusammen?', 'antwort' => 'Meine Beratungsangebote werden nicht über die Grundversicherung abgerechnet. Einige Zusatzversicherungen übernehmen jedoch einen Teil der Kosten – bitte erkundigen Sie sich bei Ihrer Kasse.', 'zielgruppe' => 'alle', 'sortierung' => 7],
            ['frage' => 'Wie wird eine Inhouse-Fortbildung geplant?', 'antwort' => 'In einem Vorgespräch klären wir Ihre Ausgangslage und Ziele. Darauf basierend erstelle ich ein massgeschneidertes Konzept. Die Durchführung dauert in der Regel 1-3 Tage, gefolgt von einem Follow-up.', 'zielgruppe' => 'institutionen', 'sortierung' => 8],
        ];

        foreach ($faqs as &$f) {
            $f['aktiv'] = true;
            $f['created_at'] = $now;
            $f['updated_at'] = $now;
        }
        DB::table('faqs')->insert($faqs);
    }
}
