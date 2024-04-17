<?php

namespace GrassFeria\StarterkidFrontend\Jobs\Scrape;

use ZipArchive;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class FunkeGroupJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

   
    public $newsPaperUrl;
    public $cityName;
    public $newsPaperName;
    
    public function __construct(string $newsPaperUrl, string $cityName, string $newsPaperName)
    {
        $this->newsPaperUrl = $newsPaperUrl;
        $this->cityName     = $cityName;
        $this->newsPaperName = $newsPaperName;
    }

    public function handle()
    {
        
         // Lösche den vorhandenen Cache, wenn das Command erneut ausgeführt wird
         \Illuminate\Support\Facades\Cache::forget('otz-news');
         $cacheKeyMonitor = \GrassFeria\StarterkidFrontend\Services\GetCacheKey::ForUrl(route('front.monitor'));
         \Illuminate\Support\Facades\Cache::forget($cacheKeyMonitor);
        
        
        
        $cityName = $this->cityName;
        $newsPaperName = $this->newsPaperName;
        
        
        $response = Http::get($this->newsPaperUrl);
        $html = $response->body();
        $crawler = new Crawler($html);

        $news = [];

        $crawler->filter('ul')->each(function (Crawler $ul) use (&$news,$cityName,$newsPaperName) {
            $ul->filter('li')->each(function (Crawler $li) use (&$news,$cityName,$newsPaperName) {
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
                        'link' => 'https://otz.de'.$link,
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

         // Speichere das Ergebnis im Cache
         \Illuminate\Support\Facades\Cache::forever('otz-news', ['last_update' => now()->format(config('starterkid.time_format.date_time_format')),'news' => $news]);
         \GrassFeria\StarterkidFrontend\Jobs\PreloadCacheJob::dispatch(route('front.monitor'));
         
         
    }
}
