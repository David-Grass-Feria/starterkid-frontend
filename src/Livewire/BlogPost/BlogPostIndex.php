<?php

namespace GrassFeria\StarterkidFrontend\Livewire\BlogPost;


use Livewire\Component;
use GrassFeria\Starterkid\Traits\LivewireIndexTrait;


class BlogPostIndex extends Component
{

    use LivewireIndexTrait;


    public function mount()
    {
        $this->authorize('viewAny',\GrassFeria\StarterkidFrontend\Models\BlogPost::class);
    }

    public function destroyRecords()
    {
        
        foreach ($this->selected as $recordId) {
            $findRecord = \GrassFeria\StarterkidFrontend\Models\BlogPost::find($recordId);
            $this->authorize('delete',[\GrassFeria\StarterkidFrontend\Models\BlogPost::class,$findRecord]);
            //\GrassFeria\Starterkid\Jobs\SpatieMediaLibary\DeleteMediaCollection::dispatch($findRecord,'photos');
            $findRecord->delete();

        }

        $this->selected = [];


    }


    public function render()
    {

      
        $blogposts = \GrassFeria\StarterkidFrontend\Models\BlogPost::query()
        ->with('media')
        ->select('id','user_id')
        ->ofUser(auth()->user()->id)
        //->where(function($query) {
        //$query->where('id','like','%'.$this->search.'%')
        //    ->orWhere('title','like','%'.$this->search.'%');
        //    
        //})
        ->orderBy($this->orderBy, $this->sort)
        ->paginate($this->perPage);

        return view('starterkid-frontend::livewire.blog-post.blog-post-index',['blogposts' => $blogposts]);

        
    }
}
