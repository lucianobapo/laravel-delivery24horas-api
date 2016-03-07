<?php

namespace App\Models\Doctrine\Repositories;

use App\Models\RepositoryLayer\CostAllocateRepositoryInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Query;

/**
 * Class CostAllocateRepositoryDoctrine
 * @package namespace App\Models\Doctrine\Repositories;
 */
class CostAllocateRepositoryDoctrine extends BaseEntityRepository implements CostAllocateRepositoryInterface
{
    /**
     * @var array
     */
    protected $fillable = [];

    public function collectionCostAllocate()
    {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb
            ->select('c')
            ->from('App\Models\Doctrine\Entities\CostAllocate', 'c')
            ->orderBy('c.numero', 'ASC')
        ;
        $query = $qb->getQuery();
        $return = $query->getResult();
        return new ArrayCollection($return);
    }

}
