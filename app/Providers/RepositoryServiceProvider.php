<?php

namespace App\Providers;

use App\Base\Interfaces\BaseRepositoryInterface;
use App\Base\Interfaces\CategoryRepositoryInterface;
use App\Base\Interfaces\OrderRepositoryInterface;
use App\Base\Interfaces\ProductRepositoryInterface;
use App\Base\Interfaces\ReviewRepositoryInterface;
use App\Base\Repositories\BaseRepository;
use App\Base\Repositories\CategoryRepository;
use App\Base\Repositories\OrderRepository;
use App\Base\Repositories\ProductRepository;
use App\Base\Repositories\ReviewRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ReviewRepositoryInterface::class, ReviewRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
