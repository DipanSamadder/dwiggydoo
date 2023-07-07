<?php

namespace App\Http\Controllers\Api;
use App\Models\NotPetQuestion;
use App\Http\Resources\NotPetCollection;

class NotPetQuestionController extends Controller
{
 
    public function get_questions(){

        return new NotPetCollection(NotPetQuestion::orderBy('created_at', 'desc')->whereDate('published', '<', now())->whereDate('expire_at', '>=', now())->get());
    }
}
