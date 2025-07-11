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
        <div v-if="showContent" class="row">
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

  <!-- Modal nhập mật khẩu -->
  <div v-if="showPasswordModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 w-96 max-w-90vw">
      <h3 class="text-lg font-semibold mb-4">{{ $t('enter_password') }}</h3>
      <p class="text-gray-600 mb-4">{{ $t('post_requires_password') }}</p>
      <input
        v-model="passwordInput"
        type="password"
        :placeholder="$t('password')"
        class="w-full border border-gray-300 rounded px-3 py-2 mb-4"
        @keyup.enter="checkPassword"
      />
      <div v-if="passwordError" class="text-red-500 text-sm mb-4">
        {{ $t('incorrect_password') }}
      </div>
      <div class="flex justify-end gap-3">
        <button @click="goBack" class="px-4 py-2 text-gray-600 hover:text-gray-800">
          {{ $t('cancel') }}
        </button>
        <button @click="checkPassword" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
          {{ $t('confirm') }}
        </button>
      </div>
    </div>
  </div>
</template>
<script setup>
import { BLOG_MEDIA_ENDPOINT } from '@/Constants/endpoint'
import MainLayout from '@/Layouts/MainLayout.vue'
import { Head, router } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'
import { defineProps, onMounted, ref } from 'vue'
import { cleanHTML } from '@/Assets/common'
import { initializeLocale } from '@/utils/locale.js'

const { t, locale } = useI18n()

// Khởi tạo ngôn ngữ
const initLocale = () => {
  initializeLocale(locale)
}

if (typeof window !== 'undefined') {
  initLocale()
}

const props = defineProps({
  blog: Object,
  requires_password: Boolean,
  password_error: Boolean
})

// State cho modal mật khẩu
const showPasswordModal = ref(false)
const passwordInput = ref('')
const passwordError = ref(false)
const showContent = ref(false)

onMounted(() => {
  // Đồng bộ ngôn ngữ
  initLocale()

  // Kiểm tra nếu blog có mật khẩu hoặc requires_password từ backend
  if (props.requires_password) {
    showPasswordModal.value = true
    showContent.value = false
    // Kiểm tra nếu có lỗi mật khẩu từ backend
    if (props.password_error) {
      passwordError.value = true
    }
  } else {
    showContent.value = true
  }

  const img = document.querySelectorAll('.ql-editor img')
  img.forEach((el) => {
    el.classList.add('img-fluid')
    el.style.height = 'auto'
  })
})

// Hàm kiểm tra mật khẩu
const checkPassword = async () => {
  try {
    passwordError.value = false

    const response = await axios.post(
      '/news/verify-password',
      {
        blog_id: props.blog.id,
        password: passwordInput.value
      },
      {
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
      }
    )

    if (response.data.success) {
      // Mật khẩu đúng
      showPasswordModal.value = false
      showContent.value = true
      passwordError.value = false
    } else {
      // Mật khẩu sai
      passwordError.value = true
    }
  } catch (error) {
    console.error('Lỗi kiểm tra mật khẩu:', error)
    passwordError.value = true
  }
}

// Hàm quay lại
const goBack = () => {
  window.history.back()
}
</script>
<style scoped></style>
