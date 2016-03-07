<?php
/**
 * Created by PhpStorm.
 * User: luciano
 * Date: 13/01/16
 * Time: 22:35
 */

namespace App\Models\Doctrine\Repositories;

use App\Models\Doctrine\Entities\Address;

class AddressRepository extends BaseEntityRepository
{
    /**
     * @var string
     */
    protected $class = Address::class;

    /**
     * @var array
     */
    protected $fillable = ['complemento'];

}