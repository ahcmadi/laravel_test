<?php

namespace Laravolt\Envi;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Laravolt\Envi\Envi;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutes();
        
        $this->bootMyEnvi();
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'envi');

        $this->bootMyMenuEnvi();

    }

    public function bootMyEnvi()
    {
        $enviroment_settings = Envi::all()->toArray();
        // dd($enviroment_settings);
        foreach ($enviroment_settings as $enviroment_setting ) {
            
           putenv($enviroment_setting['name']."=".$enviroment_setting['value']);
        }

        // dd(env('APP_NAME'));
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       
    }

    protected function loadRoutes()
    {
        $router = $this->app['router'];
        require __DIR__.'/../routes/web.php';
    }

    public function bootMyMenuEnvi()
    {

        // app('laravolt.menu')->add('Home', route('envi::setup.show','default')); 
        app('laravolt.menu')->add('Home', route('envi::setup.index')); 
        app('laravolt.menu')->add('Setup Envi', route('envi::setup.create')); 
    }
}
