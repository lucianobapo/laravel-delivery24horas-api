<?php
/**
 * Created by PhpStorm.
 * User: luciano
 * Date: 25/02/16
 * Time: 16:54
 */

namespace App\Models\Eloquent\CustomTraits;


use Carbon\Carbon;

trait OrderEloquentTrait
{
    /**
     * Get the posted_at attribute.
     *
     * @return string
     */
    public function getPostedAt() {
        return Carbon::parse($this->attributes['posted_at']);
    }

    /**
     * Order can have many items.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getItemOrders(){
        return $this->orderItems;
    }

    /**
     * Get the value of type_id.
     *
     * @return integer
     */
    public function getTypeId()
    {
        return $this->type_id;
    }
}