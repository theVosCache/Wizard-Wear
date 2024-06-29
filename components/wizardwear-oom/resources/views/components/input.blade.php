<div class="input-group mb-3">
    <label class="input-group-text col-3" for="{{ $name }}">
        <strong class="ms-auto">{{ $label }}</strong>
    </label>
    <input type="{{ $type }}" name="{{ $name }}" placeholder="{{ $attributes->get('placeholder') }}"
           {{ $attributes->merge(['class' =>'form-control']) }} id="{{ $name }}"
           value="{{ old($name) }}" @required($attributes->has('required')) @disabled($attributes->has('disabled'))>
</div>
