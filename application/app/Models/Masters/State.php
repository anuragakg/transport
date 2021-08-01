<?php

namespace App\Models\Masters;

use App\Models\FundManagement\SanctionLetter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserDetail;
use App\Models\CaptureLocation;

class State extends Model
{
    use SoftDeletes;
    protected $table = 'states_master';

    protected $fillable = ['title', 'status', 'code', 'created_by', 'updated_by'];

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function deleteDistricts()
    {
        $this->districts->each(function ($district) {
            $district->blocks()->delete();
        });
        $this->districts()->delete();
    }

    public function  getMoUsers()
    {
        return $this->hasMany(UserDetail::class, 'state', 'id');
    }

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
    public function getStateLevelRole()
    {
        return $this->hasMany(StateLevel::class, 'state_id', 'id');
    }

    /**
     * Gets sanction letters of a particular state.
     *
     * @return SanctionLetter[]
     */
    public function getSanctionLetter()
    {
        return $this->hasMany(SanctionLetter::class, 'state_id', 'id');
    }

    public function getUserDetails()
    {
        return $this->hasMany(UserDetail::class, 'state', 'id');
    }

    public function getStates()
    {
        return $this->belongsTo(CaptureLocation::class, 'title', 'id');
    }
}
