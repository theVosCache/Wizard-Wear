<div>
    <script src="https://kit.fontawesome.com/dee40be14a.js" crossorigin="anonymous"></script>
    <div class="row">
        <div class="col-12">
            <h1>Content Editor</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col-10">
                    @foreach($blocks as $block)
                        @livewire($block['type'], [
                            'renderMethod' => 'edit',
                            ...$block['data']
                        ])
                    @endforeach
                </div>
                <div class="col-2">
                    <button class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
        <div class="col-4 border border-secondary border-1 p-2">
            <div class="row">
                <div class="col-12 text-center"><h2>Available blocks</h2></div>
                @foreach($availableBlocks as $libBlock)
                    @livewire($libBlock, ['renderMethod' => 'lib'])
                @endforeach
            </div>
        </div>
    </div>
</div>