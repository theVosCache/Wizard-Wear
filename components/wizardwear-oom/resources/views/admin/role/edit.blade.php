@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Edit Role: {{ $role->name }}</div>
                    <div class="card-body">
                        <form action="{{ route('admin.role.update', $role) }}" method="post">
                            @csrf
                            @method('PUT')

                            <x-input type="errors" />
                            <x-input type="text" name="name" label="Name" :value="$role->name" required/>
                            <x-input type="text" name="slug" label="Slug" :value="$role->slug" required/>
                            <x-input type="boxes" name="user_ids" label="Selected users?"
                                     :options="$users" :selected="$role->users->pluck('id')" multiple/>

                            <x-input type="submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
