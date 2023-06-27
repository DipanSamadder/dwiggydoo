<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LikeCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            
            'id'      => $this->id,
            'dogs_id' => $this->dogs_id,
            'user'    => [
                        'id' => $this->dog->user->id,
                        'name' => $this->dog->user->name,
                        'avatar' => dsld_uploaded_file_path($this->dog->user->avatar),
                        'avatar_original' => dsld_uploaded_file_path($this->dog->user->avatar_original),
                    ],
        ];
            
    }
}
