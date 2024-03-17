<?php

namespace GrassFeria\StarterkidFrontend\Providers;




use Illuminate\Support\Facades\Route;
use Illuminate\Database\QueryException;
use Illuminate\Support\ServiceProvider;


class NavlinkServiceProvider extends ServiceProvider
{
   
    public function boot()
    {
        $this->loadNavLinks();
        
    }

    protected function loadNavLinks()
    {
        $frontNavLinks = [];
       

        // Pfad zu den Package Configs anpassen
        $configPaths = glob(base_path('plugins/*/*/config/front-navlink.php'));
        //dd($configPaths);
        
        
       
        
        foreach ($configPaths as $path) {
            $links = require $path;
            
            
            $frontNavLinks = array_merge($frontNavLinks, $links);
            
        }
        

        view()->share('frontNavLinks', $frontNavLinks);
       
    }
}
