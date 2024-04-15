@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Edit DnD Campaign: {{ $dndCampaign->name }}</div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col">
                                <a href="{{ route('dnd.dnd-campaign.show', $dndCampaign) }}" class="btn btn-secondary">
                                    Back to overview
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <livewire:dnd.campaign-main-data-editor
                                :dndCampaign="$dndCampaign"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
