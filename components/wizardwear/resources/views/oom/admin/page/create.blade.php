@extends('oom.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create a new page</div>
                    <div class="card-body">
                        <form action="{{ route('oom.admin.page.store') }}" method="post">
                            @csrf

                            <x-input type="errors" />
                            <x-input type="text" name="name" label="Name" required/>
                            <x-input type="text" name="description" label="Description" required/>
                            <x-input type="text" name="path" label="Path" required />

                            <x-input type="submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
