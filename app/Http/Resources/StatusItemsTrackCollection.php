<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class StatusItemsTrackCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            
            'status_items_id' => $this->status_items_id,
            'user_id' => $this->user_id,
            'name' => $this->user->name,
            'created_at' => $this->created_at
        ];
            
    }


}
