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
          <div
            class="ql-editor mt-5"
            v-if="ve_chung_toi.length > 0"
            v-html="
              ve_chung_toi[0].translations.find((t) => t.language.code == locale.toUpperCase())?.content ||
              ve_chung_toi[0].translations[0].content
            "
          ></div>
          <div v-else>
            <h3 class="mb-0 mt-3 uppercase font-bold text-[32px]">{{ $t('story') }}</h3>
            <h3 class="font-semi-bold uppercase font-bold text-[32px]">{{ $t('brand') }}</h3>
            <p class="text-justify mt-[30px] font-normal">
              {{ $t('about_text') }}
            </p>
          </div>
        </div>
        <div id="about-2" class="col-lg-6">
          <img
            v-if="ve_chung_toi.length > 0"
            :src="BLOG_MEDIA_ENDPOINT + ve_chung_toi[0].image_fe?.picture"
            alt="about"
            class="w-full rounded-xl h-100 object-cover"
          />
          <img v-else src="@/Assets/images/about1.png" alt="about" class="w-full rounded-xl h-100 object-cover" />
        </div>
      </div>

      <div class="row pt-[50px]">
        <div id="about-3" class="col-lg-6 order-md-1 order-2">
          <img
            v-if="ve_chung_toi.length > 0"
            :src="BLOG_MEDIA_ENDPOINT + ve_chung_toi[1].image_fe?.picture"
            alt="about"
            class="w-full rounded-xl h-100 object-contain"
          />
          <img v-else src="@/Assets/images/about2.png" alt="about" class="w-full rounded-xl h-100 object-contain" />
        </div>
        <div id="about-4" class="col-lg-6 order-md-2 order-1">
          <div
            class="ql-editor"
            v-if="ve_chung_toi.length > 0"
            v-html="
              ve_chung_toi[1].translations.find((t) => t.language.code == locale.toUpperCase())?.content ||
              ve_chung_toi[1].translations[0].content
            "
          ></div>
          <div v-else>
            <h3 class="mb-0 mt-3 uppercase font-bold text-[32px]">{{ $t('vision') }}</h3>
            <p class="text-justify mt-[10px] font-normal">
              {{ $t('vision_text') }}
            </p>

            <h3 class="mb-0 mt-3 uppercase font-bold text-[32px]">{{ $t('mission') }}</h3>
            <p class="text-justify mt-[10px] font-normal">
              {{ $t('mission_text') }}
            </p>
          </div>
        </div>
      </div>

      <div id="timeline" class="pt-[50px] pb-[200px]">
        <h1 class="text-center text-[32px] font-bold uppercase">{{ $t('history_title') }}</h1>
        <div class="w-full mt-5">
          <div class="relative">
            <!-- Horizontal Line -->
            <div class="flex items-center">
              <div class="w-full border-t-[3px] border-green-700"></div>
            </div>
            <!-- Timeline Content -->
            <div class="timeline-container absolute md:top-[5px] top-[5px] w-full">
              <!-- Nút mũi tên trái -->
              <button
                v-if="timelines.length > 4"
                @click="scrollTimeline('left')"
                class="timeline-nav-btn timeline-prev absolute left-0 top-0 z-10 bg-green-600 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md hover:bg-green-700 focus:outline-none"
              >
                <i class="fas fa-chevron-left text-[14px]"></i>
              </button>

              <div class="timeline-items" ref="timelineItems">
                <div v-for="(timeline, index) in timelines" :key="index" class="text-center timeline-item">
                  <div class="w-6 h-6 bg-green-700 rounded-full mx-auto"></div>
                  <p class="mt-2 text-green-900 font-bold text-lg">
                    {{
                      timeline.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                      timeline.translations[0].name
                    }}
                  </p>
                  <div
                    class="text-sm text-gray-600"
                    v-html="
                      timeline.translations.find((t) => t.language.code == locale.toUpperCase())?.description ||
                      timeline.translations[0].description
                    "
                  ></div>
                </div>
              </div>

              <!-- Nút mũi tên phải -->
              <button
                v-if="timelines.length > 4"
                @click="scrollTimeline('right')"
                class="timeline-nav-btn timeline-next absolute right-0 top-0 z-10 bg-green-600 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md hover:bg-green-700 focus:outline-none"
              >
                <i class="fas fa-chevron-right text-[14px]"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div v-if="blogs.length > 0" id="slide" class="grid md:grid-cols-4 grid-cols-1 md:gap-4 mb-5">
        <div class="col-span-1 h-100 flex flex-col justify-end">
          <div class="swiper swiper-1 w-full">
            <div class="swiper-wrapper">
              <div v-for="(blog, i) in blogs" class="swiper-slide">
                <span class="count"> 0{{ i + 1 }} </span>
                <div class="slide-content-1 mt-3">
                  <h4>
                    {{
                      blog.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                      blog.translations[0].name
                    }}
                  </h4>
                  <div
                    v-html="
                      blog.translations.find((t) => t.language.code == locale.toUpperCase())?.description ||
                      blog.translations[0].description
                    "
                    class="text-justify about-text"
                  ></div>
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
                <div class="swiper-slide intro-slide active-slide">
                  <img
                    :src="BLOG_MEDIA_ENDPOINT + blogs[0].image_fe?.picture"
                    alt="slide"
                    class="w-full object-cover"
                  />
                </div>

                <!-- Slide 2 -->
                <template v-for="(blog, index) in blogs">
                  <div v-if="index !== 0" class="swiper-slide intro-slide">
                    <img :src="BLOG_MEDIA_ENDPOINT + blog.image_fe?.picture" alt="slide" class="w-full object-cover" />
                  </div>
                </template>
              </div>
            </div>
            <div class="position-absolute left-1/3 top-4 ms-3 md:block hidden">
              <!-- Navigation -->
              <h3 class="font-bold mb-0 text-uppercase">{{ $t('slide_2_title') }}</h3>
              <div class="flex gap-[40px] mb-2 mt-[25px] ms-[-10px]">
                <div class="swiper-button-prev" style="position: relative"></div>
                <div class="swiper-button-next" style="position: relative"></div>
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
import { BLOG_MEDIA_ENDPOINT } from '@/Constants/endpoint'
import { useI18n } from 'vue-i18n'

const { t, locale } = useI18n()
const mounted = ref(false)
const props = defineProps({
  blogs: Object,
  ve_chung_toi: Object,
  timelines: Object
})

const timelineItems = ref(null)

// Hàm scroll timeline
const scrollTimeline = (direction) => {
  if (!timelineItems.value) return

  const container = timelineItems.value
  const scrollAmount = container.clientWidth / 2

  if (direction === 'left') {
    container.scrollBy({ left: -scrollAmount, behavior: 'smooth' })
  } else {
    container.scrollBy({ left: scrollAmount, behavior: 'smooth' })
  }
}

onMounted(async () => {
  mounted.value = true
  if (typeof window !== 'undefined' && typeof document !== 'undefined') {
    const ScrollReveal = (await import('scrollreveal')).default
    const scrollReveal = ScrollReveal()

    // Khởi tạo Swiper nếu có blogs
    if (props.blogs && props.blogs.length > 0) {
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
      if (swiper) {
        swiper.on('slideChange', () => {
          // Xóa lớp active-slide khỏi tất cả các slide
          const slides = document.querySelectorAll('.swiper-slide')
          slides.forEach((slide) => slide.classList.remove('active-slide'))

          // Thêm lớp active-slide vào slide hiện tại
          const activeSlide = swiper.slides[swiper.activeIndex]
          if (activeSlide) {
            activeSlide.classList.add('active-slide')
          }

          if (swiper1) {
            swiper1.slideTo(swiper.realIndex)
          }
        })
      }
    }

    // Tính toán độ rộng cho các cột mốc trong timeline
    if (props.timelines && props.timelines.length > 0) {
      const timelineItems = document.querySelectorAll('.timeline-item')
      const itemCount = timelineItems.length

      // Tính toán độ rộng: nếu có 5 cột mốc trở lên thì mỗi cột 20%, nếu ít hơn thì 100% / số cột
      let itemWidth = Math.max(100 / itemCount, 25)

      // nếu ở mobile chỉ hiện tối đa 2 cột
      if (window.innerWidth < 768) {
        itemWidth = 50
      }

      // Áp dụng độ rộng cho từng cột mốc
      timelineItems.forEach((item) => {
        item.style.flex = `0 0 ${itemWidth}%`
        item.style.minWidth = `${itemWidth}%`
      })

      // Thêm sự kiện resize để cập nhật lại kích thước khi thay đổi màn hình
      window.addEventListener('resize', () => {
        // Tính toán lại độ rộng
        let newItemWidth = Math.max(100 / itemCount, 25)
        if (window.innerWidth < 768) {
          newItemWidth = 50
        }

        // Áp dụng độ rộng mới
        timelineItems.forEach((item) => {
          item.style.flex = `0 0 ${newItemWidth}%`
          item.style.minWidth = `${newItemWidth}%`
        })
      })
    }

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
/* CSS cho timeline */
.timeline-items {
  display: flex;
  overflow-x: auto;
  scroll-behavior: smooth;
  scrollbar-width: none; /* Ẩn thanh cuộn trên Firefox */
  -ms-overflow-style: none; /* Ẩn thanh cuộn trên IE và Edge */
  padding: 0 30px; /* Tạo khoảng trống cho nút điều hướng */
}

.timeline-items::-webkit-scrollbar {
  display: none; /* Ẩn thanh cuộn trên Chrome, Safari và Opera */
}

.timeline-nav-btn {
  transition: opacity 0.3s ease;
}
.swiper-wrapper {
  height: 400px;
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

.swiper-2 .swiper-wrapper .swiper-slide {
  height: 270px !important;
  transition: height 0.5s ease-in-out;
}

.swiper-2 .swiper-wrapper .swiper-slide.swiper-slide-active,
.swiper-2 .swiper-wrapper .swiper-slide.intro-slide.active-slide {
  height: 380px !important;
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

/* Tùy chỉnh nút prev và next */
.swiper-button-prev,
.swiper-button-next {
  width: 35px; /* Kích thước nút */
  height: 35px;
  background-color: green; /* Nền trắng */
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
  color: white; /* Mũi tên màu xanh lá cây */
  font-size: 16px;
  font-weight: bold;
}

/* Hiệu ứng hover */
.swiper-button-prev:hover,
.swiper-button-next:hover {
  background-color: white; /* Đổi nền thành xanh lá cây */
  color: green; /* Đổi màu mũi tên */
}

.swiper-button-prev:hover::after,
.swiper-button-next:hover::after {
  color: green; /* Mũi tên màu trắng khi hover */
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

.timeline-container {
  position: absolute;
  width: 100%;
  overflow: hidden;
  padding-bottom: 1.8rem;
  transform: translateY(-10%);
}

.timeline-items {
  display: flex;
  width: 100%;
  overflow-x: auto;
}

.timeline-item {
  /* Độ rộng sẽ được tính toán bằng JavaScript */
  text-align: center;
  padding: 0 10px;
}

@media (max-width: 768px) {
  .timeline-item {
    flex: 0 0 50%;
    min-width: 50%;
  }
}
</style>
