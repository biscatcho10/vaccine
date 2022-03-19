 <!-- Button trigger modal -->
 <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-{{ $condition->id }}">
    <i data-feather="trash-2"></i>
</button>
<!-- Modal -->
<div class="modal fade text-start modal-danger" id="danger-{{ $condition->id }}" tabindex="-1" aria-labelledby="myModalLabel140" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel140">Delete condition</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the condition ?
            </div>
            <div class="modal-footer">
                {{ BsForm::delete(route('condition.destroy', [$vaccine, $condition])) }}
                @method('DELETE')
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cancel
                </button>
                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Accept</button>
                {{ BsForm::close() }}
            </div>
        </div>
    </div>
</div>
