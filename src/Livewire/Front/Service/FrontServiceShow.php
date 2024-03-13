<?php

namespace GrassFeria\StarterkidFrontend\Livewire\Front\Service;


use Livewire\Component;
use Livewire\Attributes\Layout;



class FrontServiceShow extends Component
{

   public $service; 
   
   public function mount($slug)
   {
      $this->service = \GrassFeria\StarterkidFrontend\Models\Service::where('slug',$slug)->firstOrFail();
   }
  
  
    #[Layout('starterkid-frontend::components.layouts.front')] 
    public function render()
    {
     
      $services = \GrassFeria\StarterkidFrontend\Models\Service::frontGetServicesWhereStatusIsOnline()->get();
      return view('starterkid-frontend::livewire.front.service.front-service-show',['services' => $services]);

        
    }
}
