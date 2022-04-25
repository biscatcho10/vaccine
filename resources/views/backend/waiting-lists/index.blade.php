@extends('backend.dark-app')

@section('title')
    Waiting List
@stop

@section('content')
    @component('backend.components.breadcrumbs')
        @slot('page', "Service's Waiting List")
    @endcomponent

    <div class="container">
        <div class="row">
            @forelse ($services as$service)
                <div class="col-3">
                    <div class="card text-center">
                        <a href="{{ route('waiting-list-vaccine', $service->id) }}">
                            <div class="card-body">
                                <h2 class="fw-bolder">{{ $service->name }}</h2>
                                <p class="card-text">{{ $service->waitingLists()->where('notification_sent', false)->count() }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning">
                        <h4 class="fw-bolder">No Waiting List</h4>
                        <p>There is no waiting list for any service.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

@endsection

@push('js')
    @include('backend.layouts.datayables-scripts')
@endpush
