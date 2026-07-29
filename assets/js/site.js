$(function () {
    const $header = $('.app-header');
    const $menuButton = $('.mobile-menu-button');
    const $mobileNav = $('.mobile-nav');

    $menuButton.on('click', function () {
        const isOpen = $mobileNav.toggleClass('is-open').hasClass('is-open');
        $menuButton.attr('aria-expanded', String(isOpen));
        $menuButton.find('.material-symbols-rounded').text(isOpen ? 'close' : 'menu');
    });

    $(window).on('scroll', function () {
        $header.toggleClass('is-scrolled', window.scrollY > 12);
    }).trigger('scroll');

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    $('.reveal').each(function () {
        observer.observe(this);
    });
});
