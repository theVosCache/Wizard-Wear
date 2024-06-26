@extends('layouts.app')

@section('title', 'Password reset - Order of Merlin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Recovery your magic</div>
                    <div class="card-body">
                        <form action="{{ route('password.request') }}" method="post">
                            @csrf

                            <div class="input-group mb-3">
                                <label class="input-group-text col-3" for="email">
                                    <strong class="ms-auto">Email</strong>
                                </label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="merlin@order.magic" required>
                            </div>

                            <div class="offset-3 col-9">
                                <input type="submit" value="Reset" class="btn btn-primary form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
