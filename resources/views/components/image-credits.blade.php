@if(isset($imageCredits))
<a href="{{$imageCredits}}" target="_blank" rel="nofollow" {{$attributes->merge(['class' => 'text-xs text-white absolute left-8 bottom-1'])}}>{{$imageCredits}}</a>
@endif