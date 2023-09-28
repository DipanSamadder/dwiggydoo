@extends('frontend.layouts.blank')

@section('content')
<div class="login-detail">
<div class="text-center">
<h2>Welcome Home!<br>
<p>Connect.Play.Invite.Earn Money</p>
<div class="login-img">
    @if(dsld_get_setting('dashboard_logo') > 0)
        <img src="{{ dsld_uploaded_file_path(dsld_get_setting('site_login_background')) }}">
    @else
        <img src="{{ dsld_static_asset('backend/assets/images/logo.svg') }}" alt="">
    @endif
</div>
<a href="{{ route('register.email') }}"><button class="log-in Sign-Up-Free" type="button"><i class="far fa-smile"></i> Sign Up Free 
<i class="fa fa-long-arrow-right" aria-hidden="true"></i></button></a>

<a href="{{ route('register.phone') }}"><button class="log-in Continue-With-Phone-Number" type="button"><i class="fas fa-mobile-alt"></i> Continue With Phone Number <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button></a>

<a href="{{ route('register.email') }}"><button class="log-in Continue-With-Facebook" type="button"><i class="fab fa-facebook" ></i> Continue With Facebook  <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button></a>


<button class="log-in Continue-With-Google " type="button"><i class="fab fa-google"></i> Continue With Google <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>

<button class="log-in Continue-With-Apple " type="button"><i class="fab fa-apple"></i> Continue With Apple
<i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
<div class="or"><p class="mb-0">or</p></div>

<span class="owner-not">Not A Pet Owner?</span>

<button class="log-in Feed-Dog-In-Need" type="button"><i class="fas fa-paw"></i> Feed A Dog In Need
<i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
</div>
</div>
@endsection

