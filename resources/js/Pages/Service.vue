<template>
  <MainLayout>
    <Head>
      <title>Dịch vụ - Dalattourist</title>
      <meta
        name="description"
        content="Dalattourist - Công ty du lịch - dịch vụ - lữ hành lâu đời nhất tại Đà Lạt. Được thành lập từ năm 1976, Dalattourist tiên phong cung cấp những dịch vụ du lịch gắn liền với thiên nhiên, văn hóa và bản sắc Đà Lạt."
      />
      <meta property="og:title" content="Dịch vụ - Dalattourist" />
      <meta
        property="og:description"
        content="Dalattourist - Công ty du lịch - dịch vụ - lữ hành lâu đời nhất tại Đà Lạt. Được thành lập từ năm 1976, Dalattourist tiên phong cung cấp những dịch vụ du lịch gắn liền với thiên nhiên, văn hóa và bản sắc Đà Lạt."
      />
      <meta property="og:image" content="/images/logo.png" />
    </Head>
    <div class="container">
      <div v-if="blogs.length > 0 && mounted" id="service-1" class="mt-[100px]">
        <div class="swiper swiper-1">
          <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div v-for="blog in blogs" class="swiper-slide hover:cursor-pointer">
              <div @click.prevent="router.visit(`/diem-den/${blog.slug}`)" class="rounded-xl shadow-xl bg-white card-equal-height">
                <div
                  class="img-container h-[350px]"
                  style="border-bottom-right-radius: 0; border-bottom-left-radius: 0"
                >
                  <img
                    :src="BLOG_MEDIA_ENDPOINT + blog.image_fe?.picture"
                    alt="home1"
                    class="w-full h-full rounded-tr-xl rounded-tl-xl object-cover"
                  />
                </div>
                <div class="p-3 card-content">
                  <h4 class="card-title">
                    {{
                      blog.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                      blog.translations[0].name
                    }}
                  </h4>
                  <p
                    class="text-[16px] card-address mt-1 mb-2"
                    v-if="blog.translations.find((t) => t.language.code == locale.toUpperCase())?.address"
                  >
                    <i class="fas fa-map-marker-alt text-green-600 me-2 text-lg"></i>
                    {{
                      blog.translations.find((t) => t.language.code == locale.toUpperCase())?.address ||
                      blog.translations[0].address
                    }}
                  </p>
                  <div class="card-description-container">
                    <div
                      class="card-description"
                      v-html="
                        blog.translations.find((t) => t.language.code == locale.toUpperCase())?.description ||
                        blog.translations[0].description
                      "
                    ></div>
                    <div class="fade-out-effect"></div>
                  </div>
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

      <div class="row pt-[50px]">
        <!-- Desktop Section - Leguda -->
        <div
          v-if="leguda"
          id="service-2"
          class="col-lg-6 md:pe-4 hover:cursor-pointer"
          @click.prevent="router.visit(`/nha-hang/${leguda.slug}`)"
        >
          <h4>{{ leguda.translations.find((t) => t.language.code == locale.toUpperCase())?.name || leguda.translations[0].name }}</h4>
          <!-- Location -->
          <div class="d-flex gap-2 items-center" v-if="leguda.translations.find((t) => t.language.code == locale.toUpperCase())?.address">
            <i class="fas fa-location-dot text-green-600"></i>
            <span>{{ leguda.translations.find((t) => t.language.code == locale.toUpperCase())?.address || leguda.translations[0].address }}</span>
          </div>
          <div class="mt-3 text-justify font-normal">
            <div v-html="leguda.translations.find((t) => t.language.code == locale.toUpperCase())?.description || leguda.translations[0].description"></div>
          </div>
          <div class="img-container h-[300px]">
            <img v-if="leguda.image_fe" :src="BLOG_MEDIA_ENDPOINT + leguda.image_fe?.picture" alt="leguda" class="w-full rounded-xl object-cover h-[300px]" />
            <img v-else src="@/Assets/images/service5.jpg" alt="leguda" class="w-full rounded-xl object-cover h-[300px]" />
          </div>
        </div>
        <div v-else id="service-2" class="col-lg-6 md:pe-4 hover:cursor-pointer" @click.prevent="router.visit('/nha-hang/buffet-rau-leguda')">
          <h4>{{ $t('restaurant_title') }}</h4>
          <!-- Location -->
          <div class="d-flex gap-2 items-center">
            <i class="fas fa-location-dot text-green-600"></i>
            <span>{{ $t('restaurant_location') }}</span>
          </div>
          <p class="mt-3 text-justify font-normal">{{ $t('restaurant_description') }}</p>
          <div class="img-container h-[300px]">
            <img src="@/Assets/images/service5.jpg" alt="home1" class="w-full rounded-xl object-cover h-[300px]" />
          </div>
        </div>

        <!-- Desktop Image Section - Thuy Ta -->
        <div
          v-if="thuyTa"
          id="service-3"
          class="col-lg-6 md:ps-4 md:block hidden hover:cursor-pointer"
          @click.prevent="router.visit(`/nha-hang/${thuyTa.slug}`)"
        >
          <div class="img-container h-[300px] mb-3 mt-4 order-md-1 order-2">
            <img v-if="thuyTa.image_fe" :src="BLOG_MEDIA_ENDPOINT + thuyTa.image_fe?.picture" alt="thuy-ta" class="w-full rounded-xl object-cover" />
            <img v-else src="@/Assets/images/service4.jpg" alt="thuy-ta" class="w-full rounded-xl object-cover" />
          </div>
          <h4>{{ thuyTa.translations.find((t) => t.language.code == locale.toUpperCase())?.name || thuyTa.translations[0].name }}</h4>
          <!-- Location -->
          <div class="d-flex gap-2 items-center order-1 order-md-2" v-if="thuyTa.translations.find((t) => t.language.code == locale.toUpperCase())?.address">
            <i class="fas fa-location-dot text-green-600"></i>
            <span>{{ thuyTa.translations.find((t) => t.language.code == locale.toUpperCase())?.address || thuyTa.translations[0].address }}</span>
          </div>
          <div class="mt-3 text-justify font-normal">
            <div v-html="thuyTa.translations.find((t) => t.language.code == locale.toUpperCase())?.description || thuyTa.translations[0].description"></div>
          </div>
        </div>
        <div v-else id="service-3" class="col-lg-6 md:ps-4 md:block hidden hover:cursor-pointer" @click.prevent="router.visit('/nha-hang/nha-hang-cafe-thuy-ta')">
          <div class="img-container h-[300px] mb-3 mt-4 order-md-1 order-2">
            <img src="@/Assets/images/service4.jpg" alt="home1" class="w-full rounded-xl object-cover" />
          </div>
          <h4>{{ $t('restaurant_title_1') }}</h4>
          <!-- Location -->
          <div class="d-flex gap-2 items-center order-1 order-md-2">
            <i class="fas fa-location-dot text-green-600"></i>
            <span>{{ $t('restaurant_location_1') }}</span>
          </div>
          <p class="mt-3 text-justify font-normal">{{ $t('restaurant_description_1') }}</p>
        </div>

        <!-- Mobile Section - Thuy Ta -->
        <div v-if="thuyTa" id="service-3" class="col-lg-6 md:ps-4 md:hidden block mt-3" @click.prevent="router.visit(`/nha-hang/${thuyTa.slug}`)">
          <h4>{{ thuyTa.translations.find((t) => t.language.code == locale.toUpperCase())?.name || thuyTa.translations[0].name }}</h4>
          <!-- Location -->
          <div class="d-flex gap-2 items-center order-1 order-md-2" v-if="thuyTa.translations.find((t) => t.language.code == locale.toUpperCase())?.address">
            <i class="fas fa-map text-green-600"></i>
            <span>{{ thuyTa.translations.find((t) => t.language.code == locale.toUpperCase())?.address || thuyTa.translations[0].address }}</span>
          </div>
          <div class="mt-3 text-justify font-normal card-description-container">
            <div class="card-description" v-html="thuyTa.translations.find((t) => t.language.code == locale.toUpperCase())?.description || thuyTa.translations[0].description"></div>
          </div>
          <div class="img-container h-[300px] mb-3 mt-4 order-md-1 order-2">
            <img v-if="thuyTa.image_fe" :src="BLOG_MEDIA_ENDPOINT + thuyTa.image_fe?.picture" alt="thuy-ta" class="w-full rounded-xl object-cover" />
            <img v-else src="@/Assets/images/service4.jpg" alt="thuy-ta" class="w-full rounded-xl object-cover" />
          </div>
        </div>
        <div v-else id="service-3" class="col-lg-6 md:ps-4 md:hidden block mt-3">
          <h4>{{ $t('restaurant_title_1') }}</h4>
          <!-- Location -->
          <div class="d-flex gap-2 items-center order-1 order-md-2">
            <i class="fas fa-map text-green-600"></i>
            <span>{{ $t('restaurant_location_1') }}</span>
          </div>
          <p class="mt-3 text-justify font-normal">{{ $t('restaurant_description_1') }}</p>
          <div class="img-container h-[300px] mb-3 mt-4 order-md-1 order-2">
            <img src="@/Assets/images/service4.jpg" alt="home1" class="w-full rounded-xl object-cover" />
          </div>
        </div>
      </div>

      <div id="service-4" class="pt-[50px] pb-[30px]">
        <div v-if="blogs_related.length > 0 && mounted" class="swiper swiper-2">
          <div class="swiper-wrapper">
            <div v-for="blog in blogs_related" class="swiper-slide hover:cursor-pointer">
              <div @click.prevent="router.visit(`/luu-tru/${blog.slug}`)" class="rounded-xl shadow-xl bg-white card-equal-height">
                <div
                  class="img-container h-[350px]"
                  style="border-bottom-right-radius: 0; border-bottom-left-radius: 0"
                >
                  <img
                    :src="BLOG_MEDIA_ENDPOINT + blog.image_fe?.picture"
                    alt="home1"
                    class="w-full h-full rounded-tr-xl rounded-tl-xl object-cover"
                  />
                </div>
                <div class="p-3 card-content">
                  <h4 class="line-clamp-1 card-title">
                    {{
                      blog.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                      blog.translations[0].name
                    }}
                  </h4>
                  <p class="card-address" v-if="blog.translations.find((t) => t.language.code == locale.toUpperCase())?.address">
                    <i class="fas fa-map-marker-alt text-green-600 me-2 text-lg"></i>
                    {{
                      blog.translations.find((t) => t.language.code == locale.toUpperCase())?.address ||
                      blog.translations[0].address
                    }}
                  </p>
                  <div
                    class="line-clamp-6 card-description"
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
  blogs_related: Object,
  leguda: Object,
  thuyTa: Object
})
const { t, locale } = useI18n()
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
      slidesPerView: 'auto',
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
          updateNavigationButtons(this, 1)
        },
        resize: function () {
          updateNavigationButtons(this, 1)
        }
      }
    })

    new Swiper('.swiper-2', {
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

    // ScrollReveal - Hiệu ứng nhập từ 2 bên
    scrollReveal.reveal('#service-2', {
      duration: 2000,
      origin: 'bottom',
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
      origin: 'bottom',
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
</script>

<style>
/* Đảm bảo các card có chiều cao bằng nhau */
.card-equal-height {
  display: flex;
  flex-direction: column;
  height: 100%;
}

.img-container {
  flex: 0 0 auto; /* Không co giãn phần ảnh */
}

.card-content {
  display: flex;
  flex-direction: column;
  flex: 1; /* Phần nội dung sẽ co giãn để điều chỉnh chiều cao */
}

.card-title {
  flex: 0 0 auto; /* Không co giãn phần tiêu đề */
}

.card-address {
  flex: 0 0 auto; /* Không co giãn phần địa chỉ */
}

.card-description-container {
  flex: 1;
  position: relative;
  overflow: hidden;
  max-height: 120px;
}

.card-description {
  line-height: 1.5;
  overflow: hidden;
  max-height: 120px;
}

.fade-out-effect {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 60px;
  background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 1));
  pointer-events: none;
}

/* Đảm bảo swiper-slide có chiều cao bằng nhau */
.swiper-slide {
  height: auto !important;
}
</style>
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

.swiper-wrapper {
  padding-bottom: 50px;
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
