<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CountryCollection;

use App\Models\Country;

class CountriesController extends Controller
{
    public function get_all_countries_list()
    {
        return new CountryCollection(Country::all());
    }
}
