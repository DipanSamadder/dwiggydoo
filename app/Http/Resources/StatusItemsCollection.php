<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class StatusItemsCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            
            'id'      => $this->id,
            'user_id' => $this->user_id,
            'slug' => $this->slug,
            'type' => $this->type,
            'value' => $this->value,
            'file' => dsld_uploaded_file_path($this->value),
            'expires_at' => $this->expires_at,
            'created_at' => $this->created_at,
        ];
            
    }


}
