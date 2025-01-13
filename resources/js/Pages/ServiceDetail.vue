<template>
  <MainLayout>
    <div class="container">
      <div class="pt-[150px]">
        <div style="box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.3)" class="rounded-xl p-3">
          <div class="row">
            <div class="col-lg-5">
              <div class="position-relative w-full h-[300px]">
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

      <div class="pt-[80px] lg:pb-[100px] pb-[1200px]">
        <h2 class="text-center mb-4">Điểm đến hấp dẫn khác</h2>
        <div class="row h-[600px]">
          <div class="col-lg-4 mb-4">
            <div class="rounded-xl shadow-xl bg-white h-100">
              <img
                src="@/Assets/images/service6.jpg"
                alt="home1"
                class="w-full rounded-tr-xl rounded-tl-xl object-cover h-[400px]"
              />
              <div class="p-3">
                <p class="font-normal text-justify">
                  Nice Dream hotel tên cũ là khách sạn Hải Sơn, tọa lạc nằm ở số 1 Nguyễn Thị Minh Khai, Phường 1, Đà
                  Lạt, ngay trung tâm của thành phố với tầm nhìn tuyệt đẹp hướng ra Chợ Đà Lạt và hồ Xuân Hương.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="rounded-xl shadow-xl bg-white h-100">
              <img
                src="@/Assets/images/service7.jpg"
                alt="home1"
                class="w-full rounded-tr-xl rounded-tl-xl object-cover h-[400px]"
              />
              <div class="p-3">
                <p class="font-normal text-justify">
                  Nice Dream hotel tên cũ là khách sạn Hải Sơn, tọa lạc nằm ở số 1 Nguyễn Thị Minh Khai, Phường 1, Đà
                  Lạt, ngay trung tâm của thành phố với tầm nhìn tuyệt đẹp hướng ra Chợ Đà Lạt và hồ Xuân Hương.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="rounded-xl shadow-xl bg-white h-100">
              <img
                src="@/Assets/images/service8.jpg"
                alt="home1"
                class="w-full rounded-tr-xl rounded-tl-xl object-cover h-[400px]"
              />
              <div class="p-3">
                <p class="font-normal text-justify">
                  Nice Dream hotel tên cũ là khách sạn Hải Sơn, tọa lạc nằm ở số 1 Nguyễn Thị Minh Khai, Phường 1, Đà
                  Lạt, ngay trung tâm của thành phố với tầm nhìn tuyệt đẹp hướng ra Chợ Đà Lạt và hồ Xuân Hương.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </MainLayout>
</template>
<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import { onMounted } from 'vue'

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
})
</script>
<style scoped>
/* Tùy chỉnh hiệu ứng nếu cần */
img {
  transition: transform 0.3s ease;
}
</style>
