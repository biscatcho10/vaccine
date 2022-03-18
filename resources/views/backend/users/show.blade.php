@extends('backend.dark-app')

@section('title')
    Show User
@stop

@section('content')

    @component('backend.components.breadcrumbs')
        @slot('parent', 'Users')
        @slot('parentUrl', route('user.index'))
        @slot('page', $user->name)
    @endcomponent



    @component('backend.components.box')
        @slot('bodyClass', 'p-0')

        @include('backend.layouts.partials.session')

        <table class="table table-middle">
            <tbody>
                <tr>
                    <th width="200">Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th width="200">Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th width="200">Phone</th>
                    <td>{{ $user->phone }}</td>
                </tr>
                <tr>
                    <th width="200">Date Of Birth</th>
                    <td>{{ $user->dob }}</td>
                </tr>
                <tr>
                    <th width="200">Address</th>
                    <td>{{ $user->address }}</td>
                </tr>
                <tr>
                    <th width="200">Health Card Number</th>
                    <td>{{ $user->health_card_num }}</td>
                </tr>
            </tbody>
        </table>

        @slot('footer')
            @include('backend.users.partials.actions.edit')
            @include('backend.users.partials.actions.delete')
        @endslot
    @endcomponent


@endsection
