<div class="row">
    <div class="col-12">
        <div class="input-group mb-3">
            <span class="input-group-text col-3">
                <label for="name" class="ms-auto">
                    <x-lang translation-string="Name" key="main" /> *
                </label>
            </span>
            <input
                type="text"
                id="name" wire:model.live="name"
                class="form-control @error('name') is-invalid @enderror"
            >
        </div>
    </div>
    <div class="col-12">
        <div class="input-group mb-3">
            <span class="input-group-text col-3">
                <label for="slug" class="ms-auto">
                    URL
                </label>
            </span>
            <input
                type="text"
                id="slug" wire:model.live="slug"
                class="form-control disabled @error('slug') is-invalid @enderror"
                disabled
            >
        </div>
    </div>

    <div class="col-12">
        <button class="btn btn-primary form-control" wire:click="save">
            <x-lang translation-string="Maak pagina" key="admin" />
        </button>
    </div>
</div>


