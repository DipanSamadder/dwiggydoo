
@if(!empty($data))
<ul >
    @foreach($data as $key => $value)
        <li>{{ $value->name }}</li>
    @endforeach
</ul>
@endif