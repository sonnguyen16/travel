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
    setTimeout(() => {
        const slides = document.querySelectorAll(`.swiper-${swiperIndex} .swiper-slide`)
        if (window.innerWidth < 768) {
            slides[0].style.width = 'calc(100% - 60px)'
            slides.forEach((slide, index) => {
                if (index < swiperInstance.activeIndex) {
                    slide.style.width = '100%'
                } else if (index === swiperInstance.activeIndex) {
                    slide.style.width = 'calc(100% - 60px)'
                } else {
                    slide.style.width = ''
                }
            })
        }
    }, 200)
}

export const cleanHTML = (html) => {
    // Loại bỏ toàn bộ thẻ HTML
    return html?.replace(/<\/?[^>]+(>|$)/g, '')
}
