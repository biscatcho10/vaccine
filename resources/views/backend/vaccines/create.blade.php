@extends('backend.dark-app')

@section('title')
    Create Vaccine
@stop

@section('content')

    @component('backend.components.breadcrumbs')
        @slot('parent', 'Vaccines')
        @slot('parentUrl', route('vaccine.index'))
        @slot('page', 'Add Vaccine')
    @endcomponent


    {{ BsForm::post(route('vaccine.store'), ['id' => 'form']) }}
    @csrf
    @component('backend.components.box')
        @slot('title', 'Add Vaccine')

        @include('backend.vaccines.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label('Save')->attribute('class', 'btn btn-primary') }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}


@endsection