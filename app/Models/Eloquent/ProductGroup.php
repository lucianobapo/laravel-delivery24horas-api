<?php namespace App\Models\Eloquent;

use App\Models\Eloquent\CustomTraits\ProductGroupRelationsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGroup extends Model {

    use SoftDeletes;
    use ProductGroupRelationsTrait;

    /**
     * Fillable fields for a ProductGroup.
     *
     * @var array
     */
    protected $fillable = [
//        'mandante',
//        'grupo',
    ];

}
