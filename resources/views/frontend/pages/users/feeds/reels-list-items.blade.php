@if(!is_null($reellistGallery))
    @foreach($reellistGallery as $key => $value)
        <div class="col-lg-4 mb-3 ps-0 reel_icon">
            <div class="images-box dsld_shimmer">
                <video controls  class="img-fluid image_placeholder dsld_shmmer_image"><source src="{{ dsld_uploaded_file_path($value->media) }}" type="video/mp4">Your browser does not support the video tag.
                </video>
            </div>
        </div>
    @endforeach

@endif