<?php
namespace App\Http\Controllers\Dogs;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Friendship;
use App\Models\Block;
use App\Models\Report;
use App\Models\Dog;
use App\Models\Breed;
use Session;
use Validator;
use DB;

class FriendshipController extends Controller
{
   

    public function connections()
    {
        $id = Session::get('defaultDogDetails.id');
        $user = Dog::find($id);

        $fcount =  $user->connectedfriendships($user->id)->count();
        // $id = Session::get('defaultDogDetails.id');
        // $user = Dog::find($id);
        // $Friendship =  $user->connectedfriendships($user->id);
        return view('frontend.pages.connections.connection-list', compact('fcount'));
    }
   

    public function filter_connections(Request $request){
        $breed = Breed::where('id',  $request->breed_id)->first();
        $dog = Dog::where('breed_id', $request->breed_id)->where('user_id', '!=', auth()->user()->id);

        $ddog_id = Session::get('defaultDogDetails.id');
        $user = Dog::find($ddog_id);
        $friendship =  Friendship::where(function ($query) use ($ddog_id) {
                            $query->where('dogable_id', $ddog_id)
                                ->where('status', 1);
                        })
                        ->orWhere(function ($query) use ($ddog_id) {
                            $query->where('receiver_id', $ddog_id)
                                ->where('status', 1);
                        });


         // Filter by minimum age
        if ($request->has('age_min')) {
            $minAge = (float)$request->input('age_min');
            $dog =  $dog->where('age', '>=', $minAge);
        }
        switch($request->filter){
            case 'recent':
                $friendship = $friendship->orderBy('created_at', 'desc');
                break;
            case 'old':
                $friendship = $friendship->orderBy('created_at', 'asc');

                break;

            default:
            $friendship = $friendship->orderBy('created_at', 'desc');

        }
            
        
        $dog = $dog->where('status', 1)->get();

       
        $friendship = $friendship->where('status', 1)->get();
        
     
        return view('frontend.pages.connections.ajax-items', compact('friendship'));
    }
    
    public function connections_setting(Request $request){
        $udog_id = Session::get('defaultDogDetails.id');

        $cfriend = '';
        

        $friendship = Friendship::find($request->friendship_id);
        if($friendship->dogable_id == $udog_id){
            $cfriend = Dog::find($friendship->receiver_id);
        }else if($friendship->receiver_id == $udog_id){
            $cfriend = Dog::find($friendship->dogable_id);
        }
        return view('frontend.pages.connections.ajax-modals-settings', compact('cfriend','friendship', 'udog_id'));
    }
   
}
