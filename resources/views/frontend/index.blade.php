@extends('frontend.layouts.app')
@section('content')
<div class="main_right col-12 col-lg-6 col-md-6">
   <div class="row">
      <div class="col-lg-12 home_main_pos">
         <div id="app">

            <ul class="ps-0 row">
               <li class="active col-lg-3 col-6"><a href="#"><img src="assets/images/logo.png" alt="logo"><span>Dwiggy Doo</span></a></li>
               <li class="col-lg-3 col-6"><a href="#"><img src="assets/images/logo.png" alt="logo"><span>Rapid Readaing</span></a></li>
               <li class="col-lg-3 col-6"><a href="#"><img src="assets/images/logo.png" alt="logo"><span>Reward</span></a></li>
               <li class="col-lg-3 col-6"><a href="#"><img src="assets/images/logo.png" alt="logo"><span>Hoomans of DD</span></a></li>
            </ul>
         </div>
      </div>
   </div>
</div>
<div class="top_right_side col-12 col-lg-3  col-md-3">
   @include('frontend.partials.right-sidebar')  
</div>

@endsection