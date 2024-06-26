@extends('layouts.app')

@section('title', 'Password required - Order of Merlin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Confirm Password</div>
                    <div class="card-body">
                        <form action="{{ route('password.confirm') }}" method="post">
                            @csrf

                            <div class="input-group mb-3">
                                <label class="input-group-text col-3" for="password">
                                    <strong class="ms-auto">
                                        Password
                                    </strong>
                                </label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="**************" required>
                            </div>

                            <div class="row">
                                <input type="submit" value="Confirm Password" class="btn btn-primary form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
