@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Maak een nieuw evenement</div>
                    <div class="card-body">
                        <form action="{{ route('admin.event.update', $event) }}" method="post">
                            @csrf
                            @method('PATCH')

                            <x-input type="text" name="name" label="Evenement naam" :value="$event->name" required/>
                            <x-input type="textarea" name="description" label="Omschrijving"
                                     :value="$event->description"/>
                            <x-input type="number" name="max_members" label="Maximaal aantal order leden die mee kunnen"
                                     :value="$event->max_members"/>
                            <x-input type="date" name="start" label="Start datum evenement"
                                     :value="$event->start?->format('Y-m-d')" required/>
                            <x-input type="date" name="end" label="Eind datum evenement"
                                     :value="$event->end?->format('Y-m-d')"/>

                            <x-input type="submit"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
