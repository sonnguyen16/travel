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
    <meta property="og:image" :content="BLOG_MEDIA_ENDPOINT + blog.image_fe?.picture" />
  </Head>
  <MainLayout>
    <div class="container">
      <div class="pt-[100px]">
        <div class="rounded-xl bg-white">
          <div class="row">
            <div class="col-lg-5">
              <div class="position-relative w-full md:h-[260px] h-[250px]">
                <img
                  :src="BLOG_MEDIA_ENDPOINT + blog?.image_fe?.picture"
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
                  blog?.translations.find((t) => t.language.code == locale.toUpperCase())?.description ||
                  blog?.translations[0].description
                "
              ></div>
            </div>
          </div>
        </div>
        <div
          class="text-justify mt-4"
          v-html="
            blog?.translations.find((t) => t.language.code == locale.toUpperCase())?.content ||
            blog?.translations[0].content
          "
        ></div>
      </div>

      <div v-if="blog?.activities.length > 0" class="row pt-5">
        <h2 class="text-center mb-4 text-2xl uppercase font-bold text-[32px]">
          {{ t('service_detail.activities') }}
        </h2>
        <div class="space-y-0 divide-y divide-gray-300">
          <div v-for="(product, index) in blog?.activities" :key="index" class="border-none">
            <button
              :class="[index == 0 ? 'rounded-t-xl' : '', index == blog.activities.length - 1 ? 'rounded-b-xl' : '']"
              class="activity-button w-full flex justify-between items-center px-4 py-3 border-green-600 border hover:bg-gray-200 font-semibold"
              :data-target="`collapse${index + 1}`"
            >
              <span class="text-white">
                {{
                  product.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                  product.translations[0].name
                }}
              </span>
              <svg
                class="w-5 h-5 transform transition-transform duration-300"
                xmlns="http://www.w3.org/2000/svg"
                fill="#f4fbd2"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div
              :id="`collapse${index + 1}`"
              class="hidden p-4 overflow-hidden transition-all duration-500 collapse-content"
            >
              <div
                class="ql-editor"
                v-html="
                  product.translations.find((t) => t.language.code == locale.toUpperCase())?.content ||
                  product.translations[0].content
                "
              ></div>
            </div>
          </div>
        </div>
      </div>

      <div v-if="blog.images_fe?.length > 0" class="pt-[30px] pb-[30px]">
        <h2 class="text-center mb-4 uppercase font-bold text-[32px]">
          {{ t('images') }}
        </h2>
        <div class="swiper swiper-3">
          <div class="swiper-wrapper">
            <template v-for="(image, index) in blog.images_fe" :key="image.picture">
              <div
                class="swiper-slide hover:cursor-pointer shadow-md transition-all duration-500"
                :class="{
                  'active-slide': index === activeIndex + 1,
                  'side-slide': index === activeIndex || index === activeIndex + 2
                }"
              >
                <div class="img-container h-[100%]">
                  <img :src="BLOG_MEDIA_ENDPOINT + image.picture" alt="home1" class="w-full rounded-xl object-cover" />
                </div>
              </div>
            </template>
          </div>
          <!-- Navigation -->
          <div class="swiper-button-next swiper-next-3"></div>
          <div class="swiper-button-prev swiper-prev-3"></div>
        </div>
      </div>

      <div class="pt-[30px] pb-[30px]">
        <h2 class="text-center mb-4 uppercase font-bold text-[32px]">
          {{ t('service_detail.related_services') }}
        </h2>
        <div class="swiper swiper-2">
          <div class="swiper-wrapper pb-4">
            <!-- Slide 1 -->
            <template v-if="mounted" v-for="blog_related in blogs_related">
              <div
                v-if="
                  blog_related.id != blog.id &&
                  blog_related.location_id === blog.location_id &&
                  blog_related.active == 1
                "
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
                    <p v-if="blog.translations.find((t) => t.language.code == locale.toUpperCase())?.address">
                      <i class="fas fa-map-marker-alt text-green-600 me-2 text-lg"></i>
                      {{
                        blog.translations.find((t) => t.language.code == locale.toUpperCase())?.address ||
                        blog.translations[0].address
                      }}
                    </p>
                    <div
                      class="line-clamp-4"
                      v-html="
                        blog_related.translations.find((t) => t.language.code == locale.toUpperCase())?.description ||
                        blog_related.translations[0].description
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
import 'swiper/css/effect-coverflow'
import { BLOG_MEDIA_ENDPOINT } from '@/Constants/endpoint'
import { useI18n } from 'vue-i18n'
import { router, Head } from '@inertiajs/vue3'
import { updateNavigationButtons, cleanHTML } from '@/Assets/common.js'

const props = defineProps({
  blog: Object,
  blogs_related: Object
})

const { t, locale } = useI18n()
const mounted = ref(false)
const activeIndex = ref(0)

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

  const swiper = new Swiper('.swiper-3', {
    loop: false,
    fadeEffect: { crossFade: true },
    speed: 1000,
    spaceBetween: 10,
    slidesPerView: 'auto',
    navigation: {
      nextEl: '.swiper-next-3',
      prevEl: '.swiper-prev-3'
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
        updateNavigationButtons(this, 3)
      },
      resize: function () {
        updateNavigationButtons(this, 3)
      },
      slideChange: function () {
        activeIndex.value = this.activeIndex
      }
    }
  })
})
</script>
<style scoped>
@media screen and (min-width: 768px) {
  .swiper-3 .active-slide {
    transition: all 0.5s ease-in-out;
    width: 48% !important;
    height: 300px !important;
  }

  .side-slide {
    transition: all 0.5s ease-in-out;
    height: 200px !important;
    width: 25% !important;
  }
}
.swiper-3 .swiper-slide {
  height: 300px;
  margin: auto 0;
}

img {
  transition: transform 0.3s ease;
}

.collapse-content {
  background-color: #f4fbd2;
}

.activity-button {
  background-color: #556c19;
  color: white;
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
