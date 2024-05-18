<?php

namespace GrassFeria\StarterkidFrontend\Jobs;

use ZipArchive;
use Livewire\Livewire;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class PreloadCacheJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

   
    public $url;
    
    public function __construct($url)
    {
        $this->url = $url;
    }

    public function handle()
    {
        // Versuche, die URL zu erreichen, um den Cache neu zu erstellen
        Http::timeout(30)->get($this->url);
        Livewire::test('FrontStateShow')
                ->call('render');
    }
}
