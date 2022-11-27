<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create()
 * @method static firstOrCreate(string[] $array)
 */
class Tag extends Model
{
    protected $guarded = [];
    use HasFactory;
}
