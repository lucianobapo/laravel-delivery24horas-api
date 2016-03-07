<?php namespace App\Models\Eloquent;

use App\Models\Eloquent\CustomTraits\SharedOrderTypeRelationsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SharedOrderType extends Model
{
    use SoftDeletes;
    use SharedOrderTypeRelationsTrait;

    protected $fillable = [
//        'tipo',
//        'descricao',
    ];



}
