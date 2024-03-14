<?php

namespace GrassFeria\StarterkidFrontend\Livewire\Front\Service;


use Livewire\Component;
use Livewire\Attributes\Layout;
use GrassFeria\Starterkid\Traits\LivewireIndexTrait;



class FrontServiceIndex extends Component
{

   
   use LivewireIndexTrait;
  
  
    #[Layout('starterkid-frontend::components.layouts.front')]
    public function render()
    {
     
      $services = \GrassFeria\StarterkidFrontend\Models\Service::frontGetServicesWhereStatusIsOnline($this->search,$this->orderBy, $this->sort)->get();
      return view('starterkid-frontend::livewire.front.service.front-service-index',['services' => $services]);

        
    }
}
