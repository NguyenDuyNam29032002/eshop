<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method create(array $array)
 * @method lastest()
 * @method static paginate(int $int)
 * @method find($id)
 */
class Category extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['name', 'parent_id', 'slug'];
}
