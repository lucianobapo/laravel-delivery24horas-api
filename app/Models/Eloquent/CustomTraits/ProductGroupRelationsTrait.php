<?php

namespace App\Models\Eloquent\CustomTraits;

use App\Models\Eloquent\Product;

trait ProductGroupRelationsTrait
{
    /**
     * Get the products associated with the given ProductGroup.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products() {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

}
