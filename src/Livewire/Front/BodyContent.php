<?php

namespace GrassFeria\StarterkidFrontend\Livewire\Front;


use Livewire\Component;
use Livewire\Attributes\Layout;



class BodyContent extends Component
{

    public $heading;
    public $content;
    
    #[Layout('starterkid-frontend::components.layouts.front')] 
    public function render()
    {
      
      return view('starterkid-frontend::livewire.front.body-content');

        
    }
}
