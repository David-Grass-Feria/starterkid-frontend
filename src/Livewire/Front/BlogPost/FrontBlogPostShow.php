<?php

namespace GrassFeria\StarterkidFrontend\Livewire\Front\BlogPost;


use Livewire\Component;
use Livewire\Attributes\Layout;



class FrontBlogPostShow extends Component
{

   public $service;
   public $blogpost; 
   
   public function mount($slug)
   {
      $this->blogpost = \GrassFeria\StarterkidFrontend\Models\BlogPost::where('slug',$slug)->firstOrFail();
   }
  
  
    #[Layout('starterkid-frontend::components.layouts.front')] 
    public function render()
    {
     
      $services = \GrassFeria\StarterkidFrontend\Models\Service::frontGetServicesWhereStatusIsOnline()->get();
      return view('starterkid-frontend::livewire.front.blog-post.front-blog-post-show',['services' => $services]);

        
    }
}
