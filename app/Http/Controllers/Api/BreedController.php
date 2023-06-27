<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\BreedCollection;
use App\Models\Breed;



class BreedController extends Controller
{
    public function index()
    {
        return new BreedCollection(Breed::orderBy('name', 'ASC')->latest()->get());
    }

    public function top()
    {
        return new BreedCollection(Breed::where('top', 1)->orderBy('name', 'ASC')->get());
    }
}
