<input type="hidden" name="{{ $name }}" value="0">
<div class="input-group mb-3">
    <div class="input-group-text col-3 text-right form-check form-switch">
        <input
            class="form-check-input ms-auto" type="checkbox"
            role="switch" name="{{ $name }}" value="1" @checked($attributes->get('checked'))>
    </div>
    <input type="text" value="{{ $label }}" class="form-control disabled" disabled>
</div>
