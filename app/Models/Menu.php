<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, int|mixed $parent_id)
 * @method create(array $array)
 * @method paginate(int $int)
 * @method find($id)
 */
class Menu extends Model
{
    protected $fillable = ['name', 'parent_id', 'slug'];
    use HasFactory;
    use SoftDeletes;
}
