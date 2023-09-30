@extends('oom.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">All pages</div>
                    <div class="card-body">
                        <a href="{{ route('oom.admin.page.create') }}" class="btn btn-success float-end">Create</a>

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Path</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Updated</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td>{{ $page->id }}</td>
                                    <td>{{ $page->path }}</td>
                                    <td>{{ $page->name }}</td>
                                    <td>{{ $page->description }}</td>
                                    <td>
                                        Updated: {{ $page->updated_at->format('H:i d-m-Y') }} <br>
                                        Created: {{ $page->created_at->format('H:i d-m-Y') }}
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
@endsection
