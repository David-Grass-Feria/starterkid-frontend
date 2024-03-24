<?php

namespace GrassFeria\StarterkidFrontend\Livewire\Front;


use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Route;
use GrassFeria\Starterkid\Traits\LivewireIndexTrait;



class SitemapPage extends Component
{


    
    #[Layout('starterkid-frontend::components.layouts.front')] 
    public function render()
    {
      
      $services = \GrassFeria\StarterkidService\Models\Service::frontGetServicesWhereStatusIsOnline()->get();
      return view('starterkid-frontend::livewire.front.sitemap-page',['services' => $services]);

        
    }
}
