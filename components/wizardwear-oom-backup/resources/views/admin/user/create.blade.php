@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create a new User</div>
                    <div class="card-body">
                        <form action="{{ route('admin.user.store') }}" method="post">
                            @csrf

                            <x-input type="text" name="name" label="Name" required/>
                            <x-input type="text" name="email" label="Email" required/>
                            <x-input type="text" name="city" label="City"/>
                            <x-input type="submit" label="Create"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
