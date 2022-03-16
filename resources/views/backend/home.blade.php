@extends('backend.dark-app')

@section('title')
    Home
@stop

@section('content')
    @component('backend.components.breadcrumbs')
        @slot('page', 'Home')
    @endcomponent


@endsection
