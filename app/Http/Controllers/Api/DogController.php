<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\DogCollection;
use App\Models\Dog;
use App\Models\Friendship;

class DogController extends Controller
{
	protected $userID;
	public function __construct(){
		$this->userID = auth('sanctum')->user();
	}

    public function my_dogs()
    {
    	$data = Dog::with('user')->where('user_id', $this->userID->id)->get();
        return $this->sendResponse(DogCollection::collection($data), 'Show all your dogs.');
    }
    public function all_dogs()
    {
    	$data = Dog::all();
        return $this->sendResponse(DogCollection::collection($data), 'Show all dogs.');
    }

}
