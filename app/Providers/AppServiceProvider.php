<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function __construct(\Illuminate\Contracts\Foundation\Application $app)
    {
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
//        $this->app->bind(
//            \ErpNET\App\Models\RepositoryLayer\PartnerRepositoryInterface::class,
//
//            check_orm(\ErpNET\App\Models\Eloquent\Repositories\PartnerRepositoryEloquent::class,[
//                'repository' => \ErpNET\App\Models\Doctrine\Repositories\PartnerRepositoryDoctrine::class,
//                'entity' => \ErpNET\App\Models\Doctrine\Entities\Partner::class
//            ])
//        );
//
//        $this->app->bind(
//            \ErpNET\App\Models\RepositoryLayer\OrderRepositoryInterface::class,
//            check_orm(\ErpNET\App\Models\Eloquent\Repositories\OrderRepositoryEloquent::class,[
//                'repository' => \ErpNET\App\Models\Doctrine\Repositories\OrderRepositoryDoctrine::class,
//                'entity' => \ErpNET\App\Models\Doctrine\Entities\Order::class
//            ])
//        );
//
//        $this->app->bind(
//            \ErpNET\App\Models\RepositoryLayer\CostAllocateRepositoryInterface::class,
//            check_orm(\ErpNET\App\Models\Eloquent\Repositories\CostAllocateRepositoryEloquent::class,[
//                'repository' => \ErpNET\App\Models\Doctrine\Repositories\CostAllocateRepositoryDoctrine::class,
//                'entity' => \ErpNET\App\Models\Doctrine\Entities\CostAllocate::class
//            ])
//        );
//
//        $this->app->bind(
//            \ErpNET\App\Models\RepositoryLayer\ProductRepositoryInterface::class,
//            \ErpNET\App\Models\RepositoryLayer\CostAllocateRepositoryInterface::class,
//            check_orm(\ErpNET\App\Models\Eloquent\Repositories\ProductRepositoryEloquent::class,[
//                'repository' => \ErpNET\App\Models\Doctrine\Repositories\ProductRepositoryDoctrine::class,
//                'entity' => \ErpNET\App\Models\Doctrine\Entities\Product::class
//            ])
//        );
//
//        $this->app->bind(
//            \ErpNET\App\Models\RepositoryLayer\ProductGroupRepositoryInterface::class,
//            check_orm(\ErpNET\App\Models\Eloquent\Repositories\ProductGroupRepositoryEloquent::class,[
//                'repository' => \ErpNET\App\Models\Doctrine\Repositories\ProductGroupRepositoryDoctrine::class,
//                'entity' => \ErpNET\App\Models\Doctrine\Entities\ProductGroup::class
//            ])
//        );
    }
}
