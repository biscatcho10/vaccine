@extends('backend.dark-app')

@section('title')
    Update Vaccine
@stop

@section('content')
@include('backend.exceptions.actions.copy')

    @component('backend.components.breadcrumbs')
        @slot('parent', $vaccine->name)
        @slot('parentUrl', route('vaccine.show', $vaccine))
        @slot('page', 'Blocked Dates')
    @endcomponent


    {{ BsForm::putModel($vaccine, route('update-exceptions', $vaccine), ['id' => 'form']) }}

    @component('backend.components.box')
        @slot('title', 'Blocked Dates')

        @include('backend.exceptions.exception-input')

        @slot('footer')
            {{ BsForm::submit()->label('Save')->attribute('class', 'btn btn-primary') }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}


@endsection

