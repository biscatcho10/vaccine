@include('backend.layouts.partials.session')
<div class="row mb-1">
    <div class="col-12">
        {{ BsForm::text('name')->required()->attribute(['data-parsley-maxlength' => '255', 'data-parsley-minlength' => '3'])->label('Name') }}
    </div>
</div>

<hr>

<div class="form-group my-2">
    <label>Avaliable Days</label>
    <div class="custom-options-checkable g-1">
        <div class="row d-flex justify-content-center">
            <div class="col-2">
                <input class="custom-option-item-check" type="checkbox" name="available_days[]" id="saturday"
                    value="saturday"
                    @isset($vaccine) {{ in_array('saturday', $days) ? 'checked' : '' }} @endisset>
                <label class="custom-option-item text-center p-1" for="saturday">
                    <i data-feather='calendar'></i>
                    <span class="custom-option-item-title h5 d-block">Saturday</span>
                </label>
            </div>

            <div class="col-2">
                <input class="custom-option-item-check" type="checkbox" name="available_days[]" id="sunday"
                    value="sunday"
                    @isset($vaccine) {{ in_array('sunday', $days) ? 'checked' : '' }} @endisset>
                <label class="custom-option-item text-center p-1" for="sunday">
                    <i data-feather='calendar'></i>
                    <span class="custom-option-item-title h5 d-block">Sunday</span>
                </label>
            </div>

            <div class="col-2">
                <input class="custom-option-item-check" type="checkbox" name="available_days[]" id="monday"
                    value="monday"
                    @isset($vaccine) {{ in_array('monday', $days) ? 'checked' : '' }} @endisset>
                <label class="custom-option-item text-center p-1" for="monday">
                    <i data-feather='calendar'></i>
                    <span class="custom-option-item-title h5 d-block">Monday</span>
                </label>
            </div>

            <div class="col-2">
                <input class="custom-option-item-check" type="checkbox" name="available_days[]" id="tuesday"
                    value="tuesday"
                    @isset($vaccine) {{ in_array('tuesday', $days) ? 'checked' : '' }} @endisset>
                <label class="custom-option-item text-center p-1" for="tuesday">
                    <i data-feather='calendar'></i>
                    <span class="custom-option-item-title h5 d-block">Tuesday</span>
                </label>
            </div>
        </div>

        <div class="row mt-2 d-flex justify-content-center">
            <div class="col-2">
                <input class="custom-option-item-check" type="checkbox" name="available_days[]" id="wednesday"
                    value="wednesday"
                    @isset($vaccine) {{ in_array('wednesday', $days) ? 'checked' : '' }} @endisset>
                <label class="custom-option-item text-center p-1" for="wednesday">
                    <i data-feather='calendar'></i>
                    <span class="custom-option-item-title h5 d-block">Wednesday</span>
                </label>
            </div>

            <div class="col-2">
                <input class="custom-option-item-check" type="checkbox" name="available_days[]" id="thursday"
                    value="thursday"
                    @isset($vaccine) {{ in_array('thursday', $days) ? 'checked' : '' }} @endisset>
                <label class="custom-option-item text-center p-1" for="thursday">
                    <i data-feather='calendar'></i>
                    <span class="custom-option-item-title h5 d-block">Thursday</span>
                </label>
            </div>

            <div class="col-2">
                <input class="custom-option-item-check" type="checkbox" name="available_days[]" id="friday"
                    value="friday"
                    @isset($vaccine) {{ in_array('friday', $days) ? 'checked' : '' }} @endisset>
                <label class="custom-option-item text-center p-1" for="friday">
                    <i data-feather='calendar'></i>
                    <span class="custom-option-item-title h5 d-block">Friday</span>
                </label>
            </div>
        </div>
    </div>


</div>

<hr>

<div class="row my-2 mx-1">
    <div class="form-check">
        <label class="form-check-label">
            {{-- @dd($vaccine->definded_period) --}}
            <input type="checkbox" value="1" class="form-check-input" name="definded_period"
                @isset($vaccine) {{ $vaccine->definded_period ? 'checked' : '' }} @endisset>
            Has Defined Period ?
        </label>
    </div>
</div>

<div class="row" id="url_input"
@isset($vaccine) @if ($vaccine->definded_period != true)  style="display: none" @endif @else
style="display: none" @endisset>
<div class="col-6">
    <label>From</label>
    <input type="date" name="from" value="{{ $vaccine->from ?? '' }}" class="form-control">
</div>

<div class="col-6">
    <label>To</label>
    <input type="date" name="to" value="{{ $vaccine->to ?? '' }}" class="form-control">
</div>
</div>

<hr>


<div class="row my-2 mx-1">
<div class="form-check">
    <label class="form-check-label">
        <input type="checkbox" value="1" class="form-check-input" name="has_diff_ages"
            @isset($vaccine) {{ $vaccine->has_diff_ages ? 'checked' : '' }} @endisset>
        Has Different Ages ?
    </label>
</div>
</div>


@isset($vaccine)
<div class="age-repeater">
    <div data-repeater-list="diff_ages">
        @foreach ($vaccine->diff_ages as $age)
            <div data-repeater-item>
                <div class="row d-flex align-items-end">
                    <div class="col-md-4 col-12">
                        <div class="mb-1">
                            <input type="text" class="form-control" name="age" value="{{ $age['age'] }}"
                                placeholder="Enter Age Name" />
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
<div class="age-repeater" style="display: none">
    <div data-repeater-list="diff_ages">
        <div data-repeater-item>
            <div class="row d-flex align-items-end">
                <div class="col-md-4 col-12">
                    <div class="mb-1">
                        <input type="text" class="form-control" name="age" placeholder="Enter Age Name" />
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
<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('backend/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
<!-- END: Page Vendor JS-->

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
        $('[name="has_diff_ages"]').change(function(e) {
            e.preventDefault();
            var value = $('[name="has_diff_ages"]').is(':checked');
            if (value) {
                $(".age-repeater").show();
            } else {
                $(".age-repeater").hide();
            }
        });
    });

    $(function() {
        'use strict';
        // form repeater jquery
        $('.age-repeater, .repeater-default').repeater({
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
