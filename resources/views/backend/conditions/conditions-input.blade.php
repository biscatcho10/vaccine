@include('backend.layouts.partials.session')

<div class="row mb-2">
    <div class="col-12">
        {{ BsForm::text('page_title')->required()->attribute(['data-parsley-maxlength' => '191'])->label('Condition Page Tile')->value($condition->page_title ?? "") }}
    </div>
</div>

<hr>

<label class="mb-1">Conditions</label>

@isset($condition)
    <div class="expection-repeater">
        <div data-repeater-list="conditions">
            @foreach ($condition->conditions as $condition)
                <div data-repeater-item>
                    <div class="row d-flex align-items-end">
                        <div class="col-10">
                            <div class="mb-1">
                                <input type="text" class="form-control" name="condition" value="{{ $condition['condition'] }}" />
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
        <div data-repeater-list="conditions">
            <div data-repeater-item>
                <div class="row d-flex align-items-end">
                    <div class="col-10">
                        <div class="mb-1">
                            <input type="text" class="form-control" name="condition" />
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
