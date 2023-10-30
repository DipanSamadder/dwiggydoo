<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostsSection;
use App\Models\PostsMeta;
use App\Models\PostTranslation;
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


        $validator = Validator::make($request->all(), [
            'title' => 'required|max:350',
            'status' => 'required|integer'
        ]);


        if($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()]);
        }

        
        $slug = dsld_generate_slug_by_text_with_model('App\Models\Post', $request->title, 'slug');
        if(isset($request->parent)){
            $parent_slug = $this->parent_slug($request->parent);
                $slug = $parent_slug.'/'.$slug;
        }
        
 
        $page = new Post;
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
            $page->translations()->create(['lang' => env('DEFAULT_LANGUAGE'), 'short_content' => $request->content,'title' => $request->title, 'content' => $request->content]);
            return response()->json(['status' => 'success', 'message'=> 'Data insert success.']);
        }else{
            return response()->json(['status' => 'error', 'message'=> 'Data insert failed.']);
        }
       
    }

    public function edit(Request $request, $id){
        $lang = $request->lang;
        
        $data = Post::where('id', $id)->first();
        $section = $data->sections()->orderBy('order', 'asc')->where('status', 1)->get();
        $page['title'] = 'Edit Data';
        return view('backend.modules.websites.pages.edit', compact('data', 'page', 'section', 'lang'));
    }


    public function edit_extra(Request $request){
        $lang = $request->lang;
        $data = Post::where('id', $request->id)->first();
        $sec = $data->sections()->where('id', $request->section_id)->orderBy('order', 'asc')->where('status', 1)->first();
        return view('backend.modules.websites.pages.extra_edit', compact('sec','data', 'lang'));
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


        if($page != null){
             if($page->template == 'single_blog'){
                $posts = Post::where('type', 'blog_post')->paginate(6);
                return view('frontend.pages.'.$page->template, compact('page', 'posts'));

            }else if($page->template == 'single-leadership'){
                return view('frontend.pages.'.$page->template, compact('page'));

            }else if($page->template != null){
                return view('frontend.pages.'.$page->template, compact('page'));
            } else{
                 return view('frontend.pages.default', compact('page'));
            }
        }else{
            return abort(404);
        }
    }
    public function update(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:350',
            'status' => 'required|integer'
        ]);


        if($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()]);
        }

        if(is_array($request->setting) && count($request->setting) > 0){
            foreach($request->setting as $key => $value){
                $setting = PostsMeta::where('meta_key', $value)->where('pageable_id', $request->id)->first();
                if($setting != ''){
                    if($request[$value] !='' || $request[$value] !='null'){
                        $setting->meta_value = $request[$value];
                        $setting->lang = 'en';
                        $setting->pageable_type = 'App\Models\Post';
                        $setting->save();
                    }
                }else{
                    if($request[$value] !='' || $request[$value] !='null'){
                        $setting = new PostsMeta;
                        $setting->meta_key = $value;
                        $setting->meta_value = $request[$value];
                        $setting->lang = 'en';
                        $setting->pageable_id = $request->id;
                        $setting->pageable_type = 'App\Models\Post';
                        $setting->save();
                    }
                } 
            }
        }
        
        if(is_array($request->setting_slider) && count($request->setting_slider) > 0){

            foreach($request->setting_slider as $key => $value){
                if($value !=''){
                    $setting2 = PostsMeta::where('meta_key', $value)->where('pageable_id', $request->id)->first();
                    if($setting2 != ''){
                        if($request[$value] !='' || $request[$value] !='null'){
                            $setting2->meta_value = json_encode($request[$value]);
                            $setting2->lang = 'en';
                            $setting2->pageable_type = 'App\Models\Post';
                            $setting2->save();
                        }                        
                    }else{
                        if($request[$value] !='' || $request[$value] !='null'){
                            $setting2 = new PostsMeta;
                            $setting2->meta_key = $value;
                            $setting2->meta_value = json_encode($request[$value]);
                            $setting2->lang = 'en';
                            $setting2->pageable_id = $request->id;
                            $setting2->pageable_type = 'App\Models\Post';
                            $setting2->save();
                        } 
                    }
                }
            }
        }

        $page =  Post::findOrFail($request->id);

        if($request->lang == env("DEFAULT_LANGUAGE")){
            $page->title          = $request->title;
            $page->content        = $request->content;
            $page->short_content        = $request->short_content;
        }

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

        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        
        
        if($page->slug != $slug){
            $slug = dsld_generate_slug_by_text_with_model('App\Models\Post', $request->slug, 'slug');
            if(isset($request->parent) != 0 && $page->parent != $request->parent){
                $parent_slug = $this->parent_slug($request->parent);
                    $slug = $parent_slug.'/'.$slug;
            }
            $page->slug = $slug;
        }
        

        if($page->save()){
            $trans = $page->translations()->where('lang', $request->lang)->first();
            if(!is_null($trans)){
                $trans->update(['title' => $request->title, 'content' => $request->content]);
            }else{
                $page->translations()->create([
                    'title' => $request->title,
                    'content' => $request->content,
                    'lang' => $request->lang
                ]);
            }

            return response()->json(['status' => 'success', 'message'=> 'Data update success.']);
        }else{
            return response()->json(['status' => 'error', 'message'=> 'Data update failed.']);
        }
       

    }
    public function update_extra_content(Request $request){

        // echo '<pre>';
        // print_r($request->all());
         foreach($request->type as $key => $type){
            
             $post = Post::find($request->page_id); 
             $meta_data = $post->page_metas()->where('meta_key', $type)->first();
             if($meta_data == ''){
                 if(gettype($request[$type]) == 'array'){
                    
                    
                    $post->page_metas()->create([
                        'meta_key' => $type,
                        'meta_value' => json_encode($request[$type]),
                        'lang' => env('DEFAULT_LANGUAGE'),
                        'section_id' => $request->section_id,
                    ]);

                 }else{
                    $post->page_metas()->create([
                        'meta_key' => $type,
                        'meta_value' => $request[$type],
                        'lang' => env('DEFAULT_LANGUAGE'),
                        'section_id' => $request->section_id,
                    ]);
                 }
             }else{
                 
                 if(gettype($request[$type]) == 'array'){
                    $post->page_metas()->where('meta_key', $type)->update([
                        'meta_value' => json_encode($request[$type]),
                    ]);
                 }else{
                    $post->page_metas()->where('meta_key', $type)->update([
                        'meta_value' => $request[$type]
                    ]);
                 }
                 
             }
         }
 
         return back();

 
     }
    public function destory(Request $request){

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
