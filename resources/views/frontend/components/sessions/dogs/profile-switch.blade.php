@if(Session::get('defaultDogDetails'))
    <ul class="ps-0 d-flex align-items-center justify-content-between">
        <li class="d-flex align-items-center">

            @include('frontend.components.sessions.dogs.profile-image')
        
        <p>Hello,  {{ Session::get('defaultDogDetails.name') }}<span>{{ Session::get('defaultAddressDetails.address') }}</span></p>
        </li>
        <li><a href="#">Switch</a></li>
    </ul>
@endif