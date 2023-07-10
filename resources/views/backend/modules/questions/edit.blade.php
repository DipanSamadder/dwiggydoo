@if($data !='')

<input type="hidden" name="id" value="{{ $data->id }}">
<div class="body">
    <div class="row clearfix">
        <div class="col-sm-12">
            <div class="form-group">
                <label class="form-label">Question <small class="text-danger">*</small></label>                                 
                <input type="text" name="question" class="form-control" placeholder="Question" value="{{ $data->question }}" />                                   
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label class="form-label">Option <small class="text-danger">*</small></label>      
                <div class="edit-option-target">
                    @if(!empty($data->options))
                        @foreach (json_decode($data->options) as $key => $value)
                        <div class="row edit-row gutters-5">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Options" name="options[]" value="{{ $value }}">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>                                
            </div>
        </div>
        
        <div class="col-sm-12">
            <div class="form-group">
                <label class="form-label">Answer <small class="text-danger">*</small></label>                                 
                <select name="answer" class="form-control" required>
                        <option disabled selected value="">Select Answer</option>
                        <option value="0" @if($data->answer == 0) selected @endif>1st</option>
                        <option value="1" @if($data->answer == 1) selected @endif>2nd</option>
                        <option value="2" @if($data->answer == 2) selected @endif>3rd</option>
                        <option value="3" @if($data->answer == 3) selected @endif>4th</option>
                        <option value="4" @if($data->answer == 4) selected @endif>5th</option>
                    </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Publish Date</label>
                <input type="date" class="form-control"  name="published_date" placeholder="Publish Date" data-format="DD-MM-Y" data-advanced-range="false" autocomplete="off" onchange="date_change();" required value="{{ $data->published_date }}">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">                                 
                <label class="form-label">Status <small class="text-danger">*</small></label>                                 
                <select class="form-control w-100  ms select2 mr-2" name="status">
                    <option value="">-- Please select --</option>
                    <option value="1"  @if($data->status == 1) selected @endif>Active</option>
                    <option value="0" @if($data->status == 0) selected @endif>Deactive</option>
                </select>                            
            </div>
        </div>
    </div>

</div>
@endif
                