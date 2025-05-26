const swiper = new Swiper('.swiper', {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 20,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
});

const rentbtn = document.querySelectorAll('.rent-btn');
rentbtn.forEach(function(btn) {
    btn.addEventListener("click", function() {
        window.location.href = "/rental"
    });
});
