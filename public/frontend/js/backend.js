$(function () {
    $("#dob").datepicker({
        dateFormat: 'yy-mm-dd',
        showButtonPanel: true,
        changeMonth: true,
        changeYear: true,
        yearRange: '1900:2022',
    });
});

$("#products").change(function (e) {
    e.preventDefault();

    // reset datepicker
    $("#day").datepicker("destroy");

    let vaccine = $(this).val();
    $.ajax({
        type: "GET",
        url: BASE_URL + "/vaccine/data/" + vaccine,
        dataType: "json",
        success: function (response) {
            let vaccine = response;

            // has exceptions only
            function exceptions(date) {
                dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
                if ($.inArray(dmy, unavailableDates) == -1) {
                    return [true, ""];
                } else {
                    return [false, "", "Unavailable"];
                }
            }


            // has weekend only
            var weekendDays = [];
            function weekends(date) {
                var show = true;
                if (weekendDays.includes(date.getDay())) show = false
                return [show];
            }

            // has exceptions and weekend
            function disabledDates(date) {
                dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
                var show = true;
                if (weekendDays.includes(date.getDay())) {
                    show = false;
                } else {
                    if ($.inArray(dmy, unavailableDates) == -1) {
                        show = true;
                    } else {
                        show = false;
                    }
                }
                return [show];
            }


            // show ages select
            if (vaccine.has_diff_ages && vaccine.diff_ages) {
                $(".option_input").show();
                $("#age").empty();
                $(".option_input .list").empty();
                let ages = vaccine.diff_ages;
                $("#age").append("<option>Select one age</option>");
                $(".option_input .nice-select span").text('Select one age');
                ages.forEach(age => {
                    let data = age.age;
                    $("#age").append("<option value='" + data + "'>" + data + "</option>");
                    $(".option_input .list").append(
                        `<li data-value="${data}" class="option selected"  onclick="
                            $('#age').val($('.option_input .current').text());

                            $('#age option').removeAttr('selected')
                            document.querySelectorAll('#age option')[$(this).index()+1].setAttribute('selected', true)
                        ">${data}</li>`
                    );
                });
            }else{
                $("#age").empty();
                $(".option_input").hide();
            }

            // has defined period
            if (vaccine.definded_period) {
                let min = vaccine.from;
                let max = vaccine.to;
                var unavailableDates = vaccine.exceptions;
                var offDays = vaccine.weekends;
                offDays.forEach(off => {
                    weekendDays.push(dayRank(off));
                });


                if (vaccine.weekends.length > 0 && vaccine.exceptions) {
                    $("#day").datepicker({
                        changeMonth: true,
                        numberOfMonths: 1,
                        dateFormat: "yy-mm-dd",
                        maxDate: new Date(max),
                        minDate: new Date(min),
                        beforeShowDay: disabledDates,
                    });
                } else if (vaccine.weekends.length > 0) {
                    $("#day").datepicker({
                        changeMonth: true,
                        numberOfMonths: 1,
                        dateFormat: "yy-mm-dd",
                        maxDate: new Date(max),
                        minDate: new Date(min),
                        beforeShowDay: weekends,

                    });
                } else if (vaccine.exceptions) {
                    $("#day").datepicker({
                        changeMonth: true,
                        numberOfMonths: 1,
                        dateFormat: "yy-mm-dd",
                        maxDate: new Date(max),
                        minDate: new Date(min),
                        beforeShowDay: exceptions
                    });
                }else{
                    $("#day").datepicker({
                        changeMonth: true,
                        numberOfMonths: 1,
                        dateFormat: "yy-mm-dd",
                        maxDate: new Date(max),
                        minDate: new Date(min),
                    });
                }

            } else {
                var unavailableDates = vaccine.exceptions;
                var offDays = vaccine.weekends;
                offDays.forEach(off => {
                    weekendDays.push(dayRank(off));
                });

                if (vaccine.weekends.length > 0 && vaccine.exceptions) {
                    $("#day").datepicker({
                        changeMonth: true,
                        numberOfMonths: 1,
                        dateFormat: "yy-mm-dd",
                        minDate: 0,
                        beforeShowDay: disabledDates,
                    });
                } else if (vaccine.weekends.length > 0) {
                    $("#day").datepicker({
                        changeMonth: true,
                        numberOfMonths: 1,
                        dateFormat: "yy-mm-dd",
                        minDate: 0,
                        beforeShowDay: weekends,

                    });
                } else if (vaccine.exceptions) {
                    $("#day").datepicker({
                        changeMonth: true,
                        numberOfMonths: 1,
                        dateFormat: "yy-mm-dd",
                        minDate: 0,
                        beforeShowDay: exceptions
                    });
                }else{
                    $("#day").datepicker({
                        changeMonth: true,
                        numberOfMonths: 1,
                        dateFormat: "yy-mm-dd",
                        minDate: 0,
                    });
                }
            }

            // show eligapilities
            if (vaccine.eligapilities) {
                let eligaps = vaccine.eligapilities;
                $("#eligapility_content").empty();
                let title = eligaps.title;
                $("#eligap_title").text(title);
                eligaps.eligapilities.forEach(eligaps => {
                    let data = eligaps.eligapility;
                    $("#eligapility_content").append(`
                    <div class="form-group options clearfix d-flex justify-content-between align-items-center mb-0 mb-lg-2 mb-xl-3">
                        <em> • ${data}</em>
                        <label class="switch-light switch-ios float-right">
                            <input type="checkbox" onclick='clickCheckbox(this)' value="${data}" name="eligapility" id="">
                            <span>
                                <span>No</span>
                                <span>Yes</span>
                            </span>
                            <a></a>
                        </label>
                    </div>
                    `);
                });
            }


            // show questions
            if (vaccine.questions) {
                let questions = vaccine.questions;
                $("#question_section").empty();
                questions.forEach((question, index) => {
                    $("#question_section").append(`
                    <div class="styled-select clearfix">
                        <label class="mt-3">${question.question}</label>
                        <div class="form-group">
                            <select style='display:none;' name="${question.question}" id="question_${index}" class="form-control">
                                <option>Select one</option>
                            </select>
                            <input type="hidden">
                            <div class="nice-select nice-select-${index} form-control" tabindex="0">
                                <span class="current">Select one</span>
                                <ul class="list list_question">

                                </ul>
                            </div>
                        </div>
                    </div>
                    `);

                    question.options.forEach(option => {
                        $("#question_" + index).append(`
                        <option vlaue="${option.value}">${option.option}</option>
                    `);


                    $(`.nice-select-${index} .list_question`).append(`
                        <li class="option selected" onclick="
                            // console.log($(this).text());
                            // // $(this).parent().parent().siblings('input').val($(this).text());
                            // console.log($(this).parent().parent().siblings('select').val());
                            $('#question_${index} option').removeAttr('selected')
                            document.querySelectorAll('#question_${index} option')[$(this).index()+1].setAttribute('selected', true)
                        ">${option.option}</li>
                    `);


                    });
                });
            }

            // show conditions select
            if (vaccine.conditions) {
                let conditions = vaccine.conditions;
                let title = conditions.title;
                $("#condition_page_title").text(title);
                $("#condition_list").empty();
                conditions.conditions.forEach(condition => {
                    $("#condition_list").append(`
                        <div class="form-group options clearfix d-flex justify-content-between align-items-center">
                            <em>${condition.condition}</em>
                        </div>
                    `);
                });
            }

        }
    });

    $("#day").change(function (e) {
        // alert('dd')
        e.preventDefault();
        let day = $(this).val();
        $.ajax({
            type: "GET",
            url: BASE_URL + "/interval/" + vaccine + "/" + day,
            data: { vaccine: vaccine },
            dataType: "json",
            success: function (response) {
                let intervals = response;
                console.log(response);
                $("#ChooseTime").empty();
                $(".myTime ul").empty();
                if (response == '') {
                    console.log('mohamed');
                    $(".myTime span").text('Choose a time');
                }
                intervals.forEach(interval => {
                    let data = timeConvert(interval);
                    $("#ChooseTime").append("<option value='" + data + "'>" + data + "</option>");
                    $(".myTime ul").append(
                        `
                        <li class="option selected" data-value="${data}" onclick="
                            document.querySelectorAll('#ChooseTime option').forEach(e => {
                                e.removeAttribute('selected')
                            })
                            document.querySelectorAll('#ChooseTime option')[$(this).index()+1].setAttribute('selected', true)
                            $('#ChooseTime').val($('.myTime .current').text());

                            ">${data}</li>

                        `
                    );
                });
            }
        });
    });

});





function dayRank(day) {
    days = ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];
    return days.indexOf(day);
}

function dayname(date) {
    return day = ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"][new Date(date).getDay()]
}

function timeConvert(time) {
    // Check correct time format and split into components
    time = time.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];
    if (time.length > 1) { // If time format correct
        time = time.slice(1);  // Remove full string match value
        time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
        time[0] = +time[0] % 12 || 12; // Adjust hours
    }
    return time.join(''); // return adjusted time or original string
}

