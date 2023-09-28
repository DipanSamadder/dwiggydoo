<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\BlogRepositories;
use App\Interfaces\BlogInterfaces;

class RepositorieServices extends ServiceProvider{

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(BlogInterfaces::class, BlogRepositories::class);
    }

}