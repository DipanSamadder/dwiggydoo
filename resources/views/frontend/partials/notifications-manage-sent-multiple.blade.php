
@if(count($frequest) > 0)
    <form id="sentMultiple" action="friend-request-multiple-submit" method="post" enctype="multipart/form-data">
        @csrf
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
                <div class="block_option block_check">
                    <a href="#" class="checkBtn" onclick="frSelect('{{ $value->reason_id }}');">
                        <input type="checkbox" id="frcheckbox{{ $value->reason_id }}" name="frselecte[]" value="{{ $value->reason_id }}" /><label for="frcheckbox{{ $value->reason_id }}" class="checkbox-label"><i class="fa-solid fa-check"></i></label>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </form>
    
<style>
    input[type="checkbox"]:checked + label.checkbox-label {
        width: 21px;
        height: 21px;
        display: inline-block;
        background: #F3735F;
        border-radius: 50%;
        text-align: center;
        color: #ffffff;
    }
</style>
<div class="deleteBox-wrap" style="bottom: -50px;display:none;">
    <div class="delete_box_sec d-flex align-items-center justify-content-center" style="position:unset">
        <a href="#" data-bs-toggle="modal" data-bs-target="#cancelModal">
            <i class="fas fa-trash-alt"></i> Cancel <span class="fr_count"></span>
        </a>
    </div>
</div>

@else
<center><p>Nothing found!.</p></center>
@endif
