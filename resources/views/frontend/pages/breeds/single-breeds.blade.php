@extends('frontend.layouts.app')
@section('content')
    <div class="main_right col-12 col-lg-6 col-md-6">
        <div class="row">
            <div class="col-lg-12 home_main_pos">
                <div id="app">
                    <div class=" bread_search bread_title mt-4">
                        <div class="col-lg-4 bread_search_title">
                            <h3><!--<span><i class="fa-solid fa-arrow-left"></i></span>-->&nbsp; {{ $breed->name }}</h3>
                        </div>
                        <div class="col-lg-4 bread_search_btn text-end">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#filterBreed"><span><i class="fa-solid fa-filter"></i></span> filter</button>
                        </div>
                    </div>
                    <div id="bogs-items">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="top_right_side col-12 col-lg-3  col-md-3">
        @include('frontend.partials.right-sidebar')  
        </div>
    

@endsection

@section('modal')
<div class="modal fade" id="filterBreed" tabindex="-1" aria-labelledby="filterBreedLabel" aria-hidden="true">
        <div class="modal-dialog filter_modal">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h1 class="modal-title fs-5" id="filterBreedLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> -->
                <div class="modal-body">
                <form id="submitFilterSingleBreed" action="{{ route('breeds.filter.slug') }}" method="post">
                    @csrf
                    <input type="hidden" name="breed_id" value="{{ $breed->id }}">
                        <div class="col-lg-12 filter_top_modal">
                            <div class="col-lg-6 text-start"><h3>filter</h3></div>
                            <div class="col-lg-6 text-end"><button type="button" onclick="singleBreedClear()">clear all</button></div>
                        </div>
                        <div class="col-lg-12 filter_gender">
                            <div class="col-lg-12 filter_top_modal">
                                <div class="col-lg-6 text-start">
                                    <label for="genderM" class="form-label">male</label>
                                </div>
                                <div class="col-lg-6 text-end">
                                    <input type="radio" id="genderM" name="gender" value="1" class="form-radio"/>
                                </div>
                            </div>
                            <div class="col-lg-12 filter_top_modal">
                                <div class="col-lg-6 text-start">
                                    <label for="genderF" class="form-label">female</label>
                                </div>
                                <div class="col-lg-6 text-end">
                                    <input type="radio" id="genderF" name="gender"  value="2"  class="form-radio"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-start filter_top_modal pt-3">
                            <h3>age</h3>
                        </div>
                        <div class="col-lg-12 filter_gender">
                            <div class="col-lg-12 text-start filter_age">
                                <label for="ageF" class="form-label">Between <span id="min_age">0</span> And <span id="max_age">5</span> Year</label>
                            </div>
                            <div class="col-lg-12">
                                <div class="range-slider">
                                    <div class="progressRange"></div>
                                    <span class="range-min-wrapper">
                                    <input class="range-min" type="range" name="age_min" id="age_min" onchange="minAgeChange()" min="0" max="4" value="0">
                                    </span>
                                    <span class="range-max-wrapper">
                                    <input class="range-max" type="range" min="1" id="age_max" name="age_max" onchange="maxAgeChange()" max="5" value="5">
                                    </span>
                                </div>
                            </div>

                            <!-- <div class="col-lg-12 fltr_age_sec">
                                <div class="col-lg-9 filter_age_tagline">
                                    <label for="" class="form-label">See dogs 2 years on either side if I run out</label>
                                </div>

                                <div class="col-lg-3 toggle_wrap text-end">
                                    <div class="check-box"><input type="checkbox" checked></div>
                                </div>
                            </div> -->

                        </div>

                        <div class="col-lg-12 text-start filter_top_modal pt-3">
                            <h3>Distance</h3>
                        </div>
                        <div class="col-lg-12 filter_gender">
                            <div class="col-lg-12 text-start filter_age">
                                <label for="range" class="form-label">Up To 15 Kilometres Away</label>
                            </div>
                            <div class="col-lg-12">
                                <div class="range-slider2">
                                    <div id="tooltip"></div>
                                    <input id="range" type="range"  name="location_range" min="0" max="100" value="75">
                                </div>
                            </div>
                        
                            <!-- <div class="col-lg-12 fltr_age_sec">
                                <div class="col-lg-9 filter_age_tagline">
                                    <label for="" class="form-label">See dogs 2 years on either side if I run out</label>
                                </div>

                                <div class="col-lg-3 toggle_wrap text-end">
                                    <div class="check-box">
                                        <input type="checkbox">
                                    </div>
                                </div>
                            </div>       -->
                        </div>
                        {{--
                        <div class="col-lg-12 text-start filter_top_modal pt-3">
                            <h3>Dog Breed</h3>
                        </div>
                        <div class="col-lg-12 brd_slt">
                            <select name="dog_breed" id="dog_breed" class="form-select">
                                <option value="all">All</option>
                                @php 
                                    $breeds_list = App\Models\Breed::where('name', '!=', '' )->get();
                                @endphp
                                @if(!empty($breeds_list))
                                    @foreach($breeds_list as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        --}}
                        <div class="col-lg-12 text-start filter_top_modal pt-3">
                            <h3>Good Genes:</h3>
                        </div>
                        <div class="col-lg-12 brd_slt">
                            <select name="good_genes" id="good_genes"   class="form-select">
                                <option value="all">All</option>
                                @php 
                                    $good_list = App\Models\GoodGene::where('name', '!=', '' )->get();
                                @endphp
                                @if(!empty($good_list))
                                    @foreach($good_list as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-lg-12 filter_btn text-end">
                            <button type="submit" class="btn">apply</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
function singleBreedClear(){
    
    $('#filterBreed').modal('hide');
    var form = $('#submitFilterSingleBreed')[0];
    form.reset();
    getData();
    minAgeChange();
    maxAgeChange();
}
function minAgeChange(){
    $('#min_age').text($('#age_min').val());
}
function maxAgeChange(){
    $('#max_age').text($('#age_max').val());
}
$(document).ready(function(){
    getData();
    $('#submitFilterSingleBreed').submit(function(e){
        e.preventDefault();
        getData();
    });
});

function getData(){
    $('#filterBreed').modal('hide');
    $('#bogs-items').html('<div style="position: relative;height: 100vh;"><div class="loader-area"><span class="loader"></span></div></div>');
    $.post( 
        $('#submitFilterSingleBreed').attr('action'),
        $('#submitFilterSingleBreed').serialize(),
        function(response) {
            
            $('#bogs-items').html(response);  
            slidesCallBreed();             
        },
        "html"
    );
}

function sendFriendRequest(sid, rid){
    var formData = new FormData();
    formData.append("_browser", 1);
    formData.append("sender_id", sid);
    formData.append("receiver_id", rid);
    $.ajax({
        type: 'post',
        url: '{{ env("APP_URL") }}/api/v1/friend-request-send',
        data: formData,
        dataType: "json",
        mimeType: "multipart/form-data",
        cache: false,
        processData:false,
        contentType: false,

        success: function (data, textStatus, xhr) {

            if(data.success === true){
                dsldFlashNotification('success', data.message);
            }else{
                dsldFlashNotification('error', errorResponseMessage(data.message));
            }
            $('#bogs-items .items-'+rid).hide('explode', {direction: 'left'}, 500);
        }
    })
}

function removeFriendRequest(id){
    $('#bogs-items .items-'+id).hide('slide', {direction: 'left'}, 500);
}





function slidesCallBreed() {
  $('.slides').on('init', function(event, slick) {
      var total = $(this).data('items');
      $(this).append('<div class="slick-counter"><span class="current"></span> / <span class="total">'+total+'</span></div>');
      $('.current').text(slick.currentSlide + 1);
      
  })
  .slick({
      autoplay: false,
      autoplaySpeed: 3000,
      infinite: true,
      arrows: true
  })
  .on('beforeChange', function(event, slick, currentSlide, nextSlide) {
      $('.current').text(nextSlide + 1);
      $(".prev-btn").click(function () {
          $(".slick-list").slick("slick-prev");
      });

      $(".next-btn").click(function () {
      $(".slick-list").slick("slick-next");
      });
  
  });
}


</script>
@endsection