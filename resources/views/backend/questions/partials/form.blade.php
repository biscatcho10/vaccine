@include('backend.layouts.partials.session')
<div class="row mb-1">
    <div class="col-">
        {{ BsForm::text('question')->required()->attribute(['data-parsley-maxlength' => '191'])->label('Question') }}
    </div>
</div>

@isset($question)
    <div class="expection-repeater">
        <div data-repeater-list="options">
            @foreach ($question->options as $option)
                <div data-repeater-item>
                    <div class="row d-flex align-items-end">
                        <div class="col-md-6">
                            <div class="mb-1">
                                <label>Option</label>
                                <input type="text" class="form-control" name="option" value="{{ $option['option'] }}" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-1">
                                <label>Value</label>
                                <input type="text" class="form-control" name="value" value="{{ $option['value'] }}" />
                            </div>
                        </div>

                        <div class="col-md-2 col-12 mb-25">
                            <div class="mb-1">
                                <button class="btn btn-outline-danger text-nowrap px-1 btn-sm" data-repeater-delete type="button">
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
        <div data-repeater-list="options">
            <div data-repeater-item>
                <div class="row d-flex align-items-end">
                    <div class="col-md-6">
                        <div class="mb-1">
                            <label>Option</label>
                            <input type="text" class="form-control" name="option"/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-1">
                            <label>Value</label>
                            <input type="text" class="form-control" name="value"/>
                        </div>
                    </div>

                    <div class="col-md-2 col-12 mb-25">
                        <div class="mb-1">
                            <button class="btn btn-outline-danger text-nowrap px-1 btn-sm" data-repeater-delete type="button">
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
@endisset


@push('js')
    <!-- BEGIN: Pexception Vendor JS-->
    <script src="{{ asset('backend/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
    <!-- END: Pexception Vendor JS-->

    <script>
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
