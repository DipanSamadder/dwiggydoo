@if(count($data) > 0)
    @foreach($data as $key => $value)
        <div class="sug_course_block w-100 dsld_shimmer blog-items-sugget items-{{ $value->id }}" >
            <a href="{{ $value->slug }}" style="float:left;"><img src="{{ dsld_uploaded_file_path($value->banner) }}" alt="user_main_img" class="img-fluid image_placeholder dsld_shmmer_image" /></a>
            <div  style="float:left;width:60%;">
                <p class="title-line dsld_shimmerBG"><a href="{{ $value->slug }}">{{ $value->title }}</a></p> 
                <p class="content-line dsld_shimmerBG"><span>{{ $value->short_content }}</span></p> 
            </div>
        </div>
    @endforeach
@else
    <div class="sug_course_block"><p>Nothing found!.</p></div>
@endif
