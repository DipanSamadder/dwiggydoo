<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class DogCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            
            'id'      => $this->id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'age' => $this->age,
            'avatar' => dsld_uploaded_file_path($this->avatar),
            'avatar_original' => dsld_uploaded_file_path($this->avatar_original),
            'good_genes_id' => $this->good_genes_id,
            'breed_id,' => $this->breed_id,
            'gender,' => $this->gender,
            'is_default,' => $this->is_default,
            'status,' => $this->status,
            'created_at,' => $this->created_at,
            'updated_at,' => $this->updated_at
        ];
            
    }


}
