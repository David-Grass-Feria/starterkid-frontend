<div>
        <x-starterkid::starterkid.card>
                <x-slot name="header">
                <a href="{{route('blogposts.index')}}" title="{{__('BlogPost list')}}">
                <x-starterkid::starterkid.button-secondary type="button">{{__('Back')}}</x-starterkid::starterkid.button-secondary>
                </a>
                </x-slot>
                <x-starterkid::starterkid.form cancelRoute="{{route('blogposts.index')}}">
                
                // forms here
              

                </x-starterkid::starterkid.form>


        </x-starterkid::starterkid.card>
        </div>