@extends('backend.dark-app')

@section('title')
    Create Service
@stop

@section('content')

    @component('backend.components.breadcrumbs')
        @slot('parent', 'Services')
        @slot('parentUrl', route('vaccine.index'))
        @slot('page', 'Add Service')
    @endcomponent


    {{ BsForm::post(route('vaccine.store'), ['id' => 'form']) }}
    @csrf
    @component('backend.components.box')
        @slot('title', 'Add Service')

        @include('backend.vaccines.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label('Save')->attribute('class', 'btn btn-primary') }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}


@endsection
