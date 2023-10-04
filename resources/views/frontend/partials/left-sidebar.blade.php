<div class="home_sidebar_sec">
         <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
               <div class="logo_sec text-center">
                    <a href="/index.php" class="navbar-brand">
                        @if(dsld_get_setting('dashboard_logo') > 0)
                            <img src="{{ dsld_uploaded_file_path(dsld_get_setting('site_logo')) }}" class="img-fluid">
                        @else
                            <img src="{{ dsld_static_asset('backend/assets/images/logo.svg') }}" alt="" class="img-fluid">
                        @endif
                    </a>
               </div>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse sidebar_doo" id="navbarSupportedContent">
                  <ul class="sidebar_menus ps-0 mb-0 home_sidebar_menu">
                     <li class="home nav-item"><a href="{{ route('home') }}" class="nav-link {{ dsld_is_route_active(['home'], 'active ') }}"><i class="fas fa-home"></i> <span class="menu_name">Home</span></a></li>
                     <li class="search nav-item"><a href="#" class="nav-link"><i class="fas fa-search"></i> <span class="menu_name">Search</span></a></li>
                     <li class="bread nav-item"><a href="{{ route('breeds.all') }}" class="nav-link {{ dsld_is_route_active(['breeds.all'], 'active') }}"><i class="fas fa-paw"></i> <span class="menu_name">All Bread</span></a></li>
                     <li class="reels nav-item"><a href="#" class="nav-link"><i class="far fa-play-circle"></i> <span class="menu_name">Reels</span></a></li>
                     <li class="message nav-item"><a href="#" class="nav-link"><i class="far fa-comment-dots"></i> <span class="menu_name">Message</span></a></li>
                     <li class="solution nav-item"><a href="#" class="nav-link"><i class="fas fa-hand-holding-heart"></i> <span class="menu_name">Your Solution</span></a></li>
                     <li class="connection nav-item"><a href="#" class="nav-link"><i class="fas fa-users"></i> <span class="menu_name">Their Connection</span></a></li>
                     <li class="notification nav-item"><a href="#" class="nav-link"><i class="far fa-bell"></i> <span class="menu_name">Notifications</span></a></li>
                     <li class="profile nav-item"><a href="#" class="nav-link"><span class="profile_icon">

                        @include('frontend.components.sessions.dogs.profile-image')
                  
                     </span> <span class="menu_name">Profile</span></a></li>

                     <li class="profile nav-item"><a href="{{ route('signout') }}"><i class="fas fa-sign-out-alt"></i> <span class="menu_name">Log Out</span></a></li>

                     <!-- <li class="submenu_list nav-item dropdown">
                        <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-bars"></i> <span class="menu_name">More</span></a>
                        <ul class="submenu_sec dropdown-menu">
                           <li><a href="#"><i class="fas fa-cog"></i> <span class="menu_name">Settings</span></a></li>
                           <li><a href="#"><i class="fas fa-award"></i> <span class="menu_name">Master Classes</span></a></li>
                           <li><a href="#"><i class="fas fa-hand-holding-usd"></i> <span class="menu_name">Refer & Earn</span></a></li>
                           <li><a href="#"><i class="fas fa-wallet"></i> <span class="menu_name">Wallet</span></a></li>
                           <li><a href="#"><i class="fas fa-book-open"></i> <span class="menu_name">Rapid Blog Reading</span></a></li>
                           <li><a href="#"><i class="fas fa-tasks"></i> <span class="menu_name">Task</span></a></li>
                           <li><a href="{{ route('signout') }}"><i class="fas fa-sign-out-alt"></i> <span class="menu_name">Log Out</span></a></li>
                        </ul>
                     </li> -->
                     <div class="social_icons_sec text-center">
                        <ul class="ps-0 d-flex align-items-center justify-content-center">

                           @if(dsld_get_setting('social_link_url') != '' )
                           @foreach(json_decode(dsld_get_setting('social_link_url'), true) as $key => $value)
                            @php
                                $url = json_decode(dsld_get_setting('social_link_url'), true)[$key];
                                    $name = json_decode(dsld_get_setting('social_link_name'), true)[$key];
                                    @endphp
                                @if($name == 'fb')
                                <li class="fb"><a href="{{ $url }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    @endif
                                @if($name == 'li')
                                <li><a href="{{ $url }}"  target="_blank"><i class="fab fa-youtube"></i></a></li>
                                    @endif
                                @if($name == 'In')
                                <li class="insta"><a href="{{ $url }}"  target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    @endif
                                @if($name == 'yt')
                                <li class="yt"><a href="{{ $url }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                    @endif
                                @if($name == 'tw')
                                <li class="tt"><a href="{{ $url }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    @endif
                                @endforeach

                        @endif
                        </ul>
                        <p class="copyright">&copy; {{ dsld_get_setting('site_footer_copyright') }}</p>
                     </div>
                  </ul>
               </div>
            </div>
            <!-- notification screen start -->
            <div class="notification_sec">
               <div class="notification_inner_sec">
                  <h2><i class="fas fa-long-arrow-alt-left"></i> Notification</h2>
                  <div class=" notify_req d-flex align-items-center justify-content-between">
                     <h3>All request</h3>
                     <a href="#">See All (12)</a>
                  </div>
                  <div class="notification_block_sec">
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Charlie</h5>
                              <p>Parent Name</p>
                              <ul class="ps-0 mb-0 d-flex align-items-center">
                                 <li>Breed: <b>Golden R</b></li>
                                 <li>Age: <b>25Months</b></li>
                              </ul>
                           </div>
                        </div>
                        <div class="block_option">
                           <div class="block_opt_inner d-flex">
                              <span class="cross"><i class="fas fa-times"></i></span>
                              <span class="check"><i class="fas fa-check"></i></span>
                           </div>
                           <div class="select_sec">
                              <i class="fas fa-check-circle"></i>
                           </div>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Charlie</h5>
                              <p>Parent Name</p>
                              <ul class="ps-0 mb-0 d-flex align-items-center">
                                 <li>Breed: <b>Golden R</b></li>
                                 <li>Age: <b>25Months</b></li>
                              </ul>
                           </div>
                        </div>
                        <div class="block_option">
                           <div class="block_opt_inner d-flex">
                              <span class="cross"><i class="fas fa-times"></i></span>
                              <span class="check"><i class="fas fa-check"></i></span>
                           </div>
                           <div class="select_sec">
                              <i class="fas fa-check-circle"></i>
                           </div>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_head">New</div>
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i>
                           <span class="ellipse_inner">
                           <span class="del_icon"><i class="fas fa-trash-alt"></i></span>
                           <span class="bell_icon"><i class="far fa-bell-slash"></i></span>
                           </span>
                           </span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i>
                           <span class="ellipse_inner">
                           <span class="del_icon"><i class="fas fa-trash-alt"></i></span>
                           <span class="bell_icon"><i class="far fa-bell-slash"></i></span>
                           </span>
                           </span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i>
                           <span class="ellipse_inner">
                           <span class="del_icon"><i class="fas fa-trash-alt"></i></span>
                           <span class="bell_icon"><i class="far fa-bell-slash"></i></span>
                           </span>
                           </span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_head">This Week</div>
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_head">Older</div>
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                     </div>
                     <div class="block_sec d-flex justify-content-between">
                        <div class="block_info_sec d-flex align-items-center">
                           <img src="assets/images/user_img.png" alt="user_img" class="img-fluid" />
                           <div class="block_user_info">
                              <h5>Lorem ipsum dolor <span class="time">11:15 am</span></h5>
                              <p>Items in the checkout box</p>
                           </div>
                        </div>
                        <div class="block_option_ellipse d-flex">
                           <span class="ellipse"><i class="fas fa-ellipsis-v"></i></span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- notification screen end -->
            <!-- search screen start-->
            <div class="search_sec">
               <div class="notification_inner_sec">
                  <div class="col-lg-12 search_top">
                     <div class="col-lg-8">
                        <h2><i class="fa-solid fa-bars-staggered"></i><span class="serh_loc"><i class="fa-solid fa-location-dot"></i></span>&nbsp; gurgaon, haryana <span class="srch_down"><i class="fa-solid fa-angle-down"></i></span> </h2>
                     </div>
                     <div class="col-lg-4 text-end qr_code">
                        <a href="#"> <img src="assets/images/scan.png" alt="" class="img-fluid"/></a>
                     </div>
                  </div>
                  <div class="all_req d-flex align-items-center justify-content-between col-lg-11 mx-auto">
                     <!-- <h3>All request</h3>
                        <a href="#">See All (12)</a> -->
                     <input type="text" class="form-control form-control-sm" placeholder="Search your breed"/>
                  </div>
                  <div class="col-lg-11 mx-auto srch_tagline">
                     <div class="row pt-2">
                        <div class="col-lg-3 srch_rslt srch_b">
                           <label for="" class="form-label">Culture</label>
                        </div>
                        <div class="col-lg-3 srch_rslt srch_b">
                           <label for="" class="form-label">Lifestyle</label>
                        </div>
                        <div class="col-lg-3 srch_rslt srch_b">
                           <label for="" class="form-label">Realationship</label>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-11 mx-auto sp_brd pt-3 ">
                     <h2>top breed</h2>
                  </div>
                  <div class="col-lg-11 mx-auto top_brd_sec">
                     <div class="col-lg-3">
                        <div class="col-lg-12 top_brd_img">
                           <img src="assets/images/user_main_img.png" alt="" class="img-fluid"/>
                        </div>
                        <div class="col-lg-12 top_brd_name">
                           <h3>Indian Spitz</h3>
                        </div>
                     </div>
                     <div class="col-lg-3 sp_mx-1">
                        <div class="col-lg-12 top_brd_img">
                           <img src="assets/images/user_main_img.png" alt="" class="img-fluid"/>
                        </div>
                        <div class="col-lg-12 top_brd_name">
                           <h3>Indian Spitz</h3>
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="col-lg-12 top_brd_img">
                           <img src="assets/images/user_main_img.png" alt="" class="img-fluid"/>
                        </div>
                        <div class="col-lg-12 top_brd_name">
                           <h3>Indian Spitz</h3>
                        </div>
                     </div>
                     <div class="col-lg-3 sp-ms-1">
                        <div class="col-lg-12 top_brd_img">
                           <img src="assets/images/user_main_img.png" alt="" class="img-fluid"/>
                        </div>
                        <div class="col-lg-12 top_brd_name">
                           <h3>Indian Spitz</h3>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-11 mx-auto sp_brd mt-3 mb-1">
                     <h2>Pawfect Profiles near you</h2>
                  </div>
                  <div class="col-lg-11 mx-auto top_brd_sec">
                     <div class="col-lg-4">
                        <div class="col-lg-12">
                           <img src="assets/images/user_main_img.png" alt="" class="img-fluid"/>
                        </div>
                        <div class="col-lg-12 top_brd_name text-center content_info">
                           <h3>Tommy <span><i class="fa-solid fa-mars-stroke-up"></i></span></h3>
                           <p>
                              <span>
                              <img src="assets/images/logo_piece.png" alt="logo_piece" class="img-fluid pe-1"> 2.4 km for you
                              </span>
                           </p>
                        </div>
                        <div class="col-lg-12 text-center sp_add">
                           <button type="button" class="btn">add friend</button>
                        </div>
                     </div>
                     <div class="col-lg-4 sp_mx-1">
                        <div class="col-lg-12">
                           <img src="assets/images/user_main_img.png" alt="" class="img-fluid"/>
                        </div>
                        <div class="col-lg-12 top_brd_name text-center content_info">
                           <h3>Tommy <span><i class="fa-solid fa-mars-stroke-up"></i></span></h3>
                           <p>
                              <span>
                              <img src="assets/images/logo_piece.png" alt="logo_piece" class="img-fluid pe-1"> 2.4 km for you
                              </span>
                           </p>
                        </div>
                        <div class="col-lg-12 text-center sp_add">
                           <button type="button" class="btn">add friend</button>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="col-lg-12">
                           <img src="assets/images/user_main_img.png" alt="" class="img-fluid"/>
                        </div>
                        <div class="col-lg-12 top_brd_name text-center content_info">
                           <h3>Tommy <span><i class="fa-solid fa-mars-stroke-up"></i></span></h3>
                           <p>
                              <span>
                              <img src="assets/images/logo_piece.png" alt="logo_piece" class="img-fluid pe-1"> 2.4 km for you
                              </span>
                           </p>
                        </div>
                        <div class="col-lg-12 text-center sp_add">
                           <button type="button" class="btn">add friend</button>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-11 mx-auto sp_brd mt-3 mb-1">
                     <h2>Trending on DWIGGY DOO</h2>
                  </div>
                  <div class="col-lg-11 mx-auto sp_trend mb-3">
                     <div class="col-lg-3">
                        <img src="assets/images/user_main_img.png" alt="" class="img-fluid"/>
                     </div>
                     <div class="col-lg-8 sp_trend_text">
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing</p>
                     </div>
                     <div class="col-lg-1 sp_trend_icon text-end">
                        <span><i class="fa-solid fa-arrow-left"></i></span>
                     </div>
                  </div>
                  <div class="col-lg-11 mx-auto sp_trend mb-3">
                     <div class="col-lg-3">
                        <img src="assets/images/user_main_img.png" alt="" class="img-fluid"/>
                     </div>
                     <div class="col-lg-8 sp_trend_text">
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing</p>
                     </div>
                     <div class="col-lg-1 sp_trend_icon text-end">
                        <span><i class="fa-solid fa-arrow-left"></i></span>
                     </div>
                  </div>
                  <div class="col-lg-11 mx-auto sp_trend">
                     <div class="col-lg-3">
                        <img src="assets/images/user_main_img.png" alt="" class="img-fluid"/>
                     </div>
                     <div class="col-lg-8 sp_trend_text">
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing</p>
                     </div>
                     <div class="col-lg-1 sp_trend_icon text-end">
                        <span><i class="fa-solid fa-arrow-left"></i></span>
                     </div>
                  </div>
               </div>
            </div>
            <!-- search screen end-->
            <!-- qrcode screen start -->
            <div class="qrcode_sec">
               <div class="notification_inner_sec">
                  <div class="col-lg-12 search_top">
                     <div class="col-lg-9">
                        <h2><i class="fa-solid fa-arrow-left"></i>&nbsp; My QR Code </h2>
                     </div>
                     <div class="col-lg-3 text-end qr_code_share">
                        <span><i class="fa-solid fa-download"></i></span> <span><i class="fa-solid fa-share-nodes"></i></span>
                     </div>
                  </div>
                  <div class="col-lg-11 mx-auto qr_code_srch">
                     <div class="col-lg-12 qr_pick text-center">
                        <img src="assets/images/user_logo.png" alt="" class="img-fluid"/>
                     </div>
                     <div class="col-lg-12 qr_text text-center">
                        <h2>Ankit Verma</h2>
                        <p>Dog Name</p>
                     </div>
                     <div class="col-lg-12 qrcode_image">
                        <img src="assets/images/qrcode_img.png" alt="" class="img-fluid"/>
                     </div>
                     <div class="col-lg-12 qr_scan_btn">
                        <button type="button"><span><i class="fa-solid fa-camera"></i></span>&nbsp; scan QR code</button>
                     </div>
                  </div>
               </div>
            </div>
            <!-- qrcode screen end -->
            <!-- location screen start -->
            <div class="location_sec">
               <div class="notification_inner_sec">
                  <div class="col-lg-12 search_top">
                     <div class="col-lg-9">
                        <h2><i class="fa-solid fa-arrow-left"></i>&nbsp; Set Location </h2>
                     </div>
                     <!-- <div class="col-lg-3 text-end qr_code_share">
                        <span><i class="fa-solid fa-download"></i></span> <span><i class="fa-solid fa-share-nodes"></i></span>
                        </div> -->
                  </div>
                  <div class="col-lg-11 mx-auto loc_srch">
                     <div class="col-lg-11">
                        <input type="text" class="form-control form-control-sm" placeholder="Search your location"/>
                     </div>
                     <div class="col-lg-1 loc_srch_right text-end">
                        <span><i class="fa-solid fa-location-crosshairs"></i></span>
                     </div>
                  </div>
                  <div class="col-lg-11 mx-auto loc_rcl">
                     <h3>Recent Location</h3>
                     <ul>
                        <li>
                           <div class="rc_loc">
                              <h3><span><i class="fa-solid fa-location-dot"></i></span>&nbsp; Gurgaon, Haryana</h3>
                              <p>45460 Jeremie Brook Lake 455 Parker Spurs haven Lake East Francochester 21833-1690 -5.1394 Search city or pincode</p>
                           </div>
                        </li>
                        <li>
                           <div class="rc_loc">
                              <h3><span><i class="fa-solid fa-location-dot"></i></span>&nbsp; Gurgaon, Haryana</h3>
                              <p>45460 Jeremie Brook Lake 455 Parker Spurs haven Lake East Francochester 21833-1690 -5.1394 Search city or pincode</p>
                           </div>
                        </li>
                     </ul>
                  </div>
                  <div class="col-lg-11 mx-auto pop_city">
                     <h3>Popular Cities</h3>
                     <div class="col-lg-12 city_wraps">
                        <div class="city_wrap_card">
                           <img src="assets/images/india.png" alt="" class="img-fluid"/>
                        </div>
                        <div class="city_wrap_card">
                           <img src="assets/images/india.png" alt="" class="img-fluid"/>
                        </div>
                        <div class="city_wrap_card">
                           <img src="assets/images/india.png" alt="" class="img-fluid"/>
                        </div>
                        <div class="city_wrap_card">
                           <img src="assets/images/india.png" alt="" class="img-fluid"/>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- location screen end -->
         </nav>
      </div>