<?php

namespace GrassFeria\StarterkidFrontend\Livewire\BlogPost;

use Livewire\Component;
use Livewire\WithFileUploads;


class BlogPostEdit extends Component
{
    use WithFileUploads;

    public $blogpost;
    
    



    public function mount($recordId = null)
    {
        
       
        $this->blogpost       = \GrassFeria\StarterkidFrontend\Models\BlogPost::find($recordId);
      
        $this->authorize('update',[\GrassFeria\StarterkidFrontend\Models\BlogPost::class,$this->blogpost]);
        //$this->date                                 = $this->blogpost->date->format(config('starterkid.time_format.date_format_for_picker'));
        //$this->date_time                            = $this->blogpost->date_time->format(config('starterkid.time_format.date_time_format_for_picker'));
        //$this->time                                 = $this->blogpost->time->format(config('starterkid.time_format.time_format_for_picker'));
            
       
    }

    public function save()
    {


        $validated = $this->validate([
            //'title'                     => 'required|string',
            //'color'                     => 'required|string',
            //'range'                     => 'required|string',
            //'about'                     => 'required|string',
            //'country'                   => 'required|string',
            //'active'                    => 'required|boolean',
            //'radio'                     => 'required|string',
            //'date'                      => 'required|date_format:' . config('starterkid.time_format.date_format_for_picker'),
            //'date_time'                 => 'required|date_format:' . config('starterkid.time_format.date_time_format_for_picker'),
            //'time'                      => 'required|date_format:' . config('starterkid.time_format.time_format_for_picker'),
            //'body'                      => 'required|string',
            //'youtube_video_link'        => 'required|string',
            //'vimeo_video_link'          => 'required|string',
           
        ]);
        
       
        $this->authorize('update',[\GrassFeria\StarterkidFrontend\Models\BlogPost::class,$this->blogpost]);
        $validated = array_merge($validated, ['user_id' => auth()->user()->id]);
        $this->blogpost->update($validated);
       

        //if ($this->public_photos !== []) {
        //\GrassFeria\Starterkid\Jobs\SpatieMediaLibary\DeleteMediaCollection::dispatch($this->blogpost,'avatars');
        //(new \GrassFeria\Starterkid\Services\SpatieMediaLibary\SaveMediaWithFilenameService($this->public_photos,$this->blogpost,'photos','public','my-new-filename'));
        //(new \GrassFeria\Starterkid\Services\SpatieMediaLibary\SaveMediaService($this->public_photos, $this->blogpost, 'photos', 'public'));
        //}
        
        //(new \GrassFeria\Starterkid\Services\CheckCkEditorContent($this->blogpost->body,'body'))->checkForCkEditorImages($this->blogpost,'images','public');
        return redirect()->route('blogposts.index')->with('success', __('BlogPost updated'));

    }
    public function render()
    {
        
        return view('starterkid-frontend::livewire.blog-post.blog-post-edit');
        
    }
}
