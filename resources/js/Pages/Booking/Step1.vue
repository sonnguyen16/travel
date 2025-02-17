<template>
  <MainLayout>
    <div class="container">
      <div class="pt-[80px] pb-[30px]">
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
                  <div
                    class="w-6 h-6 bg-white rounded-full border-2 border-green-600 flex justify-center items-center text-green-600"
                  >
                    1
                  </div>
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

      <div class="row g-3">
        <div class="col-lg-7">
          <div class="img-container h-100">
            <img src="@/Assets/images/booking1.jpg" alt="about" class="w-full rounded-xl h-100 object-cover" />
          </div>
        </div>
        <div class="col-lg-5">
          <div class="img-container h-[200px] mt-lg-0 mb-3">
            <img src="@/Assets/images/booking2.jpg" alt="about" class="w-full rounded-xl h-[200px] object-cover" />
          </div>
          <div class="img-container h-[200px]">
            <img src="@/Assets/images/booking3.jpg" alt="about" class="w-full rounded-xl h-[200px] object-cover" />
          </div>
        </div>
      </div>

      <div
        v-for="(product, index) in products"
        :key="index"
        :id="product.id"
        class="w-full mx-auto bg-white px-[20px] pt-[20px] pb-[20px] border-[1.5px] border-green-600 rounded-xl mt-4"
      >
        <div class="md:flex justify-between items-center">
          <p class="font-bold mb-0 text-[1.2rem]">
            {{
              product.translations.find((item) => item.language.code === locale.toUpperCase())?.name ||
              product.translations[0].name
            }}
          </p>
          <div>
            <p class="text-end mb-0 text-[1.2rem]">
              {{ product.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + 'đ' }}
            </p>
          </div>
        </div>
        <hr />
        <div
          v-html="
            product.translations.find((item) => item.language.code === locale.toUpperCase())?.content ||
            product.translations[0].content
          "
        ></div>
        <hr />
        <div class="grid md:grid-cols-5 grid-cols-1 gap-2">
          <div class="col-span-1">
            <label for="" class="text-green-600">{{ $t('select_date') }}</label>
            <div class="flex items-center">
              <i class="far fa-calendar-alt text-green-600 text-2xl"></i>
              <input
                v-model="forms.find((f) => f.product_fk == product.id).date"
                type="date"
                class="border-none font-normal"
              />
            </div>
          </div>
          <div class="col-span-3 flex flex-col justify-center">
            <div v-if="product.location.slug != 'datanla-adventures'" class="grid md:grid-cols-6 grid-cols-3">
              <div class="flex items-center">
                <label class="">{{ $t('children') }}</label>
              </div>
              <div class="flex items-center justify-center md:col-span-2 col-span-1">
                <button @click="decrementChild(product.id)" class="border-none">
                  <i class="fas fa-minus text-green-600"></i>
                </button>
                <input
                  type="text"
                  class="border-none w-[50px] text-center"
                  v-model="forms.find((f) => f.product_fk == product.id).num_child"
                />
                <button @click="incrementChild(product.id)" class="border-none">
                  <i class="fas fa-plus text-green-600"></i>
                </button>
              </div>
              <div class="flex items-center md:justify-around justify-center md:col-span-3 col-span-1">
                <p class="mb-0 text-gray-500 md:inline hidden w-1/2">
                  {{ product.price_child.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + 'đ' }}/{{
                    $t('price_per_person')
                  }}
                </p>
                <p class="mb-0 w-1/2 text-center">
                  {{
                    (product.price_child * forms.find((f) => f.product_fk == product.id).num_child)
                      .toString()
                      .replace(/\B(?=(\d{3})+(?!\d))/g, ',')
                  }}đ
                </p>
              </div>
            </div>
            <div class="grid md:grid-cols-6 grid-cols-3">
              <div class="flex items-center">
                <label class="">{{ $t('adults') }}</label>
              </div>
              <div class="flex items-center justify-center md:col-span-2 col-span-1">
                <button @click="decrementAdult(product.id)" class="border-none">
                  <i class="fas fa-minus text-green-600"></i>
                </button>
                <input
                  type="text"
                  class="border-none w-[50px] text-center"
                  v-model="forms.find((f) => f.product_fk == product.id).num_adult"
                />
                <button @click="incrementAdult(product.id)" class="border-none">
                  <i class="fas fa-plus text-green-600"></i>
                </button>
              </div>
              <div class="flex items-center md:justify-around justify-center md:col-span-3 col-span-1">
                <p class="mb-0 text-gray-500 md:inline hidden w-1/2">
                  {{ product.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + 'đ' }}/{{
                    $t('price_per_person')
                  }}
                </p>
                <p class="mb-0 w-1/2 text-center">
                  {{
                    (product.price * forms.find((f) => f.product_fk == product.id).num_adult)
                      .toString()
                      .replace(/\B(?=(\d{3})+(?!\d))/g, ',')
                  }}đ
                </p>
              </div>
            </div>
          </div>
          <div class="flex flex-col justify-end items-center gap-2 lg:ps-3">
            <a
              @click="addToCart(product.id)"
              class="block py-2 w-full text-center rounded-xl border-1 border-green-600 hover:cursor-pointer"
            >
              <i class="fas fa-shopping-cart text-green-600"></i>
            </a>
            <button @click="buyNow(product.id)" class="py-2 w-full rounded-xl bg-green-600 text-white">
              {{ $t('buy_now') }}
            </button>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-8">
          <div class="w-full mx-auto bg-gray-100 px-[20px] py-[30px] border-[1.5px] border-green-600 rounded-xl mt-5">
            <h3 class="font-bold">{{ $t(`notes_title`) }}</h3>
            <div>
              <p v-for="(_, index) in 6" :key="index" class="mb-0">
                <i class="fas fa-check text-green-600 me-2"></i> {{ $t(`notes.${index}`) }}
              </p>
            </div>
          </div>
          <iframe
            class="my-5 rounded-xl w-full"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3904.023782282466!2d108.44712497482281!3d11.903432388322374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317114a1a4b93341%3A0xf8ce8eb72915c065!2zS2h1IGR1IGzhu4tjaCBUaMOhYyBEYXRhbmxh!5e0!3m2!1svi!2s!4v1736066803856!5m2!1svi!2s"
            width="100%"
            height="450"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
        <div class="col-lg-4 py-[50px]">
          <h4 class="">{{ $t(`other_promos_title`) }}</h4>
          <hr />
          <template v-for="blog_related in promo">
            <div
              @click.prevent="router.visit(`/uu-dai/${blog_related.slug}`)"
              class="flex gap-3 mb-4 hover:cursor-pointer"
            >
              <img
                :src="BLOG_MEDIA_ENDPOINT + blog_related.image_fe?.picture"
                alt="promo1"
                class="w-[150px] h-[100px] object-cover rounded-xl"
              />
              <div style="width: calc(100% - 150px)">
                <p class="mb-0">
                  {{
                    blog_related.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                    blog_related.translations[0].name
                  }}
                </p>
                <p class="text-sm mt-2">
                  <i class="far fa-calendar"></i>
                  {{
                    new Date(blog_related.created_at).toLocaleDateString(locale, {
                      year: 'numeric',
                      month: 'long',
                      day: 'numeric'
                    })
                  }}
                </p>
              </div>
            </div>
          </template>
        </div>
      </div>
    </div>
  </MainLayout>
</template>
<script setup>
import { BLOG_MEDIA_ENDPOINT } from '@/Constants/endpoint'
import MainLayout from '@/Layouts/MainLayout.vue'
import emitter from '@/mitt'
import { router, useForm } from '@inertiajs/vue3'
import { onMounted, provide, ref } from 'vue'
import { useI18n } from 'vue-i18n'

const props = defineProps({
  products: Object,
  promo: Object
})

let Swal = null

const forms = ref([])

props.products.forEach((product) => {
  forms.value.push({
    num_child: 0,
    num_adult: 0,
    product_fk: product.id,
    price_adult: product.price,
    price_child: product.price_child,
    location_id: product.location_id,
    date: formatDateToYYYYMMDD()
  })
})

onMounted(async () => {
  Swal = (await import('sweetalert2')).default

  const urlParams = new URLSearchParams(window.location.search)
  const select = urlParams.get('select')
  const date = urlParams.get('date')
  const num_adult = urlParams.get('num_adult')
  const num_child = urlParams.get('num_child')

  const ticket_id = urlParams.get('ticket_id')
  if (select) {
    forms.value = forms.value.map((f) => {
      if (f.location_id == select) {
        f.date = date
        f.num_adult = num_adult
        f.num_child = num_child
      }
      return f
    })

    setTimeout(() => {
      window.scrollTo({
        top: document.getElementById(props.products.find((p) => p.location_id == select)?.id).offsetTop - 80,
        behavior: 'smooth'
      })
    }, 500)
  }

  if (ticket_id) {
    setTimeout(() => {
      window.scrollTo({
        top: document.getElementById(ticket_id).offsetTop - 80,
        behavior: 'smooth'
      })
    }, 500)
  }
})

const incrementChild = (id) => {
  forms.value.find((form) => form.product_fk == id).num_child++
}

const decrementChild = (id) => {
  const form = forms.value.find((form) => form.product_fk == id)
  if (form.num_child > 0) {
    form.num_child--
  }
}

const incrementAdult = (id) => {
  forms.value.find((form) => form.product_fk == id).num_adult++
}

const decrementAdult = (id) => {
  const form = forms.value.find((form) => form.product_fk == id)
  if (form.num_adult > 0) {
    form.num_adult--
  }
}

const addToCart = (id) => {
  if (
    forms.value.find((form) => form.product_fk == id).num_child == 0 &&
    forms.value.find((form) => form.product_fk == id).num_adult == 0
  ) {
    Swal.fire({
      icon: 'warning',
      title: t('notify'),
      text: t('please_select_number_of_people'),
      customClass: {
        confirmButton: 'bg-green-600 text-white'
      }
    })
    return
  }

  if (forms.value.find((form) => form.product_fk == id).date < formatDateToYYYYMMDD()) {
    Swal.fire({
      icon: 'warning',
      title: t('notify'),
      text: t('please_select_future_date'),
      customClass: {
        confirmButton: 'bg-green-600 text-white'
      }
    })
    return
  }

  const form = forms.value.find((form) => form.product_fk == id)
  let cart = JSON.parse(localStorage.getItem('cart')) || []
  const existed = cart.find((item) => item.product_fk == id)
  if (existed) {
    cart = cart.map((item) => {
      if (item.product_fk == id) {
        item.num_child = form.num_child
        item.num_adult = form.num_adult
        item.date = form.date
      }
      return item
    })
  } else {
    cart.push(form)
  }
  localStorage.setItem('cart', JSON.stringify(cart))
  Swal.fire({
    icon: 'success',
    title: t('success'),
    text: t('add_to_cart_success'),
    customClass: {
      confirmButton: 'bg-green-600 text-white'
    }
  })

  emitter.emit('cart-updated', cart)
}

const buyNow = (id) => {
  if (
    forms.value.find((form) => form.product_fk == id).num_child == 0 &&
    forms.value.find((form) => form.product_fk == id).num_adult == 0
  ) {
    Swal.fire({
      icon: 'warning',
      title: t('notify'),
      text: t('please_select_number_of_people'),
      customClass: {
        confirmButton: 'bg-green-600 text-white'
      }
    })
    return
  }

  const form = forms.value.find((form) => form.product_fk == id)
  let cart = JSON.parse(localStorage.getItem('cart')) || []
  const existed = cart.find((item) => item.product_fk == id)
  if (existed) {
    cart = cart.map((item) => {
      if (item.product_fk == id) {
        item.num_child = form.num_child
        item.num_adult = form.num_adult
        item.date = form.date
      }
      return item
    })
  } else {
    cart.push(form)
  }
  localStorage.setItem('cart', JSON.stringify(cart))
  router.visit('/dat-ve/buoc2')
}

function formatDateToYYYYMMDD(date = new Date()) {
  const year = date.getFullYear() // Lấy năm đầy đủ, ví dụ: 2025
  const month = String(date.getMonth() + 1).padStart(2, '0') // Tháng từ 0-11, thêm số 0 nếu cần
  const day = String(date.getDate()).padStart(2, '0') // Thêm số 0 nếu cần

  return `${year}-${month}-${day}`
}

const { t, locale } = useI18n()
</script>
<style scoped></style>
