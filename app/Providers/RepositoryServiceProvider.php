<?php

namespace Plutus\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Plutus\\Repositories\\UserRepository', 'Plutus\\Repositories\\UserRepository');
    }
}
