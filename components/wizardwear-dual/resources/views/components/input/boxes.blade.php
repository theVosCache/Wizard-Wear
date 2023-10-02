<div class="form-group mb-3">
        <div class="offset-3">
            <label for="{{ $name }}">
                {{ $label }}
            </label>
            @foreach($attributes->get('options') as $value => $label2)
                <div class="form-check">
                    @if($attributes->has('multiple'))
                        <input
                            type="checkbox" name="{{ $name }}[]"
                            id="{{ $value }}-id" value="{{ $value }}"
                            @if($attributes->has('selected') && $attributes->get('selected')->contains($value)) checked @endif
                        >
                    @else
                        <input
                            type="radio" name="{{ $name }}"
                            id="{{ $value }}-id" value="{{ $value }}"
                            @if($attributes->has('selected') && $attributes->get('selected') === $value) checked @endif
                        >
                    @endif
                    <label for="{{ $value }}-id">{{ $label2 }}</label>
                </div>
            @endforeach
        </div>
    </div>
