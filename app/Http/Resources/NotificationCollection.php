<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
           
            'id' => $this->id,
            'sender_id' => $this->sender_id,
            'reason_key' => $this->reason_key,
            'reason_id' => $this->reason_id,
            'user_id' => $this->user_id,
            'sub' => $this->sub,
            'message' => $this->message,
            'is_view' => $this->is_view,
            'is_hide' => $this->is_hide,
        ];
    }
}
