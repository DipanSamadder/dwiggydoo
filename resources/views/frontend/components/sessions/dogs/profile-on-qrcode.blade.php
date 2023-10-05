@if(Session::get('defaultDogDetails'))
    <div class="col-lg-12 qr_pick text-center">
        @include('frontend.components.sessions.dogs.profile-image', ['class'=> 'img-fluid rounded-circle text-center', 'style' => 'width:100px;'])
    </div>
    <div class="col-lg-12 qr_text text-center">
        <h2>{{ Session::get('defaultDogDetails.name') }}</h2>
        <p>{{ Session::get('defaultAddressDetails.address') }}</p>
    </div>
@endif