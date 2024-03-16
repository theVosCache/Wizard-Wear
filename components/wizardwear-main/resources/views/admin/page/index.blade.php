@extends('layouts.app')

@section('title')
    <x-lang translation-string="Page management" key="admin"/>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <x-lang translation-string="Page management" key="admin"/>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-end">
                                <a href="{{ route('admin.page.create') }}" class="btn btn-success">
                                    <x-lang translation-string="Create a new Page" key="admin" />
                                </a>
                            </div>
                            <div class="col-12">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>
                                            <x-lang translation-string="Name" key="main" />
                                        </th>
                                        <th>
                                            URL
                                        </th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($pages as $page)
                                        <tr>
                                            <td>{{ $page->name }}</td>
                                            <td>{{ $page->slug }}</td>
                                            <td>
                                                @if($page->created_at !== $page->updated_at)
                                                    <x-lang translation-string="Updated at" key="main" /> {{ $page->updated_at?->format('d-m-Y') }} <br>
                                                @endif
                                                <x-lang translation-string="Created at" key="main" /> {{ $page->created_at?->format('d-m-Y') }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.page.edit', $page) }}" class="btn btn-warning">
                                                    <x-lang translation-string="Show" key="main" />
                                                </a>
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
