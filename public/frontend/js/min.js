
!(function (e) {
    e(".dd-select").click(function () {
        let o = e(".variantss"),
            t = e("#variants_one"),
            r = e("#variants_two");
        e("#my_faxen .dd-option-text").click(function () {
            t.addClass("d_nones"),
                r.addClass("d_nones"),
                'Moderna  Booster shots " 18 and above only' == e(this).text()
                    ? 'Moderna  Booster shots " 18 and above only' ==
                        e(this).text()
                        ? (o.removeClass("d_nones"), t.removeClass("d_nones"))
                        : (o.addClass("d_nones"), r.addClass("d_nones"))
                    : 'Pfizer Covid-19 Vaccine "12 and above"' == e(this).text()
                        ? (o.removeClass("d_nones"), r.removeClass("d_nones"))
                        : (o.addClass("d_nones"), r.addClass("d_nones"));
        });
    }),


        e(".submits").on("click", function () {
            let o = document.querySelector(".active .checkBox");
            0 == o.checked
                ? (e(
                    '<span for="dates" class="error">Required</span>'
                ).insertAfter(o),
                    (o.style.borderColor = "red"))
                : e(".error").remove();
        }),

        e(".forwards").on("click", function () {

            // console.log(document.querySelector('#question_0').value);
            // console.log($("#question_0 [selected=true]").val());

            // $('#question_${index}').val($("#question_0 [selected=true]").val());


            e(".error,.error_input_select").remove()

            if ($('#my_faxen .current').text() == 'select option'){
                $('<span for="dates" class="error_input_select">Required</span>').insertAfter("#products");
            }
            else{
                if ($('.option_input .current').text() == 'Select one age') {
                    $('<span for="dates" class="error_input_select">Required</span>').insertAfter("#age");
                }
                if ($('#day').val() == ''){
                    $('<span for="dates" class="error_input_select">Required</span>').insertAfter("#day");
                }else{
                    if ($('.myTime .current').text() == 'Choose a time') {
                        $('<span for="dates" class="error_input_select">Required</span>').insertAfter("#ChooseTime");
                    }
                }
            }

            document.querySelectorAll('#question_section.active .current').forEach(e =>{
                if (e.innerHTML == 'Select one'){
                    console.log('amr');
                    $('<span for="dates" class="error_input_select">Required</span>').insertAfter(e);
                }
            })


            document.querySelectorAll(".form_items.active .requireds").forEach((o) => {
                    if (((o.style.borderColor = "#EFEEEE"), "" == o.value))
                        e(
                            '<span for="dates" class="error">Required</span>'
                        ).insertAfter(o),
                            (o.style.borderColor = "red");
                    else {
                        (o.style.borderColor = "#EFEEEE");
                        let t = e('.form_items.active [type="email"]');
                        /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*.com$/.test(
                            t.val()
                        ) ||
                            e(
                                '<span for="dates" class="error">Email Required</span>'
                            ).insertAfter(t);
                    }
                }),
                null == document.getElementById("tCheckBox") &&
                null !==
                document.querySelector(
                    ".appCheckBox.form_items.active"
                ) &&
                (e('.appCheckBox.form_items.active [type="checkbox"]')
                    .checked
                    ? e(".error").remove()
                    : e(
                        '<span for="dates" class="error">Required</span>'
                    ).insertAfter(".forwards")),
                0 == e(".error,.error_input_select").length &&
                (e(".form_items.active").next().addClass("active"),
                    e(".form_items.active").prev().removeClass("active")),
                e(".form_items.active .requireds").keydown(function () {
                    e(this).siblings(".error").remove(),
                        e(this).css("border-color", "#d2d8dd");
                }),
                document.querySelector(".oneCheckBox.form_items.active"),
                null !==
                document.querySelector(".oneCheckBox.form_items.active") &&
                (e(".submits").show(), e(".forwards").hide()),
                null == document.querySelector(".form_items.active:first-child")
                    ? e(".backwards").show()
                    : e(".backwards").hide();


        }),
        e(".backwards").on("click", function () {
            e(".error").remove(),
                e(".form_items.active").prev().addClass("active"),
                e(".form_items.active").next().removeClass("active"),
                e(".forwards").show(),
                e(".submits").hide(),
                null == document.querySelector(".form_items.active:first-child")
                    ? e(".backwards").show()
                    : e(".backwards").hide();
        }),
        e("input[type=email]").focusout(function (o) {
            e(".container-fluid").removeClass("position-content");
        }),
        e("input[type=email]").focusin(function (o) {
            e(".container-fluid").addClass("position-content");
        }),
        e("input[type=text]:not(#myDateTwo)").focusout(function (o) {
            e(".container-fluid").removeClass("position-content");
        }),
        e("input[type=text]:not(#myDateTwo)").focusin(function (o) {
            e(".container-fluid").addClass("position-content");
        }),
        $("#dtBox").DateTimePicker({ isPopup: !1 }),
        $(".myDates").on("click", function (e) {
            $(".overlays").addClass("actv"),
                $(".overlays").on("click", function (e) {
                    $(this).removeClass("actv"), $(".dtpicker-bg").remove();
                });
        }),
        rome(input, { time: !1 });

        $('select:not(.ignore)').niceSelect();




        // $('#my_faxen ul li').on('click', function () {

        //     console.log('amr');
        //     $('.option_input .list').remove();
        // })


        // strat function select vaccine
        // function MySelect(inputClick,perntSelect) {
        //     let myArrys = []
        //     $(`${inputClick} .nice-select li`).on('click',function (f) {
        //         e(`${inputClick} .error_input_select`).remove()
        //         $(`${perntSelect}`).innerHTML = ''
        //         setTimeout(() => {
        //             $(`${perntSelect} .nice-select`).remove();

        //             document.querySelectorAll('#age option').forEach(e => {
        //                 myArrys.push(e.value)
        //             })

        //             document.querySelector(`${perntSelect}`).innerHTML += `
        //             <div class="nice-select form-control ${perntSelect}" tabindex="0">
        //                 <span class="current">Select one age</span>
        //                 <ul class="list"></ul>
        //             </div>
        //             `
        //             // myArrys.forEach(age => {
        //             //     document.querySelector(`${perntSelect} .list`).innerHTML +=
                        // `<li data-value="Select one age" class="option selected"  onclick="(() =>{
                        //     $('#age').val($('.option_input .current').text());
                        //     $('#age option').removeAttr('selected')
                        //     document.querySelectorAll('#age option')[$(this).index()].setAttribute('selected', true)
                        // })()">${age}</li>`
        //             // })


        //         }, 500);
        //     })
        // }
        // MySelect('#my_faxen','.option_input');

        // strat function select time
        // let myArrys = []
        // $(`#day`).on('click',function (f) {
        //     $(`.ui-state-default`).on('click',function (f) {
        //         setTimeout(() => {
        //             $(`.myTime .nice-select`).remove();

        //             document.querySelectorAll(`.myTime option`).forEach(e => {
        //                 myArrys.push(e.value)
        //             })

        //             document.querySelector(`.myTime`).innerHTML += `
        //             <div class="nice-select form-control .myTime" tabindex="0">
        //                 <span class="current">Choose a time</span>
        //                 <ul class="list"></ul>
        //             </div>
        //             `
        //             myArrys.forEach(age => {
        //                 document.querySelector(`.myTime .list`).innerHTML +=
                        // `
                        //     <li class="option selected" onclick="(() =>{
                        //         document.querySelectorAll('.myTime option').forEach(e => {
                        //             e.removeAttribute('selected')
                        //         })
                        //         document.querySelectorAll('.myTime option')[$(this).index()].setAttribute('selected', true)
                        //     })()">${age}</li>

                        // `
        //             })
        //         }, 500);
        //     })
        // })

})(window.jQuery)
function clickCheckbox (w) {
    document.querySelectorAll(".error").forEach((e) => {
        e.remove();
    })

    document.querySelectorAll(".error").forEach((e) => {
      e.remove();
    })
    document.querySelectorAll('.appCheckBox.form_items.active [type="checkbox"]').forEach(function (e) {
        e.checked = false;
        e.removeAttribute("id");
    })

    w.checked = true;
    w.setAttribute("id", "tCheckBox");

}



