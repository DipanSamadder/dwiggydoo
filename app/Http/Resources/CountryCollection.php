<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CountryCollection extends ResourceCollection
{

    public function toArray($request)
    {
        return [
            'success' => true,
            'data' => $this->collection->map(function($data){
                return [
                    'name' => $data->name,
                    'code' => $data->code,
                    'phone_code' => $data->phone_code, 
                    'icon' => dsld_static_asset('assets/img/flags/'.strtolower($data->code).'.png'),
                ];
            }),
            'message' => 'Show all Country lists with phone code and flags',
            'status' => 200
        ];
    }


}
