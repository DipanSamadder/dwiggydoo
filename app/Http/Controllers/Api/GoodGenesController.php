<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\GoodGenesCollection;
use App\Models\GoodGene;

class GoodGenesController extends Controller
{
    public function index()
    {
        return new GoodGenesCollection(GoodGene::orderBy('name', 'ASC')->latest()->get());
    }

}
