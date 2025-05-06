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
          <h1 class="mb-0" style="line-height: 1">
            <span class="text-bold text-[150px]">
              {{ new Date().getFullYear() - 1976 }}
            </span>
            <span class="text-[65px]">{{ $t('year') }}</span>
          </h1>
          <div v-if="props.homePage && props.homePage.translations" v-html="
            props.homePage.translations.find(t => t.language.code === locale.toUpperCase())?.content ||
            props.homePage.translations[0]?.content
          ">
          </div>
          <h3 v-else>{{ $t('sustainable_development') }}</h3>
          <p class="font-bold">1976-{{ new Date().getFullYear() }}</p>
        </div>
        <div id="about2" class="col-lg-6">
          <p class="text-justify mt-[60px] font-normal">
            {{ $t('company_description') }}
          </p>
        </div>
      </div>

      <div id="business" class="pt-5">
        <h1 class="mx-auto text-center mb-4 uppercase font-bold text-[32px]">{{ $t('business_field') }}</h1>
        <div class="row g-3">
          <div class="col-lg-5 mb-md-4">
            <div @click.prevent="router.visit('/diem-den')" class="position-relative h-100 hover:cursor-pointer">
              <div class="img-container h-100">
                <img
                  :src="props.menuImages && props.menuImages['diem-den'] && props.menuImages['diem-den'][0]
                    ? `/public/uploads/menus/${props.menuImages['diem-den'][0].picture}`
                    : '@/Assets/images/home1.jpg'"
                  alt="home1"
                  class="w-full rounded-xl h-100 object-cover" />
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
            <div class="row g-3">
              <div @click.prevent="router.visit('/hoat-dong')" class="col-lg-6">
                <div class="position-relative h-100 hover:cursor-pointer">
                  <div class="img-container h-100">
                    <img
                      :src="props.menuImages && props.menuImages['hoat-dong'] && props.menuImages['hoat-dong'][0]
                        ? `/public/uploads/menus/${props.menuImages['hoat-dong'][0].picture}`
                        : '@/Assets/images/home2.jpg'"
                      alt="home1"
                      class="w-full rounded-xl h-100" />
                  </div>
                  <div id="img-content" class="position-absolute bottom-0 left-0 right-0 overlay ps-3 rounded-xl">
                    <h2 class="text-white mb-0">{{ $t('section_activities') }}</h2>
                    <p class="text-white">
                      {{ props.menus.find((m) => m.slug == 'hoat-dong').blogs.length }} {{ $t('section_activities') }}
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div @click.prevent="router.visit('/nha-hang')" class="position-relative h-100 hover:cursor-pointer">
                  <div class="img-container h-100">
                    <img
                      :src="props.menuImages && props.menuImages['nha-hang'] && props.menuImages['nha-hang'][0]
                        ? `/public/uploads/menus/${props.menuImages['nha-hang'][0].picture}`
                        : '@/Assets/images/home3.jpg'"
                      alt="home1"
                      class="w-full rounded-xl h-100" />
                  </div>
                  <div id="img-content" class="position-absolute bottom-0 left-0 right-0 overlay ps-3 rounded-xl">
                    <h2 class="text-white mb-0">{{ $t('section_restaurants') }}</h2>
                    <p class="text-white">
                      {{ props.menus.find((m) => m.slug == 'nha-hang').blogs.length }} {{ $t('section_restaurants') }}
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-md-4">
                <div @click.prevent="router.visit('/luu-tru')" class="position-relative h-100 hover:cursor-pointer">
                  <div class="img-container h-100">
                    <img
                      :src="props.menuImages && props.menuImages['luu-tru'] && props.menuImages['luu-tru'][0]
                        ? `/public/uploads/menus/${props.menuImages['luu-tru'][0].picture}`
                        : '@/Assets/images/home4.jpg'"
                      alt="home1"
                      class="w-full rounded-xl h-100" />
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
                <div @click.prevent="router.visit('/khac')" class="position-relative h-100 hover:cursor-pointer">
                  <div class="img-container h-100">
                    <img
                      :src="props.menuImages && props.menuImages['khac'] && props.menuImages['khac'][0]
                        ? `/public/uploads/menus/${props.menuImages['khac'][0].picture}`
                        : '@/Assets/images/home5.jpg'"
                      alt="home1"
                      class="w-full rounded-xl h-100" />
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
      <div class="relative">
        <!-- Hình ảnh bản đồ nền -->
        <img src="@/Assets/images/map.png" alt="Map" class="w-full rounded-xl" />

        <!-- Các địa điểm và title -->
        <div class="nicedreamht cursor-pointer" @click="openLink('https://web-nicedreamhotel.vt360.vn/?skip-loading')">
          <img src="@/Assets/images/nice_dream_hotel.png" alt="Nice Dream Hotel" />
          <img src="@/Assets/images/nicedream_hotel_title.png" alt="Nice Dream Hotel Title" />
        </div>

        <div class="langbiang cursor-pointer" @click="openLink('https://web-langbiang.vt360.vn/?skip-loading')">
          <img src="@/Assets/images/langbiang.png" alt="Langbiang" />
          <img src="@/Assets/images/langbiang_title.png" alt="Langbiang Title" />
        </div>

        <div class="nicedreamvl cursor-pointer" @click="openLink('https://web-nicedreamvilla.vt360.vn/?skip-loading')">
          <img src="@/Assets/images/nicedream_villa.png" alt="Nice Dream Villa" />
          <img src="@/Assets/images/nicedream_villa_title.png" alt="Nice Dream Villa Title" />
        </div>

        <div class="datanla cursor-pointer" @click="openLink('https://web-datanla.vt360.vn/?skip-loading')">
          <img src="@/Assets/images/datanla.png" alt="Datanla" />
          <img src="@/Assets/images/datanla_title.png" alt="Datanla Title" />
        </div>

        <div class="captreo cursor-pointer" @click="openLink('https://kdlcaptreodalat.vt360.vn/')">
          <img src="@/Assets/images/cap_treo.png" alt="Cap Treo" />
          <img src="@/Assets/images/cap_treo_title.png" alt="Cap Treo Title" />
        </div>

        <div class="thuy_ta cursor-pointer">
          <img src="@/Assets/images/thuy_ta.png" alt="Thuy Ta" />
          <img src="@/Assets/images/thuy_ta_title.png" alt="Thuy Ta Title" />
        </div>

        <div class="leguda cursor-pointer">
          <img src="@/Assets/images/leguda.png" alt="Leguda" />
          <img src="@/Assets/images/leguda_title.png" alt="Leguda Title" />
        </div>
      </div>
    </div>
  </MainLayout>
</template>
<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import { onMounted } from 'vue'
import { router, Head } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'

const props = defineProps({
  menus: Object,
  menuImages: Object,
  homePage: Object
})

const { t, locale } = useI18n()

const openLink = (url) => {
  window.open(url, '_blank')
}

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

/* Định vị các địa điểm */
.nicedreamht,
.langbiang,
.nicedreamvl,
.datanla,
.captreo,
.thuy_ta,
.leguda {
  position: absolute;
  transition: transform 0.3s ease;
}

.nicedreamht:hover,
.langbiang:hover,
.nicedreamvl:hover,
.datanla:hover,
.captreo:hover,
.thuy_ta:hover,
.leguda:hover {
  transform: scale(1.1);
  z-index: 100;
}

/* Vị trí cụ thể cho từng địa điểm */
.nicedreamht {
  top: 32%;
  left: 18%;
  width: 15%;
}

.langbiang {
  top: 20%;
  left: 40%;
  width: 15%;
}

.nicedreamvl {
  top: 30%;
  right: 15%;
  width: 15%;
}

.datanla {
  bottom: 10%;
  right: 5%;
  width: 15%;
}

.captreo {
  top: 55%;
  right: 10%;
  width: 15%;
}

.thuy_ta {
  bottom: 28%;
  left: 25%;
  width: 15%;
}

.leguda {
  top: 50%;
  right: 25%;
  width: 15%;
}

/* Định dạng cho các hình ảnh trong địa điểm */
.cursor-pointer {
  cursor: pointer;
}

.cursor-pointer img {
  width: 100%;
  height: auto;
}

.cursor-pointer img:nth-child(2) {
  position: absolute;
  top: -30px;
  left: 0;
  width: 100%;
}

@media screen and (max-width: 768px) {
  .cursor-pointer img:nth-child(2) {
    position: absolute;
    top: -10px;
    left: 0;
    width: 100%;
  }
}
</style>
