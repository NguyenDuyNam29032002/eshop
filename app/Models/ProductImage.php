<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method find($id)
 */
class ProductImage extends Model
{
    use HasFactory;
    protected $guarded = [];
}
