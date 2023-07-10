@extends('backend.layouts.app')

@section('header')
<link rel="stylesheet" href="{{ dsld_static_asset('backend/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<style>
    .bootstrap-tagsinput{    border: 1px solid #cbcbcb !important;width: 100%;}
</style>
@endsection

@section('content')
 <!-- Exportable Table -->
 <form id="update_form" action="{{ route('dogs.update') }}" method="POST" enctype="multipart/form-data" >
    <div class="row clearfix">
        <div class="col-lg-8">
            @csrf 
            <input type="hidden" name="id" id="id" value="{{ $data->id }}" />
            <input type="hidden" name="type" id="type" value="blog_page" />
            <input type="hidden" name="parent" id="parent" value="0">
            <input type="hidden" name="template" id="template" value="blog_details">
            <div class="card mb-0">
                <div class="header">
                    <a href="#" target="_blank">         
                        <h2><strong> <i class="zmdi zmdi-hc-fw"></i> {{ $data->title }}</strong></h2>
                    </a>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label class="form-label">Name <small class="text-danger">*</small></label>  
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" onchange="is_edited()" value="{{ $data->name }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label class="form-label">Slug <small class="text-danger">*</small><span class="ml-2 pointer-cursor" onclick="$('input[name=slug]').removeAttr('disabled');"><i class="zmdi zmdi-edit"></i></a></label>  
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                            <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" value="{{ $data->slug }}" onchange="is_edited()" disabled/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-0">
                <div class="header">
                    <h2><strong>Short Content</strong></h2>
                </div>
                <div class="body">
                    <div class="form-group">                                
                        <textarea class="form-control" name="short_content" id="short_content" onchange="is_edited()" placeholder="Short Content"><?php $str = $data->short_content; echo htmlspecialchars_decode($str); ?></textarea>                                  
                    </div>
                </div>
            </div>

            <div class="card mb-0">
                <div class="header">
                    <h2><strong>Content</strong></h2>
                </div>
                <div class="form-group">                                
                    <textarea class="summernote" name="content" id="content" onchange="is_edited()"><?php $str = $data->content; echo htmlspecialchars_decode($str); ?></textarea>                                  
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-0">
                <div class="header">
                    <h2><strong>Publish</strong></h2>                        
                </div>
                <div class="body">
            
                    <div class="form-group">
                        <label class="form-label">Status *</label>                                 
                        <select class="form-control" name="status" id="status" onchange="is_edited()">
                            <option value="">-- Please select --</option>
                            <option value="1" @if($data->status == 1) selected @endif>Active</option>
                            <option value="0" @if($data->status == 0) selected @endif>Deactive</option>
                        </select>                             
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Order</label>                                 
                        <input type="text" name="order" id="order" onchange="is_edited()" class="form-control" placeholder="Order" value="{{ $data->order }}" />                                   
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                        </div>
                        <input type="date" name="date" id="date" class="form-control" onchange="is_edited()" value="{{  date('Y-m-d', strtotime($data->created_at)) }}">
                    </div>
                    <div class="swal-button-container">
                        <button type="submit" class="btn btn-success btn-round waves-effect dsld-btn-loader" id="submit_btn" disabled="disabled">Update</button>
                    </div>
                    <a href="#" traget="_blank"  class="btn btn-success btn-round waves-effect">Preview</a>
                    <button type="button" class="btn btn-danger btn-round waves-effect" onclick="DSLDDeleteAlert('{{ $data->id }}','{{ route('dogs.destory') }}','{{ csrf_token() }}')"><i class="zmdi zmdi-delete"></i></button>
                </div>
            </div>
            <div class="card mb-0">
                <div class="header">
                    <h2><strong>Banner</strong></h2>                        
                </div>
                <div class="body">
                    <div class="form-group">
                        <label class="form-label">Banner </label><a class="btn btn-primary text-white" onclick="media_file_get('{{ @$data->banner }}','put_image', 0)"><i class="zmdi zmdi-collection-image"></i></a><div class="put_image">@if(isset($data->banner))<strong>Selected Image:</strong><i> {{ @$data->banner }}</i>@endif</div>
                        
                        <input type="hidden" class="put_image" name="banner" id="banner" value="{{ @$data->banner }}" onchange="is_edited()">

                        @if($data->banner > 0)
                        <div class="image mt-2">
                            <img src="{{ dsld_uploaded_asset($data->banner) }}"  alt="{{ dsld_upload_file_title($data->banner) }}" class="img-fluid">
                        </div> 
                        @endif  
                                                                                  
                    </div>
                </div>
            </div>
            <div class="card mb-0">
                <div class="header">
                    <h2><strong>SEO</strong></h2>                        
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 form-control-label">
                            <label class="form-label">Meta Title </label>  
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                            <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Meta Title" onchange="is_edited()" value="{{ $data->meta_title }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 form-control-label">
                            <label class="form-label">Meta Description </label>  
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                            <input type="text" name="meta_description" onchange="is_edited()" id="meta_description" class="form-control" placeholder="Meta Drscription" value="{{ $data->meta_description }}" />                                   
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 form-control-label">
                            <label class="form-label">Keyword </label>  
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                            <input type="text" class="form-control" onchange="is_edited()" name="keywords" id="keywords" data-role="tagsinput" value="{{ $data->keywords }}">                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</form>
<!-- Exportable Table -->

@endsection

@section('footer')



<script src="{{ dsld_static_asset('backend/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<script>

    $(document).ready(function(){
        if ($('#template').val() == 'research_details') { 
            $('.department_fields').show();
        }else{
            $('.department_fields').hide();   
        }

        $(".summernote").summernote('code');
        $('#update_form').on('submit', function(event){
        event.preventDefault();
        
            var setting_page_name_hide = 'no';
            
            if ($('#setting_page_name_hide').is(":checked")) { 
                if($('#setting_page_name_hide').val() == 'yes'){
                    setting_page_name_hide = 'yes';
                }
            }
            $('input[name=slug]').removeAttr('disabled');
            $('.dsld-btn-loader').addClass('btnloading');
            var Loader = ".btnloading";
            DSLDButtonLoader(Loader, "start");
            var content =  $("#content").summernote('code');
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                cache : false,
                data: $(this).serialize(),
                success: function(data) {
                    DSLDButtonLoader(Loader, "");
                    dsldFlashNotification(data['status'], data['message']);
                    if(data['status'] =='success'){
                        $('input[name=slug]').attr('disabled', true);
                        location.reload();
                    }
                    
                }
            });
        });
    });
    function is_edited(){
        $('#submit_btn').removeAttr('disabled');
    }
    function get_pages(){
        window.location.href = "{{ route('dogs.index') }}";
    }
    $('#template').on('change', function(){
        if ($(this).val() == 'research_details') { 
            $('.department_fields').show();
        }else{
            $('.department_fields').hide();   
        }
   });
</script>
@endsection