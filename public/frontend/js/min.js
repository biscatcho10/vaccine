function clickCheckbox(e) {
    document.querySelectorAll(".error").forEach((e) => {
        e.remove();
    }),
        document.querySelectorAll(".error").forEach((e) => {
            e.remove();
        }),
        document
            .querySelectorAll(
                '.appCheckBox.form_items.active [type="checkbox"]'
            )
            .forEach(function (e) {
                (e.checked = !1), e.removeAttribute("id");
            }),
        (e.checked = !0),
        e.setAttribute("id", "tCheckBox");
}
!(function (e) {
    e(".dd-select").click(function () {
        let t = e(".variantss"),
            o = e("#variants_one"),
            r = e("#variants_two");
        e("#my_faxen .dd-option-text").click(function () {
            o.addClass("d_nones"),
                r.addClass("d_nones"),
                'Moderna  Booster shots " 18 and above only' == e(this).text()
                    ? 'Moderna  Booster shots " 18 and above only' ==
                      e(this).text()
                        ? (t.removeClass("d_nones"), o.removeClass("d_nones"))
                        : (t.addClass("d_nones"), r.addClass("d_nones"))
                    : 'Pfizer Covid-19 Vaccine "12 and above"' == e(this).text()
                    ? (t.removeClass("d_nones"), r.removeClass("d_nones"))
                    : (t.addClass("d_nones"), r.addClass("d_nones"));
        });
    }),
        e(".submits").on("click", function () {
            let t = document.querySelector(".active .checkBox");
            0 == t.checked
                ? (e(
                      '<span for="dates" class="error">Required</span>'
                  ).insertAfter(t),
                  (t.style.borderColor = "red"))
                : e(".error").remove();
        }),
        e(".forwards").on("click", function () {
            e(".error,.error_input_select").remove(),
                "select option" == $("#my_faxen .current").text()
                    ? $(
                          '<span for="dates" class="error_input_select">Required</span>'
                      ).insertAfter("#products")
                    : ("Select one age" == $(".option_input .current").text() &&
                          $(
                              '<span for="dates" class="error_input_select">Required</span>'
                          ).insertAfter("#age"),
                      "" == $("#day").val()
                          ? $(
                                '<span for="dates" class="error_input_select">Required</span>'
                            ).insertAfter("#day")
                          : "Choose a time" == $(".myTime .current").text() &&
                            $(
                                '<span for="dates" class="error_input_select">Required</span>'
                            ).insertAfter("#ChooseTime")),
                // document
                    // .querySelectorAll("#question_section.active .current")
                    // .forEach((e) => {"Select one" == e.innerHTML &&
                    //         $(
                    //             '<span for="dates" class="error_input_select">Required</span>'
                    //         ).insertAfter(e);
                    // }),
                    document.querySelectorAll('#question_section.active .current').forEach(e =>{
                        if (e.innerHTML == 'Select one' || e.innerHTML == 'Select one or more'){
                            $('<span for="dates" class="error_input_select">Required</span>').insertAfter(e);
                        }
                    }),
                document
                    .querySelectorAll(".form_items.active .requireds")
                    .forEach((t) => {
                        if (((t.style.borderColor = "#EFEEEE"), "" == t.value))
                            e(
                                '<span for="dates" class="error">Required</span>'
                            ).insertAfter(t),
                                (t.style.borderColor = "red");
                        else {
                            t.style.borderColor = "#EFEEEE";
                            let o = e('.form_items.active [type="email"]');
                            /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*.com$/.test(
                                o.val()
                            ) ||
                                e(
                                    '<span for="dates" class="error">Email Required</span>'
                                ).insertAfter(o);
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
        e("input[type=email]").focusout(function (t) {
            e(".container-fluid").removeClass("position-content");
        }),
        e("input[type=email]").focusin(function (t) {
            e(".container-fluid").addClass("position-content");
        }),
        e("input[type=text]:not(#myDateTwo)").focusout(function (t) {
            e(".container-fluid").removeClass("position-content");
        }),
        e("input[type=text]:not(#myDateTwo)").focusin(function (t) {
            e(".container-fluid").addClass("position-content");
        }),
        $("#dtBox").DateTimePicker({ isPopup: !1 }),
        $(".myDates").on("click", function (e) {
            $(".overlays").addClass("actv"),
                $(".overlays").on("click", function (e) {
                    $(this).removeClass("actv"), $(".dtpicker-bg").remove();
                });
        }),
        rome(input, { time: !1 }),
        $("select:not(.ignore)").niceSelect();
})(window.jQuery);
