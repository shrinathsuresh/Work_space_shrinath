const swiper = new Swiper('.swiper', {
    loop: true,
    grabCursor: true,
    spaceBetween: 20,
    slidesPerView: 1, // Adjust slides visible based on screen size
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      dynamicBullets:true
    },
    loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      640: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });