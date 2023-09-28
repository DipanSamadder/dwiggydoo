<?php

namespace App\Http\Controllers\Blogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\PostCategory;
use App\Interfaces\BlogInterfaces;
use Validator;

class BlogController extends Controller
{
    protected $blogRepositories;
    function __construct(BlogInterfaces $blogRepositories){
        $this->blogRepositories = $blogRepositories;
        $this->middleware('permission:blog|add-blog|edit-blog|delete-blog', ['only' => ['index','get_ajax_roles']]);
        $this->middleware('permission:add-blog', ['only' => ['create','store']]);
        $this->middleware('permission:edit-blog', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-blog', ['only' => ['destroy']]);
        
    }
    
    public function index(){
        $page['title'] = 'Show all blog';
        $page['name'] = 'blog';
        return view('backend.modules.websites.blogs.show', compact('page'));
    }

    public function get_ajax_blogs(Request $request){
        $data = $this->blogRepositories->ajax_show($request->all());
        return view('backend.modules.websites.blogs.ajax_pages', compact('data'));
    }

    public function edit(Request $request, $id){
        $lang = $request->lang;
        $data = Post::with(['tags', 'categories'])->where('id', $id)->first();
        $page['title'] = 'Edit Data';
        return view('backend.modules.websites.blogs.edit', compact('data', 'page', 'lang'));
    }

    public function update(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:350',
            'status' => 'required|integer'
        ]);

        if($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()]);
        }
        
        $data = $this->blogRepositories->update($request->all()); 
        if($data == true) {  
            return response()->json(['status' => 'success', 'message'=> 'Data update success.']);
        }else{
            return response()->json(['status' => 'error', 'message'=> 'Data update failed.']);
        }

    }

}
