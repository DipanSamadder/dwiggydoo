@extends('frontend.layouts.app')
@section('header')
<style>
    .image_placeholder{
        height: 300px;
        width: 100%;
        background: #f5f5f5;
        display: inherit;
        object-fit: contain;
    }
    .sl__main_image_contain_left_inner {
        height: 300px;
        width: 100%;
        background: #f5f5f5;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 5px;
        cursor: pointer;
    }
</style>

@endsection

@section('content')
<div class="col-lg-9 col-12 main_right">
   <div class="row">
      <div class="col-lg-12 home_main_pos">
         <div id="app">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="row post_sec">
                        <div class="col-lg-3">
                        @include('frontend.components.sessions.dogs.profile-image', ['class'=> 'img-fluid  rounded-circle', 'style' => ''])
                        </div>
                        <div class="col-lg-9">
                            <div class="col-lg-12 post_title">
                                <h3>{{ Session::get('defaultDogDetails.name') }}   &nbsp;<a href="#">Edit Profile</a></h3>
                                <p>{{ Session::get('userDetails.name') }}</p>
                            </div>
                            <div class="col-lg-12 post_connection">
                                <div class="col-lg-3 post_con_text">
                                    @php 
                                        $dogsDetails = App\Models\Dog::find(Session::get('defaultDogDetails.id'));
                                    @endphp
                                <h4>{{ $dogsDetails->connectedfriendships($dogsDetails->id)->count() }}</h4>
                                <p>My Connection</p>
                                </div>
                                <div class="col-lg-3 post_con_text">
                                <h4>{{ $feedCountTotal }}</h4>
                                <p>Posts</p>
                                </div>
                                <!-- <div class="col-lg-3 post_con_text">
                                <h4>2500</h4>
                                <p>Wallet</p>
                                </div>
                                <div class="col-lg-3 post_con_text">
                                <h4>8/10</h4>
                                <p>Daily Task</p>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 post_tabs_sec">
                <ul class="nav nav-tabs post_tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true" onclick="getGalleryNew(1);">Gallery</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" onclick="getReelNew(1);">Reels</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Saved</button>
                    </li>
                    <!-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>Disabled</button>
                        </li> -->
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="row mt-3" id="UserFeedSection"> 
                            <div class="col-lg-4 mb-3 ps-0">
                                <div class="sl__main_image_contain_left_inner">
                                    <div class="sl__main_image_contain_left_inner_box">
                                        <img  data-bs-toggle="modal" data-bs-target="#ProfilePostModal" src="{{ dsld_static_asset('assets/images/add.svg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <div class="row mt-3" id="UserReelSection">
                            <div class="col-lg-4 mb-3 ps-0">
                                <div class="sl__main_image_contain_left_inner">
                                    <div class="sl__main_image_contain_left_inner_box">
                                        <img  data-bs-toggle="modal" data-bs-target="#ProfileReelModal" src="{{ dsld_static_asset('assets/images/add.svg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                        <div class="row mt-3">
                            <div class="col-lg-4 mb-3 ps-0">
                            <img src="assets/images/user_main_img.png" alt="" class="img-fluid image_placeholder"/>
                            </div>
                            <div class="col-lg-4 mb-3 ps-0">
                            <img src="assets/images/user_main_img.png" alt="" class="img-fluid image_placeholder"/>
                            </div>
                            <div class="col-lg-4 mb-3 ps-0">
                            <img src="assets/images/user_main_img.png" alt="" class="img-fluid image_placeholder"/>
                            </div>
                            <div class="col-lg-4 mb-3 ps-0">
                            <img src="assets/images/user_main_img.png" alt="" class="img-fluid image_placeholder"/>
                            </div>
                            <div class="col-lg-4 mb-3 ps-0">
                            <img src="assets/images/user_main_img.png" alt="" class="img-fluid image_placeholder"/>
                            </div>
                            <div class="col-lg-4 mb-3 ps-0">
                            <img src="assets/images/user_main_img.png" alt="" class="img-fluid image_placeholder"/>
                            </div>
                            <div class="col-lg-4 mb-3 ps-0">
                            <img src="assets/images/user_main_img.png" alt="" class="img-fluid image_placeholder"/>
                            </div>
                            <div class="col-lg-4 mb-3 ps-0">
                            <img src="assets/images/user_main_img.png" alt="" class="img-fluid image_placeholder"/>
                            </div>
                            <div class="col-lg-4 mb-3 ps-0">
                            <img src="assets/images/user_main_img.png" alt="" class="img-fluid image_placeholder"/>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
         </div>
      </div>
   </div>
</div>
<input type="hidden" name="page_no" id="page_no" value="1">
<input type="hidden" name="isLoading" id="isLoading" value="0">
<input type="hidden" name="page_reel_no" id="page_reel_no" value="1">
<input type="hidden" name="isLoadingReel" id="isLoadingReel" value="0">
@endsection

@section('footer')

<script>

    $(document).ready(function(){   
        var page = $('#page_no').val();
        getGalleryNew(1);
    
        $(window).scroll(function() {
            var isLoading = $('#isLoading').val();
            if ($(window).scrollTop() + $(window).height() >= $('#UserFeedSection').height() - 100 && isLoading == 0) {
                $('#isLoading').val('1');
                var page = $('#page_no').val();
                page = parseInt(page)+1;
                $('#page_no').val(page);
                getGallery();
            }
        });
    })
    
    function getGalleryNew(no){
        $('#page_no').val(no);
        if(no == 1){$('#isLoading').val('0');}        
        getGallery();
    }
   
    function getGallery(){
        $('#isLoading').val('1');
        var page = $('#page_no').val();
        var formData = new FormData();
        formData.append("_browser", 1);
        formData.append("_token", "{{ csrf_token() }}");
        formData.append("page", page);

        $.ajax({
            type: 'POST',
            url: '{{ route("user.profile.feed_list.show") }}',
            data: formData,
            dataType: "html",
            mimeType: "multipart/form-data",
            cache: false,
            processData:false,
            contentType: false,

            success: function (data) {
                $('#isLoading').val('1');
                if(page == 1){
                    $('#UserFeedSection > div:not(:first-child)').remove();
                    $('#UserFeedSection').append(data);  
                }else{
                    $('#UserFeedSection').append(data);  
                }
                setTimeout(function() {   
                    $('#UserFeedSection').find('.dsld_shimmer').removeClass('dsld_shimmer');  
                }, 2000);
                if(data === ''){ $('#isLoading').val('1');}else{$('#isLoading').val('0'); }  
                
            },
            error: function(xhr, status, error) {
                $('#isLoading').val('1');
                dsldFlashNotification('error', "Something wrong!. Please enter valid and required fields.");
            }
        })
    }
    
    $(document).ready(function(){   
        var page_reel = $('#page_reel_no').val();
    
        $(window).scroll(function() {
            var isLoadingReel = $('#isLoadingReel').val();
            if ($(window).scrollTop() + $(window).height() >= $('#UserReelSection').height() - 100 && isLoadingReel == 0) {
                $('#isLoadingReel').val('1');
                var page_reel = $('#page_reel_no').val();
                page_reel = parseInt(page_reel)+1;
                $('#page_reel_no').val(page_reel);
                getReel();
            }
        });
    })
    
    function getReelNew(no){
        $('#page_reel_no').val(no);
        if(no == 1){$('#isLoadingReel').val('0');}        
        getReel();
    }
   
    function getReel(){
        $('#isLoadingReel').val('1');
        var page_reel = $('#page_reel_no').val();
        var formData = new FormData();
        formData.append("_browser", 1);
        formData.append("_token", "{{ csrf_token() }}");
        formData.append("page", page_reel);

        $.ajax({
            type: 'POST',
            url: '{{ route("user.profile.reel_list.show") }}',
            data: formData,
            dataType: "html",
            mimeType: "multipart/form-data",
            cache: false,
            processData:false,
            contentType: false,

            success: function (data) {
                $('#isLoadingReel').val('1');
                if(page_reel == 1){
                    $('#UserReelSection > div:not(:first-child)').remove();
                    $('#UserReelSection').append(data);  
                }else{
                    $('#UserReelSection').append(data);  
                }
                setTimeout(function() {   
                    $('#UserReelSection').find('.dsld_shimmer').removeClass('dsld_shimmer');  
                }, 2000);
                if(data === ''){ $('#isLoadingReel').val('1');}else{$('#isLoadingReel').val('0'); }  
                
            },
            error: function(xhr, status, error) {
                $('#isLoadingReel').val('1');
                dsldFlashNotification('error', "Something wrong!. Please enter valid and required fields.");
            }
        })
    }
</script>
@endsection

@section('modal')
    @include('frontend.modals.upload-feed-form')
    @include('frontend.modals.upload-reel-form')
@endsection
