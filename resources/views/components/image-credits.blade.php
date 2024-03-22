@if(isset($imageCredits))
@if($imageCredits !== '')
<a href="{{$imageCredits}}" target="_blank" rel="nofollow" {{$attributes->merge(['class' => 'text-xs text-gray-600 bg-white p-0.5 absolute left-4 bottom-1'])}}>© {{$imageCredits}}</a>
@endif
@endif