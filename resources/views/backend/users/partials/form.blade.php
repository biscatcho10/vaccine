@include('backend.layouts.partials.session')
<div class="row mb-1">
    <div class="col-6">
        {{ BsForm::text('first_name')->required()->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3'])->label('First Name') }}
    </div>
    <div class="col-6">
        {{ BsForm::text('last_name')->required()->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3'])->label('Last Name') }}
    </div>
</div>
<div class="row mb-1">
    <div class="col-6">
        {{ BsForm::email('email')->required()->attribute(['data-parsley-type' => 'email', 'data-parsley-minlength' => '3'])->label('Email') }}
    </div>
    <div class="col-6">
        {{ BsForm::text('phone')->required()->attribute(['data-parsley-type' => 'number', 'data-parsley-minlength' => '3'])->label('Phone') }}
    </div>
</div>
<div class="row mb-1">
    <div class="col-6">
        {{ BsForm::date('dob')->required()->attribute(['data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3'])->label('Date Of Birth') }}
    </div>
    <div class="col-6">
        {{ BsForm::text('health_card_num')->required()->attribute(['data-parsley-type' => 'number', 'data-parsley-maxlength' => '191', 'data-parsley-minlength' => '3'])->label('Health Card Number') }}
    </div>
</div>
<div class="row mb-1">
    <div class="col-12">
        {{ BsForm::text('address')->required()->attribute(['data-parsley-minlength' => '3'])->label('Address') }}
    </div>
</div>
