<!DOCTYPE html>
<html class="h-full bg-gray-200" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, follow">
    <title>{{ config('app.name', 'Laravel') }}</title>

 
    <x-starterkid::starterkid.font />
    <x-starterkid::starterkid.favicon />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    

    <!-- Styles -->
    <x-starterkid::starterkid.extra-styles />
    @stack('styles')
    @livewireStyles
</head>

<body class="h-full w-full bg-gray-200 xl:max-w-[1500px] mx-auto">
   
    {{$slot}}
      
   




    
  
    @yield('scripts')
    @stack('scripts')
    @livewireScripts
    
</body>

</html>
