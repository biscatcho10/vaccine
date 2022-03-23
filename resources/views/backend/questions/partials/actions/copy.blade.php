@if (!count($vaccine->questions) > 0)
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
                    <h5 class="modal-title" id="myModalLabel140">Copy Questions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ BsForm::post(route('copy-questions', $vaccine), ['id' => 'copy-from']) }}
                    <div class="form-group">
                        <label>Vaccine</label>
                        <select class="form-control" name="target">
                            <option>Select one vaccine</option>
                            @foreach ($vaccines as $vaccine)
                                <option value="{{ $vaccine->id }}"> {{ $vaccine->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    {{ BsForm::close() }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" form="copy-from" class="btn btn-primary"
                        data-bs-dismiss="modal">Accept</button>
                </div>
            </div>
        </div>
    </div>

@endif
