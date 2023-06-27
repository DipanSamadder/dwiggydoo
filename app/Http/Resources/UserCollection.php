<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserCollection extends JsonResource
{
    public function toArray($request)
    {
        return [

            'id' => (integer)$this->id,
            'name' =>$this->name,
            'type' =>$this->user_type,
            'email' =>$this->email,
            'avatar' =>$this->avatar,
            'avatar_original' => dsld_uploaded_file_path($this->avatar_original),
            'phone' =>$this->phone
        ];
         
    }


}
