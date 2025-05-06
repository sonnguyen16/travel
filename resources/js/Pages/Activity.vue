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
      <h1 class="text-center mb-3 pt-[100px]">
        {{ menu.translations.find((t) => t.language.code == locale.toUpperCase())?.name || menu.translations[0].name }}
      </h1>
      <div v-if="blogs.length > 0 && mounted" id="service-4" class="pb-[50px] row g-3">
        <div v-for="blog in blogs" class="col-md-4 hover:cursor-pointer">
          <div @click.prevent="router.visit(`/${menu.slug}/${blog.slug}`)" class="rounded-xl shadow-xl bg-white card-equal-height">
            <div class="img-container h-[350px]" style="border-bottom-right-radius: 0; border-bottom-left-radius: 0">
              <img
                :src="BLOG_MEDIA_ENDPOINT + blog.image_fe?.picture"
                alt="home1"
                class="w-full h-full rounded-tr-xl rounded-tl-xl object-cover"
              />
            </div>
            <div class="p-3 card-content">
              <h3 class="line-clamp-1 card-title">
                {{
                  blog.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                  blog.translations[0].name
                }}
              </h3>
              <p @click.stop="viewLocation(blog)" class="card-address mt-1 mb-2" v-if="blog.translations.find((t) => t.language.code == locale.toUpperCase())?.address">
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
import { useI18n } from 'vue-i18n'
import { ACTIVITY_MEDIA_ENDPOINT, BLOG_MEDIA_ENDPOINT } from '@/Constants/endpoint'

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

const viewLocation = (blog_related) => {
  if(blog_related.location_id) router.visit(`/diem-den/${blog_related.location?.slug}`)
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

.card-description {
  flex: 1; /* Phần mô tả sẽ co giãn để điều chỉnh chiều cao */
  overflow: hidden;
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
    rgba(0, 0, 0, 0.4),
    rgba(0, 0, 0, 0.1)
  );
}
</style>
