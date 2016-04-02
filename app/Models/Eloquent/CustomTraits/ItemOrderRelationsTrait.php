<?php

namespace App\Models\Eloquent\CustomTraits;

use App\Models\Eloquent\CostAllocate;
use App\Models\Eloquent\Order;

trait ItemOrderRelationsTrait
{
    /**
     * An Item Order belongs to an Order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order() {
        return $this->belongsTo(Order::class);
    }

    /**
     * An Item Order belongs to an CostAllocate.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cost() {
        return $this->belongsTo(CostAllocate::class);
    }

    /**
     * An Item Order belongs to an CostAllocate.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function costAllocate() {
        return $this->belongsTo(CostAllocate::class);
    }

    /**
     * An Item Order belongs to a Product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product() {
//        return $this->belongsTo(App\Models\Product::class);
    }

    /**
     * An Item Order belongs to an SharedCurrency.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency() {
//        return $this->belongsTo(App\Models\SharedCurrency::class);
    }

}
