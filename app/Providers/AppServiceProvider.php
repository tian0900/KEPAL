<?php

namespace App\Providers;


use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;

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
        Blade::directive('currency', function ( $expression ) { 
            return "Rp<?php echo number_format($expression,2,',','.'); ?>"; });

            
        config(['app.local' => 'id']);
        Carbon::setLocale('id');

        Paginator::useBootstrap();
    }
}
