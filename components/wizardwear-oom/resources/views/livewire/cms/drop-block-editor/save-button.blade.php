<div>
    @if(!empty($page))
        <button wire:click="save" class="btn btn-success">Save</button>
    @else
        <button class="btn btn-danger disabled" disabled>Save</button>
    @endif
</div>
