<?php

namespace GrassFeria\StarterkidFrontend\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;


class OrganizationEdit extends Component
{
    use WithFileUploads;

    public $setting;
    public $name;
    public $alternate_name;
    public $facebook_url;
    public $twitter_url;
    public $instagram_url;
    public $youtube_url;
    public $linkedin_url;
    public $pinterest_url;
    public $wikipedia_url;
    public $github_url;
    
 
   
    



    public function mount($recordId = null)
    {
        
       
        $this->setting                          = \GrassFeria\Starterkid\Models\Setting::find(1);
        $this->name                             = $this->setting->extra['organization']['name'] ?? null;
        $this->alternate_name                   = $this->setting->extra['organization']['alternate_name'] ?? null;
        $this->facebook_url                     = $this->setting->extra['organization']['facebook_url'] ?? null;
        $this->twitter_url                      = $this->setting->extra['organization']['twitter_url'] ?? null;
        $this->instagram_url                    = $this->setting->extra['organization']['instagram_url'] ?? null;
        $this->youtube_url                      = $this->setting->extra['organization']['youtube_url'] ?? null;
        $this->linkedin_url                     = $this->setting->extra['organization']['linkedin_url'] ?? null;
        $this->pinterest_url                    = $this->setting->extra['organization']['pinterest_url'] ?? null;
        $this->wikipedia_url                    = $this->setting->extra['organization']['wikipedia_url'] ?? null;
        $this->github_url                       = $this->setting->extra['organization']['github_url'] ?? null;
       
        
        

       
      
        $this->authorize('update',[\GrassFeria\Starterkid\Models\Setting::class,$this->setting]);
        //$this->date                                 = $this->service->date->format(config('starterkid.time_format.date_format_for_picker'));
        //$this->date_time                            = $this->service->date_time->format(config('starterkid.time_format.date_time_format_for_picker'));
        //$this->time                                 = $this->service->time->format(config('starterkid.time_format.time_format_for_picker'));
            
       
    }

    public function save()
    {


        $validated = $this->validate([
            'name'                                  => 'required|string',
            'alternate_name'                        => 'required|string',
            'facebook_url'                          => 'nullable|string',
            'twitter_url'                           => 'nullable|string',
            'instagram_url'                         => 'nullable|string',
            'youtube_url'                           => 'nullable|string',
            'linkedin_url'                          => 'nullable|string',
            'pinterest_url'                         => 'nullable|string',
            'wikipedia_url'                         => 'nullable|string',
            'github_url'                            => 'nullable|string',
          
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
        
        $extra['organization'] = $validated;
        $this->setting->update(['extra' => $extra]);
       

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
