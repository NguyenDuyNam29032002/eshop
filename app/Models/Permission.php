<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method where(string $string, int $int)
 * @method static create()
 * @method static insert(array $array)
 */
class Permission extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function PermissionsChildren()
    {
        return $this->hasMany(Permission::class, 'parent_id');
    }
}
