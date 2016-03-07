<?php
/**
 * Created by PhpStorm.
 * User: luciano
 * Date: 02/03/16
 * Time: 01:27
 */

namespace App\Models\Doctrine\Repositories;

use App\Models\RepositoryLayer\ProductRepositoryInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class ProductRepositoryDoctrine
 * @package namespace App\Models\Doctrine\Repositories;
 */
class ProductRepositoryDoctrine extends BaseEntityRepository implements ProductRepositoryInterface
{
    /**
     * @var array
     */
    protected $fillable = [];

    public function collectionProducts()
    {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb
            ->select('p')
            ->from('App\Models\Doctrine\Entities\Product', 'p')
//            ->orderBy('c.numero', 'ASC')
        ;
        $query = $qb->getQuery();
        $return = $query->getResult();
        return new ArrayCollection($return);
    }
}