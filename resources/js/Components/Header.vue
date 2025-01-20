<template>
  <div class="header position-relative">
    <div class="overlay"></div>
    <div class="container pt-5 position absolute top-0 left-0 right-0 d-flex flex-column">
      <div class="d-flex align-items-center gap-3 justify-end">
        <div class="p-2 bg-green-600 rounded-xl">
          <a class="sm:text-[16px] text-[14px] text-white text-decoration-none">{{ $t('hotline') }}</a>
        </div>
        <div class="p-2 hover:bg-green-600 hover:rounded-[10px]">
          <a class="sm:text-[16px] text-[14px] text-white text-decoration-none">{{ $t('register_login') }}</a>
        </div>
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
              <img :src="`/images/${locale.toUpperCase()}.png`" class="mr-3 w-8" :alt="`${locale.toUpperCase()}`" />
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
      <nav :class="[isFixed ? 'fixed mt-0' : 'mt-3', 'd-flex justify-between align-items-center flex-wrap pe-2']">
        <div class="d-flex align-items-center lg:w-auto w-full justify-between gap-3">
          <a class="" href="#">
            <img
              src="@/Assets/images/logo.png"
              :class="[isFixed ? 'w-[200px] ms-[20px] my-3' : 'w-[400px]']"
              alt="logo"
            />
          </a>
          <button
            @click.prevent="showMenu = !showMenu"
            style="background-color: rgb(22 163 74 / var(--tw-bg-opacity, 1))"
            class="btn d-lg-none hidden"
          >
            <i class="fas fa-bars text-white"></i>
          </button>
        </div>
        <div v-if="showMenu" class="bg-green-600 h-[290px] py-3 lg:hidden w-full z-10 lg:mt-0 mt-2">
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
            <li @click="scrollToTopAndNavigate('/booking/step1')">
              <a style="color: white">{{ $t('booking') }}</a>
            </li>
          </ul>
        </div>
        <div class="py-3">
          <ul class="mb-0 lg:flex hidden gap-4 justify-end">
            <li @click="scrollToTopAndNavigate('/')" :class="[checkRoute('/')]">
              <Link href="">{{ $t('home') }}</Link>
            </li>
            <li @click="scrollToTopAndNavigate('/ve-chung-toi')" :class="[checkRoute('/ve-chung-toi')]">
              <Link href="">{{ $t('about') }}</Link>
            </li>
            <li @click="scrollToTopAndNavigate('/dich-vu')" :class="[checkRoute('/dich-vu')]">
              <Link href="">{{ $t('services') }}</Link>
            </li>
            <li @click="scrollToTopAndNavigate('/uu-dai')" :class="[checkRoute('/uu-dai')]">
              <Link href="">{{ $t('promo') }}</Link>
            </li>
            <li @click="scrollToTopAndNavigate('/booking/step1')" :class="[checkRoute('/booking/step1')]">
              <Link href="">{{ $t('booking') }}</Link>
            </li>
            <li>
              <a id="cart" href="#">
                <i class="fas fa-shopping-cart text-white"></i>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="container position-absolute bottom-[-50px] start-50 translate-middle-x">
      <div class="w-full mx-auto bg-white px-[20px] py-[15px] border-[1.5px] border-green-600 rounded-xl shadow-2xl">
        <form>
          <div class="row">
            <div class="col-md-3 col-6">
              <div class="flex items-center">
                <i class="fas fa-map-marker-alt text-green-600 text-lg md:text-2xl"></i>
                <select class="border-0 form-control">
                  <option class="font-normal" value="1">Hồ Chí Minh</option>
                  <option class="font-normal" value="2">Đà Nẵng</option>
                  <option class="font-normal" value="3">Hải Phòng</option>
                </select>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <!-- Chọn ngày -->
              <div class="flex items-center">
                <i class="far fa-calendar-alt text-green-600 text-lg md:text-2xl"></i>
                <input type="date" class="border-0 form-control" />
              </div>
            </div>
            <div class="col-md-3 col-6">
              <!-- Số lượng người -->
              <div class="flex items-center">
                <i class="fas fa-user-friends text-green-600 text-lg md:text-2xl"></i>
                <button class="border-none">
                  <i class="fas fa-minus text-green-600"></i>
                </button>
                <input type="text" class="border-none w-[30px]" value="1" />
                <button class="border-none">
                  <i class="fas fa-plus text-green-600"></i>
                </button>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <button class="bg-green-600 text-white px-4 py-2 rounded-xl md:w-[200px] w-full md:float-end">
                {{ $t('search') }}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script setup>
import { computed, onMounted, ref } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'

const showMenu = ref(false)
const isFixed = ref(false)
const isDropdownOpen = ref(false)
const page = usePage()
const languages = computed(() => page.props.languages)
const { t, locale } = useI18n()

const toggleDropdown = () => {
  isDropdownOpen.value = !isDropdownOpen.value
}

const closeDropdown = () => {
  isDropdownOpen.value = false
}

const changeLanguage = (code) => {
  locale.value = code.toString().toLowerCase()
  closeDropdown()
}

function scrollToTopAndNavigate(url, options = {}) {
  window.scrollTo({ top: 0, behavior: 'smooth' })

  setTimeout(() => {
    router.visit(url, options)
  }, 600)
}

onMounted(() => {
  window.addEventListener('scroll', () => {
    if (window.scrollY > 100) {
      isFixed.value = true
    } else {
      isFixed.value = false
    }
  })
})

const checkRoute = (route) => {
  if (typeof window !== 'undefined') {
    return window.location.pathname === route ? 'active' : ''
  }
  return ''
}
</script>
<style scoped>
.header {
  background: url('@/Assets/images/bg_home.jpg') no-repeat center center;
  background-size: cover;
  min-height: 85vh;
}

.active {
  background-color: rgb(22 163 74 / var(--tw-bg-opacity, 1));
  border-radius: 12px;
}

.active > a {
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
  height: 130px;
  background: linear-gradient(
    to bottom,
    rgba(0, 0, 0, 0.9),
    rgba(0, 0, 0, 0.5),
    rgba(0, 0, 0, 0.2),
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

li:hover a {
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
  color: #16a34a !important; /* Màu xanh lá cây */
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
</style>
