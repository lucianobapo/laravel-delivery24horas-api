<?php

namespace App\Models\RepositoryLayer;

/**
 * Interface ProductRepositoryInterface
 * @package namespace App\ModelLayer\Repositories;
 */
interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function collectionProducts();

    public function collectionProductsDelivery($categ);
}
