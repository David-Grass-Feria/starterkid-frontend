<?php

namespace GrassFeria\StarterkidFrontend\Providers;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use GrassFeria\StarterkidFrontend\Console\Commands\InstallStarterkidFrontendCommand;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(AuthServiceProvider::class);
        //$this->mergeConfigFrom(
        //    __DIR__.'/../../config/starterkid-frontend.php', 'starterkid-frontend'
        //);
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'starterkid-frontend');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->loadJsonTranslationsFrom(__DIR__.'/../../lang');
        Livewire::component(\GrassFeria\StarterkidFrontend\Livewire\Homepage::class);
        Livewire::component(\GrassFeria\StarterkidFrontend\Livewire\Service\ServiceCreate::class);
        Livewire::component(\GrassFeria\StarterkidFrontend\Livewire\Service\ServiceEdit::class);
        Livewire::component(\GrassFeria\StarterkidFrontend\Livewire\Service\ServiceIndex::class);

        $this->publishes([
            __DIR__.'/../../config/navlink.php' => base_path('/config/starterkid/grass-feria/starterkid-frontend/navlink.php'),
        ], 'StarterkidFrontend config');

        $this->publishes([
            __DIR__.'/../../stubs' => base_path('/'),
        ], 'starterkid-frontend');


        // commands
        $this->commands([
            InstallStarterkidFrontendCommand::class,
            
        ]);

        // scheduler
        //$this->app->booted(function () {
        //    $schedule = $this->app->make(Schedule::class);
        //    $schedule->command('backup:run')->everyFiveMinutes();
        //    
        //});

        // middleware you must load (Kernel $kernel) in boot
        //$kernel->prependMiddlewareToGroup('web', \GrassFeria\StarterkidFrontend\Http\Middleware\CheckIfAppIsLocal::class);

       //$this->app->config->set('filesystems.disks.dog', [
       //     'driver' => env('DOG_DISK', 'local'),
       //     'root' => env('DOG_DISK') == 'sftp' ? 'dogs' : (env('DOG_DISK') == 'local' ? storage_path('app/dogs') : null),
       //     // for sftp
       //     'host' => env('DOG_DISK') == 'sftp' ? env('STORAGEBOX_HOST', '') : null,
       //     'username' => env('DOG_DISK') == 'sftp' ? env('STORAGEBOX_USERNAME', '') : null,
       //     'password' => env('DOG_DISK') == 'sftp' ? env('STORAGEBOX_PASSWORD', '') : null,
       //     'visibility' => 'private',
       //     'directory_visibility' => 'private',
       //     'maxTries' => env('DOG_DISK') == 'sftp' ? 4 : null,
       //     'port' => env('DOG_DISK') == 'sftp' ? 22 : null,
       //     'timeout' => env('DOG_DISK') == 'sftp' ? 30 : null,
       //     'useAgent' => env('DOG_DISK') == 'sftp' ? false : null,
       //     // for s3
       //     'key' => env('DOG_DISK') == 's3' ? env('AWS_ACCESS_KEY_ID') : null,
       //     'secret' => env('DOG_DISK') == 's3' ? env('AWS_SECRET_ACCESS_KEY') : null,
       //     'region' => env('DOG_DISK') == 's3' ? env('AWS_DEFAULT_REGION') : null,
       //     'bucket' => env('DOG_DISK') == 's3' ? env('AWS_BUCKET') : null,
       //     'url' => env('DOG_DISK') == 's3' ? env('AWS_URL') : null,
       // ]);
        


       
    }
}