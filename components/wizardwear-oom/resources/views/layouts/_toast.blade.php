<div class="toast-container position-fixed top-0 end-0 p-3">
    @if(session()->has('status'))
        <div class="toast" role="alert" data-bs-autohide="true">
            <div class="toast-header bg-info-subtle">
                <strong class="me-auto">Status</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                @if(session('status') == 'verification-link-sent')
                    A new email verification link has been emailed to you!
                @elseif(session('status') == 'profile-information-updated')
                    Profile information saved
                @elseif(session('status') == 'password-updated')
                    New password saved
                @elseif(session('status') == 'two-factor-authentication-enabled')
                    2FA Enabled
                @elseif(session('status') == 'two-factor-authentication-confirmed')
                    2FA Successful Configured
                @elseif(session('status') == 'two-factor-authentication-disabled')
                    2FA Disabled
                @else
                    {{ session()->get('status') }}
                @endif
            </div>
        </div>
    @endif

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

    @if($errors->updatePassword->any())
        <div class="toast show" role="alert" data-bs-autohide="true">
            <div class="toast-header bg-danger-subtle">
                <strong class="me-auto">Error during updating password</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Errors:
                <ul>
                    @foreach($errors->updatePassword->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
