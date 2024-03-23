<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header text-center">
                {{ $title }}
            </div>
            <div class="card-body">
                <button class="btn btn-warning mb-3" wire:click="resetForm">Reset</button>
                <form wire:submit="saveNewItem">
                    @if(!empty($avatar))
                        <div class="offset-3 mb-4">
                            <img
                                src="{{ $avatar->temporaryUrl() }}"
                                alt="avatar"
                                class="img-fluid mh-150">
                        </div>
                    @endif
                    <div class="input-group mb-3">
                        <span class="input-group-text col-3">
                            <label for="avatar" class="ms-auto">Upload image</label>
                        </span>
                        <input type="file"
                               id="avatar" class="form-control"
                               wire:model="avatar">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text col-3">
                            <label for="name" class="ms-auto">Name</label>
                        </span>
                        <input
                            type="text"
                            id="name" class="form-control"
                            placeholder="Name"
                            wire:model="name">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text col-3">
                            <label for="description" class="ms-auto">Description</label>
                        </span>
                        <input
                            type="text"
                            id="description" class="form-control"
                            placeholder="Description"
                            wire:model="description">
                    </div>

                    <button type="submit" class="btn btn-success form-control">Save</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">My Items</div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name / Description</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>
                                <img src="{{ $item->avatarPath }}" alt="image of {{ $item->name }}"
                                     class="img-thumbnail mh-150">
                            </td>
                            <td>
                                {{ $item->name }} <br>
                                {{ $item->description }}
                            </td>
                            <td>
                                <button
                                    class="btn btn-warning form-control"
                                    wire:click="editItem('{{ $item->uuid }}')">
                                    Edit
                                </button>
                                <button
                                    class="btn btn-danger form-control mt-2"
                                    wire:click="deleteItem('{{ $item->uuid }}')">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
