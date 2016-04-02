<?php
/**
 * Created by PhpStorm.
 * User: luciano
 * Date: 02/03/16
 * Time: 01:27
 */

namespace App\Models\Doctrine\Repositories;

use App\Models\RepositoryLayer\ProductRepositoryInterface;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

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
        // TODO: Implement collectionProductGroups() method.
//        $em = $this->getEntityManager();
//        $qb = $em->createQueryBuilder();
//        $qb
//            ->select('p')
//            ->from('App\Models\Doctrine\Entities\Product', 'p')
////            ->orderBy('c.numero', 'ASC')
//        ;
//        $query = $qb->getQuery();
//        $return = $query->getResult();
//        return new ArrayCollection($return);
    }

    public function collectionProductsDelivery($categ)
    {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb
            ->select('p')
            ->from('App\Models\Doctrine\Entities\Product', 'p')
//            ->leftJoin('p.productProductGroups', 'ppg')
            ->join('p.productSharedStats', 'pst', 'WITH', 'p.id = pst.product_id')
            ->join('pst.sharedStat', 'st', 'WITH', 'pst.shared_stat_id = st.id')
            ->where('st.status = ?1')
            ->andWhere('p.valorUnitVenda>0')
            ->setParameter(1, 'ativado')

            ->orderBy('p.nome', 'ASC')
        ;
        if (((int)$categ)>0) {
            $qb->join('p.productProductGroups', 'pg', 'WITH', 'p.id = pg.product_id')
                ->andWhere('pg.product_group_id = ?2')
                ->setParameter(2, $categ);
        }

        $query = $qb->getQuery();
        $queryResult = $query->getArrayResult();

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