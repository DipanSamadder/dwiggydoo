<?php
namespace App\Http\Controllers\Dogs;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Friendship;
use App\Models\Block;
use App\Models\Report;
use App\Models\Dog;
use Session;
use Validator;

class FriendshipController extends Controller
{
   

    public function connections()
    {
        // $id = Session::get('defaultDogDetails.id');
        // $user = Dog::find($id);
        // $Friendship =  $user->connectedfriendships($user->id);
        return view('frontend.pages.connections.connection-list');
    }

}
