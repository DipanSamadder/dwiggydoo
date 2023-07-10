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
    @if(dsld_check_permission(['add questions']))
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
        @if(dsld_check_permission(['add questions']))
        <div class="card">
            <div class="header">
                <h2><strong>Add New</strong> {{ $name }}s </h2>
            </div>
            <div class="body">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="add_new_form" action="{{ route('not_pet_questions.store') }}" method="POST" enctype="multipart/form-data" >
                            @csrf 
                            <div class="modal-body">
                                <div class="row clearfix">

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Question <small class="text-danger">*</small></label>                                 
                                            <input type="text" name="question" class="form-control" placeholder="Question" />                                   
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Option <small class="text-danger">*</small></label>                                 
                                            <div class="option-target">
                                                <div class="row gutters-5">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Option" name="option[]" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                            <button
                                                type="button"
                                                class="btn btn-soft-secondary btn-sm"
                                                data-toggle="add-more"
                                                data-content='
                                                <div class="row gutters-5">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Option" name="option[]">
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </div>
                                                </div>'
                                                data-target=".option-target">
                                                Add New
                                            </button>                                   
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Answer <small class="text-danger">*</small></label>                                 
                                            <select name="answer" class="form-control" required>
                                                    <option disabled selected value="">Select Answer</option>
                                                    <option value="0">1st</option>
                                                    <option value="1">2nd</option>
                                                    <option value="2">3rd</option>
                                                    <option value="3">4th</option>
                                                    <option value="4">5th</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Publish Date</label>
                                            <input type="date" class="form-control"  name="published" placeholder="Publish Date" data-format="DD-MM-Y" data-advanced-range="false" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Expired</label>
                                            <input type="date" class="form-control"  name="expire_at" placeholder="Expired" data-format="DD-MM-Y" data-advanced-range="false" autocomplete="off" required>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="edit_larger_modals_title"></h4>
                    <button type="button" class="btn btn-danger waves-effect" style="padding: 5px 10px; border-radius: 25px;" data-dismiss="modal">X</button>
                </div>
                <form id="update_form" action="{{ route('not_pet_questions.update') }}" method="POST" enctype="multipart/form-data" >
                @csrf 
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
  

    <input type="hidden" name="page_no" id="page_no" value="1">
    <input type="hidden" name="get_pages" id="get_pages" value="{{ route('ajax_not_questions') }}">
    @include('backend.inc.crul_ajax')

    
@endsection