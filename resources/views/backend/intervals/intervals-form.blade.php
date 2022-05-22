@extends('backend.dark-app')

@section('title')
    Add Intervals
@stop

@section('content')
@include('backend.intervals.actions.copy')

    @component('backend.components.breadcrumbs')
        @slot('parent', $vaccine->name)
        @slot('parentUrl', route('vaccine.show', $vaccine))
        @slot('page', $vaccine->name ." / " .$day->name)
    @endcomponent


    {{ BsForm::putModel($day, route('update-intervals', [$vaccine, $day]), ['id' => 'form']) }}

    @component('backend.components.box')
        @slot('title', 'Add Intervals')

        @include('backend.intervals.day-interval-input')

        @slot('footer')
            {{ BsForm::submit()->label('Save')->attribute('class', 'btn btn-primary') }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}


@endsection

@push('js')
    <script>
        $("input[name=required]").change(function (e) {
            e.preventDefault();

            if ($(this).is(':checked')) {
                $(".vaccines").show();
            } else {
                $(".vaccines").hide();
            }
        });


        // check vaccines input changed
        $("select[name=target]").change(function (e) {
            e.preventDefault();
            var target = $(this).val();
            var url = "{{ route('get-intervals', "+ target +") }}";
            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {
                    console.log(data);
                    $("#intervals").html(data);
                }
            });
        });
    </script>
@endpush

