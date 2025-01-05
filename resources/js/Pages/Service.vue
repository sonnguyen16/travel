<template>
  <MainLayout>
    <div class="container">
      <div class="pt-[150px]">
        <div class="row h-[600px]">
          <div class="col-lg-4 mb-4">
            <div @click="router.visit('/services/detail')" class="position-relative h-100">
              <img src="@/Assets/images/service1.jpg" alt="home1" class="w-full rounded-xl h-100 object-cover" />
              <div class="position-absolute bottom-0 left-0 right-0 overlay ps-3 rounded-xl">
                <h2 class="text-white">Khu du lịch Datanla</h2>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div @click="router.visit('/services/detail')" class="position-relative h-100">
              <img src="@/Assets/images/service2.jpg" alt="home1" class="w-full rounded-xl h-100 object-cover" />
              <div class="position-absolute bottom-0 left-0 right-0 overlay ps-3 rounded-xl">
                <h2 class="text-white">Khu du lịch Langbiang</h2>
              </div>
            </div>
          </div>
          <div @click="router.visit('/services/detail')" class="col-lg-4 mb-4">
            <div class="position-relative h-100">
              <img src="@/Assets/images/service3.jpg" alt="home1" class="w-full rounded-xl h-100 object-cover" />
              <div class="position-absolute bottom-0 left-0 right-0 overlay ps-3 rounded-xl">
                <h2 class="text-white">Cáp treo Đà Lạt</h2>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row lg:pt-[100px] pt-[200px]">
        <div class="col-lg-6 pe-4">
          <h4>Nhà hàng lẩu rau LéguDa</h4>
          <!-- LOcation -->
          <div class="d-flex gap-2 items-center">
            <i class="fas fa-map text-green-600"></i>
            <span>Đồi Robin</span>
          </div>
          <p class="mt-3 text-justify font-normal">
            Buffet Rau Đà Lạt - nhà hàng Léguda tự hào là nhà hàng Buffet Rau đầu tiên tại Đà Lạt. Nhà hàng được ví như
            “thiên đường rau củ” nằm trên đồi ROBIN – nơi cao nhất thành phố Đà Lạt. Tại đây, du khách vừa có thể ăn
            thỏa thích rau xanh tươi ngon lấy trực tiếp từ các nhà vườn, vừa có thể tận hưởng không khí trong lành và
            ngắm nhìn thành phố Đà Lạt từ trên cao.
          </p>
          <img src="@/Assets/images/service5.jpg" alt="home1" class="w-full rounded-xl h-[300px] object-cover" />
        </div>
        <div class="col-lg-6 ps-4">
          <img
            src="@/Assets/images/service4.jpg"
            alt="home1"
            class="w-full rounded-xl h-[300px] object-cover mb-3 mt-4"
          />
          <h4>Nhà hàng lẩu rau LéguDa</h4>
          <!-- LOcation -->
          <div class="d-flex gap-2 items-center">
            <i class="fas fa-map text-green-600"></i>
            <span>Đồi Robin</span>
          </div>
          <p class="mt-3 text-justify font-normal">
            Buffet Rau Đà Lạt - nhà hàng Léguda tự hào là nhà hàng Buffet Rau đầu tiên tại Đà Lạt. Nhà hàng được ví như
            “thiên đường rau củ” nằm trên đồi ROBIN – nơi cao nhất thành phố Đà Lạt. Tại đây, du khách vừa có thể ăn
            thỏa thích rau xanh tươi ngon lấy trực tiếp từ các nhà vườn, vừa có thể tận hưởng không khí trong lành và
            ngắm nhìn thành phố Đà Lạt từ trên cao.
          </p>
        </div>
      </div>

      <div class="pt-[100px] pb-[50px]">
        <div class="row">
          <div class="col-lg-4 mb-4">
            <div class="rounded-xl shadow-xl bg-white">
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
            <div class="rounded-xl shadow-xl bg-white">
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
            <div class="rounded-xl shadow-xl bg-white">
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
import { router } from '@inertiajs/vue3'
</script>
<style scoped></style>
