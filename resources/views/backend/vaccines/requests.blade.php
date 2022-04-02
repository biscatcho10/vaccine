@extends('backend.dark-app')

@section('title')
    Vaccine Requests
@stop

@section('content')
    @component('backend.components.breadcrumbs')
        @slot('page', 'Vaccine Requests')
    @endcomponent

    <table id="datatable-buttons" class="table dt-responsive nowrap"  style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>User</th>
                <th>Phone Number</th>
                <th>Health Card Number</th>
                <th>Day Date</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($requests as $request)
                <tr>
                    <th> <a href="{{ route('user.show', $request->patient()->id) }}"> {{ $request->patient()->name }}
                        </a> </th>
                    <th>{{ $request->patient()->phone }}</th>
                    <th>{{ $request->patient_hcm }}</th>
                    <th>{{ $request->day_date }}</th>
                    <th>
                        <a href="{{ route('show.request', [$vaccine ,$request]) }}"
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
