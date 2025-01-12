<template>
  <MainLayout>
    <div class="container">
      <div id="promo-1" class="pt-[100px]">
        <div class="swiper swiper-1">
          <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide slide-1">
              <div
                @click.prevent="router.visit('/promo/detail')"
                class="rounded-xl shadow-xl bg-white position-relative h-100"
              >
                <div class="img-container h-100">
                  <img src="@/Assets/images/promo1.jpg" alt="home1" class="w-full rounded-xl object-cover h-[500px]" />
                </div>
                <div class="p-3 position-absolute bottom-0 rounded-xl left-0 right-0 overlay1 h-[150px]">
                  <h3 class="text-white mt-5">HRC KHUYẾN MÃI TƯNG BỪNG</h3>
                </div>
              </div>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide slide-1">
              <div
                @click.prevent="router.visit('/promo/detail')"
                class="rounded-xl shadow-xl bg-white position-relative h-100"
              >
                <div class="img-container h-100">
                  <img src="@/Assets/images/promo2.jpg" alt="home1" class="w-full rounded-xl object-cover h-[500px]" />
                </div>
                <div class="p-3 position-absolute bottom-0 rounded-xl left-0 right-0 overlay1 h-[150px]">
                  <h3 class="text-white mt-5">HRC KHUYẾN MÃI TƯNG BỪNG</h3>
                </div>
              </div>
            </div>

            <!-- Slide 3 -->
            <div class="swiper-slide slide-1">
              <div
                @click.prevent="router.visit('/promo/detail')"
                class="rounded-xl shadow-xl bg-white position-relative h-100"
              >
                <div class="img-container h-100">
                  <img src="@/Assets/images/promo3.jpg" alt="home1" class="w-full rounded-xl object-cover h-[500px]" />
                </div>
                <div class="p-3 position-absolute bottom-0 rounded-xl left-0 right-0 overlay1 h-[150px]">
                  <h3 class="text-white mt-5">HRC KHUYẾN MÃI TƯNG BỪNG</h3>
                </div>
              </div>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide slide-1">
              <div
                @click.prevent="router.visit('/promo/detail')"
                class="rounded-xl shadow-xl bg-white position-relative h-100"
              >
                <div class="img-container h-100">
                  <img src="@/Assets/images/promo2.jpg" alt="home1" class="w-full rounded-xl object-cover h-[500px]" />
                </div>
                <div class="p-3 position-absolute bottom-0 rounded-xl left-0 right-0 overlay1 h-[150px]">
                  <h3 class="text-white mt-5">HRC KHUYẾN MÃI TƯNG BỪNG</h3>
                </div>
              </div>
            </div>
          </div>

          <!-- Navigation -->
          <div class="swiper-button-next swiper-next-1"></div>
          <div class="swiper-button-prev swiper-prev-1"></div>
        </div>
      </div>
    </div>
    <div class="w-full py-[200px] bg_promo mt-5">
      <div class="container">
        <h2 class="text-white text-center">Đăng ký nhận ưu đãi ngay!</h2>
      </div>
    </div>
    <div class="container">
      <div id="promo-2" class="pt-[100px] pb-[50px]">
        <div class="swiper swiper-2">
          <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide">
              <div @click.prevent="router.visit('/promo/detail')" class="rounded-xl shadow-xl bg-white">
                <div class="img-container h-[200px]">
                  <img
                    src="@/Assets/images/promo5.jpg"
                    alt="home1"
                    class="w-full rounded-tr-xl rounded-tl-xl object-cover h-[200px]"
                  />
                </div>
                <div class="p-3 grid grid-cols-3">
                  <div class="col-span-2">
                    <h5>Xe trượt thác - Khứ hồi 1</h5>
                    <p class="font-normal text-justify">
                      <i class="fas fa-star text-yellow-400"></i>
                      4.5
                    </p>
                  </div>
                  <div class="rounded-xl bg-green-600 p-2 h-[40px] col-span-1">
                    <p class="text-white text-center">200.000đ</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- Slide 2 -->
            <div class="swiper-slide">
              <div @click.prevent="router.visit('/promo/detail')" class="rounded-xl shadow-xl bg-white">
                <div class="img-container h-[200px]">
                  <img
                    src="@/Assets/images/promo6.jpg"
                    alt="home1"
                    class="w-full rounded-tr-xl rounded-tl-xl object-cover h-[200px]"
                  />
                </div>
                <div class="p-3 grid grid-cols-3">
                  <div class="col-span-2">
                    <h5>Xe trượt thác - Khứ hồi 1</h5>
                    <p class="font-normal text-justify">
                      <i class="fas fa-star text-yellow-400"></i>
                      4.5
                    </p>
                  </div>
                  <div class="rounded-xl bg-green-600 p-2 h-[40px] col-span-1">
                    <p class="text-white text-center">200.000đ</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- Slide 3 -->
            <div class="swiper-slide">
              <div @click.prevent="router.visit('/promo/detail')" class="rounded-xl shadow-xl bg-white">
                <div class="img-container h-[200px]">
                  <img
                    src="@/Assets/images/promo7.jpg"
                    alt="home1"
                    class="w-full rounded-tr-xl rounded-tl-xl object-cover h-[200px]"
                  />
                </div>
                <div class="p-3 grid grid-cols-3">
                  <div class="col-span-2">
                    <h5>Xe trượt thác - Khứ hồi 1</h5>
                    <p class="font-normal text-justify">
                      <i class="fas fa-star text-yellow-400"></i>
                      4.5
                    </p>
                  </div>
                  <div class="rounded-xl bg-green-600 p-2 h-[40px] col-span-1">
                    <p class="text-white text-center">200.000đ</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div @click.prevent="router.visit('/promo/detail')" class="rounded-xl shadow-xl bg-white">
                <div class="img-container h-[200px]">
                  <img
                    src="@/Assets/images/promo6.jpg"
                    alt="home1"
                    class="w-full rounded-tr-xl rounded-tl-xl object-cover h-[200px]"
                  />
                </div>
                <div class="p-3 grid grid-cols-3">
                  <div class="col-span-2">
                    <h5>Xe trượt thác - Khứ hồi 1</h5>
                    <p class="font-normal text-justify">
                      <i class="fas fa-star text-yellow-400"></i>
                      4.5
                    </p>
                  </div>
                  <div class="rounded-xl bg-green-600 p-2 h-[40px] col-span-1">
                    <p class="text-white text-center">200.000đ</p>
                  </div>
                </div>
              </div>
            </div>
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
import { router } from '@inertiajs/vue3'
import { onMounted, ref } from 'vue'
import Swiper from 'swiper/bundle'
import 'swiper/css/bundle'
import ScrollReveal from 'scrollreveal'

onMounted(() => {
  new Swiper('.swiper-1', {
    loop: true,
    spaceBetween: 20, // Khoảng cách giữa các item
    navigation: {
      nextEl: '.swiper-next-1',
      prevEl: '.swiper-prev-1'
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
    }
  })

  new Swiper('.swiper-2', {
    loop: true,
    spaceBetween: 20, // Khoảng cách giữa các item
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
    }
  })

  // ScrollReveal - Hiệu ứng cho Timeline
  ScrollReveal().reveal('#promo-1', {
    duration: 1500,
    origin: 'top',
    distance: '50px',
    easing: 'ease-in-out'
  })

  // ScrollReveal - Hiệu ứng cho Swiper
  ScrollReveal().reveal('#promo-2', {
    duration: 1500,
    origin: 'bottom',
    distance: '50px',
    easing: 'ease-in-out',
    interval: 4000
  })
})
</script>
<style scoped>
.bg_promo {
  background: url('@/Assets/images/promo4.jpeg') no-repeat center center;
}

.overlay1 {
  background: linear-gradient(
    to top,
    rgba(22, 163, 74, 1),
    rgba(22, 163, 74, 1),
    rgba(22, 163, 74, 0.6),
    rgba(255, 255, 255, 0)
  );
}

.slide-1 {
  height: 600px;
}
</style>
