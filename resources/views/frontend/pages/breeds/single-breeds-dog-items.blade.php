@if(!is_array($dog) && count($dog) > 0)
<div class="conn_profile_list">
    <ul>
        @foreach($dog as $key=> $value)
        @php 
            $avaters = json_decode($value->avatar, true);
        @endphp
        <li class="items-{{ $value->id }}">
            <div class="connection_right_box" style="margin-bottom: 20px;">
                <div class="row">
                <div class="col-lg-3">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiperD-{{ $key }}">
                        <div class="swiper-wrapper">

                            @if(is_array($avaters) && count($avaters) > 0)
                                @foreach($avaters as $key => $pic)
                                    <div class="swiper-slide">
                                        <img src="{{ dsld_uploaded_file_path($pic) }}" />
                                    </div>
                                @endforeach
                            @endif

                            @if(is_null($avaters))
                                <div class="swiper-slide">
                                    <img src="{{ dsld_uploaded_file_path($value->avatar_original) }}" />
                                </div>
                            @endif
                            
                            
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">

                            @if(is_array($avaters) && count($avaters) > 0)
                                @foreach($avaters as $key => $pic)
                                    <div class="swiper-slide">
                                        <img src="{{ dsld_uploaded_file_path($pic) }}" />
                                    </div>
                                @endforeach
                            @endif

                            @if(is_null($avaters))
                                <div class="swiper-slide">
                                    <img src="{{ dsld_uploaded_file_path($value->avatar_original) }}" />
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="con_right_card">
                    <div class="card_dog_title">
                        <h2><a href="{{ route('dogs.find.slug' , ['slug' => $value->slug]) }}">{{ $value->name }}</a></h2>
                    </div>
                    <div class="card_dog_breed">
                        <div class="breed_title">
                        <label>breed :</label>
                        </div>
                        <div class="dog_breed_type">
                        <h4>golden r</h4>
                        </div>
                    </div>
                    <div class="card_gender_age_wrap">
                        <div class="card_dog_gender">
                        <div class="gender">
                            <label for="">gender :</label>
                        </div>
                        <div class="gender_val">
                            <h4>@if($value->gender == 1) M @elseif($value->gender== 2) F @endif</h4>
                        </div>
                        </div>
                        <div class="card_dog_gender">
                        <div class="gender">
                            <label for="">age :</label>
                        </div>
                        <div class="gender_val">
                            <h4>{{ $value->age }} months</h4>
                        </div>
                        </div>
                    </div>
                    <div class="card_dog_breed">
                        <div class="breed_title">
                        <label>Looking For:</label>
                        </div>
                        <div class="dog_breed_type">
                        <h4>Play Date</h4>
                        </div>
                    </div>
                    
                    @php 
                        $good_gens = json_decode($value->good_genes_id, true);
                    @endphp
                    @if(is_array($good_gens)  && count($good_gens) > 0)
                    <div class="card_good_gene">
                        <label for="">good genes: </label>
                    </div>
                    <div class="gene_row">
                        @foreach($good_gens as $key => $gGens)
                            <div class="gene_type">
                                <p style="width: inherit !important;padding: 5px 15px;">{{ @dsld_find_goodGene_by_id($gGens)->name }}</p>
                            </div>
                        @endforeach
                    </div>
                    @endif
                    
                    
                    <div class="dog_connection_button">
                        <button type="button" onclick="sendFriendRequest('{{ Session::get('defaultDogDetails.id') }}','{{ $value->id }}', 'bogs-items')">add friend</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </li>
        @endforeach
        
    </ul>
</div>
<script>
    
  const myCustomSlider = document.querySelectorAll('.mySwiper');

for( i=0; i< myCustomSlider.length; i++ ) {

myCustomSlider[i].classList.add('mySwiper-' + i);

var swiper = new Swiper('.mySwiper-' + i, {
    spaceBetween: 10,
    slidesPerView: 3,
    freeMode: true,
    watchSlidesProgress: true,
});

var swiper2 = new Swiper('.mySwiperD-' + i, {
    spaceBetween: 10,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiper,
    },
    });
    console.log(swiper2)
}
</script>
@else
    <div class="conn_profile_list"><h5>Sorry! Nothing Found.</h5></div>
@endif