{{-- @if (count($day->intervals) == 0) --}}
<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-primary float-end" data-bs-toggle="modal"
    data-bs-target="#primary-{{ $vaccine->id }}">
    <i class="fas fa-copy"></i>
</button>
<!-- Modal -->
<div class="modal fade text-start modal-primary" id="primary-{{ $vaccine->id }}" tabindex="-1"
    aria-labelledby="myModalLabel140" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel140">Copy Interval</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ BsForm::post(route('copy-intervals', [$vaccine, $day]), ['id' => 'copy-from']) }}

                <div class="row mb-1">
                    <div class="col-12">
                        {{ BsForm::checkbox('required')->label('Copy from another Service ?')->value(1) }}
                    </div>
                </div>

                <div class="form-group vaccines" style="display: none">
                    <label>Vaccine</label>
                    <select class="form-control" name="target">
                        <option>Select one vaccine</option>
                        @foreach ($vaccines as $index => $value)
                            <option value="{{ $index }}"> {{ $value }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Day</label>
                    <select class="form-control" name="target">
                        <option>Select one day</option>
                        @foreach ($days as $index => $day)
                            <option value="{{ $index }}"> {{ $day }} </option>
                        @endforeach
                    </select>
                </div>
                {{ BsForm::close() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cancel
                </button>
                <button type="submit" form="copy-from" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
            </div>
        </div>
    </div>
</div>

{{-- @endif --}}
