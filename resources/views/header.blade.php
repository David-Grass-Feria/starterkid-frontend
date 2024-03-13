<div x-data="{open:false}" x-cloak>
    <header class="settingPrimaryBackgroundColor">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
          <div class="flex lg:flex-1">
            <a href="{{route('front.homepage')}}" title="{{config('app.name')}}" class="-m-1.5 p-1.5">
              <span class="sr-only">{{config('app.name')}}</span>
              <x-starterkid::starterkid.logo class="h-8 w-auto"/>
            </a>
          </div>
          <div class="flex lg:hidden">
            <button x-on:click="open = !open" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 settingFontColorOnDarkBackground">
              <span class="sr-only">Open main menu</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
            </button>
          </div>
          <div class="hidden lg:flex lg:gap-x-12">
            @include('front.navbar')
          </div>
          <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            @if(config('starterkid-frontend.login_link'))
            <x-starterkid-frontend::navlink href="{{route('login')}}" title="{{__('Login')}}">{{__('Log in')}}</x-starterkid-frontend::navlink>
            @endif
          </div>
        </nav>
        <!-- Mobile menu, show/hide based on menu open state. -->
        <div x-show="open" class="lg:hidden" role="dialog" aria-modal="true">
          <!-- Background backdrop, show/hide based on slide-over state. -->
          <div class="fixed inset-0 z-10"></div>
          <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto settingPrimaryBackgroundColor px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-white/10">
            <div class="flex items-center justify-between">
              <a href="{{route('front.homepage')}}" title="{{config('app.name')}}" class="-m-1.5 p-1.5">
                <span class="sr-only">{{config('app.name')}}</span>
                <x-starterkid::starterkid.logo class="h-8 w-auto"/>
              </a>
              <button x-on:click="open = !open" type="button" class="-m-2.5 rounded-md p-2.5 settingFontColorOnDarkBackground">
                <span class="sr-only">Close menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <div class="mt-6 flow-root">
              <div class="-my-6 divide-y divide-gray-500/25">
                <div class="space-y-2 py-6">
                    @include('front.navbar-mobile')
                </div>
                <div class="py-6">
                    <x-starterkid-frontend::navlink-mobile href="{{route('login')}}" title="{{__('Login')}}">{{__('Log in')}}</x-starterkid-frontend::navlink-mobile>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
    </div>