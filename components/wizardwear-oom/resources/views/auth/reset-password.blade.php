@extends('layouts.app')

@section('title', 'Set new Password - Order of Merlin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Set new Password</div>
                    <div class="card-body">
                        <form action="{{ route('password.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="input-group mb-3">
                                <label class="input-group-text col-3" for="email">
                                    <strong class="ms-auto">Email</strong>
                                </label>
                                <input type="email" class="form-control disabled" name="email" id="email" placeholder="merlin@order.magic" value="{{ $email ?? null }}" required readonly>
                            </div>

                            <div class="input-group mb-3">
                                <label class="input-group-text col-3" for="password">
                                    <strong class="ms-auto">
                                        Password
                                    </strong>
                                </label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="**************" required>
                            </div>

                            <div class="input-group mb-3">
                                <label class="input-group-text col-3" for="password_confirmation">
                                    <strong class="ms-auto">
                                        Password confirmation
                                    </strong>
                                </label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="**************" required>
                            </div>

                            <div class="offset-3 col-9">
                                <input type="submit" value="Register account" class="btn btn-primary form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
