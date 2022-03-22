@extends('backend.dark-app')

@section('title')
    Add Question
@stop

@section('content')

    @component('backend.components.breadcrumbs')
        @slot('parent', 'Questions List')
        @slot('parentUrl', route('question.index', $vaccine))
        @slot('page', 'Add Question')
    @endcomponent


    {{ BsForm::post(route('question.store', $vaccine), ['id' => 'form']) }}
    @csrf
    @component('backend.components.box')
        @slot('title', 'Add Question')

        @include('backend.questions.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label('Save')->attribute('class', 'btn btn-primary') }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}


@endsection
