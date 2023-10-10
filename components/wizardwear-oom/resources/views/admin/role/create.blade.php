@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create a new Role</div>
                    <div class="card-body">
                        <form action="{{ route('admin.role.store') }}" method="post">
                            @csrf

                            <x-input type="errors" />
                            <x-input type="text" name="name" label="Name" required/>
                            <x-input type="text" name="slug" label="Slug" required/>
                            <x-input type="boxes" name="user_ids" label="Selected users?"
                                     :options="$users" multiple/>

                            <x-input type="submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
