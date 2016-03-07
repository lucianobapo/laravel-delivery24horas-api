<?php
/**
 * Created by PhpStorm.
 * User: luciano
 * Date: 13/01/16
 * Time: 23:28
 */

namespace App\Models\Doctrine\Repositories;

use App\Entities\EntityBase;
use App\Models\RepositoryLayer\BaseRepositoryInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;

class BaseEntityRepository extends EntityRepository implements BaseRepositoryInterface
{
    /**
     * @var array
     */
    protected $fillable;

    private function mapFillable(EntityBase $entity, $data){
        foreach ($this->fillable as $item) {
            $setCall = camel_case('set_'.$item);
            $entity->$setCall($data[$item]);
        }
    }

    public function findAll(){
        return new ArrayCollection(parent::findAll());
    }

//    public function find($id, $lockMode = null, $lockVersion = null)
//    {
////        $this->_em->newHydrator()
//////        dd($this->_em->getHydrator(Query::HYDRATE_OBJECT)->hydrateAll());
//////        dd((parent::find($id, $lockMode, $lockVersion)));
////        return $this->_em->find($this->_entityName, $id, $lockMode, $lockVersion);
//    }

    public function create(array $data)
    {
        $entity = $this->prepareData($data);
        $this->mapFillable($entity,$data);
        $this->_em->persist($entity);
        $this->_em->flush();
    }

//    public function EntityOfId($id)
//    {
//        return $this->_em->find($this->_class, [
//            'id' => $id
//        ]);
//    }

//    public function update(EntityBase $entity, $data)
//    {
//        $this->mapFillable($entity,$data);
//        $this->em->persist($entity);
//        $this->em->flush();
//    }
//
//    public function delete(EntityBase $entity)
//    {
//        $this->em->remove($entity);
//        $this->em->flush();
//    }

    /**
     * create EntityBase
     * @return EntityBase
     */
    public function prepareData($data)
    {
        return new $this->_class($data);
    }

    public function update(array $data, $id)
    {
//        return $this->model->find($id)->update($data);
    }

    public function firstOrCreate(array $data)
    {
//        return $this->model->firstOrCreate($data);
    }

    public function delete($id)
    {
//        return $this->model->find($id)->delete();
    }

    public function paginate($pages)
    {
//        return $this->model->paginate($pages);
    }
}