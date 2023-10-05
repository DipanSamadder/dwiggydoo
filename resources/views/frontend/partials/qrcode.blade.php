
<div class="qrcode_sec">
    <div class="notification_inner_sec">
        <div class="col-lg-12 search_top">
            <div class="col-lg-9">
            <h2><i class="fa-solid fa-arrow-left"></i>&nbsp; My QR Code </h2>
            </div>
            <div class="col-lg-3 text-end qr_code_share">
            <span onclick="downloadQRCode('#DogQRcodeImage');" role="button"><i class="fa-solid fa-download"></i></span> <span role="button" onclick="ShareQRCode('#DogQRcodeImage');"><i class="fa-solid fa-share-nodes"></i></span>
            </div>
        </div>
        <div class="col-lg-11 mx-auto qr_code_srch">
            @include('frontend.components.sessions.dogs.profile-on-qrcode')
            
            <div class="col-lg-12 qrcode_image text-center">
                <img src="{{ asset('uploads/barcodes/'.Session::get('defaultDogDetails.id').'.jpg') }}" id="DogQRcodeImage" alt="" class="img-fluid p-3"/>
            </div>
            <div class="col-lg-12 qr_scan_btn">
                <button type="button"><span><i class="fa-solid fa-camera"></i></span>&nbsp; scan QR code</button>
            </div>
        </div>
    </div>
</div>