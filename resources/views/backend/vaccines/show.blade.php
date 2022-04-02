@extends('backend.dark-app')

@section('title')
    Show Vaccine
@stop

@section('content')

    @component('backend.components.breadcrumbs')
        @slot('parent', 'Vaccines')
        @slot('parentUrl', route('vaccine.index'))
        @slot('page', $vaccine->name)
    @endcomponent



    @component('backend.components.box')
        @slot('bodyClass', 'p-0')

        @include('backend.layouts.partials.session')

        <table class="table table-middle">
            <tbody>
                <tr>
                    <th width="200">Name</th>
                    <td>{{ $vaccine->name }}</td>
                </tr>
                @if ($vaccine->definded_period)
                    <tr>
                        <th width="200">From</th>
                        <td>{{ $vaccine->from }}</td>
                    </tr>
                    <tr>
                        <th width="200">To</th>
                        <td>{{ $vaccine->to }}</td>
                    </tr>
                @endif
                <tr>
                    <th width="200">Available Days</th>
                    <td>
                        <div class="row">
                            @foreach ($vaccine->days as $day)
                                <a href="{{ route('intervals', [$vaccine, $day]) }}" class="col-1 mx-2">
                                    <label class="custom-option-item text-center p-1" for="sunday" style="cursor:pointer">
                                        <i data-feather='calendar'></i>
                                        <span class="custom-option-item-title h4 d-block">{{ $day->name }}</span>
                                    </label>
                                </a>
                            @endforeach
                        </div>
                    </td>
                </tr>

                <tr>
                    <th width="200">Different Ages</th>
                    @if ($vaccine->has_diff_ages)
                        <td>
                            @foreach ($vaccine->diff_ages as $age)
                                <span class="badge rounded-pill badge-light-primary">{{ $age['age'] }}</span>
                            @endforeach
                        </td>
                    @endif
                </tr>
            </tbody>
        </table>

        @slot('footer')
            @include('backend.vaccines.partials.actions.edit')
            @include('backend.vaccines.partials.actions.delete')
            @include('backend.vaccines.partials.actions.exceptions')
            @include('backend.vaccines.partials.actions.conditions')
            @include('backend.vaccines.partials.actions.questions')
            @include(
                'backend.vaccines.partials.actions.eligapilities'
            )
        @endslot
    @endcomponent



    @component('backend.components.box')
        @slot('title', 'Vaccine Requests')
        @slot('bodyClass', 'p-0')

        @if (count($requests) > 0)
        <a href="{{ route('get.requestS', $vaccine) }}" class="btn btn-outline-primary waves-effect waves-light btn-sm float-right m-1">
            <i data-feather="eye"></i> All Request
        </a>
        @endif

        <table id="datatable-buttons" class="table dt-responsive nowrap"
            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                @forelse ($requests->take(5) as $request)
                    <tr>
                        <th> <a href="{{ route('user.show', $request->patient()->id) }}"> {{ $request->patient()->name }}
                            </a> </th>
                        <th>{{ $request->patient()->phone }}</th>
                        <th>{{ $request->patient_hcm }}</th>
                        <th>{{ $request->day_date }}</th>
                        <th>
                            <a href="{{ route('show.request', [$vaccine ,$request]) }}" class="btn btn-outline-warning waves-effect waves-light btn-sm">
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
    @endcomponent

@endsection
