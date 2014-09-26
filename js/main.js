(function ($, window) {
    'use strict';

    var $header      = $('.l-header-con'),
        $footer      = $('.l-short-footer-con'),
        photoHeight   = 540,
        photoWidth   = 960,
        photoRatio   = photoWidth / photoHeight,
        $window      = $(window),
        $el          = $('video'),
        $videoCon    = $('.video-container'),
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

        availableHeight = winH - headerH - footerH + 5;
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
            console.log(curHeight);
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

    $window.resize(findAvailableSpace);

    findAvailableSpace();



}) (jQuery, window);
