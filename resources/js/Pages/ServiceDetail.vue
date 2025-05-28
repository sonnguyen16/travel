<template>
  <Head>
    <title>
      {{ blog?.translations?.find((t) => t.language.code == locale.toUpperCase())?.name || blog.translations[0].name }}
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
            <div class="col-lg-6">
              <div class="position-relative w-full md:h-[260px] h-[250px]">
                <img
                  :src="BLOG_MEDIA_ENDPOINT + blog?.image_fe?.picture"
                  alt="home1"
                  class="w-full rounded-xl object-cover max-h-[260px]"
                />
              </div>
            </div>
            <div class="col-lg-6 lg:pe-5 lg:pt-3">
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
            <div
              class="text-justify mt-4"
              v-html="
                blog?.translations.find((t) => t.language.code == locale.toUpperCase())?.content ||
                blog?.translations[0].content
              "
            ></div>
          </div>
        </div>
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
              <span class="text-white text-start">
                {{
                  product.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                  product.translations[0].name
                }}
              </span>
              <div class="flex items-center gap-3">
                <a
                  v-if="product.link"
                  :href="product.link"
                  target="_blank"
                  class="view-now-btn text-white px-3 py-1 rounded-md text-sm hover:bg-green-700"
                  @click.stop
                >
                  {{ t('view_now') }}
                </a>
              </div>
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
              <div class="text-center mt-4">
                <a
                  v-if="!product.booking"
                  @click.prevent="openZaloChat()"
                  class="px-6 py-[12px] text-white rounded-lg bg-green-700 transition-colors text-lg text-decoration-none cursor-pointer"
                >
                  {{ t('contact_us') }}
                </a>
                <a
                  v-else
                  @click.prevent="
                    router.visit(
                      `/dat-ve/buoc1?ticket_name=${encodeURIComponent(
                        product.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                          product.translations[0].name
                      )}`
                    )
                  "
                  style="background-color: #3e7b27"
                  class="px-6 py-[12px] text-white rounded-lg hover:bg-green-700 transition-colors text-lg text-decoration-none cursor-pointer"
                >
                  {{ t('book_ticket') }}
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div v-if="blog.images_fe?.length > 0" class="pt-[30px] pb-[30px]">
        <h2 class="text-center mb-4 uppercase font-bold text-[32px]">
          {{ t('images') }}
        </h2>
        <div class="swiper swiper-3 h-[300px]">
          <div class="swiper-wrapper">
            <template v-for="(image, index) in Array(10).fill(blog.images_fe).flat()" :key="image.picture">
              <div
                class="swiper-slide hover:cursor-pointer shadow-md transition-all duration-500 rounded-xl"
                :class="{
                  'active-slide': index === activeIndex + 1,
                  'side-slide': index === activeIndex || index === activeIndex + 2
                }"
              >
                <div class="img-container h-[100%] rounded-xl">
                  <img :src="BLOG_MEDIA_ENDPOINT + image.picture" alt="home1" class="w-full rounded-xl object-cover" />
                </div>
              </div>
            </template>
          </div>
          <!-- Navigation -->
          <div class="swiper-button-next swiper-next-3"></div>
          <div class="swiper-button-prev swiper-prev-3" :style="{ opacity: activeIndex > 0 ? 1 : 0 }"></div>
        </div>
      </div>

      <div class="pt-[30px] pb-[30px]">
        <h2 class="text-center mb-4 uppercase font-bold text-[32px]">
          {{ t('service_detail.related_services') }}
        </h2>
        <div class="swiper swiper-2">
          <div class="swiper-wrapper pb-4">
            <!-- Slide 1 -->
            <template v-if="mounted" v-for="blog_related in blogs_related_computed">
              <div
                v-if="
                  blog_related.id != blog.id &&
                  blog_related.location_id === blog.location_id &&
                  blog_related.active == 1
                "
                @click.prevent="router.visit(`/${blog_related?.menu?.slug || blog?.menu?.slug}/${blog_related.slug}`)"
                class="swiper-slide hover:cursor-pointer"
              >
                <div class="rounded-xl bg-white shadow-md card-equal-height">
                  <div
                    class="img-container h-[400px] position-relative"
                    style="border-bottom-right-radius: 0; border-bottom-left-radius: 0"
                  >
                    <img
                      :src="BLOG_MEDIA_ENDPOINT + blog_related.image_fe?.picture"
                      alt="home1"
                      class="w-full h-full rounded-tr-xl rounded-tl-xl object-cover"
                    />
                  </div>
                  <div class="p-3 card-content">
                    <h3 class="text-xl font-semibold line-clamp-1 card-title mb-2">
                      {{
                        blog_related.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                        blog_related.translations[0].name
                      }}
                    </h3>
                    <p
                      class="cursor-pointer card-address mt-1 mb-3"
                      @click.stop="viewLocation(blog_related)"
                      v-if="blog_related.translations.find((t) => t.language.code == locale.toUpperCase())?.address"
                    >
                      <i class="fas fa-map-marker-alt text-green-600 me-2 text-lg"></i>
                      {{
                        blog_related.translations.find((t) => t.language.code == locale.toUpperCase())?.address ||
                        blog_related.translations[0].address
                      }}
                    </p>
                    <div class="card-description-container">
                      <div
                        class="card-description"
                        v-html="
                          blog_related.translations.find((t) => t.language.code == locale.toUpperCase())?.description ||
                          blog_related.translations[0].description
                        "
                      ></div>
                      <div class="fade-out-effect"></div>
                    </div>
                  </div>
                </div>
              </div>
            </template>
          </div>
          <!-- Navigation -->
          <div class="swiper-button-next swiper-next-2 custom-nav-button"></div>
          <div class="swiper-button-prev swiper-prev-2 custom-nav-button"></div>
        </div>
      </div>
    </div>
  </MainLayout>
</template>
<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import { computed, onMounted, ref } from 'vue'
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
const blogs_related_computed = computed(() => {
  if (props.blog.menu.slug === 'hoat-dong') return props.blog.menu.blogs
  return props.blogs_related
})

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

const viewLocation = (blog_related) => {
  if (blog_related.location_id) router.visit(`/diem-den/${blog_related.location?.slug}`)
}

// Hàm kiểm tra xem hoạt động có phải là "cồng chiêng tây nguyên" hay không
const isGongActivity = (product) => {
  const productName =
    product.translations.find((t) => t.language.code == locale.value.toUpperCase())?.name ||
    product.translations[0].name ||
    ''
  return productName.toLowerCase().includes('cồng chiêng tây nguyên')
}

// Hàm mở Zalo OA
const openZaloChat = () => {
  // Mở Zalo OA với số điện thoại
  window.open('https://zalo.me/208756278048926276', '_blank')
}
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
  background-color: #efe3c2;
}

.activity-button {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #3e7b27;
  color: white;
}

.activity-button > span {
  flex: 1;
}

.activity-button > div {
  flex-shrink: 0;
}

.view-now-btn {
  background-color: #16a34a;
  transition: all 0.3s ease;
  border: 1px solid transparent;
}

.view-now-btn:hover {
  background-color: #15803d;
  transform: translateY(-1px);
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

/* CSS cho nút điều hướng ở giữa ảnh */
.custom-nav-button {
  position: absolute;
  top: 200px; /* Giữa chiều cao của ảnh (400px/2) */
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
