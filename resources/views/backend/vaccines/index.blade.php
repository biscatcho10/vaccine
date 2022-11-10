@extends('backend.dark-app')

@section('title')
    Services
@stop

@section('content')
    @component('backend.components.breadcrumbs')
        @slot('page', 'Services')
    @endcomponent

    @include('backend.layouts.partials.session')
    <form action="{{ route('order.services') }}" method="POST">

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
                        <input type="hidden" name='services[]' value="{{ $vaccine->id }}" class="form-controldrag">
                        <th>{{ $vaccine->name }}</th>
                        <th>{{ $vaccine->created_at_date }}</th>
                        <th>
                            @include('backend.vaccines.partials.actions.show')
                            @include('backend.vaccines.partials.actions.edit')
                            @include('backend.vaccines.partials.actions.delete')
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="float-right">
            {{ BsForm::submit(__('order'))->attribute('class', 'btn btn-primary mx-2') }}
        </div>
        
        @csrf
        @method('POST')
    </form>

@endsection

@push('js')
    @include('backend.layouts.datayables-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-ui-dist@1.12.1/jquery-ui.min.js"></script>
    <script>
        // Fix the width of the cells
        $('td, th', '#datatable').each(function() {
            var cell = $(this);
            cell.width(cell.width());
        });

        $('#datatable tbody').sortable().disableSelection();

        $('body').on('input', '.drag', function() {
            $('tbody tr').removeClass('marker');
            var currentEl = $(this);
            var index = parseInt(currentEl.val());
            if (index <= $('.drag').length) {
                currentEl.attr('value', index)
                var oldLoc = currentEl.parent().parent()
                var newLoc = $('tbody tr').eq(index - 1)
                newLoc.addClass('marker')
                var newLocHtml = newLoc.html()
                newLoc.html(oldLoc.html()).hide().fadeIn(1200);
                oldLoc.html(newLocHtml)
            }
        })
    </script>
@endpush
