<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogPost::create([
            'slug' => 'erziehungsstile-vergleich',
            'title' => 'Die verschiedenen Erziehungsstile: Welcher passt zu dir und deinem Kind?',
            'excerpt' => 'Autoritär, antiautoritär oder doch bedürfnisorientiert? Ein Überblick über die gängigsten Stile und warum Beziehung wichtiger ist als Methode.',
            'content' => "## Einleitung

In der Erziehung gibt es viele Wege – aber nicht alle führen zum gleichen Ziel. Die Wahl des Erziehungsstils prägt nicht nur die Kindheit, sondern auch die spätere Beziehung zu deinem Kind.

## Die vier klassischen Erziehungsstile

### 1. Autoritärer Erziehungsstil
Strenge Regeln, wenig Spielraum. Kinder gehorchen aus Angst, nicht aus Verständnis.

### 2. Permissiver (Laissez-faire) Erziehungsstil
Maximale Freiheit, minimale Grenzen. Kinder entscheiden selbst – auch wenn sie überfordert sind.

### 3. Vernachlässigender Erziehungsstil
Wenig Interesse, wenig Engagement. Kinder fühlen sich unsichtbar.

### 4. Autoritativer Erziehungsstil
Klare Regeln mit Erklärungen. Wärme und Grenzen in Balance. Kinder verstehen das \"Warum\".

## Warum Beziehung wichtiger ist als Methode

Die Neue Autorität geht einen Schritt weiter: Es geht nicht um Kontrolle, sondern um **Präsenz**. Wenn Eltern präsent sind, braucht es keine Machtkämpfe.

> \"Wenn Verhalten auffällt, braucht es Beziehung – nicht Strafe.\"

## Fazit

Der beste Erziehungsstil ist der, der die Beziehung zu deinem Kind stärkt. Sei präsent, sei verlässlich, sei authentisch.",
            'category_id' => BlogCategory::where('name', 'Erziehungswissen')->first()?->id,
            'author' => 'B&U BundU - Walter Uehli',
            'cover_image' => '/blog-erziehung.png',
            'status' => 'published',
            'published_at' => '2025-08-29 10:00:00',
        ]);

        BlogPost::create([
            'slug' => 'neue-autoritaet-wichtigkeit',
            'title' => 'Warum Neue Autorität heute wichtiger denn je ist',
            'excerpt' => 'In einer Welt voller Veränderungen suchen Eltern nach Halt. Erfahre, warum Präsenz statt Macht der Schlüssel zu einem harmonischen Familienleben ist.',
            'content' => "## Die Herausforderungen moderner Elternschaft

Die Welt hat sich verändert. Kinder wachsen heute in einer Umgebung auf, die von digitalen Medien, ständiger Erreichbarkeit und gesellschaftlichem Wandel geprägt ist.

## Was ist Neue Autorität?

Neue Autorität ist ein Konzept von Haim Omer, das auf **Präsenz** statt auf **Macht** setzt. Es geht darum, als Eltern sichtbar, verlässlich und beharrlich zu sein – ohne Gewalt und ohne Strafen.

### Die sieben Säulen der Neuen Autorität

1. **Präsenz zeigen** – Ich bin da, ich bleibe da
2. **Selbstkontrolle** – Ich handle, nicht reagiere
3. **Unterstützungsnetzwerk** – Ich bin nicht allein
4. **Gewaltloser Widerstand** – Ich setze Grenzen ohne Gewalt
5. **Versöhnungsgesten** – Beziehung vor Erziehung
6. **Transparenz** – Ich sage, was ich tue
7. **Aufschub** – Ich entscheide, wenn ich bereit bin

## Warum jetzt?

In einer Zeit, in der viele Kinder unter Druck stehen und Eltern sich verunsichert fühlen, bietet die Neue Autorität einen Weg, der auf **Beziehung** statt auf Kontrolle setzt.

## Fazit

Neue Autorität ist keine Methode – es ist eine Haltung. Eine Haltung, die Familien stärkt und Kindern Sicherheit gibt.",
            'category_id' => BlogCategory::where('name', 'Neue Autorität')->first()?->id,
            'author' => 'B&U BundU - Walter Uehli',
            'cover_image' => '/blog-neue-autoritaet.png',
            'status' => 'published',
            'published_at' => '2024-11-15 10:00:00',
        ]);

        BlogPost::create([
            'slug' => 'netzwerke-bilden',
            'title' => 'Netzwerke bilden: Du bist nicht allein',
            'excerpt' => 'Das afrikanische Sprichwort \"Es braucht ein Dorf\" ist keine Floskel. So baust du dir dein persönliches Unterstützungsnetzwerk auf.',
            'content' => "## Gemeinsam stark

\"Es braucht ein Dorf, um ein Kind zu erziehen\" – dieses afrikanische Sprichwort enthält eine tiefe Wahrheit. Keine Eltern können allein alle Bedürfnisse eines Kindes erfüllen.

## Warum Netzwerke so wichtig sind

In der Neuen Autorität spielt das **Unterstützungsnetzwerk** eine zentrale Rolle. Es geht darum, Menschen um sich zu haben, die:

- Dich in schwierigen Momenten unterstützen
- Dein Kind mit anderen Augen sehen
- Dir Rückhalt geben

## So baust du dein Netzwerk auf

### 1. Familie einbeziehen
Großeltern, Tanten, Onkel – sie können wertvolle Verbündete sein.

### 2. Freunde und Nachbarn
Wer in deinem Umfeld könnte Teil deines Netzwerks werden?

### 3. Professionelle Hilfe
Lehrer, Therapeuten, Berater – scheue dich nicht, Unterstützung zu suchen.

## Praktische Tipps

- **Transparenz**: Erzähle offen von deinen Herausforderungen
- **Regelmäßigkeit**: Halte den Kontakt aufrecht
- **Gegenseitigkeit**: Biete auch selbst Unterstützung an

## Fazit

Du musst nicht alles allein schaffen. Ein starkes Netzwerk macht dich als Elternteil stärker – und gibt deinem Kind mehr Sicherheit.",
            'category_id' => BlogCategory::where('name', 'Systemik')->first()?->id,
            'author' => 'B&U BundU - Walter Uehli',
            'cover_image' => '/blog-netzwerk.png',
            'status' => 'published',
            'published_at' => '2024-12-01 10:00:00',
        ]);
    }
}
