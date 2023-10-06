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
        <div class="right_block_sec">
            <ul class="ps-0 d-flex align-items-center justify-content-between">
            <li class="d-flex align-items-center">
                <img src="assets/images/user_logo.png" alt="user_logo" class="img-fluid" />
                <p>Hello, Fluffy <span>Unit No. 58, Hartron...</span>
                </p>
            </li>
            <li>
                <a href="#">Switch</a>
            </li>
            </ul>
            <div class="sug_course_heading d-flex align-items-center justify-content-between">
            <h3>Pawfect Profiles Near Me</h3>
            <a href="#">View All</a>
            </div>
        </div>
        <div class="sug_course_outer">
            <div class="conn_profile_list">
            <ul>
                <li>
                <div class="connection_right_box">
                    <div class="row">
                    <div class="col-lg-5">
                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiperD-0">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="con_right_card">
                        <div class="card_dog_title">
                            <h2>dog name</h2>
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
                                <h4>M</h4>
                            </div>
                            </div>
                            <div class="card_dog_gender">
                            <div class="gender">
                                <label for="">age :</label>
                            </div>
                            <div class="gender_val">
                                <h4>25 months</h4>
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
                        <div class="card_good_gene">
                            <label for="">good genes: </label>
                        </div>
                        <div class="gene_row">
                            <div class=" gene_type">
                            <p>LOVE KIDS</p>
                            </div>
                            <div class=" gene_type">
                            <p>LOVE KIDS</p>
                            </div>
                        </div>
                        <div class="dog_connection_button">
                            <button type="button">add friend</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </li>
                <li>
                <div class="connection_right_box">
                    <div class="row">
                    <div class="col-lg-5">
                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiperD-1">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="con_right_card">
                        <div class="card_dog_title">
                            <h2>dog name</h2>
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
                                <h4>M</h4>
                            </div>
                            </div>
                            <div class="card_dog_gender">
                            <div class="gender">
                                <label for="">age :</label>
                            </div>
                            <div class="gender_val">
                                <h4>25 months</h4>
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
                        <div class="card_good_gene">
                            <label for="">good genes: </label>
                        </div>
                        <div class="gene_row">
                            <div class=" gene_type">
                            <p>LOVE KIDS</p>
                            </div>
                            <div class=" gene_type">
                            <p>LOVE KIDS</p>
                            </div>
                        </div>
                        <div class="dog_connection_button">
                            <button type="button">add friend</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </li>
                <li>
                <div class="connection_right_box">
                    <div class="row">
                    <div class="col-lg-5">
                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiperD-2">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                            </div>
                            <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="con_right_card">
                        <div class="card_dog_title">
                            <h2>dog name</h2>
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
                                <h4>M</h4>
                            </div>
                            </div>
                            <div class="card_dog_gender">
                            <div class="gender">
                                <label for="">age :</label>
                            </div>
                            <div class="gender_val">
                                <h4>25 months</h4>
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
                        <div class="card_good_gene">
                            <label for="">good genes: </label>
                        </div>
                        <div class="gene_row">
                            <div class=" gene_type">
                            <p>LOVE KIDS</p>
                            </div>
                            <div class=" gene_type">
                            <p>LOVE KIDS</p>
                            </div>
                        </div>
                        <div class="dog_connection_button">
                            <button type="button">add friend</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </li>
            </ul>
            </div>
        </div>
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
