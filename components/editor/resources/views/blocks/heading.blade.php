@switch($data['size'])
    @case('h1')
        <h1>{{ $data['text'] }}</h1>
    @break
    @case('h2')
        <h2>{{ $data['text'] }}</h2>
    @break
    @case('h3')
        <h3>{{ $data['text'] }}</h3>
    @break
    @case('h4')
        <h4>{{ $data['text'] }}</h4>
    @break
    @case('h5')
        <h5>{{ $data['text'] }}</h5>
    @break
    @case('h6')
        <h6>{{ $data['text'] }}</h6>
    @break
@endswitch