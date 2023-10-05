<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Friendship;
use App\Models\Block;
use App\Models\Report;
use App\Http\Resources\FriendshipCollection;
use App\Models\Dog;

use Validator;

class FriendshipController extends Controller
{
    protected $userID;

    public function __construct(){
        $this->userID = auth('sanctum')->user();
    }

    public function send_request(Request $request)
    {
  
        $validate = Validator::make($request->all(),[
                'sender_id' => 'required',
                'receiver_id' => 'required',
            ]
        );

        if($validate->fails()){
            return $this->sendError($validate->messages(), '', 201);
        }
        $dog = Dog::find($request->sender_id);

        if(!is_null($dog)){

            $exists = dsld_check_is_store_friends_table($dog->id, $request->receiver_id);
            if(!is_null($exists)){
                return $this->sendError('You have already sent friend requiest.', '',201);
            }else{
                 $dog->friendship()->create([
                    'receiver_id' => $request->receiver_id,
                    ]
                );

                return $this->sendResponse(new FriendshipCollection($dog), 'You have sent friend requiest.');
            }

        }else{
            return $this->sendError([], 'Dog not found.', 201);
        }

       

    }

    public function get_friend_request_lists(Request $request){
        $validate = Validator::make($request->all(), [
                'dogs_id' => 'required',
            ]
        );

        if($validate->fails()){
            return $this->sendError($validate->messages());
        }
        $dog = Dog::find($request->dogs_id);
        
        $data = $dog->receivedFriendRequests;
         return $this->sendResponse(FriendshipCollection::collection($data), 'Show your friend requests.');
    }

    public function accept_friend_request(Request $request){
        $validate = Validator::make($request->all(), [
                'friendships_id' => 'required',
                'dogs_id' => 'required',
                'receiver_id' => 'required',
            ],[
                'friendships_id.required' => 'Friendship Id required.',
                'dogs_id.required' => 'your dog id required.',
                'receiver_id.required' => 'Receiver dog id required.',
            ]
        );

        if($validate->fails()){
            return $this->sendError($validate->messages());
        }

        $check = dsld_check_is_store_friends_table($request->dogs_id, $request->receiver_id);

        if($check){

            $friendship = Friendship::find($request->friendships_id);

            if(!is_null($friendship)){

                if($friendship->status == 1){
                return $this->sendError( 'Already connected with you.');
                }elseif($friendship->status == 2){
                    return $this->sendError( 'You are block from this dog.');
                }elseif($friendship->status == 3){
                    return $this->sendError( 'You are repoted by this dog.');
                }else{
                     $friendship->update(['status' => 1]);
                    return $this->sendResponse(new FriendshipCollection($friendship), 'Accept your friend request.');
                }

            }else{
                return $this->sendError( 'Sorry! Not found.');
            }
        }else{
                return $this->sendError( 'Sorry! Not found.');
        }
        
        
    }

    public function block_unblock_friend_request(Request $request){

        $validate = Validator::make($request->all(), [
                'friendships_id' => 'required',
                'dogs_id' => 'required',
                'receiver_id' => 'required',
            ],[
                'friendships_id.required' => 'Friendship Id required.',
                'dogs_id.required' => 'your dog id required.',
                'receiver_id.required' => 'Receiver dog id required.',
            ]
        );

        if($validate->fails()){
            return $this->sendError($validate->messages());
        }

        $check = dsld_check_is_store_friends_table($request->dogs_id, $request->receiver_id);
        

        if($check){

            $friendship = Friendship::find($request->friendships_id);

            if(!is_null($friendship)){
                $dog = Dog::find($request->dogs_id);
                if($friendship->status == 1){
                    $friendship->update(['status' => 2]);

                    $dog->block()->create([
                            'friendships_id' => $request->friendships_id,
                            'receiver_id' => $request->receiver_id,
                            'message' => is_null($request->message) ? '' : $request->message
                        ]);
                    return $this->sendResponse(new FriendshipCollection($friendship), 'Your friend is blocked');
                }elseif($friendship->status == 2){
                     $friendship->update(['status' => 1]);
                    $dog->block()->delete();
                    return $this->sendResponse(new FriendshipCollection($friendship), 'Your friend is unblocked.');
                }
                
            }else{
                return $this->sendError( 'Sorry! Not found.');
            }
        }else{
                return $this->sendError( 'Sorry! Not found.');
        }
           
    }

    public function report_friend_request(Request $request){

        $validate = Validator::make($request->all(), [
                'friendships_id' => 'required',
                'dogs_id' => 'required',
                'receiver_id' => 'required',
                'message' => 'required',
            ],[
                'friendships_id.required' => 'Friendship Id required.',
                'dogs_id.required' => 'your dog id required.',
                'receiver_id.required' => 'Receiver dog id required.',
                'message.required' => 'Message required.',
            ]
        );

        if($validate->fails()){
            return $this->sendError($validate->messages());
        }

        $check = dsld_check_is_store_friends_table($request->dogs_id, $request->receiver_id);
        

        if($check){

            $friendship = Friendship::find($request->friendships_id);

            if(!is_null($friendship)){
                $dog = Dog::find($request->dogs_id);
                if($friendship->status == 1){
                    $friendship->update(['status' => 3]);

                    $dog->report()->create([
                            'friendships_id' => $request->friendships_id,
                            'receiver_id' => $request->receiver_id,
                            'message' => is_null($request->message) ? '' : $request->message
                        ]);
                    return $this->sendResponse(new FriendshipCollection($friendship), 'Your friend is reported');
                }elseif($friendship->status == 3){
                     $friendship->update(['status' => 1]);
                    $dog->report()->delete();
                    return $this->sendResponse(new FriendshipCollection($friendship), 'Your friend is unreported.');
                }
                
            }else{
                return $this->sendError( 'Sorry! Not found.');
            }
        }else{
                return $this->sendError( 'Sorry! Not found.');
        }
        
    }

    public function reject_friend_request(Request $request){
        $validate = Validator::make($request->all(), [
                'friendships_id' => 'required',
                'dogs_id' => 'required',
                'receiver_id' => 'required',
            ],[
                'friendships_id.required' => 'Friendship Id required.',
                'dogs_id.required' => 'your dog id required.',
                'receiver_id.required' => 'Receiver dog id required.',
            ]
        );

        if($validate->fails()){
            return $this->sendError($validate->messages());
        }

        $check = dsld_check_is_store_friends_table($request->dogs_id, $request->receiver_id);

        if($check){

            $friendship = Friendship::find($request->friendships_id);

            if(!is_null($friendship)){

                if($friendship->status == 1){
                return $this->sendError( 'Already connected with you.');
                }elseif($friendship->status == 2){
                    return $this->sendError( 'You are block from this dog.');
                }elseif($friendship->status == 3){
                    return $this->sendError( 'You are repoted by this dog.');
                }else{
                     $friendship->delete();
                    return $this->sendResponse([], 'Friend requiest delete successfull.');
                }

            }else{
                return $this->sendError( 'Sorry! Not found.');
            }
        }else{
                return $this->sendError( 'Sorry! Not found.');
        }

        
    }

    public function show_connected_dogs($id)
    {

        $user = Dog::find($id);
        $Friendship =  $user->connectedfriendships($user->id);
        return $this->sendResponse(FriendshipCollection::collection($Friendship), 'Show all your connected dogs.');
    }

}
