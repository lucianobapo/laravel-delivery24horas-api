<?php

namespace App\Models\Eloquent\Repositories;

use App\Models\Eloquent\CostAllocate;
use App\Models\RepositoryLayer\CostAllocateRepositoryInterface;

/**
 * Class OrderRepositoryEloquent
 * @package namespace App\Models\Eloquent\Repositories;
 */
class CostAllocateRepositoryEloquent extends AbstractRepository implements CostAllocateRepositoryInterface
{
    public function __construct(CostAllocate $model)
    {
        $this->model = $model;
    }

    public function collectionCostAllocate(){
        return $this->model
            ->orderBy('numero')
            ->get();
    }
}
