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

      <div class="row pb-[50px]">
        <div class="col-lg-8">
          <div
            v-for="c in cart"
            class="w-full mx-auto bg-white px-[20px] py-[30px] border-[1.5px] border-green-600 rounded-xl shadow-2xl mt-5"
          >
            <div class="flex justify-between">
              <div>
                <h2 class="font-bold">
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
                <p class="text-center mb-0 text-[30px]">
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
            <div class="flex justify-end mt-4">
              <div>
                <div class="grid md:grid-cols-5 grid-cols-3 gap-5">
                  <div class="flex items-center">
                    <label class="">{{ $t('children') }}</label>
                  </div>
                  <div class="flex items-center justify-center md:col-span-2 col-span-1">
                    <input type="text" class="border-none w-[40px]" :value="c.num_child" />
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
                    <input type="text" class="border-none w-[40px]" v-model="c.num_adult" />
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
          <div
            class="w-full mx-auto bg-white px-[20px] py-[20px] border-[1.5px] border-green-600 rounded-xl shadow-2xl mt-5"
          >
            <h3>{{ $t('payment_detail') }}</h3>
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
import { router } from '@inertiajs/vue3'
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
