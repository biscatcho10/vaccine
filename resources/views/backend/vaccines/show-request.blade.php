@extends('backend.dark-app')

@section('title')
    Show Vaccine Request
@stop

@section('content')

    @component('backend.components.breadcrumbs')
        @slot('parent', $vaccine->name)
        @slot('parentUrl', route('vaccine.show', $vaccine))
        @slot('page', 'Request')
    @endcomponent

    @component('backend.components.box')
        @slot('bodyClass', 'p-0')
        @slot('title', 'Request Data')

        <table class="table table-middle">
            <tbody>
                <tr>
                    <th width="200">Date</th>
                    <td>{{ $request->day_date }}</td>
                </tr>
                <tr>
                    <th width="200">Time</th>
                    <td>{{ $request->day_time }}</td>
                </tr>
                <tr>
                    <th width="200">Eligapility</th>
                    <td>{{ $request->eligapility }}</td>
                </tr>

                @if ($vaccine->has_diff_ages)
                    <tr>
                        <th width="200">Age</th>
                        <td>{{ $request->age }}</td>
                    </tr>
                @endif

                <tr>
                    <th width="200">Creation Date</th>
                    <td>{{ $request->created_at_date }}</td>
                </tr>
            </tbody>
        </table>
    @endcomponent


    @component('backend.components.box')
        @slot('bodyClass', 'p-0')
        @slot('title', 'Patient Data')

        @include('backend.layouts.partials.session')

        <table class="table table-middle">
            <tbody>
                <tr>
                    <th width="200">Patient Name</th>
                    <td>{{ $request->patient()->name }}</td>
                </tr>
                <tr>
                    <th width="200">Patient Phone</th>
                    <td>{{ $request->patient()->phone }}</td>
                </tr>
                <tr>
                    <th width="200">Patient Health Card Number</th>
                    <td>{{ $request->patient_hcm }}</td>
                </tr>
            </tbody>
        </table>
    @endcomponent

    @component('backend.components.box')
        @slot('bodyClass', 'p-0')
        @slot('title', 'Questions')

        <table class="table table-middle">
            <tbody>
                @foreach ($request->answers as $question => $answer)
                    <tr>
                        <th width="200">{{ $question }}</th>
                        <td>{{ $answer }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endcomponent



@endsection
