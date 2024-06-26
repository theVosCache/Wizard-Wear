@extends('layouts.app')

@section('title', '2FA Login')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Enter your 2FA code</div>
                    <div class="card-body">
                        <form action="{{ route('two-factor.login') }}" method="post">
                            @csrf

                            <div class="input-group mb-3">
                                <label class="input-group-text col-3" for="code">
                                    <strong class="ms-auto">Code</strong>
                                </label>
                                <input type="text" class="form-control" name="code" id="code" autocomplete="off">
                            </div>

                            <input type="submit" value="Enter 2FA Code" class="btn btn-success form-control">

                            <h3 class="text-warning-emphasis">In case you lost your 2FA device, you can you a recovery
                                code</h3>
                            <button form="" role="button" class="btn btn-warning btn-toggle" id="2fa-rcode-button" data-target="2fa-rcode">Use Recovery
                                Code
                            </button>
                            <div class="mt-3 d-none" id="2fa-rcode">
                                <div class="input-group mb-3">
                                    <label class="input-group-text col-3" for="recovery_code">
                                        <strong class="ms-auto">Recovery Code</strong>
                                    </label>
                                    <input type="text" class="form-control" name="recovery_code" id="recovery_code"
                                           autocomplete="off">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
