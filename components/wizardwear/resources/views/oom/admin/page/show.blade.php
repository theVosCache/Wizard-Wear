@extends('oom.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Page: {{ $page->name }}</div>
                    <div class="card-body">
                        <form action="{{ route('oom.admin.page.update', $page) }}" method="post">
                            @csrf
                            @method('PUT')

                            <x-input type="errors" />

                            @livewire('dropblockeditor', [
                                'title' => 'Content',
                                'name' => 'Content',
                            ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
