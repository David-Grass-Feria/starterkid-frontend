<?php

namespace GrassFeria\StarterkidFrontend\Livewire\Service;

use Livewire\Component;
use Livewire\WithFileUploads;


class ServiceCreate extends Component
{
    use WithFileUploads;

    public $service;
    public $name;
    public $title;
    public $preview;
    public $content;
    public $published;
    public $author;
    public $online;
    public $slug;
   
    
    



    public function mount($recordId = null)
    {
        
        $this->authorize('create',\GrassFeria\StarterkidFrontend\Models\Service::class);
        //$this->date                                 = now()->format(config('starterkid.time_format.date_format_for_picker'));
        $this->published                              = now()->format(config('starterkid.time_format.date_time_format_for_picker'));
        //$this->time                                 = now()->format(config('starterkid.time_format.time_format_for_picker'));
        
    }

    public function save()
    {


        $validated = $this->validate([
            'name'                      => 'required|string',
            'slug'                      => 'required|string',
            'title'                     => 'required|string',
            'preview'                   => 'required|string',
            'content'                   => 'required|string',
            'published'                 => 'required|date_format:' . config('starterkid.time_format.date_time_format_for_picker'),
            'author'                    => 'required|string',
            'online'                    => 'required|boolean',
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
        
        
        $this->authorize('create',\GrassFeria\StarterkidFrontend\Models\Service::class);
        $validated = array_merge($validated, ['user_id' => $this->author]);
        $this->service = \GrassFeria\StarterkidFrontend\Models\Service::create($validated);
        
        //if ($this->public_photos !== []) {
        //\GrassFeria\Starterkid\Jobs\SpatieMediaLibary\DeleteMediaCollection::dispatch($this->service,'avatars');
        //(new \GrassFeria\Starterkid\Services\SpatieMediaLibary\SaveMediaWithFilenameService($this->public_photos,$this->service,'photos','public','my-new-filename'));
        //(new \GrassFeria\Starterkid\Services\SpatieMediaLibary\SaveMediaService($this->public_photos, $this->service, 'photos', 'public'));
        //}
        
        return redirect()->route('services.index')->with('success', __('Service created'));

    }
    public function render()
    {
        
        $authors = \App\Models\User::query()->select('id','name','role')->where('role','editor')->orWhere('role','admin')->get();
        return view('starterkid-frontend::livewire.service.service-create',['authors' => $authors]);
        
    }
}
