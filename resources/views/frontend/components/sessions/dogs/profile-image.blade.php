@if(Session::get('defaultDogDetails'))
    @if(!is_null(dsld_uploaded_file_path(Session::get('defaultDogDetails.avatar_original'))))
        <img src="{{ dsld_uploaded_file_path(Session::get('defaultDogDetails.avatar_original')) }}" alt="user_img" @if(isset($class) && !empty($class)) class="{{ $class }}" @endif @if(isset($style) && !empty($style)) style="{{ $style }}" @endif/>
    @endif
@endif