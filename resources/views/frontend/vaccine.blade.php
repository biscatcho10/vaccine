<div id="" class="form_items active">
    <h3 class="main_question"><strong>1/6</strong>Book an appointment with us now</h3>
    <h3 class="main_question titles">Choose your service</h3>
    <div id="my_faxen" class="form-group">
        <div  class="styled-select clearfix ">
            <select id="products" class="ddslick" name="vaccine" data-selected="" data-filter-profile="appt">
                @foreach ($vaccines as $key => $vaccine)
                <option value="{{ $key }}" >{{$vaccine}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group option_input">
        <div class="styled-select clearfix variantss d_nones">
            <select id="variants_one" class="ddslick d_nones" name="age" data-selected="">
                <option >18 to 69 Years</option>
                <option >70 Years and above</option>
                <option >Immuncompromised</option>
            </select>
            <select id="variants_two" class="ddslick d_nones" name="age" data-selected="">
                <option >1st</option>
                <option >2nd</option>
                <option >Booster"3rd" "18 YEARS AND OLDER"</option>
                <option >4th " Immunocompromised and Long term care patient Please call for eligibility "</option>
                <option >BOOSTER "3RD" "12 TO 17 YEARS . 168 DAYS FROM SECOND DOSE"</option>
            </select>
        </div>
    </div>
    <div  class="form-group">
        <div class="overlays"></div>
           <input type="button" name="date"  class="form-control requireds" id="input">
        <i class="icon-hotel-calendar_3"></i>
    </div>
    <div class="form-group h-time">
        <div class="styled-select clearfix">
            <select id="ChooseTime" class="ddslick" name="date" data-datepicker="date" data-prompt="Choose a date..." data-selected="">
                <option >Choose a date...</option>
            </select>
            <select id="SelectMyTime" class="ddslick overflow-auto d-none"  name="time" data-datepicker="date" data-prompt="Choose a date..." data-selected="">
                <option value="09:00" data-available="1">09:00 am</option>
                <option value="09:15" data-available="1">09:15 am</option>
                <option value="09:30" data-available="1">09:30 am</option>
                <option value="09:45" data-available="1">09:45 am</option>
                <option value="10:00" data-available="1">10:00 am</option>
                <option value="10:15" data-available="1">10:15 am</option>
                <option value="10:30" data-available="1">10:30 am</option>
                <option value="10:45" data-available="1">10:45 am</option>
                <option value="11:00" data-available="1">11:00 am</option>
                <option value="11:15" data-available="1">11:15 am</option>
                <option value="11:30" data-available="1">11:30 am</option>
                <option value="11:45" data-available="1">11:45 am</option>
                <option value="12:00" data-available="1">12:00 pm</option>
                <option value="12:15" data-available="1">12:15 pm</option>
                <option value="12:30" data-available="1">12:30 pm</option>
                <option value="12:45" data-available="1">12:45 pm</option>
                <option value="13:00" data-available="1">01:00 pm</option>
                <option value="13:15" data-available="1">01:15 pm</option>
                <option value="13:30" data-available="1">01:30 pm</option>
                <option value="13:45" data-available="1">01:45 pm</option>
                <option value="14:00" data-available="1">02:00 pm</option>
                <option value="14:15" data-available="1">02:15 pm</option>
                <option value="14:30" data-available="1">02:30 pm</option>
                <option value="14:45" data-available="1">02:45 pm</option>
                <option value="15:00" data-available="1">03:00 pm</option>
                <option value="15:15" data-available="1">03:15 pm</option>
                <option value="15:30" data-available="1">03:30 pm</option>
                <option value="15:45" data-available="1">03:45 pm</option>
                <option value="16:00" data-available="1">04:00 pm</option>
                <option value="16:15" data-available="1">04:15 pm</option>
                <option value="16:30" data-available="1">04:30 pm</option>
                <option value="16:45" data-available="1">04:45 pm</option>
                <option value="17:00" data-available="1">05:00 pm</option>
                <option value="17:15" data-available="1">05:15 pm</option>
                <option value="17:30" data-available="1">05:30 pm</option>
                <option value="17:45" data-available="1">05:45 pm</option>
                <option value="18:00" data-available="1">06:00 pm</option>
                <option value="18:15" data-available="1">06:15 pm</option>
                <option value="18:30" data-available="1">06:30 pm</option>
                <option value="18:45" data-available="1">06:45 pm</option>
            </select>
        </div>
    </div>
</div>
