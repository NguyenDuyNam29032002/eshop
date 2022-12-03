<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method create(array $array)
 * @method latest()
 */
class Setting extends Model
{
    protected $guarded = [];
    use HasFactory;
}
