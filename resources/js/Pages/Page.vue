<template>
  <Head>
    <title>
      {{ page.translations.find((t) => t.language.code == locale.toUpperCase())?.name || page.translations[0].name }}
    </title>
    <meta
      name="description"
      :content="
        cleanHTML(
          page.translations.find((t) => t.language.code == locale.toUpperCase())?.description ||
            page.translations[0].description
        )
      "
    />
    <meta
      property="og:title"
      :content="
        page.translations.find((t) => t.language.code == locale.toUpperCase())?.name || page.translations[0].name
      "
    />
    <meta
      property="og:description"
      :content="
        cleanHTML(
          page.translations.find((t) => t.language.code == locale.toUpperCase())?.description ||
            page.translations[0].description
        )
      "
    />
    <meta property="og:image" :content="app_url + '/images/logo.png'" />
  </Head>
  <MainLayout>
    <div class="container">
      <div class="pt-[100px]">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="text-center mb-5">
              {{
                page.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                page.translations[0].name
              }}
            </h2>
            <div
              v-html="
                page.translations.find((t) => t.language.code == locale.toUpperCase())?.content ||
                page.translations[0].content
              "
              class="ql-editor mb-5"
            ></div>
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

const { t, locale } = useI18n()
const props = defineProps({
  page: Object
})

const app_url = import.meta.env.VITE_APP_URL

const cleanHTML = (html) => {
  // Loại bỏ toàn bộ thẻ HTML
  return html?.replace(/<\/?[^>]+(>|$)/g, '')
}
</script>
<style scoped></style>
