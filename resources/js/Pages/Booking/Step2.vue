<template>
  <MainLayout>
    <div class="container">
      <div class="pt-[100px]">
        <div
          class="w-full mx-auto bg-white px-[20px] pt-[30px] pb-[50px] border-[1.5px] border-green-600 rounded-xl shadow-2xl"
        >
          <div class="w-full">
            <div class="relative">
              <!-- Horizontal Line -->
              <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t-2 border-green-700"></div>
              </div>
              <!-- Timeline Content -->
              <div class="grid grid-cols-3 left-0 right-0 absolute md:translate-y-[-15%] translate-y-[-6%]">
                <!-- Item 1 -->
                <div class="">
                  <div class="w-6 h-6 bg-green-700 rounded-full text-center text-white">1</div>
                  <p class="mt-2 text-green-900 font-bold">Chọn vé</p>
                </div>
                <!-- Item 2 -->
                <div class="text-center">
                  <div class="w-6 h-6 bg-green-700 rounded-full text-center text-white mx-auto">2</div>
                  <p class="mt-2 text-green-900 font-bold">Xác nhận vé</p>
                </div>
                <!-- Item 3 -->
                <div class="">
                  <div class="w-6 h-6 bg-green-700 rounded-full text-center text-white ms-auto">3</div>
                  <p class="mt-2 text-green-900 font-bold text-end">Thanh toán</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-8">
          <div
            class="w-full mx-auto bg-white px-[20px] py-[30px] border-[1.5px] border-green-600 rounded-xl shadow-2xl mt-5"
          >
            <div class="flex justify-between">
              <div>
                <h2 class="font-bold">Xe trượt thác 3 - khứ hồi</h2>
                <div class="flex items-center">
                  <i class="far fa-calendar-alt text-green-600 text-2xl"></i>
                  <p class="mb-0 ms-2">Thứ 7, 10/10/2021</p>
                </div>
              </div>
              <div>
                <p class="text-center mb-0 text-[30px]">0Đ</p>
                <p class="mb-0">0 người lớn - 0 trẻ em</p>
              </div>
            </div>
            <div class="flex justify-end mt-4">
              <div>
                <div class="flex items-center gap-5">
                  <label><i class="fas fa-user-friends text-green-600 text-2xl"></i> Người lớn</label>
                  <div class="flex items-center">
                    <button class="border-none">
                      <i class="fas fa-minus text-green-600"></i>
                    </button>
                    <input type="text" class="border-none w-[40px]" value="0" />
                    <button class="border-none">
                      <i class="fas fa-plus text-green-600"></i>
                    </button>
                  </div>
                  <div class="flex items-center gap-5">
                    <p class="mb-0 text-gray-500">250.000đ/1 khách</p>
                    <p class="mb-0">250.000đ</p>
                  </div>
                </div>
                <div class="flex items-center gap-5">
                  <label><i class="fas fa-user-friends text-green-600 text-2xl"></i> Người lớn</label>
                  <div class="flex items-center">
                    <button class="border-none">
                      <i class="fas fa-minus text-green-600"></i>
                    </button>
                    <input type="text" class="border-none w-[40px]" value="0" />
                    <button class="border-none">
                      <i class="fas fa-plus text-green-600"></i>
                    </button>
                  </div>
                  <div class="flex items-center gap-5">
                    <p class="mb-0 text-gray-500">250.000đ/1 khách</p>
                    <p class="mb-0">250.000đ</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div
            class="w-full mx-auto bg-white px-[20px] py-[20px] border-[1.5px] border-green-600 rounded-xl shadow-2xl mt-5"
          >
            <h3>Chi tiết thanh toán</h3>
            <hr />
            <h3>Xe trượt thác 3 - khứ hồi</h3>
            <div class="justify-between flex mt-3">
              <p class="mb-3">2 người lớn</p>
              <p class="mb-3">500.000đ</p>
            </div>
            <hr />
            <p class="mb-0">Mã khuyễn mãi</p>
            <hr />
            <div class="flex justify-between">
              <p class="mb-0">Giảm giá</p>
              <p class="mb-0">0đ</p>
            </div>
            <div class="flex justify-between">
              <p class="mb-0">Tổng cộng</p>
              <p class="mb-0">500.000đ</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row my-4">
        <h1>Dịch vụ khác</h1>
        <div class="col-lg-4 mb-4">
          <div
            @click.prevent="router.visit('/promo/detail')"
            class="rounded-xl shadow-xl bg-white position-relative h-100"
          >
            <img src="@/Assets/images/promo1.jpg" alt="home1" class="w-full rounded-xl object-cover h-[500px]" />
            <div class="p-3 position-absolute bottom-0 rounded-xl left-0 right-0 overlay1 h-[200px]">
              <h3 class="mt-5">Dịch vụ 1</h3>
              <div class="flex items-center justify-between">
                <div>
                  <i class="fas fa-user-friends text-green-600 text-2xl"></i>
                  Người lớn
                </div>
                <div>
                  <button class="border-none">
                    <i class="fas fa-minus text-green-600"></i>
                  </button>
                  <input type="text" class="border-none w-[30px]" value="1" />
                  <button class="border-none">
                    <i class="fas fa-plus text-green-600"></i>
                  </button>
                </div>
              </div>
              <div class="flex items-center justify-between">
                <div>
                  <i class="fas fa-user-friends text-green-600 text-2xl"></i>
                  Trẻ em
                </div>
                <div>
                  <button class="border-none">
                    <i class="fas fa-minus text-green-600"></i>
                  </button>
                  <input type="text" class="border-none w-[30px]" value="1" />
                  <button class="border-none">
                    <i class="fas fa-plus text-green-600"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div
            @click.prevent="router.visit('/promo/detail')"
            class="rounded-xl shadow-xl bg-white position-relative h-100"
          >
            <img src="@/Assets/images/promo2.jpg" alt="home1" class="w-full rounded-xl object-cover h-[500px]" />
            <div class="p-3 position-absolute bottom-0 rounded-xl left-0 right-0 overlay1 h-[200px]">
              <h3 class="mt-5">Dịch vụ 2</h3>
              <div class="flex items-center justify-between">
                <div>
                  <i class="fas fa-user-friends text-green-600 text-2xl"></i>
                  Người lớn
                </div>
                <div>
                  <button class="border-none">
                    <i class="fas fa-minus text-green-600"></i>
                  </button>
                  <input type="text" class="border-none w-[30px]" value="1" />
                  <button class="border-none">
                    <i class="fas fa-plus text-green-600"></i>
                  </button>
                </div>
              </div>
              <div class="flex items-center justify-between">
                <div>
                  <i class="fas fa-user-friends text-green-600 text-2xl"></i>
                  Trẻ em
                </div>
                <div>
                  <button class="border-none">
                    <i class="fas fa-minus text-green-600"></i>
                  </button>
                  <input type="text" class="border-none w-[30px]" value="1" />
                  <button class="border-none">
                    <i class="fas fa-plus text-green-600"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div
            @click.prevent="router.visit('/promo/detail')"
            class="rounded-xl shadow-xl bg-white position-relative h-100"
          >
            <img src="@/Assets/images/promo3.jpg" alt="home1" class="w-full rounded-xl object-cover h-[500px]" />
            <div class="p-3 position-absolute bottom-0 rounded-xl left-0 right-0 overlay1 h-[200px]">
              <h3 class="mt-5">Dịch vụ 3</h3>
              <div class="flex items-center justify-between">
                <div>
                  <i class="fas fa-user-friends text-green-600 text-2xl"></i>
                  Người lớn
                </div>
                <div>
                  <button class="border-none">
                    <i class="fas fa-minus text-green-600"></i>
                  </button>
                  <input type="text" class="border-none w-[30px]" value="1" />
                  <button class="border-none">
                    <i class="fas fa-plus text-green-600"></i>
                  </button>
                </div>
              </div>
              <div class="flex items-center justify-between">
                <div>
                  <i class="fas fa-user-friends text-green-600 text-2xl"></i>
                  Trẻ em
                </div>
                <div>
                  <button class="border-none">
                    <i class="fas fa-minus text-green-600"></i>
                  </button>
                  <input type="text" class="border-none w-[30px]" value="1" />
                  <button class="border-none">
                    <i class="fas fa-plus text-green-600"></i>
                  </button>
                </div>
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
<style scoped>
.overlay1 {
  background: linear-gradient(
    to top,
    rgba(255, 255, 255, 1),
    rgba(255, 255, 255, 1),
    rgba(255, 255, 255, 0.7),
    rgba(255, 255, 255, 0)
  );
}
</style>
