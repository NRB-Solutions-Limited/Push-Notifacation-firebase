<?php

namespace Fnnaeem1881\Push_notification;

use Illuminate\Support\ServiceProvider;

class PushNotificationServiceProvider extends ServiceProvider
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
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'push_notification');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->mergeConfigFrom(__DIR__ . '/config/push_notification.php', 'push_notification');

        $this->publishes([
            __DIR__.'/config/push_notification.php' => config_path('push_notification.php'),
        ]);
    }
}
