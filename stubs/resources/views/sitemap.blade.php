{{--
@php
$blogposts = \GrassFeria\StarterkidBlog\Models\BlogPost::frontGetBlogPostWhereStatusIsOnline()->get();
@endphp
@foreach($blogposts as $blogpost)
    <li>
     <a class="underline text-xs text-font_primary" href="{{route('front.blog-post.show',$blogpost->slug)}}" title="{{$blogpost->title}}">{{$blogpost->name}}</a>
    </li>
@endforeach
<br>
--}}
