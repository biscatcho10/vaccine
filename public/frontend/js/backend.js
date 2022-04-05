// $(document).ready(function () {
//     $('select').niceSelect();
// });

$(function () {
    $("#dob").datepicker({
        changeMonth: true,
        changeYear: true
    });
});

$("#products").change(function (e) {
    e.preventDefault();
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
            if (vaccine.has_diff_ages) {
                $(".option_input").show();
                let ages = vaccine.diff_ages;
                $("#age").append("<option>Select one</option>");
                ages.forEach(age => {
                    let data = age.age;
                    $("#age").append("<option value='" + data + "'>" + data + "</option>");
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
                var weekendDays = [];
                offDays.forEach(off => {
                    weekendDays.push(dayRank(off));
                });


                if (vaccine.weekends && vaccine.exceptions) {
                    $("#day").datepicker({
                        changeMonth: true,
                        numberOfMonths: 1,
                        dateFormat: "yy-mm-dd",
                        maxDate: new Date(max),
                        minDate: new Date(min),
                        beforeShowDay: disabledDates,
                    });
                } else if (vaccine.weekends) {
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
                }

            } else {
                var unavailableDates = vaccine.exceptions;
                var offDays = vaccine.weekends;
                var weekendDays = [];
                if (vaccine.weekends && vaccine.exceptions) {
                    $("#day").datepicker({
                        changeMonth: true,
                        numberOfMonths: 1,
                        dateFormat: "yy-mm-dd",
                        minDate: 0,
                        beforeShowDay: disabledDates,
                    });
                } else if (vaccine.weekends) {
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
                            <input type="checkbox" value="${data}" name="eligapility" id="tCheckBox">
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
                            <select name="${question.question}" id="question_${index}" class="form-control">
                                <option>Select one</option>
                            </select>
                        </div>
                    </div>
                    `);

                    question.options.forEach(option => {
                        $("#question_" + index).append(`
                        <option vlaue="${option.value}">${option.option}</option>
                    `);
                    });
                });
            }

            // show ages select
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
        e.preventDefault();
        let day = $(this).val();
        $.ajax({
            type: "GET",
            url: BASE_URL + "/interval/" + vaccine + "/" + day,
            data: { vaccine: vaccine },
            dataType: "json",
            success: function (response) {
                let intervals = response;
                $("#ChooseTime").empty();
                intervals.forEach(interval => {
                    let data = timeConvert(interval);
                    $("#ChooseTime").append("<option value='" + data + "'>" + data + "</option>");
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

