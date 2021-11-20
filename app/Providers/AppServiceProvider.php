<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Projects;
use App\Observers\ProductObserver;
use App\Observers\ProjectObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('vendor.pagination.default');
        Product::observe(ProductObserver::class);
        Projects::observe(ProjectObserver::class);
    }
}
