<script>
@if(Session::get('success') != '')
    dsldFlashNotification('success', '<?= Session::get('success'); ?>');
@elseif(Session::get('warning') != '')
    dsldFlashNotification('warning', '<?= Session::get('warning'); ?>');
@elseif(Session::get('info') != '')
    dsldFlashNotification('info', '<?= Session::get('info'); ?>');
@elseif(Session::get('error') != '')
    dsldFlashNotification('error', '<?= Session::get('error'); ?>');
@endif

function clear_cache(){
    DSLDAjaxSubmitFullLoader('{{ route("clear.cache") }}', '', 'GET', '1');
}

function ajax_get_program_by_institute(){
    var data = $(this).select2('data'); 
    alert(data);
}



function logout(){
    $('.full_page_loader').fadeIn('slow');
    $.post('{{ route("logout") }}', { '_token':'{{ csrf_token() }}'}, 
        function(returnedData){
            $('.full_page_loader').fadeOut('slow');
            location.reload();
    });
}
$(document).ready(function() { $(".select2").select2(); });
</script>