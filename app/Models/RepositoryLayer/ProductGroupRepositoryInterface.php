<?php

namespace App\Models\RepositoryLayer;

/**
 * Interface ProductGroupRepositoryInterface
 * @package namespace App\ModelLayer\Repositories;
 */
interface ProductGroupRepositoryInterface extends BaseRepositoryInterface
{
    public function collectionProductGroups();

    public function collectionCategorias();
}
