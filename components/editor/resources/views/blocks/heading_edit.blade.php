<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">Heading Block</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <select class="form-select">
                            <option disabled>Select Heading</option>
                            <option value="h1" @selected($size === 'h1')>Heading 1</option>
                            <option value="h2" @selected($size === 'h2')>Heading 2</option>
                            <option value="h3" @selected($size === 'h3')>Heading 3</option>
                            <option value="h4" @selected($size === 'h4')>Heading 4</option>
                            <option value="h5" @selected($size === 'h5')>Heading 5</option>
                            <option value="h6" @selected($size === 'h6')>Heading 6</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control"
                               placeholder="Enter Text here....." value="{{ $text }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>