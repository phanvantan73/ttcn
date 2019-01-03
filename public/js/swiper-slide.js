if ($('.swiper-container .swiper-slide').length) {
    var swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        grabCursor: false,
        centeredSlides: true,
        slidesPerView: 'auto',
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        }
    });

    $('.swiper-container').on('click', '.swiper-slide', function (e) {
        e.stopPropagation();
        var index = $(this).index();
        if (swiper.activeIndex === index + 1) {
            e.preventDefault();
            swiper.slidePrev();
        }
        else if (swiper.activeIndex === index - 1) {
            e.preventDefault();
            swiper.slideNext();
        }
    });

    swiper.on('slideChange', function () {
        var ele = $(swiper.slides[swiper.activeIndex]);
        var t = ele.data("title");
        var a = ele.data("author");
        var u = ele.data("url");
        var d = ele.data("desc");
        $('.mini-swiper .book-title > a').text(t).attr('href', u);
        $('.mini-swiper .book-author').text(a);
        $('.mini-swiper .book-desc').text(d);
        $('.mini-swiper .btn-primary').attr('href', u);
    });
}
