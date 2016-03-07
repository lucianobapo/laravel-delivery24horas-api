<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $orm = [];

    public function __construct(\Illuminate\Contracts\Foundation\Application $app)
    {
        $this->orm['eloquent']=true;
        $this->orm['doctrine']=false;
//        $this->orm['eloquent']=false;
//        $this->orm['doctrine']=true;

        parent::__construct($app);
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

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Models\RepositoryLayer\OrderRepositoryInterface::class,

            $this->orm['eloquent']?\App\Models\Eloquent\Repositories\OrderRepositoryEloquent::class:($this->orm['doctrine']?
            function($app) {
                // This is what Doctrine's EntityRepository needs in its constructor.
                return new \App\Models\Doctrine\Repositories\OrderRepositoryDoctrine(
                    $app['em'],
                    $app['em']->getClassMetaData(\App\Models\Doctrine\Entities\Order::class)
                );
            }:false)
        );

        $this->app->bind(
            \App\Models\RepositoryLayer\CostAllocateRepositoryInterface::class,

            $this->orm['eloquent']?\App\Models\Eloquent\Repositories\CostAllocateRepositoryEloquent::class:($this->orm['doctrine']?
            function($app) {
                // This is what Doctrine's EntityRepository needs in its constructor.
                return new \App\Models\Doctrine\Repositories\CostAllocateRepositoryDoctrine(
                    $app['em'],
                    $app['em']->getClassMetaData(\App\Models\Doctrine\Entities\CostAllocate::class)
                );
            }:false)
        );

        $this->app->bind(
            \App\Models\RepositoryLayer\ProductRepositoryInterface::class,

            $this->orm['eloquent']?\App\Models\Eloquent\Repositories\ProductRepositoryEloquent::class:($this->orm['doctrine']?
            function($app) {
                // This is what Doctrine's EntityRepository needs in its constructor.
                return new \App\Models\Doctrine\Repositories\ProductRepositoryDoctrine(
                    $app['em'],
                    $app['em']->getClassMetaData(\App\Models\Doctrine\Entities\Product::class)
                );
            }:false)
        );

        $this->app->bind(
            \App\Models\RepositoryLayer\ProductGroupRepositoryInterface::class,

            $this->orm['eloquent']?\App\Models\Eloquent\Repositories\ProductGroupRepositoryEloquent::class:($this->orm['doctrine']?
            function($app) {
                // This is what Doctrine's EntityRepository needs in its constructor.
                return new \App\Models\Doctrine\Repositories\ProductGroupRepositoryDoctrine(
                    $app['em'],
                    $app['em']->getClassMetaData(\App\Models\Doctrine\Entities\ProductGroup::class)
                );
            }:false)
        );
    }
}
