<template>
  <Head>
    <title>
      {{ blog.translations.find((t) => t.language.code == locale.toUpperCase())?.name || blog.translations[0].name }}
    </title>
    <meta
      name="description"
      :content="
        cleanHTML(
          blog.translations.find((t) => t.language.code == locale.toUpperCase())?.description ||
            blog.translations[0].description
        )
      "
    />
    <meta
      property="og:title"
      :content="
        blog.translations.find((t) => t.language.code == locale.toUpperCase())?.name || blog.translations[0].name
      "
    />
    <meta
      property="og:description"
      :content="
        cleanHTML(
          blog.translations.find((t) => t.language.code == locale.toUpperCase())?.description ||
            blog.translations[0].description
        )
      "
    />
    <meta property="og:image" :content="app_url + ACTIVITY_MEDIA_ENDPOINT + blog.image?.picture" />
  </Head>
  <MainLayout>
    <div class="container">
      <div class="pt-[100px]">
        <div class="rounded-xl bg-white">
          <div class="row">
            <div class="col-lg-5">
              <div class="position-relative w-full md:h-[260px] h-[250px]">
                <img
                  :src="ACTIVITY_MEDIA_ENDPOINT + blog?.image?.picture"
                  alt="home1"
                  class="w-full rounded-xl object-cover max-h-[260px]"
                />
              </div>
            </div>
            <div class="col-lg-7 lg:pe-5 lg:pt-3">
              <h3 class="font-semibold mt-md-0 mt-3">
                {{
                  blog?.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                  blog?.translations[0].name
                }}
              </h3>
              <div
                class="text-justify"
                v-html="
                  blog?.translations.find((t) => t.language.code == locale.toUpperCase())?.content ||
                  blog?.translations[0].content
                "
              ></div>
            </div>
          </div>
        </div>
      </div>

      <div class="pt-[30px] pb-[30px]">
        <h2 class="text-center mb-4">
          {{ t('service_detail.related_services') }}
        </h2>
        <div class="swiper swiper-2">
          <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <template v-if="mounted" v-for="blog_related in blog?.blog?.activities">
              <div
                v-if="blog_related.id != blog.id"
                @click.prevent="router.visit(`/${blog.menu.slug}/${blog_related.slug}`)"
                class="swiper-slide hover:cursor-pointer"
              >
                <div class="rounded-xl bg-white shadow-md">
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
                    <h3 class="text-xl font-semibold line-clamp-1">
                      {{
                        blog_related.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                        blog_related.translations[0].name
                      }}
                    </h3>
                    <div
                      class="line-clamp-4"
                      v-html="
                        blog_related.translations.find((t) => t.language.code == locale.toUpperCase())?.content ||
                        blog_related.translations[0].content
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
import { onMounted, ref } from 'vue'
import Swiper from 'swiper/bundle'
import 'swiper/css/bundle'
import { ACTIVITY_MEDIA_ENDPOINT, BLOG_MEDIA_ENDPOINT } from '@/Constants/endpoint'
import { useI18n } from 'vue-i18n'
import { router, Head } from '@inertiajs/vue3'
import { updateNavigationButtons, updateSlideWidth, cleanHTML } from '@/Assets/common.js'

const props = defineProps({
  blog: Object
})

const { t, locale } = useI18n()
const app_url = import.meta.env.VITE_APP_URL
const mounted = ref(false)

onMounted(() => {
  mounted.value = true
  document.querySelectorAll('button[data-target]').forEach((button) => {
    button.addEventListener('click', () => {
      const targetId = button.getAttribute('data-target')
      const targetElement = document.getElementById(targetId)

      // Ẩn tất cả các collapse khác
      document.querySelectorAll('.collapse-content').forEach((collapse) => {
        if (collapse !== targetElement) {
          collapse.classList.add('hidden')
        }
      })

      // Toggle trạng thái của collapse được click
      if (targetElement.classList.contains('hidden')) {
        targetElement.classList.remove('hidden')

        // Cuộn lên button sau khi mở collapse
        setTimeout(() => {
          window.scrollTo({
            top: button.offsetTop - 80,
            behavior: 'smooth'
          })
        }, 200)
      } else {
        targetElement.classList.add('hidden')
      }
    })
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
})
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
