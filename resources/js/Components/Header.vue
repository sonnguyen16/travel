<template>
  <div id="header" class="header position-relative">
    <!-- Slider tự động cho banner trang chủ -->
    <div v-if="$page.url === '/' && bannerImages && bannerImages.length > 0" class="banner-slider hidden md:block">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <div v-for="(image, index) in bannerImages" :key="index" class="swiper-slide">
            <img :src="`/public/uploads/banners/${image.picture}`" alt="Banner" class="w-100 h-100 object-cover" />
          </div>
        </div>
        <!-- Thêm điều hướng và phân trang nếu cần -->
        <div class="swiper-pagination"></div>
      </div>
    </div>
    <div class="overlay"></div>
    <div class="container pt-5 position absolute top-0 left-0 right-0 d-flex flex-column">
      <div class="d-flex align-items-center gap-3 justify-end">
        <div class="p-2 bg-green-600 rounded-xl">
          <a href="tel:84 98 1166 088" class="sm:text-[16px] text-[12px] text-white text-decoration-none">{{
            $t('hotline') + ' +84 98 1166 088'
          }}</a>
        </div>
        <!-- <div class="p-2 hover:bg-green-600 hover:rounded-[10px]">
          <a href="/" class="sm:text-[16px] text-[10px] text-white text-decoration-none">{{ $t('register_login') }}</a>
        </div> -->
        <div>
          <div class="relative inline-block text-left">
            <!-- Dropdown Button -->
            <div
              @click="toggleDropdown"
              class="inline-flex justify-center w-full rounded-md py-2 font-medium text-white focus:outline-none"
              id="menu-button"
              aria-expanded="true"
              aria-haspopup="true"
            >
              <img :src="currentFlag" :key="locale" class="mr-3 w-8" :alt="locale.toUpperCase()" />
              <svg
                class="h-5 w-5"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="#fff"
                aria-hidden="true"
              >
                <path
                  fill-rule="evenodd"
                  d="M5.293 9.707a1 1 0 011.414 0L10 13.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                />
              </svg>
            </div>

            <!-- Dropdown Menu -->
            <div
              v-show="isDropdownOpen"
              @click.away="closeDropdown"
              class="origin-top-right z-[9999] absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
              role="menu"
              style="pointer-events: auto"
              aria-orientation="vertical"
              aria-labelledby="menu-button"
              tabindex="-1"
            >
              <div class="py-1" role="none">
                <a
                  v-for="lang in languages"
                  :key="lang.id"
                  href="#"
                  @click="changeLanguage(lang.code)"
                  class="flex items-center px-4 py-2 text-decoration-none text-sm text-gray-700 hover:bg-gray-100"
                  role="menuitem"
                  tabindex="-1"
                  :aria-label="`Change to ${lang.code}`"
                >
                  <img :src="`/images/${lang.code}.png`" class="mr-3 w-8" :alt="`${lang.code}`" />
                  {{ $t(lang.code) }}
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <nav :class="[isFixed ? 'fixed mt-0' : 'mt-3']">
        <div :class="[isFixed ? 'container' : '', 'd-flex justify-between align-items-center flex-wrap']">
          <div class="d-flex align-items-center lg:w-auto w-full justify-between gap-3">
            <a @click.prevent="router.visit('/')" class="" href="#">
              <img :src="currentLogo" :key="locale" :class="[isFixed ? 'w-[200px] my-3' : 'w-[300px]']" alt="logo" />
            </a>
            <button
              @click.prevent="showMenu = !showMenu"
              style="background-color: rgb(22 163 74 / var(--tw-bg-opacity, 1))"
              class="btn d-lg-none hidden"
            >
              <i class="fas fa-bars text-white"></i>
            </button>
          </div>

          <div class="py-3">
            <ul class="mb-0 lg:flex hidden gap-4 justify-end">
              <li @click="scrollToTopAndNavigate('/')" :class="[checkRoute(['/home'])]">
                <Link href="">{{ $t('home') }}</Link>
              </li>
              <li @click="scrollToTopAndNavigate('/ve-chung-toi')" :class="[checkRoute(['/ve-chung-toi'])]">
                <Link href="">{{ $t('about') }}</Link>
              </li>
              <li
                @click="scrollToTopAndNavigate('/dich-vu')"
                :class="[
                  checkRoute(['/dich-vu', '/nha-hang', '/diem-den', '/khach-san', '/hoat-dong', '/luu-tru', '/khac'])
                ]"
              >
                <Link href="">{{ $t('services') }}</Link>
              </li>
              <li @click="scrollToTopAndNavigate('/uu-dai')" :class="[checkRoute(['/uu-dai'])]">
                <Link href="">{{ $t('promo') }}</Link>
              </li>
              <li @click="scrollToTopAndNavigate('/tin-tuc')" :class="[checkRoute(['/tin-tuc'])]">
                <Link href="">{{ $t('news') }}</Link>
              </li>
              <li @click="scrollToTopAndNavigate('/dat-ve/buoc1')" :class="[checkRoute(['/dat-ve/buoc1'])]">
                <Link href="">{{ $t('booking') }}</Link>
              </li>
              <li @click="scrollToTopAndNavigate('/dat-ve/buoc2')" :class="[checkRoute(['/dat-ve/buoc2'])]">
                <a id="cart" href="#" class="relative">
                  <i class="fas fa-shopping-cart"></i>
                  <span
                    v-if="cart.length"
                    class="bg-red-500 text-white rounded-[50%] w-[20px] h-[20px] text-sm flex justify-center items-center absolute bottom-3 left-3"
                  >
                    {{ cart.reduce((acc, item) => acc + item.num_child + item.num_adult, 0) }}
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div v-if="showMenu" class="bg-green-600 h-[410px] py-3 lg:hidden w-full z-10 lg:mt-0 mt-2">
          <ul class="flex mb-0 lg:flex-row flex-col gap-4 position-absolute justify-end">
            <li @click="scrollToTopAndNavigate('/')">
              <a style="color: white">{{ $t('home') }}</a>
            </li>
            <li @click="scrollToTopAndNavigate('/ve-chung-toi')">
              <a style="color: white">{{ $t('about') }}</a>
            </li>
            <li @click="scrollToTopAndNavigate('/dich-vu')">
              <a style="color: white">{{ $t('services') }}</a>
            </li>
            <li @click="scrollToTopAndNavigate('/uu-dai')">
              <a style="color: white">{{ $t('promo') }}</a>
            </li>
            <li @click="scrollToTopAndNavigate('/tin-tuc')">
              <a style="color: white">{{ $t('news') }}</a>
            </li>
            <li @click="scrollToTopAndNavigate('/dat-ve/buoc1')">
              <a style="color: white">{{ $t('booking') }}</a>
            </li>
            <li @click="scrollToTopAndNavigate('/dat-ve/buoc2')">
              <a style="color: white" class="relative">
                <i class="fas fa-shopping-cart text-white"></i>
                <span
                  v-if="cart.length"
                  class="bg-red-500 text-white rounded-[50%] w-[20px] h-[20px] text-sm flex justify-center items-center absolute bottom-3 left-3"
                >
                  {{ quantity }}
                </span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="container position-absolute bottom-[-50px] start-50 translate-middle-x">
      <div class="w-full mx-auto bg-white px-[20px] py-[20px] border-[1.5px] border-green-600 rounded-xl">
        <form>
          <div class="row">
            <div class="col-md-3 col-12 flex items-center">
              <div class="flex items-center">
                <i class="fas fa-map-marker-alt text-green-600 text-lg"></i>
                <select v-model="form.select" class="border-0 form-control">
                  <!-- Placeholder -->
                  <option class="font-normal" value="" disabled hidden>{{ t('select_destination') }}</option>
                  <!-- Sử dụng sortedLocations thay vì locations -->
                  <template v-for="location in sortedLocations" :key="location.id">
                    <option v-if="location.active == 1" class="font-normal" :value="location.id">
                      {{
                        isClient
                          ? location.translations.find((t) => t.language.code === locale.toUpperCase())?.name ||
                            location.translations[0].name
                          : location.translations[0].name
                      }}
                    </option>
                  </template>
                </select>
              </div>
            </div>
            <div class="col-md-2 col-12 flex items-center lg:justify-center">
              <div class="flex items-center gap-2">
                <i class="far fa-calendar-alt text-green-600 text-lg"></i>
                <div class="flex flex-col">
                  <label class="font-normal mb-0 ms-[15px]">{{ $t('select_date') }}</label>
                  <div>
                    <input type="date" class="border-0 lg:w-[100%] w-[80%] py-0 font-normal" v-model="form.date" />
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-6 flex items-center lg:justify-center">
              <!-- Số lượng người -->
              <div class="flex items-center gap-2">
                <i class="fas fa-person text-green-600 text-xl"></i>
                <div class="flex flex-col items-center">
                  <label class="font-normal mb-0" for="num_adult">{{ $t('adults') }}</label>
                  <div>
                    <button @click.prevent="decreaseAdult" class="border-none">
                      <i class="fas fa-minus text-green-600 text-[12px]"></i>
                    </button>
                    <input
                      type="text"
                      class="border-none w-[50px] py-0 font-normal text-sm text-center"
                      v-model="form.num_adult"
                    />
                    <button @click.prevent="incrementAdult" class="border-none">
                      <i class="fas fa-plus text-green-600 text-[12px]"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-6 flex items-center lg:justify-center">
              <!-- Số lượng người -->
              <div v-if="form.select != 4" class="flex items-center gap-2">
                <i class="fas fa-child text-green-600 text-xl"></i>
                <div class="flex flex-col items-center">
                  <label class="font-normal mb-0" for="num_adult">{{ $t('children') }}</label>
                  <div>
                    <button @click.prevent="decreaseChild" class="border-none">
                      <i class="fas fa-minus text-green-600 text-[12px]"></i>
                    </button>
                    <input
                      type="text"
                      class="border-none w-[50px] py-0 font-normal text-sm text-center"
                      v-model="form.num_child"
                    />
                    <button @click.prevent="incrementChild" class="border-none">
                      <i class="fas fa-plus text-green-600 text-[12px]"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-12 flex lg:items-center">
              <button
                @click.prevent="
                  router.visit(
                    `/dat-ve/buoc1?select=${form.select}&num_adult=${form.num_adult}&num_child=${form.num_child}&date=${form.date}`
                  )
                "
                class="bg-green-600 text-white px-4 py-2 rounded-xl w-[100%] mt-lg-0 mt-2"
              >
                {{ $t('search') }}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div
    @click="scrollToTopAndNavigate('/dat-ve/buoc2')"
    class="fixed bottom-5 right-5 hover:cursor-pointer md:hidden bg-green-600 w-[40px] h-[40px] rounded-circle z-[9999] flex justify-center items-center"
  >
    <div class="relative">
      <a style="color: white">
        <i class="fas fa-shopping-cart text-white text-[16px]"></i>
        <span
          v-if="cart.length"
          class="bg-red-500 text-white rounded-[50%] w-[25px] h-[25px] text-sm flex justify-center items-center absolute bottom-3 left-4"
        >
          {{ quantity }}
        </span>
      </a>
    </div>
  </div>

  <!-- Nút liên hệ Zalo OA -->
  <div
    @click="openZaloChat"
    class="fixed bottom-5 md:right-5 right-[70px] hover:cursor-pointer bg-blue-500 w-[40px] h-[40px] md:w-[60px] md:h-[60px] rounded-circle z-[9999] flex justify-center items-center"
  >
    <div>
      <img src="/images/icon-zalo.jpg" alt="zalo" class="w-[40px] h-[40px] md:w-[60px] md:h-[60px]" />
    </div>
  </div>
</template>
<script setup>
import { computed, onMounted, onUnmounted, ref, watch, nextTick } from 'vue'
import { Link, useForm, usePage } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'
import emitter from '@/mitt'
import { initializeLocale, changeLocale } from '@/utils/locale.js'
// Import Swiper
import Swiper from 'swiper/bundle'
import 'swiper/css/bundle'

const showMenu = ref(false)
const isFixed = ref(false)
const isDropdownOpen = ref(false)
const isClient = ref(false)
const page = usePage()
const languages = computed(() => page.props.languages)
const locations = computed(() => page.props.locations)
const bannerImages = computed(() => page.props.bannerImages || [])
const { t, locale } = useI18n()
const quantity = computed(() =>
  cart.value.reduce((acc, item) => acc + parseInt(item.num_child) + parseInt(item.num_adult), 0)
)

// Computed properties cho icon và logo với SSR support
const currentFlag = computed(() => {
  const lang = isClient.value ? locale.value.toUpperCase() : 'VI'
  return `/images/${lang}.png`
})

const currentLogo = computed(() => {
  const lang = isClient.value ? locale.value : 'vi'
  if (isFixed.value) {
    return lang === 'vi' ? '/images/logo1.png' : '/images/logoeng1.png'
  } else {
    return lang === 'vi' ? '/images/logo.png' : '/images/logoeng.png'
  }
})

// Khởi tạo ngôn ngữ từ cookie/localStorage ngay khi component được tạo
const initLocale = () => {
  initializeLocale(locale)
}

// Khởi tạo ngôn ngữ ngay lập tức
if (typeof window !== 'undefined') {
  initLocale()
}

let cart = ref([])
const props = defineProps({
  locations: Object,
  products: Object
})

const form = useForm({
  select: '',
  num_child: 0,
  num_adult: 0,
  date: formatDateToYYYYMMDD()
})

function formatDateToYYYYMMDD(date = new Date()) {
  const year = date.getFullYear() // Lấy năm đầy đủ, ví dụ: 2025
  const month = String(date.getMonth() + 1).padStart(2, '0') // Tháng từ 0-11, thêm số 0 nếu cần
  const day = String(date.getDate()).padStart(2, '0') // Thêm số 0 nếu cần

  return `${year}-${month}-${day}`
}

const incrementAdult = () => {
  form.num_adult++
}

const decreaseAdult = () => {
  if (form.num_adult > 0) {
    form.num_adult--
  }
}

const incrementChild = () => {
  form.num_child++
}

const decreaseChild = () => {
  if (form.num_child > 0) {
    form.num_child--
  }
}

onMounted(async () => {
  cart.value = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : []
  emitter.on('cart-updated', updateCart)

  // Đảm bảo ngôn ngữ được đồng bộ (dự phòng)
  initLocale()

  // Đánh dấu là client-side
  isClient.value = true
  await nextTick()

  if (location.pathname == '/') {
    document.getElementById('header').style.height = `92vh`

    // Khởi tạo Swiper cho banner trang chủ nếu có hình ảnh
    if (bannerImages.value && bannerImages.value.length > 0) {
      // Đợi DOM render xong
      setTimeout(() => {
        const swiper = new Swiper('.swiper-container', {
          slidesPerView: 1,
          spaceBetween: 0,
          loop: true,
          autoplay: {
            delay: 3000,
            disableOnInteraction: false
          },
          effect: 'fade',
          fadeEffect: {
            crossFade: true
          },
          speed: 1500, // Tăng thời gian chuyển đổi giữa các slide lên 1.5 giây
          pagination: {
            el: '.swiper-pagination',
            clickable: true
          }
        })
      }, 100)
    }
  } else {
    if (window.innerWidth > 1024) {
      document.getElementById('header').style.height = `33vh`
    }
  }

  window.addEventListener('scroll', () => {
    if (window.scrollY > 100) {
      isFixed.value = true
    } else {
      isFixed.value = false
    }
  })
})

onUnmounted(() => {
  emitter.off('cart-updated', updateCart)
})

// Watch để force re-render khi ngôn ngữ thay đổi trong Header
watch(locale, async () => {
  if (isClient.value) {
    await nextTick()

    // Force re-render dropdown select options
    const selectElement = document.querySelector('select[v-model="form.select"]')
    if (selectElement) {
      selectElement.style.display = 'none'
      selectElement.offsetHeight // trigger reflow
      selectElement.style.display = ''
    }
  }
})

const updateCart = (data) => {
  console.log(data)
  cart.value = data
}

const toggleDropdown = () => {
  isDropdownOpen.value = !isDropdownOpen.value
}

const closeDropdown = () => {
  isDropdownOpen.value = false
}

const changeLanguage = (code) => {
  changeLocale(locale, code)
  closeDropdown()
}

function scrollToTopAndNavigate(url, options = {}) {
  if (window.scrollY > 200) {
    window.scrollTo({ top: 0, behavior: 'smooth' })

    setTimeout(() => {
      router.visit(url, options)
    }, 500)
    return
  }
  router.visit(url, options)
}

const checkRoute = (route) => {
  if (typeof window !== 'undefined') {
    if (window.location.pathname == '/' && route.includes('/home')) {
      return 'active'
    }
    return route.find((item) => window.location.pathname.includes(item)) ? 'active' : ''
  }
  return ''
}

const app_url = import.meta.env.VITE_APP_URL

const openZaloChat = () => {
  // Mở Zalo OA với số điện thoại
  window.open('https://zalo.me/208756278048926276', '_blank')
}
// Thêm mảng thứ tự mong muốn
const locationOrder = ['khu du lịch datanla', 'datanla adventures', 'khu du lịch langbiang', 'khu du lịch cáp treo']

// Tạo computed property để sắp xếp locations với SSR support
const sortedLocations = computed(() => {
  if (!locations.value) return []

  return [...locations.value].sort((a, b) => {
    // Trong SSR, sử dụng translation đầu tiên để tránh lỗi
    const nameA = isClient.value
      ? a.translations.find((t) => t.language.code === locale.value.toUpperCase())?.name || a.translations[0].name
      : a.translations[0].name
    const nameB = isClient.value
      ? b.translations.find((t) => t.language.code === locale.value.toUpperCase())?.name || b.translations[0].name
      : b.translations[0].name

    const indexA = locationOrder.indexOf(nameA.toLowerCase())
    const indexB = locationOrder.indexOf(nameB.toLowerCase())

    // Nếu không tìm thấy trong danh sách, đẩy xuống cuối
    if (indexA === -1) return 1
    if (indexB === -1) return -1

    return indexA - indexB
  })
})
</script>
<style scoped>
/* CSS cho banner slider */
.banner-slider {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 0;
}

/* Tạo lớp overlay gradient cho slider */
.banner-slider::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 35%; /* Chỉ che phần trên của hình ảnh */
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.5) 50%, rgba(0, 0, 0, 0) 100%);
  z-index: 1;
  pointer-events: none; /* Đảm bảo có thể click qua overlay */
}

.swiper-container {
  width: 100%;
  height: 100%;
}

.swiper-slide {
  width: 100%;
  height: 100%;
  overflow: hidden;
}

.swiper-slide img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* Styling cho pagination */
.swiper-pagination {
  bottom: 20px !important;
}

.swiper-pagination-bullet {
  width: 12px;
  height: 12px;
  background: white;
  opacity: 0.7;
}

.swiper-pagination-bullet-active {
  opacity: 1;
  background: #16a34a; /* Màu xanh giống theme */
}
.header {
  background: url('@/Assets/images/bg_home.jpg') no-repeat center center;
  background-size: cover;
}

.active {
  background-color: rgb(22 163 74 / var(--tw-bg-opacity, 1));
  border-radius: 12px;
}

.active > a {
  color: white !important;
}

.active > a i {
  color: white !important;
}

li {
  padding: 4px 8px;
}

li:hover {
  background-color: rgb(22 163 74 / var(--tw-bg-opacity, 1));
  border-radius: 12px;
}

.overlay {
  width: 100%;
  height: 200px;
  background: linear-gradient(
    to bottom,
    rgba(0, 0, 0, 0.9),
    rgba(0, 0, 0, 0.5),
    rgba(0, 0, 0, 0.3),
    rgba(255, 255, 255, 0)
  );
  pointer-events: none;
  z-index: 1;
}

li a {
  text-decoration: none;
  color: white;
  display: block;
  width: 100%;
}

li a i {
  text-decoration: none;
  color: white;
  width: 100%;
}

li:hover a {
  color: #f1f1f1 !important;
}

li:hover a i {
  color: #f1f1f1 !important;
}

nav {
  transition: all 0.3s ease;
  background-color: transparent;
  position: relative;
  width: 100%;
  z-index: 50;
}

nav.fixed {
  position: fixed;
  top: 0;
  left: 0;
  background-color: white;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

nav.fixed a {
  color: #16a34a; /* Màu xanh lá cây */
}

nav.fixed a i {
  color: #16a34a; /* Màu xanh lá cây */
}

nav.fixed li.active a i {
  color: #f1f1f1; /* Màu xanh lá cây */
}

#card:hover {
  color: #fff !important;
}

nav a {
  color: white;
  text-decoration: none;
  transition: color 0.3s ease;
}

[style*='pointer-events: auto;'] {
  pointer-events: auto;
}

@media screen and (max-width: 768px) {
  #header {
    height: 50vh !important;
  }
}
</style>
