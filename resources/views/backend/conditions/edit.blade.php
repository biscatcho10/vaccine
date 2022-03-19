@extends('backend.dark-app')

@section('title')
    Create User
@stop

@section('content')

    @component('backend.components.breadcrumbs')
        @slot('parent', 'Users')
        @slot('parentUrl', route('user.index'))
        @slot('page', 'Add User')
    @endcomponent


    {{ BsForm::putModel($user, route('user.update', $user), ['id' => 'form']) }}
    @component('backend.components.box')
        @slot('title', 'Add User')

        @include('backend.users.partials.form')

        @slot('footer')
            {{ BsForm::submit()->label('Save')->attribute('class', 'btn btn-primary') }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}


@endsection

