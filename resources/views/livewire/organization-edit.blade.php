<div>
    <x-starterkid::starterkid.card>
            <x-slot name="header">
            
            </x-slot>
            <x-starterkid::starterkid.form cancelRoute="{{route('dashboard')}}">
            
            <x-starterkid::starterkid.form.text wire:model="name" for="name" id="name" type="text" label="{{__('Name')}}" required/>
          

            </x-starterkid::starterkid.form>


    </x-starterkid::starterkid.card>
    </div>