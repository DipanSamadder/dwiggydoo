<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="#exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered filter_modal">
        <div class="modal-content">
            <div class="modal-body">
                <div class="delete_icon text-center">
                    <span><i class="fa-solid fa-check"></i></span>
                </div>
                <div class="delete_msg text-center">
                    <h3>confirm <span class="fr_count"></span> friend requests? </h3>
                </div>
            </div>
            <div class="modal-footer-row">
                <button type="button" class="btn del_cancel" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn del_delete" onclick="SubmitMultipleForm('sentMultiple', 'confirmModal');">Confirm</button>
            </div>
        </div>
    </div>
</div>