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
                  <div
                    class="w-6 h-6 bg-white rounded-full border-2 border-green-600 flex justify-center items-center text-green-600 mx-auto"
                  >
                    2
                  </div>
                  <p class="mt-2 text-green-900 font-bold">
                    {{ $t('timeline_step_2') }}
                  </p>
                </div>
                <!-- Item 3 -->
                <div class="">
                  <div class="w-6 h-6 bg-green-700 rounded-full text-center text-white ms-auto">3</div>
                  <p class="mt-2 text-green-900 font-bold text-end">
                    {{ $t('timeline_step_3') }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row pb-[30px]">
        <div class="col-lg-8">
          <div
            v-for="c in cart"
            class="w-full mx-auto bg-white px-[20px] py-[30px] border-[1.5px] border-green-600 rounded-xl mt-4"
          >
            <div class="flex justify-between">
              <div>
                <h2 class="font-bold text-[1.2rem]">
                  {{
                    products
                      .find((p) => p.id === c.product_fk)
                      ?.translations.find((t) => t.language.code === locale.toUpperCase())?.name ||
                    products.find((p) => p.id === c.product_fk)?.translations[0].name
                  }}
                </h2>
                <div class="flex items-center">
                  <i class="far fa-calendar-alt text-green-600 text-2xl"></i>
                  <p class="mb-0 ms-2">
                    {{ new Date(c.date).toLocaleDateString() }}
                  </p>
                </div>
              </div>
              <div>
                <p class="text-center mb-0 text-[1.2rem]">
                  {{
                    products
                      .find((p) => p.id === c.product_fk)
                      .price.toString()
                      .replace(/\B(?=(\d{3})+(?!\d))/g, ',')
                  }}
                  đ
                </p>
              </div>
            </div>
            <div class="flex justify-end mt-2">
              <div>
                <div class="grid md:grid-cols-5 grid-cols-3 gap-5">
                  <div class="flex items-center">
                    <label class="">{{ $t('children') }}</label>
                  </div>
                  <div class="flex items-center justify-center md:col-span-2 col-span-1">
                    <button @click="decrementChild(c.product_fk)" class="border-none">
                      <i class="fas fa-minus text-green-600"></i>
                    </button>
                    <input type="text" class="border-none w-[40px]" :value="c.num_child" />
                    <button @click="incrementChild(c.product_fk)" class="border-none">
                      <i class="fas fa-plus text-green-600"></i>
                    </button>
                  </div>
                  <div class="flex items-center justify-center gap-5 md:col-span-2 col-span-1">
                    <p class="mb-0 text-gray-500 md:inline hidden">
                      {{ c.price_child.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + 'đ' }}/{{
                        $t('price_per_person')
                      }}
                    </p>
                    <p class="mb-0">
                      {{ (c.price_child * c.num_child).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') }}đ
                    </p>
                  </div>
                </div>
                <div class="grid md:grid-cols-5 grid-cols-3 gap-5">
                  <div class="flex items-center">
                    <label class="">{{ $t('adults') }}</label>
                  </div>
                  <div class="flex items-center justify-center md:col-span-2 col-span-1">
                    <button @click="decrementAdult(c.product_fk)" class="border-none">
                      <i class="fas fa-minus text-green-600"></i>
                    </button>
                    <input type="text" class="border-none w-[40px]" v-model="c.num_adult" />
                    <button @click="incrementAdult(c.product_fk)" class="border-none">
                      <i class="fas fa-plus text-green-600"></i>
                    </button>
                  </div>
                  <div class="flex items-center justify-center gap-5 md:col-span-2 col-span-1">
                    <p class="mb-0 text-gray-500 md:inline hidden">
                      {{ c.price_adult.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + 'đ' }}/{{
                        $t('price_per_person')
                      }}
                    </p>
                    <p class="mb-0">
                      {{ (c.price_adult * c.num_adult).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') }}đ
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button
            v-if="cart.length"
            @click="router.visit('/dat-ve/buoc3')"
            class="w-full bg-green-600 text-white text-center py-3 mt-4 rounded-xl"
          >
            {{ $t('continue') }}
          </button>
          <h4 v-else class="text-center mt-5">{{ $t('no_ticket') }}</h4>
        </div>
        <div class="col-lg-4">
          <div class="w-full mx-auto bg-white px-[20px] py-[20px] border-[1.5px] border-green-600 rounded-xl mt-4">
            <p class="font-bold">{{ $t('payment_detail') }}</p>
            <hr />
            <template v-for="c in cart">
              <p class="mt-3 font-bold">
                {{
                  products
                    .find((p) => p.id === c.product_fk)
                    ?.translations.find((t) => t.language.code === locale.toUpperCase())?.name ||
                  products.find((p) => p.id === c.product_fk)?.translations[0].name
                }}
              </p>
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
              <p class="mb-0 font-bold">
                {{ $t('total') }}
              </p>
              <p class="mb-0 font-bold">
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

      <div class="pb-[30px]">
        <h2 class="text-center">
          {{ t('service_detail.related_services') }}
        </h2>
        <div class="row g-3">
          <template
            v-for="(product, index) in products
              .filter((item) => !cart.some((c) => c.product_fk === item.id))
              .slice(0, 3)"
          >
            <div :id="product.location_id" class="col-md-4">
              <div class="bg-white px-[20px] pt-[20px] pb-[20px] border-[1.5px] border-green-600 rounded-xl mt-4">
                <div class="">
                  <p class="font-bold mb-0 text-[1.2rem]">
                    {{
                      product.translations?.find((item) => item.language.code === locale.toUpperCase())?.name ||
                      product.translations?.[0]?.name
                    }}
                  </p>
                  <div>
                    <p class="text-end mb-0 text-[1.2rem]">
                      {{ product.price?.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + 'đ' }}
                    </p>
                  </div>
                </div>
                <hr />
                <div
                  class="line-clamp-4"
                  v-html="
                    product.translations?.find((item) => item.language.code === locale.toUpperCase())?.content ||
                    product.translations?.[0]?.content
                  "
                ></div>
                <hr />
                <div class="flex justify-between">
                  <a
                    @click="addToCart(product.id)"
                    class="block py-2 w-full text-center rounded-xl border-1 border-green-600 hover:cursor-pointer"
                  >
                    <i class="fas fa-shopping-cart text-green-600"></i>
                  </a>
                </div>
              </div>
            </div>
          </template>
        </div>
      </div>
    </div>
  </MainLayout>
</template>
<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import { router } from '@inertiajs/vue3'
import Swal from 'sweetalert2'
import { defineProps, onMounted, ref } from 'vue'
import { useI18n } from 'vue-i18n'

const props = defineProps({
  products: Object
})

const { t, locale } = useI18n()
let cart = ref([])
onMounted(() => {
  cart.value = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : []
})

const incrementChild = (id) => {
  cart.value.find((form) => form.product_fk == id).num_child++
  localStorage.setItem('cart', JSON.stringify(cart.value))
}

const decrementChild = (id) => {
  const form = cart.value.find((form) => form.product_fk == id)
  if (form.num_child > 0) {
    form.num_child--
  }
  if (form.num_child == 0 && form.num_adult == 0) {
    cart.value = cart.value.filter((item) => item.product_fk != id)
    localStorage.setItem('cart', JSON.stringify(cart.value))
  } else {
    localStorage.setItem('cart', JSON.stringify(cart.value))
  }
}

const incrementAdult = (id) => {
  cart.value.find((form) => form.product_fk == id).num_adult++
  localStorage.setItem('cart', JSON.stringify(cart.value))
}

const decrementAdult = (id) => {
  const form = cart.value.find((form) => form.product_fk == id)
  if (form.num_adult > 0) {
    form.num_adult--
  }
  if (form.num_child == 0 && form.num_adult == 0) {
    cart.value = cart.value.filter((item) => item.product_fk != id)
    localStorage.setItem('cart', JSON.stringify(cart.value))
  } else {
    localStorage.setItem('cart', JSON.stringify(cart.value))
  }
}

const addToCart = (id) => {
  const product = props.products.find((p) => p.id === id)
  if (cart.value.some((c) => c.product_fk === id)) {
    cart.value.find((c) => c.product_fk === id).num_child++
    cart.value.find((c) => c.product_fk === id).num_adult++
  } else {
    cart.value.push({
      product_fk: id,
      num_child: 1,
      num_adult: 1,
      price_child: product.price_child,
      price_adult: product.price,
      date: formatDateToYYYYMMDD()
    })
  }

  localStorage.setItem('cart', JSON.stringify(cart.value))

  Swal.fire({
    icon: 'success',
    title: t('success'),
    text: t('add_to_cart_success')
  })
}
function formatDateToYYYYMMDD(date = new Date()) {
  const year = date.getFullYear() // Lấy năm đầy đủ, ví dụ: 2025
  const month = String(date.getMonth() + 1).padStart(2, '0') // Tháng từ 0-11, thêm số 0 nếu cần
  const day = String(date.getDate()).padStart(2, '0') // Thêm số 0 nếu cần

  return `${year}-${month}-${day}`
}
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
