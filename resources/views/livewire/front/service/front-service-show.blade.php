<div>
    @include('starterkid-frontend::header')
    
    <x-starterkid-frontend::body-content heading="{{$service->name}}" content="{!!$service->content!!}" />
   


    
    @include('starterkid-frontend::footer',['services' => $services])
</div>