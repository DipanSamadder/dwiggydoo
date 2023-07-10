<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\PostSection;
use App\Models\PostMeta;

use Validator;


class PagesController extends Controller
{

    function __construct(){
       
        $this->middleware('permission:show pages|add pages|edit pages|delete pages', ['only' => ['index','get_ajax_roles']]);
        $this->middleware('permission:add pages', ['only' => ['create','store']]);
        $this->middleware('permission:edit pages', ['only' => ['edit','update']]);
        $this->middleware('permission:delete pages', ['only' => ['destroy']]);
        
    }
    public function index(){
        $page['title'] = 'Show all pages';
        return view('backend.modules.websites.pages.show', compact('page'));
    }
    public function get_ajax_pages(Request $request){

        if($request->page != 1){$start = $request->page * 15;}else{$start = 0;}
        $search = $request->search;
        $sort = $request->sort;

        $data = Post::where('type','custom_page');
        if($search != ''){
            $data->where('title', 'like', '%'.$search.'%');
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
        $data = $data->skip($start)->paginate(15);
        return view('backend.modules.websites.pages.ajax_pages', compact('data'));
    }
    public function store(Request $request){
        if(dsld_have_user_permission('pages_add') == 0){
            return response()->json(['status' => 'error', 'message'=> "You have no permission."]);
        }
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->title));


        $validator = Validator::make($request->all(), [
            'title' => 'required|max:350',
            'status' => 'required|integer'
        ]);


        if($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()]);
        }

        if(isset($request->parent)){
            $parent_slug = $this->parent_slug($request->parent);
            if($request->type =='program_page' || $request->type =='department_page'){
                $slug = $parent_slug.'/'.strtolower($slug);
            }
        }
        
        $check_d =  Post::where('slug', $slug)->where('type', $request->type)->first();
        
        if(empty($check_d)){
            $page = new Page;
            $page->title = $request->title;
            $page->key_title = $request->title;
            $page->meta_title = $request->title;
            $page->meta_description =  $request->title;
            $page->keywords =  $request->title;
            if(isset($request->parent)){
                $page->parent =  $request->parent;
                $page->level =  $this->parent_level($request->parent);
            }else{
                $page->parent =  0;
                $page->level =  1;
            }

            if(isset($request->short_content)){
                $page->short_content =  $request->short_content;
            }

            $page->slug = $slug;
            $page->type = $request->type;
            $page->template = 'default';
            $page->is_meta = 0;
            $page->banner = $request->banner;
            $page->status = $request->status;
            $page->content = $request->content;
            
            if($page->save()){
                return response()->json(['status' => 'success', 'message'=> 'Data insert success.']);
            }else{
                return response()->json(['status' => 'error', 'message'=> 'Data insert failed.']);
            }
        }else{
            return response()->json(['status' => 'warning', 'message'=> 'Page & slug already exist! please try agin.']);
        }
    }
    public function edit($id){
        if(dsld_have_user_permission('pages_edit') == 0){
            return redirect()->route('backend.admin')->with('error', 'You have no permission');
        }
        $data = Post::where('id', $id)->first();
        $section = PostSection::where('page_id', $id)->orderBy('order', 'asc')->where('status', 1)->get();
        $page['title'] = 'Edit Data';
        return view('backend.modules.websites.pages.edit', compact('data', 'page', 'section'));
    }


    public function edit_extra(Request $request){
        if(dsld_have_user_permission('pages_edit') == 0){
            return redirect()->route('backend.admin')->with('error', 'You have no permission');
        }
        $data = Post::where('id', $request->id)->first();
        $sec = PostSection::where('id', $request->section_id)->where('page_id', $request->id)->orderBy('order', 'asc')->where('status', 1)->first();
        return view('backend.modules.websites.pages.extra_edit', compact('sec','data'));
    }

    
    public function parent_level($parent_id){
        if($parent_id > 0){
            return Post::where('id', $parent_id)->first()->level + 1;
        }else{
            return 1;
        } 
    }
    public function parent_slug($parent_id){
        if($parent_id > 0){
            return Post::where('id', $parent_id)->first()->slug;
        }
    }
    public function show_custom_page($page, $slug1 = null, $slug2 = null, $slug3 = null){

        if($slug1 == '' && $slug2 == '' && $slug3 == ''){
            $page = Post::where('slug', $page)->first();
        }else if($slug2 == '' && $slug3 == ''){
            $page = Post::where('slug', $page.'/'.$slug1)->first();
        }else if($slug3 == ''){
            $page = Post::where('slug', $page.'/'.$slug1.'/'.$slug2)->first();
        }else{
            $page = Post::where('slug', $page.'/'.$slug1.'/'.$slug2.'/'.$slug3)->first();
        }

        $header_menu = Menu::where('type', 'header_menu')->where('status', 0)->orderBy('order', 'asc')->get();
        if($page != null){
             if($page->template == 'blogs_template'){
                $posts = Post::where('type', 'posts')->paginate(6);
                return view('frontend.pages.'.$page->template, compact('page', 'header_menu', 'posts'));

            }else if($page->template == 'single-leadership'){
                return view('frontend.pages.'.$page->template, compact('page', 'header_menu'));

            }else if($page->template != null){
                return view('frontend.pages.'.$page->template, compact('page', 'header_menu'));
            } else{
                 return view('frontend.pages.default', compact('page', 'header_menu'));
            }
        }else{
            return abort(404);
        }
    }
    public function update(Request $request){
        if(dsld_have_user_permission('pages_edit') == 0){
            return response()->json(['status' => 'error', 'message'=> "You have no permission."]);
        }
        $slug = preg_replace('[^A-Za-z0-9\-]', '', str_replace(' ', '-', $request->slug));


        $validator = Validator::make($request->all(), [
            'title' => 'required|max:350',
            'status' => 'required|integer'
        ]);


        if($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()]);
        }

      
        if(is_array($request->setting) && count($request->setting) > 0){
            foreach($request->setting as $key => $value){
                $setting = PostMeta::where('meta_key', $value)->where('page_id', $request->id)->first();
                if($setting != ''){
                    if($request[$value] !='' || $request[$value] !='null'){
                        $setting->meta_value = $request[$value];
                        $setting->save();
                    }
                }else{
                    if($request[$value] !='' || $request[$value] !='null'){
                        $setting = new PostMeta;
                        $setting->meta_key = $value;
                        $setting->meta_value = $request[$value];
                        $setting->page_id = $request->id;
                        $setting->save();
                    }
                } 
            }
        }
        
        if(is_array($request->setting_slider) && count($request->setting_slider) > 0){

            foreach($request->setting_slider as $key => $value){
                if($value !=''){
                    $setting2 = PostMeta::where('meta_key', $value)->where('page_id', $request->id)->first();
                    if($setting2 != ''){
                        if($request[$value] !='' || $request[$value] !='null'){
                            $setting2->meta_value = json_encode($request[$value]);
                            $setting2->save();
                        }                        
                    }else{
                        if($request[$value] !='' || $request[$value] !='null'){
                            $setting2 = new PostMeta;
                            $setting2->meta_key = $value;
                            $setting2->meta_value = json_encode($request[$value]);
                            $setting2->page_id = $request->id;
                            $setting2->save();
                        } 
                    }
                }
            }
        }
        

        if(Post::whereNotIn('id', [$request->id])->where('slug', strtolower($slug))->first() == null){
            $page =  Post::findOrFail($request->id);
            $page->title = $request->title;
            $page->meta_title = $request->meta_title;
            $page->meta_description =  $request->meta_description;
            $page->keywords =  $request->keywords;
            $page->parent =  $request->parent;
            $page->level =  $this->parent_level($request->parent);
            $page->type = $request->type;
            $page->template = $request->template;
            $page->is_meta = 0;
            $page->order = $request->order;
            $page->banner = $request->banner;
            $page->thumbnail = $request->thumbnail !='' ? $request->thumbnail : '' ;
            $page->status = $request->status;
            $page->updated_at = $request->date;
            $page->content = $request->content;
            $page->slug = strtolower($slug);
            
            if(isset($request->short_content)){
                $page->short_content =  $request->short_content;
            }

            if($page->save()){
                return response()->json(['status' => 'success', 'message'=> 'Data update success.']);
            }else{
                return response()->json(['status' => 'error', 'message'=> 'Data update failed.']);
            }
        }else{
            return response()->json(['status' => 'warning', 'message'=> 'Page & slug already exist! please try agin.']);
        }

    }
    public function update_extra_content(Request $request){
        if(dsld_have_user_permission('pages_edit') == 0){
            return response()->json(['status' => 'error', 'message'=> "You have no permission."]);
        }
        // echo '<pre>';
        // print_r($request->all());
         foreach($request->type as $key => $type){
           
             $meta_data = PostMeta::where('meta_key', $type)->where('page_id', $request->page_id)->first();
          
             if($meta_data == ''){
                 if(gettype($request[$type]) == 'array'){
                     $new_data = new PostMeta;
                     $new_data->meta_key = $type;
                     $new_data->meta_value = json_encode($request[$type]);
                     $new_data->page_id = $request->page_id;
                     $new_data->section_id = $request->section_id;
                     $new_data->save();
                 }else{
                     $new_data = new PostMeta;
                     $new_data->meta_key = $type;
                     $new_data->meta_value = $request[$type];
                     $new_data->page_id = $request->page_id;
                     $new_data->section_id = $request->section_id;
                     $new_data->save();
                 }
             }else{
                 
                 if(gettype($request[$type]) == 'array'){
                     $meta_data->meta_value =  json_encode($request[$type]);
                     $meta_data->save();
                 }else{
                     $meta_data->meta_value =  $request[$type];
                     $meta_data->save();
                 }
                 
             }
         }
 
         return back();

 
     }
    public function destory(Request $request){
        if(dsld_have_user_permission('pages_delete') == 0 || dsld_have_user_permission('leaderships_delete') == 0 ||dsld_have_user_permission('newsevents_delete') == 0 || dsld_have_user_permission('testimonials_delete') == 0  || dsld_have_user_permission('clubs_delete') == 0 ){ 
            return response()->json(['status' => 'error', 'message'=> "You have no permission."]);
        }
        $page = Post::findOrFail($request->id);
        if($page != ''){
            if($page->delete()){
                return response()->json(['status' => 'success', 'message' => 'Data deleted successully.']);
            }else{
                return response()->json(['status' => 'error', 'message' => 'Data deleted failed.']);
            }
        }else{
            return response()->json(['status' => 'warning', 'message' => 'Data Not found.']);
        }
       
    }
    public function status(Request $request){
        if(dsld_have_user_permission('pages_edit') == 0){
            return response()->json(['status' => 'error', 'message'=> "You have no permission."]);
        }
        
        $page = Post::findOrFail($request->id);
        if($page != ''){
            if($page->status != $request->status){
                $page->status = $request->status;
                $page->save();
                return response()->json(['status' => 'success', 'message' => 'Status update successully.']);
            }else{
                return response()->json(['status' => 'error', 'message' => 'Status update failed.']);
            }
        }else{
            return response()->json(['status' => 'warning', 'message' => 'Data Not found.']);
        }
       
    }


    
}
