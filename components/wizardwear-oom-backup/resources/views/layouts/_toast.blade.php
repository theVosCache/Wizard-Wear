<div class="toast-container position-fixed top-0 end-0 p-3">
    @if(session()->has('success'))
        <div class="toast" role="alert" data-bs-autohide="true">
            <div class="toast-header bg-success-subtle">
                <strong class="me-auto">{{ session()->get('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            @if(session()->has('success-extended-message'))
                <div class="toast-body">
                    {{ session()->get('success-extended-message') }}
                </div>
            @endif
        </div>
    @endif

    @if(session()->has('danger'))
        <div class="toast" role="alert" data-bs-autohide="true">
            <div class="toast-header bg-danger-subtle">
                <strong class="me-auto">{{ session()->get('danger') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            @if(session()->has('danger-extended-message'))
                <div class="toast-body">
                    {{ session()->get('danger-extended-message') }}
                </div>
            @endif
        </div>
    @endif

    @if($errors->any())
        <div class="toast show" role="alert" data-bs-autohide="true">
            <div class="toast-header bg-danger-subtle">
                <strong class="me-auto">Request Error</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Errors:
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
