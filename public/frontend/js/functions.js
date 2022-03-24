!(function (a) {
    "use strict";
    a(window).on("load", function () {
        a('[data-loader="circle-side"]').fadeOut(),
            a("#preloader").delay(350).fadeOut("slow"),
            a("body").delay(350),
            a(".left_title").addClass("start_animation"),
            a("#sub_content_in").addClass("start_animation");
    }),
        a("form#wrapped").on("submit", function () {
            var d = a("form#wrapped");
            d.validate(), d.valid() && a("#loader_form").fadeIn();
        }),
        a("select.ddslick").each(function () {
            a(this).ddslick({ showSelectedHTML: !0 });
        });
})(window.jQuery);
