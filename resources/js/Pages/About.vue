<template>
  <MainLayout>
    <div class="container">
      <div class="row pt-[100px]">
        <div id="about-1" class="col-lg-6">
          <h3 class="mb-0 mt-3">Câu chuyện</h3>
          <h3 class="font-semi-bold text-[40px]">Thương hiệu</h3>
          <p class="text-justify mt-[30px] font-normal">
            Công Ty Cổ Phần Du Lịch Lâm Đồng có tiền thân là Công ty Du lịch Lâm Đồng, được thành lập từ năm 1976 với
            chức năng là "Ban Giao tế" của tỉnh Lâm Đồng. Năm 1993, Công ty Dịch vụ Du lịch Đà Lạt trực thuộc UBND thành
            phố Đà Lạt được sáp nhập vào Công ty Du lịch Lâm Đồng, kinh doanh các ngành nghề chủ yếu là: Lữ hành, vận
            chuyển, ăn uống, hướng dẫn du lịch và các dịch vụ khác. Năm 2013, Công ty chính thức cổ phần hóa và lấy tên
            là Công Ty Cổ Phần Du Lịch Lâm Đồng - Dalattourist.
          </p>
        </div>
        <div id="about-2" class="col-lg-6">
          <img src="@/Assets/images/about1.png" alt="about" class="w-full rounded-xl h-100 object-cover" />
        </div>
      </div>

      <div class="row pt-[50px]">
        <div id="about-3" class="col-lg-6 order-md-1 order-2">
          <img src="@/Assets/images/about2.png" alt="about" class="w-full rounded-xl h-100 object-cover" />
        </div>
        <div id="about-4" class="col-lg-6 order-md-2 order-1">
          <h3 class="mb-0 mt-3">Câu chuyện</h3>
          <h3 class="font-semi-bold text-[40px]">Thương hiệu</h3>
          <p class="text-justify mt-[30px] font-normal">
            Công Ty Cổ Phần Du Lịch Lâm Đồng có tiền thân là Công ty Du lịch Lâm Đồng, được thành lập từ năm 1976 với
            chức năng là "Ban Giao tế" của tỉnh Lâm Đồng. Năm 1993, Công ty Dịch vụ Du lịch Đà Lạt trực thuộc UBND thành
            phố Đà Lạt được sáp nhập vào Công ty Du lịch Lâm Đồng, kinh doanh các ngành nghề chủ yếu là: Lữ hành, vận
            chuyển, ăn uống, hướng dẫn du lịch và các dịch vụ khác. Năm 2013, Công ty chính thức cổ phần hóa và lấy tên
            là Công Ty Cổ Phần Du Lịch Lâm Đồng - Dalattourist.
          </p>
        </div>
      </div>

      <div id="timeline" class="pt-[50px] pb-[200px]">
        <h1 class="text-center">Lịch sử hình thành & phát triển</h1>
        <div class="w-full mt-5">
          <div class="relative">
            <!-- Horizontal Line -->
            <div class="absolute inset-0 flex items-center">
              <div class="w-full border-t-2 border-green-700"></div>
            </div>
            <!-- Timeline Content -->
            <div class="grid grid-cols-5 absolute md:translate-y-[-10%] translate-y-[-6%]">
              <!-- Item 1 -->
              <div class="text-center col-span-1">
                <div class="w-6 h-6 bg-green-700 rounded-full mx-auto"></div>
                <p class="mt-2 text-green-900 font-bold">1976</p>
                <p class="text-sm text-gray-600">Thành lập Công Ty</p>
              </div>
              <!-- Item 2 -->
              <div class="text-center col-span-1">
                <div class="w-6 h-6 bg-green-700 rounded-full mx-auto"></div>
                <p class="mt-2 text-green-900 font-bold">2006</p>
                <p class="text-sm text-gray-600">Kỷ Niệm 30 Năm thành lập Công ty</p>
              </div>
              <!-- Item 3 -->
              <div class="text-center col-span-1">
                <div class="w-6 h-6 bg-green-700 rounded-full mx-auto"></div>
                <p class="mt-2 text-green-900 font-bold">2013</p>
                <p class="text-sm text-gray-600">Tái cơ cấu - Cổ phần hóa Công ty</p>
              </div>
              <!-- Item 4 -->
              <div class="text-center col-span-1">
                <div class="w-6 h-6 bg-green-700 rounded-full mx-auto"></div>
                <p class="mt-2 text-green-900 font-bold">2020</p>
                <p class="text-sm text-gray-600">Được công nhận Thương hiệu Quốc Gia Việt Nam</p>
              </div>
              <!-- Item 5 -->
              <div class="text-center col-span-1">
                <div class="w-6 h-6 bg-green-700 rounded-full mx-auto"></div>
                <p class="mt-2 text-green-900 font-bold">2024</p>
                <p class="text-sm text-gray-600">Công nhận Thương Hiệu Quốc Gia lần thứ 3</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="slide" class="grid md:grid-cols-4 grid-cols-1 md:gap-4 mb-5">
        <div class="col-span-1 h-100 flex flex-col justify-end">
          <div class="swiper swiper-1">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="slide-content-1">
                  <h2>{{ content[0].title }}</h2>
                  <p class="text-justify">{{ content[0].paragraph }}</p>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="slide-content-1">
                  <h2>{{ content[0].title }}</h2>
                  <p>{{ content[0].paragraph }}</p>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="slide-content-1">
                  <h2>{{ content[0].title }}</h2>
                  <p>{{ content[0].paragraph }}</p>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="slide-content-1">
                  <h2>{{ content[0].title }}</h2>
                  <p>{{ content[0].paragraph }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-span-3">
          <div class="position-relative">
            <div class="swiper swiper-2">
              <div class="swiper-wrapper flex items-end">
                <!-- Slide 1 -->
                <div class="swiper-slide intro-slide">
                  <img src="@/Assets/images/about3.jpg" alt="slide 1" class="w-full object-cover" />
                  <div class="slide-content">
                    <h2>Giới Thiệu</h2>
                    <p>Top 10 chủ đầu tư hàng đầu Việt Nam 2021</p>
                  </div>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide intro-slide">
                  <img src="@/Assets/images/about4.jpg" alt="slide 2" class="w-full object-cover" />
                  <div class="slide-content">
                    <h2>Giải Thưởng</h2>
                    <p>Doanh nghiệp xuất sắc châu Á 2022</p>
                  </div>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide intro-slide">
                  <img src="@/Assets/images/about5.jpg" alt="slide 3" class="w-full object-cover" />
                  <div class="slide-content">
                    <h2>Vinh Danh</h2>
                    <p>Tập đoàn du lịch hàng đầu châu Á</p>
                  </div>
                </div>

                <!-- Slide 4 -->
                <div class="swiper-slide intro-slide">
                  <img src="@/Assets/images/about4.jpg" alt="slide 4" class="w-full object-cover" />
                  <div class="slide-content">
                    <h2>Giải Thưởng</h2>
                    <p>Doanh nghiệp xuất sắc châu Á 2022</p>
                  </div>
                </div>
              </div>

              <!-- Navigation -->
              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>
            </div>
            <div class="position-absolute left-1/3 top-0 ms-3 md:block hidden">
              <h3>Giới thiệu</h3>
              <h2 class="font-bold">Giải thưởng</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </MainLayout>
</template>
<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import { onMounted, ref } from 'vue'
import Swiper from 'swiper/bundle'
import 'swiper/css/bundle'
import ScrollReveal from 'scrollreveal'

const content = [
  {
    title: 'Đạt Thương hiệu Quốc Gia 2024',
    paragraph: `DALATTOURIST TỰ HÀO LÀ THƯƠNG HIỆU QUỐC GIA VIỆT NAM 3 KỲ LIÊN TIẾP 2020 - 2024 Ngày 04/11/2024, Bà Trần
            Thanh Hương - Phó Chủ tịch Hội đồng quản trị đại diện Công ty Cổ phần Du lịch Lâm Đồng (Dalattourist), vinh
            danh tại Lễ Công bố sản phẩm đạt Thương hiệu Quốc gia Việt Nam năm 2024.Chương trình diễn ra tại Trung tâm
            Hội nghị Quốc gia (Hà Nội). `
  }
]

const currentIndex = ref(1)

onMounted(() => {
  const swiper = new Swiper('.swiper-2', {
    loop: true,
    fadeEffect: { crossFade: true },
    speed: 1000,
    spaceBetween: 20,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
    breakpoints: {
      1024: {
        slidesPerView: 3
      },
      768: {
        slidesPerView: 2
      },
      480: {
        slidesPerView: 1
      }
    }
  })

  // Gắn sự kiện slideChange
  swiper.on('slideChange', () => {
    // Xóa lớp active-slide khỏi tất cả các slide
    const slides = document.querySelectorAll('.swiper-slide')
    slides.forEach((slide) => slide.classList.remove('active-slide'))

    // Thêm lớp active-slide vào slide hiện tại
    const activeSlide = swiper.slides[swiper.activeIndex]
    activeSlide.classList.add('active-slide')
  })

  document.querySelector('.swiper-button-prev').addEventListener('click', () => {
    swiper1.slidePrev()
  })

  document.querySelector('.swiper-button-next').addEventListener('click', () => {
    swiper1.slideNext()
  })

  const swiper1 = new Swiper('.swiper-1', {
    loop: true,
    speed: 1000,
    spaceBetween: 20,
    slidesPerView: 1
  })

  // ScrollReveal - Hiệu ứng nhập từ 2 bên
  ScrollReveal().reveal('#about-1', {
    duration: 2000,
    origin: 'bottom',
    distance: '100px',
    easing: 'ease-in-out'
  })

  ScrollReveal().reveal('#about-2', {
    duration: 2000,
    origin: 'top',
    distance: '100px',
    easing: 'ease-in-out'
  })

  ScrollReveal().reveal('#about-3', {
    duration: 2000,
    origin: 'top',
    distance: '100px',
    easing: 'ease-in-out',
    interval: 1000
  })

  ScrollReveal().reveal('#about-4', {
    duration: 2000,
    origin: 'bottom',
    distance: '100px',
    easing: 'ease-in-out',
    interval: 1000
  })

  // ScrollReveal - Hiệu ứng cho Timeline
  ScrollReveal().reveal('#timeline', {
    duration: 2000,
    origin: 'bottom',
    distance: '50px',
    easing: 'ease-in-out',
    interval: 3000
  })

  // ScrollReveal - Hiệu ứng cho Swiper
  ScrollReveal().reveal('#slide', {
    duration: 2000,
    origin: 'bottom',
    distance: '50px',
    easing: 'ease-in-out',
    interval: 4000
  })
})
</script>
<style scoped>
.swiper-wrapper {
  height: 600px;
}

.swiper-1 {
  width: 100%;
  height: 250px; /* Điều chỉnh theo thiết kế */
}
.swiper-1 .swiper-wrapper {
  height: 100%; /* Đảm bảo các slide được hiển thị */
}

.swiper-1 .swiper-wrapper p {
  font-size: 14px;
  color: #004750;
  margin-bottom: 0;
}

.slide-content {
  position: absolute;
  bottom: 10px;
  left: 10px;
  right: 10px;
  background: rgba(0, 0, 0, 0.5);
  color: #fff;
  padding: 10px;
  border-radius: 8px;
}

.swiper-slide p {
  font-size: 14px;
  color: #fff;
}

.swiper-2 > .swiper-wrapper > .swiper-slide:nth-child(1) {
  height: 600px;
}

.swiper-2 > .swiper-wrapper > .swiper-slide {
  position: relative;
  overflow: hidden;
  height: 400px;
  transition: height 0.5s ease-in-out;
}

.swiper-slide img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease-in-out;
  border-radius: 10px;
}

.swiper-slide.intro-slide.active-slide {
  height: 600px;
  transition: height 0.5s ease-in-out;
  object-fit: cover;
}

@media (max-width: 768px) {
  .swiper-slide {
    opacity: 0;
    transform: translateY(50px);
    transition: all 1s ease-in-out;
  }

  .swiper-slide-active {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Tùy chỉnh nút prev và next */
.swiper-button-prev,
.swiper-button-next {
  width: 40px; /* Kích thước nút */
  height: 40px;
  background-color: white; /* Nền trắng */
  border: 2px solid green; /* Viền xanh lá cây */
  border-radius: 50%; /* Hình tròn */
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Tạo bóng nhẹ */
  transition: all 0.3s ease; /* Hiệu ứng khi hover */
}

/* Biểu tượng mũi tên */
.swiper-button-prev::after,
.swiper-button-next::after {
  color: green; /* Mũi tên màu xanh lá cây */
  font-size: 16px;
  font-weight: bold;
}

/* Hiệu ứng hover */
.swiper-button-prev:hover,
.swiper-button-next:hover {
  background-color: green; /* Đổi nền thành xanh lá cây */
  color: white; /* Đổi màu mũi tên */
}

.swiper-button-prev:hover::after,
.swiper-button-next:hover::after {
  color: white; /* Mũi tên màu trắng khi hover */
}
</style>
