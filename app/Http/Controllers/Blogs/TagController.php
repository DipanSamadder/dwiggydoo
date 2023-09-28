<?php

namespace App\Http\Controllers\Blogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Validator;

class TagController extends Controller
{

    function __construct(){
       
        $this->middleware('permission:tags|add-tags|edit-tags|delete-tags', ['only' => ['index','get_ajax_files']]);
        $this->middleware('permission:add-tags', ['only' => ['create','store']]);
        $this->middleware('permission:edit-tags', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-tags', ['only' => ['destroy']]);
        
    }
    
    public function index(){
        $page['title'] = 'Show all tag';
        $page['name'] = 'Tag';
        return view('backend.modules.websites.blogs.tags.index', compact('page'));
    }

    public function get_ajax_tags(Request $request){

        if($request->page != 1){$start = $request->page * 15;}else{$start = 0;}
        $search = $request->search;
        $sort = $request->sort;

        $data = Tag::where('name', '!=', '');

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
                default:
                    $data->orderBy('created_at', 'desc');
                    break;
            }
        }

        $data = $data->skip($start)->paginate(15);

        return view('backend.modules.websites.blogs.tags.ajax_files', compact('data'));

    }

    public function edit(Request $request){
        $data = Tag::where('id', $request->id)->first();
        return view('backend.modules.websites.blogs.tags.edit', compact('data'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
        ]);

        if($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()]);
        }
        $slug = dsld_generate_slug_by_text_with_model('App\Models\Tag', $request->name, 'slug');

        if(Tag::where('name', $request->name)->first() == null){
            $tag =  new Tag;
            $tag->name = $request->name;
            $tag->slug = $slug;
            if($tag->save()){
                return response()->json(['status' => 'success', 'message'=> 'Data insert success.']);
            }
            return response()->json(['status' => 'error', 'message'=> 'Data insert failed.']);
            
        }else{
            return response()->json(['status' => 'warning', 'message'=> 'Details already exist! please try agin.']);
        }
    }
    
    
    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
        ]);

        if($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()]);
        }
        $tag =  Tag::findOrFail($request->id);
        $tag->name = $request->name;

        if($tag->save()){
            return response()->json(['status' => 'success', 'message'=> 'Data update success.']);
        }
    
        return response()->json(['status' => 'warning', 'message'=> 'Details already exist! please try agin.']);
        
    }

    public function destory(Request $request){
        if(Tag::destroy($request->id)){
            return response()->json(['status' => 'success', 'message' => 'Data deleted successully.']);   
        }else{
            return response()->json(['status' => 'warning', 'message' => 'Data Not found.']);
        }
       
    }
}
