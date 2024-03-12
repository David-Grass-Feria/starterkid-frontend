<div>
    @include('starterkid-frontend::header')
    
    <h1>{{$service->name}}</h1>
    
    @include('starterkid-frontend::footer',['services' => $services])
</div>