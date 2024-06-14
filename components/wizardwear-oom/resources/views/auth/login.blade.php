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
                                <label class="input-group-text col-3" for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>

                            <div class="input-group mb-3">
                                <label class="input-group-text col-3" for="password">Password / Wachtwoord</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>

                            <div class="input-group">
                                <input type="submit" value="Sign In / Inloggen" class="btn btn-primary form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
