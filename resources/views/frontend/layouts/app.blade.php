<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dwiggy Do</title>
    <meta name="api-token" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ env('APP_URL') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    
    <style>
      .activeD{position: relative;}
      .loader-area{
        position: absolute;
        text-align: center;
        width: 100%;
        top: 0px;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #ffffffc7;
    }
    .loader {
      width: 48px;
      height: 48px;
      border: 3px dotted #cd280e;
      border-style: solid solid dotted dotted;
      border-radius: 50%;
      display: inline-block;
      position: relative;
      box-sizing: border-box;
      animation: rotation 2s linear infinite;
    }
    .loader::after {
      content: '';  
      box-sizing: border-box;
      position: absolute;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
      margin: auto;
      border: 3px dotted #f3735f;
      border-style: solid solid dotted;
      width: 24px;
      height: 24px;
      border-radius: 50%;
      animation: rotationBack 1s linear infinite;
      transform-origin: center center;
    }
        
    @keyframes rotation {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    } 
    @keyframes rotationBack {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(-360deg);
      }
    } 
    #top-progress-bar {
    height: 4px;
    width: 0;
    background-color: #f3735f; /* Progress bar color */
    position: fixed;
    top: 0;
    left: 0;
    z-index: 9999;
    transition: width 0.3s;
}
    </style>
    @yield('header')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
    <div id="top-progress-bar"></div>
    <div class="main">
      <div class="row">
        <div class="left_top_side col-12 col-lg-3  col-md-3 ">
            @include('frontend.partials.left-sidebar')
        </div>
        @yield('content')
        {{--
        <div class="main_right col-12 col-lg-6 col-md-6">
          <div class="row">
              <div class="col-lg-12 home_main_pos">
                  <div id="app">
                    @yield('content')
                  </div>
              </div>
            </div>
        </div>
        <div class="top_right_side col-12 col-lg-3  col-md-3">
            @include('frontend.partials.right-sidebar')  
         </div>
         --}}
      </div>
    </div>

 
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="{{ dsld_static_asset('backend/assets/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>  
<script src="{{ dsld_static_asset('frontend/js/dsld_custom_js.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@yield('footer')
@include('frontend.inc.custom_js')
@yield('modal')


<script>

  function errorResponseMessage(data){
    var error = '';
    if (jQuery.isPlainObject(data) == true){
      
      var i = 0 ;
      $.each(data, function (key, value) {
          if(i == 0){error = value[0]; }
          i++;
      });

    }else{
      error = data;
    }
    return error;
  }



  function downloadQRCode(id){
    var path = $(id).attr('src');
    var downloadLink = document.createElement('a');
    downloadLink.href = path;
    downloadLink.download = id+'.jpg';
    downloadLink.click();
  }
  function ShareQRCode(id){

    var path = $(id).attr('src');
    var shareableLink = document.createElement('a');
    shareableLink.href = path;

    if (navigator.share) {
        navigator.share({
            url: shareableLink.href
        }).then(() => {
            console.log('Image shared successfully');
        }).catch((error) => {
            console.error('Error sharing image:', error);
        });
    } else {
        alert('Your browser does not support image sharing.');
    }

  }

// Function to show the progress bar
function showProgressBar() {
    document.getElementById('top-progress-bar').style.width = '100%';
}

// Function to hide the progress bar
function hideProgressBar() {
    document.getElementById('top-progress-bar').style.width = '0';
}

// Hook into AJAX events to show/hide the progress bar
$(document).ajaxStart(function () {
    showProgressBar();
});

$(document).ajaxStop(function () {
    hideProgressBar();
});
$(document).ready(function(){
$('.submenu_list > a').on('click', function(){

    $('.submenu_list').toggleClass('open');

});

$('.notification a').on('click', function(){

    $('.home_sidebar_sec').addClass('open');

});

$('.search a').on('click', function(){

$('.home_sidebar_sec').addClass('openSrch');

});

$('.qr_code a').on('click', function(){

$('.home_sidebar_sec').addClass('openqr');
$('.home_sidebar_sec').removeClass('openSrch');

});

$('.sidebar_menus li a').not($('.notification a')).on('click', function(){

    $('.home_sidebar_sec').removeClass('open');

});


$('.sidebar_menus li a').not($('.submenu_list a')).on('click', function(){

    $('.submenu_list').removeClass('open');

});

$('.notification_inner_sec h2 i').on('click', function(){

    $('.home_sidebar_sec').removeClass('open');

    $('.sidebar_menus li a').removeClass('active');

});

$('.search_sec .notification_inner_sec h2 i').on('click', function(){

$('.home_sidebar_sec').removeClass('openSrch');

$('.sidebar_menus li a').removeClass('active');

});

$('.qrcode_sec .notification_inner_sec h2 i').on('click', function(){

$('.home_sidebar_sec').removeClass('openqr');

$('.sidebar_menus li a').removeClass('active');

});

$('.sidebar_menus li a').on('click', function(){

    $('.sidebar_menus li a').removeClass('active');

    $(this).toggleClass('active');

});

$('.ellipse_inner').hide();

$('.ellipse').on('click', function(){

    $('.ellipse').removeClass('show');

    $(this).addClass('show');

});



$('.ntf_tab_block > div').hide();

$('.ntf_tab_block div:first').show();

$('.tabs_nav li:first').addClass('tab-active');



$('.tabs_nav a').on('click', function(event){

event.preventDefault();

$('.tabs_nav li').removeClass('tab-active');

$(this).parent().addClass('tab-active');

$('.ntf_tab_block > div').hide();

$($(this).attr('href')).show();

});

});


function searchinput(){
    let search =document.getElementById("search_br");
let input = document.getElementById("search_input");

    if(input.style.display = "none"){
        search.style.display="none";
        input.style.display="block";
    }
}
</script>

</body>
</html>