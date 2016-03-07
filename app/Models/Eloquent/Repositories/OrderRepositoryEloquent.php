<?php

namespace App\Models\Eloquent\Repositories;

use App\Models\RepositoryLayer\OrderRepositoryInterface;
use App\Models\Eloquent\Order;

/**
 * Class OrderRepositoryEloquent
 * @package namespace App\Models\Eloquent\Repositories;
 */
class OrderRepositoryEloquent extends AbstractRepository implements OrderRepositoryInterface
{
    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function collectionOrdersItemsCosts()
    {
        return $this->model
            ->select('orders.*')
            ->join('order_shared_stat', 'orders.id', '=', 'order_shared_stat.order_id')
            ->join('shared_stats', 'order_shared_stat.shared_stat_id', '=', 'shared_stats.id')
            ->where('shared_stats.status', '=', 'finalizado')
            ->with('orderItems','orderItems.cost')
//            ->toSql();
            ->get();
//        dd($return);
    }
}
