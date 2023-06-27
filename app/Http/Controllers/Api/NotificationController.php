<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\User;
use App\Http\Resources\NotificationCollection;
use Validator;

class NotificationController extends Controller{

    public function index($id){


        $notif = Notification::where('user_id', $id)->whereNotIN('is_hide', [1])->get();
        if(count($notif) > 0){
            return $this->sendResponse(NotificationCollection::collection($notif), 'Show notifications.');
        }else{
            return $this->sendError('Notification not found.');

        }

    }
     

    public function seen(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric',
            'id' => 'required|numeric',
        ],
        [
            'user_id.required' => 'User id required.',
            'id.required' => 'Notification id required.',
        ]
        );

        if($validator->fails()){
            return $this->sendError($validator->messages());       
        }

        $notif = Notification::where('id', $request->id)->where('user_id', $request->user_id)->where('is_view', 0)->first();

        if(is_null($notif)){
            return $this->sendError('Notification updated or not found.');
         }else{
           $notif->is_view = 1;
           $notif->save(); 

           return $this->sendResponse(new NotificationCollection($notif), 'Your notification have been seen.');
         }
    	
    }

    public function hide(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric',
            'id' => 'required|numeric',
        ],
        [
            'user_id.required' => 'User id required.',
            'id.required' => 'Notification id required.',
        ]
        );

        if($validator->fails()){
            return $this->sendError($validator->messages());       
        }

        $notif = Notification::where('id', $request->id)->where('user_id', $request->user_id)->where('is_hide', 0)->first();

        if(is_null($notif)){
            return $this->sendError('Notification updated or not found.');
         }else{
           $notif->is_hide = 1;
           $notif->save(); 

           return $this->sendResponse(new NotificationCollection($notif), 'Your notification have been hide.');
         }
    	
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric',
            'reason_key' => 'required',
            'sub' => 'required',
            'message' => 'required',
        ],
        [
            'user_id.required' => 'User id required.',
            'reason_key.required' => 'Reasons id required.',
            'sub.required' => 'Subject id required.',
            'message.required' => 'Message id required.',
        ]
        );

        if($validator->fails()){
            return $this->sendError($validator->messages());       
        }

    	$user = User::find($request->user_id);
    	if($user){

    		$notif = new Notification;
	    	$notif->sender_id = $request->sender_id;
	    	$notif->reason_key = $request->reason_key;
	    	$notif->reason_id = $request->reason_id;
	    	$notif->user_id = $request->user_id;
	    	$notif->sub = $request->sub;
	    	$notif->message = $request->message;
	    	$notif->is_view = 0;
	    	$notif->is_hide = 0;
	    	$notif->save();

	    	if(is_null($notif)){
                return $this->sendError('Notification not successfull.');
                
	        }else{
                return $this->sendResponse(new NotificationCollection($notif), 'Notifiction store successfull.');
	        }

    	}else{
            return $this->sendError('User not found.');
    	}

    }
}

