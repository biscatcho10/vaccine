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


    <!-- Statistics Card -->
    <div class="col-xl-12 col-md-6 col-12">
        <div class="card card-statistics">
            <div class="card-header">
                <h4 class="card-title">Statistics</h4>
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                        <p class="card-text font-small-2 me-25 mb-0">
                            @if (count($requests) > 0)
                                <a href="{{ route('get.requestS', $vaccine) }}"
                                    class="btn btn-outline-primary waves-effect waves-light btn-sm float-right m-1">
                                    <i data-feather="eye"></i> All Request
                                </a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-body statistics-body">
                <div class="row">
                    <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-primary me-2">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-trending-up avatar-icon">
                                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                        <polyline points="17 6 23 6 23 12"></polyline>
                                    </svg>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">{{ count($vaccine->requests) }}</h4>
                                <p class="card-text font-small-3 mb-0">Total Number Of Requests</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-info me-2">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-user avatar-icon">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">{{ $user_count }}</h4>
                                <p class="card-text font-small-3 mb-0">Users</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-sm-0">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-danger me-2">
                                <div class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-box avatar-icon">
                                        <path
                                            d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                        </path>
                                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                    </svg>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">Time : {{ $time }}</h4>
                                <p class="card-text font-small-3 mb-0">Most requested time</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Statistics Card -->


    @component('backend.components.box')
        @slot('bodyClass', 'p-0')
        @slot('title', 'Vaccine Info')

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
                @if ($vaccine->require_hcn)
                    <tr>
                        <th width="200">Require Health Card Number ?</th>
                        <td> @if ($vaccine->require_hcn) <i class="fas fa-check-circle text-success fa-lg"></i> @else No @endif</td>
                    </tr>
                @endif
                @if ($vaccine->need_comment)
                    <tr>
                        <th width="200">Need Comment ?</th>
                        <td> @if ($vaccine->need_comment) <i class="fas fa-check-circle text-success fa-lg"></i> @else No @endif</td>
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

                @if ($vaccine->has_diff_ages)
                    <tr>
                        <th width="200">Different Ages</th>
                        <td>
                            @foreach ($vaccine->diff_ages as $age)
                                <span class="badge rounded-pill badge-light-primary">{{ $age['age'] }}</span>
                            @endforeach
                        </td>
                    </tr>
                @endif

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



    {{-- @component('backend.components.box')
        @slot('title', 'Vaccine Requests')
        @slot('bodyClass', 'p-0')

        @if (count($requests) > 0)
            <a href="{{ route('get.requestS', $vaccine) }}"
                class="btn btn-outline-primary waves-effect waves-light btn-sm float-right m-1">
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
                            <a href="{{ route('show.request', [$vaccine, $request]) }}"
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
    @endcomponent --}}

@endsection
