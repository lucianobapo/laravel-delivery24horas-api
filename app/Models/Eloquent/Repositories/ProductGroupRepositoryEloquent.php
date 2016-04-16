<?php
/**
 * Created by PhpStorm.
 * User: luciano
 * Date: 02/03/16
 * Time: 01:31
 */

namespace App\Models\Eloquent\Repositories;

use App\Models\Eloquent\ProductGroup;
use App\Models\RepositoryLayer\ProductGroupRepositoryInterface;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

/**
 * Class ProductGroupRepositoryEloquent
 * @package namespace App\Models\Eloquent\Repositories;
 */
class ProductGroupRepositoryEloquent extends AbstractRepository implements ProductGroupRepositoryInterface
{
    public function __construct(ProductGroup $model)
    {
        $this->model = $model;
    }

    public function collectionProductGroups(){
        // TODO: Implement collectionProductGroups() method.
//        return $this->model
////            ->orderBy('numero')
//            ->get();
    }

    public function collectionCategorias(){
        $queryResult = $this->model
            ->where('grupo', 'LIKE', 'Categoria:%')
            ->orderBy('grupo')
            ->get()
            ->toArray();

        $fractal = new Manager();
        $resource = new Collection($queryResult, function(array $item) {
            $icon = '';
            $nome = substr($item['grupo'], 11);
            switch (str_slug($nome)){
                case 'cervejas':
                    $icon = 'icon ion-beer';
                    break;
                case 'porcoes':
                    $icon = 'fa fa-cutlery fa-2x';
                    break;
                case 'tabacaria':
                    $icon = 'icon ion-no-smoking';
                    break;
                case 'destilados':
                    $icon = 'icon ion-android-bar';
                    break;
                case 'sucos':
                    $icon = 'icon ion-ios-pint';
                    break;
                case 'energeticos':
                    $icon = 'icon ion-ios-pint';
                    break;
                case 'refrigerantes':
                    $icon = 'icon ion-ios-pint';
                    break;
                case 'vinhos':
                    $icon = 'icon ion-wineglass';
                    break;
                case 'lanches':
                    $icon = 'icon ion-pizza';
                    break;
                default:
                    break;
            }

            return [
                'id'   => $item['id'],
                'icon'   => $icon,
                'nome'   => $nome
            ];
        });
        return $fractal->createData($resource)->toJson();

//        return (json_encode($return));
    }
}