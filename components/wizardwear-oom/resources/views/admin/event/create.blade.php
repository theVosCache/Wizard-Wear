@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Maak een nieuw evenement</div>
                    <div class="card-body">
                        <form action="{{ route('admin.event.store') }}" method="post">
                            @csrf

                            <x-input type="text" name="name" label="Evenement naam" required/>
                            <x-input type="textarea" name="description" label="Omschrijving"/>
                            <x-input type="number" name="max_members" label="Maximaal aantal order leden die mee kunnen" />
                            <x-input type="date" name="start" label="Start datum evenement" required/>
                            <x-input type="date" name="end" label="Eind datum evenement"/>

                            <x-input type="submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
