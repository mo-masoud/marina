<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Config;
use App\VivaSms\Viva;
class VivaSmsProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!file_exists(base_path('config') . '/vivasms.php')) {
            $this->publishes([
                __DIR__ . '/config' => base_path('config'),
            ]);
        }

        if (!file_exists(base_path('resources/lang/' . Config::get('app.locale') . '/viva.php'))) {
            $this->publishes([
                __DIR__ . '/lang' => base_path('resources/lang/' . Config::get('app.locale')),
            ]);
        }

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Viva',function($app){
            return new Viva();
        });          
    }
}