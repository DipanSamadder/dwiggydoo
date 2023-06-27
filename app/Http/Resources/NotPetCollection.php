<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class NotPetCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'success' => true,
            'data' => $this->collection->map(function($data) {
                return [
                    'question' => $data->question,
                    'option' => $data->option,
                    'answer' => $data->answer,
                    'published' => $data->published,
                    'expire_at' => $data->expire_at,
                    'reward' => $data->reward,
                    'created_at' => $data->created_at,
                ];
            }),
            'message' => 'Show questions.',
            'status' => 200
        ];
    }

}
