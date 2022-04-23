@extends('backend.dark-app')

@section('title')
    Service Requests
@stop

@section('content')
    @component('backend.components.breadcrumbs')
        @slot('page', 'Service Requests')
    @endcomponent

    @include('backend.requests.filter')

    <table id="datatable-buttons1" class="table dt-responsive nowrap"  style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>User</th>
                <th>Service</th>
                <th>Phone Number</th>
                <th>Health Card Number</th>
                <th>Day Date</th>
                <th>Time</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($requests as $request)
                <tr>
                    <th> <a href="{{ route('user.show', $request->patient()->id) }}"> {{ $request->patient()->name }}
                        </a>
                    </th>
                    <th>{{ $request->vaccine->name }}</th>
                    <th>{{ $request->patient()->phone }}</th>
                    <th>{{ $request->patient_hcm }}</th>
                    <th>{{ $request->day_date }}</th>
                    <th>{{ $request->day_time }}</th>
                    <th>
                        <a href="{{ route('show.request', [$request->vaccine->id ,$request]) }}"
                            class="btn btn-outline-warning waves-effect waves-light btn-sm">
                            <i data-feather="eye"></i>
                        </a>
                    </th>
                </tr>
            @empty
                <tr>
                    <th>No Requests Yet.</th>
                </tr>
            @endforelse

        </tbody>
    </table>
@endsection

@push('js')
    @include('backend.layouts.datayables-scripts')
@endpush
