<div class="input-group mb-3">
    <span class="input-group-text col-3">
        <label for="{{ $name }}" class="ms-auto">
            {!! $label !!} @if($attributes->has('required'))*@endif
        </label>
    </span>
    <input
        type="{{ $type }}"
        id="{{ $name }}" name="{{ $name }}"
        class="form-control @error($name) is-invalid @enderror" placeholder="{{ $attributes->get('placeholder') }}"
        value="{{ old($name) ?? $value }}"
        @required($attributes->has('required'))
    >
</div>
