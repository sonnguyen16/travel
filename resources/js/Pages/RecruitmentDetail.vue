<template>
  <Head>
    <title>
      {{ blog.translations.find((t) => t.language.code == locale.toUpperCase())?.name || blog.translations[0].name }}
    </title>
    <meta
      name="description"
      :content="
        cleanHTML(
          blog.translations.find((t) => t.language.code == locale.toUpperCase())?.description ||
            blog.translations[0].description
        )
      "
    />
    <meta
      property="og:title"
      :content="
        blog.translations.find((t) => t.language.code == locale.toUpperCase())?.name || blog.translations[0].name
      "
    />
    <meta
      property="og:description"
      :content="
        cleanHTML(
          blog.translations.find((t) => t.language.code == locale.toUpperCase())?.description ||
            blog.translations[0].description
        )
      "
    />
    <meta property="og:image" :content="app_url + BLOG_MEDIA_ENDPOINT + blog.image_fe?.picture" />
  </Head>
  <MainLayout>
    <div class="container">
      <div class="pt-[100px]">
        <div class="row">
          <div class="col-lg-8">
            <h2 class="text-center mb-5">
              {{
                blog.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                blog.translations[0].name
              }}
            </h2>
            <div
              v-html="
                blog.translations.find((t) => t.language.code == locale.toUpperCase())?.description ||
                blog.translations[0].description
              "
              class="ql-editor"
            ></div>
            <div class="mb-5">
              <ul class="list-disc">
                <li>
                  <span> {{ t('address') }}: </span>
                  <span>
                    {{
                      blog.translations.find((t) => t.language.code == locale.toUpperCase())?.address ||
                      blog.translations[0].address
                    }}
                  </span>
                </li>
                <li>
                  <span> {{ t('salary') }}: </span>
                  <span>
                    {{
                      blog.translations.find((t) => t.language.code == locale.toUpperCase())?.salary ||
                      blog.translations[0].salary
                    }}
                  </span>
                </li>
                <li>
                  <span> {{ t('working_form') }}: </span>
                  <span>
                    {{
                      blog.translations.find((t) => t.language.code == locale.toUpperCase())?.working_form ||
                      blog.translations[0].working_form
                    }}
                  </span>
                </li>
                <li>
                  <span> {{ t('unit') }}: </span>
                  <span>
                    {{
                      blog.translations.find((t) => t.language.code == locale.toUpperCase())?.unit ||
                      blog.translations[0].unit
                    }}
                  </span>
                </li>
                <li>
                  <span> {{ t('department') }}: </span>
                  <span>
                    {{
                      blog.translations.find((t) => t.language.code == locale.toUpperCase())?.department ||
                      blog.translations[0].department
                    }}
                  </span>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4">
            <h4 class="">
              {{ t('other_news') }}
            </h4>
            <hr />
            <template v-for="blog_related in blogs">
              <div
                v-if="blog.id != blog_related.id"
                @click.prevent="router.visit(`/tuyen-dung/${blog_related.slug}`)"
                class="flex gap-3 mb-4 hover:cursor-pointer"
              >
                <img
                  :src="RECRUITMENT_MEDIA_ENDPOINT + blog_related.image_fe?.picture"
                  alt="promo1"
                  class="w-[150px] object-cover rounded-xl"
                />
                <div>
                  <p class="mb-0 line-clamp-3">
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
    </div>
  </MainLayout>
</template>
<script setup>
import { BLOG_MEDIA_ENDPOINT, RECRUITMENT_MEDIA_ENDPOINT } from '@/Constants/endpoint'
import MainLayout from '@/Layouts/MainLayout.vue'
import { Head, router } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'

const { t, locale } = useI18n()
const props = defineProps({
  blog: Object,
  blogs: Object
})

const app_url = import.meta.env.VITE_APP_URL

const cleanHTML = (html) => {
  // Loại bỏ toàn bộ thẻ HTML
  return html?.replace(/<\/?[^>]+(>|$)/g, '')
}
</script>
<style scoped>
ul li span {
  font-weight: normal;
}
</style>
