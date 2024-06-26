@extends('layouts.app')

@section('title', '2FA settings')

@section('content')
    @if(session('status') === 'two-factor-authentication-enabled')
        <div class="alert alert-warning" role="alert">
            Please finish configuring two factor authentication below
        </div>
    @endif

    @if (session('status') == 'two-factor-authentication-confirmed')
        <div class="alert alert-success" role="alert">
            Two factor authentication Confirmed and Enabled
        </div>
    @endif
    <div class="row">
        <div class="col-4">
            @if(empty($user->two_factor_secret))
                <div class="card">
                    <div class="card-header bg-info-subtle">Enabled 2FA</div>
                    <div class="card-body">
                        <form action="{{ route('two-factor.enable') }}" method="post">
                            @csrf

                            <input type="submit" value="Enable" class="btn btn-outline-success form-control">
                        </form>
                    </div>
                </div>
            @else
                @if(empty($user->two_factor_confirmed_at))
                    <div class="card text-center mb-3">
                        <div class="card-header bg-warning-subtle">Configure 2FA</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    {!! $user->twoFactorQrCodeSvg() !!}
                                </div>
                                <div class="col-12">
                                    <form action="{{ route('two-factor.confirm') }}" method="post">
                                        @csrf

                                        <div class="input-group mb-3">
                                            <label class="input-group-text col-3" for="code">
                                                <strong class="ms-auto">Code</strong>
                                            </label>
                                            <input type="text" class="form-control" name="code" id="code" autocomplete="off" required>
                                        </div>

                                        <input type="submit" value="Confirm 2FA" class="btn btn-success form-control">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="card text-center">
                    <div class="card-header bg-danger text-white">Disabled 2FA</div>
                    <div class="card-body">
                        <form action="{{ route('two-factor.disable') }}" method="post">
                            @csrf
                            @method('DELETE')

                            <input type="submit" value="Disable" class="btn btn-danger form-control">
                        </form>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">2FA Information</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            2FA Status:
                            @if(!empty($user->two_factor_secret) && empty($user->two_factor_confirmed_at))
                                <span class="text-warning">Enabled but not Configured or Confirmed</span>
                            @elseif($user->hasEnabledTwoFactorAuthentication())
                                <span class="text-success">Active</span>
                            @else
                                <span class="text-danger">Inactive</span>
                            @endif
                        </div>
                        <div class="col-8">
                            @if($user->hasEnabledTwoFactorAuthentication())
                                <h4>Recovery Codes</h4>
                                <table class="table table-striped">
                                    @foreach((array) $user->recoveryCodes() as $recoveryCode)
                                        <tr>
                                            <th>{{ $recoveryCode }}</th>
                                        </tr>
                                    @endforeach
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
