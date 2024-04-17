<?php

namespace GrassFeria\StarterkidFrontend\Services\Scrape;

use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class FunkeGroup

{
    public function getNewsFromNewsPaper(string $newsPaperUrl, string $cityName, string $newsPaperName, string $newsPaperDomain)
    {
        $response = Http::get($newsPaperUrl);
        $html = $response->body();
        $crawler = new Crawler($html);

        $news = [];

        $crawler->filter('ul')->each(function (Crawler $ul) use (&$news,$cityName,$newsPaperName,$newsPaperDomain) {
            $ul->filter('li')->each(function (Crawler $li) use (&$news,$cityName,$newsPaperName,$newsPaperDomain) {
                $titleNode = $li->filter('strong');
                $title = $titleNode->count() ? $titleNode->text() : 'Titel nicht gefunden';

                $descriptionNode = $li->filter('p');
                $description = $descriptionNode->count() ? $descriptionNode->text() : 'Beschreibung nicht gefunden';

                $cityNode = $li->filter('p > span');
                $city = $cityNode->count() ? $cityNode->text() : 'Stadt nicht gefunden';

                $linkNode = $li->filter('a');
                $link = $linkNode->count() ? $linkNode->attr('href') : 'Link nicht gefunden';

                $thumbNode = $li->filter('picture source');
                $thumb = $thumbNode->count() ? explode(' ', $thumbNode->attr('srcset'))[0] : 'Bild nicht gefunden';

                if (strpos(strtolower($city), $cityName) !== false) {
                    $news[] = [
                        'title' => $title,
                        'description' => $description,
                        'city' => $city,
                        'link' => $newsPaperDomain.$link,
                        'thumb' => $thumb,
                        'vendor' => $newsPaperName,
                    ];
                }
            });
        });

        $news = array_slice($news, 0, 9);

        // find dates and save to the array item

        foreach ($news as $key => $item) {
            $response = Http::get($item['link']);
            $pageHtml = $response->body();
            $pageCrawler = new Crawler($pageHtml);
        
            $dateTimeNode = $pageCrawler->filter('time');
            $dateTime = $dateTimeNode->count() ? $dateTimeNode->attr('datetime') : 'Datum nicht gefunden';
        
            // Füge das gefundene Datum zum News-Array hinzu
            $news[$key]['date'] = $dateTime;
        
            // Erstelle eine menschenlesbare Version des Datums
            if ($dateTime !== 'Datum nicht gefunden') {
                $date = new \Carbon\Carbon($dateTime);
                $news[$key]['date_for_humans'] = $date->diffForHumans(['short' => true]);
            } else {
                $news[$key]['date_for_humans'] = 'Zeitangabe nicht verfügbar';
            }
        }

        return $news;
    }
}