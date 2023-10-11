<div class="notify_req d-flex align-items-center justify-content-between">
    <h3>All request</h3> <a href="#" onclick="receivedRequestMultiple();"><span class="select_all">Select All</span><span class="manage" id="sideBar_2">Manage</span></a>
</div>
<div class="ntf_tab_sec">
    <div class="ntf_btn_sec">
        <ul class="tabs_nav ps-0 d-flex align-items-center">
            <li class="tab-active"><a href="#manage_received" onclick="manageReceivedFriendRequest();">Received</a></li>
            <li><a href="#manage_sent" onclick="manageSendFriendRequest();">Sent</a></li>
        </ul>
    </div>
    <div class="ntf_tab_block">
        <div class="notification_block_sec" id="manage_received"></div>
        <div class="notification_block_sec" id="manage_sent"></div>
    </div>
</div>

<script>
    manageReceivedFriendRequest();
    $('.ntf_tab_block > div').hide();
    $('.ntf_tab_block div:first').show();
    $('.tabs_nav li:first').addClass('tab-active');

    $('.tabs_nav a').on('click', function(event){

    event.preventDefault();
        $('.tabs_nav li').removeClass('tab-active');
        $(this).parent().addClass('tab-active');
        $('.ntf_tab_block > div').hide();
        $($(this).attr('href')).show();
    });
</script>