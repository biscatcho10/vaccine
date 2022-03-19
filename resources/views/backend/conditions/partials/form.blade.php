@include('backend.layouts.partials.session')
<div class="row mb-1">
    <div class="col-">
        {{ BsForm::text('condition')->required()->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3'])->label('condition') }}
    </div>
</div>
