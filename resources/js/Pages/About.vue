<template>
  <MainLayout>
    <Head>
      <title>Về chúng tôi - Đà Lạt Tourist</title>
      <meta
        name="description"
        content="Dalattourist - Công ty du lịch - dịch vụ - lữ hành lâu đời nhất tại Đà Lạt. Được thành lập từ năm 1976, Dalattourist tiên phong cung cấp những dịch vụ du lịch gắn liền với thiên nhiên, văn hóa và bản sắc Đà Lạt."
      />
      <meta property="og:title" content="Về chúng tôi - Đà Lạt Tourist" />
      <meta
        property="og:description"
        content="Dalattourist - Công ty du lịch - dịch vụ - lữ hành lâu đời nhất tại Đà Lạt. Được thành lập từ năm 1976, Dalattourist tiên phong cung cấp những dịch vụ du lịch gắn liền với thiên nhiên, văn hóa và bản sắc Đà Lạt."
      />
      <meta property="og:image" content="/images/logo.png" />
    </Head>
    <div class="container">
      <div class="row pt-[100px]">
        <div id="about-1" class="col-lg-6">
          <h3 class="mb-0 mt-3">{{ $t('story') }}</h3>
          <h3 class="font-semi-bold text-[40px]">{{ $t('brand') }}</h3>
          <p class="text-justify mt-[30px] font-normal">
            {{ $t('about_text') }}
          </p>
        </div>
        <div id="about-2" class="col-lg-6">
          <img src="@/Assets/images/about1.png" alt="about" class="w-full rounded-xl h-100 object-cover" />
        </div>
      </div>

      <div class="row pt-[50px]">
        <div id="about-3" class="col-lg-6 order-md-1 order-2">
          <img src="@/Assets/images/about2.png" alt="about" class="w-full rounded-xl h-100 object-contain" />
        </div>
        <div id="about-4" class="col-lg-6 order-md-2 order-1">
          <h3 class="mb-0 mt-3">{{ $t('vision') }}</h3>
          <p class="text-justify mt-[10px] font-normal">
            {{ $t('vision_text') }}
          </p>

          <h3 class="mb-0 mt-3">{{ $t('mission') }}</h3>
          <p class="text-justify mt-[10px] font-normal">
            {{ $t('mission_text') }}
          </p>
        </div>
      </div>

      <div id="timeline" class="pt-[50px] pb-[200px]">
        <h1 class="text-center">{{ $t('history_title') }}</h1>
        <div class="w-full mt-5">
          <div class="relative">
            <!-- Horizontal Line -->
            <div class="absolute inset-0 flex items-center">
              <div class="w-full border-t-2 border-green-700"></div>
            </div>
            <!-- Timeline Content -->
            <div class="grid grid-cols-5 gap-4 absolute md:translate-y-[-10%] translate-y-[-6%]">
              <!-- Item 1 -->
              <div class="text-center col-span-1">
                <div class="w-6 h-6 bg-green-700 rounded-full mx-auto"></div>
                <p class="mt-2 text-green-900 font-bold">1976</p>
                <p class="text-sm text-gray-600">{{ $t('timeline_1976') }}</p>
              </div>
              <!-- Item 2 -->
              <div class="text-center col-span-1">
                <div class="w-6 h-6 bg-green-700 rounded-full mx-auto"></div>
                <p class="mt-2 text-green-900 font-bold">2006</p>
                <p class="text-sm text-gray-600">{{ $t('timeline_2006') }}</p>
              </div>
              <!-- Item 3 -->
              <div class="text-center col-span-1">
                <div class="w-6 h-6 bg-green-700 rounded-full mx-auto"></div>
                <p class="mt-2 text-green-900 font-bold">2013</p>
                <p class="text-sm text-gray-600">{{ $t('timeline_2013') }}</p>
              </div>
              <!-- Item 4 -->
              <div class="text-center col-span-1">
                <div class="w-6 h-6 bg-green-700 rounded-full mx-auto"></div>
                <p class="mt-2 text-green-900 font-bold">2020</p>
                <p class="text-sm text-gray-600">{{ $t('timeline_2020') }}</p>
              </div>
              <!-- Item 5 -->
              <div class="text-center col-span-1">
                <div class="w-6 h-6 bg-green-700 rounded-full mx-auto"></div>
                <p class="mt-2 text-green-900 font-bold">2024</p>
                <p class="text-sm text-gray-600">{{ $t('timeline_2024') }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="slide" class="grid md:grid-cols-4 grid-cols-1 md:gap-4 mb-5">
        <div class="col-span-1 h-100 flex flex-col justify-end">
          <div v-if="mounted" class="swiper swiper-1 w-full">
            <div class="swiper-wrapper">
              <div v-for="(_, i) in 4" class="swiper-slide">
                <span class="count"> 0{{ i + 1 }} </span>
                <div class="slide-content-1 mt-3">
                  <h2>{{ $t(`achievements[${i}].title`) }}</h2>
                  <p class="text-justify">
                    {{ $t(`achievements[${i}].event_details`) }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-span-3">
          <div class="position-relative">
            <div v-if="mounted" class="swiper swiper-2">
              <div class="swiper-wrapper flex items-end">
                <!-- Slide 1 -->
                <div class="swiper-slide intro-slide" :class="[moved == false ? 'h-[500px]' : '']">
                  <img
                    src="@/Assets/images/about3.jpg"
                    alt="slide 1"
                    :class="[moved == false ? 'h-[500px]' : '']"
                    class="w-full object-cover"
                  />
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide intro-slide">
                  <img src="@/Assets/images/about4.jpg" alt="slide 2" class="w-full object-cover" />
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide intro-slide">
                  <img src="@/Assets/images/about5.jpg" alt="slide 3" class="w-full object-cover" />
                </div>

                <!-- Slide 4 -->
                <div class="swiper-slide intro-slide">
                  <img src="@/Assets/images/about4.jpg" alt="slide 4" class="w-full object-cover" />
                </div>
              </div>
            </div>
            <div class="position-absolute left-1/3 top-0 ms-3 md:block hidden">
              <h3>{{ $t('slide_1_title') }}</h3>
              <h2 class="font-bold">{{ $t('slide_2_title') }}</h2>
              <!-- Navigation -->
              <div class="mt-[150px]">
                <div class="swiper-button-prev" style="left: auto"></div>
                <div class="swiper-button-next" style="margin-right: 80px"></div>
              </div>
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
import { Head } from '@inertiajs/vue3'

const mounted = ref(false)
const moved = ref(false)

onMounted(async () => {
  mounted.value = true
  if (typeof window !== 'undefined' && typeof document !== 'undefined') {
    const ScrollReveal = (await import('scrollreveal')).default
    const scrollReveal = ScrollReveal()

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

    const swiper1 = new Swiper('.swiper-1', {
      allowTouchMove: false,
      loop: true,
      speed: 1000,
      spaceBetween: 20,
      slidesPerView: 1
    })

    // Gắn sự kiện slideChange
    swiper.on('slideChange', () => {
      moved.value = true
      // Xóa lớp active-slide khỏi tất cả các slide
      const slides = document.querySelectorAll('.swiper-slide')
      slides.forEach((slide) => slide.classList.remove('active-slide'))

      // Thêm lớp active-slide vào slide hiện tại
      const activeSlide = swiper.slides[swiper.activeIndex]
      activeSlide.classList.add('active-slide')

      swiper1.slideTo(swiper.realIndex)
      console.log(swiper.realIndex)
    })

    // ScrollReveal - Hiệu ứng nhập từ 2 bên
    scrollReveal.reveal('#about-1', {
      duration: 2000,
      origin: 'bottom',
      distance: '100px',
      easing: 'ease-in-out'
    })

    scrollReveal.reveal('#about-2', {
      duration: 2000,
      origin: 'top',
      distance: '100px',
      easing: 'ease-in-out'
    })

    scrollReveal.reveal('#about-3', {
      duration: 2000,
      origin: 'top',
      distance: '100px',
      easing: 'ease-in-out'
    })

    scrollReveal.reveal('#about-4', {
      duration: 2000,
      origin: 'bottom',
      distance: '100px',
      easing: 'ease-in-out'
    })

    // ScrollReveal - Hiệu ứng cho Timeline
    scrollReveal.reveal('#timeline', {
      duration: 2000,
      origin: 'bottom',
      distance: '50px',
      easing: 'ease-in-out'
    })

    // ScrollReveal - Hiệu ứng cho Swiper
    scrollReveal.reveal('#slide', {
      duration: 2000,
      origin: 'bottom',
      distance: '50px',
      easing: 'ease-in-out'
    })
  }
})
</script>
<style scoped>
.swiper-wrapper {
  height: 500px;
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
  height: 500px;
}

.swiper-2 > .swiper-wrapper > .swiper-slide:not(.swiper-slide-active) {
  position: relative;
  overflow: hidden;
  height: 300px;
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
  height: 500px;
  transition: height 0.5s ease-in-out;
  object-fit: cover;
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

.text-outline {
  font-size: 5rem; /* Kích thước chữ */
  color: white; /* Màu chữ bên trong */
  -webkit-text-stroke: 2px black; /* Viền chữ */
  font-weight: bold; /* Làm chữ đậm */
  text-decoration: underline; /* Gạch dưới */
  text-decoration-color: brown; /* Màu viền dưới */
  text-decoration-thickness: 4px; /* Độ dày của viền dưới */
  text-underline-offset: 5px; /* Khoảng cách giữa chữ và viền */
}

.count {
  -webkit-text-fill-color: transparent;
  -webkit-text-stroke-width: 0.5px;
  -webkit-text-stroke-color: #003b05;
  font-size: 120px;
  line-height: 140px;
  border-bottom: 4px solid #003b05;
  margin-left: 120px;
}

@media (max-width: 768px) {
  .count {
    margin-left: 200px;
  }

  .swiper-slide {
    width: 100% !important;
  }
}
</style>
