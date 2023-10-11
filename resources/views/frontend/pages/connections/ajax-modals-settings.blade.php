<div class="connection_share">
    <div class="con_share text-center">
        <a href="{{ $cfriend->slug }}" class="conn_share_link">
            <span><i class="fa-solid fa-share-nodes"></i></span>
            <h3>share</h3>
        </a>
    </div>
    <div class="con_link text-center">
        <a href="{{ $cfriend->slug }}" class="conn_share_link">
            <span><i class="fa-solid fa-link"></i></span>
            <h3>Link</h3>
        </a>
    </div>
    <div class="con_unfriend text-center">
        <a href="#" onclick="removeFriendRequest('{{ $udog_id}}', '{{ $cfriend->id}}', '{{ $friendship->id}}',   'connections-ajax-items', 'connection_setting')" class="conn_share_link">
            <span><i class="fa-solid fa-user-group"></i></span>
            <h3>unfriend</h3>
        </a>
    </div>
    <div class="con_block text-center">
        <a href="#"  onclick="blockFriendRequest( '{{ $friendship->id}}', '{{ $cfriend->id}}', '{{ $udog_id}}',  'Dont Know.', 'connection_setting', 'connections-ajax-items')" class="conn_share_link">
            <span><i class="fa-solid fa-shield-halved"></i></span>
            <h3>block</h3>
        </a>
    </div>
    <div class="con_report text-center">
        <a href="#" onclick="reportFriendRequest( '{{ $friendship->id}}', '{{ $cfriend->id}}', '{{ $udog_id}}',  'Dont Know.', 'connection_setting', 'connections-ajax-items')" class="conn_share_link">
            <span><i class="fa-solid fa-file"></i></span>

            <h3>report</h3>
        </a>
    </div>
</div>

<div class="con_notification">
    <h2>Manage Notification</h2>
</div>

<div class="row align-items-center">
    <div class="col-lg-9">
        <div class="filter_age_tagline">
            <label for="" class="form-label">Posts</label>
        </div>
    </div>

    <div class="col-lg-3">
        <div class=" text-end">
            <div class="check-box">
                <input type="checkbox" checked>
            </div>
        </div>
    </div>
</div>

<div class="row align-items-center">
    <div class="col-lg-9">
        <div class="filter_age_tagline">
            <label for="" class="form-label">Reels</label>
        </div>
    </div>

    <div class="col-lg-3">
        <div class=" text-end">
            <div class="check-box">
                <input type="checkbox" checked>
            </div>
        </div>
    </div>
</div>