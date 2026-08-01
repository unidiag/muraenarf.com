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


const upperFirst = (text) => {
    const value = text.trim();

    if (!value) {
        return "";
    }

    return value.charAt(0).toLocaleUpperCase()
        + value.slice(1);
};


const imageModal = document.querySelector("[data-image-modal]");

if (imageModal) {
    const modalImage = imageModal.querySelector(
        "[data-image-modal-image]"
    );

    const modalTitle = imageModal.querySelector(
        "[data-image-modal-title]"
    );

    const closeButtons = imageModal.querySelectorAll(
        "[data-image-modal-close]"
    );

    let previouslyFocusedElement = null;

    const openImageModal = (button) => {
        const imageSrc = button.dataset.imageSrc;
        const imageAlt = button.dataset.imageAlt || "";

        if (!imageSrc || !modalImage) {
            return;
        }

        previouslyFocusedElement = document.activeElement;

        modalImage.src = imageSrc;
        modalImage.alt = imageAlt;

        if (modalTitle) {
            modalTitle.textContent = upperFirst(imageAlt);
        }

        imageModal.classList.add("is-open");
        imageModal.setAttribute("aria-hidden", "false");
        document.body.classList.add("image-modal-open");

        imageModal.querySelector(".image-modal__close")?.focus();
    };

    const closeImageModal = () => {
        imageModal.classList.remove("is-open");
        imageModal.setAttribute("aria-hidden", "true");
        document.body.classList.remove("image-modal-open");

        if (modalImage) {
            modalImage.src = "";
            modalImage.alt = "";
        }

        if (modalTitle) {
            modalTitle.textContent = "";
        }

        previouslyFocusedElement?.focus();
    };

    document.addEventListener("click", (event) => {
        const button = event.target.closest(
            "[data-image-modal-open]"
        );

        if (button) {
            openImageModal(button);
        }
    });

    closeButtons.forEach((button) => {
        button.addEventListener("click", closeImageModal);
    });

    document.addEventListener("keydown", (event) => {
        if (
            event.key === "Escape"
            && imageModal.classList.contains("is-open")
        ) {
            closeImageModal();
        }
    });
}