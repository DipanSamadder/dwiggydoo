@extends('backend.layouts.app')

{{-- Header section--}}
@section('header')

<link rel="stylesheet" href="{{ dsld_static_asset('backend/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<style>
    .bootstrap-tagsinput{    border: 1px solid #cbcbcb !important;width: 100%;}
</style>
@endsection

{{-- Content section--}}
@section('content')

    <!-- Basic Validation -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
                <div class="header">
                    <h2><strong>Site</strong> Setting</h2>
                </div>
                <div class="body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs p-0 mb-3 nav-tabs-success" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home_with_icon_title"> <i class="zmdi zmdi-home"></i> SITE INFO </a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#header"><i class="zmdi zmdi-hc-fw"></i> Header </a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#footer"><i class="zmdi zmdi-hc-fw"></i> Footer </a></li>
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane in active" id="home_with_icon_title">
                            <form id="form_validation" action="{{ route('business.setting.update') }}" class="update_form" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Meta Title <small>(Default)</small></label>
                                            <input type="hidden" name="types[]"  value="site_title">
                                            <input type="text" class="form-control" placeholder="Title" name="site_title"  id="site_title" value="{{ dsld_get_setting('site_title') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Meta Keyword</label><br>
                                            <input type="hidden" name="types[]" value="site_meta_keyword">
                                            <input type="text" class="form-control" placeholder="Meta Keyword" name="site_meta_keyword"  id="site_meta_keyword" data-role="tagsinput" value="{{ dsld_get_setting('site_meta_keyword') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <input type="hidden" name="types[]" value="site_meta_description">
                                            <textarea class="form-control" placeholder="Meta Description" name="site_meta_description"  id="site_meta_description" required>{{ dsld_get_setting('site_meta_description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Logo</label>
                                            <input type="hidden" name="types[]" value="site_logo">

                                            <a class="btn btn-primary text-white" onclick="media_file_get('{{ dsld_get_setting("site_logo") }}','put_image', 0)"><i class="zmdi zmdi-collection-image"></i></a><div class="put_image">@if(!is_null(dsld_get_setting('site_logo')))<strong>Selected Image:</strong><i> {{ dsld_get_setting('site_logo') }}</i>@endif</div>
                        
                                            <input type="hidden" class="put_image" name="site_logo" id="site_logo" value="{{ dsld_get_setting('site_logo') }}" onchange="is_edited()">

                                            @if(dsld_get_setting('site_logo') > 0)
                                            <div class="image mt-2">
                                                <img src="{{ dsld_uploaded_file_path(dsld_get_setting('site_logo')) }}"  alt="{{ dsld_upload_file_title(dsld_get_setting('site_logo')) }}" class="page_banner_icon">
                                            </div> 
                                            @endif                                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Fav Icon</label>
                                            <input type="hidden" name="types[]" value="site_fav_icon">

                                            <a class="btn btn-primary text-white" onclick="media_file_get('{{ dsld_get_setting("site_fav_icon") }}','put_image1', 0)"><i class="zmdi zmdi-collection-image"></i></a>

                                            @if(dsld_get_setting('site_fav_icon') > 0)
                                            <div class="image mt-2 d-inline">
                                                <img src="{{ dsld_uploaded_file_path(dsld_get_setting('site_fav_icon')) }}"  alt="{{ dsld_upload_file_title(dsld_get_setting('site_fav_icon')) }}" class="page_banner_icon">
                                            </div> 
                                            @endif 
                                            <div class="put_image1">@if(!is_null(dsld_get_setting('site_fav_icon')))<strong>Selected Image:</strong><i> {{ dsld_get_setting('site_fav_icon') }}</i>@endif</div>
                        
                                            <input type="hidden" class="put_image1" name="site_fav_icon" id="site_fav_icon" value="{{ dsld_get_setting('site_fav_icon') }}" onchange="is_edited()">                                                           
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Login</label>
                                            <input type="hidden" name="types[]" id="types" value="site_login_background">

                                            <a class="btn btn-primary text-white" onclick="media_file_get('{{ dsld_get_setting("site_login_background") }}','put_image2', 0)"><i class="zmdi zmdi-collection-image"></i></a><div class="put_image2">@if(!is_null(dsld_get_setting('site_login_background')))<strong>Selected Image:</strong><i> {{ dsld_get_setting('site_login_background') }}</i>@endif

                                            @if(dsld_get_setting('site_login_background') > 0)
                                            <div class="image mt-2 d-inline">
                                                <img src="{{ dsld_uploaded_file_path(dsld_get_setting('site_login_background')) }}"  alt="{{ dsld_upload_file_title(dsld_get_setting('site_login_background')) }}" class="page_banner_icon">
                                            </div> 
                                            @endif 
                                        </div>
                        
                                            <input type="hidden" class="put_image2" name="site_login_background" id="site_login_background" value="{{ dsld_get_setting('site_login_background') }}" onchange="is_edited()">

                                                                                                       
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Registration</label>
                                            <input type="hidden" name="types[]" id="types" value="site_registration_background">

                                            <a class="btn btn-primary text-white" onclick="media_file_get('{{ dsld_get_setting("site_registration_background") }}','put_image3', 0)"><i class="zmdi zmdi-collection-image"></i></a><div class="put_image3">@if(!is_null(dsld_get_setting('site_registration_background')))<strong>Selected Image:</strong><i> {{ dsld_get_setting('site_registration_background') }}</i>@endif</div>
                        
                                            <input type="hidden" class="put_image3" name="site_registration_background" id="site_registration_background" value="{{ dsld_get_setting('site_registration_background') }}" onchange="is_edited()">

                                            @if(dsld_get_setting('site_registration_background') > 0)
                                            <div class="image mt-2">
                                                <img src="{{ dsld_uploaded_file_path(dsld_get_setting('site_registration_background')) }}"  alt="{{ dsld_upload_file_title(dsld_get_setting('site_registration_background')) }}" class="page_banner_icon">
                                            </div> 
                                            @endif                                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="swal-button-container">
                                            <button class="btn btn-raised btn-success btn-round waves-effect dsld-btn-loader" type="submit">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="header">
                            <form id="form_validation" action="{{ route('business.setting.update') }}" class="update_form" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Phone <small>(Number)</small></label>
                                            <input type="hidden" name="types[]"  value="site_header_phone_number">
                                            <input type="text" class="form-control" placeholder="Title" name="site_header_phone_number"  id="site_header_phone_number" value="{{ dsld_get_setting('site_header_phone_number') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Address <small>(Header)</small></label>
                                            <input type="hidden" name="types[]"  value="site_header_address">
                                            <input type="text" class="form-control" placeholder="Title" name="site_header_address"  id="site_header_address" value="{{ dsld_get_setting('site_header_address') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Marquee <small>(Top Bar)</small></label>
                                            <input type="hidden" name="types[]"  value="site_header_marguee">
                                            <input type="text" class="form-control" placeholder="Title" name="site_header_marguee"  id="site_header_marguee" value="{{ dsld_get_setting('site_header_marguee') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="swal-button-container">
                                            <button class="btn btn-raised btn-success btn-round waves-effect dsld-btn-loader" type="submit">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="footer">
                            <form id="form_validation" action="{{ route('business.setting.update') }}" class="update_form" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label>Phone 1 <small>(Number)</small></label>
                                            <input type="hidden" name="types[]"  value="site_footer_phone_number1">
                                            <input type="text" class="form-control" placeholder="Phone Number" name="site_footer_phone_number1"  id="site_footer_phone_number1" value="{{ dsld_get_setting('site_footer_phone_number1') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label>Phone 2 <small>(Number)</small></label>
                                            <input type="hidden" name="types[]"  value="site_footer_phone_number2">
                                            <input type="text" class="form-control" placeholder="Phone Number" name="site_footer_phone_number2"  id="site_footer_phone_number2" value="{{ dsld_get_setting('site_footer_phone_number2') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label>Phone 3 <small>(Number)</small></label>
                                            <input type="hidden" name="types[]"  value="site_footer_phone_number3">
                                            <input type="text" class="form-control" placeholder="Phone Number" name="site_footer_phone_number3"  id="site_footer_phone_number3" value="{{ dsld_get_setting('site_footer_phone_number3') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label>Email 1 <small>(Footer)</small></label>
                                            <input type="hidden" name="types[]"  value="site_footer_email1">
                                            <input type="text" class="form-control" placeholder="Email" name="site_footer_email1"  value="{{ dsld_get_setting('site_footer_email1') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label>Email 2 <small>(Footer)</small></label>
                                            <input type="hidden" name="types[]"  value="site_footer_email2">
                                            <input type="text" class="form-control" placeholder="Email" name="site_footer_email2" value="{{ dsld_get_setting('site_footer_email2') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label>Email 3 <small>(Footer)</small></label>
                                            <input type="hidden" name="types[]"  value="site_footer_email3">
                                            <input type="text" class="form-control" placeholder="Email" name="site_footer_email3" value="{{ dsld_get_setting('site_footer_email3') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Address <small>(Footer)</small></label>
                                            <input type="hidden" name="types[]"  value="site_footer_address">

                                            <textarea class="form-control" placeholder="Address" name="site_footer_address" id="site_footer_address"  aria-required="true" spellcheck="false" aria-invalid="false">{{ dsld_get_setting('site_footer_address') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Copy  <small>(Right)</small></label>
                                            <input type="hidden" name="types[]"  value="site_footer_copyright">

                                            <textarea class="form-control" placeholder="Copy Right" name="site_footer_copyright" id="site_footer_copyright"  aria-required="true" spellcheck="false" aria-invalid="false">{{ dsld_get_setting('site_footer_copyright') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="swal-button-container">
                                            <button class="btn btn-raised btn-success btn-round waves-effect dsld-btn-loader" type="submit">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Social</strong> Links</h2>
                </div>
                <div class="body">
                    <h5>Icon and Links</h5>
                    <form id="form_validation" action="{{ route('business.setting.update') }}" class="update_form" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="social_link_field">
                            @if(dsld_get_setting('social_link_url') != '' )
                                @foreach(json_decode(dsld_get_setting('social_link_url'), true) as $key => $value)
                                    <div class="row clearfix">
                                        <div class="col-sm-5">
                                            <div class="form-group">   
                                                <input type="hidden" name="types[]" value="social_link_name">                                
                                                <select class="form-control show-tick ms select2" name="social_link_name[]" id="social_link_name">
                                                    <option value="0">-- Please select --</option>
                                                    <option value="fb" @if(json_decode(dsld_get_setting('social_link_name'), true)[$key] == 'fb') selected @endif>Facebook</option>
                                                    <option value="yt" @if(json_decode(dsld_get_setting('social_link_name'), true)[$key] == 'yt') selected @endif>Youtube</option>
                                                    <option value="tw" @if(json_decode(dsld_get_setting('social_link_name'), true)[$key] == 'tw') selected @endif>Twitter</option>
                                                    <option value="li" @if(json_decode(dsld_get_setting('social_link_name'), true)[$key] == 'li') selected @endif>Linkedin</option>
                                                    <option value="In" @if(json_decode(dsld_get_setting('social_link_name'), true)[$key] == 'In') selected @endif>Instagram</option>
                                                </select>                                   
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">  
                                                <input type="hidden" name="types[]" value="social_link_url">                                 
                                                <input type="text" class="form-control"  name="social_link_url[]"  placeholder="Url" value="{{ json_decode(dsld_get_setting('social_link_url'), true)[$key] }} ">                                    
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="remove-parent" data-parent=".row">
                                                <i class="zmdi zmdi-hc-fw"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>                          
                        <div class="input-group mb-4">
                            <button
                                type="button"
                                class="btn btn-primary addMoreBtn"
                                data-toggle="add-more"
                                data-content='<div class="row clearfix">
                                    <div class="col-sm-5">
                                        <div class="form-group">   
                                            <input type="hidden" name="types[]" value="social_link_name">                                
                                            <select class="form-control show-tick ms select2" name="social_link_name[]" id="social_link_name">
                                                <option value="0">-- Please select --</option>
                                                <option value="fb">Facebook</option>
                                                <option value="tw">Twitter</option>
                                                <option value="yt">Youtube</option>
                                                <option value="li">Linkedin</option>
                                                <option value="In">Instagram</option>
                                            </select>                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">  
                                            <input type="hidden" name="types[]" value="social_link_url">                                 
                                            <input type="text" class="form-control"  name="social_link_url[]" placeholder="Url">                                    
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="remove-parent" data-parent=".row">
                                            <i class="zmdi zmdi-hc-fw"></i>
                                        </button>
                                    </div>
                                </div>'
                                data-target=".social_link_field">
                                <i class="zmdi zmdi-hc-fw"></i> Add New
                            </button>
                        </div>
                        <div class="row">     
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="swal-button-container">
                                    <button class="btn btn-raised btn-success btn-round waves-effect dsld-btn-loader" type="submit">Update</button>
                                </div>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Footer section--}}
@section('footer')
<!-- Jquery Core Js --> 
<script src="{{ dsld_static_asset('backend/assets/plugins/jquery-validation/jquery.validate.js') }}"></script> 
<script src="{{ dsld_static_asset('backend/assets/plugins/jquery-steps/jquery.steps.js') }}"></script> 
<script src="{{ dsld_static_asset('backend/assets/js/pages/forms/form-validation.js') }}"></script>
<script src="{{ dsld_static_asset('backend/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<script>

$(document).ready(function(){
    $('.update_form').on('submit', function(event){
    event.preventDefault();
        $('.dsld-btn-loader').addClass('btnloading');
        var Loader = ".btnloading";
        DSLDButtonLoader(Loader, "start");
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            cache : false,
            data: $(this).serialize(),
            success: function(data) {
                DSLDButtonLoader(Loader, "");
                dsldFlashNotification(data['status'], data['message']);
                if(data['status'] =='success'){
                }
                
            }
        });
    });
});
   
</script>
@endsection