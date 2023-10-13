<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class StatusUserItemsCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'      => $this->id,
            'type'      => $this->type,
            'length'      => 9,
            'src' => dsld_uploaded_file_path($this->value),
            'preview' => dsld_uploaded_file_path($this->value),
            'link' => $this->slug,
            'linkText' => '',
            'time' => strtotime($this->created_at),
        ];
            
    }


}
