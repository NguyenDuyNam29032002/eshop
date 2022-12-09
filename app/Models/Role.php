<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method paginate(int $int)
 * @method create()
 * @method find($id)
 */
class Role extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role', 'role_id', 'permission_id');
    }

}
