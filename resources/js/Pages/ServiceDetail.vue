<template>
  <MainLayout>
    <div class="container">
      <div class="lg:pt-[150px] pt-[80px]">
        <div style="box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.3)" class="rounded-xl p-3">
          <div class="row">
            <div class="col-lg-5">
              <div class="position-relative w-full md:h-[260px] h-[250px]">
                <img
                  src="@/Assets/images/servicedetail1.jpg"
                  alt="home1"
                  style="box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.3)"
                  class="w-full rounded-xl object-cover position-absolute lg:top-[-40px]"
                />
              </div>
            </div>
            <div class="col-lg-7 lg:pe-5 lg:pt-3">
              <h4>Khu du lịch Datanla</h4>
              <p class="text-justify font-normal">
                Khu du lịch Thác Datanla là địa điểm du lịch tích hợp nhiều trò chơi cảm giác mạnh duy nhất tại Đà Lạt
                bao gồm: Xe trượt thác với đường trượt dài nhất Đông Nam Á (2400m), Zipline xuyên rừng dài nhất Châu Á
                (1500m), Hành Trình Trên Cao - High Rope Course với hơn 60 trò chơi với các mức độ thử thách khác nhau
                (đu zipline, đi cầu gỗ, đi trên dây, nhảy tarzan,…) và tour Canyoning chinh phục 7 tầng thác vĩ đại,…
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="row pt-5">
        <h2 class="text-center mb-5 text-2xl font-bold">Hoạt động nổi bật</h2>
        <div class="space-y-0 divide-y divide-gray-300">
          <!-- Collapse Item 1 -->
          <div class="border-none">
            <button
              class="w-full flex justify-between items-center px-4 py-3 border-green-600 border rounded-tr-xl rounded-tl-xl bg-gray-100 hover:bg-gray-200 font-semibold"
              data-target="collapse1"
            >
              <span>THAM QUAN THÁC</span>
              <svg
                class="w-5 h-5 transform transition-transform duration-300"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div id="collapse1" class="hidden p-4 bg-gray-50 overflow-hidden transition-all duration-500">
              <img src="@/Assets/images/detail1.jpg" alt="Tham Quan Thác" class="w-full rounded-lg shadow-lg" />
            </div>
          </div>

          <!-- Collapse Item 2 -->
          <div class="border-none">
            <button
              class="w-full flex justify-between items-center px-4 py-3 border-green-600 border rounded-br-xl rounded-bl-xl bg-gray-100 hover:bg-gray-200 font-semibold"
              data-target="collapse2"
            >
              <span>XE TRƯỢT THÁC 1</span>
              <svg
                class="w-5 h-5 transform transition-transform duration-300"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div id="collapse2" class="hidden p-4 bg-gray-50 overflow-hidden transition-all duration-500">
              <img src="@/Assets/images/detail2.jpg" alt="Xe Trượt Thác 1" class="w-full rounded-lg shadow-lg" />
            </div>
          </div>

          <!-- Add more items as needed -->
        </div>
      </div>

      <div class="pt-[50px] lg:pb-[100px] pb-[30px]">
        <h2 class="text-center mb-4">Điểm đến hấp dẫn khác</h2>
        <div class="swiper swiper-2">
          <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide">
              <div class="rounded-xl shadow-xl bg-white">
                <div
                  class="img-container h-[400px]"
                  style="border-bottom-right-radius: 0; border-bottom-left-radius: 0"
                >
                  <img
                    src="@/Assets/images/service6.jpg"
                    alt="home1"
                    class="w-full rounded-tr-xl rounded-tl-xl object-cover"
                  />
                </div>
                <div class="p-3">
                  <p class="font-normal text-justify">
                    Nice Dream hotel tên cũ là khách sạn Hải Sơn, tọa lạc nằm ở số 1 Nguyễn Thị Minh Khai, Phường 1, Đà
                    Lạt, ngay trung tâm của thành phố với tầm nhìn tuyệt đẹp hướng ra Chợ Đà Lạt và hồ Xuân Hương.
                  </p>
                </div>
              </div>
            </div>
            <!-- Slide 2 -->
            <div class="swiper-slide">
              <div class="rounded-xl shadow-xl bg-white">
                <div
                  class="img-container h-[400px]"
                  style="border-bottom-right-radius: 0; border-bottom-left-radius: 0"
                >
                  <img
                    src="@/Assets/images/service7.jpg"
                    alt="home1"
                    class="w-full rounded-tr-xl rounded-tl-xl object-cover"
                  />
                </div>
                <div class="p-3">
                  <p class="font-normal text-justify">
                    Nice Dream hotel tên cũ là khách sạn Hải Sơn, tọa lạc nằm ở số 1 Nguyễn Thị Minh Khai, Phường 1, Đà
                    Lạt, ngay trung tâm của thành phố với tầm nhìn tuyệt đẹp hướng ra Chợ Đà Lạt và hồ Xuân Hương.
                  </p>
                </div>
              </div>
            </div>
            <!-- Slide 3 -->
            <div class="swiper-slide">
              <div class="rounded-xl shadow-xl bg-white">
                <div
                  class="img-container h-[400px]"
                  style="border-bottom-right-radius: 0; border-bottom-left-radius: 0"
                >
                  <img
                    src="@/Assets/images/service8.jpg"
                    alt="home1"
                    class="w-full rounded-tr-xl rounded-tl-xl object-cover"
                  />
                </div>
                <div class="p-3">
                  <p class="font-normal text-justify">
                    Nice Dream hotel tên cũ là khách sạn Hải Sơn, tọa lạc nằm ở số 1 Nguyễn Thị Minh Khai, Phường 1, Đà
                    Lạt, ngay trung tâm của thành phố với tầm nhìn tuyệt đẹp hướng ra Chợ Đà Lạt và hồ Xuân Hương.
                  </p>
                </div>
              </div>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide">
              <div class="rounded-xl shadow-xl bg-white">
                <div
                  class="img-container h-[400px]"
                  style="border-bottom-right-radius: 0; border-bottom-left-radius: 0"
                >
                  <img
                    src="@/Assets/images/service7.jpg"
                    alt="home1"
                    class="w-full rounded-tr-xl rounded-tl-xl object-cover"
                  />
                </div>
                <div class="p-3">
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
import { onMounted } from 'vue'
import Swiper from 'swiper/bundle'
import 'swiper/css/bundle'

onMounted(() => {
  document.querySelectorAll('button[data-target]').forEach((button) => {
    button.addEventListener('click', () => {
      const targetId = button.getAttribute('data-target')
      const targetElement = document.getElementById(targetId)

      // Ẩn tất cả các collapse khác
      document.querySelectorAll('.hidden').forEach((collapse) => {
        if (collapse !== targetElement) {
          collapse.classList.add('hidden')
        }
      })

      // Toggle trạng thái của collapse được click
      if (targetElement.classList.contains('hidden')) {
        targetElement.classList.remove('hidden')
      } else {
        targetElement.classList.add('hidden')
      }
    })
  })

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
})
</script>
<style scoped>
/* Tùy chỉnh hiệu ứng nếu cần */
img {
  transition: transform 0.3s ease;
}

.swiper-slide {
  height: 600px;
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
