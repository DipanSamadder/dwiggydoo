<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use Validator;
use Auth;


class UploadsMediaController extends Controller
{
    function media_library_admin(){
        if(dsld_have_user_permission('media') == 0){
            return "You have no permission.";
        }

        $page['title'] = 'Show All Media Files';
        return view('backend.modules.media.show', compact('page'));
    }

    function uploads(Request $request){
        if(dsld_have_user_permission('media_add') == 0){
            return response()->json(['status' => 'error', 'content'=> "You have no permission."]);
        }

        $type = array(
            "jpg"=>"image",
            "jpeg"=>"image",
            "png"=>"image",
            "svg"=>"image",
            "webp"=>"image",
            "gif"=>"image",
            "mp4"=>"video",
            "mpg"=>"video",
            "mpeg"=>"video",
            "webm"=>"video",
            "ogg"=>"video",
            "avi"=>"video",
            "mov"=>"video",
            "flv"=>"video",
            "swf"=>"video",
            "mkv"=>"video",
            "wmv"=>"video",
            "wma"=>"audio",
            "aac"=>"audio",
            "wav"=>"audio",
            "mp3"=>"audio",
            "zip"=>"archive",
            "rar"=>"archive",
            "7z"=>"archive",
            "doc"=>"document",
            "txt"=>"document",
            "docx"=>"document",
            "pdf"=>"document",
            "csv"=>"document",
            "xml"=>"document",
            "ods"=>"document",
            "xlr"=>"document",
            "xls"=>"document",
            "xlsx"=>"document"
        );
        if($request->TotalFiles > 0){
            for ($x = 0; $x < $request->TotalFiles; $x++){
                if($request->hasFile('files'.$x)){
                    $upload = new Upload;
                    $upload->file_original_name = null;
                    $arr = explode('.', $request->file('files'.$x)->getClientOriginalName());
                    $file_name = '';
                    for($i=0; $i < count($arr)-1; $i++){
                        if($i == 0){
                            $upload->file_original_name .= $arr[$i];
                            $file_name = $arr[$i];
                        }
                        else{
                            $upload->file_original_name .= ".".$arr[$i];
                        }
                    }

                    $file_name = dsld_generate_slug_by_text_with_model('App\Models\Upload', $file_name, 'slug');
                    
                    $file_path = 'uploads/media/'.$file_name.'.webp';
                    $webp = Webp::make($request->file('files'.$x));


                    if ($webp->save(public_path($file_path))) {
                        $upload->file_path =  $file_path;
                        $upload->slug =  $file_name;
                    }

                    $upload->user_id = Auth::user()->id ? Auth::user()->id : 0;
                 
                    $upload->extension = strtolower($request->file('files'.$x)->getClientOriginalExtension());
                    if(isset($type[$upload->extension])){
                        $upload->type = $type[$upload->extension];
                    }
                    else{
                        $upload->type = "others";
                    }

                    if(isset($request->page_id)){
                        $upload->page_id = $request->page_id;
                    }
                    else{
                        $upload->page_id = 0;
                    }

                    if(isset($request->order)){
                        $upload->order = $request->order;
                    }
                    else{
                        $upload->order = 0;
                    }

                    $upload->file_size = $request->file('files'.$x)->getSize();
                    $upload->file_title = $upload->file_original_name;
                    $upload->save();

                    
                }
            }
            return response()->json(['status' => 'success', 'content' => 'Thank you for update data.']);
        }
    
    }
    function update(Request $request){
        if(dsld_have_user_permission('media_edit') == 0){
            return response()->json(['status' => 'error', 'message'=> "You have no permission."]);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:50'
        ]);

        if($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()]);
        }

        $media = Upload::findOrFail($request->id);

        if($media != ''){
            $media->file_title = $request->title;

            if(isset($request->page_id)){
                $media->page_id = $request->page_id;
            }
            else{
                $media->page_id = 0;
            }

            if(isset($request->order)){
                $media->order = $request->order;
            }
            else{
                $media->order = 0;
            }
         
            if($media->save()){
                return response()->json(['status' => 'success', 'message'=> 'Data update success.']);
            }else{
                return response()->json(['status' => 'error', 'message'=> 'Data update failed.']);
            }
            
        }else{
            return response()->json(['status' => 'warning', 'message'=> 'Not Found! please try again.']);
        }
    }
    function edit(Request $request){
        $data = Upload::where('user_id', $request->user_id)->where('id', $request->id)->first();
        return view('backend.modules.media.edit', compact('data'));
    }
    function files_gets_admin(Request $request){

        if(dsld_have_user_permission('media') == 0){ 
            return "You have no permission.";
        }

        if($request->page != 1){$start = $request->page * 24;}else{$start = 0;}
        $user_id = $request->user_id;
        $search = $request->search;
        $sort = $request->sort;
        $media_type = $request->media_type;
        
        $data = Upload::where('user_id', $user_id);
        if($search != ''){
            $data->where('file_title', 'like', '%'.$search.'%');
        }
        if($media_type != 'all' && $media_type != ''){
            $data->where('type', $media_type);
        }
       
        if($sort != ''){
            switch ($request->sort) {
                case 'newest':
                    $data->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $data->orderBy('created_at', 'asc');
                    break;
                case 'smallest':
                    $data->orderBy('file_size', 'asc');
                    break;
                case 'largest':
                    $data->orderBy('file_size', 'desc');
                    break;
                default:
                    $data->orderBy('created_at', 'desc');
                    break;
            }
        }
        $data = $data->skip($start)->paginate(24);
        return view('backend.modules.media.media_items', compact('data')); 
    }
    function files_gets_page_edit_admin(Request $request){

        if(dsld_have_user_permission('media') == 0){ 
            return "You have no permission.";
        }

        if($request->page != 1){$start = $request->page * 4;}else{$start = 0;}
       
        $data = Upload::where('page_id', $request->page_id)->orderBy('created_at', 'desc');
        $data = $data->skip($start)->paginate(4);
        return view('backend.modules.websites.pages.gallery.media_items', compact('data')); 
    }

    function files_destroy_admin(Request $request){
        if(dsld_have_user_permission('media_delete') == 0){
            return response()->json(['status' => false]);
        }
        if(file_exists(public_path().'/'.Upload::where('id', $request->id)->first()->file_path)){
            unlink(public_path().'/'.Upload::where('id', $request->id)->first()->file_path);
        }
        Upload::destroy($request->id);
        return ['status'=> true] ;

    }
}
