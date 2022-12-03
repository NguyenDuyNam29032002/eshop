<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method create(array $array)
 * @method latest()
 * @method find($id)
 */
class Setting extends Model
{
    protected $guarded = [];
    use HasFactory;
}
