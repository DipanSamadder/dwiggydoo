
<table class="table table-bordered table-striped table-hover dataTable">
    <thead>
            <tr class="text-center">
                <th>Sr</th>
                <th>Question & Answer</th>
                <th>Date</th>
                <th class="text-right">Options</th>
            </tr>
        </thead>
        <tfoot>
            <tr class="text-center">
                <th>Sr</th>
                <th>Question & Answer</th>
                <th>Date</th>
                <th class="text-right">Options</th>
            </tr>
        </tfoot>
    <tbody>
        @if(is_array($data) || count($data) > 0 )
            @foreach($data as $key => $value)
        
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td><strong>{{ $value->question }}</strong><br>
                        @php
                            foreach (json_decode($value->option) as $key => $op) {
                                $number = $key+1;
                                if($value->answer == $key){
                                    echo '<p class="text-success mb-0 font-weight-bold"><i class="las la-check"></i> '.$number.') '.$op."</p>";
                                }else{
                                    echo '<p class="mb-0"><i class="las la-check"></i> '.$number.') '.$op."</p>";
                                }
                            }
                        
                        @endphp
                    </td>
                    <td>{{ $value->published_date }}</td>
                    @if(dsld_check_permission(['edit not pet questions']))
                    <td>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="status_{{$value->id }}" onchange="DSLDStatusUpdate('{{ $value->id }}','{{ $value->status == 1 ? 0 : 1  }}', '{{ route('not_pet_questions.status') }}','{{ csrf_token() }}')" @if($value->status == 1) checked @endif >
                        <label class="custom-control-label" for="status_{{$value->id }}"></label>
                    </div>

                    </td>
                    @endif

                    @if(dsld_check_permission(['edit not pet questions', 'delete not pet questions']))
                    <td>
                            @if(dsld_check_permission(['edit not pet questions']))
                            <a href="javascript:void(0)"  onclick="edit_lg_modal_form({{ $value->id }}, '{{ route('not_pet_questions.edit') }}', 'Questions');" class="btn btn-default waves-effect waves-float btn-sm waves-red bg-primary">
                                <i class="zmdi zmdi-edit"></i>
                            </a>
                            @endif
                            @if(dsld_check_permission(['delete not pet questions']))
                            <a href="javascript:void(0);" class="btn btn-default waves-effect waves-float btn-sm waves-red bg-danger" onclick="DSLDDeleteAlert('{{ $value->id }}','{{ route('not_pet_questions.destory') }}','{{ csrf_token() }}')">
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
