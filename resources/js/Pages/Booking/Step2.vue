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
        <div class="col-lg-8 order-md-1 order-2">
          <div
            v-for="c in cart"
            class="w-full mx-auto bg-white px-[20px] pb-[20px] pt-[20px] border-[1.5px] border-green-600 rounded-xl mt-4"
          >
            <div>
              <!-- icon delete -->
            </div>
            <div class="flex justify-between gap-2">
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
                  <input
                    @change="changeDate($event, c.product_fk)"
                    type="date"
                    :value="c.date"
                    class="border-none font-normal"
                  />
                </div>
              </div>
              <div>
                <div class="flex justify-end">
                  <button @click="deleteCartItem(c.product_fk)" class="border-none">
                    <i class="fas fa-trash text-red-600"></i>
                  </button>
                </div>
              </div>
            </div>
            <div class="mt-2">
              <div class="">
                <div
                  v-if="products.find((p) => p.id == c.product_fk)?.location.slug != 'datanla-adventures' && c.price_child > 0"
                  class="grid md:grid-cols-6 grid-cols-3"
                >
                  <div class="flex items-center">
                    <label class="">{{ $t('children') }}</label>
                  </div>
                  <div class="flex items-center justify-center md:col-span-2 col-span-1">
                    <button @click="decrementChild(c.product_fk)" class="border-none">
                      <i class="fas fa-minus text-green-600"></i>
                    </button>
                    <input type="text" class="border-none w-[50px] text-center" :value="c.num_child" />
                    <button @click="incrementChild(c.product_fk)" class="border-none">
                      <i class="fas fa-plus text-green-600"></i>
                    </button>
                  </div>
                  <div class="flex items-center md:justify-around justify-center md:col-span-3 col-span-1">
                    <p class="mb-0 text-gray-500 md:inline hidden w-1/2 text-end">
                      {{ c.price_child.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + 'đ' }}/{{ 
                        $t('price_per_person')
                      }}
                    </p>
                    <p class="mb-0 w-1/2 text-end">
                      {{ (c.price_child * c.num_child).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') }}đ
                    </p>
                  </div>
                </div>
                <div v-if="c.price_adult > 0" class="grid md:grid-cols-6 grid-cols-3">
                  <div class="flex items-center">
                    <label class="">{{ $t('adults') }}</label>
                  </div>
                  <div class="flex items-center justify-center md:col-span-2 col-span-1">
                    <button @click="decrementAdult(c.product_fk)" class="border-none">
                      <i class="fas fa-minus text-green-600"></i>
                    </button>
                    <input type="text" class="border-none w-[50px] text-center" v-model="c.num_adult" />
                    <button @click="incrementAdult(c.product_fk)" class="border-none">
                      <i class="fas fa-plus text-green-600"></i>
                    </button>
                  </div>
                  <div class="flex items-center md:justify-around justify-center md:col-span-3 col-span-1">
                    <p class="mb-0 text-gray-500 md:inline hidden w-1/2 text-end">
                      {{ c.price_adult.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + 'đ' }}/{{ 
                        $t('price_per_person')
                      }}
                    </p>
                    <p class="mb-0 w-1/2 text-end">
                      {{ (c.price_adult * c.num_adult).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') }}đ
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button
            v-if="cart.length"
            @click="checkBookingTimeAndContinue()"
            class="w-full bg-green-600 text-white text-center py-3 mt-4 rounded-xl"
          >
            {{ $t('continue') }}
          </button>
          <h4 v-else class="text-center mt-5">{{ $t('no_ticket') }}</h4>
        </div>
        <div class="col-lg-4 order-md-2 order-1">
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
              <div v-if="c.num_child > 0 && c.price_child > 0" class="justify-between flex">
                <p class="mb-1">
                  {{ c.num_child + ' ' + $t('children') }}
                </p>
                <p class="mb-1">
                  {{ (c.price_child * c.num_child).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + 'đ' }}
                </p>
              </div>
              <div v-if="c.num_adult > 0 && c.price_adult > 0" class="justify-between flex">
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

      <div id="related_services" class="pb-[30px]">
        <h2 class="text-center mb-4 uppercase font-bold text-[32px]">
          {{ t('service_detail.related_services') }}
        </h2>
        <div class="swiper swiper-related">
          <div class="swiper-wrapper pb-4">
            <template
              v-for="(product, index) in products.filter((item) => !cart.some((c) => c.product_fk === item.id))"
            >
              <div class="swiper-slide hover:cursor-pointer">
                <div class="rounded-xl bg-white shadow-md card-equal-height border-[1.5px] border-green-600">
                  <div
                    class="img-container h-[200px]"
                    style="border-bottom-right-radius: 0; border-bottom-left-radius: 0"
                  >
                    <img
                      :src="PRODUCT_MEDIA_ENDPOINT + product.image_fe?.picture"
                      alt="home1"
                      class="w-full rounded-tr-xl rounded-tl-xl object-cover h-full"
                    />
                  </div>
                  <div class="p-3 card-content">
                    <h3 class="text-xl font-semibold line-clamp-1 card-title mb-2">
                      {{
                        product.translations?.find((item) => item.language.code === locale.toUpperCase())?.name ||
                        product.translations?.[0]?.name
                      }}
                    </h3>
                    <div class="mb-2">
                      <p class="mb-0 text-[1.2rem] bg-green-600 text-white inline-block px-3 rounded-xl">
                        {{ product.price?.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + 'đ' }}
                      </p>
                    </div>
                    <div class="card-description-container">
                      <div
                        class="card-description"
                        v-html="
                          product.translations?.find((item) => item.language.code === locale.toUpperCase())?.content ||
                          product.translations?.[0]?.content
                        "
                      ></div>
                      <div class="fade-out-effect"></div>
                    </div>
                    <div class="mt-3 text-center">
                      <a
                        @click="addToCart(product.id)"
                        class="block py-2 w-full text-center rounded-xl border-[1.5px] border-green-600 hover:cursor-pointer hover:bg-green-50 transition-colors"
                      >
                        <i class="fas fa-shopping-cart text-green-600 mr-2"></i>
                        <span class="text-green-600">{{ t('add_to_cart') }}</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </template>
          </div>
          <!-- Navigation -->
          <div class="swiper-button-next swiper-next-related custom-nav-button"></div>
          <div class="swiper-button-prev swiper-prev-related custom-nav-button"></div>
        </div>
      </div>
    </div>
  </MainLayout>
</template>
<script setup>
import { PRODUCT_MEDIA_ENDPOINT } from '@/Constants/endpoint'
import MainLayout from '@/Layouts/MainLayout.vue'
import { router } from '@inertiajs/vue3'
import Swal from 'sweetalert2'
import { defineProps, onMounted, ref } from 'vue'
import { useI18n } from 'vue-i18n'
import emitter from '@/mitt'
import Swiper from 'swiper/bundle'
import 'swiper/css/bundle'
import { updateNavigationButtons } from '@/Assets/common.js'

const props = defineProps({
  products: Object
})

const { t, locale } = useI18n()
let cart = ref([])
onMounted(() => {
  cart.value = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : []

  // Khởi tạo swiper cho related services
  setTimeout(() => {
    new Swiper('.swiper-related', {
      loop: false,
      fadeEffect: { crossFade: true },
      speed: 1000,
      spaceBetween: 20,
      slidesPerView: 'auto',
      navigation: {
        nextEl: '.swiper-next-related',
        prevEl: '.swiper-prev-related'
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
      },
      on: {
        init: function () {
          if (typeof updateNavigationButtons === 'function') {
            updateNavigationButtons(this, 'related')
          }
        },
        resize: function () {
          if (typeof updateNavigationButtons === 'function') {
            updateNavigationButtons(this, 'related')
          }
        }
      }
    })
  }, 100)
})

const changeDate = (e, id) => {
  if (e.target.value < formatDateToYYYYMMDD()) {
    e.target.value = formatDateToYYYYMMDD()
  }

  cart.value.find((form) => form.product_fk == id).date = e.target.value
  localStorage.setItem('cart', JSON.stringify(cart.value))
}

const incrementChild = (id) => {
  cart.value.find((form) => form.product_fk == id).num_child++
  localStorage.setItem('cart', JSON.stringify(cart.value))
  emitter.emit('cart-updated', cart.value)
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
  emitter.emit('cart-updated', cart.value)
}

const incrementAdult = (id) => {
  cart.value.find((form) => form.product_fk == id).num_adult++
  localStorage.setItem('cart', JSON.stringify(cart.value))
  emitter.emit('cart-updated', cart.value)
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
  emitter.emit('cart-updated', cart.value)
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
  emitter.emit('cart-updated', cart.value)
}

const deleteCartItem = (id) => {
  cart.value = cart.value.filter((item) => item.product_fk != id)
  localStorage.setItem('cart', JSON.stringify(cart.value))
  emitter.emit('cart-updated', cart.value)
}

const checkBookingTimeAndContinue = () => {
  // Kiểm tra khung giờ đặt vé cho tất cả sản phẩm trong giỏ hàng
  const currentTime = new Date()
  const currentHour = currentTime.getHours()
  const currentMinute = currentTime.getMinutes()
  const currentTimeString = `${String(currentHour).padStart(2, '0')}:${String(currentMinute).padStart(2, '0')}`
  
  // Kiểm tra từng sản phẩm trong giỏ hàng
  for (const item of cart.value) {
    const product = props.products.find(p => p.id === item.product_fk)
    
    // Nếu sản phẩm có giới hạn khung giờ đặt vé
    if (product && product.booking_time_start && product.booking_time_end) {
      // So sánh thời gian hiện tại với khung giờ cho phép
      if (currentTimeString < product.booking_time_start || currentTimeString > product.booking_time_end) {
        // Hiển thị thông báo lỗi
        Swal.fire({
          icon: 'error',
          title: t('booking_time_error'),
          html: `${t('booking_time_error_message')} <br><strong>${product.translations.find(t => t.language.code === locale.toUpperCase())?.name || product.translations[0].name}</strong><br>${t('booking_time_allowed')}: ${product.booking_time_start} - ${product.booking_time_end}`
        })
        return // Dừng lại, không chuyển đến bước tiếp theo
      }
    }
  }
  
  // Nếu tất cả sản phẩm đều hợp lệ, chuyển đến bước 3
  router.visit('/dat-ve/buoc3')
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

/* Swiper styles */
.swiper-related {
  padding-bottom: 40px;
}

.custom-nav-button {
  color: #3e7b27 !important;
}

/* Card styles */
.card-equal-height {
  display: flex;
  flex-direction: column;
  height: 100%;
}

.img-container {
  flex: 0 0 auto; /* Không co giãn phần ảnh */
}

.card-content {
  display: flex;
  flex-direction: column;
  flex: 1; /* Phần nội dung sẽ co giãn để điều chỉnh chiều cao */
}

.card-title {
  flex: 0 0 auto; /* Không co giãn phần tiêu đề */
}

.card-description-container {
  flex: 1;
  position: relative;
  overflow: hidden;
  max-height: 120px;
}

.card-description {
  line-height: 1.5;
  overflow: hidden;
  max-height: 120px;
}

.fade-out-effect {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 60px;
  background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 1));
  pointer-events: none;
}
</style>
