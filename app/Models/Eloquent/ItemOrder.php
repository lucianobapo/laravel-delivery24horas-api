<?php

namespace App\Models\Eloquent;

use App\Models\Eloquent\CustomTraits\ItemOrderEloquentTrait;
use App\Models\Eloquent\CustomTraits\ItemOrderRelationsTrait;
use App\Models\Eloquent\CustomTraits\MandanteTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemOrder extends Model
{
    use SoftDeletes;
    use MandanteTrait;
    use ItemOrderEloquentTrait;
    use ItemOrderRelationsTrait;

    /**
     * Fillable fields for a Model.
     *
     * @var array
     */
    protected $fillable = [
//        'mandante',
//        'order_id',
//        'cost_id',
//        'product_id',
//        'currency_id',
//        'quantidade',
//        'valor_unitario',
//        'desconto_unitario',
//        'descricao',
    ];

}
