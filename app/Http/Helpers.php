<?php
use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\User;
use App\Models\BusinessSetting;
use App\Models\Reward;
use App\Models\Dog;
use App\Models\Translation;
use App\Http\Controllers\MailController;

//Get Post Parent Category Nmae
if(!function_exists('dsld_mail_send')){
    function dsld_mail_send($to, $subject,$template, $mail_body, $both = 0){
        $from = env('MAIL_FROM_ADDRESS');
        if($both == 2){
            
            $content['title'] = $subject;
            $content['body'] = $mail_body;
            $cdata = new MailController;
            $cdata->cf_submite_mail($to, $from, $subject, $content, $template);
            
            $cdata = new MailController;
            $content['title'] = $subject." | Admin Mail";
            $content['body'] = $mail_body;
            $cdata->cf_submite_mail($to, $from, $subject, $content, 'emails.admin_template');
            
        }else if($both == 1){
            
            $cdata = new MailController;
            $content['title'] = $subject." | Admin Mail";
            $content['body'] = $mail_body;
            $cdata->cf_submite_mail($to, $from, $subject, $content, 'emails.admin_template');
            
        }else{

            $content['title'] = $subject;
            $content['body'] = $mail_body;
            $cdata = new MailController;
            $cdata->cf_submite_mail($to, $from, $subject, $content, $template);
            
        }
        

    }
}

//return file uploaded via uploader
if (!function_exists('dsld_uploaded_asset')) {
    function dsld_uploaded_asset($id)
    {
        if (($asset = Upload::find($id)) != null) {
            return my_asset($asset->file_path);
        }
        return null;
    }
}

if(!function_exists('dsld_is_route_active')){
    function dsld_is_route_active(Array $routes, $output = 'active'){
        foreach($routes as $route){
            if(Route::currentRouteName() == $route) return $output;
        }
    }
}


if(!function_exists('dsld_translation')){
    function dsld_translation($key, $lang = null){
        if($lang == null){
            $lang = App::getLocale();
        }
        $check_data = Translation::where('lang', env("DEFAULT_LANGUAGE", "en"))->where('lang_key', $key)->first();
        if($check_data == null){
            $data = new Translation;
            $data->lang = env("DEFAULT_LANGUAGE", "en");
            $data->lang_key = $key;
            $data->lang_value = $key;
            $data->save();
        }

        $get_value = Translation::where('lang_key', $key)->where('lang', $lang)->first();
        if($get_value != null){
            return $get_value->lang_value;
        }else{
            return $check_data->lang_value;
        }
    }
}

if(! function_exists('dsld_default_language')){
    function dsld_default_language(){
        return env("DEFAULT_LANGUAGE");
    }
}


//Get Post wise slug Nmae
if(!function_exists('dsld_generate_slug_by_text_with_model')){
   
    function dsld_generate_slug_by_text_with_model($model, $title, $field, $separator = null){
        $separator  =  empty($separator) ?  '-' : $separator;
        $id = 0;

        $slug =  preg_replace('/\s+/', $separator, (trim(strtolower($title))));
        $slug =  preg_replace('/\?+/', $separator, (trim(strtolower($slug))));
        $slug =  preg_replace('/\#+/', $separator, (trim(strtolower($slug))));
        $slug =  preg_replace('/\/+/', $separator, (trim(strtolower($slug))));

        // $slug = preg_replace('!['.preg_quote($separator).']+!u', $separator, $title);

        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        // $slug = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($slug));

        // Replace all separator characters and whitespace by a single separator
        $slug = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $slug);

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = dsld_getRelatedSlugs($slug, $id, $model, $field);

        // If we haven't used it before then we are all good.
        if (!$allSlugs->contains("$field", $slug)) {
            return $slug;
        }

        // Just append numbers like a savage until we find not used.

        for ($i = 1; $i <= 100; $i++) {
            $newSlug = $slug . $separator . $i;
            if (!$allSlugs->contains("$field", $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }
}

if(!function_exists('dsld_getRelatedSlugs')){
    function dsld_getRelatedSlugs($slug, $id, $model, $field){
        if (empty($id)) {
            $id = 0;
        }

        return $model::select("$field")->where("$field", 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();
    }
}

if (!function_exists('dsld_check_is_store_friends_table')) {
    function dsld_check_is_store_friends_table($dog_id, $receiver_dog_id)
    {
        $user = Dog::find($dog_id);
        $friend = Dog::find($receiver_dog_id);
        if($friend && $user){
            if ($user->isStoreFriend($friend)) {
               return true;
            }else if($friend->isStoreFriend($user)){
                 return true;
            }
        }
        
    }
}

if (!function_exists('dsld_check_is_friends')) {
    function dsld_check_is_friends($dog_id, $receiver_dog_id)
    {
        $user = Dog::find($dog_id);
        $friend = Dog::find($receiver_dog_id);
        if ($user->isFriendWith($friend)) {
           return true;
        }else if($friend->isFriendWith($user)){
             return true;
        }
    }
}

if (!function_exists('dsld_is_dog_owner')) {
    function dsld_is_dog_owner($dog_id, $user_id)
    {
        
        $dog = App\Models\Dog::where('id',  $dog_id)->where('user_id', $user_id)->first();
        if(!is_null($dog)){
            return true;
        }
        return false;
    }
}

if (!function_exists('dsld_find_parent_level')) {
    function dsld_find_parent_level($model = null, $id = null)
    {
        $comment = $model::where('id',  $id)->first();
        if($comment){
            return $comment->level + 1; 
        }
        return 1;
    }
}


if (!function_exists('dsld_store_rewards_data')) {
    function dsld_store_rewards_data($type = null, $user_id = null, $source_id = null)
    {
        $reward = Reward::where('type', $type)->where('user_id', $user_id)->where('source_id', $source_id)->first();

        if(is_null($reward)){
            $sid = dsld_id_get_setting($type);
            $points  = dsld_get_setting($type."_points");

            $data = Reward::create([
                'type' => $type,
                'user_id' => $user_id,
                'points' => $points,
                'source_id' => $source_id != null ? $source_id : $sid,
                'status' => 1
            ]);
            return 1;
        }
    }
}


if (!function_exists('dsld_store_rewards_ru_data')) {
    function dsld_store_rewards_ru_data($type = null, $user_id = null, $source_id = null)
    {
        $reward = Reward::where('type', $type)->where('user_id', $user_id)->where('source_id', $source_id)->first();

        if(is_null($reward)){
            $sid = dsld_id_get_setting($type);
            $points  = dsld_get_setting($type."_points");

            $data = Reward::create([
                'type' => $type,
                'user_id' => $user_id,
                'points' => $points,
                'source_id' => $source_id != null ? $source_id : $sid,
                'status' => 1
            ]);
            return 1;
        }
    }
}

if (!function_exists('dsld_get_setting')) {
    function dsld_get_setting($key, $default = null)
    {
        $setting = BusinessSetting::where('type', $key)->first();
        return $setting == null ? $default : $setting->value;
    }
}


if (!function_exists('dsld_id_get_setting')) {
    function dsld_id_get_setting($key, $default = null)
    {
        $setting = BusinessSetting::where('type', $key)->first();
        return $setting == null ? $default : $setting->id;
    }
}


if(!function_exists('dsld_referral_code_create'))
{
    function dsld_referral_code_create($code){
        if (($check = User::where('referral_code', $code)->first()) == null) {
            return $code;
        }else{
            return dsld_referral_code_create($code);
        }

    }
}

if(!function_exists('dsld_random_code_generator'))
{
    function dsld_random_code_generator($limit = 10){
        return Str::random($limit);
    }
}

if(!function_exists('dsld_uploaded_file_path'))
{
    function dsld_uploaded_file_path($id){

        if(is_null($id) || $id == 0){
            return null;
        }

        if (($asset = Upload::find($id)) != null) {
            return $asset->getUrl();
        }
        return null;
    }
}
if (!function_exists('dsld_uploading_file_type')) {
    function dsld_uploading_file_type($file)
    {
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
        $extension = strtolower($file->getClientOriginalExtension());
        if(isset($type[$extension])){
                return $type[$extension];
        }
        else{
                return "others";
        }
    }
}

if (!function_exists('dsld_api_asset')) {
    function dsld_api_asset($id)
    {
        if (($asset = Upload::find($id)) != null) {
            return $asset->file_name;
        }
        return "";
    }
}


//Get Post Parent Category Nmae
if(!function_exists('dsld_generate_slug_by_text_with_model')){
   
    function dsld_generate_slug_by_text_with_model($model, $title, $field, $separator = null){
        $separator  =  empty($separator) ?  '-' : $separator;
        $id = 0;

        $slug =  preg_replace('/\s+/', $separator, (trim(strtolower($title))));
        $slug =  preg_replace('/\?+/', $separator, (trim(strtolower($slug))));
        $slug =  preg_replace('/\#+/', $separator, (trim(strtolower($slug))));
        $slug =  preg_replace('/\/+/', $separator, (trim(strtolower($slug))));

        // $slug = preg_replace('!['.preg_quote($separator).']+!u', $separator, $title);

        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        // $slug = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($slug));

        // Replace all separator characters and whitespace by a single separator
        $slug = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $slug);

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = dsld_getRelatedSlugs($slug, $id, $model, $field);

        // If we haven't used it before then we are all good.
        if (!$allSlugs->contains("$field", $slug)) {
            return $slug;
        }

        // Just append numbers like a savage until we find not used.

        for ($i = 1; $i <= 100; $i++) {
            $newSlug = $slug . $separator . $i;
            if (!$allSlugs->contains("$field", $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }
}



if (!function_exists('dsld_static_asset')) {
    function dsld_static_asset($path, $secure = null){
        return app('url')->asset('/'.$path, $secure);
    }
}