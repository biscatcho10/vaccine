@include('backend.layouts.partials.session')

{{-- @dd($vaccine->exceptions) --}}

@if(!empty($vaccine->exceptions))
    <div class="expection-repeater">
        <div data-repeater-list="exceptions">
            @foreach ($vaccine->exceptions as $exception)
                <div data-repeater-item>
                    <div class="row d-flex align-items-end">
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <input type="date" class="form-control" name="exception"
                                    value="{{ $exception['exception'] }}" />
                            </div>
                        </div>

                        <div class="col-md-2 col-12 mb-25">
                            <div class="mb-1">
                                <button class="btn btn-outline-danger text-nowrap px-1 btn-sm" data-repeater-delete
                                    type="button">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">
                <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                    <i data-feather="plus"></i>
                </button>
            </div>
        </div>
    </div>
@else
    <div class="expection-repeater">
        <div data-repeater-list="exceptions">
            <div data-repeater-item>
                <div class="row d-flex align-items-end">
                    <div class="col-md-4 col-12">
                        <div class="mb-1">
                            <input type="date" class="form-control" name="exception" />
                        </div>
                    </div>

                    <div class="col-md-2 col-12 mb-25">
                        <div class="mb-1">
                            <button class="btn btn-outline-danger text-nowrap px-1 btn-sm" data-repeater-delete
                                type="button">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                    <i data-feather="plus"></i>
                </button>
            </div>
        </div>
    </div>
@endif


@push('js')
    <!-- BEGIN: Pexception Vendor JS-->
    <script src="{{ asset('backend/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
    <!-- END: Pexception Vendor JS-->

    <script>
        $(document).ready(function() {
            $('[name="definded_period"]').change(function(e) {
                e.preventDefault();
                var value = $('[name="definded_period"]').is(':checked');
                if (value) {
                    $("#url_input").show();
                } else {
                    $("#url_input").hide();
                }
            });
        });

        $(document).ready(function() {
            $('[name="has_exceptions"]').change(function(e) {
                e.preventDefault();
                var value = $('[name="has_exceptions"]').is(':checked');
                if (value) {
                    $(".expection-repeater").show();
                } else {
                    $(".expection-repeater").hide();
                }
            });
        });

        $(function() {
            'use strict';
            // form repeater jquery
            $('.expection-repeater, .repeater-default').repeater({
                show: function() {
                    $(this).slideDown();
                    // Feather Icons
                    if (feather) {
                        feather.replace({
                            width: 14,
                            height: 14
                        });
                    }
                },
                hide: function(deleteElement) {
                    Swal.fire({
                        title: 'Warning!',
                        text: ' The element will be deleted!',
                        icon: 'warning',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        },
                        buttonsStyling: false
                    }).then((result) => {
                        $(this).slideUp(deleteElement);
                    })
                }
            });
        });
    </script>
@endpush
