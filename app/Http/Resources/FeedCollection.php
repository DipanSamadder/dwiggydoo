<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class FeedCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            
            'id'      => $this->id,
            'slug'      => $this->slug,
            'dogs' => [
                        'id' => $this->dogs->id,
                        'name' => $this->dogs->name,
                        'avatar' => dsld_uploaded_file_path($this->dogs->avatar),
                        'avatar_original' => dsld_uploaded_file_path($this->dogs->avatar_original),
                    ],
            'owner' => [
                        'id' => $this->dogs->user->id,
                        'name' => $this->dogs->user->name,
                        'avatar' => dsld_uploaded_file_path($this->dogs->user->avatar),
                        'avatar_original' => dsld_uploaded_file_path($this->dogs->user->avatar_original),
                    ],

            'likes' => LikeCollection::collection($this->likes),
            'likes_counts' => $this->likes()->count(),
            'comments' => CommentCollection::collection($this->comments->where('level', 1)),
            'comments_counts' => $this->comments()->count(),

            'media' => $this->media,
            'media_url' => dsld_uploaded_file_path($this->media),
            'content' => $this->content,
            'type' => $this->type,
            'status' => $this->status,
            'created_at,' => $this->created_at,
            'updated_at,' => $this->updated_at
        ];
            
    }


}
