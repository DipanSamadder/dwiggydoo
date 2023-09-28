<?php

namespace App\Http\Controllers\Blogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Validator;

class CategoryController extends Controller
{

    function __construct(){
       
        $this->middleware('permission:categories|add-categories|edit-categories|delete-categories', ['only' => ['index','get_ajax_files']]);
        $this->middleware('permission:add-categories', ['only' => ['create','store']]);
        $this->middleware('permission:edit-categories', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-categories', ['only' => ['destroy']]);
        
    }
    
    public function index(){
        $page['title'] = 'Show all category';
        $page['name'] = 'Category';
        return view('backend.modules.websites.blogs.categories.index', compact('page'));
    }

    public function get_ajax_categories(Request $request){

        if($request->page != 1){$start = $request->page * 15;}else{$start = 0;}
        $search = $request->search;
        $sort = $request->sort;

        $data = Category::where('name', '!=', '');

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

        return view('backend.modules.websites.blogs.categories.ajax_files', compact('data'));

    }

    public function edit(Request $request){
        $data = Category::where('id', $request->id)->first();
        return view('backend.modules.websites.blogs.categories.edit', compact('data'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
        ]);

        if($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()]);
        }

        $slug = dsld_generate_slug_by_text_with_model('App\Models\Category', $request->name, 'slug');
        if(Category::where('name', $request->name)->first() == null){
            $category =  new Category;
            $category->name = $request->name;
            $category->slug = $slug;
            if($category->save()){
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
        $category =  Category::findOrFail($request->id);
        $category->name = $request->name;

        if($category->save()){
            return response()->json(['status' => 'success', 'message'=> 'Data update success.']);
        }
    
        return response()->json(['status' => 'warning', 'message'=> 'Details already exist! please try agin.']);
        
    }
    
    public function destory(Request $request){

        if(Category::destroy($request->id)){
            return response()->json(['status' => 'success', 'message' => 'Data deleted successully.']);   
        }else{
            return response()->json(['status' => 'warning', 'message' => 'Data Not found.']);
        }
       
    }
}
