<?php

namespace GrassFeria\StarterkidFrontend\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;


class OrganizationEdit extends Component
{
    use WithFileUploads;

    public $setting;
    public $name;
   
    



    public function mount($recordId = null)
    {
        
       
        $this->setting                          = \GrassFeria\Starterkid\Models\Setting::find(1);
        //$this->name                             = $this->setting->

       
      
        $this->authorize('update',[\GrassFeria\Starterkid\Models\Setting::class,$this->setting]);
        //$this->date                                 = $this->service->date->format(config('starterkid.time_format.date_format_for_picker'));
        //$this->date_time                            = $this->service->date_time->format(config('starterkid.time_format.date_time_format_for_picker'));
        //$this->time                                 = $this->service->time->format(config('starterkid.time_format.time_format_for_picker'));
            
       
    }

    public function save()
    {


        $validated = $this->validate([
            'name'                      => 'required|string',
           
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
        
       
        $this->authorize('update',[\GrassFeria\Starterkid\Models\Setting::class,$this->setting]);
        //$validated = array_merge($validated, ['user_id' => auth()->user()->id]);
        
        
        $this->setting->update(['organization' => $validated]);
       

        //if ($this->public_photos !== []) {
        //\GrassFeria\Starterkid\Jobs\SpatieMediaLibary\DeleteMediaCollection::dispatch($this->service,'avatars');
        //(new \GrassFeria\Starterkid\Services\SpatieMediaLibary\SaveMediaWithFilenameService($this->public_photos,$this->service,'photos','public','my-new-filename'));
        //(new \GrassFeria\Starterkid\Services\SpatieMediaLibary\SaveMediaService($this->public_photos, $this->service, 'photos', 'public'));
        //}
        
        return redirect()->route('organization.edit')->with('success', __('Organization updated'));

    }
    public function render()
    {
        
        return view('starterkid-frontend::livewire.organization-edit');
        
    }
}
