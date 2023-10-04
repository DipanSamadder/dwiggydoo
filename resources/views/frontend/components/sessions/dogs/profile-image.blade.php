@if(Session::get('defaultDogDetails'))
    @if(!is_null(dsld_uploaded_file_path(Session::get('defaultDogDetails.avatar_original'))))
        <img src="{{ dsld_uploaded_file_path(Session::get('defaultDogDetails.avatar_original')) }}" alt="user_img" class="img-fluid rounded-circle" />
    @endif
@endif