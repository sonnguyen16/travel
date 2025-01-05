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
            class="w-full mx-auto bg-white px-[20px] pt-[20px] pb-[30px] border-[1.5px] border-green-600 rounded-xl shadow-2xl mt-5"
          >
            <form>
              <div class="row">
                <div class="col-lg-6 mt-2">
                  <label for="name">Họ và tên <span class="text-red-500">*</span></label>
                  <input type="text" class="w-full border-[1.5px] border-green-600 rounded-lg p-2" />
                </div>
                <div class="col-lg-6 mt-2">
                  <label for="name">Số điện thoại <span class="text-red-500">*</span></label>
                  <input type="text" class="w-full border-[1.5px] border-green-600 rounded-lg p-2" />
                </div>
                <div class="col-lg-6 mt-2">
                  <label for="name">Email <span class="text-red-500">*</span></label>
                  <input type="text" class="w-full border-[1.5px] border-green-600 rounded-lg p-2" />
                </div>
              </div>
            </form>
          </div>
          <div
            class="w-full mb-5 mx-auto mt-4 bg-white px-[20px] pt-[20px] pb-[30px] border-[1.5px] border-green-600 rounded-xl shadow-2xl"
          >
            <!-- 4 check boxes include vnpay, momo, visa(master card), atm -->
            <form>
              <h3>Chọn phương thức thanh toán</h3>
              <div class="flex items-center mt-3">
                <input type="radio" id="vnpay" name="payment" value="vnpay" />
                <label for="vnpay" class="ms-2">VNPAY</label>
              </div>
              <div class="flex items-center mt-3">
                <input type="radio" id="momo" name="payment" value="momo" />
                <label for="momo" class="ms-2">Momo</label>
              </div>
              <div class="flex items-center mt-3">
                <input type="radio" id="visa" name="payment" value="visa" />
                <label for="visa" class="ms-2">Visa</label>
              </div>
              <div class="flex items-center mt-3">
                <input type="radio" id="atm" name="payment" value="atm" />
                <label for="atm" class="ms-2">ATM</label>
              </div>
              <p class="mt-3">
                Khi nhấp vào thanh toán, bạn đồng ý với việc cung cấp thông tin và các
                <a href="#">điều khoản và điều kiện</a> của chúng tôi
              </p>
              <button class="bg-green-600 text-white px-4 py-2 rounded-xl mt-2 mr-auto">Thanh toán</button>
            </form>
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
