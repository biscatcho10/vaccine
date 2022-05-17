<div class="form_items users_inform">
    <h3 class="main_question"><strong>2/6</strong>Contact information</h3>
    <div class="form-group">
        <input autocomplete="off" type="text" name="first_name" class="form-control requireds" placeholder="First Name">
        <i class="icon-user"></i>
    </div>
    <div class="form-group">
        <input autocomplete="off" type="text" name="last_name" class="form-control requireds" placeholder="Last Name">
        <i class="icon-user"></i>
    </div>
    <div class="form-group">
        <input autocomplete="off" type="email" name="email" class="form-control requireds email" placeholder="Email">
        <i class="icon-envelope"></i>
    </div>
    <div class="form-group">
        <input autocomplete="off" type="text" name="phone" class="form-control requireds" placeholder="Telephone">
        <i class="icon-phone"></i>
    </div>
</div>
<!-- /step-->

<div class="form_items ">
    <h3 class="main_question"><strong>3/6</strong>Please fill with your details</h3>
    <div class="form-group" style="display: none">
        <input type="text" data-field="date" readonly class="form-control myTime myDates "
            placeholder="Date of birth 'MM/DD/YYYY'" id="myDateTwo">
        <i class="icon-hotel-calendar_3"></i>

        <div class="overlays"></div>
        <div id="dtBox">
        </div>
    </div>

    <div class="form-group">
        <input type="text" name="dob" id="dob" class="form-control requireds" placeholder="Date of birth 'MM/DD/YYYY'" readonly>
        <i class="icon-hotel-calendar_3"></i>
        <div class="overlays"></div>

        {{-- <input name="date" id="day" type="text"> --}}
    </div>

    <div class="form-group ">
        <input type="text" name="address" autocomplete="off" id="field-2" placeholder="Address 'street address, city'" class="form-control requireds">
    </div>
    <div class="form-group ">
        <input type="text" name="health_card_number" class="form-control health_card_" autocomplete="off" id="field-3" placeholder="HEALTH CARD NUMBER">
    </div>
</div>
