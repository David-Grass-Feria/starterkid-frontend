<x-slot:title>{{config('app.name')}}</x-slot>
<x-slot:robots>index, follow</x-slot>

<div>
@include('starterkid-frontend::header')



<x-starterkid-frontend::card>

      
<x-starterkid-frontend::wrapper>

<ul role="list">
    @include('sitemap')
</ul>
  

</x-starterkid-frontend::card>

      
</x-starterkid-frontend::wrapper>


@include('starterkid-frontend::footer',['services' => $services])
</div>