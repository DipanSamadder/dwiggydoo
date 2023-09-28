@extends('frontend.layouts.blank')
@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css"> 

@endsection

@section('content')
<div class="login-detail">
<div class="user_right_wrap">
    <div class="col-lg-6 mx-auto user_right_side">
            
        <div class="col-lg-12 doo_right login-by-phone-no activeD">
            <a class="mb-3 d-inline-block" href="{{ route('login') }}"><img src="{{ asset('assets/images/Icon ionic-ios-arrow-round-back.png') }}"></a>
            <h2>What's Your Email?</h2>
            <form class="signup-email" name="signup-email" id="signup-email" action="{{ route('register.email.submit') }}" method="post">
                @csrf
                <input type="email" name="email" onchange="updateEmailOnOTP()" placeholder="Enter your email id" class="form-control" required/>                        
                <p class="mt-2">We'll send you a code to confirm your email id.</p>
                <div class="action-btn col-lg-12 text-center mt-3">
                    <button class="reqst-otp" type="submit">REQUEST OTP</button>
                    <p class="edit-phone-no req-new-code resend-code-btn mt-3"> <a href="{{ route('register.phone') }}">Continue With Phone Number</a>
                    </p>
                </div>
            </form>
            <div class="col-lg-10 mx-auto action_btn txt02 text-end d-none">
                <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="col-lg-12 doo_right login-by-phone-no">
            <div class="col-lg-12 back_btn">
                <a class="mb-3 d-inline-block" href="#"><img src="{{ asset('assets/images/Icon ionic-ios-arrow-round-back.png') }}"></a>
            </div>
            <h2>OTP Verification</h2>
            
            <p class="mb-2">A 6 digit OTP has been sent for verification on your Email Address</p>
            <p class="edit-phone-no"><span>Edit:</span> <b id="updateEmailOnOTP"></b> </p>
            <form class="otp-verify email_otp" name="otp-verify" id="otp-verify" action="{{ route('register.otp.submit') }}" method="post">
                @csrf
                <input type="hidden" name="id" id="user_id" value="">
                <input type="text" name="otp1" maxlength="1">
                <input type="text" name="otp2" maxlength="1">
                <input type="text" name="otp3" maxlength="1">
                <input type="text" name="otp4" maxlength="1">
                <input type="text" name="otp5" maxlength="1">
                <input type="text" name="otp6" maxlength="1">
                <div class="action-btn col-lg-12 text-center mt-3">
                    <button type="submit" class="reqst-otp">VERIFY NOW</button>
                </div>
            </form>
           
            
            <!-- <p class="edit-phone-no req-new-code mt-3" id="expire_at"><span>Request new code in</span> 00:19 </p>
            <div class="action-btn col-lg-12 text-center">
                <button class="reqst-otp">REQUEST OTP</button>
            </div> -->
        </div>

    <div class="col-lg-12 doo_right">

        <div class="col-lg-12">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3506.3124294517024!2d77.06822967471761!3d28.50024639007713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d196c2ca34d09%3A0x4fb1b2830c80b1e!2sCity%20Innovates%20Pvt.%20Ltd.!5e0!3m2!1sen!2sin!4v1695116205666!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    
</div>
</div>
@endsection

@section('footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js"></script>
<script>
    function updateEmailOnOTP(){
        var email = $('input[name=email]').val();
        $('#updateEmailOnOTP').html('<u>'+email+'</u>');
    }
    var butn = document.querySelectorAll(".doo_right");
    var nextbtn = document.querySelector(".action_btn a");
    let currentIndex=0;
    let backBtn = document.querySelector(".back_btn a");
    let index=0;

    $('#signup-email').submit(function(e){
        e.preventDefault();
        $(this).parent().append('<div class="loader-area"><span class="loader"></span></div>');
       
        $.post( 
            $(this).attr('action'),
            $(this).serialize(),
            function(data) {
                $('#signup-email').parent().find('.loader-area').remove();
                if(data.success === true){
                    dsldFlashNotification('success', data.message);
                    $('#user_id').val(data.data.user_id);
                    // $('#expire_at').text(data.data.expire_at);
                    $('.action_btn').removeClass('d-none');
                    clickToNextTab();
                        
                }
                
            
            }
        );
    })

    $('#otp-verify').submit(function(e){
        e.preventDefault();
        $(this).parent().append('<div class="loader-area"><span class="loader"></span></div>');
        var id = $('input[name=id]').val();

        var otp1 = $('input[name=otp1]').val();
        var otp2 = $('input[name=otp2]').val();
        var otp3 = $('input[name=otp3]').val();
        var otp4 = $('input[name=otp4]').val();
        var otp5 = $('input[name=otp5]').val();
        var otp6 = $('input[name=otp6]').val();
        var otp = otp1+otp2+otp3+otp4+otp5+otp6;

        $.post( 
            $(this).attr('action'),
            {'_token': '{{ csrf_token() }}','otp' : otp, 'id' : id},
            function(data) {
                $('#otp-verify').parent().find('.loader-area').remove();

                if(data.success === true){
                    sessionStorage.setItem('access_token', data.access_token);
                    sessionStorage.setItem('token_type', data.token_type);

                    dsldFlashNotification('success', data.message);
                    if(data.new_user == true){
                        window.location.href = '{{ route("user.setup") }}';
                    }else{
                        
                        window.location.href = '{{ route("dashboard") }}';
                    }
                }else{
                    dsldFlashNotification('error', data.message);
                }

                

            }
        );
    })

    $("#mobile_code").intlTelInput({
        initialCountry: "in",
        separateDialCode: true,
    });

   

    nextbtn.addEventListener("click", function(){
        clickToNextTab();
    });

    function clickToNextTab(){
        currentIndex++;

        if(currentIndex > butn.length){
            currentIndex = butn.length-1;
        }
        update();
    }
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

        if(index < currentIndex){
            currentIndex--
        }
        console.log(currentIndex)
        update();
    });
</script>

<script>
    var container = document.getElementsByClassName("email_otp")[0];
        container.onkeyup = function(e) {
            var target = e.srcElement;
            var maxLength = parseInt(target.attributes["maxlength"].value, 10);
            var myLength = target.value.length;
            if (myLength >= maxLength) {
                var next = target;
                while (next = next.nextElementSibling) {
                    if (next == null)
                        break;
                    if (next.tagName.toLowerCase() == "input") {
                        next.focus();
                        break;
                    }
                }
            }
        }
</script>
@endsection