<?php

namespace App\Http\Controllers\Dogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dog;
use Validator;
use Hash;
use Session;
class DogsController extends Controller
{
    function __construct(){
       
        $this->middleware('permission:show dogs|add dogs|edit dogs|delete dogs', ['only' => ['index','get_ajax_dogss']]);
        $this->middleware('permission:add dogs', ['only' => ['create','store']]);
        $this->middleware('permission:edit dogs', ['only' => ['edit','update']]);
        $this->middleware('permission:delete dogs', ['only' => ['destroy']]);
        
    }

    public function index(){

        $page['title'] = 'Show all Dogs';
        return view('backend.modules.dogs.show', compact('page'));
    }

    public function get_ajax_dogs(Request $request){

        if($request->page != 1){$start = $request->page * 24;}else{$start = 0;}
        $search = $request->search;
        $sort = $request->sort;

        $data = Dog::where('name','!=','');
        if($search != ''){
            $data->where('name', 'like', '%'.$search.'%');
        }
       
        if($sort != ''){
            switch ($request->sort) {
                case 'newest':
                    $data->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $data->orderBy('created_at', 'asc');
                    break;
                case 'active':
                    $data->where('status', 0);
                    break;
                case 'deactive':
                    $data->where('status', 1);
                    break;
                default:
                    $data->orderBy('created_at', 'desc');
                    break;
            }
        }
        $data = $data->skip($start)->paginate(24);
        return view('backend.modules.dogs.ajax_files', compact('data'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50'
        ]);


        if($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()]);
        }

     

        $user =  new Dog;
        $user->name = $request->name;
        
        if($user->save()){
            return response()->json(['status' => 'success', 'message'=> 'Data insert success.']);
        }else{
            return response()->json(['status' => 'error', 'message'=> 'Data insert failed.']);
        }
       
    }
    public function edit($id){

        $data = Dog::where('id', $id)->first();
        $page['title'] = 'Edit Data';
        return view('backend.modules.dogs.edit', compact('data', 'page'));
    }

    public function update(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50'
        ]);


        if($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()]);
        }
     
        if(Dog::whereNotIn('id', [$request->id])->where('name', $request->name)->where('email', $request->email)->where('phone', $request->phone)->first() == null){
            $user =  Dog::findOrFail($request->id);
            $user->name = $request->name;
           
            if($user->save()){                
                return response()->json(['status' => 'success', 'message'=> 'Data update success.']);
            }else{
                return response()->json(['status' => 'error', 'message'=> 'Data update failed.']);
            }
        }else{
            return response()->json(['status' => 'warning', 'message'=> 'Details already exist! please try agin.']);
        }

    }
    public function destory(Request $request){

        $user = Dog::findOrFail($request->id);
        if($user != ''){
            if($user->delete()){
                return response()->json(['status' => 'success', 'message' => 'Data deleted successully.']);
            }else{
                return response()->json(['status' => 'error', 'message' => 'Data deleted failed.']);
            }
        }else{
            return response()->json(['status' => 'warning', 'message' => 'Data Not found.']);
        }
       
    }
    public function status(Request $request){

        $user = Dog::findOrFail($request->id);
        if($user != ''){
            if($user->banned != $request->status){
                $user->banned = $request->status;
                $user->save();
                return response()->json(['status' => 'success', 'message' => 'Status update successully.']);
            }else{
                return response()->json(['status' => 'error', 'message' => 'Status update failed.']);
            }
        }else{
            return response()->json(['status' => 'warning', 'message' => 'Data Not found.']);
        }
       
    }

    public function near_me(Request $request){
        $id = Session::get('defaultDogDetails.id');
        $user = Dog::find($id);
        $near_me_dogs = Dog::where('user_id', '!=', $user->id)->limit(5)->get();
        return view('frontend.pages.dogs.ajax-near-me', compact('near_me_dogs'));
    }
    public function find_dogs_by_slug($slug){
        $dogs = Dog::where('slug', $slug)->where('status', 1)->first();

        if(!is_null($dogs)){
            return view('frontend.pages.dogs.single-dogs', compact('dogs'));
        }
        abort(404);
    }
  
}
