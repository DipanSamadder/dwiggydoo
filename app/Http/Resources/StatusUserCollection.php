<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class StatusUserCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'      => $this->id,
            'photo' => dsld_uploaded_file_path($this->avatar),
            'name' => $this->name,
            'time' => date("d/m/Y", strtotime($this->created_at)),
            'items' => StatusUserItemsCollection::collection($this->stories),
        ];
            
    }


}
