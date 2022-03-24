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
            document
                .querySelectorAll(".form_items.active .requireds")
                .forEach((o) => {
                    if (((o.style.borderColor = "#EFEEEE"), "" == o.value))
                        e(
                            '<span for="dates" class="error">Required</span>'
                        ).insertAfter(o),
                            (o.style.borderColor = "red");
                    else {
                        e(".error").remove(), (o.style.borderColor = "#EFEEEE");
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
                0 == e(".error").length &&
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
})(window.jQuery),
    document
        .querySelectorAll('.appCheckBox.form_items [type="checkbox"]')
        .forEach(function (e) {
            e.onclick = function (e) {
                document
                    .querySelectorAll(
                        '.appCheckBox.form_items.active [type="checkbox"]'
                    )
                    .forEach(function (e) {
                        (e.checked = !1), e.removeAttribute("id");
                    }),
                    (this.checked = !0),
                    this.setAttribute("id", "tCheckBox"),
                    document.querySelectorAll(".error").forEach((e) => {
                        e.remove();
                    });
            };
        });
