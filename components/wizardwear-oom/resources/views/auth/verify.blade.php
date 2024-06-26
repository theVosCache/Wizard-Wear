@extends('layouts.app')

@section('title', 'Verify Email - Order of Merlin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Verify your account</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-warning text-center" role="alert">
                                    Your account is unvalidated
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <form action="{{ route('verification.send') }}" method="post">
                                    @csrf

                                    <input type="submit" value="Resent validation email" class="btn btn-success form-control">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
