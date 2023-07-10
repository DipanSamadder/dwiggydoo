@php
    $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '_', $sec->key_title));
    $title_page = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '_', $data->key_title));
    $name = strtolower($slug);
    $page_title = strtolower($title_page);
    
@endphp

<form id="update_form" action="{{ route('pages_extra_content.update') }}" method="POST" enctype="multipart/form-data" >
    <input type="hidden" name="page_id" value="{{ $data->id }}" />
    <input type="hidden" name="page_name" value="{{ $page_title }}" />
    <input type="hidden" name="section_name" value="{{ $name }}" />
    <input type="hidden" name="section_id" value="{{ $sec->id }}" />

    @csrf 
        @if($sec->meta_fields !="")
        @foreach (json_decode($sec->meta_fields) as $key2 => $element)
            @php 
                $page_meta_key = $name."_".$element->type."_".$key2;
            @endphp

            @if ($element->type == 'text')
            
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                        <label class="form-label">{{ ucfirst($element->label) }}</label>  
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8">
                        <div class="form-group">
                            <input type="hidden" name="type[]" value="{{ $page_meta_key }}">
                            <input type="text" name="{{ $page_meta_key }}" class="form-control" placeholder="{{ ucfirst($element->label) }}" onchange="is_edited()" value="{{ dsld_page_meta_value_by_meta_key($page_meta_key, $data->id) }}" />
                            <small>Meta Key: {{ $page_meta_key }}</small>
                        </div>
                    </div>
                </div>
            @elseif ($element->type == 'faculty')
            
            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                    <label class="form-label">{{ ucfirst($element->label) }}</label>  
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8">
                    <div class="form-group">
                        <input type="hidden" name="type[]" value="{{ $page_meta_key }}">
                        <select class="form-control w-100  ms select2 mr-2" name="{{ $page_meta_key }}">
                            <option value="">-- Please select --</option>
                            

                            @foreach(App\Models\user::where('banned', 0)->where('user_type', 'staff')->get() as $key => $value)
                                <option value="{{ $value->id }}" @if($value->id == dsld_page_meta_value_by_meta_key($page_meta_key, $data->id)) Selected @endif > {{ $value->name }}
                                </option>
                            @endforeach
                        </select> 
                        <small>Meta Key: {{ $page_meta_key }}</small>
                    </div>
                </div>
            </div>
            @elseif ($element->type == 'program')
            
            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                    <label class="form-label">{{ ucfirst($element->label) }}</label>  
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8">
                    <div class="form-group">
                        <input type="hidden" name="type[]" value="{{ $page_meta_key }}">
                            <select class="form-control show-tick ms select2" name="{{ $page_meta_key }}[]"  multiple>
                                <option value="">-- Please select --</option>
                                @foreach(App\Models\page::where('status', 1)->where('type', 'program_page')->where('level', 3)->get() as $key => $value)
                                    <option value="{{ $value->id }}" @if(dsld_page_meta_value_by_meta_key($page_meta_key, $data->id) != '')@if(in_array($value->id, json_decode(@dsld_page_meta_value_by_meta_key($page_meta_key, $data->id), true))) Selected @endif @endif> {{ $value->title }} ({{ $value->level }}) ({{ $value->parent }})
                                    </option>
                                @endforeach
                            </select>
                        <small>Meta Key: {{ $page_meta_key }}</small>
                    </div>
                </div>
            </div>
            @elseif ($element->type == 'image_box')
                @php 
                    $page_meta_key_heading = $page_meta_key."_heading";
                    $page_meta_key_subheading = $page_meta_key."_subheading";
                    $page_meta_key_img = $page_meta_key."_img";
                    $page_meta_key_content = $page_meta_key."_content";
                    $page_meta_key_btn = $page_meta_key."_btn";
                    $page_meta_key_link = $page_meta_key."_link";
                @endphp
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                        <label class="form-label">{{ ucfirst($element->label) }}</label>  
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="hidden" name="type[]" value="{{ $page_meta_key_heading }}">
                                    <input type="text" name="{{ $page_meta_key_heading }}" class="form-control" placeholder="Heading" onchange="is_edited()" value="{{ dsld_page_meta_value_by_meta_key($page_meta_key_heading, $data->id) }}" />
                                    <small>Meta Key: {{ $page_meta_key_heading }}</small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="hidden" name="type[]" value="{{ $page_meta_key_subheading }}">
                                    <input type="text" name="{{ $page_meta_key_subheading }}" class="form-control" placeholder="Sub Heading" onchange="is_edited()" value="{{ dsld_page_meta_value_by_meta_key($page_meta_key_subheading, $data->id) }}" />
                                    <small>Meta Key: {{ $page_meta_key_subheading }}</small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="hidden" name="type[]" value="{{ $page_meta_key_img }}">
                                    <select class="form-control show-tick ms select2" name="{{ $page_meta_key_img }}" onchange="is_edited()">
                                        <option value="">-- Please select --</option>
                                        @foreach(App\Models\Upload::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get() as $key => $value)
                                            <option value="{{ $value->id }}" @if(dsld_page_meta_value_by_meta_key($page_meta_key_img, $data->id) == $value->id) selected @endif>({{ $value->id }}) - {{ $value->file_title}} - {{ $value->extension}}</option>
                                        @endforeach
                                    </select>
                                    @if(dsld_page_meta_value_by_meta_key($page_meta_key_img, $data->id) != '')
                                    <div class="image mt-2">
                                        <img src="{{ dsld_uploaded_asset(dsld_page_meta_value_by_meta_key($page_meta_key_img, $data->id)) }}"  alt="{{ dsld_upload_file_title(dsld_page_meta_value_by_meta_key($page_meta_key_img, $data->id)) }}" class="img-fluid" width="100">
                                    </div> 
                                    @endif 
                                </div>
                                <small>Meta Key: {{ $page_meta_key_img }}</small>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="hidden" name="type[]" value="{{ $page_meta_key_content }}">
                                    <textarea name="{{ $page_meta_key_content }}" class="form-control" placeholder="Content" onchange="is_edited()">{{ dsld_page_meta_value_by_meta_key($page_meta_key_content, $data->id) }}</textarea>
                                    <small>Meta Key: {{ $page_meta_key_content }}</small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="hidden" name="type[]" value="{{ $page_meta_key_btn }}">
                                    <input type="text" name="{{ $page_meta_key_btn }}" class="form-control" placeholder="Button name" onchange="is_edited()" value="{{ dsld_page_meta_value_by_meta_key($page_meta_key_btn, $data->id) }}" />
                                    <small>Meta Key: {{ $page_meta_key_btn }}</small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="hidden" name="type[]" value="{{ $page_meta_key_link }}">
                                    <input type="text" name="{{ $page_meta_key_link }}" class="form-control" placeholder="Button link" onchange="is_edited()" value="{{ dsld_page_meta_value_by_meta_key($page_meta_key_link, $data->id) }}" />
                                    <small>Meta Key: {{ $page_meta_key_link }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($element->type == 'image_box_repeter')
            @php 
                $page_meta_key_repeter_heading = $page_meta_key."_heading";
                $page_meta_key_repeter_subheading = $page_meta_key."_subheading";
                $page_meta_key_repeter_img = $page_meta_key."_img";
                $page_meta_key_repeter_content = $page_meta_key."_content";
                $page_meta_key_repeter_btn = $page_meta_key."_btn";
                $page_meta_key_repeter_link = $page_meta_key."_link";
            @endphp
            <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                        <label class="form-label">{{ ucfirst($element->label) }}</label>  
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8">
                        <div class="text_repeter{{ $sec->id }}_{{ $key2 }}">

                            <input type="hidden" name="type[]" value="{{ $page_meta_key }}">

                            <input type="hidden" name="{{ $page_meta_key }}[]" value="{{ $page_meta_key_repeter_heading }}">
                            <input type="hidden" name="{{ $page_meta_key }}[]" value="{{ $page_meta_key_repeter_subheading }}">
                            <input type="hidden" name="{{ $page_meta_key }}[]" value="{{ $page_meta_key_repeter_img }}">
                            <input type="hidden" name="{{ $page_meta_key }}[]" value="{{ $page_meta_key_repeter_content }}">
                            <input type="hidden" name="{{ $page_meta_key }}[]" value="{{ $page_meta_key_repeter_btn }}">
                            <input type="hidden" name="{{ $page_meta_key }}[]" value="{{ $page_meta_key_repeter_link }}">

                            @if(dsld_page_meta_value_by_meta_key($page_meta_key_repeter_img, $data->id) != '')
                                @foreach(@json_decode(dsld_page_meta_value_by_meta_key($page_meta_key_repeter_img, $data->id), true) as $key3 => $value) 
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="hidden" name="type[]" value="{{ $page_meta_key_repeter_heading }}">
                                                <input type="text" class="form-control"  name="{{ $page_meta_key_repeter_heading }}[]" placeholder="Heading" value="{{json_decode(dsld_page_meta_value_by_meta_key($page_meta_key_repeter_heading, $data->id), true)[$key3] }}">  
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                            <input type="hidden" name="type[]" value="{{ $page_meta_key_repeter_subheading }}"><input type="text" class="form-control"  name="{{ $page_meta_key_repeter_subheading }}[]" placeholder="Sub Heading" value="{{json_decode(dsld_page_meta_value_by_meta_key($page_meta_key_repeter_subheading, $data->id), true)[$key3] }}">  
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                            <input type="hidden" name="type[]" value="{{ $page_meta_key_repeter_content }}"><input type="text" class="form-control"  name="{{ $page_meta_key_repeter_content }}[]" placeholder="Content" value="{{json_decode(dsld_page_meta_value_by_meta_key($page_meta_key_repeter_content, $data->id), true)[$key3] }}">  
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="hidden" name="type[]" value="{{ $page_meta_key_repeter_img }}">
                                                 <label class="form-label">Banner </label><a class="btn btn-primary text-white" onclick="media_file_get('{{ json_decode(dsld_page_meta_value_by_meta_key($page_meta_key_repeter_img, $data->id), true)[$key3] }}','{{ $page_meta_key_repeter_img }}{{$key3}}', 0)"><i class="zmdi zmdi-collection-image"></i></a><div class="{{ $page_meta_key_repeter_img }}{{$key3}}">@if(isset(json_decode(dsld_page_meta_value_by_meta_key($page_meta_key_repeter_img, $data->id), true)[$key3]))<strong>Selected Image:</strong><i> {{ @json_decode(dsld_page_meta_value_by_meta_key($page_meta_key_repeter_img, $data->id), true)[$key3] }}</i>@endif</div>
                        
                                                <input type="hidden" class="{{ $page_meta_key_repeter_img }}{{$key3}}" name="{{ $page_meta_key_repeter_img }}[]" id="banner" value="{{ json_decode(dsld_page_meta_value_by_meta_key($page_meta_key_repeter_img, $data->id), true)[$key3] }}" >
                                                @if(json_decode(dsld_page_meta_value_by_meta_key($page_meta_key_repeter_img, $data->id), true)[$key3] != "")
                                                <div class="image mt-2">
                                                    <img src="{{ dsld_uploaded_asset(json_decode(dsld_page_meta_value_by_meta_key($page_meta_key_repeter_img, $data->id), true)[$key3]) }}"  alt="{{ dsld_upload_file_title(json_decode(dsld_page_meta_value_by_meta_key($page_meta_key_repeter_img, $data->id), true)[$key3]) }}" class="img-fluid" width="100">
                                                    <div style="cursor: pointer;display: initial;" onclick="media_file_remove('{{ json_decode(dsld_page_meta_value_by_meta_key($page_meta_key_repeter_img, $data->id), true)[$key3] }}','{{ $page_meta_key_repeter_img }}{{$key3}}', 0)"><i class="zmdi zmdi-hc-fw"></i></div>
                                                </div> 
                                                @endif 
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                            <input type="hidden" name="type[]" value="{{ $page_meta_key_repeter_btn }}"><input type="text" class="form-control"  name="{{ $page_meta_key_repeter_btn }}[]" placeholder="Button Name" value="{{json_decode(dsld_page_meta_value_by_meta_key($page_meta_key_repeter_btn, $data->id), true)[$key3] }}">  
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                            <input type="hidden" name="type[]" value="{{ $page_meta_key_repeter_link }}"><input type="text" class="form-control"  name="{{ $page_meta_key_repeter_link }}[]" placeholder="Button Link" value="{{json_decode(dsld_page_meta_value_by_meta_key($page_meta_key_repeter_link, $data->id), true)[$key3] }}">  
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="remove-parent" data-parent=".row">
                                                <i class="zmdi zmdi-hc-fw"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <small>Meta Key: {{ $page_meta_key }}</small><br>
                        <small>
                            {{ $page_meta_key_repeter_heading }}<br>
                            {{ $page_meta_key_repeter_subheading }}<br>
                            {{ $page_meta_key_repeter_content }}<br>
                            {{ $page_meta_key_repeter_img }}<br>
                            {{ $page_meta_key_repeter_btn }}<br>
                            {{ $page_meta_key_repeter_link }}<br>
                        </small>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4">
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        <div class="input-group mb-4">
                            <button
                                type="button"
                                class="btn btn-primary addMoreBtn"
                                data-toggle="add-more"
                                data-content='<div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="hidden" name="type[]" value="{{ $page_meta_key_repeter_heading }}">
                                            <input type="text" class="form-control"  name="{{ $page_meta_key_repeter_heading }}[]" placeholder="Heading">  
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <input type="hidden" name="type[]" value="{{ $page_meta_key_repeter_subheading }}"><input type="text" class="form-control"  name="{{ $page_meta_key_repeter_subheading }}[]" placeholder="Sub Heading">  
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <input type="hidden" name="type[]" value="{{ $page_meta_key_repeter_content }}"><input type="text" class="form-control"  name="{{ $page_meta_key_repeter_content }}[]" placeholder="Content">  
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="hidden" name="type[]" value="{{ $page_meta_key_repeter_img }}">

                                            <label class="form-label">Banner </label><a class="btn btn-primary text-white" onclick="media_file_get(`120`,`{{ $page_meta_key_repeter_img }}`, 0)"><i class="zmdi zmdi-collection-image"></i></a><div class="{{ $page_meta_key_repeter_img }}"></div>
                        
                                            <input type="hidden" class="{{ $page_meta_key_repeter_img }}" name="{{ $page_meta_key_repeter_img }}[]" id="banner" value="{{ dsld_page_meta_value_by_meta_key($page_meta_key, $data->id) }}" >

                                            
                                            @if(dsld_page_meta_value_by_meta_key($page_meta_key, $data->id) != "")
                                            <div class="image mt-2">
                                                <img src="{{ dsld_uploaded_asset(dsld_page_meta_value_by_meta_key($page_meta_key, $data->id)) }}"  alt="{{ dsld_upload_file_title(dsld_page_meta_value_by_meta_key($page_meta_key, $data->id)) }}" class="img-fluid" width="100">
                                            </div> 
                                            @endif 
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <input type="hidden" name="type[]" value="{{ $page_meta_key_repeter_btn }}"><input type="text" class="form-control"  name="{{ $page_meta_key_repeter_btn }}[]" placeholder="Button Name">  
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <input type="hidden" name="type[]" value="{{ $page_meta_key_repeter_link }}"><input type="text" class="form-control"  name="{{ $page_meta_key_repeter_link }}[]" placeholder="Button Link">  
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="remove-parent" data-parent=".row">
                                            <i class="zmdi zmdi-hc-fw"></i>
                                        </button>
                                    </div>
                                </div>'
                                data-target=".text_repeter{{ $sec->id }}_{{ $key2 }}">
                                <i class="zmdi zmdi-hc-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @elseif ($element->type == 'text_repeter')

                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                        <label class="form-label">{{ ucfirst($element->label) }}</label>  
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8">
                        <div class="text_repeter{{ $sec->id }}_{{ $key2 }}">
                            <input type="hidden" name="type[]" value="{{ $page_meta_key }}">
                            
                            @if(dsld_page_meta_value_by_meta_key($page_meta_key, $data->id) != '')
                                @foreach(@json_decode(dsld_page_meta_value_by_meta_key($page_meta_key, $data->id), true) as $key3 => $value) 
                                    
                                    <div class="row clearfix">
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control"  name="{{ $page_meta_key }}[]" placeholder="{{ ucfirst($element->label) }}" value="{{ $value }}">  
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
                        <small>Meta Key: {{ $page_meta_key }}</small>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4">
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        <div class="input-group mb-4">
                            <button
                                type="button"
                                class="btn btn-primary addMoreBtn"
                                data-toggle="add-more"
                                data-content='<div class="row clearfix">
                                    <div class="col-sm-10">
                                        <div class="form-group"><input type="text" class="form-control"  name="{{ $page_meta_key }}[]" placeholder="{{ ucfirst($element->label) }}">  
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="remove-parent" data-parent=".row">
                                            <i class="zmdi zmdi-hc-fw"></i>
                                        </button>
                                    </div>
                                </div>'
                                data-target=".text_repeter{{ $sec->id }}_{{ $key2 }}">
                                <i class="zmdi zmdi-hc-fw"></i>
                            </button>
                        </div><small>Meta Key: {{ $page_meta_key }}</small>
                    </div>
                </div>
            
            @elseif ($element->type == 'file_repeter')

                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                        <label class="form-label">{{ ucfirst($element->label) }}</label>  
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8">
                        <div class="file_repeter{{ $sec->id }}_{{ $key2 }}">
                            <div class="form-group">
                                <input type="hidden" name="type[]" value="{{ $page_meta_key }}">
                                <select class="form-control show-tick ms select2" name="{{ $page_meta_key }}[]" multiple>
                                    <option value="">-- Please select --</option>
                                    @foreach(App\Models\Upload::where('user_id', Auth::user()->id)->orderBy('id', 'Desc')->get() as $key => $value)
                                        <option value="{{ $value->id }}" @if(dsld_page_meta_value_by_meta_key($page_meta_key, $data->id) != 'Null') @if(is_array(json_decode(dsld_page_meta_value_by_meta_key($page_meta_key, $data->id), true)))@if(in_array($value->id, json_decode(dsld_page_meta_value_by_meta_key($page_meta_key, $data->id), true))) selected @endif @endif @endif>({{ $value->id }}) - {{ $value->file_title}} - {{ $value->extension}} </option>
                                    @endforeach
                                </select>
                                
                                @if(is_array(json_decode(dsld_page_meta_value_by_meta_key($page_meta_key, $data->id), true)) && count(json_decode(dsld_page_meta_value_by_meta_key($page_meta_key, $data->id), true)) > 0)
                                <div class="image mt-2">
                                    @foreach(json_decode(dsld_page_meta_value_by_meta_key($page_meta_key, $data->id), true) as $key => $value)
                                        <img src="{{ dsld_uploaded_asset($value) }}"  alt="{{ dsld_upload_file_title($value) }}" class="img-fluid mr-2" width="100">
                                    @endforeach
                                    </div> 
                                @endif 
                            </div>
                        </div><small>Meta Key: {{ $page_meta_key }}</small>
                        
                    </div>
                </div>
            @elseif ($element->type == 'multi_select')

                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                        <label class="form-label">{{ ucfirst($element->label) }}</label>  
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8">
                        <div class="file_repeter{{ $sec->id }}_{{ $key2 }}">
                            <div class="form-group">
                                <input type="hidden" name="type[]" value="{{ $page_meta_key }}">
                                <select class="form-control show-tick ms select2" name="{{ $page_meta_key }}[]"  multiple>
                                    <option value="">-- Please select --</option>
                                    @if($element->label =='Need Section')
                                        @foreach($school as $key => $sec)
                                         @if($sec->title !='Need Section')
                                            <option value="{{ $sec->key_title }}" @if(dsld_page_meta_value_by_meta_key($page_meta_key, $data->id) != '')  @if(in_array($sec->key_title, json_decode(dsld_page_meta_value_by_meta_key($page_meta_key, $data->id), true))) selected @endif @endif>{{ $sec->title }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        @if (is_array(json_decode($element->options)))
                                            @foreach (json_decode($element->options) as $value)
                                                <option value="{{ $value }}" @if(dsld_page_meta_value_by_meta_key($page_meta_key, $data->id) != '')  @if(in_array($value, json_decode(dsld_page_meta_value_by_meta_key($page_meta_key, $data->id), true))) selected @endif @endif>{{ $value }}</option>
                                            @endforeach
                                        @endif
                                    @endif
                                </select>
                                
                            </div>
                        </div><small>Meta Key: {{ $page_meta_key }}</small>
                        
                    </div>
                </div>
            @elseif ($element->type == 'select' || $element->type == 'radio')

                <div class="row clearfix mb-2">
                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                        <label class="form-label">{{ ucfirst(str_replace('_', ' ', $element->type)) }}</label>  
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8">
                        <div class="form-group">
                            <input type="hidden" name="type[]" value="{{ $page_meta_key }}">
                            <select class="form-control" name="{{ $page_meta_key }}">
                                <option value="">-- Please select --</option>
                                @if (is_array(json_decode($element->options)))
                                    @foreach (json_decode($element->options) as $value)
                                        <option value="{{ $value }}" @if($value == dsld_page_meta_value_by_meta_key($page_meta_key, $data->id)) selected @endif>{{ $value }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div><small>Meta Key: {{ $page_meta_key }}</small>
                    </div>
                </div>

            @elseif ($element->type == 'file')

                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                        <label class="form-label">{{ ucfirst($element->label) }}</label>  
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8">
                        <div class="form-group">
                            <input type="hidden" name="type[]" value="{{ $page_meta_key }}">

                            <label class="form-label">Banner </label><a class="btn btn-primary text-white" onclick="media_file_get('{{ dsld_page_meta_value_by_meta_key($page_meta_key, $data->id) }}','{{ $page_meta_key }}', 0)"><i class="zmdi zmdi-collection-image"></i></a><div class="{{ $page_meta_key }}">@if(!empty(dsld_page_meta_value_by_meta_key($page_meta_key, $data->id)))<strong>Selected Image:</strong><i> {{ @dsld_page_meta_value_by_meta_key($page_meta_key, $data->id) }}</i>@endif</div>
                        
                            <input type="hidden" class="{{ $page_meta_key }}" name="{{ $page_meta_key }}" id="banner" value="{{ dsld_page_meta_value_by_meta_key($page_meta_key, $data->id) }}" >

                            @if(dsld_page_meta_value_by_meta_key($page_meta_key, $data->id) != '')
                            <div class="image mt-2">
                                <img src="{{ dsld_uploaded_asset(dsld_page_meta_value_by_meta_key($page_meta_key, $data->id)) }}"  alt="{{ dsld_upload_file_title(dsld_page_meta_value_by_meta_key($page_meta_key, $data->id)) }}" class="img-fluid" width="100"><div style="cursor: pointer;display: initial;" onclick="media_file_remove('{{ dsld_page_meta_value_by_meta_key($page_meta_key, $data->id) }}','{{ $page_meta_key }}', 0)"><i class="zmdi zmdi-hc-fw"></i></div>
                            </div> 
                            @endif 
                        </div><small>Meta Key: {{ $page_meta_key }}</small>
                    </div>
                </div>

            @elseif ($element->type == 'button')

                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                        <label class="form-label">{{ ucfirst($element->label) }}</label>  
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8">
                        <div class="form-group">
                            <input type="hidden" name="type[]" value="{{ $page_meta_key }}">
                            <input type="text" name="{{ $page_meta_key }}" class="form-control" placeholder="Url" onchange="is_edited()" value="{{ dsld_page_meta_value_by_meta_key($page_meta_key, $data->id) }}" />
                        </div><small>Meta Key: {{ $page_meta_key }}</small>
                    </div>
                </div>

            @elseif ($element->type == 'editor')

                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                        <label class="form-label">{{ ucfirst($element->label) }}</label>  
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8">
                        <div class="form-group">
                            <input type="hidden" name="type[]" value="{{ $page_meta_key }}">
                            <textarea  class="summernote" name="{{ $page_meta_key }}"><?php $str = dsld_page_meta_value_by_meta_key($page_meta_key, $data->id); echo htmlspecialchars_decode($str); ?></textarea >  
                        </div><small>Meta Key: {{ $page_meta_key }}</small>
                    </div>
                </div>
            @endif
        @endforeach
        @endif
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 form-control-label">
                <div class="swal-button-container">
                    <button type="submit" class="btn btn-success btn-round waves-effect dsld-btn-loader" id="submit_btn">Update</button>
                </div>
            </div>
        </div>

</form>
<script type="text/javascript">
    $(".summernote").summernote('code');
    $('.select2').select2({
        dropdownParent: $('.form-group')
    });
    
        
    
    $(function(){
    $('[data-toggle="add-more"]').each(function () {
        var $this = $(this);
        var content = $this.data("content");
        var target = $this.data("target");

        $this.on("click", function (e) {
            e.preventDefault();
            $(target).append(content);
        });
    });
});
</script>