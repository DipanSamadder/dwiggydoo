<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\FeedCollection;
use App\Http\Resources\CommentCollection;
use Illuminate\Http\Request;
use App\Models\Feed;
use App\Models\Like;
use App\Models\Dog;
use App\Models\Comment;
use Validator;

class FeedController extends Controller
{
    protected $userID;
    public function __construct(){
        $this->userID = auth('sanctum')->user();
    }

    public function create(Request $request)
    {

        $type = array(
            "image/jpg"=>"image",
            "image/jpeg"=>"image",
            "image/png"=>"image",
            "image/svg"=>"image",
            "image/webp"=>"image",
            "image/gif"=>"image",
            "video/mp4"=>"video",
            "video/mpg"=>"video",
            "video/mpeg"=>"video",
            "video/webm"=>"video",
            "video/ogg"=>"video",
            "video/avi"=>"video",
            "video/mov"=>"video",
            "video/flv"=>"video",
            "video/swf"=>"video",
            "video/mkv"=>"video",
            "video/wmv"=>"video",
        );

        $validator = Validator::make($request->all(), [
                'dogs_id' => 'required',
                'media' => 'required_without:content',
                'content' => 'required_without:media',
            ]
        );
        if($validator->fails()){
            return $this->sendError($validator->messages());
        }

        $dog = Dog::find($request->dogs_id);


        $slug = dsld_generate_slug_by_text_with_model('App\Models\Feed', dsld_random_code_generator(10), 'slug');

        $content = '';

        if($request->has('content')){
            $content = $request->content;
        }

        $feed = $dog->feeds()->create([
            'content' => $content,
            'slug' => $slug,
            'status' => 1,
        ]);

     
        if($request->hasFile('media')){
         
            $files = $feed->addMedia($request->file('media'))
                        ->withCustomProperties(['purpose' => 'Dog Feeds'])
                        ->toMediaCollection('feeds', 'feeds');

            $image_type = 'image';
            foreach($type as $key => $value){
                if($key == $files->mime_type){
                    $image_type = $value;
                }
            }
            $feed->update([
                'media' => $files->id,
                'slug' => $slug.$feed->id,
                'type' => $image_type
            ]);

        }else{
            $feed->update([
                'media' => '',
                'slug' => $slug.$feed->id,
                'type' => ''
            ]);
        }

        return $this->sendResponse(new FeedCollection($feed), 'check');
    }

    public function update(Request $request)
    {

        $type = array(
            "image/jpg"=>"image",
            "image/jpeg"=>"image",
            "image/png"=>"image",
            "image/svg"=>"image",
            "image/webp"=>"image",
            "image/gif"=>"image",
            "video/mp4"=>"video",
            "video/mpg"=>"video",
            "video/mpeg"=>"video",
            "video/webm"=>"video",
            "video/ogg"=>"video",
            "video/avi"=>"video",
            "video/mov"=>"video",
            "video/flv"=>"video",
            "video/swf"=>"video",
            "video/mkv"=>"video",
            "video/wmv"=>"video",
        );

        $validator = Validator::make($request->all(), [
                'id' => 'required',
                'dogs_id' => 'required',
                'media' => 'required_without:content',
                'content' => 'required_without:media',
                'status' => 'required',
            ]
        );
        if($validator->fails()){
            return $this->sendError($validator->messages());
        }

        $feed = Feed::where('id', $request->id)->where('feedable_id', $request->dogs_id)->first();

        if($feed){
            $feed->feedable_id = $request->dogs_id;
            $feed->status = $request->status;

            if($request->has('content')){
                $feed->content = $request->content;
            }

            $feed->save();
            
            if($request->hasFile('media')){
             
                $files = $feed->addMedia($request->file('media'))
                            ->withCustomProperties(['purpose' => 'Dog feed'])
                            ->toMediaCollection('feeds', 'feeds');

                $image_type = 'image';
                foreach($type as $key => $value){
                    if($key == $files->mime_type){
                        $image_type = $value;
                    }
                }
                $feed->update([
                    'media' => $files->id,
                    'type' => $image_type
                ]);

            }

        }else{
            return $this->sendError('Dog post Not found');    
        }

        
        return $this->sendResponse(new FeedCollection($feed), 'Dog post update successful.');
    }
    public function status_private_feed(Request $request)
    {


        $validator = Validator::make($request->all(), [
                'id' => 'required',
                'dogs_id' => 'required',
                'status' => 'required',
            ]
        );
        if($validator->fails()){
            return $this->sendError($validator->messages());
        }

        $feed = Feed::where('id', $request->id)->where('feedable_id', $request->dogs_id)->first();
        $feed->update(['status' => $request->status]);
        
        return $this->sendResponse(new FeedCollection($feed), 'Dog post status update successful.');
    }
    public function delete_feed(Request $request)
    {


        $validator = Validator::make($request->all(), [
                'id' => 'required',
                'dogs_id' => 'required',
            ]
        );

        if($validator->fails()){
            return $this->sendError($validator->messages());
        }

        $post = Feed::where('id', $request->id)->where('feedable_id', $request->dogs_id)->first();
        $post->delete();
        
        return $this->sendResponse([], 'Dog post deleted successful.');
    }

    public function show_my_dog_feed($id){
        $valid_user = dsld_is_dog_owner($id, $this->userID->id);
        if($valid_user){
            $dogPost = Feed::with('likes')->where('dogs_id', $id)->get();
            return $this->sendResponse(FeedCollection::collection($dogPost), 'Show your dog feed.');
        }
        return $this->sendError([], 'Authorize Issues. You are not vaild user.');   
    }

   public function show_single_feed_by_slug($slug){
        $dogPost = Feed::with('likes')->where('slug', $slug)->get();
        return $this->sendResponse(FeedCollection::collection($dogPost), 'Show your dog feed.');
    }




    public function show_dog_feeds($id){
        $dog = Dog::find($id);
        $friendIds = $dog->sentFriendRequestsConnected()->pluck('receiver_id')->toArray();
        $friendIds2 = $dog->receivedFriendRequestsConnected()->pluck('dogable_id')->toArray();

        $friends = array_merge($friendIds, $friendIds2);
        $friendsWithMe = array_merge([$id], $friends);

        $dogPost = $dog->connectedFriendsFeeds($friendsWithMe);
        return $this->sendResponse(FeedCollection::collection($dogPost), 'Show your dog feed.');
    }





    public function like_feed(Request $request){

        $validator = Validator::make($request->all(), [
                'feeds_id' => 'required',
                'dogs_id' => 'required',
            ]
        );
        if($validator->fails()){
            return $this->sendError($validator->messages());
        }

        $dogFeed = Feed::where('id', $request->feeds_id)->first();

        $like = like::where('likeable_id', $request->feeds_id)->where('dogs_id', $request->dogs_id)->first();
        if(!is_null($like)){
            $like->delete();
            return $this->sendResponse([], 'Dog feed unlike successful.');  
        }else{
            $dogFeed->likes()->create([
                'dogs_id' => $request->dogs_id,
            ]);
            return $this->sendResponse([], 'Dog feed like successful.');
        }
        
    }


    public function comment_feed(Request $request){

        $validator = Validator::make($request->all(), [
                'feeds_id' => 'required',
                'dogs_id' => 'required',
                'content' => 'required',
            ]
        );
        if($validator->fails()){
            return $this->sendError($validator->messages());
        }

        $dogPost = Feed::where('id', $request->feeds_id)->first();

        $level = isset($request->comment_id) ? dsld_find_parent_level( 'App\Models\Comment', $request->comment_id) : 1;

        $dogPost->comments()->create([
                'dogs_id' => $request->dogs_id,
                'parents_id' => isset($request->comment_id) ? $request->comment_id : 0,
                'level' => $level,
                'content' => $request->content,
            ]);

        return $this->sendResponse(new CommentCollection($dogPost->comment), 'Dog feeds comment successful.');
        
        /*
        $comment = Comment::where('commentable_id', $request->feeds_id)->where('dogs_id', $request->dogs_id)->first();*/

        /*if(!is_null($comment)){
            $comment->delete();
            return $this->sendResponse([], 'Dog post comment successful.');  
        }*/

    }
}
