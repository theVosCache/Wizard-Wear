<div class="row" wire:poll>
    <div class="col-6">
        <div class="card">
            <div class="card-header">Your Characters</div>
            <div class="card-body">
                <button class="btn btn-secondary ms-auto d-block mb-3"
                        x-on:click="$wire.newCharacterButton">
                    Create new Character
                </button>
                The highlighted character is your default character
            </div>
            <ul class="list-group list-group-flush">
                @foreach($user->characters ?? [] as $character)
                    @php
                        $bgColor = match($character->house) {
                            'gryffindor' => 'bg-danger-subtle',
                            'hufflepuff' => 'bg-warning-subtle',
                            'ravenclaw' => 'bg-info-subtle',
                            'slytherin' => 'bg-success-subtle',
                            default => 'bg-secondary-subtle'
                        }
                    @endphp
                    <li class="list-group-item @if($character->id === $user->default_character_id) {{ $bgColor }} @endif">
                        <div class="row">
                            <div class="col-2">
                                <img
                                    src="{{ $character->houseCrestImgPath }}"
                                    alt="{{ $character->house }}"
                                    class="img-fluid" style="height: 3rem;">
                            </div>
                            <div class="col-6">
                                {{ $character->name }} <br>
                                <span class="text-muted">{{ $character->about }}</span>
                            </div>
                            <div class="col-4">
                                @if($user->default_character_id !== $character->id)
                                    <button class="btn btn-secondary mb-2"
                                            x-on:click="$wire.markCharacterDefault('{{ $character->uuid }}')">
                                        Mark as Default Character
                                    </button>
                                @endif
                                <button class="btn btn-warning"
                                        x-on:click="$wire.editCharacter('{{ $character->uuid }}')">
                                    Edit
                                </button>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">{{ $formTitle }}</div>
            <div class="card-body">
                <form wire:submit="saveNewCharacter">
                    @if(!empty($avatar))
                        <div class="offset-3 mb-4">
                            <img
                                src="{{ $avatar->temporaryUrl() }}"
                                alt="avatar"
                                class="img-fluid">
                        </div>
                    @endif
                    <div class="input-group mb-3">
                        <span class="input-group-text col-3">
                            <label for="avatar" class="ms-auto">Upload Avatar</label>
                        </span>
                        <input
                            type="file"
                            id="avatar"
                            class="form-control"
                            wire:model="avatar"
                        >
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text col-3">
                            <label for="name" class="ms-auto">Name</label>
                        </span>
                        <input
                            type="text"
                            id="name"
                            class="form-control"
                            placeholder="Name"
                            wire:model="name"
                        >
                    </div>
                    @if(!empty($house))
                        <div class="offset-3 mb-4">
                            <img
                                src="/storage/{{ $house }}-house-crest.webp"
                                alt="{{ $house }}"
                                class="img-fluid">
                        </div>
                    @endif
                    <div class="input-group mb-3">
                        <span class="input-group-text col-3">
                            <label for="house" class="ms-auto">House</label>
                        </span>
                        <select id="house" wire:model="house" class="form-select">
                            <option value="" selected></option>
                            <option value="gryffindor">Gryffindor</option>
                            <option value="hufflepuff">Hufflepuff</option>
                            <option value="ravenclaw">Ravenclaw</option>
                            <option value="slytherin">Slytherin</option>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text col-3">
                            <label for="about" class="ms-auto">About</label>
                        </span>
                        <textarea wire:model="about" class="form-control" id="about"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success form-control">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
