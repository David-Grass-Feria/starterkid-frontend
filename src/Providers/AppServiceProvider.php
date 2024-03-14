<?php

namespace GrassFeria\StarterkidFrontend\Providers;

use Livewire\Livewire;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;
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
        
        try {
            // Überprüfe, ob die Datenbanktabelle existiert
            if (Schema::hasTable('settings')) {
                $setting = \GrassFeria\Starterkid\Models\Setting::find(1);
                if ($setting) {
                    // Teile Einstellungen mit allen Ansichten
                    View::share('settingOrganizationName', $setting->extra['organization']['name']);
                    View::share('settingOrganizationAlternateName', $setting->extra['organization']['alternate_name']);
                    View::share('settingOrganizationFacebookUrl', $setting->extra['organization']['facebook_url']);
                    View::share('settingOrganizationTwitterUrl', $setting->extra['organization']['twitter_url']);
                    View::share('settingOrganizationInstagramUrl', $setting->extra['organization']['instagram_url']);
                    View::share('settingOrganizationYoutubeUrl', $setting->extra['organization']['youtube_url']);
                    View::share('settingOrganizationLinkedinUrl', $setting->extra['organization']['linkedin_url']);
                    View::share('settingOrganizationPinterestUrl', $setting->extra['organization']['pinterest_url']);
                    View::share('settingOrganizationGithubUrl', $setting->extra['organization']['github_url']);
                    View::share('settingOrganizationWikipediaUrl', $setting->extra['organization']['wikipedia_url']);
                    
                }
            }
        } catch (QueryException $e) {
            // Datenbankverbindung fehlgeschlagen oder Tabelle nicht gefunden
            // Logge den Fehler oder handle ihn, wie benötigt
        }
        
        
        
        
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'starterkid-frontend');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->loadJsonTranslationsFrom(__DIR__.'/../../lang');
        
        Livewire::component('starterkid-frontend::service-create',\GrassFeria\StarterkidFrontend\Livewire\Service\ServiceCreate::class);
        Livewire::component('starterkid-frontend::service-edit',\GrassFeria\StarterkidFrontend\Livewire\Service\ServiceEdit::class);
        Livewire::component('starterkid-frontend::service-index',\GrassFeria\StarterkidFrontend\Livewire\Service\ServiceIndex::class);
        Livewire::component('starterkid-frontend::blog-post-create',\GrassFeria\StarterkidFrontend\Livewire\BlogPost\BlogPostCreate::class);
        Livewire::component('starterkid-frontend::blog-post-edit',\GrassFeria\StarterkidFrontend\Livewire\BlogPost\BlogPostEdit::class);
        Livewire::component('starterkid-frontend::blog-post-index',\GrassFeria\StarterkidFrontend\Livewire\BlogPost\BlogPostIndex::class);
        Livewire::component('starterkid-frontend::organization-edit',\GrassFeria\StarterkidFrontend\Livewire\OrganizationEdit::class);

        //front
        Livewire::component('starterkid-frontend::front-service-index',\GrassFeria\StarterkidFrontend\Livewire\Front\Service\FrontServiceIndex::class);
        Livewire::component('starterkid-frontend::front-service-show',\GrassFeria\StarterkidFrontend\Livewire\Front\Service\FrontServiceShow::class);
        Livewire::component('starterkid-frontend::front-blog-post-index',\GrassFeria\StarterkidFrontend\Livewire\Front\BlogPost\FrontBlogPostIndex::class);
        Livewire::component('starterkid-frontend::front-blog-post-show',\GrassFeria\StarterkidFrontend\Livewire\Front\BlogPost\FrontBlogPostShow::class);
       
        Livewire::component('starterkid-frontend::homepage',\GrassFeria\StarterkidFrontend\Livewire\Front\Homepage::class);
        

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
        
       $this->app->config->set('filesystems.disks.ckimage', [
        'driver' => 'local',
        'root' => storage_path('app/public/ckimages'),
        'url' => env('APP_URL').'/storage/ckimages',
        'visibility' => 'public',
        'throw' => false,
       ]);

       

       
    }
}