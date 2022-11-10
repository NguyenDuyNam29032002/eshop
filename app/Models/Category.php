<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method create(array $array)
 * @method lastest()
 */
class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'parent_id', 'slug'];
}
