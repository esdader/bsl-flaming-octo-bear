(function ($, window) {
    'use strict';

    var $header             = $('.l-header-con'),
        $footer             = $('.l-short-footer-con'),
        photoHeight         = 540,
        photoWidth          = 960,
        photoRatio          = photoWidth / photoHeight,
        scrollToLinks       = $('.scroll-to-panel'),
        $body               = $(document.body),
        $menuToggle         = $('.js-menu-toggle'),
        $menuCloseBtn       = $('.js-close-nav-btn'),
        $window             = $(window),
        $el                 = $('video'),
        $videoCon           = $('.video-container'),
        $homepageHeading    = $('.home-title'),
        $teamMember         = $('.team-member'),
        $teamMembers        = $('.team-member-nav'),
        $blogImageBtns      = $('.l-blog-landing-entry').find('img'),
        $blogTitleBtns      = $('.blog-landing-title'),
        $blogCloseBtns      = $('.news-close-btn'),
        $blogSingleCloseBtn = $('.single-news-close-btn'),
        $loadStudyBtn       = $('.js-load-study'),
        $studyCon           = $('.l-study-con'),
        isLogoBig           = true,
        isBackToTopShowing  = false,
        $backToTopBtn       = $('.back-to-top'),
        $mindguideIcons     = $('.tool-three-icon-view'),
        $brandEmbraceIndex  = $('.brandembrace-index-number'),
        $brandEmbraceIndexCon = $('.brandembrace-index-col'),
        $mindguideInfographicHolder = $('.mindguide-infographic-holder'),
        theNumberText         = 3,
        hasVidElement         = true,
        brandembracePosTrackerTimer,
        brandembraceIndexPos,
        brandembraceCounterTimer,
        $mindguideIconsPos,
        mindguideIconsTracker,
        currentPos,
        availableHeight,
        aspectRatio,
        sideCrop,
        imageWidth,
        winH,
        winW,
        i = 0;

    function findAvailableSpace() {
        var headerH = $header.outerHeight(),
            footerH = $footer.outerHeight(),
            homeCopyH = $('.l-home-copy').outerHeight(),
            headerH   = $header.outerHeight(),
            offset;

        winH = $window.height();
        winW = $window.width();
        availableHeight = winH;
        // if (winW > 800) {
        //     availableHeight = winH;
        // } else {
        //     availableHeight = winH - headerH;
        //     $videoCon.css('top', headerH + 'px');
        // }

        aspectRatio = winW / availableHeight;

        $videoCon.css({
            width: winW + 'px',
            height: availableHeight + 'px',
            overflow: 'hidden'
        });

        if (homeCopyH < (winH - headerH)) {
            offset = (winH - homeCopyH - headerH) / 2 + headerH;
            ;
        } else {
            offset = 5 * 16;
        }

        $('.l-home-copy').css({
            'min-height' : availableHeight + 'px',
            'padding-top' : offset + 'px'
        });

        scaleLayout();
    }

    function scaleLayout() {

        var vid = document.getElementById('js-hompage-video');
        if (hasVidElement) {
            if (winW < 800) {
                var img = $(vid).find('img');
                img.insertBefore(vid);
                $(vid).remove();
                $el = img;
                hasVidElement = false;
            } else {
                vid.play();    
            }
        }

        if (aspectRatio > photoRatio) {
            var curHeight = photoRatio * availableHeight,
                marginTop = (availableHeight - curHeight) / 2;
            $el.css({
                'margin-left' : '0',
                'margin-top' : marginTop + 'px',
                'width' : winW + 'px',
                'height' : curHeight + 'px'
            });

        } else {
            var marginLeft;

            sideCrop = (winH *  photoRatio - winW) / 2;
            imageWidth = winH * photoRatio;
            marginLeft = '-' + sideCrop + 'px';
            $el.css({
                'margin-top' : '0',
                'margin-left' : '-'+sideCrop + 'px',
                'width' : imageWidth + 'px',
                'height' : availableHeight + 'px'
            });

        }



        
    }

    // close the study
    function closeStudy() {
        $studyCon
            .slideUp(function (){
                $studyCon.empty();
                $('html, body').animate({
                    scrollTop: currentPos
                }, 500);
            });
        $('.study-is-open').removeClass('study-is-open');
    }

    function scrollToStudy () {
        var headerHeight = $header.outerHeight(),
            studiesHeight = $('.l-studies-con').outerHeight(),
            studiesTop    = $('.l-studies-con').offset().top,
            scrollPos = studiesHeight + studiesTop - headerHeight - 25;

        $('html, body').animate({
            scrollTop: scrollPos
        }, 500);
    }

    function initiateAjaxLoad(earl) {
        $.ajax({
                url: earl,
                dataType: 'html',
                cache: false
            })
            .done(function( html ) {
             var parsedHtml = jQuery("<div>").append( jQuery.parseHTML( html ) ).find('#current-study' );
                
                $studyCon
                    .append(parsedHtml)
                    .slideDown(function (){
                        scrollToStudy();
                    });
            });
    }

    // load the study

    function loadStudy(earl, openStudy) {
        earl = earl;

        currentPos = $('body').scrollTop() || $('html').scrollTop();

        if (openStudy) {

            $studyCon
                .slideUp(function() {

                    $studyCon.empty();
                        initiateAjaxLoad(earl);
                });
        } else {
            initiateAjaxLoad(earl);
        }
    }

    function findPanel(earl) {
        return $(earl);
    }

    function scrollToPanel(panel) {
        var offset    = $header.outerHeight(),
            panelTop  = panel.offset().top,
            scrollPos = panelTop - offset;

            $('html, body').animate({
                scrollTop: scrollPos
            }, 500);

    }

    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

    /**
     * Animation events
     */

    // helper functions
    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min)) + min;
    }

    function padNumberLoop(number, length) {
        var my_string = '' + number;
        while (my_string.length < length) {
            my_string = '0' + my_string;
        }
        return my_string;
    }

    // mindguide icons
    function checkMindguidePos () {
        var windowTop = $('body').scrollTop() || $('html').scrollTop(),
            winBottom = $(window).height() + windowTop - 200;

        if (winBottom > $mindguideIconsPos) {
            clearInterval(mindguideIconsTracker);
            $mindguideIcons.addClass('show-tool-icons');
        }
    }

    // brandembrace index
    function brandembraceCounter () {
        var num = padNumberLoop(theNumberText, 2);
        $brandEmbraceIndex.text(num);
        
        var num = getRandomInt(1, 4);
        theNumberText += num;
        if (theNumberText > 64) {
          clearInterval(brandembraceCounterTimer);
          $brandEmbraceIndex.text(64);
        }
    }

    // mindguide dna infographic
    $mindguideInfographicHolder.on('click', function () {
        if ( $(window).width() > 720 ) {
            $(this).toggleClass('show-other-side');    
        }
        
    });

    $mindguideInfographicHolder.on('mouseenter', function () {
        if ( $(window).width() > 720 ) {
            $(this).addClass('show-other-side');
        }
    });

    $mindguideInfographicHolder.on('mouseleave', function () {
        $(this).removeClass('show-other-side');
    });



    // tracking brandebrace position

    function brandembraceIndexPosTracker () {
        var windowTop = $('body').scrollTop() || $('html').scrollTop(),
            winBottom = $(window).height() + windowTop - 125;

        if (winBottom > brandembraceIndexPos) {
            brandembraceCounterTimer = window.setInterval(brandembraceCounter, 100);
            clearInterval(brandembracePosTrackerTimer);
        }
    }

    /**
     * Events
     */

    // checking for scroll to click on nav
    scrollToLinks.on('click', function (e) {
        e.preventDefault();

        var $this = $(this),
            earl  = $this.attr('href'),
            panel;

        panel = findPanel(earl);
        scrollToPanel(panel);

    });

    // resize events
    $window.resize( function() {
        findAvailableSpace();

        // recalculate positions and start retracking
        // mindguide and brandembrace animation trigger
        if ($mindguideIcons.length > 0) {
            $mindguideIconsPos = $mindguideIcons.offset().top;
            mindguideIconsTracker = window.setInterval(checkMindguidePos, 100);    
        }

        if ($brandEmbraceIndex.length > 0) {
            brandembraceIndexPos = $brandEmbraceIndexCon.offset().top;
            brandembracePosTrackerTimer = window.setInterval(brandembraceIndexPosTracker, 100);
        }
    });

    $('.l-study-con').on('click', '.close-study', function () {
        closeStudy();
    });

    $blogImageBtns.on('click', function () {
        var $this = $(this),
            con = $this.closest('.l-blog-landing-con'),
            outer = con.next('.l-outer'),
            el    = outer.find('.l-blog-single-entry-con');
            
        currentPos = $('body').scrollTop() || $('html').scrollTop();
        el.slideToggle();
        scrollToPanel(outer);
    });

     $blogTitleBtns.on('click', function () {
        var $this = $(this),
            con = $this.closest('.l-blog-landing-con'),
            outer = con.next('.l-outer'),
            el    = outer.find('.l-blog-single-entry-con');
        currentPos = $('body').scrollTop() || $('html').scrollTop();
        el.slideToggle();
        scrollToPanel(outer);
    });

     $blogCloseBtns.on('click', function () {
        $(this).parent().parent().parent().parent().slideUp();
        $('html, body').animate({
            scrollTop: currentPos
        }, 500);
     });

    $blogSingleCloseBtn.on('click', function () {
        var url = window.location.href;

        if (url.substr(-1) == '/') url = url.substr(0, url.length - 2);
        
        url = url.split('/');
        url.pop();
        url = url.join('/') + '/news';
        window.location = url;
    });

    // menu toggle
    $menuToggle.on('click', function() {
        $body.toggleClass('nav-shift');
    });

    // menu close button
    $menuCloseBtn.on('click', function() {
        $body.removeClass('nav-shift');
    });

    // team member click replacement for hover on touch
    $teamMember.on('click', function() {
        $teamMembers
            .find('.show-rolls')
                .removeClass('show-rolls');
        
        $(this)
            .addClass('show-rolls');
    });


    $loadStudyBtn.on('click', function (e) {
        var $this = $(this),
            earl = $this.attr('href'),
            openStudies = $('.study-is-open'),
            openStudy = false;
        e.preventDefault();

        if ($this.hasClass('study-is-open')) {
            return;
        }

        if (openStudies.length > 0) {
            openStudies.removeClass('study-is-open');
            openStudy = true;
        }

        $this.addClass('study-is-open');
        // load the study
        loadStudy(earl, openStudy);
    });

    $backToTopBtn.on('click', function() {
        $('html, body').animate({
            scrollTop: 0
        }, 300);
    });

    $studyCon.on('click', '.js-open-registration-modal', function () {
        $('.l-registration-outer-con').fadeIn();
    });

    $('.close-reg-btn').on('click', function () {
        $('.l-registration-outer-con').fadeOut();
    });

    $studyCon.on('click', '.js-open-video-modal', function () {
        $('.l-video-modal-con').fadeIn();

        var theForm  = $('#wpcf7-f88-o1'),
            theTitle = $('.study-title').text();


        theForm.find('.download-name').val(bslDltracker.name);
        theForm.find('.download-email').val(bslDltracker.email);
        theForm.find('.download-phone-number').val(bslDltracker.phoneNumber);
        theForm.find('download-title').val(bslDltracker.title);
        theForm.find('.download-company').val(bslDltracker.company);
        theForm.find('.download-email').val(bslDltracker.email);
        theForm.find('.download-date').val(bslDltracker.date);
        theForm.find('.download-study-name').val(theTitle);
        
        theForm.find('.download-download-type').val('webinar');

        theForm.find('.download-tracker-submit').trigger('click');
    });

    $studyCon.on('click', '.close-video-btn', function () {
        $('.l-video-modal-con').fadeOut();
    });

    $studyCon.on('click', '.js-download-pdf', function (e) {


        var theForm  = $('#wpcf7-f88-o1'),
            theTitle = $('.study-title').text();


        theForm.find('.download-name').val(bslDltracker.name);
        theForm.find('.download-email').val(bslDltracker.email);
        theForm.find('.download-phone-number').val(bslDltracker.phoneNumber);
        theForm.find('download-title').val(bslDltracker.title);
        theForm.find('.download-company').val(bslDltracker.company);
        theForm.find('.download-email').val(bslDltracker.email);
        theForm.find('.download-date').val(bslDltracker.date);
        theForm.find('.download-study-name').val(theTitle);
        theForm.find('.download-download-type').val('PDF');

        theForm.find('.download-tracker-submit').trigger('click');


    });

    function checkBodyPos() {
        var offy = $('body').scrollTop() || $('html').scrollTop();

        if (offy > 25) {
            if (isLogoBig === true) {
                $header.addClass('show-short-view');
                isLogoBig = false;
            }
        } else {
            if (isLogoBig === false) {
                $header.removeClass('show-short-view');
                isLogoBig = true;
            }
        }

        if ( offy > $window.height() ) {
            if (isBackToTopShowing === false) {
                $backToTopBtn.addClass('show-back-to-top');
                isBackToTopShowing = true;
            }
        } else {
            if (isBackToTopShowing === true) {
                $backToTopBtn.removeClass('show-back-to-top');
                isBackToTopShowing = false;
            }
        }


    }
        // login forms
        
        $(".tab_content_login").hide();
        $("ul.tabs_login li:first").addClass("active_login").show();
        $(".tab_content_login:first").show();
        $("ul.tabs_login li").on('click', function(e) {
            $("ul.tabs_login li").removeClass("active_login");
            $(this).addClass("active_login");
            $(".tab_content_login").hide();
            var activeTab = $(this).find('a').attr('href');
            $(activeTab).show();
            e.preventDefault();
        });


    // kick things off
    function init() {
        var scrollTracker = window.setInterval(checkBodyPos, 100);

        if ($studyCon.length > 0 ) {
            var prodId = getParameterByName('show');

            if (prodId === 'reg') {
                $('.l-registration-outer-con').fadeIn();
            }
        }
        
        // track mindguide icons if on page
        if ($mindguideIcons.length > 0) {
            $mindguideIconsPos = $mindguideIcons.offset().top;
            mindguideIconsTracker = window.setInterval(checkMindguidePos, 100);    
        }

        if ($brandEmbraceIndex.length > 0) {
            brandembraceIndexPos = $brandEmbraceIndexCon.offset().top;
            brandembracePosTrackerTimer = window.setInterval(brandembraceIndexPosTracker, 100);
        }
        
        // check for positioning things
        findAvailableSpace();
    }

    init();

}) (jQuery, window);
