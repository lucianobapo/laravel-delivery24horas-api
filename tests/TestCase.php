<?php

namespace ErpNET\App\Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\TestCase as Test;

class TestCase extends Test
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
//        putenv('DB_DEFAULT=sqlite_testing');
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * Default preparation for each test
     */
    public function setUp()
    {
        if (! $this->app) {
            $this->refreshApplication();
        }
        config(['database.default'=> 'sqlite_testing']);

        parent::setUp();
        $this->prepareForTests();
    }

    /**
     * Migrates the database and set the mailer to 'pretend'.
     * This will cause the tests to run quickly.
     */
    private function prepareForTests()
    {
        $this->app->bind(
            \ErpNET\App\Models\RepositoryLayer\PartnerRepositoryInterface::class,

            check_orm(\ErpNET\App\Models\Eloquent\Repositories\PartnerRepositoryEloquent::class,[
                'repository' => \ErpNET\App\Models\Doctrine\Repositories\PartnerRepositoryDoctrine::class,
                'entity' => \ErpNET\App\Models\Doctrine\Entities\Partner::class
            ])
        );

        $this->app->bind(
            \ErpNET\App\Models\RepositoryLayer\OrderRepositoryInterface::class,
            check_orm(\ErpNET\App\Models\Eloquent\Repositories\OrderRepositoryEloquent::class,[
                'repository' => \ErpNET\App\Models\Doctrine\Repositories\OrderRepositoryDoctrine::class,
                'entity' => \ErpNET\App\Models\Doctrine\Entities\Order::class
            ])
        );

        $this->app->bind(
            \ErpNET\App\Models\RepositoryLayer\CostAllocateRepositoryInterface::class,
            check_orm(\ErpNET\App\Models\Eloquent\Repositories\CostAllocateRepositoryEloquent::class,[
                'repository' => \ErpNET\App\Models\Doctrine\Repositories\CostAllocateRepositoryDoctrine::class,
                'entity' => \ErpNET\App\Models\Doctrine\Entities\CostAllocate::class
            ])
        );

        $this->app->bind(
            \ErpNET\App\Models\RepositoryLayer\ProductRepositoryInterface::class,
            \ErpNET\App\Models\RepositoryLayer\CostAllocateRepositoryInterface::class,
            check_orm(\ErpNET\App\Models\Eloquent\Repositories\ProductRepositoryEloquent::class,[
                'repository' => \ErpNET\App\Models\Doctrine\Repositories\ProductRepositoryDoctrine::class,
                'entity' => \ErpNET\App\Models\Doctrine\Entities\Product::class
            ])
        );

        $this->app->bind(
            \ErpNET\App\Models\RepositoryLayer\ProductGroupRepositoryInterface::class,
            check_orm(\ErpNET\App\Models\Eloquent\Repositories\ProductGroupRepositoryEloquent::class,[
                'repository' => \ErpNET\App\Models\Doctrine\Repositories\ProductGroupRepositoryDoctrine::class,
                'entity' => \ErpNET\App\Models\Doctrine\Entities\ProductGroup::class
            ])
        );

//        Artisan::call('migrate');
//        Mail::pretend(true);
    }
}
