<script>
    const csrfToken = '{{ csrf_token() }}';
    const sessionToken = sessionStorage.getItem('access_token');
    const sessionTokenType = sessionStorage.getItem('token_type');
    const sessionUserID = sessionStorage.getItem('user_id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            "Authorization": sessionTokenType +' '+ sessionToken,
            "X-Requested-With": "XMLHttpRequest",
        }
        
    });
    $(document).ready(function(){
        updateMetaToken();
    });
  function updateMetaToken() {
        const metaAppToken = document.querySelector('meta[name="api-token"]');
        if (sessionToken) {
            metaAppToken.setAttribute('content', sessionTokenType+' '+sessionToken);
        }
    }

    
function sendFriendRequest(sid, rid, items_id){
    var formData = new FormData();
    formData.append("_browser", 1);
    formData.append("sender_id", sid);
    formData.append("receiver_id", rid);
    $.ajax({
        type: 'post',
        url: '{{ env("APP_URL") }}/api/v1/friend-request-send',
        data: formData,
        dataType: "json",
        mimeType: "multipart/form-data",
        cache: false,
        processData:false,
        contentType: false,

        success: function (data, textStatus, xhr) {

            $('#'+items_id+' .items-'+rid).hide('slide', {direction: 'left'}, 500);
            if(data.success === true){
                dsldFlashNotification('success', data.message);
            }else{
                dsldFlashNotification('error', errorResponseMessage(data.message));
            }
            
        }
    })
}

function removeFriendRequest(sid, rid, fid, items_id, modal = null){
    var formData = new FormData();
    formData.append("_browser", 1);
    formData.append("friendships_id", fid);
    formData.append("dogs_id", sid);
    formData.append("receiver_id", rid);
    $.ajax({
        type: 'post',
        url: '{{ env("APP_URL") }}/api/v1/reject-friend-request',
        data: formData,
        dataType: "json",
        mimeType: "multipart/form-data",
        cache: false,
        processData:false,
        contentType: false,

        success: function (data, textStatus, xhr) {


            if(modal != ''){ $('#'+modal).modal('hide'); }
            if(items_id != ''){ $('#'+items_id+' .items-'+sid).hide('slide', {direction: 'left'}, 500); }
            
            if(data.success === true){
                dsldFlashNotification('success', data.message);
            }else{
                dsldFlashNotification('error', errorResponseMessage(data.message));
            }
            
        }
    })
}

function cencalSentRequest(sid, rid, fid, items_id, modal = null){
    var formData = new FormData();
    formData.append("_browser", 1);
    formData.append("friendships_id", fid);
    formData.append("dogs_id", sid);
    formData.append("receiver_id", rid);
    $.ajax({
        type: 'post',
        url: '{{ env("APP_URL") }}/api/v1/cancel-friend-request',
        data: formData,
        dataType: "json",
        mimeType: "multipart/form-data",
        cache: false,
        processData:false,
        contentType: false,

        success: function (data, textStatus, xhr) {


            if(modal != ''){ $('#'+modal).modal('hide'); }
            if(items_id != ''){ $('#'+items_id+' .items-'+fid).hide('slide', {direction: 'left'}, 500); }
            
            if(data.success === true){
                dsldFlashNotification('success', data.message);
            }else{
                dsldFlashNotification('error', errorResponseMessage(data.message));
            }
            
        }
    })
}

function acceptFriendRequest(sid, rid, fid, items_id){
    var formData = new FormData();
    formData.append("_browser", 1);
    formData.append("friendships_id", fid);
    formData.append("dogs_id", sid);
    formData.append("receiver_id", rid);
    $.ajax({
        type: 'post',
        url: '{{ env("APP_URL") }}/api/v1/accept-friend-request',
        data: formData,
        dataType: "json",
        mimeType: "multipart/form-data",
        cache: false,
        processData:false,
        contentType: false,

        success: function (data, textStatus, xhr) {

            $('#'+items_id+' .items-'+sid).hide('slide', {direction: 'left'}, 500);
            if(data.success === true){
                dsldFlashNotification('success', data.message);
            }else{
                dsldFlashNotification('error', errorResponseMessage(data.message));
            }
            
        }
    })
}

function blockFriendRequest(fid, did, udid, msg, modal = null, items_id = null){
    var formData = new FormData();
    formData.append("_browser", 1);
    formData.append("friendships_id", fid);
    formData.append("dogs_id", udid);
    formData.append("receiver_id", did);
    formData.append("message", msg);

    $.ajax({
        type: 'post',
        url: '{{ env("APP_URL") }}/api/v1/block-unblock-friend-request',
        data: formData,
        dataType: "json",
        mimeType: "multipart/form-data",
        cache: false,
        processData:false,
        contentType: false,

        success: function (data, textStatus, xhr) {

            if(data.success === true){
                dsldFlashNotification('success', data.message);
            }else{
                dsldFlashNotification('error', errorResponseMessage(data.message));
            }
            if(modal != ''){ $('#'+modal).modal('hide'); }
            if(items_id != ''){ $('#'+items_id+' .items-'+fid).hide('slide', {direction: 'left'}, 500); }
            
            
        }
    })
}

function reportFriendRequest(fid, did, udid, msg, modal = null, items_id = null){
    var formData = new FormData();
    formData.append("_browser", 1);
    formData.append("friendships_id", fid);
    formData.append("dogs_id", udid);
    formData.append("receiver_id", did);
    formData.append("message", msg);

    $.ajax({
        type: 'post',
        url: '{{ env("APP_URL") }}/api/v1/report-friend-request',
        data: formData,
        dataType: "json",
        mimeType: "multipart/form-data",
        cache: false,
        processData:false,
        contentType: false,

        success: function (data, textStatus, xhr) {

            if(data.success === true){
                dsldFlashNotification('success', data.message);
            }else{
                dsldFlashNotification('error', errorResponseMessage(data.message));
            }
            if(modal != ''){ $('#'+modal).modal('hide'); }
            if(items_id != ''){ $('#'+items_id+' .items-'+fid).hide('slide', {direction: 'left'}, 500); }
            
            
        }
    })
}

function notifications(){

    $('#filter_connection').modal('hide');
    $('#notifictions').html('<div style="position: relative;height: 100vh;"><div class="loader-area"><span class="loader"></span></div></div>');
 
    $.post( 
        '{{ route("notifictions.get") }}',
        { _token: "{{ csrf_token() }}" },
        function(response) {
            $('#notifictions').html(response);             
        },
        "html"
    );

}
    
function manageFriendRequest(){
    $('#filter_connection').modal('hide');
    $('#notifictions').html('<div style="position: relative;height: 100vh;"><div class="loader-area"><span class="loader"></span></div></div>');
 
    $.post( 
        '{{ route("notifictions.manage") }}',
        { _token: "{{ csrf_token() }}" },
        function(response) {
            $('#notifictions').html(response);             
        },
        "html"
    );
}
    
function receivedRequestMultiple(){
    $('#filter_connection').modal('hide');
    $('#notifictions').html('<div style="position: relative;height: 100vh;"><div class="loader-area"><span class="loader"></span></div></div>');
 
    $.post( 
        '{{ route("notifictions.manage.multiple") }}',
        { _token: "{{ csrf_token() }}" },
        function(response) {
            $('#notifictions').html(response);             
        },
        "html"
    );
}

function manageReceivedFriendRequest(){
    $('#filter_connection').modal('hide');
    $('#manage_received').html('<div style="position: relative;height: 100vh;"><div class="loader-area"><span class="loader"></span></div></div>');
 
    $.post( 
        '{{ route("notifictions.received.request") }}',
        { _token: "{{ csrf_token() }}" },
        function(response) {
            $('#manage_received').html(response);             
        },
        "html"
    );
}
function manageSendFriendRequest(){
    $('#filter_connection').modal('hide');
    $('#manage_sent').html('<div style="position: relative;height: 100vh;"><div class="loader-area"><span class="loader"></span></div></div>');
 
    $.post( 
        '{{ route("notifictions.sent.request") }}',
        { _token: "{{ csrf_token() }}" },
        function(response) {
            $('#manage_sent').html(response);             
        },
        "html"
    );
}

function manageReceivedFriendRequestMultiple(){
    $('#filter_connection').modal('hide');
    $('#manage_received_multiple').html('<div style="position: relative;height: 100vh;"><div class="loader-area"><span class="loader"></span></div></div>');
 
    $.post( 
        '{{ route("notifictions.received.request.multiple") }}',
        { _token: "{{ csrf_token() }}" },
        function(response) {
            $('#manage_received_multiple').html(response);             
        },
        "html"
    );
}
function manageSendFriendRequestMultiple(){
    $('#filter_connection').modal('hide');
    $('#manage_sent_multiple').html('<div style="position: relative;height: 100vh;"><div class="loader-area"><span class="loader"></span></div></div>');
 
    $.post( 
        '{{ route("notifictions.sent.request.multiple") }}',
        { _token: "{{ csrf_token() }}" },
        function(response) {
            $('#manage_sent_multiple').html(response);             
        },
        "html"
    );
}
function frSelect(id){
    var numChecked = $('input[name="frselecte[]"]:checked').length;
    countSelectItems(numChecked);
}
function countSelectItems(count){
    if(count > 0 ){$('.deleteBox-wrap').show();}else{$('.deleteBox-wrap').hide();}
    $('.fr_count').text('('+count+')');
}


function SubmitMultipleForm(formName, modal=null){
    postAjaxSubmitNotif('#'+formName, modal);
}



function postAjaxSubmitNotif(formName, modal=null){
    var selectedItems = [];
    $('input[name="frselecte[]"]:checked').each(function () {
        selectedItems.push($(this).val());
    });

    var formData = new FormData();
    formData.append("_browser", 1);
    
    formData.append("friendships_id", selectedItems);
    formData.append("_token", '{{ csrf_token() }}');
    if(modal == 'confirmModal'){
        formData.append("action", 'accept');
    }else if(modal == 'DeleteFRModal'){
        formData.append("action", 'delete');
    }else if(modal == 'cancelModal'){
        formData.append("action", 'cancel');
    }


    $(formName).parent().append('<div class="loader-area"><span class="loader"></span></div>');
    $.ajax({
    
    type: $(formName).attr('method'),
    url: '{{ env("APP_URL") }}/api/v1/'+$(formName).attr('action'),
    data: formData,
    dataType: "json",
    mimeType: "multipart/form-data",
    cache: false,
    processData:false,
    contentType: false,

    success: function (data) {
        $(formName).parent().find('.loader-area').remove();
        if(modal == 'cancelModal'){
            manageSendFriendRequestMultiple();
        }else{
            manageReceivedFriendRequestMultiple();
        }
        if(data.success === true){
            dsldFlashNotification('success', data.message);
        }else{
            dsldFlashNotification('error', errorResponseMessage(data.message));
        }
        if(modal != ''){ $('#'+modal).modal('hide'); }
    },
    error: function(xhr, status, error) {
        if(modal == 'cancelModal'){
            manageSendFriendRequestMultiple();
        }else{
            manageReceivedFriendRequestMultiple();
        }
        
        $(formName).parent().find('.loader-area').remove();
        if(modal != ''){ $('#'+modal).modal('hide'); }
        dsldFlashNotification('error', "Something wrong!. Please enter valid and required fields.");
    }
})
}
</script>



<script>

  function errorResponseMessage(data){
    var error = '';
    if (jQuery.isPlainObject(data) == true){
      
      var i = 0 ;
      $.each(data, function (key, value) {
          if(i == 0){error = value[0]; }
          i++;
      });

    }else{
      error = data;
    }
    return error;
  }



  function downloadQRCode(id){
    var path = $(id).attr('src');
    var downloadLink = document.createElement('a');
    downloadLink.href = path;
    downloadLink.download = id+'.jpg';
    downloadLink.click();
  }
  function ShareQRCode(id){

    var path = $(id).attr('src');
    var shareableLink = document.createElement('a');
    shareableLink.href = path;

    if (navigator.share) {
        navigator.share({
            url: shareableLink.href
        }).then(() => {
            console.log('Image shared successfully');
        }).catch((error) => {
            console.error('Error sharing image:', error);
        });
    } else {
        alert('Your browser does not support image sharing.');
    }

  }

// Function to show the progress bar
function showProgressBar() {
    $('#top-progress-bar').css('width','100%');
}

// Function to hide the progress bar
function hideProgressBar() {
    $('#top-progress-bar').css('width','0');
}

// Hook into AJAX events to show/hide the progress bar
$(document).ajaxStart(function () {
    showProgressBar();
});

$(document).ajaxStop(function () {
    hideProgressBar();
});

$(document).ready(function(){
    $('.submenu_list > a').on('click', function(){
        $('.submenu_list').toggleClass('open');
    });

    $('.notification a').on('click', function(){
        $('.home_sidebar_sec').addClass('open');
    });

    $('.search a').on('click', function(){
        $('.home_sidebar_sec').addClass('openSrch');
    });

    $('.qr_code a').on('click', function(){
        $('.home_sidebar_sec').addClass('openqr');
        $('.home_sidebar_sec').removeClass('openSrch');
    });

    $('.sidebar_menus li a').not($('.notification a')).on('click', function(){
        $('.home_sidebar_sec').removeClass('open');
    });

    $('.sidebar_menus li a').not($('.submenu_list a')).on('click', function(){
        $('.submenu_list').removeClass('open');
    });

    $('.notification_inner_sec h2 i').on('click', function(){
        $('.home_sidebar_sec').removeClass('open');
        $('.sidebar_menus li a').removeClass('active');
    });

    $('.search_sec .notification_inner_sec h2 i').on('click', function(){
        $('.home_sidebar_sec').removeClass('openSrch');
        $('.sidebar_menus li a').removeClass('active');
    });

    $('.qrcode_sec .notification_inner_sec h2 i').on('click', function(){
        $('.home_sidebar_sec').removeClass('openqr');
        $('.sidebar_menus li a').removeClass('active');
    });

    $('.sidebar_menus li a').on('click', function(){
        $('.sidebar_menus li a').removeClass('active');
        $(this).toggleClass('active');
    });

    $('.ellipse_inner').hide();
    $('.ellipse').on('click', function(){
        $('.ellipse').removeClass('show');
        $(this).addClass('show');
    });

   

});


function searchinput(){
    let search =document.getElementById("search_br");
    let input = document.getElementById("search_input");

    if(input.style.display = "none"){
        search.style.display="none";
        input.style.display="block";
    }
}
</script>
