@extends('frontend.layouts.app')
@section('header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
@endsection

@section('content')

    <div class="col-lg-6 col-12 main_right">
        <div class="row">
            <div class="col-lg-12 home_main_pos">
            <div id="app">
                <div class="top_connection pb-3">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="bread_title">
                        <h3>
                        <!-- <span>
                            <i class="fa-solid fa-arrow-left"></i>
                        </span>&nbsp;  -->Their Connection
                        </h3>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="search_filter_wrap text-end">
                        <span class="search_icon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#filter_connection" class="filter_icon">
                        <i class="fa-solid fa-filter"></i>
                        </button>
                    </div>
                    </div>
                </div>
                </div>
                @if(isset($fcount))
                <div class="connection_box">
                    <h3>{{ $fcount }} connections</h3>
                </div>
                @endif
                <div id="connections-ajax-items"></div>
            </div>
            </div>
        </div>
    </div>

    <div class="top_right_side col-12 col-lg-3  col-md-3">
        @include('frontend.pages.connections.sidebar')
    </div>
    
@endsection

@section('modal')

    <div class="modal fade" id="filter_connection" tabindex="-1" aria-labelledby="filter_connection" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered filter_modal">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="submitFilterConnection" action="{{ route('connections.filter') }}" method="post">
                        @csrf
                        <div class="filter_top_modal">
                            <h3>Sort</h3>
                        </div>
                        <div class="filter_gender filter_con">
                            <div class="row ">
                                <div class="col-lg-6 filter_top_modal text-start">
                                    <label for="recent" class="form-label">New to Old</label>
                                </div>
                                <div class="col-lg-6 text-end">
                                    <input type="radio" id="recent" name="filter" value="recent" class="form-radio"  onchange="connections_filter();"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 filter_top_modal text-start">
                                    <label for="old" class="form-label">Old to New</label>
                                </div>
                                <div class="col-lg-6 text-end">
                                    <input type="radio" id="old" value="old" name="filter" class="form-radio" onchange="connections_filter();"/>
                                </div>
                            </div>
                            <div c
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="modal fade" id="connection_setting" tabindex="-1" aria-labelledby="connection_setting" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered filter_modal">
            <div class="modal-content">
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div> -->
    @include('frontend.modals.small-modal', ['modal_id' => 'connection_setting', 'modal_dialog_class' => 'filter_modal'])
@endsection

@section('footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/10.3.1/swiper-bundle.min.js" integrity="sha512-2w85qGM9apXW9EgevsY4S4fnJIUz6U6mXlLbgDKphBuwh7jPQNad70Ll5W+pcIrJ6rIMGpjP0CxYGQwKsynIaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
<!-- Initialize Swiper -->
<script>

function connections_filter(){
    $('#submitFilterConnection').submit();
}

$(document).ready(function(){
    getFilterData();
    getNearMeData();
    $('#submitFilterConnection').submit(function(e){
        e.preventDefault();
        getFilterData();
    });
});

function getFilterData(){
    $('#filter_connection').modal('hide');
    $('#connections-ajax-items').html('<div style="position: relative;height: 100vh;"><div class="loader-area"><span class="loader"></span></div></div>');
    $.post( 
        $('#submitFilterConnection').attr('action'),
        $('#submitFilterConnection').serialize(),
        function(response) {
            $('#connections-ajax-items').html(response);             
        },
        "html"
    );
}

function getNearMeData(){
    $('#near_me_profile').html('<div style="position: relative;height: 100vh;"><div class="loader-area"><span class="loader"></span></div></div>');
    $.post( '{{ route("dog.near_me") }}',
        {'_token': '{{ csrf_token() }}'},
        function(response) {
            $('#near_me_profile').html(response);             
        },
        "html"
    );
}

function getModalSettingData(fid){
    $('#connection_setting').modal('show');
    $('#connection_setting_body').html('<div style="position: relative;height: 100vh;"><div class="loader-area"><span class="loader"></span></div></div>');
    $.post( '{{ route("connections.modal.setting") }}',
        {'_token': '{{ csrf_token() }}', 'friendship_id': fid},
        function(response) {
            $('#connection_setting_body').html(response);             
        },
        "html"
    );
}


</script>
@endsection
