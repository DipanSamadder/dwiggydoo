<div class=" notify_req d-flex align-items-center justify-content-between">
    <h3>All Notifications</h3>
    @if($total_request > 0)
    <a href="#" onclick="manageFriendRequest();">See All ({{ $total_request }})</a>
    @else
    <a href="#" onclick="manageFriendRequest();">See All</a>
    @endif
</div>
<div class="notification_block_sec">
@if($total_request > 0)
    @if(count($frequest) > 0)
        @foreach($frequest as $key => $value)
            <div class="block_sec justify-content-between items-{{ $value->dog->id }}" style="display: flex">
                <div class="block_info_sec d-flex align-items-center">
                    <img src="{{ dsld_uploaded_file_path($value->dog->avatar_original) }}" alt="user_img" class="img-fluid" />
                    <div class="block_user_info">
                    <h5>{{ $value->dog->name }}</h5>
                    <p>Parent Name</p>
                    <ul class="ps-0 mb-0 d-flex align-items-center">
                        <li>Breed: <b>{{ $value->dog->name }}</b>
                        </li>
                        <li>Age: <b>{{ $value->dog->name }}</b>
                        </li>
                    </ul>
                    </div>
                </div>
                <div class="block_option">
                    <div class="block_opt_inner d-flex">
                    <span class="cross" onclick="removeFriendRequest('{{ $value->dog->id }}', '{{ Session::get('defaultDogDetails.id') }}','{{ $value->reason_id }}', 'notifictions')">
                        <i class="fas fa-times"></i>
                    </span>
                    <span class="check" onclick="acceptFriendRequest('{{ $value->dog->id }}', '{{ Session::get('defaultDogDetails.id') }}','{{ $value->reason_id }}', 'notifictions')">
                        <i class="fas fa-check"></i>
                    </span>
                    </div>
                    <div class="select_sec">
                    <i class="fas fa-check-circle"></i>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    
    @if(count($todays) > 0)
        <div class="block_sec d-flex justify-content-between">
            <div class="block_head">Today</div>
        </div>

        @foreach($todays as $key => $value)
        <div class="block_sec d-flex justify-content-between">
            <div class="block_info_sec d-flex align-items-center">
            <img src="@if($value->sender_id > 0) {{ dsld_uploaded_file_path($value->dog->avatar_original) }} @else {{ dsld_static_asset('frontend/images/avatar.png') }} @endif" alt="user_img" class="img-fluid" />
            <div class="block_user_info">
                <h5>{{ $value->sub }} <span class="time">{{ date('h:i A', strtotime($value->created_at)) }}</span>
                </h5>
                <p>{{ $value->message }}</p>
            </div>
            </div>
            <div class="block_option_ellipse d-flex">
            <span class="ellipse">
                <i class="fas fa-ellipsis-v"></i>
                <span class="ellipse_inner">
                <span class="del_icon">
                    <i class="fas fa-trash-alt"></i>
                </span>
                <span class="bell_icon">
                    <i class="far fa-bell-slash"></i>
                </span>
                </span>
            </span>
            </div>
        </div>
        @endforeach
    @endif
@else
<center><p>Nothing found!.</p></center>
@endif
</div>