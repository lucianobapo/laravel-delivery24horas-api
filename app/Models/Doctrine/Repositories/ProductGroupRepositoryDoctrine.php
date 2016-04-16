<?php
/**
 * Created by PhpStorm.
 * User: luciano
 * Date: 02/03/16
 * Time: 01:37
 */

namespace App\Models\Doctrine\Repositories;

use App\Models\RepositoryLayer\ProductGroupRepositoryInterface;
use Doctrine\Common\Collections\ArrayCollection;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

/**
 * Class ProductGroupRepositoryDoctrine
 * @package namespace App\Models\Doctrine\Repositories;
 */
class ProductGroupRepositoryDoctrine extends BaseEntityRepository implements ProductGroupRepositoryInterface
{
    /**
     * @var array
     */
    protected $fillable = [];

    public function collectionProductGroups()
    {
        // TODO: Implement collectionProductGroups() method.
//        $em = $this->getEntityManager();
//        $qb = $em->createQueryBuilder();
//        $qb
//            ->select('p')
//            ->from('App\Models\Doctrine\Entities\ProductGroup', 'p')
////            ->orderBy('c.numero', 'ASC')
//        ;
//        $query = $qb->getQuery();
//        $return = $query->getResult();
//        return new ArrayCollection($return);
    }

    public function collectionCategorias()
    {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb
            ->select('p')
            ->from('App\Models\Doctrine\Entities\ProductGroup', 'p')
            ->where('p.grupo LIKE ?1')
            ->orderBy('p.grupo', 'ASC')
            ->setParameter(1, 'Categoria:%')
        ;
        $query = $qb->getQuery();
        $queryResult = $query->getArrayResult();

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
    }
}