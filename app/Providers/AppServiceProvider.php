<?php

namespace App\Providers;

use App\Services\UploadService;
use Illuminate\Http\Client\Request;
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
        $this->app->when(UploadService::class)
            ->needs(Request::class)
            ->give(function (){
                return request();
            });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
