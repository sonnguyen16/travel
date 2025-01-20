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
                  <input
                    v-model="form.name"
                    type="text"
                    class="w-full font-normal border-[1.5px] border-green-600 rounded-lg p-2"
                  />
                </div>
                <div class="col-lg-6 mt-2">
                  <label for="name">Số điện thoại <span class="text-red-500">*</span></label>
                  <input
                    v-model="form.phone"
                    type="text"
                    class="w-full font-normal border-[1.5px] border-green-600 rounded-lg p-2"
                  />
                </div>
                <div class="col-lg-6 mt-2">
                  <label for="name">Email <span class="text-red-500">*</span></label>
                  <input
                    v-model="form.email"
                    type="text"
                    class="w-full font-normal border-[1.5px] border-green-600 rounded-lg p-2"
                  />
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
                <input v-model="form.payment_method" type="radio" id="vnpay" name="payment" value="vnpay" />
                <label for="vnpay" class="ms-2">VNPAY</label>
              </div>
              <div class="flex items-center mt-3">
                <input v-model="form.payment_method" type="radio" id="momo" name="payment" value="momo" />
                <label for="momo" class="ms-2">Momo</label>
              </div>
              <div class="flex items-center mt-3">
                <input v-model="form.payment_method" type="radio" id="visa" name="payment" value="visa" />
                <label for="visa" class="ms-2">Visa</label>
              </div>
              <div class="flex items-center mt-3">
                <input v-model="form.payment_method" type="radio" id="atm" name="payment" value="atm" />
                <label for="atm" class="ms-2">ATM</label>
              </div>
              <p class="mt-3">
                Khi nhấp vào thanh toán, bạn đồng ý với việc cung cấp thông tin và các
                <a href="#">điều khoản và điều kiện</a> của chúng tôi
              </p>
              <button @click.prevent="confirmPayment" class="bg-green-600 text-white px-4 py-2 rounded-xl mt-2 mr-auto">
                Thanh toán
              </button>
            </form>
          </div>
        </div>
        <div class="col-lg-4">
          <div
            class="w-full mx-auto bg-white px-[20px] py-[20px] border-[1.5px] border-green-600 rounded-xl shadow-2xl mt-5"
          >
            <h3>Chi tiết thanh toán</h3>
            <hr />
            <template v-for="c in cart">
              <h5 class="mt-3">
                {{
                  products
                    .find((p) => p.id === c.product_fk)
                    .translations.find((t) => t.language.code === locale.toUpperCase())?.name ||
                  products.find((p) => p.id === c.id).translations[0].name
                }}
              </h5>
              <div class="justify-between flex">
                <p class="mb-1">
                  {{ c.num_child + ' ' + $t('children') }}
                </p>
                <p class="mb-1">
                  {{ (c.price_child * c.num_child).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + 'đ' }}
                </p>
              </div>
              <div class="justify-between flex">
                <p class="">
                  {{ c.num_adult + ' ' + $t('adults') }}
                </p>
                <p class="">
                  {{ (c.price_adult * c.num_adult).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + 'đ' }}
                </p>
              </div>
            </template>
            <hr />
            <p class="mb-0">Mã khuyễn mãi</p>
            <hr />
            <div class="flex justify-between">
              <p class="mb-0">Giảm giá</p>
              <p class="mb-0">0đ</p>
            </div>
            <div class="flex justify-between">
              <p class="mb-0">Tổng cộng</p>
              <p class="mb-0">
                {{
                  cart
                    .map((c) => c.price_child * c.num_child + c.price_adult * c.num_adult)
                    .reduce((a, b) => a + b, 0)
                    .toString()
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ',')
                }}
                đ
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </MainLayout>
</template>
<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import { useForm, router } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'
import { defineProps, onMounted } from 'vue'

const props = defineProps({
  products: Object
})

const { t, locale } = useI18n()
const cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : []

let Swal = null
const form = useForm({
  name: '',
  phone: '',
  email: '',
  total: cart.map((c) => c.price_child * c.num_child + c.price_adult * c.num_adult).reduce((a, b) => a + b, 0),
  payment_method: '',
  order_details: cart
})

const confirmPayment = () => {
  if (!form.name || !form.phone || !form.email || !form.payment_method) {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Vui lòng điền đầy đủ thông tin và chọn phương thức thanh toán!'
    })
    return
  }

  // check email format
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  if (!emailRegex.test(form.email)) {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Email không hợp lệ!'
    })
    return
  }

  //check phone number format
  const phoneRegex = /([0-9]{8})\b/
  if (!phoneRegex.test(form.phone)) {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Số điện thoại không hợp lệ!'
    })
    return
  }

  form.post(route('confirm'), {
    onSuccess: () => {
      Swal.fire({
        icon: 'success',
        title: 'Thành công!',
        text: 'Đặt vé thành công!'
      }).then(() => {
        localStorage.removeItem('cart')
        router.visit('/')
      })
    },
    onError: () => {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Đặt vé thất bại!'
      })
    }
  })
}

onMounted(async () => {
  Swal = (await import('sweetalert2')).default
})
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
