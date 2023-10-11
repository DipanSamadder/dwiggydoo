<?php
use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\User;
use App\Models\BusinessSetting;
use App\Models\Reward;
use App\Models\Dog;
use App\Models\GoodGene;
use App\Models\Breed;
use App\Models\Notification;
use App\Models\Translation;
use App\Models\PostsMeta;
use App\Models\RolePermission;
use  App\Http\Controllers\MailController;

if(! function_exists('dsld_notification_insert')){
    function dsld_notification_insert($sender_id, $receiver_id = null, $message, $subject, $reson_key, $reson_id = null){
        $notiy = new Notification;
        $notiy->receiver_id = $receiver_id;
        if(isset($sender_id)){ $notiy->sender_id = $sender_id; }
        if(isset($reson_id)){ $notiy->reason_id = $reson_id; }
        $notiy->message = $message;
        $notiy->sub = $subject;
        $notiy->reason_key = $reson_key;

        if($notiy->save()){
            return $notiy->id;
        }else{
            return 0;
        }

    }
}
if(! function_exists('dsld_notification_hide')){
    function dsld_notification_hide($sender_id, $receiver_id, $reason_key){
        $notiy = Notification::where('receiver_id', $receiver_id)->where('sender_id', $sender_id)->where('reason_key', $reason_key)->first();
        if(!is_null($notiy)){
            $notiy->is_view = 1;
            $notiy->is_hide = 1;
            $notiy->save();
            return $notiy->id;
        }else{
            return 0;
        }

    }
}
if(! function_exists('dsld_notification_remove')){
    function dsld_notification_remove($sender_id, $receiver_id, $reason_key){
        $notiy = Notification::where('receiver_id', $receiver_id)->where('sender_id', $sender_id)->where('reason_key', $reason_key)->first();
        if(!is_null($notiy)){
            $notiy->delete();
            return 1;
        }else{
            return 0;
        }

    }
}

if(!function_exists('dsld_active_dogs_by_user')){
    function dsld_active_dogs_by_user(){
        $dog= Dog::where('user_id',  Auth::user()->id)->where('is_default', 1)->first();
        return $dog;
    }
}


if (!function_exists('dsld_lazy_image_by_id')) {

    function dsld_lazy_image_by_id($id, $class = '', $style = ''){
        
        $sty = '';
        if(!is_null($style)){
            $sty = 'style="'.$style.'"';
        }

        if(!is_null($id) || $id !='['){
            $image = '<img class="lazy '.$class.' id-'.$id.'" alt="'.dsld_upload_file_title($id).'" 
                        src="'.dsld_static_asset('backend/assets/images/circle-loading.gif').'"
                        data-src="'.dsld_static_asset('backend/assets/images/circle-loading.gif').'"
                        data-srcset="'.dsld_uploaded_file_path($id, 'full').'"
                        srcset="'.dsld_uploaded_file_path($id, 'placeholder').'"'.$sty.'
                    >';
            return $image;
        }else{
            $image = '<img class="'.$class.'" src="'.dsld_static_asset('backend/assets/images/circle-loading.gif').'"
                    >';
        }
        return $image;
    }
}

if(!function_exists('dsld_dog_barcode_generate')){
    function dsld_dog_barcode_generate($dog){
        $data = "{$dog->id}, {$dog->name}";
        file_put_contents(public_path('uploads/barcodes').'/'.$dog->id.'.jpg', base64_decode(DNS2D::getBarcodePNG($data, "QRcode", 10,10, [0, 0, 0], [255, 255, 255])));
    }
}

//Get Post Parent Category Nmae
if(!function_exists('dsld_formatSize')){

     function dsld_formatSize($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}
//Get Post Parent Category Nmae
if(!function_exists('dsld_have_user_permission')){
    function dsld_have_user_permission($key){
       
           
         return 1;
           
       
 
    }
}

//Get Good Gens
if(!function_exists('dsld_find_goodGene_by_id')){
    function dsld_find_goodGene_by_id($id){
        $goodGene = GoodGene::find($id);
        if(!is_null($goodGene)){
            return $goodGene;
        }
    }
}


//Get Post Parent Category Nmae
if(!function_exists('dsld_check_permission')){
    function dsld_check_permission(Array $keys){
        if(Auth::user()->hasRole('Super-Admin')){
            return Auth::user()->hasRole('Super-Admin') ? true : null;
        }
        return Auth::user()->hasAnyDirectPermission($keys);
    }
}

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
            
        }else if($both ==0){

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
if (! function_exists('my_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function my_asset($path, $secure = null)
    {
        if(env('FILESYSTEM_DRIVER') == 's3'){
            return Storage::disk('s3')->url($path);
        }
        else {
            return app('url')->asset($path, $secure);
        }
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
    function dsld_uploaded_file_path($id, $thumb = ''){

        if(is_null($id) || $id == 0){
            return null;
        }

        if (($asset = Upload::find($id)) != null) {
            return $asset->getUrl($thumb);
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
//return file uploaded via uploader
if (!function_exists('dsld_upload_file_title')) {
    function dsld_upload_file_title($id)
    {
        if (($asset = Upload::find($id)) != null) {
            return $asset->name;
        }
        return null;
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


//Get Post Parent Category Nmae
if(!function_exists('dsld_page_meta_value_by_meta_key')){
    function dsld_page_meta_value_by_meta_key($meta_key = '', $page_id=''){
        $data = PostsMeta::where('meta_key', $meta_key)->where('pageable_id', $page_id)->first();

        if( $data != ''){
            return $data->meta_value;
        }else{
            return '';
        }
        
    }
}


if (!function_exists('dsld_static_asset')) {
    function dsld_static_asset($path, $secure = null){
        return app('url')->asset('/'.$path, $secure);
    }
}