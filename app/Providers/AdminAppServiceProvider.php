<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AdminAppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer(
            [
            'layouts.app-admin',
            'admin.layouts.app',
            'admin.home',
            'admin.user.showusers',
            'admin.cases.showcases',
            'admin.cases.showallclientcases',
            'admin.templates.showtemplatetypes',
            'admin.users.showusers',
            'admin.clients.showclients',
            ], 
            
            'App\Http\ViewComposers\AdminViewComposer'
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
