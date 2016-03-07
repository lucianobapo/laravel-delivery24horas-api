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
        return $this->model
//            ->orderBy('numero')
            ->get();
    }

    public function collectionCategorias(){
        $categ = $this->model
            ->where('grupo', 'LIKE', 'Categoria:%')
            ->orderBy('grupo')
            ->get();

        foreach ($categ as $item) {
            $icon = '';
            $nome = substr($item->grupo, 11);
            $slug = str_slug($nome);
            if ($slug=='porcoes') continue;
            switch ($slug){
                case 'cervejas':
                    $icon = 'icon ion-beer';
                    break;
                case 'tabacaria':
                    $icon = 'icon ion-no-smoking';
                    break;
                case 'destilados':
                    $icon = 'icon ion-android-bar';
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

            $return[] = [
                'nome' => $nome,
                'icon' => $icon,
                'id' => $item->id,
            ];
        }
        return (json_encode($return));
    }
}