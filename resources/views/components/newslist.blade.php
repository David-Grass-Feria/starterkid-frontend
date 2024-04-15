<div class="ring-1 ring-primary mt-5 xl:mt-20 rounded-3xl">
    <div class="divide-y divide-gray-200 overflow-hidden rounded-3xl bg-white shadow">
      <div class="px-4 py-5 sm:px-6 text-font_primary">
       
        <div class="flex items-center space-x-2">
        <svg class="h-4 w-4 fill-green-500 animate animate-pulse" viewBox="0 0 6 6" aria-hidden="true">
          <circle cx="3" cy="3" r="3" />
        </svg>
        <h2 class="text-md font-bold xl:text-lg">{{$heading}}</h2>
      </div>

      </div>
      <div class="px-4 py-5 sm:p-6">
        <div>
          <ul role="list" class="divide-y divide-gray-300 flex flex-col space-y-3">
            
         

     {{$slot}}
    
          </ul>
          </div>
      </div>
      @if(isset($footer))
      <div class="px-4 py-4 sm:px-6">
       {{$footer}}
      </div>
      @endif
    </div>
    </div>