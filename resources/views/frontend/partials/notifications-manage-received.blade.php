@if(count($frequest) > 0)
    @foreach($frequest as $key => $value)
    <div class="items-{{ $value->dog->id }}">
        <div class="block_sec d-flex justify-content-between">
            <div class="block_info_sec d-flex align-items-center">
                <img src="{{ dsld_uploaded_file_path($value->dog->avatar_original) }}" alt="user_img" class="img-fluid" />
                <div class="block_user_info">
                    <h5>{{ $value->dog->name }}</h5>
                    <p>Parent Name</p>
                    <ul class="ps-0 mb-0 d-flex align-items-center">
                        <li>Breed: <b>{{ $value->dog->name }}</b></li>
                        <li>Age: <b>{{ $value->dog->name }}</b></li>
                    </ul>
                </div>
            </div>
            <div class="block_option">
                <div class="block_opt_inner d-flex">
                    <span class="cross" onclick="removeFriendRequest('{{ $value->dog->id }}', '{{ Session::get('defaultDogDetails.id') }}','{{ $value->reason_id }}', 'manage_received')"><i class="fas fa-times"></i></span>
                    <span class="check" onclick="acceptFriendRequest('{{ $value->dog->id }}', '{{ Session::get('defaultDogDetails.id') }}','{{ $value->reason_id }}', 'manage_received')"><i class="fas fa-check"></i></span>
                </div>
                <div class="select_sec"> <i class="fas fa-check-circle"></i> </div>
            </div>
        </div>
    </div>
    @endforeach
@else
<center><p>Nothing found!.</p></center>
@endif