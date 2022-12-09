<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method where(string $string, int $int)
 */
class Permission extends Model
{
    use HasFactory;
    public function PermissionsChildren()
    {
        return $this->hasMany(Permission::class, 'parent_id');
    }
}
