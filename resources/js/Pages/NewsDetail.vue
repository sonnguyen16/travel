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
    <meta property="og:image" :content="BLOG_MEDIA_ENDPOINT + blog.image_fe?.picture" />
  </Head>
  <MainLayout>
    <div class="container">
      <div class="pt-[70px]">
        <!-- breadcum -->
        <div class="flex gap-2 mb-3 flex-wrap">
          <a @click.prevent="router.visit('/')" class="text-gray-500 hover:text-gray-700 hover:cursor-pointer">
            <i class="fas fa-home"></i>
          </a>
          <span class="text-gray-500">
            <i class="fas fa-chevron-right"></i>
          </span>
          <a @click.prevent="router.visit('/tin-tuc')" class="text-gray-500 hover:text-gray-700 hover:cursor-pointer">{{
            t('news')
          }}</a>
          <span class="text-gray-500">
            <i class="fas fa-chevron-right"></i>
          </span>
          <a
            @click.prevent="router.visit('/tin-tuc/' + blog.news_category?.slug)"
            class="text-gray-500 hover:text-gray-700 hover:cursor-pointer"
            >{{
              blog.news_category?.translations?.find((t) => t.language.code == locale.toUpperCase())?.name ||
              blog.news_category?.translations?.[0].name
            }}</a
          >
          <span class="text-gray-500">
            <i class="fas fa-chevron-right"></i>
          </span>
          <span class="text-gray-500">
            {{
              blog.translations.find((t) => t.language.code == locale.toUpperCase())?.name || blog.translations[0].name
            }}
          </span>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <h2 class="text-start mb-3">
              {{
                blog.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                blog.translations[0].name
              }}
            </h2>
            <div
              v-html="
                blog.translations.find((t) => t.language.code == locale.toUpperCase())?.content ||
                blog.translations[0].content
              "
              class="ql-editor mb-5"
            ></div>
          </div>
          <div class="col-lg-4">
            <h4 class="">
              {{ t('other_news') }}
            </h4>
            <hr />
            <template v-for="blog_related in blog.menu.blogs.slice(0, 11)">
              <div
                v-if="blog.id != blog_related.id && blog_related.active == 1"
                @click.prevent="router.visit(`/tin-tuc/${blog.news_category?.slug}/${blog_related.slug}`)"
                class="flex gap-3 mb-4 hover:cursor-pointer"
              >
                <img
                  :src="BLOG_MEDIA_ENDPOINT + blog_related.image_fe?.picture"
                  alt="promo1"
                  class="w-[150px] h-[100px] object-cover rounded-xl"
                />
                <div style="width: calc(100% - 150px)">
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
import { BLOG_MEDIA_ENDPOINT } from '@/Constants/endpoint'
import MainLayout from '@/Layouts/MainLayout.vue'
import { Head, router } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'
import { defineProps, onMounted } from 'vue'
import { cleanHTML } from '@/Assets/common'

const { t, locale } = useI18n()
const props = defineProps({
  blog: Object
})

onMounted(() => {
  const img = document.querySelectorAll('.ql-editor img')
  img.forEach((el) => {
    el.classList.add('img-fluid')
    el.style.height = 'auto'
  })
})
</script>
<style scoped></style>
