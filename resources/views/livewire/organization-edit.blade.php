<div>
    <x-starterkid::starterkid.card>
            <x-slot name="header">
            {{__('Organization settings')}}
            </x-slot>
            <x-starterkid::starterkid.form cancelRoute="{{route('dashboard')}}">
            
            <x-starterkid::starterkid.form.text wire:model="name" for="name" id="name" type="text" label="{{__('Name')}}" placeholder="Microsoft" required/>
            <x-starterkid::starterkid.form.text wire:model="alternate_name" for="alternate_name" id="alternate_name" type="text" label="{{__('Alternate Name')}}" placeholder="MS" required/>
            <x-starterkid::starterkid.form.text wire:model="facebook_url" for="facebook_url" id="facebook_url" type="text" label="{{__('Facebook')}}" placeholder="https://www.facebook.com/MicrosoftDE"/>
            <x-starterkid::starterkid.form.text wire:model="twitter_url" for="twitter_url" id="twitter_url" type="text" label="{{__('Twitter/X')}}" placeholder="https://twitter.com/Microsoft"/>
            <x-starterkid::starterkid.form.text wire:model="instagram_url" for="instagram_url" id="instagram_url" type="text" label="{{__('Instagram')}}" placeholder="https://www.instagram.com/microsoft/"/>
            <x-starterkid::starterkid.form.text wire:model="youtube_url" for="youtube_url" id="youtube_url" type="text" label="{{__('Youtube')}}" placeholder="https://www.youtube.com/user/microsoftde"/>
            <x-starterkid::starterkid.form.text wire:model="linkedin_url" for="linkedin_url" id="linkedin_url" type="text" label="{{__('Linkedin')}}" placeholder="https://de.linkedin.com/company/microsoft"/>
            <x-starterkid::starterkid.form.text wire:model="pinterest_url" for="pinterest_url" id="pinterest_url" type="text" label="{{__('Pinterest')}}" placeholder="https://www.pinterest.de/microsoft/"/>
            <x-starterkid::starterkid.form.text wire:model="github_url" for="github_url" id="github_url" type="text" label="{{__('Github')}}" placeholder="https://github.com/microsoft"/>
            <x-starterkid::starterkid.form.text wire:model="wikipedia_url" for="wikipedia_url" id="wikipedia_url" type="text" label="{{__('Wikipedia')}}"/>
           
          
            
            </x-starterkid::starterkid.form>


    </x-starterkid::starterkid.card>
    </div>