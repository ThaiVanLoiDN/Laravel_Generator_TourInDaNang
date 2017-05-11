<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    private $categoryTourRepository;

    public function boot()
    {

        View::share('imageUrl', getenv('IMAGE_URL'));
        View::share('adminUrl', getenv('ADMIN_URL'));
        View::share('frontendUrl', getenv('FRONTEND_URL'));
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
