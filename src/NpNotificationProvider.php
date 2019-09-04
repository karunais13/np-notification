<?php

namespace Karu\NpNotification;

use Illuminate\Support\ServiceProvider;
use Route;

class NpNotificationProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');

        $this->publishes([
            __DIR__.'/config/notification.php' => config_path('notification.php'),
        ]);

        Route::middleware('web')
            ->group(__DIR__.'/routes/notification.php');

        Route::prefix('api')
            ->middleware('api')
            ->group(__DIR__.'/routes/notification.php');
    }
}
