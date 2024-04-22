@extends('layouts.simple')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Edit Page: {{ $page->name }} (path: {{ $page->slug }})</div>
                    <div class="card-body text-black">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <a href="{{ route('admin.cms.page.index') }}" class="btn btn-primary">
                                    <i class="fa-solid fa-arrow-left"></i> Back to overview
                                </a>
                            </div>
                            <div class="col-12">
                                @livewire('dropblockeditor',[
                                    'title' => $page->name,
                                    'activeBlocks' => $page->content['blocks'] ?? []
                                ])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
