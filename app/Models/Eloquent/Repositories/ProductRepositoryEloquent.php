<?php
/**
 * Created by PhpStorm.
 * User: luciano
 * Date: 02/03/16
 * Time: 01:23
 */

namespace App\Models\Eloquent\Repositories;

use App\Models\Eloquent\Product;
use App\Models\RepositoryLayer\ProductRepositoryInterface;

/**
 * Class ProductRepositoryEloquent
 * @package namespace App\Models\Eloquent\Repositories;
 */
class ProductRepositoryEloquent extends AbstractRepository implements ProductRepositoryInterface
{
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function collectionProducts(){
        return $this->model
//            ->orderBy('numero')
            ->get();
    }

    public function collectionProductsDelivery($categ){

//        return $this->model
        $return = $this->model
            ->select('products.*')
            ->join('product_shared_stat', 'products.id', '=', 'product_shared_stat.product_id')
            ->join('shared_stats', 'product_shared_stat.shared_stat_id', '=', 'shared_stats.id')
            ->where('shared_stats.status', '=', 'ativado')
            ->orderBy('products.nome');

        if (($categ*1)>0) {
            $return
            ->join('product_product_group', 'products.id', '=', 'product_product_group.product_id')
//            ->join('product_groups', 'product_product_group.product_group_id', '=', 'product_groups.id')
            ->where('product_product_group.product_group_id', '=', $categ);
        }


//        dd($return->get());
//        dd($return->toSql());
//        dd($return->getQuery());

        $returnFiltred = $return->get()
            ->filter(function($item) {
                foreach($item->groups as $grupo){
                    if ($grupo->grupo == 'Delivery') return $item;
                }
            });

//        dd($returnFiltred);
        foreach($returnFiltred as $value){
            $returnFiltredArray[] = $value;
        }
        return $returnFiltredArray;
    }
}