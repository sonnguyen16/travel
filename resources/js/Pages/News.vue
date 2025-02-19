<template>
  <MainLayout>
    <Head>
      <title>Tin tức - Đà Lạt Tourist</title>
      <meta
        name="description"
        content="Dalattourist - Công ty du lịch - dịch vụ - lữ hành lâu đời nhất tại Đà Lạt. Được thành lập từ năm 1976, Dalattourist tiên phong cung cấp những dịch vụ du lịch gắn liền với thiên nhiên, văn hóa và bản sắc Đà Lạt."
      />
      <meta property="og:title" content="Tin tức - Đà Lạt Tourist" />
      <meta
        property="og:description"
        content="Dalattourist - Công ty du lịch - dịch vụ - lữ hành lâu đời nhất tại Đà Lạt. Được thành lập từ năm 1976, Dalattourist tiên phong cung cấp những dịch vụ du lịch gắn liền với thiên nhiên, văn hóa và bản sắc Đà Lạt."
      />
      <meta property="og:image" content="/images/logo.png" />
    </Head>
    <div class="container pt-[80px]">
      <h2 class="mb-3">{{ $t('hot_news') }}</h2>
      <div class="row g-3">
        <div class="col-md-8 h-full">
          <div
            @click.prevent="router.visit(`/tin-tuc/${hot_blogs[0].news_category?.slug}/${hot_blogs[0].slug}`)"
            class="img-container w-full h-full hover:cursor-pointer"
          >
            <img
              :src="BLOG_MEDIA_ENDPOINT + hot_blogs[0].image_fe?.picture"
              alt="home1"
              class="w-full object-cover rounded-lg h-full hover:cursor-pointer"
            />
            <div class="overlay slide-content px-3">
              <h3 class="line-clamp-4 text-[24px] text-white">
                {{
                  hot_blogs[0].translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                  hot_blogs[0].translations[0].name
                }}
              </h3>
              <div
                class="text-description md:block hidden line-clamp-3"
                v-html="
                  hot_blogs[0].translations.find((t) => t.language.code == locale.toUpperCase())?.description ||
                  hot_blogs[0].translations[0].description
                "
              ></div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div
            @click.prevent="router.visit(`/tin-tuc/${hot_blogs[1].news_category?.slug}/${hot_blogs[1].slug}`)"
            class="img-container w-full mb-3"
            style="height: calc(50% - 15px)"
          >
            <img
              :src="BLOG_MEDIA_ENDPOINT + hot_blogs[1].image_fe?.picture"
              alt="home1"
              class="w-full object-cover rounded-lg hover:cursor-pointer"
            />
            <div class="overlay slide-content px-3">
              <h3 class="line-clamp-4 text-[24px] text-white">
                {{
                  hot_blogs[1].translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                  hot_blogs[1].translations[0].name
                }}
              </h3>
            </div>
          </div>
          <div
            @click.prevent="router.visit(`/tin-tuc/${hot_blogs[2].news_category?.slug}/${hot_blogs[2].slug}`)"
            class="img-container w-full"
            style="height: calc(50% - 1px)"
          >
            <img
              :src="BLOG_MEDIA_ENDPOINT + hot_blogs[2].image_fe?.picture"
              alt="home1"
              class="w-full object-cover rounded-lg hover:cursor-pointer"
            />
            <div class="overlay slide-content px-3">
              <h3 class="line-clamp-4 text-[24px] text-white">
                {{
                  hot_blogs[2].translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                  hot_blogs[2].translations[0].name
                }}
              </h3>
            </div>
          </div>
        </div>
      </div>
      <h2 class="mb-3 mt-3">{{ $t('newest_news') }}</h2>
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <template v-if="blogs.data.length > 0" v-for="blog in blogs.data">
              <div
                @click.prevent="router.visit(`/tin-tuc/${blog.news_category?.slug}/${blog.slug}`)"
                class="col-md-6 mb-4 hover:cursor-pointer"
              >
                <div class="img-container w-full h-[250px]">
                  <img
                    :src="BLOG_MEDIA_ENDPOINT + blog.image_fe?.picture"
                    alt="home1"
                    class="w-full object-cover rounded-lg hover:cursor-pointer"
                  />
                </div>
                <h5 class="line-clamp-2 mt-2">
                  {{
                    blog.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                    blog.translations[0].name
                  }}
                </h5>
                <span>
                  <i class="far fa-calendar-alt"></i>
                  {{
                    new Date(blog.created_at).toLocaleDateString(locale, {
                      year: 'numeric',
                      month: 'long',
                      day: 'numeric'
                    })
                  }}
                </span>
                <div
                  class="line-clamp-3 mt-2"
                  v-html="
                    blog.translations.find((t) => t.language.code == locale.toUpperCase())?.description ||
                    blog.translations[0].description
                  "
                ></div>
              </div>
            </template>
            <template v-else>
              <div class="col-md-12">
                <p>{{ $t('no_data') }}</p>
              </div>
            </template>
          </div>
          <Pagination :all-data="blogs" @changePage="changePage" />
        </div>
        <div class="col-md-4">
          <form>
            <div class="input-group mb-3">
              <input
                type="text"
                class="form-control"
                :placeholder="$t('search')"
                v-model="search"
                aria-label="Recipient's username"
                aria-describedby="button-addon2"
              />
              <button @click.prevent="searchNews" class="btn btn-outline-secondary" type="submit" id="button-addon2">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>
          <h4 class="">
            {{ t('category') }}
          </h4>
          <hr />
          <template v-for="m in menu">
            <div @click.prevent="router.visit(`/tin-tuc/${m.slug}`)" class="flex gap-3 mb-4 hover:cursor-pointer">
              <div>
                <p class="mb-0 line-clamp-3">
                  {{
                    m.translations.find((t) => t.language.code == locale.toUpperCase())?.name || m.translations[0].name
                  }}
                </p>
              </div>
              <span class="text-gray-500">
                <i class="fas fa-chevron-right"></i>
              </span>
            </div>
          </template>
          <h4 class="">
            {{ t('other_promotions') }}
          </h4>
          <hr />
          <template v-for="blog_related in promo">
            <div
              @click.prevent="router.visit(`/uu-dai/${blog_related.slug}`)"
              class="flex gap-3 mb-4 hover:cursor-pointer"
            >
              <img
                :src="BLOG_MEDIA_ENDPOINT + blog_related.image_fe?.picture"
                alt="promo1"
                class="w-[150px] h-[100px] object-cover rounded-xl"
              />
              <div style="width: calc(100% - 150px)">
                <p class="mb-0 line-clamp-3">
                  {{
                    blog_related.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                    blog_related.translations[0].name
                  }}
                </p>
                <p class="text-sm mt-2">
                  <i class="far fa-calendar"></i>
                  {{
                    new Date(blog_related.created_at).toLocaleDateString(locale, {
                      year: 'numeric',
                      month: 'long',
                      day: 'numeric'
                    })
                  }}
                </p>
              </div>
            </div>
          </template>
          <h4 class="">
            {{ t('recruitment') }}
          </h4>
          <hr />
          <template v-for="r in recruitment">
            <div @click.prevent="router.visit(`/tuyen-dung/${r.slug}`)" class="flex gap-3 mb-4 hover:cursor-pointer">
              <img
                :src="RECRUITMENT_MEDIA_ENDPOINT + r.image_fe?.picture"
                alt="promo1"
                class="w-[150px] h-[100px] object-cover rounded-xl"
              />
              <div>
                <p class="mb-0 line-clamp-3">
                  {{
                    r.translations.find((t) => t.language.code == locale.toUpperCase())?.name || r.translations[0].name
                  }}
                </p>
                <p class="text-sm mt-2">
                  <i class="far fa-calendar"></i>
                  {{
                    new Date(r.created_at).toLocaleDateString(locale, {
                      year: 'numeric',
                      month: 'long',
                      day: 'numeric'
                    })
                  }}
                </p>
              </div>
            </div>
          </template>
        </div>
      </div>
    </div>
  </MainLayout>
</template>
<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import Pagination from '@/Components/Pagination.vue'
import { router, Head } from '@inertiajs/vue3'
import { onMounted, ref } from 'vue'
import { useI18n } from 'vue-i18n'
import { BLOG_MEDIA_ENDPOINT, RECRUITMENT_MEDIA_ENDPOINT } from '@/Constants/endpoint'

const props = defineProps({
  blogs: Object,
  menu: Object,
  hot_blogs: Object,
  promo: Object,
  recruitment: Object
})
const { t, locale } = useI18n()
const mounted = ref(false)
const search = ref('')

const searchNews = () => {
  router.visit(route('news', { search: search.value }), {
    preserveState: true
  })
}

onMounted(async () => {
  const paragraphs = document.querySelectorAll('.text-description p')

  paragraphs.forEach((p) => {
    p.style.color = 'white'
  })
  mounted.value = true
  if (typeof window !== 'undefined' && typeof document !== 'undefined') {
    const ScrollReveal = (await import('scrollreveal')).default
    const scrollReveal = ScrollReveal()

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

const changePage = (page) => {
  router.visit(route('news', { page: page }), {
    preserveState: true
  })
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

.slide-content {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
}

.overlay {
  padding-top: 20px;
  background: linear-gradient(
    to top,
    rgba(0, 0, 0, 0.9),
    rgba(0, 0, 0, 0.7),
    rgba(0, 0, 0, 0.6),
    rgba(0, 0, 0, 0.5),
    rgba(255, 255, 255, 0)
  );
}
</style>
