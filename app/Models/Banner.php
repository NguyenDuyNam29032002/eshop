<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method create(array $array)
 * @method paginate(int $int)
 * @method latest()
 * @method find($id)
 */
class Banner extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded = [];
}
