@extends('backend.dark-app')

@section('title')
    Users
@stop

@push('css')
    <style>
        .dt-button-collection.dropdown-menu{
            display: block !important;
        }
    </style>
@endpush

@section('content')

    @component('backend.components.breadcrumbs')
        @slot('page', 'Users')
    @endcomponent

    @include('backend.layouts.partials.session')

    <table id="datatable-buttons" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Date Of Birth</th>
                <th>Health Card Number</th>
                <th>Actions</th>
            </tr>
        </thead>


        <tbody>
            @foreach ($data as $user)
            <tr>
                <th>{{$user->name}}</th>
                <th>{{$user->email}}</th>
                <th>{{$user->phone}}</th>
                <th>{{$user->dob}}</th>
                <th>{{$user->health_card_num}}</th>
                <th>
                    @include('backend.users.partials.actions.show')
                    @include('backend.users.partials.actions.edit')
                    {{-- @include('backend.users.partials.actions.delete') --}}
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@push('js')
    @include('backend.layouts.datayables-scripts')
@endpush
