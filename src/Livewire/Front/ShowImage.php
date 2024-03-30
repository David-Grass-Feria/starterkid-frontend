<?php

namespace GrassFeria\StarterkidFrontend\Livewire\Front;


use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Route;
use GrassFeria\Starterkid\Traits\LivewireIndexTrait;



class ShowImage extends Component
{
    public $blogpost;
    public $width;
    public $height;
    public $imgSrc;
    public $imgAlt;
    public $imageCredits;
    public $class;
    public $href;
    public $hrefTitle;
    public $dateTime;
    public $author;
    public $heading;
    public $preview;
    
    
    public function render()
    {
      
      
      return view('starterkid-frontend::livewire.front.show-image');

        
    }

    public function placeholder()
    {
        return view('starterkid-frontend::livewire.front.placeholder');
    }
}
