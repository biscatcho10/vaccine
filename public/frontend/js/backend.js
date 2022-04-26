let token = $('input[name="_token"]').val();

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
    let form = $("#wrapped");
    let old_url = BASE_URL + "/request/vaccine";
    let new_url = BASE_URL + "/waiting-list/vaccine";

    $('form input').val('')
    $("#ChooseTime").val('');
    $(".myTime span").text('Choose a time');
    $('input[name="_token"]').val(token);




    // reset datepicker
    $("#day").datepicker("destroy");

    let vaccine = $(this).val();
    $.ajax({
        type: "GET",
        url: BASE_URL + "/vaccine/data/" + vaccine,
        dataType: "json",
        success: function (response) {
            let vaccine = response;
            console.log(vaccine);
            // change form action
            vaccine.out_of_stock == 1 ? form.attr('action', new_url) : form.attr('action', old_url);


            if (vaccine.out_of_stock == 1) {
                $('.oneCheckBox .checkBox').attr('checked',true)

                $('.date-div, .myTime, .age_users').addClass('d-none')


                $(`<div class="waiting alert alert-warning" role="alert">
                    Sorry the vaccine is out of stock, You will be added in the waiting list ,And we will send mail for you when it's available.
                </div>`).insertAfter('#my_faxen')

                $('.forwards').on('click',function () {
                    if (document.querySelector('.users_inform.active')) {
                        $('.submits').addClass('d-inline-block');
                        $('.forwards').hide();
                    }
                })

                $('.backwards').on('click',function () {
                    if (document.querySelector('.frist_page.active')) {
                        $('.submits').removeClass('d-inline-block');
                        $('.forwards').show();
                    }
                })

                $('#wrapped').on('submit',function (event) {
                    if (document.querySelector('.users_inform.active')) {
                        document.querySelectorAll('.users_inform.active .requireds').forEach(e => {
                            if (e.value == '') {
                                $('<span for="dates" class="error_input_select">Required</span>').insertAfter(e)
                                event.preventDefault()
                            }else{
                                return true
                            }
                        })
                    }
                })

            }else{
                $('.waiting').remove();
                $('.date-div, .myTime, .age_users').removeClass('d-none')
                $('.submits').removeClass('d-inline-block');
                $('.forwards').show();
                $('.forwards').on('click',function () {
                    if ($('.users_inform.active')) {
                        $('.submits').removeClass('d-inline-block');
                        $('.forwards').show();
                    }
                    if(document.querySelector('.oneCheckBox.form_items.active')){
                        $('.forwards').hide();
                    }
                })
            }

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
            } else {
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
                } else {
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
                } else {
                    $("#day").datepicker({
                        changeMonth: true,
                        numberOfMonths: 1,
                        dateFormat: "yy-mm-dd",
                        minDate: 0,
                    });
                }
            }

            if (vaccine.require_hcn == 1) {
                $('.health_card_').addClass('requireds')
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
                    let type = question.input_type;


                    if (type == 'select') {
                        let select_type = question.select_type;

                        let select = "Select one";

                        if (select_type == "multiple") {
                            select = "Select one or more";
                        }

                        $("#question_section").append(`
                            <div class="styled-select clearfix">
                                <label class="mt-3">${question.question}</label>
                                <div class="form-group group${select_type}">
                                    <select style='display:none;' name="${question.question}[]" id="question_${index}" class="form-control" multiple>
                                        <option>${select}</option>
                                    </select>
                                    <input id='' type="hidden">
                                    <div class="nice-select nice-select-${index} form-control" tabindex="0">
                                        <span class="current">${select}</span>
                                        <ul class="list list_question"></ul>
                                    </div>
                                </div>
                            </div>
                        `);

                        question.options.forEach(option => {
                            $("#question_" + index).append(`
                                <option vlaue="${option.value}">${option.option}</option>
                            `);

                            $(`.groupsingle .nice-select-${index} .list_question`).append(`
                                <li data-value='${option.value}' class="option selected" onclick="
                                    $('#question_${index} option').removeAttr('selected')
                                    document.querySelectorAll('#question_${index} option')[$(this).index()+1].setAttribute('selected', true)
                                    ">${option.option}</li>
                            `);

                            $(`.groupmultiple .nice-select-${index} .list_question`).append(`
                                <li data-value='${option.value}' class="option selected" onclick="
                                        document.querySelectorAll('#question_${index} option')[$(this).index()+1].setAttribute('selected', true)
                                        $(this).hide()
                                ">${option.option}</li>
                            `);


                        });
                    }
                    else {
                        $("#question_section").append(`
                            <div class="form-group">
                                <label>${question.question}</label>
                                <input type="text" name="${question.question}" class="form-control requireds">
                            </div>
                        `);
                    }
                });

                $(`.groupmultiple .list_question li`).on('click', function (e) {
                    $(this).parent().siblings('span.current').hide();
                    let thisVal = $(this).text();
                    $(this).parents('.groupmultiple ul').before(`
                        <span class='more_select'>${thisVal}<div aria-hidden="true" data-icon="M" class="fs1" class='icon_remove' ></div></span>
                    `)
                    $('.groupmultiple .more_select div').on('click', function (w) {
                        $(this).parent().remove()
                        let values = $(this).parent().text()
                        document.querySelectorAll('.groupmultiple ul li').forEach(e => {
                            if (values == e.innerText) {
                                $(e).show();
                            }
                        });

                        document.querySelectorAll('.groupmultiple option').forEach(e => {
                            if (values == e.value) {
                                e.removeAttribute('selected')
                            }
                        });

                        document.querySelectorAll('.groupmultiple').forEach(e => {
                            if ($(e).find('.more_select').eq(0).length == 0) {
                                $(e).find('span.current').show();
                                $(e).find('span.current').text('Select one');
                            }
                        });
                    })
                })
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

            // show comment
            if (vaccine.need_comment == 1) {
                $('#question_section').append(`<div class="form-group">
                    <label for="exampleFormControlTextarea1">Feed Back</label>
                        <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Type your comment..."></textarea>
                    </div>
                `);
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

