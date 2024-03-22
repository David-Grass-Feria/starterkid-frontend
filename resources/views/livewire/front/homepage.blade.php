<x-slot:title>{{config('app.name')}}</x-slot>
<x-slot:robots>index, follow</x-slot>

<div>
@include('starterkid-frontend::header')




<x-starterkid-frontend::card>

<x-starterkid-frontend::wrapper>






@include('homepage')








  
      
     
     
</x-starterkid-frontend::wrapper>


</x-starterkid-frontend::card>


@include('starterkid-frontend::footer',['services' => $services])
</div>