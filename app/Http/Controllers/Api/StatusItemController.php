<?php

namespace App\Http\Controllers\Api;

use App\Models\StatusItem;
use App\Models\StatusItemsTrack;
use Illuminate\Http\Request;
use Validator; 
use App\Http\Resources\StatusItemsCollection;
use App\Http\Resources\StatusItemsTrackCollection;
use Carbon\Carbon;

class StatusItemController extends Controller
{

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric',
            'dsld_file' => 'required'
        ],
        [
            'user_id.required' => 'User id required.',
            'dsld_file.required' => 'File id required.',
        ]
        );

        if($validator->fails()){
            return $this->sendError($validator->messages());       
        }
        $slug = dsld_generate_slug_by_text_with_model('App\Models\StatusItem', dsld_random_code_generator(10), 'slug');

        $type = 'file';
        $status = new StatusItem;
        $status->user_id = $request->user_id;
        $status->expires_at = now()->addHour(24);
        $status->type = 'uploading.';
        $status->slug = $slug;
        $status->value = 0;

        if($request->hasFile('dsld_file')){
            $status->save();

            $type  = dsld_uploading_file_type($request->file('dsld_file'));
            $files =  array();

            if($type =='image'){

                $files = $status->addMedia($request->dsld_file)
                        ->withCustomProperties(['purpose' => 'status_image'])
                        ->toMediaCollection('status_image', 'uploads_status');

            }else if($type =='video'){
                 $files = $status->addMedia($request->dsld_file)
                        ->withCustomProperties(['purpose' => 'status_video'])
                        ->toMediaCollection('status_video', 'uploads_status');
            }

            $status->type = $type;
            $status->value = $files->id;
        }
        $status->save();
        $status->update([
            'slug' => $slug.$status->id,
        ]);
        return $this->sendResponse(new StatusItemsCollection($status), 'Status '.$type.' upload successfully');
    }


    public function seen(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric',
            'status_items_id' => 'required'
        ],
        [
            'user_id.required' => 'User id required.',
            'status_items_id.required' => 'Status id required.',
        ]
        );

        if($validator->fails()){
            return $this->sendError($validator->messages());       
        }
        $track = StatusItemsTrack::where('status_items_id', $request->status_items_id)->where('user_id', $request->user_id)->first();

        if(is_null($track)){
            $data = new StatusItemsTrack;
            $data->status_items_id = $request->status_items_id;
            $data->user_id = $request->user_id;
            $data->save();

            $success['status_items_id'] = $request->status_items_id;
            $success['user_id'] = $request->user_id;
            return $this->sendResponse($success, 'You have seen this status.');
        }
       
    }


    public function destroy(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric',
            'status_items_id' => 'required'
        ],
        [
            'user_id.required' => 'User id required.',
            'status_items_id.required' => 'Status id required.',
        ]
        );

        if($validator->fails()){
            return $this->sendError($validator->messages());       
        }
        $destroy = StatusItem::where('id', $request->status_items_id)->where('user_id', $request->user_id)->first();

        if(!is_null($destroy)){
            $destroy->delete();

            $success['status_items_id'] = $request->status_items_id;
            $success['user_id'] = $request->user_id;
            return $this->sendResponse($success, 'Your status has been deleted.');
        }else{
            return $this->sendError('Your status not found');
        }
       
    }


    public function all_status($id)
    {
        $now = Carbon::now();
        $addtime = Carbon::now()->addHour(24);
        $subtime = Carbon::now()->subHour(24);
        $status = StatusItem::whereBetween('created_at', [$subtime, $now])->whereBetween('expires_at', [$now, $addtime])->whereNotIn('user_id', [$id])->get();

        return $this->sendResponse(StatusItemsCollection::collection($status), 'Show status data.');
        
       
    }
    public function my_status($id)
    {
        $now = Carbon::now();
        $addtime = Carbon::now()->addHour(24);
        $subtime = Carbon::now()->subHour(24);
        $status = StatusItem::whereBetween('created_at', [$subtime, $now])->whereBetween('expires_at', [$now, $addtime])->whereIn('user_id', [$id])->get();

        return $this->sendResponse(StatusItemsCollection::collection($status), 'Show status data.');
        
       
    }
    public function dwiggydoo_status()
    {
        $now = Carbon::now();
        $addtime = Carbon::now()->addHour(24);
        $subtime = Carbon::now()->subHour(24);
        $status = StatusItem::whereBetween('created_at', [$subtime, $now])->whereBetween('expires_at', [$now, $addtime])->whereIn('user_id', ['1'])->get();

        return $this->sendResponse(StatusItemsCollection::collection($status), 'Show status data.');
        
       
    }
    public function status_by_slug($slug)
    {
        $now = Carbon::now();
        $addtime = Carbon::now()->addHour(24);
        $subtime = Carbon::now()->subHour(24);
        $status = StatusItem::whereBetween('created_at', [$subtime, $now])->whereBetween('expires_at', [$now, $addtime])->where('slug', $slug)->get();

        return $this->sendResponse(StatusItemsCollection::collection($status), 'Show status data.');
        
       
    }

    public function track_my_status($id)
    {


        $now = Carbon::now();
        $addtime = Carbon::now()->addHour(24);
        $subtime = Carbon::now()->subHour(24);

        $status = StatusItem::select('id')->whereBetween('created_at', [$subtime, $now])->whereBetween('expires_at', [$now, $addtime])->whereIn('user_id', [$id])->get();

        $data = array();

        foreach ($status as $sta) {
            
            $tacks = $sta->statusItemsTracks; 
            foreach ($tacks as $track) {
                array_push($data, $track);
            }
        }

        return $this->sendResponse(StatusItemsTrackCollection::collection($data), 'Track your status.');
        
       
    }


}
