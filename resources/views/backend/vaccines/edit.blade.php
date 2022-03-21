@extends('backend.dark-app')

@section('title')
    Update Vaccine
@stop

@section('content')

    @component('backend.components.breadcrumbs')
        @slot('parent', 'Vaccines')
        @slot('parentUrl', route('vaccine.index'))
        @slot('page', 'Update Vaccine')
    @endcomponent


    {{ BsForm::putModel($vaccine, route('vaccine.update', $vaccine), ['id' => 'form']) }}
    @component('backend.components.box')
        @slot('title', 'Update Vaccine')

        @include('backend.vaccines.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label('Update')->attribute('class', 'btn btn-primary') }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}


@endsection

