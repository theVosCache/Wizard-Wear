@extends('oom.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create a new Role</div>
                    <div class="card-body">
                        <a href="{{ route('oom.admin.role.index') }}" class="btn btn-secondary float-end mb-3">
                            Back to overview
                        </a>

                        <form action="{{ route('oom.admin.role.update', $role) }}" method="post">
                            @csrf
                            @method('PUT')

                            <x-input type="errors" />
                            <x-input type="text" name="name" label="Name" :value="$role->name" required/>
                            <x-input type="text" name="slug" label="Slug" :value="$role->slug" required/>
                            <x-input type="boxes" name="users" label="Select Users for this role"
                                     :options="$users" :selected="$role->users->pluck('id')" multiple />

                            <x-input type="submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
