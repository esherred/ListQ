/*
 * Title:   ListQ - Directory & Listing - HTML Template
 * Author:  QTC Media
 */

"use strict"; // Start of use strict

$ = jQuery;

function stickyHeader() {
    if ($('.stricky').length) {
        var strickyScrollPos = 100;
        if ($(window).scrollTop() > strickyScrollPos) {
            $('.stricky').removeClass('fadeIn animated');
            $('.stricky').addClass('stricky-fixed fadeInDown animated');
        }
        else {
            $('.stricky').removeClass('stricky-fixed fadeInDown animated');
            $('.stricky').addClass('slideIn animated');
        }
    }
   ;
}

function counterNumber() {
    if($('.counter').length) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    }
}

function hoverDir() {
    if($('.da-thumbs').length) {
        $('.da-thumbs .listq-hvr-dir').hoverdir();
    }
}

function backToTop() {
    if ($('.backtotop').length) {
        var scrollTrigger = 700,
        backTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('.backtotop').addClass('show-backtotop');
            } else {
                $('.backtotop').removeClass('show-backtotop');
            }
        };
        
        $(window).on('scroll', function () {
            backTop();
        });
    }
}

function clickToTop() {
    if ($('.backtotop').length) {
        $('.backtotop').on('click', function() {
            $('body,html').animate({
                scrollTop: 0
            }, 500);
            
            return false;
        });
    }
}

function barsMobile() {
    if ($('.bars').length) {
        $('.bars').on('click', function () {
            $('.mobile-menu').slideToggle(300, 'linear');
            $('.bars').toggleClass('open');
            return false;
        });
    }
}

function submenuMobile() {
    if ($('.nav-holder').length) {
        $('.nav-holder li.has-submenu').children('a').append(function () {
            return '<button class="dropdown-expander"><span class="fa fa-chevron-down"></span></button>';
        });
        
        $('.nav-holder .dropdown-expander').on('click', function () {
            if($(this).parent().parent().hasClass('active')) {
                $(this).parent().parent().children('.submenu').slideToggle();
                $(this).find('span').toggleClass('fa-chevron-down fa-chevron-up');
                $(this).parent('a').parent('li').toggleClass('active');
            }
            else {
                $('.nav-holder li.has-submenu .submenu').slideUp();
                $('.nav-holder li.has-submenu').removeClass('active');
                $('.nav-holder li.has-submenu .dropdown-expander').find('span').removeClass('fa-chevron-up');
                $('.nav-holder li.has-submenu .dropdown-expander').find('span').addClass('fa-chevron-down');
                $(this).parent().parent().addClass('active');
                $(this).find('span').removeClass('fa-chevron-down');
                $(this).find('span').addClass('fa-chevron-up');
                $(this).parent().parent().children('.submenu').slideDown();
            }
            return false;
        });
    }
}

function isotopeMasonry() {
    if($('#isotope-masonry').length) {
        var $grid = $('.grid').isotope({
            itemSelector: '.grid-item'
        });
        
        $('.filters-button-group .btn-filter').on( 'click', function() {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({ filter: filterValue });
        });
        
        $('.button-group .btn-filter').each(function() {
            $(this).on('click', function() {
                $('.button-group').find('.is-checked').removeClass('is-checked');
                $(this).addClass('is-checked');
            });
        });
    }
}

// instance of fuction while Document ready event
jQuery(document).on('ready', function () {
    (function ($) {
        stickyHeader();
        counterNumber();
        hoverDir();
        clickToTop();
        barsMobile();
        submenuMobile();
    })(jQuery);
});

// instance of fuction while Window Scroll event
jQuery(window).on('scroll', function () {
   (function ($) {
       stickyHeader();
       backToTop();
   })(jQuery);
});

// instance of fuction while Window Load event
jQuery(window).on('load', function () {
   (function ($) {
      isotopeMasonry();
   })(jQuery);
});

