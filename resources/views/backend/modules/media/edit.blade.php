@if($data !='')
<input type="hidden" id="edit_id" value="{{ $data->id }}">
<div class="body">
    <div class="row clearfix">
        <div class="col-sm-12">
            <div class="form-group">
                <label class="form-label">Alt Tag <small class="text-danger">*</small></label>                                 
                <input type="text" name="name" id="edit_name" class="form-control" placeholder="Title" @if($data->name) value="{{ $data->name }}" @endif />                                   
            </div>
        </div>
    </div>
</div>
@endif
                