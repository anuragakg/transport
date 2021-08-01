<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id'                 => $this->id,
            'user_name'          => strip_tags($this->user_name),
            'name'               => strip_tags($this->name),
            'middle_name'        => strip_tags($this->middle_name),
            'last_name'          => strip_tags($this->last_name),
            'mobile'             => $this->mobile_no,
            'email'              => strip_tags($this->email),
            'role_id'            => $this->role,
            'role'               => strip_tags($this->getRole->title),

            
        ];
    }
}
