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






const videoModal = document.querySelector("[data-video-modal]");
const videoModalOpenButton = document.querySelector(
    "[data-video-modal-open]"
);

if (videoModal && videoModalOpenButton) {
    const videoPlayer = videoModal.querySelector("[data-video-player]");
    const closeButtons = videoModal.querySelectorAll(
        "[data-video-modal-close]"
    );

    let previouslyFocusedElement = null;

    const openVideoModal = () => {
        previouslyFocusedElement = document.activeElement;

        if (videoPlayer && !videoPlayer.querySelector("iframe")) {
            const iframe = document.createElement("iframe");

            iframe.src = videoPlayer.dataset.videoUrl;
            iframe.title = "MuraenaRF project video";
            iframe.allow =
                "accelerometer; autoplay; clipboard-write; " +
                "encrypted-media; gyroscope; picture-in-picture; web-share";
            iframe.allowFullscreen = true;
            iframe.referrerPolicy = "strict-origin-when-cross-origin";

            videoPlayer.appendChild(iframe);
        }

        videoModal.classList.add("is-open");
        videoModal.setAttribute("aria-hidden", "false");
        document.body.classList.add("video-modal-open");

        const closeButton = videoModal.querySelector(
            ".video-modal__close"
        );

        closeButton?.focus();
    };

    const closeVideoModal = () => {
        videoModal.classList.remove("is-open");
        videoModal.setAttribute("aria-hidden", "true");
        document.body.classList.remove("video-modal-open");

        if (videoPlayer) {
            videoPlayer.replaceChildren();
        }

        previouslyFocusedElement?.focus();
    };

    videoModalOpenButton.addEventListener("click", openVideoModal);

    closeButtons.forEach((button) => {
        button.addEventListener("click", closeVideoModal);
    });

    document.addEventListener("keydown", (event) => {
        if (
            event.key === "Escape" &&
            videoModal.classList.contains("is-open")
        ) {
            closeVideoModal();
        }
    });
}