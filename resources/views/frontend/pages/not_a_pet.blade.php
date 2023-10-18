@extends('frontend.layouts.blank')

@section('content')
<div class="user_right_wrap">
<div class="col-lg-6 doo_right activeD m-auto">
        <div class="not_pet_feed">
            <h3>It’s A Deed To Feed A Dog In Need</h3>
        </div>
        
        <div class=" not_pet_quiz_subwrap">
            <div class="not_pet_quiz_wrapper forpetownlk"></div>
        </div>
        <div class="pet_globe_wrap">
            <div class="pet_globe">
                <div class="pet_bowl_img">
                    <img src="{{ dsld_static_asset('assets/images/bowl.png') }}" alt="">
                </div>
                <div class="pet_core_wrap">
                    <div class="circle_subwrap">
                        <div id="middle-circle">
                            <img src="{{ dsld_static_asset('assets/images/sad.png') }}" alt="">
                        </div>
                        <div id="progress-spinner"></div>
                    </div>
                    <div class="pet_text text-center">
                        <h3>score</h3>
                    </div>
                    <div class="pet_score">
                        <p>0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <input type="hidden" value="{{ @$start_id->id }}" id="start_id">
    <input type="hidden" value="0" id="points_value">
    <input type="hidden" value="0" id="progress_value">
@endsection

@section('footer')

<script type="text/javascript">
var q = $('#start_id').val();
var attempt= 1;
var points = $('#points_value').val();
$(document).ready(function() {
    upload_questions();
});


function upload_questions() {
    var q = $('#start_id').val();
    $.ajax({
        type: 'POST',
        url: '{{ route("not_pet.ajax_get_questions") }}',
        data: {
            '_token': '{{ csrf_token() }}',
            id: q
        },
        success: function(data) {
            $('.forpetownlk').html(data);
        }

    });
}


function click_option_not_pet(key) {
    var points = $('#points_value').val();
    var progress = $('#progress_value').val();
    let scoreLabel=document.querySelector(".pet_score p");
    let progressbar =document.getElementById("progress-spinner");
    var q = $('#start_id').val();
    $('.forpetownlk').html('<div style="position: relative;height: 100vh;"><div class="loader-area"><span class="loader"></span></div></div>');
    $.ajax({
        type: 'POST',
        url: '{{ route("not_pet.answer") }}',
        dataType: "json",
        data: {
            '_token': '{{ csrf_token() }}',
            id: q,
            key: key,
            attempt: attempt,
            points: points,
            progress: progress
        },
        success: function(data) {
            var point = data.points;
            var progres = data.progress;
            var current_id = data.current_id;

            if (data.is_correct == 1) {
                attempt++;
                // setTimeout(function() {
                //     $('#pet_bowl_img').fadeIn('5000').html('<div class="rice-bowl rice-bowl--' + point + ' nsop selected"><img src="https://dwiggydoo.com/public/uploads/not_pet/biscuit-' +
                //         point + '.png" /></div>');
                // }, 100);
                dsldFlashNotification('success', 'Thank you! Correct Answer.');

            } else {
                dsldFlashNotification('error', 'Sorry! Wrong Answer.');
            }
            $('.forpetownlk').html(data.data);
            scoreLabel.innerHTML = point;
            $('#start_id').val(current_id);
        
            $('#points_value').val(point);
            $('#progress_value').val(progres);
            progressbar.style.background = `conic-gradient(rgb(242, 242, 242) ${progres}%,rgb(3, 133, 255)  ${progres}%)`;
        
            setTimeout(function() {
                upload_questions();
            }, 1500);
       
        }

    });

}
</script>
@endsection