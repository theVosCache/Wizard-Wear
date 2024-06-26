@extends('layouts.app')

@section('title', 'Login - Order of Merlin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Order of Merlin Login</div>
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="post">
                            @csrf

                            <div class="input-group mb-3">
                                <label class="input-group-text col-3" for="email">
                                    <strong class="ms-auto">Email</strong>
                                </label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="merlin@order.magic" value="{{ old('email') }}" required>
                            </div>

                            <div class="input-group mb-3">
                                <label class="input-group-text col-3" for="password">
                                    <strong class="ms-auto">
                                        Password
                                    </strong>
                                </label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="**************" required>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <a href="{{ route('password.request') }}">Reset my password</a>
                                </div>

                                <div class="col-9">
                                    <input type="submit" value="Sign In" class="btn btn-primary form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
