@extends('backend.dark-app')

@section('title')
    Update Question
@stop

@section('content')

    @component('backend.components.breadcrumbs')
        @slot('parent', 'Questions List')
        @slot('parentUrl', route('question.index', $vaccine))
        @slot('page', 'Update Question')
    @endcomponent


    {{ BsForm::putModel($question, route('question.update', [$vaccine, $question]), ['id' => 'form']) }}
    @component('backend.components.box')
        @slot('title', 'Update Question')

        @include('backend.questions.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label('Update')->attribute('class', 'btn btn-primary') }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}


@endsection
