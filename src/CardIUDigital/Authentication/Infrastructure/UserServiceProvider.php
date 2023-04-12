<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Interface', 'Implementation');
        $this->app->tag([], 'domain_event_subscriber');
        $this->app->tag([
            RoleAllQueryHandler::class,
            RoleByIdQueryHandler::class
        ], 'domain_query_handler');
        
    }
}
