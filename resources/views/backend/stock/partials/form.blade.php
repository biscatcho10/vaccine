@include('backend.layouts.partials.session')
<div class="row mb-1">
    <div class="col-12">
        {{ BsForm::text('amount')->required()->label('Amount') }}
    </div>
</div>

