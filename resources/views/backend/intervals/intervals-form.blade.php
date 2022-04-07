@extends('backend.dark-app')

@section('title')
    Add Intervals
@stop

@section('content')
@include('backend.intervals.actions.copy')

    @component('backend.components.breadcrumbs')
        @slot('parent', $vaccine->name)
        @slot('parentUrl', route('vaccine.show', $vaccine))
        @slot('page', $vaccine->name ." / " .$day->name)
    @endcomponent


    {{ BsForm::putModel($day, route('update-intervals', [$vaccine, $day]), ['id' => 'form']) }}

    @component('backend.components.box')
        @slot('title', 'Add Intervals')

        @include('backend.intervals.day-interval-input')

        @slot('footer')
            {{ BsForm::submit()->label('Save')->attribute('class', 'btn btn-primary') }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}


@endsection

