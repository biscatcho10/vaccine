@extends('backend.dark-app')

@section('title')
    Conditions
@stop

@section('content')

    @component('backend.components.breadcrumbs')
        @slot('parent', $vaccine->name)
        @slot('parentUrl', route('vaccine.show', $vaccine))
        @slot('page', 'Conditions')
    @endcomponent

    @include('backend.layouts.partials.session')

    @include('backend.conditions.partials.actions.create')

    <table id="datatable-buttons" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>


        <tbody>
            @foreach ($data as $condition)
            <tr>
                <th>{{$condition->condition}}</th>
                <th>
                    @include('backend.conditions.partials.actions.show')
                    @include('backend.conditions.partials.actions.edit')
                    @include('backend.conditions.partials.actions.delete')
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@push('js')
    @include('backend.layouts.datayables-scripts')
@endpush
