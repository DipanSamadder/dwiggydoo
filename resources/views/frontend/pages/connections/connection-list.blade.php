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
                        <span>
                            <i class="fa-solid fa-arrow-left"></i>
                        </span>&nbsp; Their Connection
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
                <div class="connection_box">
                <h3>1,046 connections</h3>
                </div>
                <div class="connection_card">
                <ul>
                    <li>
                    <div class="card_details">
                        <div class="row">
                        <div class="col-lg-2">
                            <div class="connection_card_img text-center">
                            <img src="assets/images/dogs/img-1.png" alt="" class="img-fluid" />
                            </div>
                        </div>
                        <div class="col-lg-7 ps-0">
                            <div class="card_title">
                            <h3>charlie <span>
                                <i class="fa-solid fa-mars-stroke-up"></i>
                                </span>
                            </h3>
                            <h5>Breed: <b>Golden R</b>
                            </h5>
                            <p>connected today</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card_icons text-end">
                            <span class="connection_msg">
                                <i class="fa-regular fa-comment"></i>
                            </span>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#Modal_connection" class="connection_kebada">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            </div>
                        </div>
                        </div>
                    </div>
                    </li>
                    <li>
                    <div class="card_details">
                        <div class="row">
                        <div class="col-lg-2">
                            <div class="connection_card_img text-center">
                            <img src="assets/images/dogs/img-1.png" alt="" class="img-fluid" />
                            </div>
                        </div>
                        <div class="col-lg-7 ps-0">
                            <div class="card_title">
                            <h3>charlie <span>
                                <i class="fa-solid fa-mars-stroke-up"></i>
                                </span>
                            </h3>
                            <h5>Breed: <b>Golden R</b>
                            </h5>
                            <p>connected today</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card_icons text-end">
                            <span class="connection_msg">
                                <i class="fa-regular fa-comment"></i>
                            </span>
                            <span class="connection_kebada">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </span>
                            </div>
                        </div>
                        </div>
                    </div>
                    </li>
                </ul>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="top_right_side col-12 col-lg-3  col-md-3">
        @include('frontend.pages.connections.sidebar')
    </div>
    
@endsection

@section('footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/10.3.1/swiper-bundle.min.js" integrity="sha512-2w85qGM9apXW9EgevsY4S4fnJIUz6U6mXlLbgDKphBuwh7jPQNad70Ll5W+pcIrJ6rIMGpjP0CxYGQwKsynIaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
<!-- Initialize Swiper -->
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
@endsection
