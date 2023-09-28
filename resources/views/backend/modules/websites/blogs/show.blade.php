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
    
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>All</strong> {{ $name }} </h2>
            </div>
            <div class="body">
                <div class="row">
                <div class="col-lg-6">
                    @if(dsld_have_user_permission('pages_add') == 1)
                    <button class="btn btn-success btn-round mb-4" title="Add New" onclick="add_new_lg_modal_form()"><i class="zmdi zmdi-hc-fw"></i> Add New</button>
                    @endif
                    <button class="btn btn-info btn-round mb-4" onclick="get_pages();"><i class="zmdi zmdi-hc-fw"></i> Reload</button>
                </div>
                <div class="col-lg-6">
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
                    </form>
                </div>
                </div>
                <div class="table-responsive">
                    <div id="data_table"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('backend.modules.websites.blogs.add')
    <input type="hidden" name="page_no" id="page_no" value="1">
    <input type="hidden" name="page_no" id="page_no" value="1">
    <input type="hidden" name="get_pages" id="get_pages" value="{{ route('ajax_blogs') }}">
    @include('backend.inc.crul_ajax')

<script>
    function add_new_lg_modal_form(){
        $('#add_new_larger_modals').modal('show');
        $('#add_new_larger_modals_tile').text('Add New {{ $name }}');
    }
</script>
@endsection