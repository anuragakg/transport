<?php

namespace App\Models\Masters;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $table = 'user_roles';

    protected $fillable = ['title', 'status', 'description', 'created_by', 'updated_by'];

    /**
     * Switch the status of any specified master.
     * 
     * @return int|string
     */
    public function switchStatus()
    {
        if ($this->status == 1) {
            return $this->status = '0';
        }
        $this->status = 1;
    }

    public function getUsers()
    {
        return $this->hasMany(User::class, 'role', 'id');
    }

    public function getCommission()
    {
        return $this->hasMany(CommissionMaster::class, 'role', 'id');
    }

    /**
     * Gets all permissions of a role.
     * @return BelongsToMany 
     */
    public function getPermissions()
    {
        return $this->belongsToMany(
            Permission::class,
            'role_permissions_relationship',
            'role_id',
            'permission_id',
            'id'
        );
    }
}
