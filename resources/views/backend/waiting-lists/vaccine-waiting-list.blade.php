@extends('backend.dark-app')

@section('title')
    Service Waiting List
@stop

@section('content')
    @component('backend.components.breadcrumbs')
        @slot('parent', "Waiting Lists")
        @slot('parentUrl', route('waiting-list'))
        @slot('page', $vaccine->name)
    @endcomponent

    @include('backend.layouts.partials.session')


    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab-fill" data-bs-toggle="tab" href="#home-fill" role="tab"
                aria-controls="home-fill" aria-selected="false">Waiting List</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab-fill" data-bs-toggle="tab" href="#profile-fill" role="tab"
                aria-controls="profile-fill" aria-selected="false">Notified Users List</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content pt-1">
        <div class="tab-pane active" id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill">
            @include('backend.waiting-lists.partials.actions.send')
            <table id="datatable" class="table dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Service</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($waitingLists as $list)
                        <tr>
                            <th>{{ $list->user_name }}</th>
                            <th>{{ $list->user_email }}</th>
                            <th>{{ $list->patients->latest()->first()->phone }}</th>
                            <th>{{ $list->vaccine->name }}</th>
                        </tr>
                    @empty
                        <tr>
                            <th>No Requests Yet.</th>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="profile-fill" role="tabpanel" aria-labelledby="profile-tab-fill">
            <table id="datatable1" class="table dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Service</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($NotifiedwaitingLists as $list)
                        <tr>
                            <th>{{ $list->user_name }}</th>
                            <th>{{ $list->user_email }}</th>
                            <th>{{ $list->patients->latest()->first()->phone }}</th>
                            <th>{{ $list->vaccine->name }}</th>
                        </tr>
                    @empty
                        <tr>
                            <th>No Requests Yet.</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection

@push('js')
    @include('backend.layouts.datayables-scripts')
@endpush
