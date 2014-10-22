(function ($, window) {
    'use strict';

    var $header             = $('.l-header-con'),
        $footer             = $('.l-short-footer-con'),
        photoHeight         = 540,
        photoWidth          = 960,
        photoRatio          = photoWidth / photoHeight,
        scrollToLinks       = $('.scroll-to-panel'),
        $window             = $(window),
        $el                 = $('video'),
        $videoCon           = $('.video-container'),
        $homepageHeading    = $('.home-title'),
        $teamMember         = $('.team-member'),
        $blogImageBtns      = $('.l-blog-landing-entry').find('img'),
        $blogTitleBtns      = $('.blog-landing-title'),
        $blogCloseBtns      = $('.news-close-btn'),
        $blogSingleCloseBtn = $('.single-news-close-btn'),
        $loadStudyBtn       = $('.js-load-study'),
        $studyCon           = $('.l-study-con'),
        isLogoBig           = true,
        $backToTopBtn       = $('.back-to-top'),
        currentPos,
        availableHeight,
        aspectRatio,
        sideCrop,
        imageWidth,
        winH,
        winW;



    function findAvailableSpace() {
        var headerH = $header.outerHeight(),
            footerH = $footer.outerHeight();

        winH = $window.height();
        winW = $window.width();

        availableHeight = winH;
        aspectRatio = winW / availableHeight;

        $videoCon.css({
            width: winW + 'px',
            height: availableHeight + 'px',
            overflow: 'hidden'
        });

        scaleLayout();
    }

    function scaleLayout() {
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
            console.log('not big aspectRatio');
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
                        console.log('ajax call started');
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

    $teamMember.on('mouseenter', function () {
        var $this = $(this),
            $img = $this.find('.team-member-image'),
            earl = $img.attr('src'),
            newEarl = $img.data('team-member-image');

        $img.attr('src', newEarl);
        $img.data('team-member-image', earl);
        $this.toggleClass('show-rolls');
    });

    $teamMember.on('mouseleave', function () {
        var $this = $(this),
            $img = $this.find('.team-member-image'),
            earl = $img.attr('src'),
            newEarl = $img.data('team-member-image');

        $img.attr('src', newEarl);
        $img.data('team-member-image', earl);
        $this.toggleClass('show-rolls');
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
    }


    // kick things off
    function init() {
        var scrollTracker = window.setInterval(checkBodyPos, 100);

        // check for positioning things
        findAvailableSpace();
    }

    init();

}) (jQuery, window);
