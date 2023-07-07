<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentCollection extends JsonResource
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
            'content' => $this->content,
            'allReplyComment' => $this->allReplyComment,
            'parents_id' => $this->parents_id,
            'level' => $this->level,
            'status' => $this->status,
            'created_at,' => $this->created_at,
            'updated_at,' => $this->updated_at

        ];
            
    }
}
