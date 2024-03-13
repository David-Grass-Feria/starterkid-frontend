<div>
    @include('starterkid-frontend::header')
    

<x-starterkid-frontend::card>
    <x-starterkid-frontend::card-header heading="{{ucfirst(config('starterkid-frontend.service_slug'))}}" />
      
    <x-starterkid-frontend::wrapper>
   
    
     
            <x-starterkid-frontend::card-grid>
            
            @foreach($services as $service)
           <x-starterkid-frontend::post-card name="{{$service->name}}" linkRoute="{{route('front.service.show',$service->slug)}}" linkTitle="{{$service->name}}" buttonText="{{__('More info')}}" description="{!!$service->preview!!}" />
            @endforeach

            
        </x-starterkid-frontend::card-grid>
    
      
    </x-starterkid-frontend::wrapper>
 
</x-starterkid-frontend::card>


    
    @include('starterkid-frontend::footer',['services' => $services])
</div>