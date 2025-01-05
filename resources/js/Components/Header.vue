<template>
  <div class="header position-relative">
    <div class="overlay"></div>
    <div class="container pt-5 position absolute top-0 left-0 right-0 d-flex flex-column">
      <div class="d-flex align-items-center gap-3 justify-end">
        <div class="p-2 bg-green-600 text-white rounded-xl">HOTLINE: +84 1234 5678</div>
        <div class="p-2 text-white hover:bg-green-600 hover:rounded-[10px]">Đăng ký / Đăng nhập</div>
      </div>
      <nav class="d-flex justify-between align-items-center flex-wrap pe-2 mt-3">
        <div class="d-flex align-items-center gap-3">
          <a class="" href="#">
            <img src="@/Assets/images/logo.png" width="400px" alt="logo" />
          </a>
          <button
            @click.prevent="showMenu = !showMenu"
            style="background-color: rgb(22 163 74 / var(--tw-bg-opacity, 1))"
            class="btn d-lg-none hidden"
          >
            <i class="fas fa-bars text-white"></i>
          </button>
        </div>
        <div v-if="showMenu" class="bg-green-600 py-3 lg:hidden flex-1 lg:mt-0 mt-4">
          <ul class="flex mb-0 lg:flex-row flex-col gap-4 justify-end">
            <li class="">
              <Link href="/">Trang chủ</Link>
            </li>
            <li>
              <Link href="/about">Về chúng tôi</Link>
            </li>
            <li>
              <Link href="/services">Dịch vụ</Link>
            </li>
            <li>
              <Link href="/promo">Ưu đãi</Link>
            </li>
            <li>
              <Link href="/booking/step1">Đặt vé</Link>
            </li>
          </ul>
        </div>
        <div class="py-3">
          <ul class="mb-0 lg:flex hidden gap-4 justify-end">
            <li :class="[checkRoute('/')]">
              <Link href="/">Trang chủ</Link>
            </li>
            <li :class="[checkRoute('/about')]">
              <Link :class="[checkRoute('/about')]" href="/about">Về chúng tôi</Link>
            </li>
            <li :class="[checkRoute('/services')]">
              <Link href="/services">Dịch vụ</Link>
            </li>
            <li :class="[checkRoute('/promo')]">
              <Link href="/promo">Ưu đãi</Link>
            </li>
            <li :class="[checkRoute('/booking/step1')]">
              <Link href="/booking/step1">Đặt vé</Link>
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
                <i class="fas fa-map-marker-alt text-green-600 text-2xl"></i>
                <select class="border-none">
                  <option value="1">Chọn địa điểm</option>
                  <option value="2">Hồ Chí Minh</option>
                  <option value="3">Đà Nẵng</option>
                  <option value="4">Hải Phòng</option>
                </select>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <!-- Chọn ngày -->
              <div class="flex items-center">
                <i class="far fa-calendar-alt text-green-600 text-2xl"></i>
                <input type="date" class="border-none" />
              </div>
            </div>
            <div class="col-md-3 col-6">
              <!-- Số lượng người -->
              <div class="flex items-center">
                <i class="fas fa-user-friends text-green-600 text-2xl"></i>
                <button class="border-none">
                  <i class="fas fa-minus text-green-600"></i>
                </button>
                <input type="text" class="border-none w-[30px]" value="1" />
                <button class="border-none">
                  <i class="fas fa-plus text-green-600"></i>
                </button>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <button class="bg-green-600 text-white px-4 py-2 rounded-xl md:w-[200px] w-full md:float-end">
                Tìm kiếm
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'
const showMenu = ref(false)

const checkRoute = (route) => {
  return window.location.pathname === route ? 'active' : ''
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

li a:hover {
  color: #f1f1f1;
}
</style>
