<!DOCTYPE html>
<html class="h-full bg-white" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
          "name": "{{$settingOrganizationName}}",
          "url": "{{url()->current()}}",
          "logo": "{{ Cache::has('logo') ? Cache::get('logo') : asset('/logo.png') }}",
          "sameAs": [
            "{{$settingOrganizationFacebookUrl ?? ''}}",
            "{{$settingOrganizationTwitterUrl ?? ''}}",
            "{{$settingOrganizationInstagramUrl ?? ''}}",
            "{{$settingOrganizationYoutubeUrl ?? ''}}",
            "{{$settingOrganizationLinkedinUrl ?? ''}}",
            "{{$settingOrganizationPinterestUrl ?? ''}}",
            "{{$settingOrganizationGithubUrl ?? ''}}",
            "{{$settingOrganizationWikipediaUrl ?? ''}}"
    
          ]
        }
      </script>
    
 
    <x-starterkid::starterkid.font />
    <x-starterkid::starterkid.favicon />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    

    <!-- Styles -->
    <x-starterkid::starterkid.extra-styles />
    @stack('styles')
    @livewireStyles

</head>

<body class="h-full w-full bg-white">
   
    <x-starterkid::starterkid.banner-message />
 
    {{$slot}}
      
   




    
  
    @yield('scripts')
    @stack('scripts')
    @livewireScripts
    
</body>

</html>
