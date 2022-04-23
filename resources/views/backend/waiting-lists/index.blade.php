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
            @foreach ($services as$service)
                <div class="col-3">
                    <div class="card text-center">
                        <a href="{{ route('waiting-list-vaccine', $service->id) }}">
                            <div class="card-body">
                                <h2 class="fw-bolder">{{ $service->name }}</h2>
                                <p class="card-text">{{ $service->waitingLists()->count() }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

@push('js')
    @include('backend.layouts.datayables-scripts')
@endpush
