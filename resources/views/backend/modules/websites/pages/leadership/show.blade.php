@extends('backend.layouts.app')

@section('header')
<style>
    .table tbody td, .table tbody th {padding: 0.25rem 0.55rem;}

</style>


@endsection

@section('content')
@php
$name = 'page';
if(isset($page) && !empty($page['name'])){
    $name = $page['name'];
}
@endphp
 <!-- Exportable Table -->
 <div class="row clearfix">
    @if(dsld_have_user_permission('leaderships_add') == 1)
    <div class="col-lg-8">
    @else
    <div class="col-lg-12">
    @endif
        <div class="card">
            <div class="header">
                <h2><strong>All</strong> {{ $name }}s </h2>
            </div>
            <div class="body">
                <div class="row">
                    <div class="col-lg-4">
                        <button class="btn btn-info btn-round mb-4" onclick="get_pages();"><i class="zmdi zmdi-hc-fw"></i> Reload</button>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-inline" id="search_media">
                            <div class="col-lg-6 form-group">                                
                                <select class="form-control" name="sort" onchange="filter()">
                                    <option value="newest">New to Old</option>
                                    <option value="oldest">Old to New</option>
                                    <option value="active">Active</option>
                                    <option value="deactive">Deactive</option>
                                </select>
                            </div>
                            <div class="col-lg-6 form-group">                                    
                                <input type="text" class="form-control w-100" name="search" onblur="filter()" placeholder="Search..">
                            </div>
                        </form><br>  
                    </div>
                </div>
                <div class="table-responsive">
                    <div id="data_table"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">

        @if(dsld_have_user_permission('leaderships_add') == 1)
        <div class="card">
            <div class="header">
                <h2><strong>Add New</strong> {{ $name }}s </h2>
            </div>
            <div class="body">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="add_new_form" action="{{ route('leaderships.store') }}" method="POST" enctype="multipart/form-data" >
                            <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
                            @csrf 
                            <div class="modal-body">
                                <div class="row clearfix">

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Name <small class="text-danger">*</small></label>                                 
                                            <input type="text" name="title" class="form-control" placeholder="Name" />                                   
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Category </label>                                 
                                            <select class="form-control show-tick ms select2" name="cat_type">
                                                <option value="0">-- Please select --</option>
                                                <option value="governance" selected>Governance</option>
                                                <option value="leadership" selected>Leadership</option>
                                                <option value="faculty_data" selected>Faculty</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Photo <small class="text-danger">*</small></label>                                 
                                            <!-- <select class="form-control show-tick ms select2" name="banner" id="banner" onchange="is_edited()">
                                                <option value="">-- Please select --</option>
                                                @foreach(App\Models\Upload::where('user_id', Auth::user()->id)->where('type', 'image')->get() as $key => $value)
                                                    <option value="{{ $value->id }}">({{ $value->id }}) - {{ $value->file_title}} </option>
                                                @endforeach
                                            </select>   -->
                                            
                                            <a class="btn btn-primary text-white" onclick="media_file_get('{{ @$data->banner }}','put_image', 0)"><i class="zmdi zmdi-collection-image"></i></a><div class="put_image">@if(isset($data->banner))<strong>Selected Image:</strong><i> {{ @$data->banner }}</i>@endif</div>
                        
                                            <input type="hidden" class="put_image" name="banner" id="banner" value="{{ @$data->banner }}" onchange="is_edited()">                                                              
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Designation </label>   
                                            <textarea name="short_content" class="form-control" placeholder="Designation"></textarea>                                  
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Order</label>                                 
                                            <input type="text" name="order" class="form-control" placeholder="Order" value="10" />                                   
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Status <small class="text-danger">*</small></label>                                 
                                            <select class="form-control w-100  ms select2 mr-2" name="status" id="status">
                                                <option value="">-- Please select --</option>
                                                <option value="1" selected>Active</option>
                                                <option value="0">Deactive</option>
                                            </select>                             
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="swal-button-container">
                                            <button type="submit" class="btn btn-success btn-round waves-effect dsld-btn-loader">SUBMIT</button>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection

@section('footer')
    <!--Edit Section-->
    <div class="modal fade" id="edit_larger_modals" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                
                <form id="update_form" action="{{ route('leaderships.update') }}" method="POST" enctype="multipart/form-data" >
                @csrf 
                <div class="modal-header">
                    <h4 class="title" id="edit_larger_modals_title"></h4>
                    <button type="submit" class="btn btn-success btn-round waves-effect dsld-btn-loader">UPDATE</button>
                </div>
                <div class="modal-body">
                    <div id="edit_larger_modals_body">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-round waves-effect" data-dismiss="modal">CLOSE</button>
                    <div class="swal-button-container">
                        <button type="submit" class="btn btn-success btn-round waves-effect dsld-btn-loader">UPDATE</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--Edit Section-->


    <input type="hidden" name="page_no" id="page_no" value="1">
    <input type="hidden" name="get_pages" id="get_pages" value="{{ route('leaderships.get_ajax_files') }}">
    @include('backend.inc.crul_ajax')
@endsection