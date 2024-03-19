<div class="w-full xl:max-w-2xl mx-auto">
    <div class="relative isolate">
      <div>
         <div class="text-center">
           <h1 class="text-4xl font-bold tracking-tight settingFontColor sm:text-6xl">{{$h1}}<br><span class="settingPrimaryFontColor">{{$h1Color}}</span></h1>
           <p class="mt-6 text-lg leading-8 settingFontColor">{{$description}}</p>
           <div class="mt-10 flex items-center justify-center gap-x-6">
            @if(isset($buttonPrimaryRoute))
             <a href="{{$buttonPrimaryRoute}}" title="{{$buttonPrimaryAnchor}}">
             <x-starterkid-frontend::button-primary>{{$buttonPrimaryAnchor}}</x-starterkid-frontend::button-primary>
             </a>
             @endif
             @if(isset($buttonSecondaryRoute))
             <a href="{{$buttonSecondaryRoute}}" title="{{$buttonSecondaryAnchor}}">
             <x-starterkid-frontend::button-secondary>{{$buttonSecondaryAnchor}}</x-starterkid-frontend::button-secondary>
             </a>
             @endif
           </div>
         </div>
       </div>
     </div>
   </div>
