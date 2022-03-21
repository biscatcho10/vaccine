@extends('backend.dark-app')

@section('title')
    Show condition
@stop

@section('content')

    @component('backend.components.breadcrumbs')
        @slot('parent', $vaccine->name)
        @slot('parentUrl', route('vaccine.show', $vaccine))
        @slot('page', "show condition")
    @endcomponent



    @component('backend.components.box')
        @slot('bodyClass', 'p-0')

        @include('backend.layouts.partials.session')

        <table class="table table-middle">
            <tbody>
                <tr>
                    <th width="200">Condition</th>
                    <td>{{ $condition->condition }}</td>
                </tr>
            </tbody>
        </table>

        @slot('footer')
            @include('backend.conditions.partials.actions.edit')
            @include('backend.conditions.partials.actions.delete')
        @endslot
    @endcomponent


@endsection
