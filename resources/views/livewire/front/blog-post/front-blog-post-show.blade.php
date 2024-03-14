<x-slot:title>{{$blogpost->name}}</x-slot>
<x-slot:robots>noindex, follow</x-slot>


<div>
    @include('starterkid-frontend::header')
    


    <x-starterkid-frontend::card>

      
    <x-starterkid-frontend::wrapper>
   
  
    <x-starterkid-frontend::body-content heading="{{$blogpost->name}}" content="{!!$blogpost->content!!}" imgSrc="{{$blogpost->getFirstMediaUrl('images',config('starterkid.spatie_conversions.large.name'))}}" imgAlt="{{$blogpost->name}}" dateTime="{{$blogpost->getPublished()}}" author="{{$blogpost->author}}"  />

    
      
    </x-starterkid-frontend::wrapper>
 
</x-starterkid-frontend::card>


    
    @include('starterkid-frontend::footer',['services' => $services])
</div>