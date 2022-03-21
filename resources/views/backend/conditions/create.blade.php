@extends('backend.dark-app')

@section('title')
    Create Condition
@stop

@section('content')

    @component('backend.components.breadcrumbs')
        @slot('parent', $vaccine->name)
        @slot('parentUrl', route('vaccine.show  ', $vaccine))
        @slot('page', 'Add Condition')
    @endcomponent


    {{ BsForm::post(route('condition.store', $vaccine), ['id' => 'form']) }}
    @csrf
    @component('backend.components.box')
        @slot('title', 'Add Condtion')

        @include('backend.conditions.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label('Save')->attribute('class', 'btn btn-primary') }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}


@endsection

