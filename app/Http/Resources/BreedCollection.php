<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BreedCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'success' => true,
            'data' => $this->collection->map(function($data) {
                return [
                    'name' => $data->name,
                    'image' => $data->image,
                    'status' => $data->status,
                    'top' => $data->top,
                ];
            }),
            'message' => 'Show Breeds',
            'status' => 200
        ];
    }
}
