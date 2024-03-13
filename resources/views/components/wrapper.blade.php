<div class="mx-auto max-w-7xl p-3 xl:p-12 flex flex-col space-y-10">
    @if(isset($header))
    <div class="flex items-center space-x-2">
        {{$header}}
        </div>
        @endif
        <div>
{{$slot}}
        </div>
</div>