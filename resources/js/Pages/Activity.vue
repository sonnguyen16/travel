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
          <div @click.prevent="router.visit(`/${menu.slug}/${blog.slug}`)" class="rounded-xl shadow-xl bg-white">
            <div class="img-container h-[350px]" style="border-bottom-right-radius: 0; border-bottom-left-radius: 0">
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
              <div
                class="line-clamp-6"
                v-html="
                  blog.translations.find((t) => t.language.code == locale.toUpperCase())?.content ||
                  blog.translations[0].content
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
</style>
