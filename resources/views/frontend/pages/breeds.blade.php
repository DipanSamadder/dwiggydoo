@extends('frontend.layouts.app')
@section('content')

        <div class="row">
            <!-- <div class="col-lg-12 bread_title">
                <h3><span><i class="fa-solid fa-arrow-left"></i></span>&nbsp; all breads</h3>
            </div> -->
            <div class="col-lg-12 bread_subtitle py-3">
                <h4>breads near you</h4>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    @if(!empty($top_breeds))
                        @foreach($top_breeds as $key => $value )
                            <div class="col-lg-3 bread_card text-center pb-3">
                                <img src="{{ $value->image }}" alt="" class="img-fluid mb-3" />
                                <h3>{{ $value->name }}</h3>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="row">
                    
                    <div class="col-lg-12 bread_search mt-4">
                        <div class="col-lg-4 bread_search_title">
                            <h2>all breeds</h2>
                        </div>
                        <div class="col-lg-4 bread_search_btn text-end">
                            <button type="button" id="search_br"data-bs-toggle="modal" data-bs-target="#exampleModal">search</button>
                        </div>
                    </div>
                    @foreach (range('A', 'D') as $letter)
                    <div class="col-lg-12 py-3">
                        <div class="col-lg-12 bread_search mb-2">
                            <div class="col-lg-1 search_txt">
                                <h4>{{ $letter }}</h4>
                            </div>
                            <!-- <div class="col-lg-2 txt_bk text-center">
                                <a href="#">back</a>
                            </div> -->
                        </div>
                        <div class="all_bread_row">
                            @php 
                                $breeds_data = App\Models\Breed::where('name', 'LIKE', $letter.'%' )->limit(7)->get();
                            @endphp
                            @if(!empty($breeds_data))
                                @foreach($breeds_data as $key => $value)
                                    <div class=" srch_rslt">
                                        <label for="" class="form-label">{{ $value->name }}</label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>


            </div>
        </div>
 


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog filter_modal">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> -->
                <div class="modal-body">
                    <div class="col-lg-12 all_bread_modal">
                        <div class="col-lg-12 text-start">
                            <h3>Breeds</h3>
                        </div>
                    </div>
                    <div class="col-lg-12 all_bread_srch">
                        <input type="search" class="form-control form-control-sm p-0"  id="breed-search"/>
                        <span><button id="microBtn"><i class="fa-solid fa-microphone"></i></button></span>
                    </div>
                    <div class="col-lg-12">
                        <div class="bread_content position-relative" id="bread_option"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
<script>
    const breadInput = document.querySelector(".all_bread_srch input");
    const serchbtn = document.getElementById("microBtn");

    serchbtn.addEventListener("click",function(){
        breadInput.focus();
    })
    
</script>
<script>
const recognition = new webkitSpeechRecognition(); 
recognition.onresult = function(event) {
    const transcript = event.results[0][0].transcript;
    $('#breed-search').val(transcript);
    fetchBreedDataSearch(transcript);
};

document.getElementById('microBtn').addEventListener('click', function() {
    recognition.start();
});

$('#breed-search').on('keyup', function(){
    fetchBreedDataSearch($('#breed-search').val());
})
function fetchBreedDataSearch(text) {
    $('#bread_option').html('<div style="min-height: 85px;"><div class="loader-area"><span class="loader"></span></div></div>');
    $.ajax({
        url: '{{ route("breeds.search") }}',
        method: 'POST', 
        data: { _token: '{{ csrf_token() }}', text: text },
        success: function(response) {
            $('#bread_option').html(response);
        }
    });
}

</script>
@endsection