<?php

namespace App\Models\Eloquent\CustomTraits;

use App\Models\Eloquent\CostAllocate;
use App\Models\Eloquent\ItemOrder;
use App\Models\Eloquent\ProductGroup;

trait ProductRelationsTrait
{
    /**
     * A Product belongs to a CostAllocate.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cost() {
        return $this->belongsTo(CostAllocate::class);
    }

    /**
     * Partner can have many orders.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function itemOrders(){
        return $this->hasMany(ItemOrder::class);
    }

    /**
     * Get the groups associated with the given product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups() {
        return $this->belongsToMany(ProductGroup::class)->withTimestamps();
    }

    /**
     * Get the status associated with the given Product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function status() {
//        return $this->belongsToMany(SharedStat::class)->withTimestamps();
    }

}
