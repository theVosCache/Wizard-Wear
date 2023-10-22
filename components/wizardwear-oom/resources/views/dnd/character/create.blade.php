@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create a new Character</div>
                    <div class="card-body">
                        <form action="{{ route('dndCharacter.store') }}" method="post">
                            @csrf

                            <x-input type="errors" />
                            <x-input type="text" name="name" label="Name" required/>
                            <x-input type="select" name="house" label="House" :options="$houses" />

                            <x-input type="submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
