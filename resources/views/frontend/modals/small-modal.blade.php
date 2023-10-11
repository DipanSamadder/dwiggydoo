
<div class="modal fade" @if(isset($modal_id)) id="{{ $modal_id }}" aria-labelledby="{{ $modal_id }}"  @endif tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  @if(isset($modal_dialog_class)) {{ $modal_dialog_class }} @endif">
        <div class="modal-content">
            <div class="modal-body" id="{{ $modal_id }}_body">
                
            </div>
        </div>
    </div>
</div>