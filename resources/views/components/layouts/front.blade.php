<!DOCTYPE html>
<html class="h-full bg-body" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="{{$robots}}">
    @if(isset($description))
    <meta name="description" content="{{$description}}">
    @endif
    <link rel="canonical" href="{{url()->current()}}">
    <title>{{$title}} | {{ config('app.name', 'Laravel') }}</title>

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "{{config('starterkid-frontend.organization_type')}}",
          "name": "{{config('app.name')}}",
          "url": "{{url()->current()}}",
          "logo": "{{ Cache::has('logo') ? Cache::get('logo') : asset('/logo.png') }}",
          "sameAs": [
            "{{config('starterkid-frontend.organization_facebook_url') ?? ''}}",
            "{{config('starterkid-frontend.organization_twitter_url') ?? ''}}",
            "{{config('starterkid-frontend.organization_instagram_url') ?? ''}}",
            "{{config('starterkid-frontend.organization_youtube_url') ?? ''}}",
            "{{config('starterkid-frontend.organization_linkedin_url') ?? ''}}",
            "{{config('starterkid-frontend.organization_pinterest_url') ?? ''}}",
            "{{config('starterkid-frontend.organization_github_url') ?? ''}}",
            "{{config('starterkid-frontend.organization_wikipedia_url') ?? ''}}"
    
          ]
        }
      </script>

     @include('breadcrumb-schema') 
      
    
    @yield('schema')
 
    <x-starterkid::starterkid.font />
    <x-starterkid::starterkid.favicon />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    

    <!-- Styles -->
    <x-starterkid::starterkid.extra-styles />
    @stack('styles')
    @livewireStyles(['nonce' => csp_nonce() ])

</head>

<body class="h-full w-full bg-body">
    
    <x-starterkid::starterkid.banner-message />
 
    {{$slot}}
      
   




    
  
    @yield('scripts')
    @stack('scripts')
    
    @livewireScripts(['nonce' => csp_nonce() ])
</body>

</html>
