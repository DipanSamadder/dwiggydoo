@extends('backend.layouts.app')

@section('header')
<link rel="stylesheet" href="{{ dsld_static_asset('backend/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<style>
    .bootstrap-tagsinput{    border: 1px solid #cbcbcb !important;width: 100%;}
</style>
@endsection

@section('content')
 <!-- Exportable Table -->
 <form id="update_form" action="{{ route('pages.update') }}" method="POST" enctype="multipart/form-data" >
    <div class="row clearfix">
        <div class="col-lg-8">
            @csrf 
            <input type="hidden" name="id" id="id" value="{{ $data->id }}" />
            <input type="hidden" name="type" id="type" value="research_page" />
            <div class="card mb-0">
                <div class="header">
                    <a href="{{ route('custom-pages.show_custom_page', [$data->slug ]) }}" target="_blank">         
                        <h2><strong> <i class="zmdi zmdi-hc-fw"></i> {{ $data->title }}</strong></h2>
                    </a>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label class="form-label">Title <small class="text-danger">*</small></label>  
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                            <input type="text" name="title" id="title" class="form-control" placeholder="Title" onchange="is_edited()" value="{{ $data->title }}" />
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
                    <h2><strong>Content</strong></h2>
                </div>
                <div class="form-group">                                
                    <div class="summernote" id="content" onchange="is_edited()"><?php $str = $data->content; echo htmlspecialchars_decode($str); ?></div>                                   
                </div>
            </div>
            <div class="card mb-0">
                <div class="header">
                    <h2><strong>Setting</strong></h2>                        
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-4 form-control-label">
                            <label class="form-label"><strong>Page Name </strong></label>  
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-8">
                            <div class="form-group">
                                <div class="checkbox">
                                    <input name="setting[]" type="hidden" value="setting_page_name_hide">
                                    <input id="setting_page_name_hide" name="setting_page_name_hide" type="checkbox" value="yes" @if(dsld_page_meta_value_by_meta_key('setting_page_name_hide', $data->id) =='yes') checked @endif>
                                    <label for="setting_page_name_hide">Hide</label>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-4 form-control-label">
                            <label class="form-label"><strong>Banner/Slider </strong></label>  
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-8">
                            <div class="form-group">
                                <input name="setting[]" type="hidden" value="setting_page_banner_slider">
                                <input name="setting_slider" type="hidden" id="setting_slider"  @if(dsld_page_meta_value_by_meta_key('setting_page_banner_slider', $data->id) =='banner') value="banner" @elseif(dsld_page_meta_value_by_meta_key('setting_page_banner_slider', $data->id) =='slider') value="slider" @else value="no" @endif>
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="setting_page_banner_slider" id="setting_page_banner_slider_no" class="with-gap slider_activity" value="no"  @if(dsld_page_meta_value_by_meta_key('setting_page_banner_slider', $data->id) =='no') checked @endif>
                                    <label for="setting_page_banner_slider_no">No Need</label>
                                </div> 
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="setting_page_banner_slider" id="setting_page_banner_slider_banner" class="with-gap slider_activity" value="banner"  @if(dsld_page_meta_value_by_meta_key('setting_page_banner_slider', $data->id) =='banner') checked @endif>
                                    <label for="setting_page_banner_slider_banner">Banner</label>
                                </div>                                 
                            </div>
                        </div>
                    </div>
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
                        <label class="form-label">Template *</label>                                 
                        <select class="form-control" name="template" id="template" onchange="is_edited()">
                            <option value="">-- Please select --</option>
                            <option value="default"  @if($data->template == 'default') selected @endif>Default</option>
                            <option value="page_with_sidebar"  @if($data->template == 'page_with_sidebar') selected @endif>Page With Sidebar</option>
                            <option value="research_details"  @if($data->template == 'research_details') selected @endif>Research Details</option>
                        </select>                             
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Parent *</label>                                 
                        <select class="form-control" name="parent" id="parent" onchange="is_edited()">
                            <option value="0">-- Please select --</option>
                            @foreach(App\Models\Page::where('type', 'research_page')->where('status', 1)->whereNotIn('id', [$data->id])->get() as $key => $value)
                                
                                <option value="{{ $value->id }}"  @if($data->parent ==  $value->id) selected @endif>{{ $value->title }}</option>
                                @php
                                    $child = App\Models\Page::where('parent', $value->id)->where('type', 'research_page')->where('level', 2)->where('status', 1)->get();
                                @endphp
                                @if($child != '')
                                    @foreach($child as $key => $value1)
                                        <option value="{{ $value1->id }}"  @if($data->parent ==  $value1->id) selected @endif>- {{ $value1->title }}</option>
                                        @php
                                            $child2 = App\Models\Page::where('parent', $value1->id)->where('type', 'research_page')->where('level', 3)->where('status', 1)->get();
                                        @endphp
                                        @if($child2 != '')
                                            @foreach($child2 as $key => $value2)
                                                <option value="{{ $value2->id }}"  @if($data->parent ==  $value2->id) selected @endif>-- {{ $value2->title }}</option>
                                                @php
                                                    $child3 = App\Models\Page::where('parent', $value2->id)->where('type', 'research_page')->where('level', 4)->where('status', 1)->get();
                                                @endphp
                                                @if($child3 != '')
                                                    @foreach($child3 as $key => $value3)
                                                        <option value="{{ $value3->id }}"  @if($data->parent ==  $value3->id) selected @endif>--- {{ $value3->title }}</option>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif

                            @endforeach
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
                    <a href="{{ route('custom-pages.show_custom_page', [$data->slug ]) }}" traget="_blank"  class="btn btn-success btn-round waves-effect">Preview</a>
                    <button type="button" class="btn btn-danger btn-round waves-effect" onclick="DSLDDeleteAlert('{{ $data->id }}','{{ route('pages.destory') }}','{{ csrf_token() }}')"><i class="zmdi zmdi-delete"></i></button>
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

@if(is_array($section) || count($section) > 0)
<div class="department_fields" style="display:none">
<hr>
<h4>Research Details</h4>
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card mb-0">
            <div class="body">
            @php 
                $needsection_multi_select_0 = dsld_page_meta_value_by_meta_key('needsection_multi_select_0', $data->id);
            @endphp
                <!-- Nav tabs -->
                <ul class="nav nav-tabs p-0 mb-3 nav-tabs-success" role="tablist">
                    @foreach($section as $key => $sec)
                        <li class="nav-item"><a class="nav-link @if($key == 0 ) active @endif" data-toggle="tab" href="#page_section-{{ $key }}-{{ $sec->id }}" onclick="edit_pages_section('{{ $sec->id }}', '{{ $data->id }}')"> {{ $sec->title }} </a></li>
                    @endforeach
                </ul>
                
                <!-- Tab panes -->
                <div class="tab-content">

                    @foreach($section as $key => $sec)
                                        
                    <div role="tabpanel" class="tab-pane  @if($key == 0 ) in active @endif" id="page_section-{{ $key }}-{{ $sec->id }}">
                        <div id="edit_pages_section_body{{ $sec->id }}"></div>
                    </div>
                    @endforeach

                </div>

                
            </div>
        </div>
        
    </div>
</div>
<div>
@endif
@endsection

@section('footer')



<script src="{{ dsld_static_asset('backend/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<script>
    function edit_pages_section(section_id, page_id){
        // $('#edit_pages_section').modal('show');
        $('#edit_pages_section_body'+section_id).html('<center><img src="{{ dsld_static_asset('backend/assets/images/circle-loading.gif') }}" style="max-width:100px" ></center>');

        $.ajax({
            url: "{{ route('researchs.edit_extra') }}",
            type: "post",
            cache : false,
            data: {'_token':'{{ csrf_token() }}', 'section_id':section_id, 'id':page_id},
            success: function(d) {
                $('#edit_pages_section_body'+section_id).html(d);
            }
        });
    }
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
        window.location.href = "{{ route('pages.index') }}";
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