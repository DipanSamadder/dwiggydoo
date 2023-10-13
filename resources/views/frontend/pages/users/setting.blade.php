<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dwiggy Do</title>

    <meta name="api-token" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="base-url" content="{{ env('APP_URL') }}">

    <link rel="icon" type="image/x-icon" href="{{ dsld_static_asset('frontend/images/favicon.png') }}">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous"
        referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    @production

        @php

            $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);

        @endphp

        <link rel="stylesheet"
            href="{{ dsld_get_base_URL() }}public/build/{{ $manifest['resources/css/style.css']['file'] }}">
        <link rel="stylesheet"
            href="{{ dsld_get_base_URL() }}public/build/{{ $manifest['resources/css/responsive.css']['file'] }}">
    @else
        @vite(['resources/css/style.css', 'resources/css/responsive.css'])

    @endproduction

    @production

        @php

            $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);

        @endphp

        <script src="{{ dsld_get_base_URL() }}public/build/{{ $manifest['resources/js/app.js']['file'] }}"></script>
    @else
        @vite(['resources/js/app.js'])

    @endproduction

    <script src="{{ dsld_static_asset('assets/js/jquery.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script src="{{ dsld_static_asset('backend/assets/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>

    <script src="{{ dsld_static_asset('frontend/js/dsld_custom_js.js') }}"></script>
    @yield('header')

</head>

<body>
    <style>
        .activeD {
            position: relative;
        }

        .loader-area {

            position: absolute;

            text-align: center;

            width: 100%;

            top: 0px;

            height: 100%;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #ffffffc7;

        }

        .loader {

            width: 48px;

            height: 48px;

            border: 3px dotted #cd280e;

            border-style: solid solid dotted dotted;

            border-radius: 50%;

            display: inline-block;

            position: relative;

            box-sizing: border-box;

            animation: rotation 2s linear infinite;

        }

        .loader::after {

            content: '';

            box-sizing: border-box;

            position: absolute;

            left: 0;

            right: 0;

            top: 0;

            bottom: 0;

            margin: auto;

            border: 3px dotted #f3735f;

            border-style: solid solid dotted;

            width: 24px;

            height: 24px;

            border-radius: 50%;

            animation: rotationBack 1s linear infinite;

            transform-origin: center center;

        }



        @keyframes rotation {

            0% {

                transform: rotate(0deg);

            }

            100% {

                transform: rotate(360deg);

            }

        }

        @keyframes rotationBack {

            0% {

                transform: rotate(0deg);

            }

            100% {

                transform: rotate(-360deg);

            }

        }

        .breed_card img {

            border: 1px solid #e3e3e3;

            padding: 10px;

            height: 93px;

            width: 100px;

            object-fit: contain;

            margin-bottom: 10px;

        }

        input[type='radio'] {
            accent-color: #F3735FA8;

        }

        input[type='radio']:checked::before {
            background: #F3735FA8;
            border: 2px #F3735FA8 solid;
            box-shadow: inset 0 0 0 2px #F3735FA8;
        }
    </style>

    <section class="idx-setting">

        <div class="container">

            <div class="row">

                <div class="col-lg-4">

                    <div class="set_left_sec">

                        <div class="sl_title">

                            <h3>Settings</h3>

                        </div>

                        <div class="sl_serach">

                            <div class="sl_serach_box">

                                <span class="sl_serach_icon">

                                    <img src="{{ dsld_static_asset('assets/images/Icon-feather-search.svg') }}"
                                        alt="" />

                                </span>

                                <input type="search" placeholder="Search" name="" id="" />

                            </div>

                        </div>

                        <div class="sl_menu">

                            <!-- Nav tabs -->

                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                <li class="sl_menu_title">

                                    <span>Location</span>

                                </li>

                                <!-- Location -->

                                <li class="nav-item" role="presentation">

                                    <div class="nav-item-inner">

                                        <div class="nav-item-inner-loc">

                                            <a href="#">

                                                <span>Current location</span>

                                                <span>

                                                    <span class="current___location_set">Gurugram, IN</span>

                                                    <!-- <span id="city"></span> -->

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </a>

                                        </div>

                                    </div>

                                </li>

                                <!-- End Loctaion -->

                                <li class="sl_menu_title">

                                    <span>Account informations</span>

                                </li>

                                <!-- Edit Profile -->

                                <li class="nav-item" role="presentation">

                                    <div class="nav-item-inner">

                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile" type="button" role="tab"
                                            aria-controls="profile" aria-selected="false">

                                            <div class="nav-item-inner-inline">

                                                <span>Edit Profile</span>

                                                <span>

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </div>

                                        </button>

                                    </div>

                                </li>

                                <!-- End Edit Profile -->

                                <!-- Personal Information -->

                                <li class="nav-item" role="presentation">

                                    <div class="nav-item-inner">

                                        <button class="nav-link " id="personal-tab" data-bs-toggle="tab"
                                            data-bs-target="#personal" type="button" role="tab"
                                            aria-controls="personal" aria-selected="false">

                                            <div class="nav-item-inner-inline">

                                                <span>Personal Information</span>

                                                <span>

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </div>

                                        </button>

                                    </div>

                                </li>

                                <!-- End Personal Information -->

                                <!-- Account management -->

                                <li class="nav-item" role="presentation">

                                    <div class="nav-item-inner">

                                        <button class="nav-link" id="management-tab" data-bs-toggle="tab"
                                            data-bs-target="#management" type="button" role="tab"
                                            aria-controls="management" aria-selected="false">

                                            <div class="nav-item-inner-inline">

                                                <span>Account management</span>

                                                <span>

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </div>

                                        </button>

                                    </div>

                                </li>

                                <!-- ENd Account management -->

                                <!-- Notification -->

                                <li class="nav-item" role="presentation">

                                    <div class="nav-item-inner">

                                        <button class="nav-link " id="notification-tab" data-bs-toggle="tab"
                                            data-bs-target="#notification" type="button" role="tab"
                                            aria-controls="notification" aria-selected="false">

                                            <div class="nav-item-inner-inline">

                                                <span>Notification</span>

                                                <span>

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </div>

                                        </button>

                                    </div>

                                </li>

                                <!-- End Notification -->

                                <!-- Privacy and data -->

                                <li class="nav-item" role="presentation">

                                    <div class="nav-item-inner">

                                        <button class="nav-link" id="privacyanddata-tab" data-bs-toggle="tab"
                                            data-bs-target="#privacyanddata" type="button" role="tab"
                                            aria-controls="privacyanddata" aria-selected="false">

                                            <div class="nav-item-inner-inline">

                                                <span>Privacy and data</span>

                                                <span>

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </div>

                                        </button>

                                    </div>

                                </li>

                                <!-- End Privacy and data -->

                                <!-- Security and log ins -->

                                <li class="nav-item" role="presentation">

                                    <div class="nav-item-inner">

                                        <button class="nav-link" id="securityandlog-tab" data-bs-toggle="tab"
                                            data-bs-target="#securityandlog" type="button" role="tab"
                                            aria-controls="securityandlog" aria-selected="false">

                                            <div class="nav-item-inner-inline">

                                                <span>Security and log ins</span>

                                                <span>

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </div>

                                        </button>

                                    </div>

                                </li>

                                <!-- End Security and log ins -->

                                <li class="sl_menu_title">

                                    <span>Action</span>

                                </li>

                                <!-- Add Dog Account -->

                                <li class="nav-item" role="presentation">

                                    <div class="nav-item-inner">

                                        <button onclick="popupopen()" class="nav-link active" id="adddogaccount-tab"
                                            data-bs-toggle="tab" data-bs-target="#adddogaccount" type="button"
                                            role="tab" aria-controls="adddogaccount" aria-selected="true">

                                            <div class="nav-item-inner-inline">

                                                <span>Add Dog Account</span>

                                                <span>

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </div>

                                        </button>

                                        <!-- </button> -->

                                    </div>

                                </li>

                                <!-- End Add Dog Account -->

                                <li class="sl_menu_title">

                                    <span>Support</span>

                                </li>

                                <!-- Get Help -->

                                <li class="nav-item" role="presentation">

                                    <div class="nav-item-inner">

                                        <button class="nav-link" id="gethelp-tab" data-bs-toggle="tab"
                                            data-bs-target="#gethelp" type="button" role="tab"
                                            aria-controls="gethelp" aria-selected="false">

                                            <div class="nav-item-inner-inline">

                                                <span>Get Help</span>

                                                <span>

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </div>

                                        </button>

                                    </div>

                                </li>

                                <!-- End Get Help -->

                                <!-- Terms of service -->

                                <li class="nav-item" role="presentation">

                                    <div class="nav-item-inner">

                                        <button class="nav-link" id="termsandservice-tab" data-bs-toggle="tab"
                                            data-bs-target="#termsandservice" type="button" role="tab"
                                            aria-controls="termsandservice" aria-selected="false">

                                            <div class="nav-item-inner-inline">

                                                <span>Terms of service</span>

                                                <span>

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </div>

                                        </button>

                                    </div>

                                </li>

                                <!-- End Terms of service -->

                                <!-- Privacy Policy -->

                                <li class="nav-item" role="presentation">

                                    <div class="nav-item-inner">

                                        <button class="nav-link" id="privacypolicy-tab" data-bs-toggle="tab"
                                            data-bs-target="#privacypolicy" type="button" role="tab"
                                            aria-controls="privacypolicy" aria-selected="false">

                                            <div class="nav-item-inner-inline">

                                                <span>Privacy Policy</span>

                                                <span>

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </div>

                                        </button>

                                    </div>

                                </li>

                                <!-- End Privacy Policy -->

                                <!-- About -->

                                <li class="nav-item" role="presentation">

                                    <div class="nav-item-inner">

                                        <button class="nav-link" id="about-tab" data-bs-toggle="tab"
                                            data-bs-target="#about" type="button" role="tab"
                                            aria-controls="about" aria-selected="false">

                                            <div class="nav-item-inner-inline">

                                                <span>About</span>

                                                <span>

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </div>

                                        </button>

                                    </div>

                                </li>

                                <!-- End About -->

                            </ul>

                        </div>

                    </div>

                </div>

                <div class="col-lg-8">

                    <!-- Tab panes -->

                    <div class="tab-content">

                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            <div class="sr_main_sec">

                                <div class="sr_top_contain">

                                    <div class="sr_title">

                                        <h3>Edit Profile</h3>

                                    </div>

                                </div>

                                <div class="sl__main_image_contain">

                                    <div class="row">

                                        <div class="col-md-12">

                                            <div class="sl__main_image_edit_profile text-center">

                                                <img src="{{ dsld_static_asset('assets/images/user_main_img.png') }}"
                                                    alt="images">
                                                <a href="#" class="e_profile_input"> <i
                                                        class="fa-solid fa-pen"></i>
                                                    <input type="file" id="profile_img">
                                                </a>


                                            </div>

                                        </div>



                                    </div>

                                </div>

                                <div class="sl___input_container">

                                    <div class="sl___input_container__name">

                                        <label for="">Parent Name</label>

                                        <input type="text" name="name" id="name"
                                            @if ($userDetails) value="{{ $userDetails->name }}" @endif>

                                    </div>

                                    <div class="sl___input_container__name" id="email_div">

                                        <label for=""> Email Address</label>

                                        <input type="text"
                                            @if (filter_var($userDetails->email, FILTER_VALIDATE_EMAIL)) value="{{ $userDetails->email }}" @else value="" @endif
                                            id="email" placeholder="Enter your email id">
                                        {{-- @if (isset($userDetails->email)) --}}
                                        {{-- <a href="#" class="verify_mail">verified</a>
                    @else --}}
                                        <a href="#" onclick="verifyEmail();" class="verify_mail">verify</a>
                                        {{-- @endif --}}
                                    </div>

                                    <div class="sl___input_container__name">

                                        <label for=""> Registered Mobile</label>

                                        <input type="text"
                                            @if (is_numeric($userDetails->phone)) value="{{ $userDetails->phone }}" @else value="" @endif id="phone">
                                        <span class="verify_no"><i class="fas fa-check"></i></span>

                                    </div>


                                    <div class="sl___input_container__name">
                                        <label for="">Enter Your Age</label>
                                    </div>
                                    <div class="row">
                                        @if (isset($userDetails->dob))
                                            @php
                                                $dob = explode('-', $userDetails->dob);
                                            @endphp
                                        @endif
                                        <div class="sl__input_birth">
                                            <select name="date" id="date" onchange="findAge()"
                                                class="form-control form-select form-select-sm">
                                                <option value="">Select Days</option>
                                                @for ($i = 1; $i <= 31; $i++)
                                                    <option value="{{ $i }}"
                                                        {{ $dob[2] == $i ? 'selected' : '' }}><?php echo $i; ?>
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>


                                        <div class="sl__input_month">
                                            <select name="month" id="month" onchange="findAge()"
                                                class="form-control form-select form-select-sm" placeholder="Month">
                                                <option value="">Select Month</option>
                                                @for ($i = 1; $i <= 12; $i++)
                                                    {{ $month_name = date('F', mktime(0, 0, 0, $i, 1, 2011)) }}
                                                    <option value="{{ $i }}"
                                                        {{ $dob[1] == $i ? 'selected' : '' }}>{{ $month_name }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>


                                        <div class="sl__input_year">
                                            <select name="year" id="year" onchange="findAge()"
                                                class="form-control form-select form-select-sm">
                                                <option value="">Year</option>
                                                @for ($i = date('Y'); $i >= date('Y') - 120; $i--)
                                                    <option value="{{ $i }}"
                                                        {{ $dob[0] == $i ? 'selected' : '' }}>{{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>


                                        <div class="sl__input_age">
                                            <input type="text" name="age" id="age"
                                                @if ($userDetails) value="{{ $userDetails->age }}" @endif />
                                            <input type="hidden" name="dob" id="dob"
                                                @if ($userDetails) value="{{ $userDetails->dob }}" @endif />

                                        </div>

                                    </div>

                                    <div class="sl___input_container__radio_main">

                                        <label>Select Gender<span>*</span></label>

                                        <div class="sl___inputed_sub_contain">

                                            <div class="sl___input_container__radio_sub">

                                                <input type="radio" id="male" name="gender" value="1"
                                                    {{ $userDetails->gender == 1 ? 'checked' : '' }}>
                                                <label for="male"> Male</label>

                                            </div>

                                            <div class="sl___input_container__radio_sub">



                                                <input type="radio" id="female" name="gender" value="2"
                                                    {{ $userDetails->gender == 2 ? 'checked' : '' }}>

                                                <label for="female">Female</label>

                                            </div>

                                            <div class="sl___input_container__radio_sub">



                                                <input type="radio" id="nonBinaryy" name="gender" value="3"
                                                    {{ $userDetails->gender == 3 ? 'checked' : '' }}>

                                                <label for="nonBinary">non binary</label>

                                            </div>

                                        </div>

                                        <div class="sl___input_container__name">

                                            <label for=""> Select Location</label>

                                            <input type="taxt"
                                                value="Unit No. 58, Hartron Complex, Electronic City, Phase IV...…….">

                                        </div>

                                        <div class="sl___input_submit__btn" id="profile_submit">

                                            <button onclick="updateUserProfile();">Save Changes</button>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- Personal -->

                        <div class="tab-pane " id="personal" role="tabpanel" aria-labelledby="personal-tab">

                            <div class="sr_main_sec">

                                <div class="sr_top_contain">

                                    <div class="sr_title">

                                        <h3>Personal information</h3>

                                    </div>

                                    <div class="sr_pra">

                                        <p>

                                            Edit your basic personal info to improve

                                            recommendations. This information is private and won't

                                            be visible in your public profile.

                                        </p>

                                    </div>

                                </div>

                                <div class="sr_main_contain">

                                    <h4>Your personal information</h4>

                                    <ul class="sr_main_ul">

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sr_main_input_label">Age</span>

                                                <span class="sr_main_input_sub">

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </a>

                                        </li>

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sr_main_input_label">Gender</span>

                                                <span class="sr_main_input_sub">

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </a>

                                        </li>

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sr_main_input_label">Country/region</span>

                                                <span class="sr_main_input_sub">

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </a>

                                        </li>

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sr_main_input_label">Language</span>

                                                <span class="sr_main_input_sub">

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </a>

                                        </li>

                                    </ul>

                                </div>

                            </div>



                        </div>

                        <!--End Personal  -->

                        <!-- management -->

                        <div class="tab-pane" id="management" role="tabpanel" aria-labelledby="management-tab">

                            <div class="sr_main_sec">

                                <div class="sr_top_contain">

                                    <div class="sr_title">

                                        <h3>Account management</h3>

                                    </div>

                                    <div class="sr_pra">

                                        <p>

                                            Make changes to your email address. This information is

                                            private and won't be visible on your public profile

                                        </p>

                                    </div>

                                </div>

                                <div class="sr_main_contain">

                                    <ul class="sr_main_ul">

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label">Email adddress</span>

                                                <span class="sr_main_input_sub">

                                                    <span class="sr_main_btn sr_main_btn_clr">Add</span>

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </a>

                                        </li>

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label">Phone Number</span>

                                                <span class="sr_main_input_sub">

                                                    <span class="sr_main_btn">+91 8171882084</span>

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </a>

                                        </li>

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label">

                                                    <div>App sounds</div>

                                                    <p>Turn on app sounds from the Dwiggy Doo app</p>

                                                </span>

                                                <span class="sr_main_input_sub">

                                                    <input type="checkbox" checked>

                                                </span>

                                            </a>

                                        </li>

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label">

                                                    <div>Connect contacts</div>

                                                    <p>To help people</p>

                                                </span>

                                                <span class="sr_main_input_sub">

                                                    <input type="checkbox" checked>

                                                </span>

                                            </a>

                                        </li>

                                        <li class="sr_main_input">

                                            <h4 class="sr_main_sub_title">Dog Account</h4>

                                        </li>

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label"> Dog Name </span>

                                                <span class="sr_main_input_sub">

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </a>

                                        </li>

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label"> Dog Name </span>

                                                <span class="sr_main_input_sub">

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </a>

                                        </li>

                                        <li class="sr_main_input">

                                            <h4 class="sr_main_sub_title">General Preferences</h4>

                                        </li>

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label">Language</span>

                                                <span class="sr_main_input_sub">

                                                    <span class="sr_main_btn">English(UK)</span>

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </a>

                                        </li>

                                        <li class="sr_main_input">

                                            <h4 class="sr_main_sub_title">Account changes</h4>

                                        </li>

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label">

                                                    <div>Deactivate account</div>

                                                    <p>Deactivate to temporarily hide your profile</p>

                                                </span>

                                                <span class="sr_main_input_sub">

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </a>

                                        </li>

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label">

                                                    <div>Delete your data and account</div>

                                                    <p>Delete your data and account</p>

                                                </span>

                                                <span class="sr_main_input_sub">

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </a>

                                        </li>

                                    </ul>

                                </div>

                            </div>



                        </div>

                        <!-- End management -->

                        <!-- Notification -->

                        <div class="tab-pane " id="notification" role="tabpanel" aria-labelledby="notification-tab">

                            <div class="sr_main_sec">

                                <div class="sr_top_contain">

                                    <div class="sr_title">

                                        <h3>Notification</h3>

                                    </div>

                                </div>

                                <div class="sr_main_contain">

                                    <ul class="sr_main_ul">

                                        <li class="sr_main_input_radio">

                                            <h4>Recently uploaded reels</h4>

                                            <div class="sl_main_radio_box">

                                                <div class="sl_main_input_radio">

                                                    <label for="off">Off</label>

                                                    <input type="radio" id="off" name="fav_language"
                                                        value="HTML">

                                                </div>

                                                <div class="sl_main_input_radio">

                                                    <label for="on">On</label>

                                                    <input type="radio" id="on" name="fav_language"
                                                        value="HTML">

                                                </div>



                                            </div>

                                        </li>

                                        <li class="sr_main_input_radio">

                                            <h4>Message</h4>

                                            <div class="sl_main_radio_box">

                                                <div class="sl_main_input_radio">

                                                    <label for="off">Off</label>

                                                    <input type="radio" id="off" name="fav_language"
                                                        value="HTML">

                                                </div>

                                                <div class="sl_main_input_radio">

                                                    <label for="on">On</label>

                                                    <input type="radio" id="on" name="fav_language"
                                                        value="HTML">

                                                </div>



                                            </div>

                                        </li>

                                        <li class="sr_main_input_radio">

                                            <h4>Add friend</h4>

                                            <div class="sl_main_radio_box">

                                                <div class="sl_main_input_radio">

                                                    <label for="off">Off</label>

                                                    <input type="radio" id="off" name="fav_language"
                                                        value="HTML">

                                                </div>

                                                <div class="sl_main_input_radio">

                                                    <label for="on">On</label>

                                                    <input type="radio" id="on" name="fav_language"
                                                        value="HTML">

                                                </div>



                                            </div>

                                        </li>

                                        <li class="sr_main_input_radio">

                                            <h4>Accepted friend request</h4>

                                            <div class="sl_main_radio_box">

                                                <div class="sl_main_input_radio">

                                                    <label for="off">Off</label>

                                                    <input type="radio" id="off" name="fav_language"
                                                        value="HTML">

                                                </div>

                                                <div class="sl_main_input_radio">

                                                    <label for="on">On</label>

                                                    <input type="radio" id="on" name="fav_language"
                                                        value="HTML">

                                                </div>



                                            </div>

                                        </li>

                                        <li class="sr_main_input">

                                            <h4 class="sr_main_sub_title">Email Notification</h4>

                                        </li>



                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label">

                                                    <div>Feedback emails</div>

                                                    <p>Give feedback on Dwiggy Doo</p>

                                                </span>

                                                <span class="sr_main_input_sub">

                                                    <input type="checkbox" checked>

                                                </span>

                                            </a>

                                        </li>

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label">

                                                    <div>New emails</div>

                                                    <p>Learn about the new Dwiggy Doo features</p>

                                                </span>

                                                <span class="sr_main_input_sub">

                                                    <input type="checkbox" checked>

                                                </span>

                                            </a>

                                        </li>

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label">

                                                    <div>Support emails</div>

                                                    <p>Get updates on reports and violations of our Community Guidelines
                                                    </p>

                                                </span>

                                                <span class="sr_main_input_sub">

                                                    <input type="checkbox" checked>

                                                </span>

                                            </a>

                                        </li>

                                    </ul>

                                </div>

                            </div>



                        </div>

                        <!-- End Notification -->

                        <!-- Privacy and data -->

                        <div class="tab-pane" id="privacyanddata" role="tabpanel"
                            aria-labelledby="privacyanddata-tab">

                            <div class="sr_main_sec">

                                <div class="sr_top_contain">

                                    <div class="sr_title">

                                        <h3>Privacy and data</h3>

                                    </div>

                                </div>

                                <div class="sr_main_contain">

                                    <ul class="sr_main_ul">

                                        <li class="sr_main_input">

                                            <h4 class="sr_main_sub_title">Search</h4>

                                        </li>





                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label">

                                                    <div>Search history</div>

                                                    <p>Clear all previous searches performed on Dwiggy Doo</p>

                                                </span>

                                                <span class="sr_main_input_sub">

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </a>

                                        </li>

                                        <li class="sr_main_input">

                                            <h4 class="sr_main_sub_title">People Find</h4>

                                        </li>

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label">Who can send you friend
                                                    request?</span>

                                                <span class="sr_main_input_sub">

                                                    <span class="sr_main_btn">Everyone</span>

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </a>

                                        </li>

                                        <li class="sr_main_input">

                                            <h4 class="sr_main_sub_title">Posts</h4>

                                        </li>

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label">Who can see your future posts?</span>

                                                <span class="sr_main_input_sub">

                                                    <span class="sr_main_btn">Everyone</span>

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </a>

                                        </li>

                                        <li class="sr_main_input">

                                            <h4 class="sr_main_sub_title">Reels</h4>

                                        </li>

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label">Reels default audience</span>

                                                <span class="sr_main_input_sub">

                                                    <span class="sr_main_btn">Everyone</span>

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </a>

                                        </li>

                                        <li class="sr_main_input">

                                            <h4 class="sr_main_sub_title">Active Status</h4>

                                        </li>

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label">Show when you're active</span>

                                                <span class="sr_main_input_sub">

                                                    <input type="checkbox" checked>

                                                </span>

                                            </a>

                                        </li>

                                        <li class="sr_main_input">

                                            <h4 class="sr_main_sub_title">Manage the account, words that yu have muted
                                                or blocked</h4>

                                        </li>

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label">Your connection</span>

                                                <span class="sr_main_input_sub">

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </a>

                                        </li>

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label">Block account</span>

                                                <span class="sr_main_input_sub">

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </a>

                                        </li>

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label">Muted account</span>

                                                <span class="sr_main_input_sub">

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </a>

                                        </li>

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label">Muted words</span>

                                                <span class="sr_main_input_sub">

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </a>

                                        </li>

                                    </ul>

                                </div>

                            </div>



                        </div>

                        <!-- End Privacy and data -->

                        <!-- Security and log ins -->

                        <div class="tab-pane" id="securityandlog" role="tabpanel"
                            aria-labelledby="securityandlog-tab">

                            <div class="sr_main_sec">

                                <div class="sr_top_contain">

                                    <div class="sr_title">

                                        <h3>Security and log ins</h3>

                                    </div>

                                    <div class="sr_pra">

                                        <p>

                                            Include additional security such as turning on two-factor authentication and
                                            checking your list of connected devices to keep your account safe.

                                        </p>

                                    </div>

                                </div>

                                <div class="sr_main_contain">

                                    <ul class="sr_main_ul">

                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label">

                                                    <div>Two step verification</div>

                                                    <p>Secure your Dwiggy Doo account with two-step verification</p>

                                                </span>

                                                <span class="sr_main_input_sub">

                                                    <input type="checkbox">

                                                </span>

                                            </a>

                                        </li>

                                        <li class="sr_main_input__list">

                                            <ul class="sr_main_input__list_ul">

                                                <li class="sr_main_input">

                                                    <h4 class="sr_main_sub_title">Login</h4>

                                                </li>

                                                <li class="sr_main_input">

                                                    <a class="sr_main_input___parant" href="#">

                                                        <span class="sl_main_input_label">Email adddress</span>

                                                        <span class="sr_main_input_sub">

                                                            <span class="sr_main_btn sr_main_btn_clr">Add</span>

                                                            <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                        </span>

                                                    </a>

                                                </li>

                                                <li class="sr_main_input">

                                                    <a class="sr_main_input___parant" href="#">

                                                        <span class="sl_main_input_label">Phone Number</span>

                                                        <span class="sr_main_input_sub">

                                                            <span class="sr_main_btn">+91 8171882084</span>

                                                            <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                        </span>

                                                    </a>

                                                </li>

                                            </ul>

                                        </li>



                                        <li class="sr_main_input__list">

                                            <ul class="sr_main_input__list_ul">

                                                <li class="sr_main_input">

                                                    <h4 class="sr_main_sub_title">Login Option</h4>

                                                </li>

                                                <li class="sr_main_input">

                                                    <a class="sr_main_input___parant" href="#">

                                                        <span class="sl_main_input_label">Google</span>

                                                        <span class="sr_main_input_sub">

                                                            <input type="checkbox">

                                                        </span>

                                                    </a>

                                                </li>

                                                <li class="sr_main_input">

                                                    <a class="sr_main_input___parant" href="#">

                                                        <span class="sl_main_input_label">Facebook</span>

                                                        <span class="sr_main_input_sub">

                                                            <input type="checkbox">

                                                        </span>

                                                    </a>

                                                </li>

                                                <li class="sr_main_input">

                                                    <a class="sr_main_input___parant" href="#">

                                                        <span class="sl_main_input_label">Apple</span>

                                                        <span class="sr_main_input_sub">

                                                            <input type="checkbox">

                                                        </span>

                                                    </a>

                                                </li>

                                            </ul>

                                        </li>

                                        <li class="sr_main_input__list">

                                            <ul class="sr_main_input__list_ul">

                                                <li class="sr_main_input sr_main_input__flx">

                                                    <h4 class="sr_main_sub_title">Where you're logged in</h4>

                                                    <h5 class="sr_main_sub_title_view"><a href="#">View all</a>
                                                    </h5>

                                                </li>

                                                <li class="sr_main_input">

                                                    <ul class="sr_main_input___ul_list">

                                                        <li class="sr_main_input___ul_list__li">

                                                            <div
                                                                class="sr_main_input___parant sr_main_input___parant_colm">

                                                                <div class="sl_main_input_label">Chrome on window <span
                                                                        class="sl_main_input_label__activenow">Active
                                                                        Now</span></div>

                                                                <div class="sl_main_input_label_adress">

                                                                    <p>Gurgaon, Haryana, India</p>

                                                                    <p>7 January at 14:31</p>

                                                                </div>



                                                            </div>

                                                        </li>

                                                        <li class="sr_main_input___ul_list__li">

                                                            <div
                                                                class="sr_main_input___parant sr_main_input___parant_colm">

                                                                <div class="sl_main_input_label">Chrome on window</div>

                                                                <div class="sl_main_input_label_adress">

                                                                    <p>Gurgaon, Haryana, India</p>

                                                                    <p>7 January at 14:31</p>

                                                                </div>



                                                            </div>

                                                        </li>

                                                    </ul>



                                                </li>



                                            </ul>

                                        </li>



                                        <li class="sr_main_input">

                                            <a class="sr_main_input___parant" href="#">

                                                <span class="sl_main_input_label">

                                                    <div>App lock</div>

                                                    <p>make access to your app more secure</p>

                                                </span>

                                                <span class="sr_main_input_sub">

                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                                </span>

                                            </a>

                                        </li>

                                    </ul>

                                </div>

                            </div>



                        </div>

                        <!--End Security and log ins -->

                        <!-- Add Dog Account -->

                        <div class="tab-pane active" id="adddogaccount" role="tabpanel"
                            aria-labelledby="adddogaccount-tab">



                            <div class="sr_main_sec">

                                <div class="sr_top_contain">

                                    <div class="sr_title">

                                        <h3>Add Dog Account</h3>

                                    </div>

                                </div>

                                <div class="sl__main_image_contain">

                                    <div class="row">

                                        <div class="col-md-4">

                                            <div class="sl__main_image_contain_left">

                                                <label for="img-1" class="add_dog-preview"></label>
                                                <input type="file" id="img-1" class="add_dog-preview-src">
                                                <img src="{{ dsld_static_asset('assets/images/add.svg') }}"
                                                    alt="">
                                            </div>

                                        </div>





                                        <div class="col-md-8">

                                            <div class="row">

                                                <div class="col-md-6">

                                                    <div class="sl__main_image_contain_left_inner">

                                                        <label for="img-1" class="add_dog-preview-1"></label>
                                                        <input type="file" id="img-1"
                                                            class="add_dog-preview-src-1">
                                                        <img src="{{ dsld_static_asset('assets/images/add.svg') }}"
                                                            alt="">

                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="sl__main_image_contain_left_inner">

                                                        <label for="img-1" class="add_dog-preview-2"></label>
                                                        <input type="file" id="img-1"
                                                            class="add_dog-preview-src-2">
                                                        <img src="{{ dsld_static_asset('assets/images/add.svg') }}"
                                                            alt="">

                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="sl__main_image_contain_left_inner">

                                                        <label for="img-1" class="add_dog-preview-3"></label>
                                                        <input type="file" id="img-1"
                                                            class="add_dog-preview-src-3">
                                                        <img src="{{ dsld_static_asset('assets/images/add.svg') }}"
                                                            alt="">

                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="sl__main_image_contain_left_inner">

                                                        <label for="img-1" class="add_dog-preview-4"></label>
                                                        <input type="file" id="img-1"
                                                            class="add_dog-preview-src-4">
                                                        <img src="{{ dsld_static_asset('assets/images/add.svg') }}"
                                                            alt="">

                                                    </div>

                                                </div>

                                            </div>



                                            <!-- <div class="verify-sub-box">

                          <div class="file-loading">

                              <input id="multiplefileupload" type="file" accept=".jpg,.gif,.png" multiple>

                           </div>

                       </div> -->

                                        </div>

                                    </div>

                                </div>

                                <div class="sl___input_container">

                                    <div class="sl___input_container__name">

                                        <label for=""> Dog name <span>*</span></label>

                                        <input type="text" value="Dwiggy Doo">

                                    </div>

                                    <div class="sl___input_container__name">

                                        <label for=""> Age</label>

                                        <input type="text" value="1 year 11 months">

                                    </div>

                                    <div class="sl___input_container__name dog_breed_setting">

                                        <label for=""> Enter your dog's breed</label>

                                        <input type="taxt">
                                        <span><i class="fa-solid fa-angle-right"></i></span>

                                    </div>

                                    <div class="sl___input_container__radio_main">

                                        <label>Select Gender<span>*</span></label>

                                        <div class="sl___inputed_sub_contain">

                                            <div class="sl___input_container__radio_sub">

                                                <input type="radio" id="dmale" name="fav_language"
                                                    value="Male" checked>
                                                <label for="male"> Male</label>

                                            </div>

                                            <div class="sl___input_container__radio_sub">



                                                <input type="radio" id="dfemale" name="fav_language"
                                                    value="Female">

                                                <label for="female">Female</label>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="sl___input_container__select_main">

                                        <label>Select Good genes<span>*</span></label>

                                        <div class="sl___input_container__select_sub">

                                            <button type="button" class="btn selct_btn_add" data-bs-toggle="modal"
                                                data-bs-target="#myselector"><img
                                                    src="{{ dsld_static_asset('assets/images/add.svg') }}"
                                                    alt=""><span>Add More</span></button>

                                        </div>

                                    </div>

                                    <div class="sl___input_container__name">

                                        <label for=""> Select Location</label>

                                        <input type="taxt"
                                            value="Unit No. 58, Hartron Complex, Electronic City, Phase IV...…….">

                                    </div>

                                    <div class="sl___input_submit__btn">

                                        <button>Save Changes</button>

                                    </div>

                                    <div class="sl___input_submit__btn">

                                        <button data-bs-toggle="modal" data-bs-target="#addDog">Add Dog</button>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- selector -->

                        <!-- The Modal -->

                        <div class="modal" id="myselector">

                            <div class="modal-dialog">

                                <div class="modal-content">

                                    <div class="modal-header">

                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                                    </div>

                                    <!-- Modal body -->

                                    <div class="modal-body">

                                        <div>
                                            <div class=" dog_name pb-3 mb-2">
                                                <div class="modal_gene_wrap">
                                                    <label for="" class="form-label">Select Good Genes</label>
                                                    <p id="genes_no">0/5 Selected</p>
                                                </div>
                                                <div class=" multiselect_breed">
                                                    <div class="gene col">
                                                        <label for="gene1">LOVE KIDS</label>
                                                        <input type="checkbox" name="gens[]" id="gene1" />
                                                    </div>
                                                    <div class="gene col">
                                                        <label for="gene2">SMART & QUICK</label>
                                                        <input type="checkbox" name="gens[]" id="gene2" />
                                                    </div>
                                                    <div class="gene col">
                                                        <label for="gene3">LOVER</label>
                                                        <input type="checkbox" name="gens[]" id="gene3" />
                                                    </div>
                                                    <div class="gene col">
                                                        <label for="gene4">UNCONDITIONAL</label>
                                                        <input type="checkbox" name="gens[]" id="gene4" />
                                                    </div>
                                                    <div class="gene col">
                                                        <label for="gene5">LOW MANTAINANCE</label>
                                                        <input type="checkbox" name="gens[]" id="gene5" />
                                                    </div>
                                                    <div class="gene col">
                                                        <label for="gene6">CALM & CLEVER</label>
                                                        <input type="checkbox" name="gens[]" id="gene6" />
                                                    </div>
                                                    <div class="gene col">
                                                        <label for="gene7">TRUSTWORTHY</label>
                                                        <input type="checkbox" name="gens[]" id="gene7" />
                                                    </div>
                                                    <div class="gene col">
                                                        <label for="gene8">PARTY CRASHER</label>
                                                        <input type="checkbox" name="gens[]" id="gene8" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                    <!-- Modal footer -->

                                    <div class="modal-footer genes_modal_footer">

                                        <button type="button" class="btn btn-save"
                                            data-bs-dismiss="modal">Save</button>

                                    </div>



                                </div>

                            </div>

                        </div>

                        <!-- End Selector -->

                        <!-- The Modal -->

                        <div class="modal" id="verifyModal">

                            <div class="modal-dialog">

                                <div class="modal-content">



                                    <!-- Modal Header -->

                                    <div class="modal-header-row">

                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            id="closeModal"></button>

                                    </div>



                                    <!-- Modal body -->

                                    <div class="modal-body mail_modal_section">
                                        <div class="mail-icon">
                                            <img src="{{ dsld_static_asset('assets/images/email_icon.png') }}"
                                                alt="verify email" class="img-fluid" />
                                        </div>
                                        <div class="mail-verify-wrap">
                                            <h3>Verify your email</h3>
                                            <p>Please enter the 6 digit code sent to your <b>info123@gmail.com</b></p>
                                        </div>

                                        <form class="otp-verify email_otp" name="otp-verify" id="otp-verify">

                                            @csrf

                                            <input type="hidden" name="id" id="user_id"
                                                value="{{ Session::get('user_id') }}">

                                            <input class="otp-field" type="text" name="otp1" maxlength="1">

                                            <input class="otp-field" type="text" name="otp2" maxlength="1">

                                            <input class="otp-field" type="text" name="otp3" maxlength="1">

                                            <input class="otp-field" type="text" name="otp4" maxlength="1">

                                            <input class="otp-field" type="text" name="otp5" maxlength="1">

                                            <input class="otp-field" type="text" name="otp6" maxlength="1">

                                            <div class="verifyBtn">
                                                <button type="submit" class="btn">verify now</button>
                                                <p>Request new code in <b>00:19</b></p>
                                            </div>

                                        </form>


                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- End Modal  -->

                        <!-- Add Dog Modal -->

                        <div class="modal" id="addDog">

                            <div class="modal-dialog">

                                <div class="modal-content">



                                    <!-- Modal Header -->

                                    <div class="modal-header-row">

                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                                    </div>



                                    <!-- Modal body -->

                                    <div class="modal-body pt-0">
                                        <div class="add_dog_title">
                                            <h3>my dogs</h3>
                                        </div>
                                        <div class="dog_list">
                                            <ul>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <div class="dog_img">
                                                                <img src="{{ dsld_static_asset('assets/images/img-2.png') }}"
                                                                    alt="dog active" class="img-fluid" />
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="con_right_card">
                                                                <div class="card_dog_title">
                                                                    <h2>dog name</h2>
                                                                </div>
                                                                <div class="card_dog_breed">
                                                                    <div class="breed_title">
                                                                        <label>breed :</label>
                                                                    </div>
                                                                    <div class="dog_breed_type">
                                                                        <h4>golden r</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="card_gender_age_wrap">
                                                                    <div class="card_dog_gender">
                                                                        <div class="gender">
                                                                            <label for="">gender :</label>
                                                                        </div>
                                                                        <div class="gender_val">
                                                                            <h4>M</h4>
                                                                        </div>
                                                                        <span>&nbsp; | &nbsp;</span>
                                                                    </div>
                                                                    <div class="card_dog_gender">
                                                                        <div class="gender">
                                                                            <label for="">age :</label>
                                                                        </div>
                                                                        <div class="gender_val">
                                                                            <h4>25 months</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="dog_activeBtn">
                                                                <button class="activeDog dogSwitch">active</button>
                                                                <button class="dogDots"><i
                                                                        class="fa-solid fa-ellipsis-vertical"></i></button>
                                                                <div class="ellipses_submenu" style="display: none;">
                                                                    <ul>
                                                                        <li><span><i
                                                                                    class="fa-solid fa-pen"></i></span>
                                                                            edit dog profile</li>
                                                                        <li><span><i
                                                                                    class="fa-solid fa-trash"></i></span>
                                                                            delete</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <div class="dog_img">
                                                                <img src="{{ dsld_static_asset('assets/images/img-2.png') }}"
                                                                    alt="dog active" class="img-fluid" />
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="con_right_card">
                                                                <div class="card_dog_title">
                                                                    <h2>dog name</h2>
                                                                </div>
                                                                <div class="card_dog_breed">
                                                                    <div class="breed_title">
                                                                        <label>breed :</label>
                                                                    </div>
                                                                    <div class="dog_breed_type">
                                                                        <h4>golden r</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="card_gender_age_wrap">
                                                                    <div class="card_dog_gender">
                                                                        <div class="gender">
                                                                            <label for="">gender :</label>
                                                                        </div>
                                                                        <div class="gender_val">
                                                                            <h4>M</h4>
                                                                        </div>
                                                                        <span>&nbsp; | &nbsp;</span>
                                                                    </div>
                                                                    <div class="card_dog_gender">
                                                                        <div class="gender">
                                                                            <label for="">age :</label>
                                                                        </div>
                                                                        <div class="gender_val">
                                                                            <h4>25 months</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="dog_activeBtn">
                                                                <button class="activeDog">active</button>
                                                                <button class="dogDots"><i
                                                                        class="fa-solid fa-ellipsis-vertical"></i></button>
                                                                <div class="ellipses_submenu" style="display: none;">
                                                                    <ul>
                                                                        <li><span><i
                                                                                    class="fa-solid fa-pen"></i></span>
                                                                            edit dog profile</li>
                                                                        <li><span><i
                                                                                    class="fa-solid fa-trash"></i></span>
                                                                            delete</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="dog_addBtn text-center">
                                                <button><span><i class="fa-solid fa-plus"></i></span> Add Dog</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- End Modal  -->

                        <!-- End Add Dog Account -->

                        <!-- Add Dog Account -->

                        <div class="tab-pane" id="gethelp" role="tabpanel" aria-labelledby="gethelp-tab">

                            Get Help

                        </div>

                        <!--End Add Dog Account -->

                        <!-- Terms of service -->

                        <div class="tab-pane" id="termsandservice" role="tabpanel"
                            aria-labelledby="termsandservice-tab">

                            Terms of service

                        </div>

                        <!-- Terms of service -->

                        <!-- Privacy Policy -->

                        <div class="tab-pane" id="privacypolicy" role="tabpanel"
                            aria-labelledby="privacypolicy-tab">

                            Privacy Policy

                        </div>

                        <!--End Privacy Policy -->

                        <!-- About-->

                        <div class="tab-pane" id="about" role="tabpanel" aria-labelledby="about-tab">

                            About

                        </div>

                        <!--End About-->

                    </div>

                </div>

            </div>

        </div>
    </section>
    <script>
        const fileImage = document.querySelector('.add_dog-preview-src');
        const filePreview = document.querySelector('.add_dog-preview');

        fileImage.onchange = function() {
            const reader = new FileReader();

            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                filePreview.style.backgroundImage = "url(" + e.target.result + ")";
                filePreview.classList.add("has-image");
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };

        const fileImage1 = document.querySelector('.add_dog-preview-src-1');
        const filePreview1 = document.querySelector('.add_dog-preview-1');

        fileImage1.onchange = function() {
            const reader = new FileReader();

            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                filePreview1.style.backgroundImage = "url(" + e.target.result + ")";
                filePreview1.classList.add("has-image");
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };

        const fileImage2 = document.querySelector('.add_dog-preview-src-2');
        const filePreview2 = document.querySelector('.add_dog-preview-2');

        fileImage2.onchange = function() {
            const reader = new FileReader();

            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                filePreview2.style.backgroundImage = "url(" + e.target.result + ")";
                filePreview2.classList.add("has-image");
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };

        const fileImage3 = document.querySelector('.add_dog-preview-src-3');
        const filePreview3 = document.querySelector('.add_dog-preview-3');

        fileImage3.onchange = function() {
            const reader = new FileReader();

            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                filePreview3.style.backgroundImage = "url(" + e.target.result + ")";
                filePreview3.classList.add("has-image");
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };

        const fileImag4 = document.querySelector('.add_dog-preview-src-4');
        const filePreview4 = document.querySelector('.add_dog-preview-4');

        fileImag4.onchange = function() {
            const reader = new FileReader();

            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                filePreview4.style.backgroundImage = "url(" + e.target.result + ")";
                filePreview4.classList.add("has-image");
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };
    </script>

    <script>
        let geneAll = document.querySelectorAll(".gene input[type='checkbox']");
        let count = 0;
        let data = document.querySelector("#genes_no");

        geneAll.forEach((checkbox) => {
            checkbox.addEventListener("change", function() {

                var label = checkbox.parentElement.querySelector("label");
                if (checkbox.checked) {
                    label.classList.add("genActive")
                    alert(checkbox.checked)
                    count++;
                } else {
                    label.classList.remove("genActive");
                    count--;
                    alert(checkbox.checked)
                }
                let counter = count;
                data.innerHTML = counter + '/5 Selected';
            })
        })
    </script>

    <script>
        let subDots = document.querySelectorAll("li .dog_activeBtn .dogDots");
        console.log(subDots);
        let subData = document.querySelectorAll("li .dog_activeBtn .ellipses_submenu");
        console.log(subData);

        for (let index = 0; index < subDots.length; index++) {
            const element = subDots[index];
            element.addEventListener("click", function() {
                for (let j = 0; j < subData.length; j++) {
                    const element2 = subData[j];

                    if (index === j) {
                        if (element2.classList.contains("mydogActive")) {
                            element2.classList.remove("mydogActive");
                        } else {
                            element2.classList.add("mydogActive")
                        }

                    } else {
                        element2.classList.remove("mydogActive")
                    }


                }
            })
        }

        function findAge() {
            var date = $('#date').val();
            var month = $('#month').val();
            var year = $('#year').val();
            if (date != '' && month != '' && year != '') {
                var adob = year + '-' + month + '-' + date;
                dob = new Date(adob);
                var today = new Date();
                var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                $('#dob').val(adob);
                $('#age').val(age);

            }
        }

        function verifyEmail() {
            $('#email_div').append('<div class="loader-area"><span class="loader"></span></div>');
            let email = $('#email').val();
            console.log(email);
            let pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i

            let isValidEmail = pattern.test(email);

            if (!isValidEmail) {
                dsldFlashNotification('error', "Please enter valid and required fields.");
            } else {
                var token = "{{ Session::get('access_token') }}";
                var settings = {
                    "url": '{{ env('APP_URL') }}/api/v1/verify-email-update',
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        "Authorization": "Bearer " + token
                    },
                    "data": JSON.stringify({
                        "email": email,
                    }),
                };
                $.ajax(settings).done(function(response) {
                    if (response.success === true) {
                        $('#email_div').find('.loader-area').remove();
                        dsldFlashNotification('success', response.message);
                        $('#verifyModal').show();
                    } else {
                        dsldFlashNotification('error', response.message);
                    }
                });
            }
        }

        $('#otp-verify').submit(function(e) {

            e.preventDefault();


            var otp1 = $('input[name=otp1]').val();

            var otp2 = $('input[name=otp2]').val();

            var otp3 = $('input[name=otp3]').val();

            var otp4 = $('input[name=otp4]').val();

            var otp5 = $('input[name=otp5]').val();

            var otp6 = $('input[name=otp6]').val();

            var otp = otp1 + otp2 + otp3 + otp4 + otp5 + otp6;

            var email = $('#email').val();

            var token = "{{ Session::get('access_token') }}";

            var settings = {
                "url": "{{ env('APP_URL') }}/api/v1/update-verify-otp",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json",
                    "Authorization": "Bearer " + token
                },
                "data": JSON.stringify({
                    "otp": otp,
                    "email": email,
                }),
            };

            $.ajax(settings).done(function(response) {
                $('#otp-verify').parent().find('.loader-area').remove();
                if (response.success === true) {
                    $('#email_div').find('.loader-area').remove();
                    dsldFlashNotification('success', response.message);
                    $('#verifyModal').show();
                } else {
                    dsldFlashNotification('error', response.message);
                }


            });

        })

        $('#closeModal').on('click', function() {
            $('#verifyModal').hide();
        });

        function updateUserProfile() {
            $('#profile').append('<div class="loader-area"><span class="loader"></span></div>');
            let gender = '';
            let name = $('#name').val();
            let email = $('#email').val();
            let phone = $('#phone').val();
            let dob = $('#dob').val();
            let age = $('#age').val();

            var files = $('#profile_img')[0].files[0];

            if ($('#male').is(':checked')) {
                gender = 1;
            }
            if ($('#female').is(':checked')) {
                gender = 2;
            }
            if ($('#nonBinaryy').is(':checked')) {
                gender = 3;
            }
            let token = "{{ Session::get('access_token') }}";

            var form = new FormData();
            form.append("name", name);
            form.append("email", email);
            form.append("phone", phone);
            form.append("gender", gender);
            form.append("dob", dob);
            form.append("age", age);
            form.append("profile_image", files);

            var settings = {
                "url": "{{ env('APP_URL') }}/api/v1/user-update-profile",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Authorization": "Bearer "+token
                },
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form
            };

            $.ajax(settings).done(function(response) {
                let data = JSON.parse(response); 
                $('#profile').parent().find('.loader-area').remove();
                if (data.success == true) {
                    dsldFlashNotification('success', data.message);
                } else {
                    dsldFlashNotification('error', data.message);
                }
            });

        }
    </script>

    @yield('footer')

    @include('frontend.inc.custom_js')
</body>

</html>
