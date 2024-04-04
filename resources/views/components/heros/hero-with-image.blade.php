<div class="mt-5 xl:mt-20">
 
    <div class="relative isolate">
     
      <div class="mx-auto lg:flex lg:items-center lg:gap-x-10">
        <div class="mx-auto">
        
          <h1 class="mt-10 text-center text-4xl font-bold text-font_primary xl:text-8xl">{{$h1}} <br> <span class="text-primary">{{$h1Color}}</span></h1>
          <p class="mt-6 w.full md:max-w-2xl mx-auto text-lg leading-8 text-font_primary text-center">{{$description}}</p>
          <div class="mt-10 flex flex-col space-y-5 items-center sm:flex-row sm:items-center sm:justify-center sm:space-x-3 sm:space-y-0 ">
            <a href="{{$href}}" title="{{$hrefTitle}}">
         <x-starterkid-frontend::button-primary type="button">{{$hrefAnchor}}</x-starterkid-frontend::button-primary>
            </a>
           
        </div>
        </div>
        <div class="mt-16 sm:mt-24 lg:mt-0 lg:flex-shrink-0 lg:flex-grow">
          <img width="{{config('starterkid.image_width_height_attributes.medium.width')}}" height="{{config('starterkid.image_width_height_attributes.medium.height')}}" src="{{$imgSrc}}" alt="{{$imgAlt}}" class="rounded-3xl shadow-lg ring-1 ring-primary w-full md:max-w-md mx-auto xl:max-w-lg">
        </div>
      </div>
    </div>
  </div>

  @push('styles')
  <link rel="preload" href="{{$imgSrc}}" as="image">
  @endpush