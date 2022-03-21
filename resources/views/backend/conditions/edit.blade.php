@extends('backend.dark-app')

@section('title')
    Update Condition
@stop

@section('content')

    @component('backend.components.breadcrumbs')
        @slot('parent', $vaccine->name)
        @slot('parentUrl', route('vaccine.show', $vaccine))
        @slot('page', 'Update Condition')
    @endcomponent


    {{ BsForm::putModel($condition, route('condition.update', [$vaccine, $condition]), ['id' => 'form']) }}
    @component('backend.components.box')
        @slot('title', 'Update condition')

        @include('backend.conditions.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label('Update')->attribute('class', 'btn btn-primary') }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}


@endsection