<template>
  <Head>
    <title>FAQ - Đà Lạt Tourist</title>
    <meta
      name="description"
      content="Dalattourist - Công ty du lịch - dịch vụ - lữ hành lâu đời nhất tại Đà Lạt. Được thành lập từ năm 1976, Dalattourist tiên phong cung cấp những dịch vụ du lịch gắn liền với thiên nhiên, văn hóa và bản sắc Đà Lạt."
    />
    <meta property="og:title" content="FAQ - Đà Lạt Tourist" />
    <meta
      property="og:description"
      content="Dalattourist - Công ty du lịch - dịch vụ - lữ hành lâu đời nhất tại Đà Lạt. Được thành lập từ năm 1976, Dalattourist tiên phong cung cấp những dịch vụ du lịch gắn liền với thiên nhiên, văn hóa và bản sắc Đà Lạt."
    />
    <meta property="og:image" content="/images/logo.png" />
  </Head>
  <MainLayout>
    <div class="container">
      <div class="pt-[80px]">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="text-center">
              {{ $t('faq') }}
            </h2>
            <div class="ql-editor mb-5">
              <div v-if="faq.length > 0" class="row pt-3">
                <div class="space-y-0 divide-y divide-gray-300">
                  <div v-for="(product, index) in faq" :key="index" class="border-none">
                    <button
                      :class="[index == 0 ? 'rounded-t-xl' : '', index == faq.length - 1 ? 'rounded-b-xl' : '']"
                      class="w-full flex justify-between items-center px-4 py-3 border-green-600 border bg-gray-100 hover:bg-gray-200 font-semibold"
                      :data-target="`collapse${index + 1}`"
                    >
                      <span>
                        {{
                          product.translations.find((t) => t.language.code == locale.toUpperCase())?.question ||
                          product.translations[0].question
                        }}
                      </span>
                      <svg
                        class="w-5 h-5 transform transition-transform duration-300"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                      </svg>
                    </button>
                    <div
                      :id="`collapse${index + 1}`"
                      class="hidden p-4 bg-gray-50 overflow-hidden transition-all duration-500 collapse-content"
                    >
                      <div
                        v-html="
                          product.translations.find((t) => t.language.code == locale.toUpperCase())?.answer ||
                          product.translations[0].answer
                        "
                      ></div>
                    </div>
                  </div>
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
import { Head } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'
import { defineProps, ref, onMounted } from 'vue'

const { t, locale } = useI18n()
const props = defineProps({
  faq: Object
})

const mounted = ref(false)

onMounted(() => {
  mounted.value = true
  document.querySelectorAll('button[data-target]').forEach((button) => {
    button.addEventListener('click', () => {
      const targetId = button.getAttribute('data-target')
      const targetElement = document.getElementById(targetId)

      // Ẩn tất cả các collapse khác
      document.querySelectorAll('.collapse-content').forEach((collapse) => {
        if (collapse !== targetElement) {
          collapse.classList.add('hidden')
        }
      })

      // Toggle trạng thái của collapse được click
      if (targetElement.classList.contains('hidden')) {
        targetElement.classList.remove('hidden')

        // Cuộn lên button sau khi mở collapse
        setTimeout(() => {
          window.scrollTo({
            top: button.offsetTop - 80,
            behavior: 'smooth'
          })
        }, 200)
      } else {
        targetElement.classList.add('hidden')
      }
    })
  })
})
</script>
<style scoped></style>
