<<<<<<< HEAD
function dayRank(e){return days=["sunday","monday","tuesday","wednesday","thursday","friday","saturday"],days.indexOf(e)}function dayname(e){return day=["sunday","monday","tuesday","wednesday","thursday","friday","saturday"][new Date(e).getDay()]}function timeConvert(e){return(e=e.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/)||[e]).length>1&&((e=e.slice(1))[5]=+e[0]<12?" AM":" PM",e[0]=+e[0]%12||12),e.join("")}$(function(){$("#dob").datepicker({changeMonth:!0,changeYear:!0})}),$("#products").change(function(e){e.preventDefault(),$("#day").datepicker("destroy");let t=$(this).val();$.ajax({type:"GET",url:BASE_URL+"/vaccine/data/"+t,dataType:"json",success:function(e){let t=e;function n(e){return dmy=e.getDate()+"-"+(e.getMonth()+1)+"-"+e.getFullYear(),-1==$.inArray(dmy,s)?[!0,""]:[!1,"","Unavailable"]}var a=[];function i(e){var t=!0;return a.includes(e.getDay())&&(t=!1),[t]}function o(e){dmy=e.getDate()+"-"+(e.getMonth()+1)+"-"+e.getFullYear();return[!a.includes(e.getDay())&&-1==$.inArray(dmy,s)]}if(t.has_diff_ages&&t.diff_ages){$(".option_input").show(),$("#age").empty(),$(".option_input .list").empty();let e=t.diff_ages;$("#age").append("<option>Select one age</option>"),$(".option_input .nice-select span").text("Select one age"),e.forEach(e=>{let t=e.age;$("#age").append("<option value='"+t+"'>"+t+"</option>"),$(".option_input .list").append(`<li data-value="${t}" class="option selected"  onclick="\n                            $('#age').val($('.option_input .current').text());\n\n                            $('#age option').removeAttr('selected')\n                            document.querySelectorAll('#age option')[$(this).index()+1].setAttribute('selected', true)\n                        ">${t}</li>`)})}else $("#age").empty(),$(".option_input").hide();if(t.definded_period){let e=t.from,l=t.to;var s=t.exceptions;t.weekends.forEach(e=>{a.push(dayRank(e))}),t.weekends.length>0&&t.exceptions?$("#day").datepicker({changeMonth:!0,numberOfMonths:1,dateFormat:"yy-mm-dd",maxDate:new Date(l),minDate:new Date(e),beforeShowDay:o}):t.weekends.length>0?$("#day").datepicker({changeMonth:!0,numberOfMonths:1,dateFormat:"yy-mm-dd",maxDate:new Date(l),minDate:new Date(e),beforeShowDay:i}):t.exceptions?$("#day").datepicker({changeMonth:!0,numberOfMonths:1,dateFormat:"yy-mm-dd",maxDate:new Date(l),minDate:new Date(e),beforeShowDay:n}):$("#day").datepicker({changeMonth:!0,numberOfMonths:1,dateFormat:"yy-mm-dd",maxDate:new Date(l),minDate:new Date(e)})}else{s=t.exceptions;t.weekends.forEach(e=>{a.push(dayRank(e))}),t.weekends.length>0&&t.exceptions?$("#day").datepicker({changeMonth:!0,numberOfMonths:1,dateFormat:"yy-mm-dd",minDate:0,beforeShowDay:o}):t.weekends.length>0?$("#day").datepicker({changeMonth:!0,numberOfMonths:1,dateFormat:"yy-mm-dd",minDate:0,beforeShowDay:i}):t.exceptions?$("#day").datepicker({changeMonth:!0,numberOfMonths:1,dateFormat:"yy-mm-dd",minDate:0,beforeShowDay:n}):$("#day").datepicker({changeMonth:!0,numberOfMonths:1,dateFormat:"yy-mm-dd",minDate:0})}if(t.eligapilities){let e=t.eligapilities;$("#eligapility_content").empty();let n=e.title;$("#eligap_title").text(n),e.eligapilities.forEach(e=>{let t=e.eligapility;$("#eligapility_content").append(`\n                    <div class="form-group options clearfix d-flex justify-content-between align-items-center mb-0 mb-lg-2 mb-xl-3">\n                        <em> • ${t}</em>\n                        <label class="switch-light switch-ios float-right">\n                            <input type="checkbox" onclick='clickCheckbox(this)' value="${t}" name="eligapility" id="">\n                            <span>\n                                <span>No</span>\n                                <span>Yes</span>\n                            </span>\n                            <a></a>\n                        </label>\n                    </div>\n                    `)})}if(t.questions){let e=t.questions;$("#question_section").empty(),e.forEach((e,t)=>{$("#question_section").append(`\n                    <div class="styled-select clearfix">\n                        <label class="mt-3">${e.question}</label>\n                        <div class="form-group">\n                            <select style='display:none;' name="${e.question}" id="question_${t}" class="form-control">\n                                <option>Select one</option>\n                            </select>\n                            <input type="hidden">\n                            <div class="nice-select nice-select-${t} form-control" tabindex="0">\n                                <span class="current">Select one</span>\n                                <ul class="list list_question">\n\n                                </ul>\n                            </div>\n                        </div>\n                    </div>\n                    `),e.options.forEach(e=>{$("#question_"+t).append(`\n                        <option vlaue="${e.value}">${e.option}</option>\n                    `),$(`.nice-select-${t} .list_question`).append(`\n                        <li class="option selected" onclick="\n                            // console.log($(this).text());\n                            // // $(this).parent().parent().siblings('input').val($(this).text());\n                            // console.log($(this).parent().parent().siblings('select').val());\n                            $('#question_${t} option').removeAttr('selected')\n                            document.querySelectorAll('#question_${t} option')[$(this).index()+1].setAttribute('selected', true)\n                        ">${e.option}</li>\n                    `)})})}if(t.conditions){let e=t.conditions,n=e.title;$("#condition_page_title").text(n),$("#condition_list").empty(),e.conditions.forEach(e=>{$("#condition_list").append(`\n                        <div class="form-group options clearfix d-flex justify-content-between align-items-center">\n                            <em>${e.condition}</em>\n                        </div>\n                    `)})}}}),$("#day").change(function(e){e.preventDefault();let n=$(this).val();$.ajax({type:"GET",url:BASE_URL+"/interval/"+t+"/"+n,data:{vaccine:t},dataType:"json",success:function(e){let t=e;console.log(e),$("#ChooseTime").empty(),$(".myTime ul").empty(),""==e&&(console.log("mohamed"),$(".myTime span").text("Choose a time")),t.forEach(e=>{let t=timeConvert(e);$("#ChooseTime").append("<option value='"+t+"'>"+t+"</option>"),$(".myTime ul").append(`\n                        <li class="option selected" data-value="${t}" onclick="\n                            document.querySelectorAll('#ChooseTime option').forEach(e => {\n                                e.removeAttribute('selected')\n                            })\n                            document.querySelectorAll('#ChooseTime option')[$(this).index()+1].setAttribute('selected', true)\n                            $('#ChooseTime').val($('.myTime .current').text());\n\n                            ">${t}</li>\n\n                        `)})}})})});
=======
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

>>>>>>> bf6ef35a26ebe4ccf543ecf8cc633b785a8f2b66
