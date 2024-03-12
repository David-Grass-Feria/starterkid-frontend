<?php

namespace GrassFeria\StarterkidFrontend\Livewire\Front;


use Livewire\Component;
use Livewire\Attributes\Layout;



class Homepage extends Component
{

    
    #[Layout('starterkid-frontend::components.layouts.front')] 
    public function render()
    {
      $services = \GrassFeria\StarterkidFrontend\Models\Service::frontGetServicesWhereStatusIsOnline()->get();
      return view('starterkid-frontend::livewire.front.homepage',['services' => $services]);

        
    }
}
