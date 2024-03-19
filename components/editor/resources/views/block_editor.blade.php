<div style="min-height: 500px">
    <div class="row">
        <div class="col-12">
            <h1>Content Editor</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col-10">
                    @foreach($model->contentBlocks->sortBy('index') as $block)
                        <livewire:dynamic-component
                            :component="$block->type"
                            renderMethod="edit"
                            :contentBlock="$block"
                            wire:key="{{ $block->uuid }}"/>
                    @endforeach
                </div>
                <div class="col-2">
                    <button class="btn btn-success">Save</button>
                </div>
            </div>
        </div>

        <div class="col-4">
            <h3>Available Blocks</h3>
            <div class="row">
                @foreach($availableBlocks as $block)
                    <div class="col-6 mb-2">
                        <livewire:dynamic-component
                            :component="$block::TYPE"
                            renderMethod="lib"
                            wire:key="{{ uniqid() }}"/>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>