<?php

namespace Plutus\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use PascalKleindienst\FormListGenerator\Generators\ListGenerator;
use PascalKleindienst\FormListGenerator\Generators\FormGenerator;
use PascalKleindienst\FormListGenerator\Support\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        # set the root path of the application and optionally a baseUrl
        Config::set([
            'root'    => app_path('Models'),
            'baseUrl' => env('APP_URL')
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RepositoryServiceProvider::class);

        $this->app->instance(ListGenerator::class, new ListGenerator);
        $this->app->instance(FormGenerator::class, new FormGenerator);
    }
}
