@extends('backend.dark-app')

@section('title')
    Update Eligapilities
@stop

@section('content')

    @component('backend.components.breadcrumbs')
        @slot('parent', $vaccine->name)
        @slot('parentUrl', route('vaccine.show', $vaccine))
        @slot('page', 'Eligapilities')
    @endcomponent


    {{ BsForm::putModel($vaccine, route('update-eligapility', $vaccine), ['id' => 'form']) }}

    @component('backend.components.box')
        @slot('title', 'Eligapilities')

        @include('backend.eligapilities.eligapility-input')

        @slot('footer')
            {{ BsForm::submit()->label('Save')->attribute('class', 'btn btn-primary') }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}


@endsection

