<?php

namespace App\Models\Eloquent;

use App\Models\Eloquent\CustomTraits\CostAllocateEloquentTrait;
use App\Models\Eloquent\CustomTraits\CostAllocateRelationsTrait;
use App\Models\Eloquent\CustomTraits\GridSortingTrait;
use App\Models\Eloquent\CustomTraits\MandanteTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CostAllocate extends Model
{
    use SoftDeletes;
    use MandanteTrait;
//    use GridSortingTrait;
    use CostAllocateEloquentTrait;
    use CostAllocateRelationsTrait;

    /**
     * Fillable fields for a Model.
     *
     * @var array
     */
    protected $fillable = [
//        'mandante',
//        'nome',
//        'numero',
//        'descricao',
    ];


}
