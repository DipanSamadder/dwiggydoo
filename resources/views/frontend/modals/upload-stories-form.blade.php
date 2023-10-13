<div class="modal fade" id="AddStoriesModal" tabindex="-1" aria-labelledby="#AddStoriesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered filter_modal">
        <div class="modal-content">
            <div class="modal-body">
                <div class="post_form position-relative">
                    <form id="storiesFormSubmit" action="status-items/create" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="sl___input_container">
                            <div class="sl___input_container__name">
                                <label for="">File</label>
                                <input type="file" name="dsld_file" accept="image/*,video/*">
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
    $('#storiesFormSubmit').submit(function(e){
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
                $('#AddStoriesModal').modal('hide');
                $('#storiesFormSubmit').parent().find('.loader-area').remove();
                if(data.success === true){
                    dsldFlashNotification('success', data.message);
                    
                }
            },
            error: function(xhr, status, error) {
                $('#AddStoriesModal').modal('hide');
                $('#storiesFormSubmit').parent().find('.loader-area').remove();
                dsldFlashNotification('error', "Something wrong!. Please enter valid and required fields.");
            }
        });
    });
</script>