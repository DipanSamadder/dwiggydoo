<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dwiggy Do</title>
    <meta name="api-token" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ env('APP_URL') }}">
    <link rel="icon" type="image/x-icon" href="{{ dsld_static_asset('frontend/images/favicon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    @production
      @php
          $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
      @endphp

      <link rel="stylesheet" href="{{ dsld_get_base_URL() }}public/build/{{$manifest['resources/css/style.css']['file']}}">
      <link rel="stylesheet" href="{{ dsld_get_base_URL() }}public/build/{{$manifest['resources/css/responsive.css']['file']}}">
    @else

      @vite(['resources/css/style.css','resources/css/responsive.css'])

    @endproduction
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

    @production

@php

    $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);

@endphp

<script src="{{ dsld_get_base_URL() }}public/build/{{$manifest['resources/js/app.js']['file']}}"></script>

@else

@vite(['resources/js/app.js'])

@endproduction

<script src="{{ dsld_static_asset('assets/js/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="{{ dsld_static_asset('backend/assets/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>  
<script src="{{ dsld_static_asset('frontend/js/dsld_custom_js.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@yield('footer')
@include('frontend.inc.custom_js')
@yield('modal')

@include('frontend.modals.notification-cancel-fr')
@include('frontend.modals.notification-accept-fr')
</body>
</html>