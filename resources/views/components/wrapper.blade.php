<div class="mx-auto max-w-[1900px] flex flex-col">
    @if(isset($header))
    <div class="flex flex-col items-center xl:flex-row mt-5">
        {{$header}}
        </div>
        @endif
        @if(isset($paginationLinks))
<div class="mt-5">
    {{$paginationLinks}}
</div>
@endif
     

<div>
{{$slot}}
</div>


@if(isset($paginationLinks))
<div class="mt-5">
    {{$paginationLinks}}
</div>
@endif
</div>