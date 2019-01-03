vex.defaultOptions.className = 'vex-theme-default';

$(document).ready(function () {
    var sidebarEle = $('#sidebar_nav');
    sidebarEle.scrollToFixed({
        marginTop: 50,
        limit: $('.site-footer').offset().top - sidebarEle.outerHeight() - 15,
        zIndex: 999,
    });
});

$(function () {
    $('.back-top').click(function () {
        $('body').scrollTo(0, 80);
        return false;
    });
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-top').fadeIn();
        } else {
            $('.back-top').fadeOut();
        }
    });

    $('#site_main_nav').scrollToFixed({
        marginTop: 0,
        preFixed: function() { $(this).removeClass('mt-3'); },
        postFixed: function() { $(this).addClass('mt-3'); }
    });
});

$(function(){
    let summ = $('#id_novel_summary');
    let summ_height = summ.height();
    if (summ_height > 400) {
        summ.css('height', '400px').css('overflow-y', 'scroll');
    }
});

$(function () {
    let btn_like = $('#id_btn_love');
    let btn_bookmark = $('#id_btn_bookmark');
    let btn_donate = $('#id_btn_donate');

    btn_like.click(function () {
        vex.dialog.confirm({
            message: 'Đăng nhập/Đăng ký để thích chương này. Chỉ mất 30s cuộc đời :)',
            callback: function (value) {
                if (value) {
                    window.open("/login/", "TruyenYY", "menubar=no,location=yes,resizable=yes,scrollbars=yes,status=yes,width=800,height=600");
                }
            }
        });
        return false;
    });

    btn_donate.click(function () {
        vex.dialog.confirm({
            message: 'Đăng nhập/Đăng ký để thích chương này. Chỉ mất 30s cuộc đời :)',
            callback: function (value) {
                if (value) {
                    window.open("/login/", "TruyenYY", "menubar=no,location=yes,resizable=yes,scrollbars=yes,status=yes,width=800,height=600");
                }
            }
        });
        return false;
    });

    btn_bookmark.click(function () {
        vex.dialog.confirm({
            message: 'Đăng nhập/Đăng ký để đánh dấu chương này. Chỉ mất 30s cuộc đời :)',
            callback: function (value) {
                if (value) {
                    window.open("/login/", "TruyenYY", "menubar=no,location=yes,resizable=yes,scrollbars=yes,status=yes,width=800,height=600");
                }
            }
        });
        return false;
    });

    $('#id_btn_top').click(function () {
        $(window).scrollTo(0, 80);
        return false;
    });

    $('#id_btn_bottom').click(function () {
        $(window).scrollTo('max', 80);
        return false;
    });
});

$(function () {
    let next_chap = $('#next-chap').val();
    let pre_chap = $('#pre-chap').val();
    let enable_key_map = true;
    let btn_pre_chap = $('#btn-pre-chap');
    let btn_next_chap = $('#btn-next-chap');
    $(document).keypress(function (e) {
        if (enable_key_map) {
            let code = e.charCode || e.keyCode;

            if (code === 97) { // left
                if (!btn_pre_chap.hasClass('disabled')) {
                    window.location.href = 'http://127.0.0.1:8000/stories/show-chap/' + pre_chap;
                }
            } else if (code === 100) { // right
                if (!btn_next_chap.hasClass('disabled')) {
                    window.location.href = 'http://127.0.0.1:8000/stories/show-chap/' + next_chap;
                }
            } else if (code === 119) { // top
                $(window).scrollTo(0, 80);
            } else if (code === 115) { // bottom
                $(window).scrollTo('max', 80);
            }
        }
    });
});
