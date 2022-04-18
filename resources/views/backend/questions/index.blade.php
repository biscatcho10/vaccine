@extends('backend.dark-app')

@section('title')
    Questions
@stop

@section('content')

    @component('backend.components.breadcrumbs')
        @slot('parent', $vaccine->name)
        @slot('parentUrl', route('vaccine.show', $vaccine))
        @slot('page', 'Questions')
    @endcomponent

    @include('backend.layouts.partials.session')

<div class="row">
    <div class="col">
        @include('backend.questions.partials.actions.copy')
    </div>
    <div class="col">
        @include('backend.questions.partials.actions.create')
    </div>
</div>

    <table id="datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>Question</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>


        <tbody>
            @foreach ($data as $question)
            <tr>
                <th>{{$question->question}}</th>
                <th>{{ucfirst($question->input_type)}}</th>
                <th>
                    @include('backend.questions.partials.actions.show')
                    @include('backend.questions.partials.actions.edit')
                    @include('backend.questions.partials.actions.delete')
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@push('js')
    @include('backend.layouts.datayables-scripts')
@endpush
