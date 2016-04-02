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
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

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
        // TODO: Implement collectionProductGroups() method.
//        return $this->model
////            ->orderBy('numero')
//            ->get();
    }

    public function collectionProductsDelivery($categ){
        $queryResult = $this->model
            ->select('products.*')
//            ->with('groups')
            ->join('product_shared_stat', 'products.id', '=', 'product_shared_stat.product_id')
            ->join('shared_stats', 'product_shared_stat.shared_stat_id', '=', 'shared_stats.id')
            ->where('shared_stats.status', '=', 'ativado')
            ->where('valorUnitVenda', '>', 0)
            ->orderBy('products.nome');
        if (((int)$categ)>0) {
            $queryResult
                ->join('product_product_group', 'products.id', '=', 'product_product_group.product_id')
                ->where('product_product_group.product_group_id', '=', $categ);
        }

        $queryResult = $queryResult->get()->toArray();

        $fractal = new Manager();
        $resource = new Collection($queryResult, function(array $item) {
            return [
                'id'   => $item['id'],
                'nome'   => $item['nome'],
                'imagem'   => $item['imagem'],
                'max' => 3,
                'valor'   => $item['promocao']?$item['valorUnitVendaPromocao']:$item['valorUnitVenda'],
            ];
        });
        return $fractal->createData($resource)->toJson();
    }
}