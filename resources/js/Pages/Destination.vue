<template>
  <MainLayout>
    <div class="container">
      <div id="service-4" class="pt-[100px] pb-[50px]">
        <h1 class="text-center mb-3">Điểm đến du lịch</h1>
        <div class="swiper swiper-2">
          <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide">
              <div @click.prevent="router.visit('/services/detail')" class="rounded-xl shadow-xl bg-white">
                <div class="img-container h-[400px]">
                  <img
                    src="@/Assets/images/service6.jpg"
                    alt="home1"
                    class="w-full rounded-tr-xl rounded-tl-xl object-cover"
                  />
                </div>
                <div class="p-3">
                  <h3>Khu du lịch Dalanta</h3>
                  <!-- Address -->
                  <p><i class="fas fa-map-marker-alt"></i> Địa chỉ: huyện Di Linh, tỉnh Lâm Đồng</p>
                  <p class="font-normal text-justify">
                    Nice Dream hotel tên cũ là khách sạn Hải Sơn, tọa lạc nằm ở số 1 Nguyễn Thị Minh Khai, Phường 1, Đà
                    Lạt, ngay trung tâm của thành phố với tầm nhìn tuyệt đẹp hướng ra Chợ Đà Lạt và hồ Xuân Hương.
                  </p>
                </div>
              </div>
            </div>
            <!-- Slide 2 -->
            <div class="swiper-slide">
              <div @click.prevent="router.visit('/services/detail')" class="rounded-xl shadow-xl bg-white">
                <div class="img-container h-[400px]">
                  <img
                    src="@/Assets/images/service7.jpg"
                    alt="home1"
                    class="w-full rounded-tr-xl rounded-tl-xl object-cover"
                  />
                </div>
                <div class="p-3">
                  <h3>Khu du lịch Dalanta</h3>
                  <!-- Address -->
                  <p><i class="fas fa-map-marker-alt"></i> Địa chỉ: huyện Di Linh, tỉnh Lâm Đồng</p>
                  <p class="font-normal text-justify">
                    Nice Dream hotel tên cũ là khách sạn Hải Sơn, tọa lạc nằm ở số 1 Nguyễn Thị Minh Khai, Phường 1, Đà
                    Lạt, ngay trung tâm của thành phố với tầm nhìn tuyệt đẹp hướng ra Chợ Đà Lạt và hồ Xuân Hương.
                  </p>
                </div>
              </div>
            </div>
            <!-- Slide 3 -->
            <div class="swiper-slide">
              <div @click.prevent="router.visit('/services/detail')" class="rounded-xl shadow-xl bg-white">
                <div class="img-container h-[400px]">
                  <img
                    src="@/Assets/images/service8.jpg"
                    alt="home1"
                    class="w-full rounded-tr-xl rounded-tl-xl object-cover"
                  />
                </div>
                <div class="p-3">
                  <h3>Khu du lịch Dalanta</h3>
                  <!-- Address -->
                  <p><i class="fas fa-map-marker-alt"></i> Địa chỉ: huyện Di Linh, tỉnh Lâm Đồng</p>
                  <p class="font-normal text-justify">
                    Nice Dream hotel tên cũ là khách sạn Hải Sơn, tọa lạc nằm ở số 1 Nguyễn Thị Minh Khai, Phường 1, Đà
                    Lạt, ngay trung tâm của thành phố với tầm nhìn tuyệt đẹp hướng ra Chợ Đà Lạt và hồ Xuân Hương.
                  </p>
                </div>
              </div>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide">
              <div @click.prevent="router.visit('/services/detail')" class="rounded-xl shadow-xl bg-white">
                <div class="img-container h-[400px]">
                  <img
                    src="@/Assets/images/service7.jpg"
                    alt="home1"
                    class="w-full rounded-tr-xl rounded-tl-xl object-cover"
                  />
                </div>
                <div class="p-3">
                  <h3>Khu du lịch Dalanta</h3>
                  <!-- Address -->
                  <p><i class="fas fa-map-marker-alt"></i> Địa chỉ: huyện Di Linh, tỉnh Lâm Đồng</p>
                  <p class="font-normal text-justify">
                    Nice Dream hotel tên cũ là khách sạn Hải Sơn, tọa lạc nằm ở số 1 Nguyễn Thị Minh Khai, Phường 1, Đà
                    Lạt, ngay trung tâm của thành phố với tầm nhìn tuyệt đẹp hướng ra Chợ Đà Lạt và hồ Xuân Hương.
                  </p>
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
  new Swiper('.swiper-2', {
    loop: true,
    fadeEffect: { crossFade: true },
    speed: 1000,
    spaceBetween: 20,
    fadeEffect: { crossFade: true },
    speed: 1000,
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

  // ScrollReveal - Hiệu ứng cho Swiper
  ScrollReveal().reveal('#service-4', {
    duration: 2000,
    origin: 'bottom',
    distance: '100px',
    easing: 'ease-in-out',
    interval: 5000
  })
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

.swiper-slide {
  height: 700px;
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
</style>
