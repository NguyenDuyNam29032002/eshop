<?php

namespace App\Models;

use CKSource\CKFinder\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method create()
 */
class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}
