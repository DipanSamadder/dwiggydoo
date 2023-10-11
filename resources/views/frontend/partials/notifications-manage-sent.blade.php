@if(count($frequest) > 0)
    @foreach($frequest as $key => $value)
    <div class="items-{{ $value->reason_id }}">
        <div class="block_sec d-flex justify-content-between">
            <div class="block_info_sec d-flex align-items-center">
                <img src="{{ dsld_uploaded_file_path($value->receiver_dog->avatar_original) }}" alt="user_img" class="img-fluid" />
                <div class="block_user_info">
                    <h5>{{ $value->receiver_dog->name }}</h5>
                    <p>Parent Name</p>
                    <ul class="ps-0 mb-0 d-flex align-items-center">
                        <li>Breed: <b>{{ $value->receiver_dog->name }}</b></li>
                        <li>Age: <b>{{ $value->receiver_dog->name }}</b></li>
                    </ul>
                </div>
            </div>
            <div class="block_option d-flex" >
                <p class="cancel" onclick="cencalSentRequest('{{ Session::get('defaultDogDetails.id') }}', '{{ $value->receiver_dog->id }}','{{ $value->reason_id }}', 'manage_sent')" role="button">Cancel</p>
            </div>
        </div>
    </div>
    @endforeach
@else
<center><p>Nothing found!.</p></center>
@endif
