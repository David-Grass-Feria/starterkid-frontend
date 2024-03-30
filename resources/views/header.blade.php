<div class="sticky top-0 z-10 bg-body w-full border-b border-gray-400 mx-auto">
    <header class="bodyColor border-b border-gray-400">
        <nav class="mx-auto flex items-center justify-between p-6 lg:px-8" aria-label="Global">
          <div class="flex lg:flex-1">
            <a wire:navigate href="{{route('front.homepage')}}" title="{{config('app.name')}}" class="-m-1.5 p-1.5">
              <span class="sr-only">{{config('app.name')}}</span>
              <x-starterkid::starterkid.logo conversion="logo-thumb" width="57" height="32" class="h-8 w-auto"/>
            </a>
          </div>
          <div class="flex lg:hidden">
            <button x-on:click="open = !open" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-font_primary">
              <span class="sr-only">Open main menu</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
            </button>
          </div>
          <div class="hidden lg:flex lg:gap-x-12">
            <x-starterkid-frontend::navlink wire:navigate href="{{ route('front.homepage') }}" title="{{ config('app.name') }}" :active="request()->routeIs(['front.homepage'])">{{__('Home')}}</x-starterkid-frontend::navlink>
           
           

@if(Route::has('front.blog-post.index'))
            <x-starterkid-frontend::navlink wire:navigate href="{{ route('front.blog-post.index') }}" title="{{ config('starterkid-blog.blog_post_title') }}" :active="request()->routeIs(['front.blog-post.index','front.blog-post.show'])">{{ config('starterkid-blog.blog_post_title') }}</x-starterkid-frontend::navlink>
          @endif
            @if(Route::has('front.service.index'))
    <x-starterkid-frontend::navlink wire:navigate href="{{ route('front.service.index') }}" title="{{ config('starterkid-service.service_title') }}" :active="request()->routeIs(['front.service.index','front.service.show'])">{{ config('starterkid-service.service_title') }}</x-starterkid-frontend::navlink>
  @endif
  @foreach(collect($frontNavLinks)->sortBy('order') as $frontNavLink)
  @if(Route::has($frontNavLink['route']))
  <x-starterkid-frontend::navlink wire:navigate href="{{ route($frontNavLink['route'], $frontNavLink['parameters'] ?? []) }}" title="{{ $frontNavLink['title'] }}" :active="request()->routeIs($frontNavLink['active'])">{{ $frontNavLink['title'] }}</x-starterkid-frontend::navlink>
@endif
@endforeach
          </div>
          <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            @if(config('starterkid-frontend.login_link'))
            <x-starterkid-frontend::navlink href="{{route('login')}}" title="{{__('Login')}}">{{__('Log in')}}</x-starterkid-frontend::navlink>
            @endif
          </div>
        </nav>
        <!-- Mobile menu, show/hide based on menu open state. -->
        <div x-data="{open:false}" x-cloak x-show="open" class="lg:hidden" role="dialog" aria-modal="true">
          <!-- Background backdrop, show/hide based on slide-over state. -->
          <div class="fixed inset-0 z-10"></div>
          <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-body px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-white/10">
            <div class="flex items-center justify-between">
              <a href="{{route('front.homepage')}}" title="{{config('app.name')}}" class="-m-1.5 p-1.5">
                <span class="sr-only">{{config('app.name')}}</span>
                <x-starterkid::starterkid.logo conversion="logo-thumb" width="57" height="32" class="h-8 w-auto"/>
              </a>
              <button x-on:click="open = !open" type="button" class="-m-2.5 rounded-md p-2.5 text-font_primary">
                <span class="sr-only">Close menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <div class="mt-6 flow-root">
              <div class="-my-6 divide-y divide-gray-500/25">
                <div class="space-y-2 py-6">
                  <x-starterkid-frontend::navlink-mobile wire:navigate href="{{ route('front.homepage') }}" title="{{ config('app.name') }}" :active="request()->routeIs(['front.homepage'])">{{__('Home')}}</x-starterkid-frontend::navlink-mobile>

                 
                  
                  @if(Route::has('front.blog-post.index'))
                  <x-starterkid-frontend::navlink-mobile wire:navigate href="{{ route('front.blog-post.index') }}" title="{{ config('starterkid-blog.blog_post_title') }}" :active="request()->routeIs(['front.blog-post.index','front.blog-post.show'])">{{ config('starterkid-blog.blog_post_title') }}</x-starterkid-frontend::navlink-mobile>
                  @endif
                  @if(Route::has('front.service.index'))
                  <x-starterkid-frontend::navlink-mobile wire:navigate href="{{ route('front.service.index') }}" title="{{ config('starterkid-service.service_title') }}" :active="request()->routeIs(['front.service.index','front.service.show'])">{{ config('starterkid-service.service_title') }}</x-starterkid-frontend::navlink-mobile>
                  @endif
                  @foreach($frontNavLinks as $frontNavLink)
                  @if(Route::has($frontNavLink['route']))
                  <x-starterkid-frontend::navlink-mobile wire:navigate href="{{ route($frontNavLink['route'], $frontNavLink['parameters'] ?? []) }}" title="{{ $frontNavLink['title'] }}" :active="request()->routeIs($frontNavLink['active'])">{{ $frontNavLink['title'] }}</x-starterkid-frontend::navlink-mobile>
                  @endif
                  @endforeach

                </div>
                <div class="py-6">
                  @if(config('starterkid-frontend.login_link'))
                    <x-starterkid-frontend::navlink-mobile href="{{route('login')}}" title="{{__('Login')}}">{{__('Log in')}}</x-starterkid-frontend::navlink-mobile>
                    @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
    </div>