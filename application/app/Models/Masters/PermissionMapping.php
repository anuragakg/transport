<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class PermissionMapping extends Model
{
    //use SoftDeletes;

    protected $table = 'role_permissions_relationship';
    protected $dates = ['deleted_at'];
    public $timestramps = false;

   
    protected $fillable = ['role_id', 'permission_id'];

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
}