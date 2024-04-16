<?php

namespace GrassFeria\StarterkidFrontend\Services\Scrape;

use DateTime;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class RegioActiveEvents

{
    

    public function getEventsForCity(string $city, string $postalCode)
    {
        $response = Http::get('https://www.regioactive.de/suchen?term='.$city);
        $html = $response->body();

        $crawler = new Crawler($html);
        $events = [];

        // Suche nach dem <script> Tag mit dem Typ application/ld+json, das Schema.org-Daten enthält
        $crawler->filter('script[type="application/ld+json"]')->each(function (Crawler $node) use (&$events,$postalCode) {
            $data = $node->text();
            $json = json_decode($data, true);

            // Überprüfen, ob es sich um das richtige Schema.org-Format handelt
            if (isset($json['@type']) && $json['@type'] == 'Event') {
                $postalcode = $json['location']['address']['postalCode'] ?? 'N/A';

                // Nur Events hinzufügen, deren postalcode gleich "07318" ist
                if ($postalcode === $postalCode) {
                    $date = $json['startDate'] ?? null;
                    $dateObject = $date ? new DateTime($date) : null;
                    $month = $dateObject ? strtoupper($dateObject->format('M')) : 'N/A';
                    $day = $dateObject ? $dateObject->format('d') : 'N/A';

                    $events[] = [
                        'title' => $json['name'] ?? 'N/A',
                        'date' => $date,
                        'postalcode' => $postalcode,
                        'city' => $json['location']['address']['addressLocality'] ?? 'N/A',
                        'address' => $json['location']['address']['streetAddress'] ?? 'N/A',
                        'description' => $json['description'] ?? 'N/A',
                        'thumb' => $json['image'] ?? 'N/A',
                        'link' => $json['url'] ?? 'N/A',
                        'eventType' => $json['@type'],
                        'month' => $month,
                        'day' => $day
                    ];
                }
            }
        });

       return $events;
    }
}
