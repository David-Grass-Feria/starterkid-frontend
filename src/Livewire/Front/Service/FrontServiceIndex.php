<?php

namespace GrassFeria\StarterkidFrontend\Livewire\Front\Service;


use Livewire\Component;
use Livewire\Attributes\Layout;



class FrontServiceIndex extends Component
{

   
   
  
  
    #[Layout('starterkid-frontend::components.layouts.front')] 
    public function render()
    {
     
      $services = \GrassFeria\StarterkidFrontend\Models\Service::frontGetServicesWhereStatusIsOnline()->get();
      return view('starterkid-frontend::livewire.front.service.front-service-index',['services' => $services]);

        
    }
}
