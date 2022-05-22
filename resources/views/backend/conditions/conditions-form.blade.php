@extends('backend.dark-app')

@section('title')
    Update Acknowledgments
@stop

@section('content')
@include('backend.conditions.actions.copy')

    @component('backend.components.breadcrumbs')
        @slot('parent', $vaccine->name)
        @slot('parentUrl', route('vaccine.show', $vaccine))
        @slot('page', 'Acknowledgments')
    @endcomponent

    {{ BsForm::putModel($vaccine, route('update-conditions', $vaccine), ['id' => 'form']) }}

    @component('backend.components.box')
        @slot('title', 'Acknowledgments')


        @include('backend.conditions.conditions-input')

        @slot('footer')
            {{ BsForm::submit()->label('Save')->attribute('class', 'btn btn-primary') }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}


@endsection
