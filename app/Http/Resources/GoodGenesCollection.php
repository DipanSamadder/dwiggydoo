<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GoodGenesCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'success' => true,
            'data' => $this->collection->map(function($data) {
                return [
                    'name' => $data->name,
                    'status' => $data->status,
                ];
            }),
            'message' => 'Show all good genes list',
            'status' => 200
        ];
    }
}
