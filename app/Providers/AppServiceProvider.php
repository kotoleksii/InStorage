<?php

namespace App\Providers;

use App\Services\AuthService;
use App\Services\ValidationService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        $this->app->singleton(ValidationService::class, function(){
            return new ValidationService();
        });

        $this->app->singleton(AuthService::class, function(){
            return new AuthService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::listen(function($query) {
            $bindings = json_encode($query->bindings);
            Log::info("\n\t{$query->sql} | $bindings | {$query->time}");
        });
    }
}
