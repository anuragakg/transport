<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->id,
            'role' => strip_tags($this->getRole->title),
            'user_name' => strip_tags($this->user_name),
            'status' => $this->status,
            'fullname' => strip_tags($this->name).' '.$this->middle_name.' '.$this->last_name,
            'name' => $this->name??'',
            'last_name' => $this->last_name??'',
            'middle_name' => $this->middle_name??'',
            'mobile' => strip_tags($this->mobile_no),
            'email' => strip_tags($this->email),
            
        ];
    }
}
