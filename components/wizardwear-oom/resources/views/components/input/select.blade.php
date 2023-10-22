<div class="input-group mb-3">
    <span class="input-group-text col-3">
        <label for="{{ $name }}" class="ms-auto">
            {{ $label }}
        </label>
    </span>
    <select name="{{ $name }}"
            id="{{ $name }}" class="form-select @error($name) is-invalid @enderror"
        @required($attributes->has('required'))>
        <option value="" selected @disabled(!$attributes->has('required'))>------------------</option>
        @foreach($attributes->get('options') as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
        @endforeach
    </select>
</div>
