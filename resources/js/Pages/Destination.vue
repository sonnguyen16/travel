<template>
  <MainLayout>
    <Head>
      <title>Đà Lạt Tourist</title>
      <meta
        name="description"
        content="Dalattourist - Công ty du lịch - dịch vụ - lữ hành lâu đời nhất tại Đà Lạt. Được thành lập từ năm 1976, Dalattourist tiên phong cung cấp những dịch vụ du lịch gắn liền với thiên nhiên, văn hóa và bản sắc Đà Lạt."
      />
      <meta property="og:title" content="Đà Lạt Tourist" />
      <meta
        property="og:description"
        content="Dalattourist - Công ty du lịch - dịch vụ - lữ hành lâu đời nhất tại Đà Lạt. Được thành lập từ năm 1976, Dalattourist tiên phong cung cấp những dịch vụ du lịch gắn liền với thiên nhiên, văn hóa và bản sắc Đà Lạt."
      />
      <meta property="og:image" content="/images/logo.png" />
    </Head>
    <div class="container">
      <h1 class="text-center mb-3 pt-[80px] uppercase font-bold text-[32px]">
        {{ menu.translations.find((t) => t.language.code == locale.toUpperCase())?.name || menu.translations[0].name }}
      </h1>
      <div v-if="blogs.length > 0 && mounted" id="service-4" class="pb-[20px]">
        <div class="swiper swiper-2">
          <div class="swiper-wrapper pb-5">
            <!-- Slide 1 -->
            <div v-for="blog in blogs" class="swiper-slide hover:cursor-pointer">
              <div @click.prevent="router.visit(`/${menu.slug}/${blog.slug}`)" class="rounded-xl shadow-xl bg-white">
                <div
                  class="img-container h-[350px] position-relative"
                  style="border-bottom-right-radius: 0; border-bottom-left-radius: 0"
                >
                  <img
                    :src="BLOG_MEDIA_ENDPOINT + blog.image_fe?.picture"
                    alt="home1"
                    class="w-full rounded-tr-xl rounded-tl-xl object-cover"
                  />
                </div>
                <div class="p-3">
                  <h3 class="line-clamp-1">
                    {{
                      blog.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                      blog.translations[0].name
                    }}
                  </h3>
                  <p
                    class="text-[16px]"
                    v-if="blog.translations.find((t) => t.language.code == locale.toUpperCase())?.address"
                  >
                    <i class="fas fa-map-marker-alt text-green-600 me-2 text-lg"></i>
                    {{
                      blog.translations.find((t) => t.language.code == locale.toUpperCase())?.address ||
                      blog.translations[0].address
                    }}
                  </p>
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
          <div class="swiper-button-next swiper-next-2 custom-nav-button"></div>
          <div class="swiper-button-prev swiper-prev-2 custom-nav-button"></div>
        </div>
      </div>
      <div v-else>
        <h5 class="text-center mb-5">{{ $t('no_data') }}</h5>
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
import { updateNavigationButtons } from '@/Assets/common.js'

const props = defineProps({
  blogs: Object,
  menu: Object
})
const { t, locale } = useI18n()
const mounted = ref(false)

onMounted(async () => {
  mounted.value = true
  if (typeof window !== 'undefined' && typeof document !== 'undefined') {
    const ScrollReveal = (await import('scrollreveal')).default
    const scrollReveal = ScrollReveal()

    new Swiper('.swiper-2', {
      loop: false,
      fadeEffect: { crossFade: true },
      spaceBetween: 20,
      speed: 1000,
      slidesPerView: 'auto',
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
      },
      on: {
        init: function () {
          updateNavigationButtons(this, 2)
        },
        resize: function () {
          updateNavigationButtons(this, 2)
        }
      }
    })

    // ScrollReveal - Hiệu ứng cho Swiper
    scrollReveal.reveal('#service-4', {
      duration: 2000,
      origin: 'bottom',
      distance: '100px',
      easing: 'ease-in-out',
      interval: 5000
    })
  }
})
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

/* CSS cho nút điều hướng ở giữa ảnh */
.custom-nav-button {
  position: absolute;
  top: 175px; /* Giữa chiều cao của ảnh (350px/2) */
  z-index: 10;
  opacity: 0.8;
}

.swiper-next-2 {
  right: 10px;
}

.swiper-prev-2 {
  left: 10px;
}

/* Hiển thị nút khi hover vào slide */
.swiper-2:hover .custom-nav-button {
  opacity: 1;
}
</style>
