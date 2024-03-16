@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <x-lang
                            translation-string="Edit: :item"
                            key="main"
                            :data="['item'=> sprintf('%s (URL: %s)', $page->name, $page->slug)]"
                        />
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <h2>
                                    <x-lang translation-string="Edit name (display for admin panel)" key="admin" />
                                </h2>
                                <form action="{{ route('admin.page.update', $page) }}" method="post">
                                    @csrf
                                    @method('PUT')

                                    <x-input type="errors"/>
                                    <x-input type="text" name="name" :label="__('main.Name')" :value="$page->name" required/>
                                    <x-input type="submit" :label="__('main.Save')" />
                                </form>
                            </div>

                            <div class="col-12">
                                <livewire:block-editor
                                    :model="$page"
                                    :redirect-url="route('admin.page.index')"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
