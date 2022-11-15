@extends('backend.dark-app')

@section('title')
    Services
@stop

@section('content')
    @component('backend.components.breadcrumbs')
        @slot('page', 'Services')
    @endcomponent

    @include('backend.layouts.partials.session')
      <table id="datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Creation Date</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($data as $vaccine)
            <tr>
                <th>{{$vaccine->name}}</th>
                <th>{{$vaccine->created_at_date}}</th>
                <th>
                    @include('backend.vaccines.partials.actions.show')
                    @include('backend.vaccines.partials.actions.edit')
                    @include('backend.vaccines.partials.actions.delete')
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@push('js')
    @include('backend.layouts.datayables-scripts')
@endpush
