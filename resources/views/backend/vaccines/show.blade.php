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
                            @foreach ($vaccine->available_days as $day)
                                <div class="col-1 mx-2">
                                    <label class="custom-option-item text-center p-1" for="sunday">
                                        <i data-feather='calendar'></i>
                                        <span class="custom-option-item-title h4 d-block">{{ $day }}</span>
                                    </label>
                                </div>
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
        @endslot
    @endcomponent


@endsection
