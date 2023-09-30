@extends('frontend.layouts.blank')
@section('content')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<style>
    .modal-footer{justify-content:space-around;}
    .modal-footer button:first-child {font-size: 14px;background: transparent;color: #000000;border: none;}
    .modal-footer button:last-child{font-size: 14px;background: transparent;color: #F3735F;border: none;}
    .modal-body h2{font-size: 20px;font-weight: 600;text-align: center;}
    .modal-body p{ font-size:14px; font-weight:400; text-align:center; margin:0px;}
    .action_next_btn a , .action_next_btn button { width: 50px;height: 30px;box-shadow: 0px 3px 6px #00000029;background: linear-gradient(180deg, #ffffff, #ffe7e4);display: inline-block;border-radius: 19px;text-align: center;}
    .action_next_btn a i , .action_next_btn button i {font-size: 14px;color: #f3735f;}
 
   #map {
     height: 100%;min-height: 400px;
   }
   
   
   .custom-infowindow {
       background-color: #ffffff;
       color: #333333;
       padding: 10px;
       border: 1px solid #cccccc;
       border-radius: 5px;
   }
   .gm-style-iw-c{
     width: 60px;
   
   }
   .gm-style-iw-tc{
     display: none;
   }
   .gm-ui-hover-effect{
     display: none !important;
   }
   .gm-style-iw-d{
     overflow: hidden !important;
       max-height: 100%  !important;
   
   }
   .gm-style-iw{
   padding: 0px !important;
   background: transparent !important;
       box-shadow: none !important;
       top: 20px !important;
   }
   .gm-style-iw-d div img{
     width: 100%;
   }
       </style>
<div class="user_right_wrap">

    <div class="col-lg-6 mx-auto user_right_side">
        <div class="col-lg-12 back_btn">
            <a class="mb-3 d-inline-block" href="#"><img src="{{ asset('assets/images/Icon ionic-ios-arrow-round-back.png') }}"></a>
        </div>


        <div class="col-lg-12 doo_right step-1 ">
            <form name="setup-user-profile-step1" id="setup-user-profile-step1" action="setup/profile/details/step1" method="post">
            @csrf
            <div class="col-lg-12 pb-3">
                <h6>welcome</h6>
                <label for="name" class="form-label">what's your name?..</label>
                <input type="text" name="name" id="name" onChange="CheckStep(['name', 'age', 'dob'], '.step1_next_btn')" class="form-control form-control-sm" placeholder="Add your name" @if($userDetails) value="{{ $userDetails->name }}" @endif required/>
            </div>
            <div class="col-lg-12">
                
                    <label for="date" class="form-label">Whats Your Age?</label>
                    <div class="col-lg-12 user_wrap">
                        <div class="col-lg-3">
                            <select name="date" id="date" onchange="findAge()" class="form-control form-select form-select-sm">
                                <option value="">Select Days</option>
                                @for($i =1; $i <= 31; $i++)
                                    <option><?php echo $i; ?></option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <select name="month" id="month" onchange="findAge()" class="form-control form-select form-select-sm" placeholder="Month">
                                <option value="">Select Month</option>
                                @for($i = 1; $i <= 12; $i++)
                                        {{ $month_name = date('F', mktime(0, 0, 0, $i, 1, 2011)) }}
                                        <option value="{{ $i }}">{{ $month_name }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <select name="year" id="year" onchange="findAge()" class="form-control form-select form-select-sm">
                                <option value="">Year</option>
                                    @for ($i = date('Y'); $i >= date('Y')-120; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <input type="text" name="age" id="age" onchange="CheckStep(['name', 'age', 'dob'], '.step1_next_btn')" class="form-control form-control-sm" aria-disabled="true"  required @if($userDetails) value="{{ $userDetails->age }}" @endif/>
                            <input type="hidden" name="dob" id="dob" onchange="CheckStep(['name', 'age', 'dob'], '.step1_next_btn')"  @if($userDetails) value="{{ $userDetails->dob }}" @endif/>
                        </div>
                    </div>
                    <div class="col-lg-12 mx-auto action_next_btn step1_next_btn txt02 text-end mt-3">
                        <button type="submit"><i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                 
                
            </div>
            </form> 
        </div>


        <div class="col-lg-12 doo_right step-2">
            
            <form id="setup-user-profile-step2" action="setup/profile/details/step2" method="post">
            @csrf
                <input type="hidden" name="dog_id" value="{{ $dogDetailsDefault->id }}">
                <input type="hidden" name="step" value="2">
                <div class="row">
                    <div class="col-lg-12 dog_name pb-3">
                        <label for="dog_name" class="form-label">What's Your Dog's Name?</label>
                        <p>You won't be able to change this later.</p>
                        <div class="col-lg-11">
                            <input type="text" name="dog_name" id="dog_name" onchange="CheckStep(['dog_name', 'dog_age'], '.step2_next_btn')" class="form-control form-control-sm" placeholder="Add your dog name" required @if($dogDetailsDefault) value="{{ $dogDetailsDefault->name }}" @endif/>
                        </div>
                    </div>
                    <div class="col-lg-12  pb-3">
                        <div class="row">
                            <div class="col-lg-12  pb-3">
                                <label for="date" class="form-label">What's Your Dog's Age?</label>
                            </div>
                            <div class="col-lg-4">
                                <select name="dog_month" id="dog_month" onchange="findDogAge()" class="form-control form-select form-select-sm" placeholder="Month">
                                    <option value="">Month</option>
                                    @for($i = 1; $i <= 12; $i++)
                                            {{ $month_name = date('F', mktime(0, 0, 0, $i, 1, 2011)) }}
                                            <option value="{{ $i }}">{{ $month_name }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="col-lg-4">
                                <select name="dog_year" id="dog_year" onchange="findDogAge()" class="form-control form-select form-select-sm">
                                    <option value="">Year</option>
                                        @for ($i = date('Y'); $i >= date('Y')-5; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                </select>
                            </div>

                            <div class="col-lg-4">
                                <input type="text" name="dog_age" id="dog_age" onchange="CheckStep(['dog_name', 'dog_age'], '.step2_next_btn')" class="form-control form-control-sm" aria-disabled="true"  required @if($dogDetailsDefault) value="{{ $dogDetailsDefault->age }}" @endif/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 dog_name pb-3">
                        <label for="" class="form-label">Your Dog's Gender?</label>
                        <div class="col-lg-12 dog_gender my-3">
                            <label for="dgender1" class="form-label"><span><i class="fa-solid fa-mars-stroke-up"></i></span> male</label>
                            <input type="radio" id="dgender1" name="dog_gender" value="1" class="form-radio"  @if($dogDetailsDefault) @if($dogDetailsDefault->gender == 1) checked @endif @else checked  @endif  />
                        </div>
                        <div class="col-lg-12 dog_gender">
                            <label for="og_2" class="form-label"><span><i class="fa-solid fa-venus"></i></span> female</label>
                            <input type="radio" id="og_2" name="dog_gender"  value="2"  @if($dogDetailsDefault) @if($dogDetailsDefault->gender == 2) checked @endif @endif class="form-radio"/>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 mx-auto action_next_btn step2_next_btn txt02 text-end mt-3">
                        <button type="submit"><i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
            </form>
        </div>


        <div class="col-lg-12 doo_right step-3 ">
            <form  id="setup-user-profile-step3" action="setup/profile/details/step2" method="post">
                @csrf
                <input type="hidden" name="step" value="3">
                <input type="hidden" name="dog_id" value="{{ $dogDetailsDefault->id }}">
                <div class="row">
                    <div class="col-lg-12 dog_name pb-3">
                        <label for="dog_breed" class="form-label">What’s Your Dog’s Breed?</label>
                    </div>
                    <div class="col-lg-11 dog_breed">
                        <span><i class="fa-solid fa-angle-right"></i></span>
                        <select name="dog_breed" id="dog_breed" onchange="CheckStep(['dog_breed'])" class="form-control form-select form-select-sm">
                            <option value="">Choose bread</option>
                            
                            @php 
                                $top_breed = App\Models\Breed::orderBy('name', 'ASC')->get();
                            @endphp
                            @if(!is_array($top_breed) && count($top_breed) > 1)
                                @foreach($top_breed as $key => $value)
                                    <option id="breed{{ $value->id }}" value="{{ $value->id }}" @if($dogDetailsDefault->breed_id == $value->id) selected @endif>{{ $value->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        <div class="col-lg-11 mx-auto breed_type">
                            <h3>Top Breed</h3>
                        </div>
                        <div class="row mb-3">
                            @php 
                                $top_breed = App\Models\Breed::where('top', 1)->orderBy('name', 'ASC')->get();
                            @endphp
                            @if(!is_array($top_breed) && count($top_breed) > 1)
                                @foreach($top_breed as $key => $value)
                                    <div class="col-lg-4 breed_card mb-3">
                                        <img src="{{ $value->image }}" onclick="selectOptionBreed('{{ $value->id }}')" alt="" class="img-fluid rounded-circle"/>
                                        <h2>{{ $value->name }}</h2>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                    <div class="col-lg-12 mx-auto action_next_btn step2_next_btn txt02 text-end mt-3">
                        <button type="submit"><i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
            </form>
        </div>
    
        <div class="col-lg-12 doo_right step-4 ">
            <form  id="setup-user-profile-step4" action="setup/profile/details/step2" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="step" value="4">
                <input type="hidden" name="dog_id" value="{{ $dogDetailsDefault->id }}">
                <div class="row">
                    <div class="col-lg-12 pb-3 dog_photo">
                        <h6>Nice To Meet You!</h6>
                        <h3>Add Best Photos Of You & Dog Name Together</h3>
                    </div>
                    <div class="col-lg-12 photos_card_wrap">
                        <div class="wrapper">
                            <div class="box main_box">
                                <div class="upload-options" id="image-preview" @if(count(json_decode($dogDetailsDefault->avatar)) >= 1 ) style="background-image: url('{{ dsld_uploaded_file_path( json_decode($dogDetailsDefault->avatar, true)[0]) }}');background-size: cover;background-position: center center;" @endif>
                                    <span id="image-label"></span>
                                    <input type="file" class="image-upload" name="davatar1" id="image-upload" name="davatar[]" @if(!is_null($dogDetailsDefault) && count(json_decode($dogDetailsDefault->avatar)) == 1 ) value="{{ $dogDetailsDefault->avatar_original }}" @endif accept="image/*" />
                                </div>
                            </div>

                            <div class="small_wrapper">
                                <div class="box small_box">
                                    <div class="upload-options" id="image-preview_1" @if(count(json_decode($dogDetailsDefault->avatar)) >=2 ) style="background-image: url('{{ dsld_uploaded_file_path( json_decode($dogDetailsDefault->avatar, true)[1]) }}');background-size: cover;background-position: center center;" @endif>
                                        <span id="image-label_1"></span>
                                        <input type="file" class="image-upload" name="davatar2" id="image-upload_1" accept="image/*" @if(!is_null($dogDetailsDefault) && count(json_decode($dogDetailsDefault->avatar)) == 2) value="{{ json_decode($dogDetailsDefault->avatar, true)[1] }}"  @endif/>
                                    </div>
                                </div>

                                <div class="box small_box">
                                    <div class="upload-options" id="image-preview_2" @if(count(json_decode($dogDetailsDefault->avatar)) >=3 ) style="background-image: url('{{ dsld_uploaded_file_path( json_decode($dogDetailsDefault->avatar, true)[2]) }}');background-size: cover;background-position: center center;" @endif>
                                        <span id="image-label_2"></span>
                                        <input type="file" class="image-upload" name="davatar3" id="image-upload_2" accept="image/*" @if(!is_null($dogDetailsDefault) && count(json_decode($dogDetailsDefault->avatar)) == 3) value="{{ json_decode($dogDetailsDefault->avatar, true)[2] }}"  @endif />
                                    </div>
                                </div>
                            </div>

                            <div class="small_wrapper">
                                <div class="box small_box">
                                    <div class="upload-options" id="image-preview_3" @if(count(json_decode($dogDetailsDefault->avatar)) >=4 ) style="background-image: url('{{ dsld_uploaded_file_path( json_decode($dogDetailsDefault->avatar, true)[3]) }}');background-size: cover;background-position: center center;" @endif>
                                        <span id="image-label_3"></span>
                                        <input type="file" class="image-upload" name="davatar4" id="image-upload_3" accept="image/*"  @if(!is_null($dogDetailsDefault) && count(json_decode($dogDetailsDefault->avatar)) == 4) value="{{ json_decode($dogDetailsDefault->avatar, true)[3] }}"  @endif/>
                                    </div>
                                </div>

                                <div class="box small_box">
                                    <div class="upload-options" id="image-preview_4" @if(count(json_decode($dogDetailsDefault->avatar)) ==5 ) style="background-image: url('{{ dsld_uploaded_file_path( json_decode($dogDetailsDefault->avatar, true)[4]) }}');background-size: cover;background-position: center center;" @endif>
                                        <span id="image-label_4"></span>
                                        <input type="file" class="image-upload" name="davatar5" id="image-upload_4" accept="image/*"  @if(!is_null($dogDetailsDefault) && count(json_decode($dogDetailsDefault->avatar)) == 5) value="{{ json_decode($dogDetailsDefault->avatar, true)[4] }}"  @endif/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 mx-auto action_next_btn step3_next_btn txt02 text-end mt-3">
                            <button type="submit"><i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
            </form>
        </div>



        <div class="col-lg-12 doo_right step-5 ">
            <form id="setup-user-profile-step5" action="setup/profile/details/step2" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="step" value="5">
                <input type="hidden" name="dog_id" value="{{ $dogDetailsDefault->id }}">
                <div class="row">
                    <div class="col-lg-12 dog_name pb-3 mb-2">
                        <label for="" class="form-label">Select Good Genes</label>
                        <p>Pick Minimum 2 Maximum 5</p></br>
                        <div class="col-lg-12 multiselect_breed">
                            @if(App\Models\GoodGene::where('status', 1)->count() > 0)
                                @foreach(App\Models\GoodGene::where('status', 1)->get() as $key => $value)
                                    <div class="gene col text-center">
                                        <label for="gene{{ $value->id }}" id="good_genes{{ $value->id }}" @if(in_array($value->id, json_decode($dogDetailsDefault->good_genes_id))) class="genActive" @endif  >{{ $value->name }}</label>
                                        <input type="checkbox" value="{{ $value->id }}" name="good_genes[]" id="gene{{ $value->id }}" @if(in_array($value->id, json_decode($dogDetailsDefault->good_genes_id))) checked @endif onclick="CheckGensSelectedCount('{{ $value->id }}')"/>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>    
                    <div class="col-lg-11 dog_text">
                        <p><span id="numberSelectedGens">{{ count(json_decode($dogDetailsDefault->good_genes_id)) }}/5 Selected</span></p>
                    </div>
                    <div class="col-lg-12 mx-auto action_next_btn step3_next_btn txt02 text-end mt-3">
                            <button type="submit"><i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
                
            </form>
        </div>

        <div class="col-lg-12 doo_right activeD">
            <form id="setup-user-profile-step6" action="setup/profile/details/step2" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="step" value="6">
                <input type="hidden" name="dog_id" value="{{ $dogDetailsDefault->id }}">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="map"></div>
                    </div>
                    <div class="col-lg-12">
                        <input type="text" name="location" id="location" class="form-control form-control-sm" placeholder="Add your name" @if($userDetails) value="{{ $userDetails->name }}" @endif required/>
                    </div>
                    
                    <div class="col-lg-12 mx-auto action_next_btn step3_next_btn txt02 text-end mt-3">
                        <button type="submit"><i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
                
            </form>
        </div>
        
        
        <!-- <div class="col-lg-10 mx-auto action_btn txt02 text-end d-none">
            <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
        </div>       -->
   </div>
</div>

@endsection

@section('footer')

<!-- Modal -->
<!-- <div class="modal fade" id="setupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <h2>Age: <strong id="dagePut">1yrs 12 months</strong></h2>
        <p>Check Before You Confirm. Age of your dog cannot be changed later</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="AgeConfirm();">Confirm</button>
      </div>
    </div>
  </div>
</div> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly&libraries=places"
    defer ></script>

<script type="text/javascript">

function initMap() {

    const myLatlng = {lat: 28.500300250545447,lng: 77.07140699150581,};
    const map = new google.maps.Map(document.getElementById("map"), {zoom: 20,center: myLatlng});
    let infoWindow = new google.maps.InfoWindow({
        position: myLatlng,
        content: '<img src="'+"{{ asset('frontend/images/output-onlinegiftools.gif') }}"+'" />',
        background: "none",
    });
    infoWindow.open(map);

    if("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(function (position) {
            const myLatlng = {lat: position.coords.latitude,lng: position.coords.longitude};
            const map = new google.maps.Map(document.getElementById("map"), {zoom: 20,center: myLatlng});

            let infoWindow = new google.maps.InfoWindow({
            position: myLatlng,
            content: '<img src="'+"{{ asset('frontend/images/output-onlinegiftools.gif') }}"+'" />',
            background: "none",
            });
            infoWindow.open(map);

            getAddressFromLatLng(myLatlng.lat, myLatlng.lng);
            map.addListener("click", (mapsMouseEvent) => {
                const clicklatlong = {lat: mapsMouseEvent.latLng.lat(),long: mapsMouseEvent.latLng.lng()}
                getAddressFromLatLng(clicklatlong.lat,clicklatlong.long);
                alert(mapsMouseEvent.latLng);
                infoWindow.close();
                // Create a new InfoWindow.
                infoWindow = new google.maps.InfoWindow({
                    position: mapsMouseEvent.latLng,
                    content: '<img src="'+"{{ asset('frontend/images/output-onlinegiftools.gif') }}"+'" />',
                });
                infoWindow.open(map);
            });
        });
    } else {
        console.log("Geolocation is not available in this browser.");
    }


    function getAddressFromLatLng(lat, lng) {
        const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`;
        fetch(url)
        .then((response) => response.json())
        .then((data) => {
            if (data.display_name) {
            const address = data.display_name;
            console.log('Address:', address);
            // You can use the address as needed in your application
            } else {
            console.log('No address found');
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }
}




$(document).ready(function() {
    window.initMap = initMap;
    $.uploadPreview({
        input_field: "#image-upload",   
        preview_box: "#image-preview",   
    });     
    $.uploadPreview({
        input_field: "#image-upload_1",  
        preview_box: "#image-preview_1"
    
    });

    $.uploadPreview({      
        input_field: "#image-upload_2",   
        preview_box: "#image-preview_2" 
    
    });

    $.uploadPreview({        
        input_field: "#image-upload_3",   
        preview_box: "#image-preview_3" 
    
    });

    $.uploadPreview({      
        input_field: "#image-upload_4",   
        preview_box: "#image-preview_4"  
    
    });
});
</script>
<script>
    $(document).ready(function(){
        checkSelectedGoodGens();
    });
    function selectOptionBreed(id){
        $('#dog_breed option').filter(function(){
            return this.id === 'breed'+id
        }).prop('selected', true);
    }

    $('#setup-user-profile-step2').submit(function(e){
        e.preventDefault();
        var data = new FormData(this);
        postAjaxSubmitStep(data, '#setup-user-profile-step2');
    });

    $('#setup-user-profile-step4').submit(function(e){
        e.preventDefault();
        var data = new FormData(this);
        postAjaxSubmitStep(data, '#setup-user-profile-step4');
    });

    $('#setup-user-profile-step5').submit(function(e){
        e.preventDefault();
        var data = new FormData(this);
        postAjaxSubmitStep(data, '#setup-user-profile-step5');
    });

    $('#setup-user-profile-step3').submit(function(e){
        e.preventDefault();
        var data = new FormData(this);
        postAjaxSubmitStep(data, '#setup-user-profile-step3');
    });


    function postAjaxSubmitStep(data, formName){
        $(formName).parent().append('<div class="loader-area"><span class="loader"></span></div>');
        $.ajax({
        
        type: $(formName).attr('method'),
        url: '{{ env("APP_URL") }}/api/v1/'+$(formName).attr('action'),
        data: data,
        dataType: "json",
        mimeType: "multipart/form-data",
        cache: false,
        processData:false,
        contentType: false,

        success: function (data) {
            $(formName).parent().find('.loader-area').remove();
            if(data.success === true){
                dsldFlashNotification('success', data.message);
                clickToNextTab();    
            }
        },
        error: function(xhr, status, error) {
            dsldFlashNotification('error', "Something wrong!. Please enter valid and required fields.");
        }
    })
    }
    $('#setup-user-profile-step1').submit(function(e){
        e.preventDefault();
        $(this).parent().append('<div class="loader-area"><span class="loader"></span></div>');

        $.ajax({
        
            type: $(this).attr('method'),
            url: '{{ env("APP_URL") }}/api/v1/'+$(this).attr('action'),
            data: new FormData(this),
            dataType: "json",
            mimeType: "multipart/form-data",
            cache: false,
            processData:false,
            contentType: false,

            success: function (data) {
                $('#setup-user-profile-step1').parent().find('.loader-area').remove();
                if(data.success === true){
                    dsldFlashNotification('success', data.message);
                    $('#user_id').val(data.data.user_id);
                    $('.action_btn').removeClass('d-none');
                    clickToNextTab();
                        
                }

            },
            error: function (e, t) {
                
                alert("some thing  error while fecteching")
            }
        })
    })
    

    /** Step Tabs Start */
      
    function findAge(){
        var date = $('#date').val();
        var month = $('#month').val();
        var year = $('#year').val();
        if(date != '' && month != '' && year != ''){
            var adob = year+'-'+month+'-'+date;
            dob = new Date(adob);
            var today = new Date();
            var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
            $('#dob').val(adob);
            $('#age').val(age);
            CheckStep(['name', 'age', 'dob'], '.step1_next_btn');
            
        }
    }

    function findDogAge(){
        var dog_month = $('#dog_month').val();
        var dog_year = $('#dog_year').val();
        
        if(dog_month != '' && dog_year != ''){
            
            var dog_dob = dog_year+'-'+dog_month+'-01';
            dog_dob = new Date(dog_dob);
            var today = new Date();
            var dog_age = Math.floor((today-dog_dob) / (365.25 * 24 * 60 * 60 * 1000));
            $('#dog_age').val(dog_age);
            alert(dog_age);
            CheckStep(['dog_name', 'dog_age'], '.step2_next_btn');
            
        }
    }
    function CheckStep(fieldsToCheck, btnClass){
        var fieldsToCheck = fieldsToCheck;
        var result = areFieldsRequired(fieldsToCheck);
        if(result){
            checkIsEmpty(result, btnClass); 
        }else{
            checkIsEmpty(result, btnClass); 
        }
    }
    /** Step Tabs End */


    /** Check Empty value and show/hide next button**/
    function checkIsEmpty(value, btnClass){
        if(value == false){
            $(btnClass).removeClass('d-none');
        }else{
            $(btnClass).addClass('d-none');
        }
    }

    function areFieldsRequired(fieldsArray) {
            var isEmpty = false;
            $.each(fieldsArray, function(index, fieldName) {
                var fieldValue = $('[name="' + fieldName + '"]').val();
                if ($.trim(fieldValue) === '') {
                    isEmpty = true;
                    return false;
                }
            });
            return isEmpty;
    }

    function AgeConfirm(){
        CheckStep(['dage']);
        clickToNextTab();
        $("#setupModal").modal("hide");
    }

    /** Next/Previous Tabs Start */
    var butn = document.querySelectorAll(".doo_right");
    // var nextbtn = document.querySelector(".action_btn a");
    let currentIndex=0;
    let backBtn = document.querySelector(".back_btn a");
    let index=0;

    // nextbtn.addEventListener("click", function(){
     
    //     if(currentIndex !=2 && currentIndex != 5){
    //         $('.action_btn').addClass('d-none');
    //     }

    //     clickToNextTab();
    // });

    
    function update(){
        butn.forEach((btn,ids)=>{
            if(ids===currentIndex){
                btn.classList.add("activeD");
            }
            else{
                btn.classList.remove("activeD");
            }
        })
    }
    backBtn.addEventListener("click",function(){
        clickToPrevTab();
    });
    function clickToNextTab(){
        currentIndex++;

        if(currentIndex > butn.length){
            currentIndex = butn.length-1;
        }
        update();
    }
    function clickToPrevTab(){
        if(index < currentIndex){
            currentIndex--
        }
        console.log(currentIndex)
        update();
    }

    $('.action_skip_btn').on('click', function (){
        var month = $('#dage_month').val();
        var year = $('#dage_year').val();
        if(year == 0){
            year = year+'0 Yr';
        }else if(year == 1){
            year = year+' Yr';
        }else{
            year = year+' Yrs';
        }
        if(month == 0){
            month = month+'0 Month';
        }
        else if(month > 1){
            month = month+' Month';
        }else{
            month = month+' Months';
        }

        $('#dagePut').text(year+' '+month);
        $("#setupModal").modal("show");
    });
    /** Next/Previous Tabs End */
</script>

<!-- <script>
      function DatePicker(spec) {
            var currentOption = spec.current,
            itemIndex;
            
            function generateOptions(data, item) {
            var i,
                state,
                options = [];

            function computeState(currentIndex, itemIndex) {
                if (currentIndex === itemIndex) { 
                return "active";
                }

                if (
                itemIndex >= 0 &&
                Math.abs(itemIndex - currentIndex) < Math.ceil(spec.visible / 2)
                ) {
                return "";
                }

                return null;
            }

            for (i = 0; i < data.length; i += 1) {
                itemIndex = data.indexOf(item);
                state = computeState(i, data.indexOf(item));

                if (state !== null) {
                options.push({
                    month: data[i],
                    state: computeState(i, itemIndex),
                });
                }
            }
            options = options.slice(0, 3);

            return options;
            }

            function generateDom(options) {
            var i,
                html = "";

            for (i = 0; i < options.length; i += 1) {
                html +=
                '<li class="date ' +
                options[i].state +
                '">' +
                options[i].month +
                "</li>";
            }

            return html;
            }

            this.onscroll = function (event, elem) {
            var options,
                currentOptionIndex,
                emptyOption = {
                month: "--",
                state: "hidden",
                };

            currentOptionIndex = spec.data.indexOf(currentOption) || 0;
            currentOptionIndex =
                event.wheelDeltaY < 0
                ? currentOptionIndex + 1
                : currentOptionIndex - 1;

            if (currentOptionIndex === -1) {
                currentOptionIndex = 0;
                return;
            }

            if (currentOptionIndex === spec.data.length) {
                currentOptionIndex = spec.data.length - 1;
                return;
            }

            currentOption = spec.data[currentOptionIndex];
            options = generateOptions(spec.data, currentOption);
            
            if (currentOptionIndex === 1 && options.length < spec.visible - 1) {
                options = [emptyOption].concat(options);
            }

            if (currentOptionIndex === 0 && options.length < spec.visible - 1) {
                options = [emptyOption, emptyOption].concat(options);
            }
            $('#dage_year').val(currentOptionIndex);
            changeDogAge();
            elem.innerHTML = generateDom(options);
            };
        }

        function DatePickerMonth(spec) {
            var currentOption = spec.current,
            itemIndex;
            
            function generateOptions(data, item) {
            var i,
                state,
                options = [];

            function computeState(currentIndex, itemIndex) {
                if (currentIndex === itemIndex) { 
                return "active";
                }

                if (
                itemIndex >= 0 &&
                Math.abs(itemIndex - currentIndex) < Math.ceil(spec.visible / 2)
                ) {
                return "";
                }

                return null;
            }

            for (i = 0; i < data.length; i += 1) {
                itemIndex = data.indexOf(item);
                state = computeState(i, data.indexOf(item));

                if (state !== null) {
                options.push({
                    month: data[i],
                    state: computeState(i, itemIndex),
                });
                }
            }
            options = options.slice(0, 3);

            return options;
            }

            function generateDom(options) {
            var i,
                html = "";

            for (i = 0; i < options.length; i += 1) {
                html +=
                '<li class="date ' +
                options[i].state +
                '">' +
                options[i].month +
                "</li>";
            }

            return html;
            }

            this.onscroll = function (event, elem) {
            var options,
                currentOptionIndex,
                emptyOption = {
                month: "--",
                state: "hidden",
                };

            currentOptionIndex = spec.data.indexOf(currentOption) || 0;
            currentOptionIndex =
                event.wheelDeltaY < 0
                ? currentOptionIndex + 1
                : currentOptionIndex - 1;

            if (currentOptionIndex === -1) {
                currentOptionIndex = 0;
                return;
            }

            if (currentOptionIndex === spec.data.length) {
                currentOptionIndex = spec.data.length - 1;
                return;
            }

            currentOption = spec.data[currentOptionIndex];
            options = generateOptions(spec.data, currentOption);
            
            if (currentOptionIndex === 1 && options.length < spec.visible - 1) {
                options = [emptyOption].concat(options);
            }

            if (currentOptionIndex === 0 && options.length < spec.visible - 1) {
                options = [emptyOption, emptyOption].concat(options);
            }
            $('#dage_month').val(currentOptionIndex+1);
            changeDogAge();
            elem.innerHTML = generateDom(options);
            };
        }
        
        var monthDatepicker = new DatePickerMonth({
            data: ["1","2","3","4","5","6","7","8","9","10","11","12",],
            current: "3",
            visible: 3,
        });

        var yearDatepicker = new DatePicker({
            data: Array.apply(null, { length: 6 }).map(Number.call, function (n) {
                return (n || 0) + 0;
            }),
            current: 2023,
            visible: 3,
        });

        function  changeDogAge(){
            var month = $('#dage_month').val();
            var year = $('#dage_year').val()*12;
            if(year!=0 && month != 0){
                var dage = parseInt(year) + parseInt(month);
                $('#dage').val(dage);
            } 
        }
        
</script> -->

<script>
        function CheckGensSelectedCount(id){
            var isChecked = $('#gene'+id).prop('checked');
            if(isChecked){
                $('#good_genes'+id).addClass("genActive");
            }else{
                $('#good_genes'+id).removeClass("genActive");
            }
            checkSelectedGoodGens();
        }

        function checkSelectedGoodGens(){
            var numChecked = $('input[name="good_genes[]"]:checked').length;
            var maxSelected = 4;
            
            if (numChecked > maxSelected) {
                $('input[name="good_genes[]"]:not(:checked)').prop('disabled', true);
            }else{
                $('input[name="good_genes[]"]').prop('disabled', false)
            }
            var message = numChecked + '/5 Selected';
            $('#numberSelectedGens').text(message);
        }
    </script>

@endsection