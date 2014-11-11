$.fn.rbmenu = function (e) {
    function r() {
        $(".rbmenu").find("li, a").unbind();
        if (window.innerWidth <= 768) {
            o();
            s();
            if (n == 0) {
                $(".rbmenu > li:not(.showhide)").hide(0)
            }
        } else {
            u();
            i()
        }
    }

    function i() {
        $(".rbmenu li").bind("mouseover", function () {
            $(this).children(".dropdown, .rbpanel").stop().fadeIn(t.interval)
        }).bind("mouseleave", function () {
            $(this).children(".dropdown, .rbpanel").stop().fadeOut(t.interval)
        })
    }

    function s() {
        $(".rbmenu > li > a").bind("click", function (e) {
            if ($(this).siblings(".dropdown, .rbpanel").css("display") == "none") {
                $(this).siblings(".dropdown, .rbpanel").slideDown(t.interval);
                $(this).siblings(".dropdown").find("ul").slideDown(t.interval);
                n = 1
            } else {
                $(this).siblings(".dropdown, .rbpanel").slideUp(t.interval)
            }
        })
    }

    function o() {
        $(".rbmenu > li.showhide").show(0);
        $(".rbmenu > li.showhide").bind("click", function () {
            if ($(".rbmenu > li").is(":hidden")) {
                $(".rbmenu > li").slideDown(300)
            } else {
                $(".rbmenu > li:not(.showhide)").slideUp(300);
                $(".rbmenu > li.showhide").show(0)
            }
        })
    }

    function u() {
        $(".rbmenu > li").show(0);
        $(".rbmenu > li.showhide").hide(0)
    }
    var t = {
        interval: 250
    };
    var n = 0;
    $(".rbmenu").prepend("<li class='showhide'><span class='title'>MENU</span><span class='icon1'></span><span class='icon2'></span></li>");
    r();
    $(window).resize(function () {
        r()
    })
}