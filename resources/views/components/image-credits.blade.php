@if(isset($imageCredits))
<a href="{{$imageCredits}}" target="_blank" rel="nofollow" {{$attributes->merge(['class' => 'text-xs text-gray-500 absolute left-4 bottom-1 bg-white'])}}>{{$imageCredits}}</a>
@endif