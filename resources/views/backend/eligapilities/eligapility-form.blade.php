@extends('backend.dark-app')

@section('title')
    Update Conditions
@stop

@section('content')
@include('backend.eligapilities.actions.copy')

    @component('backend.components.breadcrumbs')
        @slot('parent', $vaccine->name)
        @slot('parentUrl', route('vaccine.show', $vaccine))
        @slot('page', 'Conditions')
    @endcomponent


    {{ BsForm::putModel($vaccine, route('update-eligapility', $vaccine), ['id' => 'form']) }}

    @component('backend.components.box')
        @slot('title', 'Conditions')

        @include('backend.eligapilities.eligapility-input')

        @slot('footer')
            {{ BsForm::submit()->label('Save')->attribute('class', 'btn btn-primary') }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}


@endsection

