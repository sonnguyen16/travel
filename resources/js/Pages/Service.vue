<template>
  <MainLayout>
    <Head>
      <title>Dịch vụ</title>
      <meta
        name="description"
        content="Dalattourist - Công ty du lịch - dịch vụ - lữ hành lâu đời nhất tại Đà Lạt. Được thành lập từ năm 1976, Dalattourist tiên phong cung cấp những dịch vụ du lịch gắn liền với thiên nhiên, văn hóa và bản sắc Đà Lạt."
      />
      <meta property="og:title" content="Dịch vụ" />
      <meta
        property="og:description"
        content="Dalattourist - Công ty du lịch - dịch vụ - lữ hành lâu đời nhất tại Đà Lạt. Được thành lập từ năm 1976, Dalattourist tiên phong cung cấp những dịch vụ du lịch gắn liền với thiên nhiên, văn hóa và bản sắc Đà Lạt."
      />
      <meta property="og:image" content="/images/logo.png" />
    </Head>
    <div class="container">
      <div v-if="blogs.length > 0" id="service-1" class="md:pt-[150px] pt-[100px]">
        <div class="swiper swiper-1">
          <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div v-for="blog in blogs" class="swiper-slide">
              <div @click.prevent="router.visit(`/dich-vu/${blog.slug}`)" class="rounded-xl shadow-xl bg-white">
                <div
                  class="img-container h-[350px]"
                  style="border-bottom-right-radius: 0; border-bottom-left-radius: 0"
                >
                  <img
                    :src="BLOG_MEDIA_ENDPOINT + blog.image_fe?.picture"
                    alt="home1"
                    class="w-full rounded-tr-xl rounded-tl-xl object-cover"
                  />
                </div>
                <div class="p-3">
                  <h3>
                    {{
                      blog.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                      blog.translations[0].name
                    }}
                  </h3>
                  <div
                    class="line-clamp-6"
                    v-html="
                      blog.translations.find((t) => t.language.code == locale.toUpperCase())?.description ||
                      blog.translations[0].description
                    "
                  ></div>
                </div>
              </div>
            </div>
          </div>
          <!-- Navigation -->
          <div class="swiper-button-next swiper-next-1"></div>
          <div class="swiper-button-prev swiper-prev-1"></div>
        </div>
      </div>
      <div v-else>
        <h5 class="text-center mb-5">{{ $t('no_data') }}</h5>
      </div>

      <div class="row lg:pt-[100px] pt-[50px]">
        <!-- Desktop Section -->
        <div id="service-2" class="col-lg-6 md:pe-4">
          <h4>{{ $t('restaurant_title') }}</h4>
          <!-- Location -->
          <div class="d-flex gap-2 items-center">
            <i class="fas fa-map text-green-600"></i>
            <span>{{ $t('restaurant_location') }}</span>
          </div>
          <p class="mt-3 text-justify font-normal">{{ $t('restaurant_description') }}</p>
          <div class="img-container h-[300px]">
            <img src="@/Assets/images/service5.jpg" alt="home1" class="w-full rounded-xl object-cover h-[300px]" />
          </div>
        </div>

        <!-- Desktop Image Section -->
        <div id="service-3" class="col-lg-6 md:ps-4 md:block hidden">
          <div class="img-container h-[300px] mb-3 mt-4 order-md-1 order-2">
            <img src="@/Assets/images/service4.jpg" alt="home1" class="w-full rounded-xl object-cover" />
          </div>
          <h4>{{ $t('restaurant_title') }}</h4>
          <!-- Location -->
          <div class="d-flex gap-2 items-center order-1 order-md-2">
            <i class="fas fa-map text-green-600"></i>
            <span>{{ $t('restaurant_location') }}</span>
          </div>
          <p class="mt-3 text-justify font-normal">{{ $t('restaurant_description') }}</p>
        </div>

        <!-- Mobile Section -->
        <div id="service-3" class="col-lg-6 md:ps-4 md:hidden block mt-3">
          <h4>{{ $t('restaurant_title') }}</h4>
          <!-- Location -->
          <div class="d-flex gap-2 items-center order-1 order-md-2">
            <i class="fas fa-map text-green-600"></i>
            <span>{{ $t('restaurant_location') }}</span>
          </div>
          <p class="mt-3 text-justify font-normal">{{ $t('restaurant_description') }}</p>
          <div class="img-container h-[300px] mb-3 mt-4 order-md-1 order-2">
            <img src="@/Assets/images/service4.jpg" alt="home1" class="w-full rounded-xl object-cover" />
          </div>
        </div>
      </div>

      <div id="service-4" class="md:pt-[100px] pt-[50px] pb-[50px]">
        <div class="swiper swiper-2">
          <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide">
              <div class="rounded-xl shadow-xl bg-white">
                <div
                  class="img-container h-[400px]"
                  style="border-bottom-right-radius: 0; border-bottom-left-radius: 0"
                >
                  <img
                    src="@/Assets/images/service6.jpg"
                    alt="home1"
                    class="w-full rounded-tr-xl rounded-tl-xl object-cover"
                  />
                </div>
                <div class="p-3">
                  <p class="font-normal text-justify">
                    {{ $t('hotel_description') }}
                  </p>
                </div>
              </div>
            </div>
            <!-- Slide 2 -->
            <div class="swiper-slide">
              <div class="rounded-xl shadow-xl bg-white">
                <div
                  class="img-container h-[400px]"
                  style="border-bottom-right-radius: 0; border-bottom-left-radius: 0"
                >
                  <img
                    src="@/Assets/images/service7.jpg"
                    alt="home1"
                    class="w-full rounded-tr-xl rounded-tl-xl object-cover"
                  />
                </div>
                <div class="p-3">
                  <p class="font-normal text-justify">
                    {{ $t('hotel_description') }}
                  </p>
                </div>
              </div>
            </div>
            <!-- Slide 3 -->
            <div class="swiper-slide">
              <div class="rounded-xl shadow-xl bg-white">
                <div
                  class="img-container h-[400px]"
                  style="border-bottom-right-radius: 0; border-bottom-left-radius: 0"
                >
                  <img
                    src="@/Assets/images/service8.jpg"
                    alt="home1"
                    class="w-full rounded-tr-xl rounded-tl-xl object-cover"
                  />
                </div>
                <div class="p-3">
                  <p class="font-normal text-justify">
                    {{ $t('hotel_description') }}
                  </p>
                </div>
              </div>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide">
              <div class="rounded-xl shadow-xl bg-white">
                <div
                  class="img-container h-[400px]"
                  style="border-bottom-right-radius: 0; border-bottom-left-radius: 0"
                >
                  <img
                    src="@/Assets/images/service7.jpg"
                    alt="home1"
                    class="w-full rounded-tr-xl rounded-tl-xl object-cover"
                  />
                </div>
                <div class="p-3">
                  <p class="font-normal text-justify">
                    Nice Dream hotel tên cũ là khách sạn Hải Sơn, tọa lạc nằm ở số 1 Nguyễn Thị Minh Khai, Phường 1, Đà
                    Lạt, ngay trung tâm của thành phố với tầm nhìn tuyệt đẹp hướng ra Chợ Đà Lạt và hồ Xuân Hương.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- Navigation -->
          <div class="swiper-button-next swiper-next-2"></div>
          <div class="swiper-button-prev swiper-prev-2"></div>
        </div>
      </div>
    </div>
  </MainLayout>
</template>
<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import { router, Head } from '@inertiajs/vue3'
import { onMounted, ref } from 'vue'
import Swiper from 'swiper/bundle'
import 'swiper/css/bundle'
import { useI18n } from 'vue-i18n'
import { BLOG_MEDIA_ENDPOINT } from '@/Constants/endpoint'

const props = defineProps({
  blogs: Object,
  menu: Object
})
const { t, locale } = useI18n()

onMounted(async () => {
  if (typeof window !== 'undefined' && typeof document !== 'undefined') {
    const ScrollReveal = (await import('scrollreveal')).default
    const scrollReveal = ScrollReveal()

    new Swiper('.swiper-1', {
      loop: true,
      fadeEffect: { crossFade: true },
      speed: 1000,
      spaceBetween: 20, // Khoảng cách giữa các item
      navigation: {
        nextEl: '.swiper-next-1',
        prevEl: '.swiper-prev-1'
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
      },
      on: {
        init: function () {
          updateNavigationButtons(this)
        },
        resize: function () {
          updateNavigationButtons(this)
        }
      }
    })

    new Swiper('.swiper-2', {
      loop: true,
      fadeEffect: { crossFade: true },
      speed: 1000,
      spaceBetween: 20,
      fadeEffect: { crossFade: true },
      speed: 1000,
      navigation: {
        nextEl: '.swiper-next-2',
        prevEl: '.swiper-prev-2'
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

    // ScrollReveal - Hiệu ứng nhập từ 2 bên
    scrollReveal.reveal('#service-2', {
      duration: 2000,
      origin: 'top',
      distance: '100px',
      easing: 'ease-in-out'
    })

    scrollReveal.reveal('#service-3', {
      duration: 2000,
      origin: 'bottom',
      distance: '100px',
      easing: 'ease-in-out'
    })

    // ScrollReveal - Hiệu ứng cho Timeline
    scrollReveal.reveal('#service-1', {
      duration: 1200,
      origin: 'top',
      distance: '100px',
      easing: 'ease-in-out'
    })

    // ScrollReveal - Hiệu ứng cho Swiper
    scrollReveal.reveal('#service-4', {
      duration: 2000,
      origin: 'bottom',
      distance: '100px',
      easing: 'ease-in-out'
    })
  }
})

function updateNavigationButtons(swiperInstance) {
  const { slides, params } = swiperInstance
  const slidesPerView = params.slidesPerView
  const totalSlides = slides.length

  // Nếu số lượng slide nhỏ hơn hoặc bằng số slide hiển thị, ẩn nút
  if (totalSlides <= slidesPerView) {
    if (document.getElementsByClassName('swiper-prev-1')) {
      document.getElementsByClassName('swiper-prev-1')[0].style.display = 'none'
      document.getElementsByClassName('swiper-next-1')[0].style.display = 'none'
    }
  } else {
    if (document.getElementsByClassName('swiper-prev-1')) {
      document.getElementsByClassName('swiper-prev-1')[0].style.display = ''
      document.getElementsByClassName('swiper-next-1')[0].style.display = ''
    }
  }
}
</script>
<style scoped>
.overlay {
  background: linear-gradient(
    to top,
    rgba(0, 0, 0, 0.9),
    rgba(0, 0, 0, 0.7),
    rgba(0, 0, 0, 0.5),
    rgba(0, 0, 0, 0.3),
    rgba(255, 255, 255, 0)
  );
}

.swiper-slide {
  height: 600px;
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
