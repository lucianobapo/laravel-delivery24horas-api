<?php

namespace App\Models\Eloquent\CustomTraits;

use App\Models\Eloquent\ItemOrder;

trait CostAllocateRelationsTrait
{
    /**
     * CostAllocate can have many itemOrders.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function itemOrders(){
        return $this->hasMany(ItemOrder::class, 'cost_id');
    }
}
