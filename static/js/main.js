$(function () {

    $('.call').click(function(){
        var el = $(this).attr('href');
        $('body').animate({
            scrollTop: $(el).offset().top}, 1000);
        return false;
    });

    $('.slider1 ul').carouFredSel({
        items: 1,
        circular: true,
        responsive: false,
        pagination: '.pagination',
        swipe: {
            onMouse: true,
            onTouch: true
        },
        scroll: {
            items: 1,
            fx: 'crossfade'
        },
        auto: {
            play: true,
            timeoutDuration: 8000
        }
    });

    $('.slider2 ul').carouFredSel({
        items: 1,
        circular: true,
        responsive: true,
        pagination: '.pagination',
        swipe: {
            onMouse: true,
            onTouch: true
        },
        scroll: {
            items: 1,
            fx: 'crossfade'
        },
        auto: {
            play: true,
            timeoutDuration: 8000
        }
    });

    $('.right-part .courses .block .inner').carouFredSel({
        items: 1,
        circular: true,
        responsive: true,
        pagination: '.paginator2',
        swipe: {
            onMouse: true,
            onTouch: true
        },
        scroll: {
            items: 1,
            fx: 'crossfade'
        },
        auto: {
            play: true,
            timeoutDuration: 80000
        }
    });
    $('.right-part .events .inner').carouFredSel({
        items: 1,
        circular: true,
        responsive: true,
        pagination: '.paginator5',
        swipe: {
            onMouse: true,
            onTouch: true
        },
        scroll: {
            items: 1,
            fx: 'crossfade'
        },
        auto: {
            play: true,
            timeoutDuration: 80000
        }
    });

    $('.banners .block .inner').carouFredSel({
        items: 1,
        circular: true,
        responsive: true,
        pagination: '.paginator3',
        swipe: {
            onMouse: true,
            onTouch: true
        },
        scroll: {
            items: 1,
            fx: 'crossfade'
        },
        auto: {
            play: true,
            timeoutDuration: 8000
        }
    });

    $('.event-slider ul').carouFredSel({
        items: 2,
        circular: true,
        responsive: true,
        pagination: '.paginator3',
        swipe: {
            onMouse: true,
            onTouch: true
        },
        scroll: {
            items: 1
        },
        auto: {
            play: true,
            timeoutDuration: 8000
        }
    });

    if(isMobile.any){

    $(window).resize(function () {
        if ($('.partners ul').size()) {
            $('.partners ul').trigger('configuration', [
                'items', {
                    visible: parseInt($('#slider-counter').css('top').split('px')[0])
                }
            ], true);
        }
    });

    var $carousel = $('.partners ul');

    $carousel.carouFredSel({
        items: 8,
        circular: true,
        responsive: true,
        next: '.next',
        prev: '.prev',
        swipe: {
            onMouse: true,
            onTouch: true
        },
        scroll: {
            items: 1
        },
        auto: {
            play: true,
            timeoutDuration: 8000
        },

        onCreate: onCreate
    });

    function onCreate() {
        $(window).on('resize', onResize).trigger('resize');
    }

    function onResize() {
        var heights = $carousel.children().map(function () {
            return $(this).height();
        });
        $carousel.parent().add($carousel).height(Math.max.apply(null, heights));
    }

    }

    var $carousel2 = $('.comand .inner');

    $carousel2.carouFredSel({
        items: 4,
        circular: true,
        responsive: true,
        swipe: {
            onMouse: true,
            onTouch: true
        },
        scroll: {
            items: 1
        },
        auto: {
            play: true,
            timeoutDuration: 5000
        },

        onCreate: onCreate2
    });

    function onCreate2() {
        $(window).on('resize', onResize2).trigger('resize');
    }

    function onResize2() {
        var heights = $carousel2.children().map(function () {
            return $(this).height();
        });
        $carousel2.parent().add($carousel2).height(Math.max.apply(null, heights));
    }

    $('.paginator1 a').click(function(e){
        e.preventDefault();
       if(!$(this).is('.active')) {
           $('.paginator1 a').removeClass('active');
           $(this).addClass('active');
           $('.area').hide(0);
           $($(this).attr('href')).show(0);
       }
    });

    //$('.see-more').click(function(e){
    //    e.preventDefault();
    //    $('#preloader').css('display', 'block');
    //    setTimeout(function(){
    //        $('#preloader').css('display', 'none');
    //        $('.hide-area').show(0);
    //    }, 2000);
    //});


    $('.rss-form .plashka').click(function(){
       $(this).parent().css('right', 0);
    });


    $('.rss-form img').click(function(){
        $(this).parent().css('right', '-292px');
    });





    $('input[name=phone]').mask('+7(999)999-99-99');



    $('.fancy').fancybox({
        margin: 40,
        padding: 0,
        fitToView: true,
        scrolling: 'visible',
        helpers: {
            overlay: {
                locked: false
            }
        }
    });

    $(window).scrollspy({
        min: 20,
        max: 999999,
        onEnter: function (element, position) {
           $('.top-menu').addClass('fix');
        },
        onLeave: function (element, position){
            $('.top-menu').removeClass('fix');
        }
    });

    $(window).resize(function () {
        if ($('.partners ul').size()) {
            $('.partners ul').trigger('configuration', [
                'items', {
                    visible: parseInt($('#slider-counter').css('top').split('px')[0])
                }
            ], true);
        }
    });

    $('.burger').click(function () {
       $('.hide-menu').slideDown(300);
    });

    $('.menu-close').click(function () {
        $('.hide-menu').slideUp(300);
    });

	$(function () {
        $("#photos").justifiedGallery({
            rowHeight: 300,
            maxRowHeight: '200%',
            lastRow: 'hide',
            selector: '> a:not(.btn)'
        });
    });

});

$(function () {
    if ($('.left-part').length) {
        $(window).scrollspy({
            min: $('.left-part').offset().top - 70,
            max: ($('.left-part').offset().top + $('.left-part').height()) - $('.description .g-bg').innerHeight() -110,
            onEnter: function (element, position) {
                $('.description .g-bg').addClass('fix');
                $('.description .g-bg').removeClass('abs');
                if (position.top > ($('.left-part').offset().top + $('.left-part').height()) - $('.description .g-bg').innerHeight() -140) {
                    $('.description .g-bg').addClass('abs');
                }
            },
            onLeave: function (element, position) {
                $('.description .g-bg').removeClass('fix');
                if (position.top > ($('.left-part').offset().top + $('.left-part').height()) - $('.description .g-bg').innerHeight() -140) {
                    $('.description .g-bg').addClass('abs');
                }
            }
        });
    }
    
});




