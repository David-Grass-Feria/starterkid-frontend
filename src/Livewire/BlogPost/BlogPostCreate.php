<?php

namespace GrassFeria\StarterkidFrontend\Livewire\BlogPost;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;


class BlogPostCreate extends Component
{
    use WithFileUploads;

    public $blogpost;
    public $name;
    public $title;
    public $content;
    public $published;
    public $status = false;
    public $slug;
    public $preview;
    public $author;
    public $public_images = [];
    
    



    public function mount($recordId = null)
    {
        
        $this->authorize('create',\GrassFeria\StarterkidFrontend\Models\BlogPost::class);
        $this->published                              = now()->format(config('starterkid.time_format.date_time_format_for_picker'));
        $this->author                                 = auth()->user()->name;
        
    }

    public function updated($name)
    {
        $this->slug = Str::slug($this->name);
        $this->title = ucfirst($this->name);
    }

    public function save()
    {


        $validated = $this->validate([
            'name'                      => 'required|string',
            'slug'                      => 'required|string',
            'title'                     => 'required|string',
            'content'                   => 'required|string',
            'preview'                   => 'nullable|string',
            'published'                 => 'required|date_format:' . config('starterkid.time_format.date_time_format_for_picker'),
            'status'                    => 'required|boolean',
            'author'                    => 'required|string',
           
        ]);
        
        
        $this->authorize('create',\GrassFeria\StarterkidFrontend\Models\BlogPost::class);
        $validated = array_merge($validated, ['user_id' => auth()->user()->id]);
        $this->blogpost = \GrassFeria\StarterkidFrontend\Models\BlogPost::create($validated);
        
        if ($this->public_images !== []) {
        \GrassFeria\Starterkid\Jobs\SpatieMediaLibary\DeleteMediaCollection::dispatch($this->blogpost,'images');
        (new \GrassFeria\Starterkid\Services\SpatieMediaLibary\SaveMediaWithFilenameService($this->public_images,$this->blogpost,'images','public',$this->title));
        
        }
        
        (new \GrassFeria\Starterkid\Services\CheckCkEditorContent($this->blogpost->content,'content'))->checkForCkEditorImages($this->blogpost,'ckimages','ckimage');
        return redirect()->route('blogposts.index')->with('success', __('BlogPost created'));

    }
    public function render()
    {
        
        $authors = \App\Models\User::query()->select('id','name','role')->where('role','editor')->orWhere('role','admin')->orWhere('role',config('starterkid.global_admin'))->get();
        return view('starterkid-frontend::livewire.blog-post.blog-post-create',['authors' => $authors]);
        
    }
}
