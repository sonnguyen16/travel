export function updateNavigationButtons(swiperInstance, swiperIndex) {
    const { slides, params } = swiperInstance
    const slidesPerView = params.slidesPerView
    const totalSlides = slides.length
    const classSwiperPrev = `swiper-prev-${swiperIndex}`
    const classSwiperNext = `swiper-next-${swiperIndex}`

    // Nếu số lượng slide nhỏ hơn hoặc bằng số slide hiển thị, ẩn nút
    if (totalSlides <= slidesPerView) {
        if (document.getElementsByClassName(classSwiperPrev).length > 0) {
            document.getElementsByClassName(classSwiperPrev)[0].style.display = 'none'
            document.getElementsByClassName(classSwiperNext)[0].style.display = 'none'
        }
    } else {
        if (document.getElementsByClassName(classSwiperPrev).length > 0) {
            document.getElementsByClassName(classSwiperPrev)[0].style.display = ''
            document.getElementsByClassName(classSwiperNext)[0].style.display = ''
        }
    }
}

export function updateSlideWidth(swiperInstance, swiperIndex) {
    // const slides = document.querySelectorAll(`.swiper-${swiperIndex} .swiper-slide`)
    // if (window.innerWidth < 768) {
    //     slides.forEach((slide, index) => {
    //         if (index < swiperInstance.activeIndex) {
    //             // Các slide trước slide hiện tại sẽ full width
    //             slide.style.width = '100%'
    //         } else if (index === swiperInstance.activeIndex) {
    //             // Slide hiện tại có width nhỏ hơn để hiển thị 1 phần slide sau
    //             slide.style.width = '70%'
    //         } else {
    //             // Slide phía sau giữ nguyên width mặc định
    //             slide.style.width = ''
    //         }
    //     })
    // }
}

export const cleanHTML = (html) => {
    // Loại bỏ toàn bộ thẻ HTML
    return html?.replace(/<\/?[^>]+(>|$)/g, '')
}
