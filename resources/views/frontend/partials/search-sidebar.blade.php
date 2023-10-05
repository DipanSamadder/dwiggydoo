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
            @if(!empty(App\Models\Breed::where('top', 1)->orderBy('name', 'ASC')->get()))
                @foreach(App\Models\Breed::where('top', 1)->orderBy('name', 'ASC')->limit(4)->get() as $key => $value )
                    <div class="col-lg-3">
                        <div class="col-lg-12 top_brd_img">
                            <img src="{{ $value->image }}" alt="" class="img-fluid"/>
                        </div>
                        <div class="col-lg-12 top_brd_name">
                            <h3>{{ $value->name }}</h3>
                        </div>
                    </div>
                @endforeach
            @endif
            
        </div>
       
        @if(count(App\Models\Dog::where('status', 1)->whereNotIn('user_id', [auth()->user()->id])->get()) >= 1)
            <div class="col-lg-11 mx-auto sp_brd mt-3 mb-1">
                <h2>Pawfect Profiles near you </h2>
            </div>
            <div class="col-lg-11">
                <div class="mx-auto top_brd_sec row">
                    @foreach(App\Models\Dog::where('status', 1)->whereNotIn('user_id', [auth()->user()->id])->get()->random(3) as $key => $sdog )
                        <div class="col-lg-4">
                            <div class="col-lg-12">
                                <?php echo dsld_lazy_image_by_id($sdog->avatar_original, 'img-fluid', 'height:80px; width:100%;'); ?>
                            </div>
                            <div class="col-lg-12 top_brd_name text-center">
                                <h3>{{ $sdog->name }} <span><i class="fa-solid fa-mars-stroke-up"></i></span></h3>
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
                    @endforeach
                </div>
            </div>
        @endif

        @if(count(App\Models\Post::where('type', 'blog_post')->where('status', 1)->get()) >= 1)

            <div class="col-lg-11 mx-auto sp_brd mt-3 mb-1">
                <h2>Trending on DWIGGY DOO</h2>
            </div>
            @foreach(App\Models\Post::where('type', 'blog_post')->where('status', 1)->get() as $key => $tblog )
                <div class="col-lg-11 mx-auto sp_trend mb-3">
                   
                        <div class="col-lg-3">
                        <a href="{{ $tblog->slug }}"><?php echo dsld_lazy_image_by_id($tblog->banner, 'img-fluid', ''); ?></a>
                        </div>
                        <div class="col-lg-8 sp_trend_text">
                        <a href="{{ $tblog->slug }}"><p>{{ $tblog->title }}</p></a>
                        </div>
                        <div class="col-lg-1 sp_trend_icon text-end">
                            <span><i class="fa-solid fa-arrow-left"></i></span>
                        </div>
                    
                </div>
            @endforeach
        @endif
        
    </div>
</div>