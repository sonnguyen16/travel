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
      <div class="row pt-[100px]">
        <div id="about1" class="col-lg-6 flex items-center flex-col">
          <h3 class="mb-0" style="line-height: 1"><span class="text-bold text-[150px]">49</span> {{ $t('year') }}</h3>
          <h3>{{ $t('sustainable_development') }}</h3>
          <p class="font-bold">1976-2025</p>
        </div>
        <div id="about2" class="col-lg-6">
          <p class="text-justify mt-[60px] font-normal">
            {{ $t('company_description') }}
          </p>
        </div>
      </div>

      <div id="business" class="pt-5">
        <h1 class="mx-auto text-center mb-4">{{ $t('business_field') }}</h1>
        <div class="row">
          <div class="col-lg-5 mb-4">
            <div @click.prevent="router.visit('/diem-den')" class="position-relative h-100">
              <div class="img-container h-100">
                <img src="@/Assets/images/home1.jpg" alt="home1" class="w-full rounded-xl h-100 object-cover" />
              </div>
              <div id="img-content" class="position-absolute bottom-0 left-0 right-0 overlay ps-3 rounded-xl">
                <h2 class="text-white mb-0">{{ $t('section_destinations') }}</h2>
                <p class="text-white">
                  {{ props.menus.find((m) => m.slug == 'diem-den').blogs.length }} {{ $t('section_destinations') }}
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="row">
              <div @click.prevent="router.visit('/hoat-dong')" class="col-lg-6 mb-4">
                <div class="position-relative h-100">
                  <div class="img-container h-100">
                    <img src="@/Assets/images/home2.jpg" alt="home1" class="w-full rounded-xl h-100" />
                  </div>
                  <div id="img-content" class="position-absolute bottom-0 left-0 right-0 overlay ps-3 rounded-xl">
                    <h2 class="text-white mb-0">{{ $t('section_activities') }}</h2>
                    <p class="text-white">
                      {{ props.menus.find((m) => m.slug == 'hoat-dong').blogs.length }} {{ $t('section_activities') }}
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div @click.prevent="router.visit('/nha-hang')" class="position-relative h-100">
                  <div class="img-container h-100">
                    <img src="@/Assets/images/home3.jpg" alt="home1" class="w-full rounded-xl h-100" />
                  </div>
                  <div id="img-content" class="position-absolute bottom-0 left-0 right-0 overlay ps-3 rounded-xl">
                    <h2 class="text-white mb-0">{{ $t('section_restaurants') }}</h2>
                    <p class="text-white">
                      {{ props.menus.find((m) => m.slug == 'nha-hang').blogs.length }} {{ $t('section_restaurants') }}
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div @click.prevent="router.visit('/luu-tru')" class="position-relative h-100">
                  <div class="img-container h-100">
                    <img src="@/Assets/images/home4.jpg" alt="home1" class="w-full rounded-xl h-100" />
                  </div>
                  <div id="img-content" class="position-absolute bottom-0 left-0 right-0 overlay ps-3 rounded-xl">
                    <h2 class="text-white mb-0">{{ $t('section_accommodation') }}</h2>
                    <p class="text-white">
                      {{ props.menus.find((m) => m.slug == 'luu-tru').blogs.length }} {{ $t('section_accommodation') }}
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div @click.prevent="router.visit('/khac')" class="position-relative h-100">
                  <div class="img-container h-100">
                    <img src="@/Assets/images/home5.jpg" alt="home1" class="w-full rounded-xl h-100" />
                  </div>
                  <div class="position-absolute bottom-0 left-0 right-0 overlay ps-3 rounded-xl">
                    <h2 class="text-white mb-0">{{ $t('section_others') }}</h2>
                    <p class="text-white">
                      {{ props.menus.find((m) => m.slug == 'khac').blogs.length }} {{ $t('section_others') }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <!-- Navigation -->
          </div>
        </div>
      </div>
      <img src="@/Assets/images/site_map.png" alt="home6" class="w-full mt-5 rounded-xl" />
    </div>
  </MainLayout>
</template>
<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import { onMounted } from 'vue'
import { router, Head } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'

const props = defineProps({
  menus: Object
})

const { t, locale } = useI18n()

onMounted(async () => {
  if (typeof window !== 'undefined' && typeof document !== 'undefined') {
    const ScrollReveal = (await import('scrollreveal')).default
    const scrollReveal = ScrollReveal()

    scrollReveal.reveal('#about1', {
      duration: 2000,
      origin: 'bottom',
      distance: '100px',
      easing: 'ease-in-out'
    })

    scrollReveal.reveal('#about2', {
      duration: 2000,
      origin: 'top',
      distance: '100px',
      easing: 'ease-in-out'
    })

    // Hiệu ứng cho phần "Lĩnh vực kinh doanh"
    ScrollReveal().reveal('h1.mx-auto.text-center', {
      duration: 2000,
      origin: 'bottom',
      distance: '50px',
      easing: 'ease-in-out',
      interval: 1000
    })

    // Hiệu ứng cho từng hình ảnh
    ScrollReveal().reveal('.img-container', {
      duration: 1200,
      origin: 'bottom',
      distance: '50px',
      interval: 200, // Thời gian giữa các mục
      easing: 'ease-in-out'
    })

    // Hiệu ứng cho từng hình ảnh
    ScrollReveal().reveal('#img-content', {
      duration: 1200,
      origin: 'bottom',
      distance: '50px',
      interval: 200, // Thời gian giữa các mục
      easing: 'ease-in-out'
    })

    // Hiệu ứng cho hình ảnh cuối trang
    scrollReveal.reveal('img.w-full.mt-5', {
      duration: 2000,
      origin: 'bottom',
      distance: '100px',
      easing: 'ease-in-out'
    })
  }
})

const app_url = import.meta.env.VITE_APP_URL
</script>
<style scoped>
.overlay {
  background: linear-gradient(
    to top,
    rgba(0, 0, 0, 0.9),
    rgba(0, 0, 0, 0.7),
    rgba(0, 0, 0, 0.6),
    rgba(255, 255, 255, 0)
  );
}
</style>
