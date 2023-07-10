
<table class="table table-bordered table-striped table-hover dataTable">
    <thead>
            <tr class="text-center">
                <th>Sr</th>
                <th>Question</th>
                <th>Image</th>
                <th>User</th>
                <th>Approved</th>
                <th class="text-right">Submit Date</th>
            </tr>
        </thead>
        <tfoot>
            <tr class="text-center">
                <th>Sr</th>
                <th>Question</th>
                <th>Image</th>
                <th>User</th>
                <th>Approved</th>
                <th class="text-right">Submit Date</th>
            </tr>
        </tfoot>
    <tbody>
        @if(is_array($data) || count($data) > 0 )
            @foreach($data as $key => $value)
        
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td><strong>{{ $value->questions->question }}</strong><br>
                    </td>
                    <td>{{ $value->image }}</td>
                    <td>{{ $value->user->name }}</td>
                    @if(dsld_check_permission(['edit task approves']))
                    <td>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="status_{{$value->id }}" onchange="DSLDStatusUpdate('{{ $value->id }}','{{ $value->status == 1 ? 0 : 1  }}', '{{ route('task.approved') }}','{{ csrf_token() }}')" @if($value->status == 1) checked @endif >
                        <label class="custom-control-label" for="status_{{$value->id }}"></label>
                    </div>

                    </td>
                    @endif
                    <td>{{ $value->created_at }}</td>
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
