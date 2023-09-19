<div>
    @if ($user)
        @foreach ($user->toArray() as $key => $value)
            <p><strong>{{$key}}: </strong>{{$value}}</p>
        @endforeach
    @else
        <p><strong>No user.</strong></p>
    @endif
</div>
