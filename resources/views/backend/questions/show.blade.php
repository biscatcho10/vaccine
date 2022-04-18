@extends('backend.dark-app')

@section('title')
    Show Question
@stop

@section('content')

    @component('backend.components.breadcrumbs')
        @slot('parent', 'Questions List')
        @slot('parentUrl', route('question.index', $vaccine))
        @slot('page', 'show Question')
    @endcomponent



    @component('backend.components.box')
        @slot('bodyClass', 'p-0')

        @include('backend.layouts.partials.session')

        <table class="table table-middle">
            <tbody>
                <tr>
                    <th width="200">Question</th>
                    <td>{{ $question->question }}</td>
                </tr>
                <tr>
                    <th width="200">Type</th>
                    <td>{{ ucfirst($question->input_type) }}</td>
                </tr>
                @if ($question->input_type == 'select')
                    <tr>
                        <th width="200">Select Type</th>
                        <td>{{ ucfirst($question->select_type) }}</td>
                    </tr>

                    <tr>
                        <th width="200">Options</th>
                        <td>
                            <ul class="list-group">
                                @foreach ($question->options as $option)
                                    <li>
                                        {{ $option['option'] }}
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>

        @slot('footer')
            @include('backend.questions.partials.actions.edit')
            @include('backend.questions.partials.actions.delete')
        @endslot
    @endcomponent


@endsection
