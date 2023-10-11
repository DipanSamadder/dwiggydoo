
<div class="modal fade" id="DeleteFRModal" tabindex="-1" aria-labelledby="#deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered filter_modal">
        <div class="modal-content">
            <div class="modal-body">
                <div class="delete_icon text-center">
                    <span><i class="fas fa-trash-alt"></i></span>
                </div>
                <div class="delete_msg text-center">
                    <h3>delete <span class="fr_count"></span> friend requests? </h3>
                </div>
            </div>
            <div class="modal-footer-row">
                <button type="button" class="btn del_cancel" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn del_delete" onclick="SubmitMultipleForm('sentMultiple', 'DeleteFRModal');">Delete</button>
            </div>
        </div>
    </div>
</div>