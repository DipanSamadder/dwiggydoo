<?php

namespace App\Http\Controllers\Dogs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GoodGene;
use Validator;

class GenesController extends Controller
{
    function __construct(){
       
        $this->middleware('permission:show breeds|add breeds|edit breeds|delete breeds', ['only' => ['index','get_ajax_breeds']]);
        $this->middleware('permission:add breeds', ['only' => ['create','store']]);
        $this->middleware('permission:edit breeds', ['only' => ['edit','update']]);
        $this->middleware('permission:delete breeds', ['only' => ['destroy']]);
        
    }

    public function index(){

        $page['title'] = 'Show all breeds';
        return view('backend.modules.dogs.genes.show', compact('page'));
    }

    public function get_ajax_genes(Request $request){
   
        if($request->page != 1){$start = $request->page * 25;}else{$start = 0;}
        $search = $request->search;
        $sort = $request->sort;

        $data = GoodGene::where('name','!=','');
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
        return view('backend.modules.dogs.genes.ajax_files', compact('data'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
        ]);


        if($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()]);
        }

     
        if(GoodGene::where('name', 'like', '%'.$request->name)->first() == null){
            $breed =  new GoodGene;
            $breed->name = $request->name;
            $breed->status = 1;
            $breed->save();
            return response()->json(['status' => 'success', 'message'=> 'Data insert success.']);
      
        }else{
            return response()->json(['status' => 'warning', 'message'=> 'Details already exist! please try agin.']);
        }
    }

    public function edit(Request $request){
        $data = GoodGene::where('id', $request->id)->first();
        return view('backend.modules.dogs.genes.edit', compact('data'));
    }
    
    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
        ]);


        if($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()]);
        }
     
        if(GoodGene::whereNotIn('id', [$request->id])->where('name', $request->name)->first() == null){
            $breed =  GoodGene::findOrFail($request->id);
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

        $breed = GoodGene::findOrFail($request->id);
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

        $breed = GoodGene::findOrFail($request->id);
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
}
