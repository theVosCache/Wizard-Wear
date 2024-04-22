<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Navigation level</th>
                    <th>Label</th>
                    <th>Linked Page</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($navigations as $nav)
                    <tr>
                        <td>{{ $nav->level }}</td>
                        <td>{{ $nav->label }}</td>
                        <td>{{ $nav->page?->name }}</td>
                        <td>
                            <div class="row">
                                <div class="col-4">
                                    @if(!$loop->first)
                                        <a href="#" wire:click="moveItemUp('{{ $nav->uuid }}')"
                                           class="text-decoration-none text-black">
                                            <i class="fa-solid fa-arrow-up"></i>
                                        </a>
                                    @endif
                                </div>
                                <div class="col-4">
                                    @if(!$loop->last)
                                        <a href="#" wire:click="moveItemDown('{{ $nav->uuid }}')"
                                           class="text-decoration-none text-black">
                                            <i class="fa-solid fa-arrow-down"></i>
                                        </a>
                                    @endif
                                </div>
                                <div class="col-4">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td>
                        <input type="text" placeholder="label" class="form-control" wire:model="label">
                    </td>
                    <td>
                        <select class="form-select" wire:model="pageId">
                            <option disabled>Select page</option>
                        </select>
                    </td>
                    <td>
                        <button class="btn btn-primary" wire:click="addRootLevel">Add</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
