@extends('backend.dark-app')


@section('content')
    @component('backend.components.breadcrumbs')
        @slot('page', 'Home')
    @endcomponent


@endsection
