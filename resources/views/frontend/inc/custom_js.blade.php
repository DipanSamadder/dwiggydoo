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
</script>