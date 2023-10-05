
@if(!empty($data))
<ul >
    @foreach($data as $key => $value)
        <li><a href="{{ route('breeds.find.slug', ['slug' => $value->slug]) }}">{{ $value->name }} </a></li>
    @endforeach
</ul>
@endif