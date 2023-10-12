@if(!is_null($feedlistGallery))
    @foreach($feedlistGallery as $key => $value)
        <div class="col-lg-4 mb-3 ps-0">
            <div class="images-box dsld_shimmer">
                <img src="{{ dsld_uploaded_file_path($value->media) }}" alt="" class="img-fluid image_placeholder dsld_shmmer_image"/>
            </div>
        </div>
    @endforeach

@endif