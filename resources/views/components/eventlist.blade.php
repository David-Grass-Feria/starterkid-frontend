<div class="ring-1 ring-gray-900/10 mt-5 xl:mt-20 rounded-3xl">
    <div class="divide-y divide-gray-200 overflow-hidden rounded-3xl bg-white shadow">
      <div class="px-4 py-5 sm:px-6 text-font_primary">
       
        <div class="flex items-center space-x-2">
        <svg class="h-2 w-2 fill-green-500 animate animate-pulse" viewBox="0 0 6 6" aria-hidden="true">
          <circle cx="3" cy="3" r="3" />
        </svg>
        <h2>{{$heading}}</h2>
      </div>

      </div>
      <div class="px-4 py-5 sm:p-6">
        <div>
          <ul role="list" class="divide-y divide-gray-300 flex flex-col space-y-3">
            
         

     {{$slot}}
    
          </ul>
          </div>
      </div>
    </div>
    </div>