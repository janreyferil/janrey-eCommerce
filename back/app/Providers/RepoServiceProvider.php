<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Http\Repositories\Eloquents\User\UsersEloquent;
use App\Http\Repositories\Interfaces\User\UsersInterface;

use App\Http\Repositories\Eloquents\User\RoleUserEloquent;
use App\Http\Repositories\Interfaces\User\RoleUserInterface;

use App\Http\Repositories\Eloquents\Product\CategoriesEloquent;
use App\Http\Repositories\Interfaces\Product\CategoriesInterface;

use App\Http\Repositories\Eloquents\Product\TagsEloquent;
use App\Http\Repositories\Interfaces\Product\TagsInterface;

use App\Http\Repositories\Eloquents\Product\ProductStatusesEloquent;
use App\Http\Repositories\Interfaces\Product\ProductStatusesInterface;

use App\Http\Repositories\Eloquents\Product\ProductsEloquent;
use App\Http\Repositories\Interfaces\Product\ProductsInterface;

use App\Http\Repositories\Eloquents\Product\CategoryProductsEloquent;
use App\Http\Repositories\Interfaces\Product\CategoryProductsInterface;

use App\Http\Repositories\Eloquents\Product\ProductTagsEloquent;
use App\Http\Repositories\Interfaces\Product\ProductTagsInterface;

use App\Http\Repositories\Eloquents\Sale\SessionsEloquent;
use App\Http\Repositories\Interfaces\Sale\SessionsInterface;

use App\Http\Repositories\Eloquents\Sale\CouponsEloquent;
use App\Http\Repositories\Interfaces\Sale\CouponsInterface;

use App\Http\Repositories\Eloquents\Sale\SalesOrdersEloquent;
use App\Http\Repositories\Interfaces\Sale\SalesOrdersInterface;

use App\Http\Repositories\Eloquents\Sale\OrderProductsEloquent;
use App\Http\Repositories\Interfaces\Sale\OrderProductsInterface;

use App\Http\Repositories\Eloquents\Sale\CcTransactionsEloquent;
use App\Http\Repositories\Interfaces\Sale\CcTransactionsInterface;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UsersInterface::class,UsersEloquent::class);

        $this->app->singleton(RoleUserInterface::class,RoleUserEloquent::class);

        $this->app->singleton(CategoriesInterface::class,CategoriesEloquent::class);

        $this->app->singleton(TagsInterface::class,TagsEloquent::class);

        $this->app->singleton(ProductStatusesInterface::class,ProductStatusesEloquent::class);

        $this->app->singleton(ProductsInterface::class,ProductsEloquent::class);

        $this->app->singleton(CategoryProductsInterface::class,CategoryProductsEloquent::class);

        $this->app->singleton(ProductTagsInterface::class,ProductTagsEloquent::class);

        $this->app->singleton(SessionsInterface::class,SessionsEloquent::class);

        $this->app->singleton(CouponsInterface::class,CouponsEloquent::class);

        $this->app->singleton(SalesOrdersInterface::class,SalesOrdersEloquent::class);

        $this->app->singleton(OrderProductsInterface::class,OrderProductsEloquent::class);

        $this->app->singleton(CcTransactionsInterface::class,CcTransactionsEloquent::class);
    }
}
