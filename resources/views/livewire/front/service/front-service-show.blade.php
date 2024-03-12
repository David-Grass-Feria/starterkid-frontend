<div>
    @include('starterkid-frontend::header')
    
    <livewire-starterkid-frontend::body-content content="{!!$service->content!!}"/>
   


    
    @include('starterkid-frontend::footer',['services' => $services])
</div>