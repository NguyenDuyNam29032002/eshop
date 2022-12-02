<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method create(array $array)
 * @method paginate(int $int)
 * @method latest()
 */
class Banner extends Model
{
    use HasFactory;
    protected $guarded = [];
}
