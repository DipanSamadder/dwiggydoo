<?php
namespace App\Repositories;
use App\Models\Post;
use App\Interfaces\BlogInterfaces;

class BlogRepositories implements BlogInterfaces{

    public function ajax_show($request){
        if($request['page'] != 1){$start = $request['page'] * 15;}else{$start = 0;}
        $search = $request['search'];
        $sort = $request['sort'];

        $data = Post::where('type', $request['type']);
        if($search != ''){
            $data->where('title', 'like', '%'.$search.'%');
        }

        if($sort != ''){
            switch ($request['sort']) {
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
        return $data;
    }


    public function find($id){
        return Post::findOrFail($id);
    }


    public function update($request){
        $page =  $this->find($request['id']);

        if($request['lang'] == env("DEFAULT_LANGUAGE")){
            $page->title          = $request['title'];
            $page->content        = $request['content'];
            $page->short_content  = isset($request['short_content'])?$request['short_content']:'';
        }

        $page->meta_title = $request['meta_title'];
        $page->meta_description =  $request['meta_description'];
        $page->keywords =  $request['keywords'];
        $page->parent =  0;
        $page->level =  0;
        $page->type = $request['type'];
        $page->template = 'single_blog';
        $page->cat_type = $request['cat_type'];
        $page->is_meta = 0;
        $page->order = $request['order'];
        $page->thumbnail = isset($request['thumbnail']) ? $request['thumbnail'] : '' ;
        $page->status = $request['status'];
        $page->banner = isset($request['banner']) ?$request['banner'] : 0;
        $page->updated_at = $request['date'];

        if(isset($request['slug'])){
            $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request['slug']));
        
            if($page->slug != $slug){
                $slug = dsld_generate_slug_by_text_with_model('App\Models\Post', $request['slug'], 'slug');
                $page->slug = $slug;
            }
        }

          
        if($page->save()){

            $page->categories()->sync($request['categories']);
            $page->tags()->sync($request['tags']);
            
            $trans = $page->translations()->where('lang', $request['lang'])->first();
            if(!is_null($trans)){
                $trans->update(['title' => $request['title'], 'content' => $request['content']]);
            }else{
                $page->translations()->create([
                    'title' => $request['title'],
                    'content' => $request['content'],
                    'lang' => $request['lang']
                ]);
            }

            return true;
        }else{
            return false;
        }
    }


}