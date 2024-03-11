<?php

namespace GrassFeria\StarterkidFrontend\Livewire\Service;

use Livewire\Component;
use Livewire\WithFileUploads;


class ServiceEdit extends Component
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
    
    



    public function mount($recordId = null)
    {
        
       
        $this->service       = \GrassFeria\StarterkidFrontend\Models\Service::find($recordId);
      
        $this->authorize('update',[\GrassFeria\StarterkidFrontend\Models\Service::class,$this->service]);
        //$this->date                                 = $this->service->date->format(config('starterkid.time_format.date_format_for_picker'));
        //$this->date_time                            = $this->service->date_time->format(config('starterkid.time_format.date_time_format_for_picker'));
        //$this->time                                 = $this->service->time->format(config('starterkid.time_format.time_format_for_picker'));
            
       
    }

    public function save()
    {


        $validated = $this->validate([
            'name'                      => 'required|string',
            'title'                     => 'required|string',
            'preview'                   => 'required|string',
            'content'                   => 'required|string',
            'published'                 => 'required|date_format:' . config('starterkid.time_format.date_time_format_for_picker'),
            'author'                    => 'required|string',
            'online'                    => 'required|boolean',
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
        
       
        $this->authorize('update',[\GrassFeria\StarterkidFrontend\Models\Service::class,$this->service]);
        $validated = array_merge($validated, ['user_id' => $this->author]);
        $this->service->update($validated);
       

        //if ($this->public_photos !== []) {
        //\GrassFeria\Starterkid\Jobs\SpatieMediaLibary\DeleteMediaCollection::dispatch($this->service,'avatars');
        //(new \GrassFeria\Starterkid\Services\SpatieMediaLibary\SaveMediaWithFilenameService($this->public_photos,$this->service,'photos','public','my-new-filename'));
        //(new \GrassFeria\Starterkid\Services\SpatieMediaLibary\SaveMediaService($this->public_photos, $this->service, 'photos', 'public'));
        //}
        
        return redirect()->route('services.index')->with('success', __('Service updated'));

    }
    public function render()
    {
        
        return view('starterkid-frontend::livewire.service.service-edit');
        
    }
}
