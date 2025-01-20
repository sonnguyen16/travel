<template>
  <MainLayout>
    <div class="container">
      <div class="lg:pt-[150px] pt-[80px]">
        <div style="box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.3)" class="rounded-xl p-3">
          <div class="row">
            <div class="col-lg-5">
              <div class="position-relative w-full md:h-[260px] h-[250px]">
                <img
                  :src="BLOG_MEDIA_ENDPOINT + blog?.image_fe?.picture"
                  alt="home1"
                  style="box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.3)"
                  class="w-full rounded-xl object-cover position-absolute lg:top-[-40px] max-h-[260px]"
                />
              </div>
            </div>
            <div class="col-lg-7 lg:pe-5 lg:pt-3">
              <h4>
                {{ blog?.translations.find((t) => t.language.code == locale.toUpperCase())?.name }}
              </h4>
              <div v-html="blog?.translations.find((t) => t.language.code == locale.toUpperCase())?.content"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="row pt-5">
        <h2 class="text-center mb-5 text-2xl font-bold">Hoạt động nổi bật</h2>
        <div class="space-y-0 divide-y divide-gray-300">
          <!-- Collapse Item 1 -->
          <div v-for="(product, index) in blog?.activities" class="border-none">
            <button
              :class="[index == 0 ? 'rounded-t-xl' : '', index == blog.activities.length - 1 ? 'rounded-b-xl' : '']"
              class="w-full flex justify-between items-center px-4 py-3 border-green-600 border bg-gray-100 hover:bg-gray-200 font-semibold"
              :data-target="`collapse${index + 1}`"
            >
              <span>
                {{ product.translations.find((t) => t.language.code == locale.toUpperCase())?.name }}
              </span>
              <svg
                class="w-5 h-5 transform transition-transform duration-300"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div :id="`collapse${index + 1}`" class="hidden p-4 bg-gray-50 overflow-hidden transition-all duration-500">
              <div v-html="product.translations.find((t) => t.language.code == locale.toUpperCase())?.content"></div>
            </div>
          </div>

          <!-- Add more items as needed -->
        </div>
      </div>

      <div class="pt-[50px] lg:pb-[100px] pb-[30px]">
        <h2 class="text-center mb-4">Điểm đến hấp dẫn khác</h2>
        <div class="swiper swiper-2">
          <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <template v-for="blog_related in blog?.menu?.blogs">
              <div
                v-if="blog_related.id != blog.id"
                @click.prevent="router.visit(`/${blog.menu.slug}/${blog_related.slug}`)"
                class="swiper-slide"
              >
                <div class="rounded-xl shadow-xl bg-white">
                  <div
                    class="img-container h-[400px]"
                    style="border-bottom-right-radius: 0; border-bottom-left-radius: 0"
                  >
                    <img
                      :src="BLOG_MEDIA_ENDPOINT + blog_related.image_fe?.picture"
                      alt="home1"
                      class="w-full rounded-tr-xl rounded-tl-xl object-cover"
                    />
                  </div>
                  <div class="p-3">
                    <h3 class="text-xl font-semibold">
                      {{ blog_related.translations.find((t) => t.language.code == locale.toUpperCase())?.name }}
                    </h3>
                    <div
                      class="line-clamp-4"
                      v-html="
                        blog_related.translations.find((t) => t.language.code == locale.toUpperCase())?.description
                      "
                    ></div>
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
import { onMounted } from 'vue'
import Swiper from 'swiper/bundle'
import 'swiper/css/bundle'
import { BLOG_MEDIA_ENDPOINT } from '@/Constants/endpoint'
import { useI18n } from 'vue-i18n'
import { router } from '@inertiajs/vue3'

const props = defineProps({
  blog: Object
})

const { t, locale } = useI18n()

onMounted(() => {
  document.querySelectorAll('button[data-target]').forEach((button) => {
    button.addEventListener('click', () => {
      const targetId = button.getAttribute('data-target')
      const targetElement = document.getElementById(targetId)

      // Ẩn tất cả các collapse khác
      document.querySelectorAll('.hidden').forEach((collapse) => {
        if (collapse !== targetElement) {
          collapse.classList.add('hidden')
        }
      })

      // Toggle trạng thái của collapse được click
      if (targetElement.classList.contains('hidden')) {
        targetElement.classList.remove('hidden')
      } else {
        targetElement.classList.add('hidden')
      }
    })
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
img {
  transition: transform 0.3s ease;
}

.swiper-slide {
  height: 600px;
}

.swiper-button-prev,
.swiper-button-next {
  width: 40px;
  height: 40px;
  background-color: white;
  border: 2px solid green;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
}

.swiper-button-prev::after,
.swiper-button-next::after {
  color: green;
  font-size: 16px;
  font-weight: bold;
}

.swiper-button-prev:hover,
.swiper-button-next:hover {
  background-color: green;
  color: white;
}

.swiper-button-prev:hover::after,
.swiper-button-next:hover::after {
  color: white;
}
</style>
