<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class FriendshipCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            
            'id'      => $this->id,
            'receiver_id' => $this->receiver_id,
            'dogable_id' => $this->dogable_id,
            'status' => $this->status,
            'view' => $this->view
        ];
            
    }


}
