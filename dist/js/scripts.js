var swiper = new Swiper('#process-slider', {
    pagination: {
        el: '.swiper-pagination',
        dynamicBullets: false,
        clickable: true,
        renderBullet: function (index, className) {
            return '<div class="' + className + '">' + (index + 1) + '</div>';
        }
    },
    keyboard: {
        enabled: true,
    },
    autoplay: {
        delay: 15000,
        disableOnInteraction: false,
    },
    loop: true,
    speed: 1000,
    slidesPerView: 1,
    spaceBetween: 30,
});