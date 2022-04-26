@extends('backend.dark-app')

@section('title')
    Update Stock
@stop

@section('content')

    @component('backend.components.breadcrumbs')
        @slot('parent', 'Stock')
        @slot('parentUrl', route('stock'))
        @slot('page', $vaccine->name)
    @endcomponent


    {{ BsForm::putModel($vaccine, route('update-stock-vaccine', $vaccine), ['id' => 'form']) }}
    @component('backend.components.box')
        @slot('title', 'Update Stock')

        @include('backend.stock.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label('Update')->attribute('class', 'btn btn-primary') }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}


@endsection
