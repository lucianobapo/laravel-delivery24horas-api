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
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb
            ->select('p')
            ->from('App\Models\Doctrine\Entities\ProductGroup', 'p')
//            ->orderBy('c.numero', 'ASC')
        ;
        $query = $qb->getQuery();
        $return = $query->getResult();
        return new ArrayCollection($return);
    }

    public function collectionCategorias()
    {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb
            ->select('p')
            ->from('App\Models\Doctrine\Entities\ProductGroup', 'p')
            ->where('p.grupo LIKE ?1%')
            ->setParameter(1, 'Categoria:')
//            ->orderBy('c.numero', 'ASC')
        ;
        $query = $qb->getQuery();
        $return = $query->getResult();
        return new ArrayCollection($return);
    }
}