<?php

namespace App\Http\Controllers\Dogs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Breed;
use App\Models\Dog;
use Validator;

class BreedsController extends Controller
{
    function __construct(){
       
        $this->middleware('permission:show breeds|add breeds|edit breeds|delete breeds', ['only' => ['index','get_ajax_breeds']]);
        $this->middleware('permission:add breeds', ['only' => ['create','store']]);
        $this->middleware('permission:edit breeds', ['only' => ['edit','update']]);
        $this->middleware('permission:delete breeds', ['only' => ['destroy']]);
        
    }

    public function index(){

        $page['title'] = 'Show all breeds';
        return view('backend.modules.dogs.breeds.show', compact('page'));
    }

    public function get_ajax_breeds(Request $request){
   
        if($request->page != 1){$start = $request->page * 25;}else{$start = 0;}
        $search = $request->search;
        $sort = $request->sort;

        $data = Breed::where('name','!=','');
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
                    $data->where('status', 1);
                    break;
                case 'deactive':
                    $data->where('status', 0);
                    break;
                default:
                    $data->orderBy('created_at', 'desc');
                    break;
            }
        }
        $data = $data->skip($start)->paginate(25);
        return view('backend.modules.dogs.breeds.ajax_files', compact('data'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
        ]);


        if($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()]);
        }

     
        if(Breed::where('name', 'like', '%'.$request->name)->first() == null){
            $breed =  new Breed;
            $breed->name = $request->name;
            $breed->status = 1;
            $breed->save();
            return response()->json(['status' => 'success', 'message'=> 'Data insert success.']);
      
        }else{
            return response()->json(['status' => 'warning', 'message'=> 'Details already exist! please try agin.']);
        }
    }

    public function edit(Request $request){
        $data = Breed::where('id', $request->id)->first();
        return view('backend.modules.dogs.breeds.edit', compact('data'));
    }
    
    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
        ]);


        if($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()]);
        }
     
        if(Breed::whereNotIn('id', [$request->id])->where('name', $request->name)->first() == null){
            $breed =  Breed::findOrFail($request->id);
            $breed->name = $request->name;            
            $breed->status = $request->status;            
            if($breed->save()){
                return response()->json(['status' => 'success', 'message'=> 'Data update success.']);
            }else{
                return response()->json(['status' => 'error', 'message'=> 'Data update failed.']);
            }
        }else{
            return response()->json(['status' => 'warning', 'message'=> 'Details already exist! please try agin.']);
        }

    }

    public function destory(Request $request){

        $breed = Breed::findOrFail($request->id);
        if($breed != ''){
            if($breed->delete()){
                return response()->json(['status' => 'success', 'message' => 'Data deleted successully.']);
            }else{
                return response()->json(['status' => 'error', 'message' => 'Data deleted failed.']);
            }
        }else{
            return response()->json(['status' => 'warning', 'message' => 'Data Not found.']);
        }
       
    }
    
    public function status(Request $request){

        $breed = Breed::findOrFail($request->id);
        if($breed != ''){
            if($breed->status != $request->status){
                $breed->status = $request->status;
                $breed->save();
                return response()->json(['status' => 'success', 'message' => 'Status update successully.']);
            }else{
                return response()->json(['status' => 'error', 'message' => 'Status update failed.']);
            }
        }else{
            return response()->json(['status' => 'warning', 'message' => 'Data Not found.']);
        }
       
    }

    public function all_breeds(){
        $top_breeds = Breed::where('top', 1)->where('status', 1)->orderBy('name', 'ASC')->get();
        $breeds = Breed::where('status', 1)->orderBy('name', 'ASC')->get();
        return view('frontend.pages.breeds', compact('top_breeds', 'breeds'));
    }

    public function breeds_search(Request $request){
        if(!empty($request->text)){
            $data = Breed::where('name', 'LIKE', '%'.$request->text.'%')->where('status', 1)->limit(20)->get();
            return view('frontend.partials.breed-search', compact('data'));
        }
    }

    public function find_breeds_by_slug($slug){
        $breed = Breed::where('slug', $slug)->first();
     
        $dog = Dog::where('breed_id', $breed->id)->where('status', 1)->get();
        return view('frontend.pages.breeds.single-breeds', compact('dog', 'breed'));
    }
    
    public function filter_breeds_by_slug(Request $request){

        $breed = Breed::where('id',  $request->breed_id)->first();
        $dog = Dog::where('breed_id', $request->breed_id)->where('user_id', '!=', auth()->user()->id);

         // Filter by minimum age
        if ($request->has('age_min')) {
            $minAge = (float)$request->input('age_min');
            $dog =  $dog->where('age', '>=', $minAge);
        }

        // Filter by maximum age
        if ($request->has('age_max')) {
            $maxAge = (float)$request->input('age_max');
            $dog =  $dog->where('age', '<=', $maxAge);
        }

        if($request->has('good_genes')){
            if($request->good_genes != 'all'){
                $dog = $dog->where('good_genes_id', $request->good_genes);
            }
        }
        
     
        if($request->has('gender')){
            $dog = $dog->where('gender', $request->gender);
        }
        
        $dog = $dog->where('status', 1)->get();
        return view('frontend.pages.breeds.single-breeds-dog-items', compact('dog', 'breed'));
    }
}
