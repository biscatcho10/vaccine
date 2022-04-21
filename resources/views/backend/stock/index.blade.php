@extends('backend.dark-app')

@section('title')
    Stock
@stop

@section('content')

    @component('backend.components.breadcrumbs')
        @slot('parent', 'Home')
        @slot('parentUrl', route('dashboard'))
        @slot('page', 'Stock')
    @endcomponent

    @include('backend.layouts.partials.session')

    <table id="datatable" class="table dt-responsive nowrap"
        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>Service</th>
                <th>Amount</th>
                <th>Actions</th>
            </tr>
        </thead>


        <tbody>
            @foreach ($data as $service)
                <tr>
                    <th> <a href="{{ route('vaccine.show', $service)}}">{{ $service->name }}</a> </th>
                    <th>{{ $service->amount }}</th>
                    <th>
                        <a href="{{ route('get-stock-vaccine', $service->id) }}"
                            class="btn btn-outline-primary waves-effect waves-light btn-sm">
                            <i data-feather="edit"></i>
                        </a>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@push('js')
    @include('backend.layouts.datayables-scripts')
@endpush
