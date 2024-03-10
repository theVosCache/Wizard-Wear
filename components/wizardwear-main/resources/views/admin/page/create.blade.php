@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Maak een nieuwe pagina</div>
                    <div class="card-body">
                        <form action="{{ route('admin.page.store') }}" method="post">
                            @csrf
                            <x-input type="errors" />
                            <x-input type="text" name="title" label="Title" required/>
                            <x-input type="text" name="path" label="Pad" required/>

                            <x-input type="submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
