<?php

namespace GrassFeria\StarterkidFrontend\Livewire\Front;


use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Route;
use GrassFeria\Starterkid\Traits\LivewireIndexTrait;



class ShowImage extends Component
{

    public $imgSrc;
    public $imgAlt;
    public $imageCredits;
    
    
    public function render()
    {
      
      
      return view('starterkid-frontend::livewire.front.show-image');

        
    }

    public function placeholder()
    {
        return view('starterkid-frontend::livewire.front.placeholder');
    }
}
