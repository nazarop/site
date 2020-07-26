!function(e) {
    e(["jquery"], function(e) {
        return function() {
            function t(e, t, n) {
                return g({
                    type: O.error,
                    iconClass: m().iconClasses.error,
                    message: e,
                    optionsOverride: n,
                    title: t
                })
            }
            function n(t, n) {
                return t || (t = m()),
                v = e("#" + t.containerId),
                v.length ? v : (n && (v = d(t)),
                v)
            }
            function o(e, t, n) {
                return g({
                    type: O.info,
                    iconClass: m().iconClasses.info,
                    message: e,
                    optionsOverride: n,
                    title: t
                })
            }
            function s(e) {
                C = e
            }
            function i(e, t, n) {
                return g({
                    type: O.success,
                    iconClass: m().iconClasses.success,
                    message: e,
                    optionsOverride: n,
                    title: t
                })
            }
            function a(e, t, n) {
                return g({
                    type: O.warning,
                    iconClass: m().iconClasses.warning,
                    message: e,
                    optionsOverride: n,
                    title: t
                })
            }
            function r(e, t) {
                var o = m();
                v || n(o),
                u(e, o, t) || l(o)
            }
            function c(t) {
                var o = m();
                return v || n(o),
                t && 0 === e(":focus", t).length ? void h(t) : void (v.children().length && v.remove())
            }
            function l(t) {
                for (var n = v.children(), o = n.length - 1; o >= 0; o--)
                    u(e(n[o]), t)
            }
            function u(t, n, o) {
                var s = !(!o || !o.force) && o.force;
                return !(!t || !s && 0 !== e(":focus", t).length) && (t[n.hideMethod]({
                    duration: n.hideDuration,
                    easing: n.hideEasing,
                    complete: function() {
                        h(t)
                    }
                }),
                !0)
            }
            function d(t) {
                return v = e("<div/>").attr("id", t.containerId).addClass(t.positionClass),
                v.appendTo(e(t.target)),
                v
            }
            function p() {
                return {
                    tapToDismiss: !0,
                    toastClass: "toast",
                    containerId: "toast-container",
                    debug: !1,
                    showMethod: "fadeIn",
                    showDuration: 300,
                    showEasing: "swing",
                    onShown: void 0,
                    hideMethod: "fadeOut",
                    hideDuration: 1e3,
                    hideEasing: "swing",
                    onHidden: void 0,
                    closeMethod: !1,
                    closeDuration: !1,
                    closeEasing: !1,
                    closeOnHover: !0,
                    extendedTimeOut: 1e3,
                    iconClasses: {
                        error: "toast-error",
                        info: "toast-info",
                        success: "toast-success",
                        warning: "toast-warning"
                    },
                    iconClass: "toast-info",
                    positionClass: "toast-bottom-left",
                    timeOut: 1300,
                    titleClass: "toast-title",
                    messageClass: "toast-message",
                    escapeHtml: !1,
                    target: "body",
                    closeHtml: '<button type="button">&times;</button>',
                    closeClass: "toast-close-button",
                    newestOnTop: !0,
                    preventDuplicates: !1,
                    progressBar: !1,
                    progressClass: "toast-progress",
                    rtl: !1
                }
            }
            function f(e) {
                C && C(e)
            }
            function g(t) {
                function o(e) {
                    return null == e && (e = ""),
                    e.replace(/&/g, "&amp;").replace(/"/g, "&quot;").replace(/'/g, "&#39;").replace(/</g, "&lt;").replace(/>/g, "&gt;")
                }
                function s() {
                    c(),
                    u(),
                    d(),
                    p(),
                    g(),
                    C(),
                    l(),
                    i()
                }
                function i() {
                    var e = "";
                    switch (t.iconClass) {
                    case "toast-success":
                    case "toast-info":
                        e = "polite";
                        break;
                    default:
                        e = "assertive"
                    }
                    I.attr("aria-live", e)
                }
                function a() {
                    E.closeOnHover && I.hover(H, D),
                    !E.onclick && E.tapToDismiss && I.click(b),
                    E.closeButton && j && j.click(function(e) {
                        e.stopPropagation ? e.stopPropagation() : void 0 !== e.cancelBubble && e.cancelBubble !== !0 && (e.cancelBubble = !0),
                        E.onCloseClick && E.onCloseClick(e),
                        b(!0)
                    }),
                    E.onclick && I.click(function(e) {
                        E.onclick(e),
                        b()
                    })
                }
                function r() {
                    I.hide(),
                    I[E.showMethod]({
                        duration: E.showDuration,
                        easing: E.showEasing,
                        complete: E.onShown
                    }),
                    E.timeOut > 0 && (k = setTimeout(b, E.timeOut),
                    F.maxHideTime = parseFloat(E.timeOut),
                    F.hideEta = (new Date).getTime() + F.maxHideTime,
                    E.progressBar && (F.intervalId = setInterval(x, 10)))
                }
                function c() {
                    t.iconClass && I.addClass(E.toastClass).addClass(y)
                }
                function l() {
                    E.newestOnTop ? v.prepend(I) : v.append(I)
                }
                function u() {
                    if (t.title) {
                        var e = t.title;
                        E.escapeHtml && (e = o(t.title)),
                        M.append(e).addClass(E.titleClass),
                        I.append(M)
                    }
                }
                function d() {
                    if (t.message) {
                        var e = t.message;
                        E.escapeHtml && (e = o(t.message)),
                        B.append(e).addClass(E.messageClass),
                        I.append(B)
                    }
                }
                function p() {
                    E.closeButton && (j.addClass(E.closeClass).attr("role", "button"),
                    I.prepend(j))
                }
                function g() {
                    E.progressBar && (q.addClass(E.progressClass),
                    I.prepend(q))
                }
                function C() {
                    E.rtl && I.addClass("rtl")
                }
                function O(e, t) {
                    if (e.preventDuplicates) {
                        if (t.message === w)
                            return !0;
                        w = t.message
                    }
                    return !1
                }
                function b(t) {
                    var n = t && E.closeMethod !== !1 ? E.closeMethod : E.hideMethod
                      , o = t && E.closeDuration !== !1 ? E.closeDuration : E.hideDuration
                      , s = t && E.closeEasing !== !1 ? E.closeEasing : E.hideEasing;
                    if (!e(":focus", I).length || t)
                        return clearTimeout(F.intervalId),
                        I[n]({
                            duration: o,
                            easing: s,
                            complete: function() {
                                h(I),
                                clearTimeout(k),
                                E.onHidden && "hidden" !== P.state && E.onHidden(),
                                P.state = "hidden",
                                P.endTime = new Date,
                                f(P)
                            }
                        })
                }
                function D() {
                    (E.timeOut > 0 || E.extendedTimeOut > 0) && (k = setTimeout(b, E.extendedTimeOut),
                    F.maxHideTime = parseFloat(E.extendedTimeOut),
                    F.hideEta = (new Date).getTime() + F.maxHideTime)
                }
                function H() {
                    clearTimeout(k),
                    F.hideEta = 0,
                    I.stop(!0, !0)[E.showMethod]({
                        duration: E.showDuration,
                        easing: E.showEasing
                    })
                }
                function x() {
                    var e = (F.hideEta - (new Date).getTime()) / F.maxHideTime * 100;
                    q.width(e + "%")
                }
                var E = m()
                  , y = t.iconClass || E.iconClass;
                if ("undefined" != typeof t.optionsOverride && (E = e.extend(E, t.optionsOverride),
                y = t.optionsOverride.iconClass || y),
                !O(E, t)) {
                    T++,
                    v = n(E, !0);
                    var k = null
                      , I = e("<div/>")
                      , M = e("<div/>")
                      , B = e("<div/>")
                      , q = e("<div/>")
                      , j = e(E.closeHtml)
                      , F = {
                        intervalId: null,
                        hideEta: null,
                        maxHideTime: null
                    }
                      , P = {
                        toastId: T,
                        state: "visible",
                        startTime: new Date,
                        options: E,
                        map: t
                    };
                    return s(),
                    r(),
                    a(),
                    f(P),
                    E.debug && console && console.log(P),
                    I
                }
            }
            function m() {
                return e.extend({}, p(), b.options)
            }
            function h(e) {
                v || (v = n()),
                e.is(":visible") || (e.remove(),
                e = null,
                0 === v.children().length && (v.remove(),
                w = void 0))
            }
            var v, C, w, T = 0, O = {
                error: "error",
                info: "info",
                success: "success",
                warning: "warning"
            }, b = {
                clear: r,
                remove: c,
                error: t,
                getContainer: n,
                info: o,
                options: {},
                subscribe: s,
                success: i,
                version: "2.1.4",
                warning: a
            };
            return b
        }()
    })
}("function" == typeof define && define.amd ? define : function(e, t) {
    "undefined" != typeof module && module.exports ? module.exports = t(require("jquery")) : window.toastr = t(window.jQuery)
}
);
//# sourceMappingURL=toastr.js.map
$(".circle" ).click(function()
{
    if($(this).attr('data-select') == 2)
  {
    $('#MineProfit').html(1.03);
    //$('#winSummaBoxBomb').html(($('#amountBetInputBomb').val()*1.03).toFixed(2));
  }
  if($(this).attr('data-select') == 3)
  {
    $('#MineProfit').html(1.03);
    //$('#winSummaBoxBomb').html(($('#amountBetInputBomb').val()*1.07).toFixed(2));
  }
  if($(this).attr('data-select') == 5)
  {
    $('#MineProfit').html(1.18);
    //$('#winSummaBoxBomb').html(($('#amountBetInputBomb').val()*1.18).toFixed(2));
  }
  if($(this).attr('data-select') == 10)
  {
    $('#MineProfit').html(1.58);
    //$('#winSummaBoxBomb').html(($('#amountBetInputBomb').val()*1.18).toFixed(2));
  }
  if($(this).attr('data-select') == 24)
  {
    $('#MineProfit').html(24);
    //$('#winSummaBoxBomb').html(($('#amountBetInputBomb').val()*24).toFixed(2));
  }
  $('.circle').removeClass('btn-primary');
  $('.circle').removeClass('actives');
  $('.circle').css('color', 'gray', 'background', '#fff');
  $(this).addClass('btn-primary');
  $(this).addClass('actives');
  $(this).css('color', '#fff', 'background', '#ff8c00');
});
 /*! Template: TokenWiz v1.0.3 */ ! function (e) {
     "use strict";
     var t = e(window),
         a = e("body"),
         o = e(document);

     function i() {
         return t.width()
     }
     "ontouchstart" in document.documentElement || a.addClass("no-touch");
     var n = i();
     t.on("resize", function () {
         n = i()
     });
     var l = e(".is-sticky"),
         r = e(".topbar"),
         s = e(".topbar-wrap");
     if (l.length > 0) {
         var c = l.offset();
         t.scroll(function () {
             var e = t.scrollTop(),
                 a = r.height();
             e > c.top ? l.hasClass("has-fixed") || (l.addClass("has-fixed"), s.css("padding-top", a)) : l.hasClass("has-fixed") && (l.removeClass("has-fixed"), s.css("padding-top", 0))
         })
     }
     var d = e("[data-percent]");
     d.length > 0 && d.each(function () {
         var t = e(this),
             a = t.data("percent");
         t.css("width", a + "%")
     });
     var p = window.location.href,
         g = p.split("#"),
         h = e("a");
     h.length > 0 && h.each(function () {
         p === this.href && "" !== g[1] && e(this).closest("li").addClass("active").parent().closest("li").addClass("active")
     });
     var f = e(".countdown-clock");
     f.length > 0 && f.each(function () {
         var t = e(this),
             a = t.attr("data-date");
         t.countdown(a).on("update.countdown", function (t) {
             e(this).html(t.strftime('<div><span class="countdown-time countdown-time-first">%D</span><span class="countdown-text">Day</span></div><div><span class="countdown-time">%H</span><span class="countdown-text">Hour</span></div><div><span class="countdown-time">%M</span><span class="countdown-text">Min</span></div><div><span class="countdown-time countdown-time-last">%S</span><span class="countdown-text">Sec</span></div>'))
         })
     });
     var u = e(".select");
     u.length > 0 && u.each(function () {
         e(this).select2({
             theme: "flat"
         })
     });
     var v = e(".select-bordered");
     v.length > 0 && v.each(function () {
         e(this).select2({
             theme: "flat bordered"
         })
     });
     var m = ".toggle-tigger",
         b = ".toggle-class";
     e(m).length > 0 && o.on("click", m, function (t) {
         var a = e(this);
         e(m).not(a).removeClass("active"), e(b).not(a.parent().children()).removeClass("active"), a.toggleClass("active").parent().find(b).toggleClass("active"), t.preventDefault()
     }), o.on("click", "body", function (t) {
         var a = e(m),
             o = e(b);
         o.is(t.target) || 0 !== o.has(t.target).length || a.is(t.target) || 0 !== a.has(t.target).length || (o.removeClass("active"), a.removeClass("active"))
     });
     var y = e(".toggle-nav"),
         x = e(".navbar");

     function C(e) {
         n < 991 ? e.delay(500).addClass("navbar-mobile") : e.delay(500).removeClass("navbar-mobile")
     }
     y.length > 0 && y.on("click", function (e) {
         y.toggleClass("active"), x.toggleClass("active"), e.preventDefault()
     }), o.on("click", "body", function (e) {
         y.is(e.target) || 0 !== y.has(e.target).length || x.is(e.target) || 0 !== x.has(e.target).length || (y.removeClass("active"), x.removeClass("active"))
     }), C(x), t.on("resize", function () {
         C(x)
     });
     var k = e('[data-toggle="tooltip"]');
     k.length > 0 && k.tooltip(), a.append(''), e(".demo-toggle").on("click", function () {
         e(".demo-content").slideToggle("slow")
     });
     var w = e(".color-trigger");
     w.length > 0 && w.on("click", function () {
         var t = e(this).attr("title");
         return e("body").fadeOut(function () {
             e("#layoutstyle").attr("href", "assets/css/" + t + ".css"), e(this).delay(150).fadeIn()
         }), !1
     });
     var T = e(".date-picker"),
         S = e(".date-picker-dob"),
         _ = e(".time-picker");

     function D(t, a) {
         "success" === a ? e(t).parent().find(".copy-feedback").text("Copied to Clipboard").fadeIn().delay(1e3).fadeOut() : e(t).parent().find(".copy-feedback").text("Faild to Copy").fadeIn().delay(1e3).fadeOut()
     }
     T.length > 0 && T.each(function () {
         e(this).datepicker({
             format: "mm/dd/yyyy",
             maxViewMode: 2,
             clearBtn: !0,
             autoclose: !0,
             todayHighlight: !0
         })
     }), S.length > 0 && S.each(function () {
         e(this).datepicker({
             format: "mm/dd/yyyy",
             startView: 2,
             maxViewMode: 2,
             clearBtn: !0,
             autoclose: !0
         })
     }), _.length > 0 && _.each(function () {
         e(this).parent().addClass("has-timepicker"), e(this).timepicker({
             timeFormat: "HH:mm",
             interval: 15
         })
     }), new ClipboardJS(".copy-clipboard").on("success", function (e) {
         D(e.trigger, "success"), e.clearSelection()
     }).on("error", function (e) {
         D(e.trigger, "fail")
     }), new ClipboardJS(".copy-clipboard-modal", {
         container: document.querySelector(".modal")
     }).on("success", function (e) {
         D(e.trigger, "success"), e.clearSelection()
     }).on("error", function (e) {
         D(e.trigger, "fail")
     });
     var z = e(".input-file");
     z.length > 0 && z.each(function () {
         var t = e(this),
             a = e(this).next(),
             o = e(this).next().text();
         t.on("change", function () {
             var e = t.val();
             a.html(e), a.is(":empty") && a.html(o)
         })
     });
     var L = e(".upload-zone");
     L.length > 0 && (Dropzone.autoDiscover = !1, L.each(function () {
         e(this).addClass("dropzone").dropzone({
             url: "/images"
         })
     }));
     var P = e(".image-popup");
     P.length > 0 && P.magnificPopup({
         type: "image",
         preloader: !0,
         removalDelay: 400,
         mainClass: "mfp-fade"
     });
     var A = e(".dt-init");
     A.length > 0 && A.DataTable({
         ordering: !1,
         autoWidth: !1,
         dom: '<t><"row align-items-center"<"col-sm-6 text-left"p><"col-sm-6 text-sm-right"i>>',
         pageLength: 5,
         bPaginate: e(".data-table tbody tr").length > 5,
         iDisplayLength: 5,
         language: {
             search: "",
             searchPlaceholder: "Type in to Search",
             info: "_START_ -_END_ of _TOTAL_",
             infoEmpty: "No records",
             infoFiltered: "( Total _MAX_  )",
             paginate: {
                 first: "First",
                 last: "Last",
                 next: "Next",
                 previous: "Prev"
             }
         }
     });
     var F = e(".dt-filter-init");
     if (F.length > 0) {
         var O = F.DataTable({
             ordering: !1,
             autoWidth: !1,
             dom: '<"row justify-content-between pdb-1x"<"col-9 col-sm-6 text-left"f><"col-3 text-right"<"data-table-filter relative d-inline-block">>><t><"row align-items-center"<"col-sm-6 text-left"p><"col-sm-6 text-sm-right"i>>',
             pageLength: 6,
             bPaginate: e(".data-table tbody tr").length > 6,
             iDisplayLength: 6,
             language: {
                 search: "",
                 searchPlaceholder: "Type in to Search",
                 info: "_START_ -_END_ of _TOTAL_",
                 infoEmpty: "No records",
                 infoFiltered: "( Total _MAX_  )",
                 paginate: {
                     first: "First",
                     last: "Last",
                     next: "Next",
                     previous: "Prev"
                 }
             }
         });
         e(".data-table-filter").append('<a href="#" class="btn btn-light-alt btn-xs btn-icon toggle-tigger"> <em class="ti ti-settings"></em> </a><div class="toggle-class toggle-datatable-filter dropdown-content dropdown-content-top-left text-left"><ul class="pdt-1x pdb-1x"><li class="pd-1x pdl-2x pdr-2x"> <input class="data-filter input-checkbox input-checkbox-sm" type="radio" name="filter" id="all" checked value=""> <label for="all">All</label></li><li class="pd-1x pdl-2x pdr-2x"> <input class="data-filter input-checkbox input-checkbox-sm" type="radio" name="filter" id="approved" value="approved"> <label for="approved">Approved</label></li><li class="pd-1x pdl-2x pdr-2x"> <input class="data-filter input-checkbox input-checkbox-sm" type="radio" name="filter" value="pending" id="pending"> <label for="pending">Pending</label></li><li class="pd-1x pdl-2x pdr-2x"> <input class="data-filter input-checkbox input-checkbox-sm" type="radio" name="filter" value="progress" id="progress"> <label for="progress">Progress</label></li><li class="pd-1x pdl-2x pdr-2x"> <input class="data-filter input-checkbox input-checkbox-sm" type="radio" name="filter" value="cancled" id="cancled"> <label for="cancled">Cancled</label></li></ul></div>'), e(".data-filter").on("change", function () {
             var t = e(this).val();
             O.columns(".dt-tnxno").search(t || "", !0, !1).draw()
         })
     }
     var B = "tknSale";
     if (e("#" + B).length > 0) {
         var H = document.getElementById(B).getContext("2d");
         new Chart(H, {
             type: "line",
             data: {
                 labels: ["01 Oct", "02 Oct", "03 Oct", "04 Oct", "05 Oct", "06 Oct", "07 Oct"],
                 datasets: [{
                     label: "",
                     tension: .4,
                     backgroundColor: "transparent",
                     borderColor: "#2c80ff",
                     pointBorderColor: "#2c80ff",
                     pointBackgroundColor: "#fff",
                     pointBorderWidth: 2,
                     pointHoverRadius: 6,
                     pointHoverBackgroundColor: "#fff",
                     pointHoverBorderColor: "#2c80ff",
                     pointHoverBorderWidth: 2,
                     pointRadius: 6,
                     pointHitRadius: 6,
                     data: [110, 80, 125, 55, 95, 75, 90]
                 }]
             },
             options: {
                 legend: {
                     display: !1
                 },
                 maintainAspectRatio: !1,
                 tooltips: {
                     callbacks: {
                         title: function (e, t) {
                             return "Date : " + t.labels[e[0].index]
                         },
                         label: function (e, t) {
                             return t.datasets[0].data[e.index] + " Tokens"
                         }
                     },
                     backgroundColor: "#eff6ff",
                     titleFontSize: 13,
                     titleFontColor: "#6783b8",
                     titleMarginBottom: 10,
                     bodyFontColor: "#9eaecf",
                     bodyFontSize: 14,
                     bodySpacing: 4,
                     yPadding: 15,
                     xPadding: 15,
                     footerMarginTop: 5,
                     displayColors: !1
                 },
                 scales: {
                     yAxes: [{
                         ticks: {
                             beginAtZero: !0,
                             fontSize: 12,
                             fontColor: "#9eaecf"
                         },
                         gridLines: {
                             color: "#e5ecf8",
                             tickMarkLength: 0,
                             zeroLineColor: "#e5ecf8"
                         }
                     }],
                     xAxes: [{
                         ticks: {
                             fontSize: 12,
                             fontColor: "#9eaecf",
                             source: "auto"
                         },
                         gridLines: {
                             color: "transparent",
                             tickMarkLength: 20,
                             zeroLineColor: "#e5ecf8"
                         }
                     }]
                 }
             }
         })
     }
     e(".modal").on("shown.bs.modal", function () {
         a.hasClass("modal-open") || a.addClass("modal-open")
     });
     var M = e(".drop-toggle");
     M.length > 0 && M.on("click", function (a) {
         t.width() < 991 && (e(this).parent().children(".navbar-dropdown").slideToggle(400), e(this).parent().siblings().children(".navbar-dropdown").slideUp(400), e(this).parent().toggleClass("current"), e(this).parent().siblings().removeClass("current"), a.preventDefault())
     });
     var N = e(".form-validate");
     N.length > 0 && N.each(function () {
         e(this).validate()
     });
     var E = e(".wizard-wrap").show();
     E.steps({
         headerTag: ".wizard-head",
         bodyTag: ".wizard-content",
         labels: {
             finish: "Submit",
             next: "Next",
             previous: "Prev",
             loading: "Loading ..."
         },
         onStepChanging: function (e, t, a) {
             return t > a || (t < a && (E.find(".body:eq(" + a + ") label.error").remove(), E.find(".body:eq(" + a + ") .error").removeClass("error")), E.validate().settings.ignore = ":disabled,:hidden", E.valid())
         },
         onFinishing: function (e, t) {
             return E.validate().settings.ignore = ":disabled", E.valid()
         },
         onFinished: function (e, t) {
             window.location.href = "thank-you.html"
         }
     }).validate({
         errorPlacement: function (e, t) {
             t.after(e)
         }
     })
     /**
 * wnoty.js v0.1
 * https://qcode.site
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 */
!(function($, win, doc) {
    "use strict";
    var _doc = $(doc),
        _win = $(win),
		wnoty = doc.createElement("div"),
        notify = "wnoty",
        _notify = "#",
        error = function(e) {
            throw "error: Cannot Notify => " + e;
        },
        warn = function(l) {
            (console.warn == "undefiend") ? console.log("Notify Warning: " + l) : console.warn("Notify Warning: " + l);
        },
        in_array = function(array, value) {
            for (var i = 0; i < array.length; i++) {
                if (array[i] === value) return true;
            }
            return false;
        },
        PrefixedEvent = function(element, type, callback) {
            var pfx = ["webkit", "moz", "MS", "o", ""];
            for (var p = 0; p < pfx.length; p++) {
                if (!pfx[p]) type = type.toLowerCase();
                _doc.on(pfx[p] + type, element, callback);
            }
        },
        closeNotify = function(button) {
            button.parents("." + notify + "-notification").removeClass("" + notify + "-show");
            setTimeout(function() {
                button.parents("." + notify + "-notification").addClass("" + notify + "-hide")
            }, 25);
        },
        initialize = function(set) {
            var main = doc.createElement("div"),
                wrapper = doc.createElement("div"),
                icon = doc.createElement("i"),
                text = doc.createElement("p"),
                close = doc.createElement("span");
			for(var g = 0; g < $("." + notify + "-notification").length; g++) {
                var g = g;
            }
			wnoty.className = "" + notify + "-block " + notify + "-" + set.position;
            main.className = "" + notify + "-notification " + notify + "-" + set.type + " leight-" + g;
			main.id = "leight-" + g;
            wrapper.className = notify + "-wrapper";
            if(set.type == "error") {
                icon.className = notify + "-icon fa fa-times-circle";
            } else if(set.type == "success") {
                icon.className = notify + "-icon fa fa-check-circle";
            } else if(set.type == "warning") {
                icon.className = notify + "-icon fa fa-exclamation-triangle";
            } else if(set.type == "info") {
                icon.className = notify + "-icon fas fa-info-circle";
            };
            close.className = "wnoty-close";
            doc.body.append(wnoty);
            wnoty.prepend(main);
            main.appendChild(wrapper);
            main.appendChild(close);
            wrapper.appendChild(icon);
            wrapper.appendChild(text);
            text.innerHTML = set.message;
			$("." + notify + "-notification").removeClass("wnoty-show");
			$("#leight-" + g).addClass("wnoty-show");
            if (set.autohide == true) {
                setTimeout(function() {
                    closeNotify($(close));
                }, set.autohideDelay)
            }
        };
    $.wnoty = function(options) {
        var positions = ["top-left", "bottom-left", "top-right", "bottom-right"],
            types = ["error", "success", "warning", "info"],
            defaults = {
                position: positions[2]
            }, settings = {
                message: "",
                type: "",
                autohide: true,
                autohideDelay: 2500,
                position: positions[2],
            };
        $.extend(settings, options);
        if(settings.type == "" && !settings.type.length) error("Type is not defined!");
        if(!in_array(types, settings.type)) error("Uhh, invalid notify type!");
        if(settings.message == "" && !settings.message.length) error("Hmmm, Message seems to be empty or not defined!");
        if(!in_array(positions, settings.position)) {
            warn("Oh, Invalid position switching to default!");
            settings.position = defaults.position;
        }
        if($("." + notify + "-notification").length >= 10) {
            $("." + notify + "-notification:last").remove();
        }
        initialize(settings);
    };
    PrefixedEvent($("." + notify + "-notification"), "AnimationEnd", function() {
        $(".wnoty-notification.wnoty-hide").remove();
    });
    _doc.on("click", ".wnoty-close", function() {
        closeNotify($(this));
    });
})(window.jQuery, window, document)
 }(jQuery);