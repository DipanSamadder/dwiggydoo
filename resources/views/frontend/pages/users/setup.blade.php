@extends('frontend.layouts.blank')
@section('content')
<style>
        
        .modal-footer{
            justify-content:space-around;
        }
        .modal-footer button:first-child {
            font-size: 14px;
    background: transparent;
    color: #000000;
    border: none;
        }
        .modal-footer button:last-child{
            font-size: 14px;
    background: transparent;
    color: #F3735F;
    border: none;
        }
        .modal-body h2{
            font-size: 20px;
    font-weight: 600;
    text-align: center;
        }
        .modal-body p{
            font-size:14px;
            font-weight:400;
            text-align:center;
            margin:0px;
        }

        .action_skip_btn a {
            width: 50px;
            height: 30px;
            box-shadow: 0px 3px 6px #00000029;
            background: linear-gradient(180deg, #ffffff, #ffe7e4);
            display: inline-block;
            border-radius: 19px;
            text-align: center;
        }
        .action_skip_btn a i {
            font-size: 14px;
            color: #f3735f;
        }
    </style>
<div class="user_right_wrap">

    <div class="col-lg-6 mx-auto user_right_side">
        <div class="col-lg-12 back_btn">
            <a class="mb-3 d-inline-block" href="#"><img src="{{ asset('assets/images/Icon ionic-ios-arrow-round-back.png') }}"></a>
        </div>
        <div class="col-lg-12 doo_right activeD">
            <div class="col-lg-11 pb-3">
                <h6>welcome</h6>
                <label for="name" class="form-label">what's your name?..</label>
                <input type="text" name="name" id="name" onChange="CheckStep(['name', 'age', 'dob'])" class="form-control form-control-sm" placeholder="Add your name" required/>
            </div>
            <div class="col-lg-12">
                <label for="date" class="form-label">Whats Your Age?</label>
                <div class="col-lg-11 user_wrap">
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
                        <input type="text" name="age" id="age" onchange="CheckStep(['name', 'age', 'dob'])" class="form-control form-control-sm" disabled required/>
                        <input type="hidden" name="dob" id="dob" onchange="CheckStep(['name', 'age', 'dob'])"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 doo_right">
            
            <div class="col-lg-12 dog_name pb-3">
                <label for="dogname" class="form-label">What's Your Dog's Name?</label>
                <p>You won't be able to change this later.</p>
                <div class="col-lg-11">
                    <input type="text" name="dogname" id="dogname" onchange="CheckStep(['dogname'])" class="form-control form-control-sm" placeholder="Add your dog name" required/>
                </div>
            </div>
        </div>
        <div class="col-lg-12 doo_right">
            <div class="col-lg-12 dog_name pb-3">
                <label for="breedname" class="form-label">What’s Your Dog’s Breed?</label>
            </div>
            <div class="col-lg-11 dog_breed">
                <span><i class="fa-solid fa-angle-right"></i></span>
                <select name="breedname" id="breedname" onchange="CheckStep(['breedname'])" class="form-control form-select form-select-sm">
                    <option value="">Choose bread</option>
                    
                    @php 
                        $top_breed = App\Models\Breed::orderBy('name', 'ASC')->get();
                    @endphp
                    @if(!is_array($top_breed) && count($top_breed) > 1)
                        @foreach($top_breed as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
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
                                <img src="{{ $value->image }}" alt="" class="img-fluid rounded-circle"/>
                                <h2>{{ $value->name }}</h2>
                            </div>
                        @endforeach
                    @endif

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

        <div class="col-lg-12 doo_right ">
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
                
                <input type="hidden" name="dage_month" id="dage_month" value="2">
                <input type="hidden" name="dage_year" id="dage_year" value="1">
                <input type="hidden" name="dage" id="dage" required value="14">
                
            </div>
            <div class="col-lg-11 mx-auto dog_text">
                <p>We only show your age to potential matches.</p>
            </div>
            <div class="col-lg-10 mx-auto action_skip_btn txt02 text-end">
                <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
            </div>  
        </div>
        <div class="col-lg-12 doo_right ">
            <div class="col-lg-12 dog_name pb-3">
                <label for="" class="form-label">Your Dog's Gender?</label>
                <div class="col-lg-10 dog_gender my-3">
                    <label for="dgender1" class="form-label"><span><i class="fa-solid fa-mars-stroke-up"></i></span> male</label>
                    <input type="radio" id="dgender1" name="dgender" class="form-radio" checked />
                </div>
                <div class="col-lg-10 dog_gender">
                    <label for="dgender2" class="form-label"><span><i class="fa-solid fa-venus"></i></span> female</label>
                    <input type="radio" id="dgender2" name="dgender" class="form-radio"/>
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
        
        
        <div class="col-lg-10 mx-auto action_btn txt02 text-end d-none">
            <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
        </div>      
   </div>
</div>

@endsection

@section('footer')

<!-- Modal -->
<div class="modal fade" id="setupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js"></script>
<script>
    

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
            CheckStep(['name', 'age', 'dob']);
            
        }
    }
    
    function CheckStep(fieldsToCheck){
        var fieldsToCheck = fieldsToCheck;
        var result = areFieldsRequired(fieldsToCheck);
        if(result){
            checkIsEmpty(result); 
        }else{
            checkIsEmpty(result); 
        }
    }
    /** Step Tabs End */


    /** Check Empty value and show/hide next button**/
    function checkIsEmpty(value){
        if(value == false){
            $('.action_btn').removeClass('d-none');
        }else{
            $('.action_btn').addClass('d-none');
        }
    }

    function areFieldsRequired(fieldsArray) {
            var isEmpty = false;
            $.each(fieldsArray, function(index, fieldName) {
                var fieldValue = $('[name="' + fieldName + '"]').val();
                if ($.trim(fieldValue) === '') {
                    isEmpty = true;
                    return false; // Break out of the loop if any field is empty
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
    var nextbtn = document.querySelector(".action_btn a");
    let currentIndex=0;
    let backBtn = document.querySelector(".back_btn a");
    let index=0;

    nextbtn.addEventListener("click", function(){
        alert(currentIndex);
        if(currentIndex !=2 && currentIndex != 5){
            $('.action_btn').addClass('d-none');
        }

        clickToNextTab();
    });

    
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

<script>
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

        // var dayDatepicker = new DatePicker({
        //     data: Array.apply(null, { length: 1, }).map(Number.call, function (n) {
        //         return (n || 0) + 1;
        //     }),
        //     current: 14,
        //     visible: 3,
        // });
        

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
        
        </script>

        

@endsection