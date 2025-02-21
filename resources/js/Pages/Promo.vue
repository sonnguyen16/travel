<template>
  <MainLayout>
    <Head>
      <title>Ưu đãi - Dalattourist</title>
      <meta
        name="description"
        content="Dalattourist - Công ty du lịch - dịch vụ - lữ hành lâu đời nhất tại Đà Lạt. Được thành lập từ năm 1976, Dalattourist tiên phong cung cấp những dịch vụ du lịch gắn liền với thiên nhiên, văn hóa và bản sắc Đà Lạt."
      />
      <meta property="og:title" content="Ưu đãi - Dalattourist" />
      <meta
        property="og:description"
        content="Dalattourist - Công ty du lịch - dịch vụ - lữ hành lâu đời nhất tại Đà Lạt. Được thành lập từ năm 1976, Dalattourist tiên phong cung cấp những dịch vụ du lịch gắn liền với thiên nhiên, văn hóa và bản sắc Đà Lạt."
      />
      <meta property="og:image" content="/images/logo.png" />
    </Head>
    <div class="container">
      <div id="promo-1" class="mt-[100px]">
        <div v-if="blogs?.length > 0 && mounted" class="row g-3">
          <template v-for="blog in blogs">
            <div class="col-md-4 hover:cursor-pointer promo-item">
              <div
                @click.prevent="router.visit(`/uu-dai/${blog.slug}`)"
                class="rounded-xl shadow-xl bg-white position-relative h-100"
              >
                <div class="img-container h-100">
                  <img
                    :src="BLOG_MEDIA_ENDPOINT + blog.image_fe?.picture"
                    alt="home1"
                    class="w-full rounded-xl object-cover h-[300px]"
                  />
                </div>
                <div class="p-3 position-absolute bottom-0 rounded-xl left-0 right-0 overlay1 h-[150px]">
                  <h3 class="text-white mt-5 line-clamp-2">
                    {{
                      blog.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                      blog.translations[0].name
                    }}
                  </h3>
                </div>
              </div>
            </div>
          </template>
        </div>
      </div>
    </div>
    <div id="promo-3" class="w-full py-[200px] bg_promo mt-5">
      <!-- <div class="container text-center">
        <h2 id="promo-title" class="text-white">{{ $t('register_now') }}</h2>
        <button id="promo-btn" class="btn btn-success px-5" style="font-size: 20px">{{ $t('register') }}</button>
      </div> -->
    </div>
    <div class="container">
      <div id="promo-2" class="pt-[50px]">
        <div class="swiper swiper-2" style="height: 350px">
          <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <template v-if="mounted" v-for="product in products">
              <div
                @click.prevent="router.visit(`dat-ve/buoc1?ticket_id=${product.id}`)"
                class="swiper-slide hover:cursor-pointer"
              >
                <div class="rounded-xl shadow-xl bg-white">
                  <div
                    class="img-container h-[200px]"
                    style="border-bottom-right-radius: 0; border-bottom-left-radius: 0"
                  >
                    <img
                      :src="PRODUCT_MEDIA_ENDPOINT + product.image_fe?.picture"
                      alt="home1"
                      class="w-full rounded-tr-xl rounded-tl-xl object-cover h-[200px]"
                    />
                  </div>
                  <div class="p-3">
                    <div class="">
                      <h5>
                        {{
                          product.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                          product.translations[0].name
                        }}
                      </h5>
                      <div class="flex justify-between items-center">
                        <p class="font-normal text-justify mb-0">
                          <i class="fas fa-star text-yellow-400"></i>
                          4.5
                        </p>
                        <div class="rounded-xl bg-green-600 px-3 py-1">
                          <p class="text-white text-center mb-0">
                            {{ product.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + ' ' + 'đ' }}
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </template>
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
import { BLOG_MEDIA_ENDPOINT, PRODUCT_MEDIA_ENDPOINT } from '@/Constants/endpoint'
import { useI18n } from 'vue-i18n'
import { updateNavigationButtons } from '@/Assets/common.js'

const { t, locale } = useI18n()
const props = defineProps({
  blogs: Object,
  products: Object
})
const mounted = ref(false)

onMounted(async () => {
  mounted.value = true
  if (typeof window !== 'undefined' && typeof document !== 'undefined') {
    const ScrollReveal = (await import('scrollreveal')).default
    const scrollReveal = ScrollReveal()

    new Swiper('.swiper-1', {
      loop: false,
      fadeEffect: { crossFade: true },
      speed: 1000,
      spaceBetween: 20,
      slidesPerView: 'auto',
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
          updateNavigationButtons(this, 1)
        },
        resize: function () {
          updateNavigationButtons(this, 1)
        }
      }
    })

    new Swiper('.swiper-2', {
      loop: false,
      fadeEffect: { crossFade: true },
      speed: 1000,
      spaceBetween: 20,
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

    // ScrollReveal - Hiệu ứng cho Timeline
    ScrollReveal().reveal('#promo-1', {
      duration: 2000,
      origin: 'top',
      distance: '50px',
      easing: 'ease-in-out'
    })

    // ScrollReveal - Hiệu ứng cho Timeline
    scrollReveal.reveal('#promo-3', {
      duration: 2000,
      origin: 'top',
      distance: '50px',
      easing: 'ease-in-out'
    })

    scrollReveal.reveal('#promo-title', {
      duration: 2000,
      origin: 'left',
      distance: '100px',
      easing: 'ease-in-out'
    })

    scrollReveal.reveal('#promo-btn', {
      duration: 2000,
      origin: 'right',
      distance: '100px',
      easing: 'ease-in-out'
    })

    // ScrollReveal - Hiệu ứng cho Swiper
    scrollReveal.reveal('#promo-2', {
      duration: 2000,
      origin: 'bottom',
      distance: '50px',
      easing: 'ease-in-out'
    })
  }
})
</script>
<style scoped>
.bg_promo {
  background: url('@/Assets/images/promo4.jpeg') no-repeat center center;
}

.overlay1 {
  background: linear-gradient(
    to top,
    rgba(22, 163, 74, 1),
    rgba(22, 163, 74, 1),
    rgba(22, 163, 74, 0.6),
    rgba(255, 255, 255, 0)
  );
}

.promo-item {
  height: 250px;
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
