<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;

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
        Barryvdh\Debugbar\ServiceProvider::class;
        DB::listen(function($query){
            var_dump($query->sql);
            var_dump($query->bindings ?? 'No Binding');
            var_dump($query->time);
        });
    }
}
