@extends('backend.dark-app')

@section('title')
    Show Service Request
@stop

@section('content')
    @component('backend.components.breadcrumbs')
        @slot('parent', $vaccine->name)
        @slot('parentUrl', route('vaccine.show', $vaccine))
        @slot('page', 'Request')
    @endcomponent

    @include('backend.vaccines.partials.actions.cancel')
    @include('backend.vaccines.partials.actions.print')

    <div id="printBody">
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
                        <th width="200">Acknowledgment</th>
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
                        <th width="300">Patient Name</th>
                        <td>{{ $request->patient()->name }}</td>
                    </tr>
                    <tr>
                        <th width="300">Patient Phone</th>
                        <td>{{ $request->patient()->phone }}</td>
                    </tr>
                    <tr>
                        <th width="300">Patient Health Card Number</th>
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
                    @foreach ($request->answers as $question => $answers)
                        @if (is_array($answers))
                            <tr>
                                <th width="300">{{ str_replace('_', ' ', $question) }}</th>
                                <td>{{ implode(' / ', $answers) }}</td>
                            </tr>
                        @else
                            <tr>
                                <th width="300">{{ str_replace('_', ' ', $question) }}</th>
                                <td>{{ $answers }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endcomponent

        @if ($request->comment != null)
            @component('backend.components.box')
                @slot('bodyClass', 'p-0')
                @slot('title', 'Comment')

                <table class="table table-middle">
                    <tbody>
                        <tr>
                            <th width="300">Comment</th>
                            <td>{{ $request->comment }}</td>
                        </tr>
                    </tbody>
                </table>
            @endcomponent
        @endif
    </div>

@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/print-js/1.6.0/print.js"
        integrity="sha512-/fgTphwXa3lqAhN+I8gG8AvuaTErm1YxpUjbdCvwfTMyv8UZnFyId7ft5736xQ6CyQN4Nzr21lBuWWA9RTCXCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
