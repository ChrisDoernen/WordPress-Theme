(function ($) {
    // Calculate landing page header height
    var h5 = $(window).height();
    var h6 = h5 / 2 - 165;
    var h7 = h6.toString() + 'px';
    $('.header-landing-page').height(h5);
    $('.welcome-area').css('top', h7);

    // Enable fading when landing page is scrolled
    var fadeStart = 0; // 100px scroll or less will equiv to 1 opacity
    var fadeUntil = 300; // 200px scroll or more will equiv to 0 opacity
    var fading = $('.fading');

    $(window).bind('scroll', function () {
        var offset = $(document).scrollTop() - fadeStart;
        var opacity = 0;

        if (offset <= fadeStart) {
            opacity = 1;
        }
        else if (offset <= fadeUntil) {
            opacity = 1 - offset / fadeUntil;
        }
        fading.css('opacity', opacity);
    });

    // Enable scroll down arrow
    $(function () {
        $('.scroll-down').click(function () {
            $('html, body').animate({ scrollTop: $('section.scroll-to').offset().top - 120 }, 1000);
            return false;
        });
    });
})(jQuery);

// Calculate padding of 
jQuery(window).on("load", function () {
    var h1 = jQuery('.height-source').height();
    var h2 = jQuery('.height-target').height();
    var h3 = h1 / 2 - h2 / 2;
    jQuery('.height-target').css('padding-top', h3);
});

// Calculate card posts meta width
(function ($) {
    var widthContainer = $('.card-posts__meta').width();
    var widthImg = $('.card-posts__avatar').outerWidth();
    var diff = widthContainer - widthImg - 20;
    var diffString = diff.toString() + 'px';
    $('.card-posts__info').css('width', diffString);
})(jQuery);

(function ($) {
    $(".navigation__menu, .navigation-overlay").click(function () {
        $(".sandwich").toggleClass("change");

        if ($(".navigation-overlay").hasClass("navigation-overlay--hidden")) {
            disableScroll();
            $(".navigation-overlay").removeClass("navigation-overlay--hidden");
            setTimeout(function () {
                $(".navigation-overlay--background-dark-gradient").addClass("opacity");
                $('.menu > ul > li').each(function (i, element) {
                    $(element).delay(i * 20).fadeIn();
                });
            }, 20);
        }
        else {
            enableScroll();
            $(".navigation-overlay--background-dark-gradient").removeClass("opacity");
            $(".navigation-overlay").addClass("navigation-overlay--hidden");
            $('.menu > ul > li').each(function (i, element) {
                $(element).delay(i * 20).fadeOut();
            });
        }

        $(".site-container").toggleClass("site-container--no-scroll");
    });

    $(document).keydown(function (e) {
        if (e.keyCode == 27) // Esc key = 27
        {
            if (!$(".navigation-overlay").hasClass("navigation-overlay--hidden"))
                $(".sandwich").toggleClass("change");
            {
                $(".navigation-overlay").addClass("navigation-overlay--hidden");
                $('.navigationList > ul > li').each(function (i, element) {
                    $(element).delay(i * 20).fadeOut();
                });
                $(".site-container").toggleClass("site-container--no-scroll");
            }
        }
    });

    $(function () {
        FastClick.attach(document.body);
    });

    // left: 37, up: 38, right: 39, down: 40,
    // spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
    var keys = { 37: 1, 38: 1, 39: 1, 40: 1 };

    function preventDefault(e) {
        e = e || window.event;
        if (e.preventDefault)
            e.preventDefault();
        e.returnValue = false;
    }

    function preventDefaultForScrollKeys(e) {
        if (keys[e.keyCode]) {
            preventDefault(e);
            return false;
        }
    }

    function disableScroll() {
        if (window.addEventListener) // older FF
            window.addEventListener('DOMMouseScroll', preventDefault, false);
        window.onwheel = preventDefault; // modern standard
        window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
        window.ontouchmove = preventDefault; // mobile
        document.onkeydown = preventDefaultForScrollKeys;
    }

    function enableScroll() {
        if (window.removeEventListener)
            window.removeEventListener('DOMMouseScroll', preventDefault, false);
        window.onmousewheel = document.onmousewheel = null;
        window.onwheel = null;
        window.ontouchmove = null;
        document.onkeydown = null;
    }

    $(".more-sermons-btn").click(function () {
        $(".card__sermon").each(function () {
            $(this).removeClass("hidden");
        });

        $(this).remove();
    });
})(jQuery);
