<div>
    @foreach($contentBlocks as $block)
        <div class="col-12">
            <livewire:dynamic-component
                :component="$block->type"
                :data="$block->data"
                wire:key="{{ $block->uuid }}"/>
        </div>
    @endforeach
</div>