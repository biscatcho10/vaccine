@extends('backend.dark-app')

@section('title')
    Users
@stop

@push('css')
    <!-- DataTables -->
    <link
        href="{{ asset('backend/app-assets/vendors/js/datatables/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ asset('backend/app-assets/vendors/js/datatables/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />

    <style>
        .buttons-html5{
            background-color: rgb(55, 56, 139) !important
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
                    @include('backend.users.partials.actions.delete')
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@push('js')
    <!-- Required datatable js -->
    <script src="{{ asset('backend/app-assets/vendors/js/datatables/datatables.net/js/jquery.dataTables.min.js') }}">
    </script>
    <script
        src="{{ asset('backend/app-assets/vendors/js/datatables/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <!-- Buttons examples -->
    <script
        src="{{ asset('backend/app-assets/vendors/js/datatables/datatables.net-buttons/js/dataTables.buttons.min.js') }}">
    </script>
    <script
        src="{{ asset('backend/app-assets/vendors/js/datatables/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('backend/app-assets/vendors/js/datatables/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/datatables/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/datatables/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/js/datatables/datatables.net-buttons/js/buttons.html5.min.js') }}">
    </script>
    <script src="{{ asset('backend/app-assets/vendors/js/datatables/datatables.net-buttons/js/buttons.print.min.js') }}">
    </script>
    <script src="{{ asset('backend/app-assets/vendors/js/datatables/datatables.net-buttons/js/buttons.colVis.min.js') }}">
    </script>
    <!-- Responsive examples -->
    <script
        src="{{ asset('backend/app-assets/vendors/js/datatables/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
    </script>
    <script
        src="{{ asset('backend/app-assets/vendors/js/datatables/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
    </script>

    <script>
        $(document).ready(function () {
        $("#datatable").DataTable(),
            $("#datatable-buttons")
            .DataTable({
                lengthChange: !1,
                buttons: ["copy", "excel", "pdf"],
            })
            .buttons()
            .container()
            .appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");
        });


    </script>
@endpush
