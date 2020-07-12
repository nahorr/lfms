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
            'includes.navbar-admin',
            'admin.home',
            'admin.user.showusers',
            'admin.cases.showcases',
            'admin.cases.showallclientcases',
            'admin.templates.showtemplatetypes',
            'admin.users.showusers',
            'admin.clients.showclients',
            'admin.lawyers.showlawyers',
            'admin.cases.files.showcasefiles',

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
