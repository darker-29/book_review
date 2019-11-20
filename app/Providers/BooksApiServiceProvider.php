<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\BooksApiService;

class BooksApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('book', function($app) {
            return new BooksApiService();
        });
    }
}
