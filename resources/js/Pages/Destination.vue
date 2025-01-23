<template>
  <MainLayout>
    <div class="container">
      <h1 class="text-center mb-3 pt-[100px]">
        {{ menu.translations.find((t) => t.language.code == locale.toUpperCase())?.name || menu.translations[0].name }}
      </h1>
      <div v-if="blogs.length > 0" id="service-4" class="pb-[50px]">
        <div class="swiper swiper-2">
          <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div v-for="blog in blogs" class="swiper-slide">
              <div @click.prevent="router.visit(`/${menu.slug}/${blog.slug}`)" class="rounded-xl shadow-xl bg-white">
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
          <div class="swiper-button-next swiper-next-2"></div>
          <div class="swiper-button-prev swiper-prev-2"></div>
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
import { router } from '@inertiajs/vue3'
import { onMounted } from 'vue'
import Swiper from 'swiper/bundle'
import 'swiper/css/bundle'
import { useI18n } from 'vue-i18n'
import { BLOG_MEDIA_ENDPOINT, MEDIA_ENDPOINT } from '@/Constants/endpoint'

const props = defineProps({
  blogs: Object,
  menu: Object
})
const { t, locale } = useI18n()

onMounted(async () => {
  if (typeof window !== 'undefined' && typeof document !== 'undefined') {
    const ScrollReveal = (await import('scrollreveal')).default
    const scrollReveal = ScrollReveal()

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

function updateNavigationButtons(swiperInstance) {
  const { slides, params } = swiperInstance
  const slidesPerView = params.slidesPerView
  const totalSlides = slides.length

  // Nếu số lượng slide nhỏ hơn hoặc bằng số slide hiển thị, ẩn nút
  if (totalSlides <= slidesPerView) {
    document.getElementsByClassName('swiper-prev-2')[0].style.display = 'none'
    document.getElementsByClassName('swiper-next-2')[0].style.display = 'none'
  } else {
    document.getElementsByClassName('swiper-prev-2')[0].style.display = ''
    document.getElementsByClassName('swiper-next-2')[0].style.display = ''
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
  height: 620px;
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
