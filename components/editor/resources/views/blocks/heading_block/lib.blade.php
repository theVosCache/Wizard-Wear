<div class="card text-center">
    <div class="card-img-top bg-body-secondary">
        <h2>
            <i class="fa-solid {{ $this::ICON }}"></i>
        </h2>
    </div>
    <div class="card-header">
        {{ $this::TYPE }}
    </div>
    <div class="card-body p-2">
        <button
            class="btn btn-secondary form-control"
            wire:click="addBlockToEditor"
        >
            Add
        </button>
    </div>
</div>
