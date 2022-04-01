<div id="" class="form_items active">
    <h3 class="main_question"><strong>1/6</strong>Book an appointment with us now</h3>
    <h3 class="main_question titles">Choose your service</h3>
    <div id="my_faxen" class="form-group">
        <div class="styled-select clearfix ">
            <select id="products" name="vaccine" class="form-control">
                <option>select option</option>
                @foreach ($vaccines as $key => $vaccine)
                    <option value="{{ $key }}">{{ $vaccine }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group option_input" style="display: none">
        <select id="age" class="form-control" name="age">
            <option>Select one age</option>
        </select>
    </div>

    <div class="form-group" style="display: none">
        <div class="overlays"></div>
        <input type="button" name="date" class="form-control" id="input">
        <i class="icon-hotel-calendar_3"></i>
    </div>

    <div class="form-group">
        {{-- <input type="date" name="date" id="day" class="form-control"> --}}
        <input type="text" name="date" id="day" class="form-control">

        {{-- <input name="date" id="day" type="text"> --}}
    </div>
    <div class="form-group h-time">
        <div class="styled-select clearfix">
            <select id="ChooseTime" class="form-control" name="date">
                <option>Choose a date...</option>
            </select>
        </div>
    </div>
</div>


