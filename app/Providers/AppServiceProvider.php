<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use  Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::defaultView('vendor.pagination.bootstrap-5');
//        Paginator::useBootstrapFive();
        View::composer('includes.admin.sidebar', function ($view) {
            $view->with('postcount', Post::all()->count());
        });
    }
}
