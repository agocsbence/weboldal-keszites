var swiper = new Swiper('#process-slider', {
    pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
    },
    keyboard: {
        enabled: true,
    },
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    loop: true,
    slidesPerView: 1,
    spaceBetween: 30,
});