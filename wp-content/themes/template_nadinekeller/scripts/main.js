(function ($) {
    var nav = document.querySelector('.bodynav');
    var topOfNav = nav.offsetTop;

    function fixNav() {
        if (window.scrollY >= topOfNav) {
            document.body.classList.add('fixed-nav');
        } else {
            document.body.classList.remove('fixed-nav');
        }
    }

    fixNav();

    $('a[href*="#"]')
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function (event) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

            if (target.length) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 55
                }, 1000);
            }
        });

    window.addEventListener('scroll', fixNav);

    $(window).resize(function () {
        fixNav();
    });
}(jQuery));