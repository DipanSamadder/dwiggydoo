@extends('frontend.layouts.app')
@section('content')
    <div class="main_right col-12 col-lg-6 col-md-6">
        <div class="row">
            <div class="col-lg-12 home_main_pos">
                <div id="app">
                    <div class=" bread_search bread_title mt-4">
                        <div class="col-lg-4 bread_search_title">
                            <h3><!--<span><i class="fa-solid fa-arrow-left"></i></span>-->&nbsp; {{ $dogs->name }}</h3>
                        </div>
                    </div>
                    <div id="bogs-items">
                        @php 
                            $avaters = json_decode($dogs->avatar, true);
                        @endphp
                        <div class="home_main_content items-{{ $dogs->id }}">
                            <div class="boxesSlider profile_slider text-center">
                                <div class="slides" @if(is_array($avaters) && count($avaters) > 0) data-items="{{ count($avaters) }}"@endif>

                                    @if(is_array($avaters) && count($avaters) > 0)
                                        @foreach($avaters as $key => $pic)
                                            <div class="item multiimage">
                                                <img src="{{ dsld_uploaded_file_path($pic) }}" class="img-fluid" />
                                            </div>
                                        @endforeach
                                    @endif

                                    @if(is_null($avaters))
                                        <div class="item">
                                            <img src="{{ dsld_uploaded_file_path($dogs->avatar_original) }}" class="img-fluid" />
                                        </div>
                                    @endif
                                
                                </div>
                                <div class="item_text ">
                                    <div class="content_info">
                                        <h1>{{ $dogs->name }}</h1>
                                        <p>Breed Name <span>
                                            <img src="{{ asset('assets/images/logo_piece.png')}}" alt="logo_piece" class="img-fluid pe-1" /> 2.4 km for you </span>
                                        </p>
                                        <a href="#">Know more......</a>
                                    </div>
                                    <div class="female_icon">
                                        <img src="{{ asset('assets/images/female_icon.png')}}" alt="female_icon" class="img-fluid" />
                                    </div>
                                    <div class="right_block">
                                        <a href="#" onclick="sendFriendRequest('{{ Session::get('defaultDogDetails.id') }}','{{ $dogs->id }}', '')" class="add_user mt-0">
                                            <i class="fas fa-user-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class=" text-start  good_gene_title">
                                <h4>good genes:</h4>
                            </div>
                            <div class="gene_row">
                                @php 
                                    $good_gens = json_decode($dogs->good_genes_id, true);
                                @endphp
                                @if(is_array($good_gens)  && count($good_gens) > 0)
                                    @foreach($good_gens as $key => $gGens)
                                        <div class=" gene_type text-center">
                                            <p>{{ @dsld_find_goodGene_by_id($gGens)->name }}</p>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="top_right_side col-12 col-lg-3  col-md-3">
        @include('frontend.partials.right-sidebar')  
        </div>
    

@endsection


@section('footer')

<script>

$(document).ready(function(){
    slidesCallBreed();

});

function removeFriendNext(id){
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