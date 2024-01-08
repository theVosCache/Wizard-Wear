<div wire:poll>
    @if($joined)
        <button class="btn btn-success" wire:click="unJoinEvent()">Aanwezig</button>
    @else
        <button class="btn btn-danger" wire:click="joinEvent()">Afwezig</button>
    @endif
</div>
