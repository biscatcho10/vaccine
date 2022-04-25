@if ($vaccine->amount > $vaccine->waitingLists()->where('notification_sent', 0)->count() && $vaccine->waitingLists()->where('notification_sent', 0)->count() > 0)
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal"
        data-bs-target="#success-{{ $vaccine->id }}">
        <i class="fas fa-envelope"></i>
        Send
    </button>
    <!-- Modal -->
    <div class="modal fade text-start modal-success" id="success-{{ $vaccine->id }}" tabindex="-1"
        aria-labelledby="myModalLabel140" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel140">Send Mail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to send mails to waiting list's users ?
                </div>
                <div class="modal-footer">
                    {{ BsForm::get(route('send-emails', $vaccine)) }}
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Send</button>
                    {{ BsForm::close() }}
                </div>
            </div>
        </div>
    </div>
@endif
