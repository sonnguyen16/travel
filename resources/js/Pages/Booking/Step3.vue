<template>
  <MainLayout>
    <div class="container">
      <div class="pt-[80px]">
        <div class="w-full mx-auto bg-white px-[20px] pt-[30px] pb-[50px] border-[1.5px] border-green-600 rounded-xl">
          <div class="w-full">
            <div class="relative">
              <!-- Horizontal Line -->
              <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t-2 border-green-700"></div>
              </div>
              <!-- Timeline Content -->
              <div class="grid grid-cols-3 left-0 right-0 absolute translate-y-[-15%]">
                <!-- Item 1 -->
                <div class="">
                  <div class="w-6 h-6 bg-green-700 rounded-full text-center text-white">1</div>
                  <p class="mt-2 text-green-900 font-bold">
                    {{ $t('timeline_step_1') }}
                  </p>
                </div>
                <!-- Item 2 -->
                <div class="text-center">
                  <div class="w-6 h-6 bg-green-700 rounded-full text-center text-white mx-auto">2</div>
                  <p class="mt-2 text-green-900 font-bold">
                    {{ $t('timeline_step_2') }}
                  </p>
                </div>
                <!-- Item 3 -->
                <div class="">
                  <div
                    class="w-6 h-6 bg-white rounded-full border-2 border-green-600 flex justify-center items-center text-green-600 ms-auto"
                  >
                    3
                  </div>
                  <p class="mt-2 text-green-900 font-bold text-end">
                    {{ $t('timeline_step_3') }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-8 order-lg-1 order-2">
          <div
            class="w-full mx-auto bg-white px-[20px] pt-[20px] pb-[30px] border-[1.5px] border-green-600 rounded-xl mt-4"
          >
            <form>
              <div class="row">
                <div class="col-lg-6 mt-2">
                  <label for="name">
                    {{ $t('name') }}
                    <span class="text-red-500">*</span></label
                  >
                  <input
                    v-model="form.name"
                    type="text"
                    class="w-full font-normal border-[1.5px] border-green-600 rounded-lg p-2"
                  />
                </div>
                <div class="col-lg-6 mt-2">
                  <label for="name">
                    {{ $t('phone') }}
                    <span class="text-red-500">*</span></label
                  >
                  <input
                    v-model="form.phone"
                    type="text"
                    class="w-full font-normal border-[1.5px] border-green-600 rounded-lg p-2"
                  />
                </div>
                <div class="col-lg-6 mt-2">
                  <label for="name">{{ $t('email') }} <span class="text-red-500">*</span></label>
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
            class="w-full mb-5 mx-auto mt-4 bg-white px-[20px] pt-[20px] pb-[30px] border-[1.5px] border-green-600 rounded-xl"
          >
            <!-- 4 check boxes include vnpay, momo, visa(master card), atm -->
            <form>
              <h3>
                {{ $t('payment_method') }}
                <span class="text-red-500">*</span>
              </h3>
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
                {{ $t('payment_note') }}
              </p>
              <button @click.prevent="confirmPayment" class="bg-green-600 text-white px-4 py-2 rounded-xl mt-2 mr-auto">
                {{ $t('confirm') }}
              </button>
            </form>
          </div>
        </div>
        <div class="col-lg-4 order-lg-2 order-1">
          <div class="w-full mx-auto bg-white px-[20px] py-[20px] border-[1.5px] border-green-600 rounded-xl mt-4">
            <h3>
              {{ $t('payment_detail') }}
            </h3>
            <hr />
            <template v-for="c in cart">
              <h5 class="mt-3">
                {{
                  products
                    .find((p) => p.id === c.product_fk)
                    ?.translations.find((t) => t.language.code === locale.toUpperCase())?.name ||
                  products.find((p) => p.id === c.product_fk)?.translations[0].name
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
            <p class="mb-0">
              {{ $t('promo_code') }}
            </p>
            <hr />
            <div class="flex justify-between">
              <p class="mb-0">
                {{ $t('discount') }}
              </p>
              <p class="mb-0">0đ</p>
            </div>
            <div class="flex justify-between">
              <p class="mb-0">
                {{ $t('total') }}
              </p>
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
import { computed, defineProps, onMounted, ref } from 'vue'

const props = defineProps({
  products: Object
})

const { t, locale } = useI18n()
let cart = ref([])
onMounted(() => {
  cart.value = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : []
})

const total = computed(() => {
  return cart.value.map((c) => c.price_child * c.num_child + c.price_adult * c.num_adult).reduce((a, b) => a + b, 0)
})

let Swal = null
const form = useForm({
  name: '',
  phone: '',
  email: '',
  total: total.value,
  payment_method: '',
  order_details: cart
})

const confirmPayment = () => {
  if (!form.name || !form.phone || !form.email || !form.payment_method) {
    Swal.fire({
      icon: 'warning',
      title: t('notify'),
      text: t('fill_all_fields'),
      customClass: {
        confirmButton: 'bg-green-600 text-white'
      }
    })
    return
  }

  // check email format
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  if (!emailRegex.test(form.email)) {
    Swal.fire({
      icon: 'warning',
      title: t('notify'),
      text: t('invalid_email'),
      customClass: {
        confirmButton: 'bg-green-600 text-white'
      }
    })
    return
  }

  //check phone number format
  const phoneRegex = /([0-9]{8})\b/
  if (!phoneRegex.test(form.phone)) {
    Swal.fire({
      icon: 'warning',
      title: t('notify'),
      text: t('invalid_phone'),
      customClass: {
        confirmButton: 'bg-green-600 text-white'
      }
    })
    return
  }

  form.post(route('confirm'), {
    onSuccess: () => {
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: t('order_success'),
        customClass: {
          confirmButton: 'bg-green-600 text-white'
        }
      }).then(() => {
        localStorage.removeItem('cart')
        router.visit('/')
      })
    },
    onError: () => {
      Swal.fire({
        icon: 'warning',
        title: t('notify'),
        text: t('order_failed'),
        customClass: {
          confirmButton: 'bg-green-600 text-white'
        }
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
