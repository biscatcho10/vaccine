@extends('backend.dark-app')

@section('title')
    Add Intervals
@stop

@section('content')
    @include('backend.intervals.actions.copy')

    @component('backend.components.breadcrumbs')
        @slot('parent', $vaccine->name)
        @slot('parentUrl', route('vaccine.show', $vaccine))
        @slot('page', $vaccine->name . ' / ' . $day->name)
    @endcomponent


    {{ BsForm::putModel($day, route('update-intervals', [$vaccine, $day]), ['id' => 'form']) }}

    @component('backend.components.box')
        @slot('title', 'Add Intervals')
        @include('backend.intervals.day-interval-input')

        <input type="hidden" id="def" value="{{ $vaccine->id }}">
        @slot('footer')
            {{ BsForm::submit()->label('Save')->attribute('class', 'btn btn-primary') }}
        @endslot
    @endcomponent
    {{ BsForm::close() }}


@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $("input[name=required]").change(function(e) {
                e.preventDefault();
                if ($(this).is(':checked')) {
                    $(".vaccines").show();
                } else {
                    $(".vaccines").hide();
                    var vaccine = $("#def").val();
                    var target = $("select[name=target]");
                    var url = "{{ route('get-intervals', ':vaccine') }}";
                    url = url.replace(':vaccine', vaccine);
                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            var days = data.days;
                            target.html('');
                            target.html('<option>Select one day</option>');
                            $.each(days, function(index, value) {
                                target.append('<option value="' + index + '">' + value +
                                    '</option>');
                            });
                        }
                    });
                }
            });

            // check vaccines input changed
            $("select[name=vaccine]").change(function(e) {
                e.preventDefault();
                var vaccine = $(this).val();
                var target = $("select[name=target]");
                var url = "{{ route('get-intervals', ':vaccine') }}";
                url = url.replace(':vaccine', vaccine);
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var days = data.days;
                        target.html('');
                        target.html('<option>Select one day</option>');
                        $.each(days, function(index, value) {
                            target.append('<option value="' + index + '">' + value +
                                '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endpush
