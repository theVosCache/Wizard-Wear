<div>
    <div class="row">
        <div class="col-12">
            <h1>Content Editor</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col-10">
                    @php
                        $i = 0;
                    @endphp
                    @foreach($blocks as $block)
                        <livewire:dynamic-component
                            :component="$block['type']"
                            renderMethod="edit"
                            :data="$block['data']"
                            :index="$i"
                            wire:key="{{ uniqid() }}"/>

                        @php
                            $i++;
                        @endphp
                    @endforeach
                </div>
                <div class="col-2">
                    <button class="btn btn-success" wire:click="save">Save</button>
                </div>
            </div>
        </div>

        <div class="col-4">
            <h3>Available Blocks</h3>
            <div class="row">
                @foreach($availableBlocks as $block)
                    <div class="col-6">
                        <livewire:dynamic-component
                            :component="$block::$config['type']"
                            renderMethod="lib"
                            wire:key="{{ uniqid() }}"/>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>