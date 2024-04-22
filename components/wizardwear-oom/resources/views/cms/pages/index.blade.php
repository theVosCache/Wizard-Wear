@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Page Management</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <a href="{{ route('admin.cms.page.create') }}" class="btn btn-primary">
                                    Create a new Page
                                </a>
                            </div>
                            <div class="col-12">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Linked to navigation</th>
                                        <th>Name</th>
                                        <th>Url</th>
                                        <th>ContentBlocks</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pages as $page)
                                        <tr>
                                            <td>
                                                @if($page->navigation->count() !== 0)
                                                    <span class="text-success">Yes</span>
                                                @else
                                                    <span class="text-danger">No</span>
                                                @endif
                                            </td>
                                            <td>{{ $page->name }}</td>
                                            <td>{{ $page->slug }}</td>
                                            <td>{{ count($page->content ?? []) }}</td>
                                            <td>
                                                <a href="{{ route('admin.cms.page.show', $page) }}"
                                                   class="btn btn-info">Show</a>
                                                <a href="{{ route('admin.cms.page.edit', $page) }}"
                                                   class="btn btn-warning">Edit</a>
                                                <a href="#" class="btn btn-danger">Delete</a>
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
