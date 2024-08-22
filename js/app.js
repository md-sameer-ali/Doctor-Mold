jQuery(function ($) {
    $(document).ready(function () {
        let $header = $('.main_header');
        let $headerHeight = $header.outerHeight();
        let lastScrollTop = 0;
        // console.log(headerHeight);
        $(window).on('scroll', function () {
            let currentScrollTop = $(this).scrollTop();
            if (currentScrollTop > lastScrollTop && currentScrollTop > $headerHeight + 40) {
                // Scrolling down
                $header.css('top', '-' + $headerHeight + 'px');
                $header.removeClass('header_fixed')
            } else if (currentScrollTop == 0) {
                $header.removeClass('header_fixed')
            } else {
                // Scrolling up
                $header.css('top', '0');
                $header.addClass('header_fixed')
            }

            lastScrollTop = currentScrollTop;
        });


        // headerHeightPadding() function
        function headerHeightPadding() {
            let headerHeight = $(".main_header").outerHeight();
            $('.main_body').css({ 'padding-top': headerHeight });
        }
        headerHeightPadding();
        $(window).resize(function () {
            headerHeightPadding();
        });


        $(".mob_menu_btn").click(function () {
            $("body").addClass("bodyMenuOpen");
            $(".main_nav").addClass("main_nav_open");
            $(".responsiveOverlay").addClass("responsiveOverlay_on");
        });

        // Close Menu Bar
        $(".responsiveOverlay, .menu_close_btn").click(function () {
            $("body").removeClass("bodyMenuOpen");
            $(".main_nav").removeClass("main_nav_open");
            $(".responsiveOverlay").removeClass("responsiveOverlay_on");
            $(".main_header").css({ "z-index": "10" })
        });

        // Sub Menu
        $('.main_nav ul ul').each(function () {
            if ($(this).children().length) {
                $(this, 'li:first').parent().append('<span class="mean-expand"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></span>');
            }
        });
        $('.mean-expand').on("click", function (e) {
            e.preventDefault();
            if ($(this).hasClass("mean-clicked")) {
                $(this).prev('ul').slideUp(300, function () { });
            } else {
                $(this).prev('ul').slideDown(300, function () { });
            }
            $(this).toggleClass("mean-clicked");
        });


        // footer menu
        $('.footer_menu_col li').has('ul').addClass('has_child_ul');


        // match height
        function MatchHeight() {
            $('.blog_text h3').matchHeight({});
            $('.three_grid_text h4').matchHeight({});
            $('.compare_box_area h4').matchHeight({});
        }

        //Functions that run when all HTML is loaded
        $(document).ready(function () {
            MatchHeight();
        });


        $(".our_time_item").hover(
            function () {
                $(this).addClass('hovered');
                $(".our_time_item").not(this).addClass('not-hovered');
            },
            function () {
                $(this).removeClass('hovered');
                $(".our_time_item").removeClass('not-hovered');
            }
        );

    })

    /*===============
        Parallax Effect
    ===============*/
    gsap.registerPlugin(ScrollTrigger);
    if ($('.parallaxBg').length) {
        gsap.to(".parallaxBg", {
            backgroundPosition: "50% 100%", // Adjust as needed
            ease: "none",
            scrollTrigger: {
                trigger: ".parallaxBg",
                start: "top bottom",
                end: "bottom top",
                scrub: true
            }
        });
    }
    if ($('.parallaxSingle').length) {
        gsap.to(".parallaxSingle", {
            backgroundPositionY: "100%", // Adjust as needed
            ease: "none",
            scrollTrigger: {
                trigger: ".parallaxSingle",
                start: "top bottom",
                end: "bottom top",
                scrub: true
            }
        });
    }


    /*======================
        Featured Slide
    ======================*/
    var featuredSwiper = new Swiper(".featured_product_slide", {
        navigation: {
            nextEl: ".featured_slide_btn_next",
            prevEl: ".featured_slide_btn_prev",
        },
        loop: true,
        breakpoints: {
            500: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            991: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 60,
            },
        },
    });


    var resourceSwiper = new Swiper(".resource_slide", {
        navigation: {
            nextEl: ".resource_slide_btn_next",
            prevEl: ".resource_slide_btn_prev",
        },
        loop: true,
        breakpoints: {
            550: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            991: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 60,
            },
        },
    });
    let testimonialSwiper = new Swiper(".testimonial_swiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
    let videoSwiper = new Swiper(".videoSwiper", {
        loop: true,
        navigation: {
            nextEl: ".videoSwiper_next",
            prevEl: ".videoSwiper_prev",
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 30,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
        },
    });
    let waterSwiper = new Swiper(".waterSwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination",
        },

    });



    //  Tab Script
    // $(".tab_content").hide();
    // $(".tab_content:first").show();
    // $(".tabs-menu li:first").addClass("current");

    // $(".tabs-menu li a").click(function (event) {
    //     event.preventDefault();
    //     $(this).parent().addClass("current");
    //     $(this).parent().siblings().removeClass("current");

    //     var homeTab = $(this).attr("href");
    //     $(".tab_content").not(homeTab).hide();
    //     $(homeTab).fadeIn();
    // });

    $(".tab_content").hide();
    $(".tabs_main").each(function () {
        $(this).find(".tab_content:first").show();
        $(this).find(".tabs-menu li:first").addClass("current");
    });

    $(".tabs-menu li a").click(function (event) {
        event.preventDefault();
        let tabId = $(this).attr("href");

        $(this).closest(".tabs_main").find(".tab_content").hide();
        $(tabId).fadeIn();

        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
    });


    $('.tab_accordian_head:first').addClass('current');
    $(".tab_content:first").show();
    $('.tab_accordian_head').click(function () {
        if ($(this).hasClass('current')) {
            $(this).removeClass('current');
        } else {
            $('.tab_accordian_head').removeClass('current');
            $(this).addClass('current');
        }
        $(this).next().slideToggle();
        $(this).closest('.tabs_main').find('.tab_content').not($(this).next()).slideUp();
    });


    // For All Accordion
    $('.accordion_wrap').each(function () {
        var $accordion = $(this);
        $accordion.find('.accordion_head:first').addClass('current');
        $accordion.find('.accordion_content').hide();
        $accordion.find('.accordion_content:first').show();

        $accordion.find('.accordion_head').click(function () {
            if ($(this).hasClass('current')) {
                $(this).removeClass('current');
            } else {
                $accordion.find('.accordion_head').removeClass('current');
                $(this).addClass('current');
            }
            $(this).next().slideToggle();
            $accordion.find('.accordion_content').not($(this).next()).slideUp();
        });
    });

    // Resource Select 2
    if ($('#resourceCat').length) {
        $('#resourceCat').select2();
    }

    let videoPlayerModal = $('.video_player_modal');
    let videoShowcase = $('.video_pop_up_btn');
    let cutButton = $('.cut_button');

    if (videoPlayerModal) {
        $(videoShowcase).on('click', function () {
            $(videoPlayerModal).modal('show');
        });
        $(cutButton).on('click', function () {
            $(videoPlayerModal).modal('hide');
        });
    }





})