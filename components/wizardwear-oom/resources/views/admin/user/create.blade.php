@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create a new User</div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="create-tab" data-bs-toggle="tab"
                                        data-bs-target="#create-tab-pane" type="button" role="tab"
                                        aria-controls="create-tab-pane" aria-selected="true">Create a new User
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="invite-tab" data-bs-toggle="tab"
                                        data-bs-target="#invite-tab-pane" type="button" role="tab"
                                        aria-controls="invite-tab-pane" aria-selected="false">Invite a new User
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="create-tab-pane" role="tabpanel"
                                 aria-labelledby="create-tab" tabindex="0">
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <form action="#" method="post">
                                            @csrf
                                            <x-input type="text" name="name" label="Name" required/>
                                            <x-input type="email" name="email" label="Email" required/>
                                            <x-input type="select" :options="$roles->pluck('name', 'id')"
                                                     name="role_id" label="Select a Role for the user"/>
                                            <x-input type="select" :options="$roles->pluck('name', 'id')"
                                                     name="role2_id" label="Select a Role for the user"/>
                                            <x-input type="select" :options="$roles->pluck('name', 'id')"
                                                     name="role3_id" label="Select a Role for the user"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="invite-tab-pane" role="tabpanel"
                                 aria-labelledby="invite-tab" tabindex="0">
                                Invite
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
