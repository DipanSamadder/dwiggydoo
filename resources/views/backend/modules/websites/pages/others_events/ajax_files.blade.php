
<table class="table table-bordered table-striped table-hover dataTable">
    <thead>
            <tr class="text-center">
                <th width="5">Sr</th>
                <th width="10">Photo</th>
                <th width="60">Detials</th>

                @if(dsld_have_user_permission('others-events_edit') == 1)
                <th width="10">Status</th>
                @endif

                @if(dsld_have_user_permission('others-events_delete') == 1 || dsld_have_user_permission('others-events_edit') == 1)
                <th width="15">Action</th>
                @endif
            </tr>
        </thead>
        <tfoot>
            <tr class="text-center">
                <th width="5">Sr</th>
                <th width="10">Photo</th>
                <th width="60">Detials</th>

                @if(dsld_have_user_permission('others-events_edit') == 1)
                <th width="10">Status</th>
                @endif

                @if(dsld_have_user_permission('others-events_delete') == 1 || dsld_have_user_permission('others-events_edit') == 1)
                <th width="15">Action</th>
                @endif
            </tr>
        </tfoot>
    <tbody>
        @if(is_array($data) || count($data) > 0 )
            @foreach($data as $key => $value)
        
                <tr>
                    <th width="5" scope="row">{{ $key+1 }}</th>
                    
                    <td width="10">
                        @if($value->banner > 0)<img src="{{ dsld_uploaded_asset($value->banner) }}" alt="{{ dsld_upload_file_title($value->banner) }}" class="page_banner_icon">
                        @else
                            <img src="{{ dsld_static_asset('backend/assets/images/xs/avatar1.jpg') }}" alt="Dummy Image" class="page_banner_icon">
                        
                        @endif
                    </td>
                    <td width="60">
                       Name: <strong>{{ $value->title }}</strong><br>
                       <small><strong>Category: </strong>{{ $value->cat_type }}</small><br>
                       <!-- <small><strong>Message: </strong>{{ $value->content }}</small> -->

                    </td>
                    @if(dsld_have_user_permission('others-events_edit') == 1)
                    <td width="10">

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="status_institute_type{{$value->id }}" onchange="DSLDStatusUpdate('{{ $value->id }}','{{ $value->status == 1 ? 0 : 1  }}', '{{ route('pages.status') }}','{{ csrf_token() }}')" @if($value->status == 1) checked @endif >
                        <label class="custom-control-label" for="status_institute_type{{$value->id }}"></label>
                    </div>

                    </td>
                    @endif

                    @if(dsld_have_user_permission('others-events_delete') == 1 || dsld_have_user_permission('others-events_edit') == 1)
                    <td width="15">
                            @if(dsld_have_user_permission('others-events_edit') == 1)
                            <a href="javascript:void(0)"  onclick="edit_lg_modal_form({{ $value->id }}, '{{ route('others_event.edit') }}', 'Category');" class="btn btn-default waves-effect waves-float btn-sm waves-red bg-primary">
                                <i class="zmdi zmdi-edit"></i>
                            </a>
                            @endif
                            @if(dsld_have_user_permission('others-events_delete') == 1)
                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float btn-sm waves-red bg-danger" onclick="DSLDDeleteAlert('{{ $value->id }}','{{ route('pages.destory') }}','{{ csrf_token() }}')">
                                    <i class="zmdi zmdi-delete"></i>
                            </a>
                            @endif
                        </p>
                    </td>
                    @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8" class="text-center">Nothing Found</td>
            </tr>
        @endif
    </tbody>
</table>

{{  $data->links('backend.pagination.custom') }}
