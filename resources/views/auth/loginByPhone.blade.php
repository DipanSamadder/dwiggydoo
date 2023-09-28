@extends('frontend.layouts.blank')
@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css"> 
@endsection

@section('content')

<div class="user_right_wrap">
    <div class="col-lg-6 mx-auto user_right_side">

        <div class="col-lg-12 login-by-phone-no doo_right activeD">
            <a class="mb-3 d-inline-block" href="#"><img src="{{ asset('assets/images/Icon ionic-ios-arrow-round-back.png') }}"></a>
            <h2>Enter Your Phone Number</h2>
            <form class="phone-no-select d-flex">

                <input type="text" id="mobile_code" class="form-control" placeholder="Phone Number" name="name">

                
            </form>
            <p>We'll send you a code by SMS to confirm your phone number. <br>We may occasionally send you service-based messages.</p>
            <div class="action-btn col-lg-12 text-center">
                <button class="reqst-otp">REQUEST OTP</button>
            </div>
        </div>

        <div class="col-lg-12 doo_right login-by-phone-no">
            <a class="mb-3 d-inline-block" href="#"><img src="assets/images/Icon ionic-ios-arrow-round-back.png"></a>
            <h2>OTP Verification</h2>
            
            <p class="mb-2">A 6 digit OTP has been sent for verification on your Phone number</p>
            <p class="edit-phone-no"><span>Edit:</span> +91 1234567800 </p>
            <form class="otp-verify" action="">
                <input type="text" placeholder="2">
                <input type="text" placeholder=" ">
                <input type="text" placeholder=" ">
                <input type="text" placeholder=" ">
                <input type="text" placeholder=" ">
                <input type="text" placeholder=" ">
            </form>
            <div class="action-btn col-lg-12 text-center mt-3">
            <button class="reqst-otp">VERIFY NOW</button>
            <p class="edit-phone-no req-new-code mt-3"><span>Request new code in</span> 00:19 </p>
            </div>
            
        </div>

        <div class="col-lg-12 doo_right login-by-phone-no">
            <a class="mb-3 d-inline-block" href="#"><img src="assets/images/Icon ionic-ios-arrow-round-back.png"></a>
            <h2>OTP Verification</h2>
            
            <p class="mb-2">A 6 digit OTP has been sent for verification on your Phone number</p>
            <p class="edit-phone-no"><span>Edit:</span> +91 1234567800 </p>
            <form class="otp-verify" action="">
                <input type="text" placeholder="2">
                <input type="text" placeholder=" ">
                <input type="text" placeholder=" ">
                <input type="text" placeholder=" ">
                <input type="text" placeholder=" ">
                <input type="text" placeholder=" ">
            </form>
            <div class="action-btn col-lg-12 text-center mt-3">
            <button class="reqst-otp">VERIFY NOW</button>
            <p class="edit-phone-no req-new-code resend-code-btn mt-3"> <a href="#">RESEND CODE</a> </p>
            </div>
            
        </div>

        <div class="col-lg-12 doo_right login-by-phone-no">
            <a class="mb-3 d-inline-block" href="#"><img src="assets/images/Icon ionic-ios-arrow-round-back.png"></a>
            <h2>What's Your Email?</h2>
            
            <form class="signup-email">
            <input type="text" placeholder="Enter your email id" class="form-control"/>                        
        </form>
        <p class="mt-2">We'll send you a code to confirm your email id.</p>
            <div class="action-btn col-lg-12 text-center mt-3">
            <button class="reqst-otp">REQUEST OTP</button>
            <p class="edit-phone-no req-new-code resend-code-btn mt-3"> <a href="#">Continue With Phone Number</a> </p>
            </div>
        </div>

        <div class="col-lg-12 doo_right login-by-phone-no">
            <a class="mb-3 d-inline-block" href="#"><img src="assets/images/Icon ionic-ios-arrow-round-back.png"></a>
            <h2>OTP Verification</h2>
            
            <p class="mb-2">A 6 digit OTP has been sent for verification on your Email Address</p>
            <p class="edit-phone-no"><span>Edit:</span> <b><u>roshni.cityinnovates@gmail.com</u></b> </p>
            <form class="otp-verify" action="">
                <input type="text" placeholder="2">
                <input type="text" placeholder=" ">
                <input type="text" placeholder=" ">
                <input type="text" placeholder=" ">
                <input type="text" placeholder=" ">
                <input type="text" placeholder=" ">
            </form>
            <div class="action-btn col-lg-12 text-center mt-3">
                <button class="reqst-otp">VERIFY NOW</button>
            </div>
        </div>

        <!-- <div class="col-lg-12 doo_right login-by-phone-no">
            <div class="col-lg-12">
                <h3>It’s A Deed To Feed A Dog In Need</h3>
            </div>
            <div class="col-lg-12">
                <p>You Served: 5 DOGS</p>
                <div class="col-lg-12">
                    <h4></h4>
                </div>
            </div>
            
            <p class="mb-2">A 6 digit OTP has been sent for verification on your Email Address</p>
            <p class="edit-phone-no"><span>Edit:</span> <b><u>roshni.cityinnovates@gmail.com</u></b> </p>
            <form class="otp-verify" action="">
                <input type="text" placeholder="2">
                <input type="text" placeholder=" ">
                <input type="text" placeholder=" ">
                <input type="text" placeholder=" ">
                <input type="text" placeholder=" ">
                <input type="text" placeholder=" ">
            </form>
            <div class="action-btn col-lg-12 text-center mt-3">
                <button class="reqst-otp">VERIFY NOW</button>
            </div>
        </div> -->


        <div class="col-lg-12 doo_right ">
            <div class="col-lg-11 pb-3">
                <h6>welcome</h6>
                <label for="" class="form-label">what's your name?</label>
                <input type="text" class="form-control form-control-sm" placeholder="Add your name"/>
            </div>

            <div class="col-lg-12">
                <label for="" class="form-label">Whats Your Age?</label>
                <div class="col-lg-11 user_wrap">
                    <div class="col-lg-3">
                        <select name="" id="" class="form-select form-select-sm">
                            <option value="">date</option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <select name="" id="" class="form-select form-select-sm" placeholder="Month">
                            <option value="">month</option>
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <select name="" id="" class="form-select form-select-sm">
                            <option value="">year</option>
                        </select>
                    </div>

                    <div class="col-lg-2">
                        <input type="text" class="form-control form-control-sm" placeholder="21"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 doo_right">
            <div class="col-lg-12 dog_name pb-3">
                <label for="" class="form-label">What's Your Dog's Name?</label>
                <p>You won't be able to change this later.</p>
                <div class="col-lg-11">
                <input type="text" class="form-control form-control-sm" placeholder="Add your dog name"/>
                </div>
            </div>
        </div>

        <div class="col-lg-12 doo_right">
            <div class="col-lg-12 dog_name pb-3">
                <label for="" class="form-label">What’s Your Dog’s Breed?</label>
                <div class="col-lg-11 dog_breed">
                    <span><i class="fa-solid fa-angle-right"></i></span>
                    <select name="" id="" class="form-select form-select-sm">
                    
                        <option value="">Choose bread</option>
                    </select>
                    <div class="col-lg-11 mx-auto breed_type">
                        <h3>Top Breed</h3>
                    </div>
                    <div class="col-lg-12 breed_type_dog mb-3">
                        <div class="col-lg-3 breed_card">
                            <img src="assets/images/dogs/img-1.png" alt="" class="img-fluid"/>
                            <h2>indian spitz</h2>
                        </div>

                        <div class="col-lg-3 breed_card">
                            <img src="assets/images/dogs/img-1.png" alt="" class="img-fluid"/>
                            <h2>French Bulldog</h2>
                        </div>

                        <div class="col-lg-3 breed_card">
                            <img src="assets/images/dogs/img-1.png" alt="" class="img-fluid"/>
                            <h2>Golden Retriever</h2>
                        </div>
                    </div>
                    <div class="col-lg-12 breed_type_dog mb-3">
                        <div class="col-lg-3 breed_card">
                            <img src="assets/images/dogs/img-1.png" alt="" class="img-fluid"/>
                            <h2>Labrador Retriever</h2>
                        </div>

                        <div class="col-lg-3 breed_card">
                            <img src="assets/images/dogs/img-1.png" alt="" class="img-fluid"/>
                            <h2>Shitzu Tzu</h2>
                        </div>

                        <div class="col-lg-3 breed_card">
                            <img src="assets/images/dogs/img-1.png" alt="" class="img-fluid"/>
                            <h2>English Cocker Spaniel</h2>
                        </div>
                    </div>
                    <div class="col-lg-12 breed_type_dog mb-3">
                        <div class="col-lg-3 breed_card">
                            <img src="assets/images/dogs/img-1.png" alt="" class="img-fluid"/>
                            <h2>Toy Pom</h2>
                        </div>

                        <div class="col-lg-3 breed_card">
                            <img src="assets/images/dogs/img-1.png" alt="" class="img-fluid"/>
                            <h2>Poodle</h2>
                        </div>

                        <div class="col-lg-3 breed_card">
                            <img src="assets/images/dogs/img-1.png" alt="" class="img-fluid"/>
                            <h2>Beagle</h2>
                        </div>
                    </div>
                    <div class="col-lg-12 breed_type_dog">
                        <div class="col-lg-3 breed_card">
                            <img src="assets/images/dogs/img-1.png" alt="" class="img-fluid"/>
                            <h2>Husky</h2>
                        </div>
                </div>
            </div>
        </div>
        
    </div>


    <div class="col-lg-12 doo_right">
        <div class="col-lg-12 dog_name pb-3">
            <label for="" class="form-label">What’s Your Dog’s Breed?</label>
            <div class="col-lg-11 dog_breed">
                <span><i class="fa-solid fa-angle-right"></i></span>
                <select name="" id="" class="form-select form-select-sm">
                
                    <option value="">Choose bread</option>
                </select>
            </div>
        </div>  
    </div>

    <div class="col-lg-12 doo_right">
        <div class="col-lg-12 pb-3 dog_photo">
            <h6>Nice To Meet You!</h6>
            <h3>Add Best Photos Of You & Dog Name Together</h3>
        </div>
        <div class="col-lg-12 photos_card_wrap">
            <div class=" photos_card">
                <span><i class="fa-solid fa-plus"></i></span>
            </div>
            <div class=" photos_card">
                <div class="sub_card_wrap">
                    <div class="sub_card">
                        <span><i class="fa-solid fa-plus"></i></span>
                    </div>
                    <div class="sub_card">
                        <span><i class="fa-solid fa-plus"></i></span>
                    </div>
                </div>
                <div class="sub_card_wrap">
                    <div class="sub_card">
                        <span><i class="fa-solid fa-plus"></i></span>
                    </div>
                    <div class="sub_card">
                        <span><i class="fa-solid fa-plus"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="fb_register">
            <button type="button">Add from Facebook  <i class="fa-brands fa-facebook"></i></button>
        </div>

        <div class="fb_register">
            <button type="button">Add from Instagram  <img src="{{ asset('assets/images/instagram.png') }}" alt=""></button>
        </div>
    </div>

    <div class="col-lg-12 doo_right">
        <div class="col-lg-12 pb-3 dog_photo">
            <h6>Nice To Meet You!</h6>
            <h3>Add Best Photos Of You & Dog Name Together</h3>
        </div>
        <div class="col-lg-12 photos_card_wrap">
            <div class=" photos_card card_img">
                <img src="{{ asset('assets/images/Rectangle 3665.png') }}" alt="">
            </div>
            <div class=" photos_card">
                <div class="sub_card_wrap">
                    <div class="sub_card">
                        <span><i class="fa-solid fa-plus"></i></span>
                    </div>
                    <div class="sub_card">
                        <span><i class="fa-solid fa-plus"></i></span>
                    </div>
                </div>
                <div class="sub_card_wrap">
                    <div class="sub_card">
                        <span><i class="fa-solid fa-plus"></i></span>
                    </div>
                    <div class="sub_card">
                        <span><i class="fa-solid fa-plus"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="fb_register">
            <button type="button">Add from Facebook  <i class="fa-brands fa-facebook"></i></button>
        </div>

        <div class="fb_register">
            <button type="button">Add from Instagram  <img src="assets/images/instagram.png" alt=""></button>
        </div>
    </div>

    <div class="col-lg-12 doo_right">
        <div class="col-lg-11 dog_name pb-3">
            <label for="" class="form-label">What's Your Dog's Age?</label>
            <div class="col-lg-11 mx-auto datepicker_wrap">
                <div class="datepicker_card">
                    <div class="col-lg-11 dc_month text-center">
                        <h3> years</h3>
                    </div>
                    <div id="datepicker-container">
                        <ul
                            class="datepicker medium"
                            onwheel="yearDatepicker.onscroll(event, this)"
                        >
                            <li class="date">0</li>
                            <li class="date active">1</li>
                            <li class="date ">2</li>
                            <li class="date hidden">3</li>
                            <li class="date hidden">4</li>
                        </ul>
                    </div>
                </div>
            <div class="datepicker_card">
                <div class="col-lg-11 dc_month text-center">
                    <h3>months</h3>
                </div>
                <div id="datepicker-container">
                    

                    <ul
                        class="datepicker large"
                        onwheel="monthDatepicker.onscroll(event, this)"
                    >
                        <li class="date">1</li>
                        <li class="date active">2</li>
                        <li class="date">3</li>
                        <li class="date hidden">4</li>
                        <li class="date hidden">5</li>
                        <li class="date hidden">6</li>
                        <li class="date hidden">7</li>
                        <li class="date hidden">8</li>
                        <li class="date hidden">9</li>
                        <li class="date hidden">10</li>
                        <li class="date hidden">11</li>
                        <li class="date hidden">12</li>
                    </ul>
                </div>
            
                </div>
                
            </div>
        </div>  
        <div class="col-lg-11 mx-auto dog_text">
            <p>We only show your age to potential matches.</p>
        </div>
    </div>


    <div class="col-lg-12 doo_right">
        <div class="col-lg-12 dog_name pb-3">
            <label for="" class="form-label">Your Dog's Gender?</label>
            <div class="col-lg-10 dog_gender my-3">
                <label for="" class="form-label"><span><i class="fa-solid fa-mars-stroke-up"></i></span> male</label>
                <input type="radio" class="form-radio"/>
            </div>
            <div class="col-lg-10 dog_gender">
                <label for="" class="form-label"><span><i class="fa-solid fa-venus"></i></span> female</label>
                <input type="radio" class="form-radio"/>
            </div>
        </div>  
        <div class="col-lg-11 dog_text">
            <p>You can always update this later.</p>
        </div>
    </div>

    <div class="col-lg-12 doo_right">
        <div class="col-lg-12 dog_name pb-3 mb-2">
            <label for="" class="form-label">Select Good Genes</label>
            <p>Pick Minimum 2 Maximum 5</p>
            
            <div class="col-lg-12">
                <select name="" id="" class="form-select" multiple data-placeholder="select good genes">
                    <option value="">LOVE KIDS</option>
                    <option value="">SMART & QUICK</option>
                    <option value="">LOVER</option>
                    <option value="">UNCONDITIONAL LOVE</option>
                    <option value="">LOW MANTAINANCE</option>
                    <option value="">CALM & CLEVER</option>
                    <option value="">TRUSTWORTHY</option>
                    <option value="">PARTY CRASHER</option>
                </select>
            </div>
        </div>  
        <div class="col-lg-11 dog_text">
            <p>1/5 Selected</p>
        </div>
    </div>

    <div class="col-lg-12 doo_right">

        <div class="col-lg-12">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3506.3124294517024!2d77.06822967471761!3d28.50024639007713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d196c2ca34d09%3A0x4fb1b2830c80b1e!2sCity%20Innovates%20Pvt.%20Ltd.!5e0!3m2!1sen!2sin!4v1695116205666!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <div class="col-lg-10 mx-auto action_btn txt02 text-end">
        <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
    </div>
</div>

@endsection

@section('footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js"></script>
<script>
    $("#mobile_code").intlTelInput({
        initialCountry: "in",
        separateDialCode: true,
    });


    var butn = document.querySelectorAll(".doo_right");
    var nextbtn = document.querySelector(".action_btn a");
    let currentIndex=0;
    console.log(butn)

    nextbtn.addEventListener("click", function(){
            currentIndex++;

            if(currentIndex > butn.length){
                currentIndex = butn.length;
            }
            update();
    })

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
</script>
@endsection