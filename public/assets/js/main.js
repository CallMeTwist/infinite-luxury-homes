jQuery(function (e) {
    "use strict";
    e(window).on("load", function () {
        e(".loader-blob").fadeOut(),
            e("#preloader")
                .delay(300)
                .fadeOut("slow", function () {
                    e(this).remove();
                });
    }),
        e(window).on("scroll", function () {
            matchMedia("only screen and (min-width: 1200px)").matches && (e(window).scrollTop() >= 50 ? e(".prt-stickable-header").addClass("fixed-header") : e(".prt-stickable-header").removeClass("fixed-header"));
        });
    var t = {
        initialize: function () {
            this.Menuhover();
        },
        Menuhover: function () {
            var t = e("nav.main-menu");
            e(window).width(),
                e(window).height(),
                t.find("ul.menu").data("in"),
                t.find("ul.menu").data("out"),
            matchMedia("only screen and (max-width: 1200px)").matches &&
            e("nav.main-menu ul.menu").each(function () {
                e("a.mega-menu-link", this).on("click", function (t) {
                    t.preventDefault(), e(this).toggleClass("active").next("ul").toggleClass("active");
                }),
                    e(".megamenu-fw", this).each(function () {
                        e(".col-menu", this).each(function () {
                            e(".title", this).off("click"),
                                e(".title", this).on("click", function () {
                                    return e(this).closest(".col-menu").find(".content").stop().toggleClass("active"), e(this).closest(".col-menu").toggleClass("active"), !1;
                                });
                        });
                    });
            });
        },
    };
    e(".btn-show-menu-mobile").on("click", function (t) {
        return e(this).toggleClass("is-active"), e(".menu-mobile").toggleClass("show"), !1;
    }),
        e(document).ready(function () {
            t.initialize();
        });
    var n = jQuery(".banner_slider"),
        a = e("div.slide:first-child");
    function i(t) {
        t.each(function () {
            var t = e(this),
                n = t.data("delay"),
                a = "animated " + t.data("animation");
            t.css({ "animation-delay": n, "-webkit-animation-delay": n }),
                t.addClass(a).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function () {
                    t.removeClass(a);
                });
        });
    }
    function o() {
        jQuery(".prt-expandcontent-yes").each(function () {
            var e = (jQuery(window).width() - jQuery(this).parent().width()) / 3;
            jQuery(this).hasClass("prt-right-span")
                ? jQuery(".prt-expandcontent_column > div" + ", .prt-expandcontent_column > .prt-expandcontent_wrapper ", jQuery(this)).css("margin-right", "-" + e + "px")
                : jQuery(this).hasClass("prt-left-span") && jQuery(".prt-expandcontent_column > div" + ", .prt-expandcontent_column > .prt-expandcontent_wrapper ", jQuery(this)).css("margin-left", "-" + e + "px");
        });
    }
    n.on("init", function (e, t) {
        i(a.find("[data-animation]"));
    }),
        n.on("beforeChange", function (t, n, a, o) {
            i(e('div.slick-slide[data-slick-index="' + o + '"]').find("[data-animation]"));
        }),
        n.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: !0,
            fade: !0,
            dots: !1,
            swipe: !0,
            adaptiveHeight: !0,
            responsive: [
                { breakpoint: 1200, settings: { arrows: !1 } },
                { breakpoint: 767, settings: { slidesToShow: 1, slidesToScroll: 1, arrows: !1, autoplay: !1, autoplaySpeed: 4e3, swipe: !0 } },
            ],
        }),
        e("[data-appear-animation]").each(function () {
            var t = e(this),
                n = t.data("appear-animation");
            t.data("appear-animation-delay") && t.data("appear-animation-delay"),
                e(window).width() > 959
                    ? (t.html("0"),
                        t.waypoint(
                            function (e) {
                                if (!t.hasClass("completed")) {
                                    var n = t.data("from"),
                                        a = t.data("to"),
                                        i = t.data("interval");
                                    t.numinate({
                                        format: "%counter%",
                                        from: n,
                                        to: a,
                                        runningInterval: 2e3,
                                        stepUnit: i,
                                        onComplete: function (e) {
                                            t.addClass("completed");
                                        },
                                    });
                                }
                            },
                            { offset: "85%" }
                        ))
                    : "animateWidth" == n && t.css("width", t.data("width"));
        }),
        e(".prt-progress-bar").each(function () {
            e(this).find(".progress-bar").width(0);
        }),
        e(".prt-progress-bar").each(function () {
            e(this)
                .find(".progress-bar")
                .animate({ width: e(this).attr("data-percent") }, 2e3);
        }),
        e(".progress-bar-percent[data-percentage]").each(function () {
            var t = e(this),
                n = Math.ceil(e(this).attr("data-percentage"));
            e({ countNum: 0 }).animate(
                { countNum: n },
                {
                    duration: 2e3,
                    easing: "linear",
                    step: function () {
                        var e;
                        (e = "0" === n ? Math.floor(this.countNum) + "%" : Math.floor(this.countNum + 1) + "%"), t.text(e);
                    },
                }
            );
        }),
        jQuery(".prt-circle-box").each(function () {
            var e = jQuery(this),
                t = e.data("fill"),
                n = e.data("emptyfill"),
                a = e.data("thickness"),
                i = e.data("linecap"),
                o = e.data("gradient");
            if (("" != o && (t = { gradient: [(o = o.split("|"))[0], o[1]] }), "function" == typeof jQuery.fn.circleProgress)) {
                var s = e.data("digit"),
                    r = e.data("before"),
                    l = e.data("after"),
                    c = (s = Number(s)) / 100,
                    d = e.data("size");
                jQuery(".prt-circle", e)
                    .circleProgress({ value: 0, duration: 8e3, size: d, startAngle: (-Math.PI / 4) * 1.5, thickness: a, linecap: i, emptyFill: n, fill: t })
                    .on("circle-animation-progress", function (t, n, a) {
                        e.find(".prt-fid-number").html(r + Math.round(100 * a) + l);
                    });
            }
            e.waypoint(
                function (t) {
                    e.hasClass("completed") || ("function" == typeof jQuery.fn.circleProgress && jQuery(".prt-circle", e).circleProgress({ value: c }), e.addClass("completed"));
                },
                { offset: "90%" }
            );
        }),
        jQuery(document).ready(function (e) {
            o();
        }),
        jQuery(window).resize(function () {
            o();
        }),
        e(".accordion > .toggle").children(".toggle-content").hide(),
        e(".toggle-title").on("click", function (t) {
            t.preventDefault();
            var n = e(this);
            n.parent().parent().find(".toggle .toggle-title a").removeClass("active"),
                n.next().hasClass("show")
                    ? (n.next().removeClass("show"), n.next().slideUp("easeInExpo"))
                    : (n.parent().parent().find(".toggle .toggle-content").removeClass("show"),
                        n.parent().parent().find(".toggle .toggle-content").slideUp("easeInExpo"),
                        n.next().toggleClass("show"),
                        n.next().removeClass("show"),
                        n.next().slideToggle("easeInExpo"),
                        n.next().parent().children().children().addClass("active"));
        }),
        e(".slick_slider").slick({
            speed: 1e3,
            infinite: !0,
            arrows: !1,
            dots: !1,
            autoplay: !1,
            centerMode: !1,
            responsive: [
                { breakpoint: 1360, settings: { slidesToShow: 3, slidesToScroll: 3 } },
                { breakpoint: 1024, settings: { slidesToShow: 3, slidesToScroll: 3 } },
                { breakpoint: 680, settings: { slidesToShow: 2, slidesToScroll: 2 } },
                { breakpoint: 575, settings: { slidesToShow: 1, slidesToScroll: 1 } },
            ],
        }),
        jQuery(document).ready(function () {
            jQuery(".prt_listimgbox_wrapper .prt_listimgbox_wrap").hover(function () {
                jQuery(".prt_listimgbox_wrapper .prt_listimgbox_wrap").removeClass("active"), jQuery(this).addClass("active");
            });
        }),
        jQuery("#totop").hide(),
        e(window).on("scroll", function () {
            jQuery(this).scrollTop() >= 500 ? (jQuery("#totop").fadeIn(200), jQuery("#totop").addClass("top-visible")) : (jQuery("#totop").fadeOut(200), jQuery("#totop").removeClass("top-visible"));
        }),
        jQuery("#totop").on("click", function () {
            return jQuery("body,html").animate({ scrollTop: 0 }, 500), !1;
        });
}),
