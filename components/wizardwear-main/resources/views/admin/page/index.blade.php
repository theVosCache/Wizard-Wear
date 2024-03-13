@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Alle Pagina's</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-end">
                                <a href="{{ route('admin.page.create') }}" class="btn btn-success">
                                    Maak een nieuwe pagina
                                </a>
                            </div>
                            <div class="col-12">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Aangemaakt door</th>
                                        <th>Path</th>
                                        <th>Title</th>
                                        <th>Aantal Blocks</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pages as $page)
                                        <tr>
                                            <td>{{ $page->id }}</td>
                                            <td>{{ $page->user?->name }}</td>
                                            <td>{{ $page->path }}</td>
                                            <td>{{ $page->title }}</td>
                                            <td>{{ $page->blockCount }}</td>
                                            <td>
                                                <a href="{{ route('admin.page.show', $page) }}" class="btn btn-success">Show</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
