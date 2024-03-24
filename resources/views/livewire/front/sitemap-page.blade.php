<x-slot:title>{{config('app.name')}}</x-slot>
<x-slot:robots>index, follow</x-slot>

<div>
@include('starterkid-frontend::header')



<x-starterkid-frontend::card>

      
<x-starterkid-frontend::wrapper>

<ul role="list">
    
    @foreach($blogposts as $blogpost)
    <li>
     <a class="underline text-xs text-font_primary" href="{{route('front.blog-post.show',$blogpost->slug)}}" title="{{$blogpost->title}}" class="hover:underline">{{$blogpost->name}}</a>
    </li>
   @endforeach

   @include('sitemap')
    
   
  </ul>
  

</x-starterkid-frontend::card>

      
</x-starterkid-frontend::wrapper>


@include('starterkid-frontend::footer',['services' => $services])
</div>