<div class="modal fade" id="ProfilePostModal" tabindex="-1" aria-labelledby="#ProfilePostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered filter_modal">
        <div class="modal-content">
            <div class="modal-body">
                <div class="post_form position-relative">
                    <form id="postFormSubmit" action="add-dog-feed" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="dogs_id" value="{{ Session::get('defaultDogDetails.id') }}">
                        <div class="sl___input_container">
                            <div class="sl___input_container__name">
                                <label for="">Content</label>
                                <input type="text" name="content">
                            </div>
                            <div class="sl___input_container__name">
                                <label for="">Image</label>
                                <input type="file" name="media" accept="image/*">
                            </div>
                            <div class="sl___input_submit__btn">
                                <button type="submit">Post</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#postFormSubmit').submit(function(e){
        e.preventDefault();
        var data = new FormData(this);
        $(this).parent().append('<div class="loader-area"><span class="loader"></span></div>');
        $.ajax({
            
            type: $(this).attr('method'),
            url: '{{ env("APP_URL") }}/api/v1/'+$(this).attr('action'),
            data: data,
            dataType: "json",
            mimeType: "multipart/form-data",
            cache: false,
            processData:false,
            contentType: false,

            success: function (data) {
                getGalleryNew(1);
                $('#ProfilePostModal').modal('hide');
                $('#postFormSubmit').parent().find('.loader-area').remove();
                if(data.success === true){
                    dsldFlashNotification('success', data.message);
                    
                }
            },
            error: function(xhr, status, error) {
                $('#ProfilePostModal').modal('hide');
                $('#postFormSubmit').parent().find('.loader-area').remove();
                dsldFlashNotification('error', "Something wrong!. Please enter valid and required fields.");
            }
        });
    });
</script>