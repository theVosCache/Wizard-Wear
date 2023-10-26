<div class="card">
    @if($character->avatar)
        <img src="{{ $character->avatar->storage_path }}" class="card-img-top">
    @endif
    <div class="card-header">{{ $character->name }}</div>
    <div class="card-body text-center">
        <img
            src="{{ $character->houseCrestImgPath }}"
            alt="{{ $character->house }}"
            class="img-fluid d-block mx-auto mb-4">
        {!! Str::substr($character->about, 0, 100) !!}
    </div>
</div>
