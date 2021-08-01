<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class UserProfileResource extends JsonResource
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
                'name' => strip_tags($this->name),
                'middle_name' => strip_tags($this->middle_name),
                'last_name' => strip_tags($this->last_name),
                'email' => strip_tags($this->email),
                'mobile_no' => strip_tags($this->mobile_no),
                'role' => strip_tags($this->getRole->title),
                
         ];
    }
}
