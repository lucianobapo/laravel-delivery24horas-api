<?php
/**
 * Created by PhpStorm.
 * User: luciano
 * Date: 25/02/16
 * Time: 16:54
 */

namespace App\Models\Eloquent\CustomTraits;

trait ItemOrderEloquentTrait
{
    /**
     * An Item Order belongs to an CostAllocate.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getCostAllocate() {
        return $this->cost;
    }

    /**
     * Get the value of valor_unitario.
     *
     * @return float
     */
    public function getValorUnitario()
    {
        return $this->valor_unitario;
    }

    /**
     * Get the value of quantidade.
     *
     * @return float
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

}