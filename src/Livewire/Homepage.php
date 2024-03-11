<?php

namespace GrassFeria\StarterkidFrontend\Livewire;


use Livewire\Component;
use Livewire\Attributes\Layout;



class Homepage extends Component
{

    
    #[Layout('starterkid-frontend::components.layouts.front')] 
    public function render()
    {

      return view('starterkid-frontend::livewire.homepage');

        
    }
}
