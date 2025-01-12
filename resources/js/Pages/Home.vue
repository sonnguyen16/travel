<template>
  <MainLayout>
    <div class="container">
      <div class="row pt-[100px]">
        <div id="about1" class="col-lg-6 flex items-center flex-col">
          <h3 class="mb-0" style="line-height: 1"><span class="text-bold text-[150px]">49</span> Năm</h3>
          <h3>Phát triển bền vững</h3>
          <p class="font-bold">1976-2025</p>
        </div>
        <div id="about2" class="col-lg-6">
          <p class="text-justify mt-[60px] font-normal">
            Công Ty Cổ phần du lịch Lâm Đồng – Dalattourist® là công ty du lịch – dịch vụ – lữ hành lâu đời nhất tại Đà
            Lạt, được thành lập từ năm 1976, Dalattourist® tiên phong cung cấp những dịch vụ du lịch gắn liền với thiên
            nhiên, văn hóa và bản sắc Đà Lạt.
          </p>
        </div>
      </div>

      <div id="business" class="pt-5">
        <h1 class="mx-auto text-center mb-4">Lĩnh vực kinh doanh</h1>
        <div class="row">
          <div class="col-lg-5 mb-4">
            <div class="position-relative h-100">
              <div class="img-container h-100">
                <img src="@/Assets/images/home1.jpg" alt="home1" class="w-full rounded-xl h-100 object-cover" />
              </div>
              <div id="img-content" class="position-absolute bottom-0 left-0 right-0 overlay ps-3 rounded-xl">
                <h2 class="text-white mb-0">Điểm đến</h2>
                <p class="text-white">3 điểm đến</p>
              </div>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="row">
              <div class="col-lg-6 mb-4">
                <div class="position-relative h-100">
                  <div class="img-container h-100">
                    <img src="@/Assets/images/home2.jpg" alt="home1" class="w-full rounded-xl h-100" />
                  </div>
                  <div id="img-content" class="position-absolute bottom-0 left-0 right-0 overlay ps-3 rounded-xl">
                    <h2 class="text-white mb-0">Điểm đến</h2>
                    <p class="text-white">3 điểm đến</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="position-relative h-100">
                  <div class="img-container h-100">
                    <img src="@/Assets/images/home3.jpg" alt="home1" class="w-full rounded-xl h-100" />
                  </div>
                  <div id="img-content" class="position-absolute bottom-0 left-0 right-0 overlay ps-3 rounded-xl">
                    <h2 class="text-white mb-0">Điểm đến</h2>
                    <p class="text-white">3 điểm đến</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="position-relative h-100">
                  <div class="img-container h-100">
                    <img src="@/Assets/images/home4.jpg" alt="home1" class="w-full rounded-xl h-100" />
                  </div>
                  <div id="img-content" class="position-absolute bottom-0 left-0 right-0 overlay ps-3 rounded-xl">
                    <h2 class="text-white mb-0">Điểm đến</h2>
                    <p class="text-white">3 điểm đến</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="position-relative h-100">
                  <div class="img-container h-100">
                    <img src="@/Assets/images/home5.jpg" alt="home1" class="w-full rounded-xl h-100" />
                  </div>
                  <div class="position-absolute bottom-0 left-0 right-0 overlay ps-3 rounded-xl">
                    <h2 class="text-white mb-0">Điểm đến</h2>
                    <p class="text-white">3 điểm đến</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <img src="@/Assets/images/site_map.png" alt="home6" class="w-full mt-5 rounded-xl" />
    </div>
  </MainLayout>
</template>
<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import ScrollReveal from 'scrollreveal'
import { onMounted } from 'vue'

onMounted(() => {
  // Hiệu ứng cho phần "49 Năm Phát triển bền vững"
  ScrollReveal().reveal('#about1', {
    duration: 2000,
    origin: 'left',
    distance: '200px',
    easing: 'ease-in-out'
  })

  ScrollReveal().reveal('#about2', {
    duration: 2000,
    origin: 'right',
    distance: '200px',
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
    duration: 800,
    origin: 'bottom',
    distance: '30px',
    interval: 200, // Thời gian giữa các mục
    easing: 'ease-in-out'
  })

  // Hiệu ứng cho từng hình ảnh
  ScrollReveal().reveal('#img-content', {
    duration: 800,
    origin: 'bottom',
    distance: '30px',
    interval: 200, // Thời gian giữa các mục
    easing: 'ease-in-out'
  })

  // Hiệu ứng cho hình ảnh cuối trang
  ScrollReveal().reveal('img.w-full.mt-5', {
    duration: 2000,
    origin: 'bottom',
    distance: '50px',
    easing: 'ease-in-out',
    interval: 4000
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
</style>
