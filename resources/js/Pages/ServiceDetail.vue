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
                  class="w-full rounded-xl object-cover position-absolute lg:top-[-50px] lg:left-[-40px]"
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

      <div class="row pt-[100px]">
        <h2 class="text-center mb-[100px]">Hoạt động nổi bật</h2>
        <div class="grid lg:grid-cols-6 lg:gap-4 gap-5">
          <!-- Image 1 -->
          <div class="relative">
            <img
              src="@/Assets/images/servicedetail2.jpg"
              alt="Tham Quan Thác"
              class="diagonal w-full h-72 object-cover"
            />
            <p class="mt-[70px] font-semibold">THAM QUAN THÁC</p>
          </div>
          <!-- Image 2 -->
          <div class="relative">
            <img
              src="@/Assets/images/servicedetail3.jpg"
              alt="Xe Trượt Thác 1"
              class="diagonal w-full h-72 object-cover"
            />
            <p class="mt-[70px] font-semibold">XE TRƯỢT THÁC 1</p>
          </div>
          <!-- Image 3 -->
          <div class="relative">
            <img
              src="@/Assets/images/servicedetail4.jpg"
              alt="Xe Trượt Thác 3"
              class="diagonal w-full h-72 object-cover"
            />
            <p class="mt-[70px] font-semibold">XE TRƯỢT THÁC 3</p>
          </div>
          <!-- Image 4 -->
          <div class="relative">
            <img
              src="@/Assets/images/servicedetail5.jpg"
              alt="Hành Trình Trên Cao"
              class="diagonal w-full h-72 object-cover"
            />
            <p class="mt-[70px] font-semibold">HÀNH TRÌNH TRÊN CAO</p>
          </div>
          <!-- Image 5 -->
          <div class="relative">
            <img
              src="@/Assets/images/servicedetail6.jpg"
              alt="Hành Trình Vượt Thác"
              class="diagonal w-full h-72 object-cover"
            />
            <p class="mt-[70px] font-semibold">HÀNH TRÌNH VƯỢT THÁC</p>
          </div>
          <!-- Image 6 -->
          <div class="relative">
            <img
              src="@/Assets/images/servicedetail7.jpg"
              alt="Hành Trình Vượt Thác"
              class="diagonal w-full h-72 object-cover"
            />
            <p class="mt-[70px] font-semibold">HÀNH TRÌNH VƯỢT THÁC</p>
          </div>
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
</script>
<style scoped>
.diagonal {
  transform: skew(-10deg) scale(1.4);
  object-fit: cover;
}
</style>
