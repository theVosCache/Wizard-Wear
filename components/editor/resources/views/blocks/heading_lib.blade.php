<div class="col-6">
    <div class="card text-center">
        <div class="card-img-top bg-body-secondary">
            <h1>
                <i class="fa-solid {{ $this::$config['icon'] }}"></i>
            </h1>
        </div>
        <div class="card-header">
            {{ $this::$config['type'] }}
        </div>
        <div class="card-body">
            <button
                class="btn btn-secondary form-control"
                wire:click="addBlockToEditor"
            >
                Add
            </button>
        </div>
    </div>
</div>