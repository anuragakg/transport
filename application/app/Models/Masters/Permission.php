<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;

    protected $table = 'permissions';

    protected $fillable = ['name', 'description', 'created_by', 'updated_by'];

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
