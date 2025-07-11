<template>
  <MainLayout>
    <Head>
      <title>Tin tức - Đà Lạt Tourist</title>
      <meta
        name="description"
        content="Dalattourist - Công ty du lịch - dịch vụ - lữ hành lâu đời nhất tại Đà Lạt. Được thành lập từ năm 1976, Dalattourist tiên phong cung cấp những dịch vụ du lịch gắn liền với thiên nhiên, văn hóa và bản sắc Đà Lạt."
      />
      <meta property="og:title" content="Tin tức - Đà Lạt Tourist" />
      <meta
        property="og:description"
        content="Dalattourist - Công ty du lịch - dịch vụ - lữ hành lâu đời nhất tại Đà Lạt. Được thành lập từ năm 1976, Dalattourist tiên phong cung cấp những dịch vụ du lịch gắn liền với thiên nhiên, văn hóa và bản sắc Đà Lạt."
      />
      <meta property="og:image" content="/images/logo.png" />
    </Head>
    <div class="container pt-[80px]">
      <div class="flex gap-2 mb-3">
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
          @click.prevent="router.visit('/tin-tuc/' + menu.slug)"
          class="text-gray-500 hover:text-gray-700 hover:cursor-pointer"
          >{{
            menu.translations?.find((t) => t.language.code == locale.toUpperCase())?.name || menu.translations?.[0].name
          }}</a
        >
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <template v-if="blogs.data.length > 0" v-for="blog in blogs.data">
              <div @click.prevent="navigateToBlog(blog)" class="col-md-6 mb-4 hover:cursor-pointer">
                <div class="img-container w-full">
                  <img
                    :src="BLOG_MEDIA_ENDPOINT + blog.image_fe?.picture"
                    alt="home1"
                    class="w-full object-cover rounded-lg hover:cursor-pointer"
                  />
                </div>
                <h5 class="line-clamp-2 mt-2">
                  {{
                    blog.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                    blog.translations[0].name
                  }}
                </h5>
                <span>
                  <i class="far fa-calendar-alt"></i>
                  {{
                    new Date(blog.created_at).toLocaleDateString(locale, {
                      year: 'numeric',
                      month: 'long',
                      day: 'numeric'
                    })
                  }}
                </span>
                <div
                  class="line-clamp-3 mt-2"
                  v-html="
                    blog.translations.find((t) => t.language.code == locale.toUpperCase())?.description ||
                    blog.translations[0].description
                  "
                ></div>
              </div>
            </template>
            <template v-else>
              <div class="col-md-12">
                <p>{{ t('no_data') }}</p>
              </div>
            </template>
          </div>
          <Pagination :all-data="blogs" @changePage="changePage" />
        </div>
        <div class="col-md-4">
          <form>
            <div class="input-group mb-3">
              <input
                type="text"
                class="form-control"
                :placeholder="$t('search')"
                v-model="search"
                aria-label="Recipient's username"
                aria-describedby="button-addon2"
              />
              <button @click.prevent="searchNews" class="btn btn-outline-secondary" type="submit" id="button-addon2">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>
          <h4 class="">
            {{ t('other_promotions') }}
          </h4>
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
          <h4 class="">
            {{ t('recruitment') }}
          </h4>
          <hr />
          <template v-for="r in recruitment">
            <div @click.prevent="router.visit(`/tuyen-dung/${r.slug}`)" class="flex gap-3 mb-4 hover:cursor-pointer">
              <img
                :src="RECRUITMENT_MEDIA_ENDPOINT + r.image_fe?.picture"
                alt="promo1"
                class="w-[150px] h-[100px] object-cover rounded-xl"
              />
              <div>
                <p class="mb-0 line-clamp-3">
                  {{
                    r.translations.find((t) => t.language.code == locale.toUpperCase())?.name || r.translations[0].name
                  }}
                </p>
                <p class="text-sm mt-2">
                  <i class="far fa-calendar"></i>
                  {{
                    new Date(r.created_at).toLocaleDateString(locale, {
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
        <button @click="closePasswordModal" class="px-4 py-2 text-gray-600 hover:text-gray-800">
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
import MainLayout from '@/Layouts/MainLayout.vue'
import Pagination from '@/Components/Pagination.vue'
import { router, Head } from '@inertiajs/vue3'
import { onMounted, ref } from 'vue'
import { useI18n } from 'vue-i18n'
import { BLOG_MEDIA_ENDPOINT, RECRUITMENT_MEDIA_ENDPOINT } from '@/Constants/endpoint'
import { initializeLocale } from '@/utils/locale.js'
import axios from 'axios'

const props = defineProps({
  blogs: Object,
  menu: Object,
  category: Object,
  promo: Object,
  recruitment: Object
})
const { t, locale } = useI18n()

// Khởi tạo ngôn ngữ
const initLocale = () => {
  initializeLocale(locale)
}

if (typeof window !== 'undefined') {
  initLocale()
}

const mounted = ref(false)
const search = ref('')

// State cho modal mật khẩu
const showPasswordModal = ref(false)
const passwordInput = ref('')
const passwordError = ref(false)
const selectedBlog = ref(null)

const searchNews = () => {
  router.visit(`/tin-tuc/${props.menu.slug}?search=${search.value}`, {
    preserveState: true
  })
}

onMounted(async () => {
  // Đồng bộ ngôn ngữ
  initLocale()

  const paragraphs = document.querySelectorAll('.text-description p')

  paragraphs.forEach((p) => {
    p.style.color = 'white'
  })
  mounted.value = true
  if (typeof window !== 'undefined' && typeof document !== 'undefined') {
    const ScrollReveal = (await import('scrollreveal')).default
    const scrollReveal = ScrollReveal()
    // ScrollReveal - Hiệu ứng cho Swiper
    scrollReveal.reveal('#service-4', {
      duration: 2000,
      origin: 'bottom',
      distance: '100px',
      easing: 'ease-in-out',
      interval: 5000
    })
  }
})

const changePage = (page) => {
  router.visit(route('news.category', { page: page }), {
    preserveState: true
  })
}

// Hàm kiểm tra và điều hướng blog
const navigateToBlog = (blog) => {
  // Kiểm tra xem blog có mật khẩu không
  if (blog.password && blog.password.trim() !== '') {
    selectedBlog.value = blog
    showPasswordModal.value = true
    passwordInput.value = ''
    passwordError.value = false
  } else {
    // Nếu không có mật khẩu, điều hướng trực tiếp
    if (blog.menu?.menu?.[0]?.slug) {
      router.visit(`/tin-tuc/${blog.menu.menu[0].slug}/${blog.slug}`)
    } else {
      router.visit(`/tin-tuc/${blog.slug}`)
    }
  }
}

// Hàm kiểm tra mật khẩu
const checkPassword = async () => {
  if (!selectedBlog.value) {
    passwordError.value = true
    return
  }

  try {
    passwordError.value = false

    const response = await axios.post(
      '/news/verify-password',
      {
        blog_id: selectedBlog.value.id,
        password: passwordInput.value
      },
      {
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
      }
    )

    if (response.data.success) {
      // Mật khẩu đúng, điều hướng
      if (selectedBlog.value.menu?.menu?.[0]?.slug) {
        router.visit(`/tin-tuc/${selectedBlog.value.menu.menu[0].slug}/${selectedBlog.value.slug}`)
      } else {
        router.visit(`/tin-tuc/${selectedBlog.value.slug}`)
      }
      closePasswordModal()
    } else {
      // Mật khẩu sai
      passwordError.value = true
    }
  } catch (error) {
    console.error('Lỗi kiểm tra mật khẩu:', error)
    passwordError.value = true
  }
}

// Hàm đóng modal
const closePasswordModal = () => {
  showPasswordModal.value = false
  passwordInput.value = ''
  passwordError.value = false
  selectedBlog.value = null
}
</script>
<style scoped>
.overlay {
  background: linear-gradient(
    to top,
    rgba(0, 0, 0, 0.9),
    rgba(0, 0, 0, 0.7),
    rgba(0, 0, 0, 0.5),
    rgba(0, 0, 0, 0.3),
    rgba(255, 255, 255, 0)
  );
}

.swiper-slide {
  height: 620px;
}
@media (max-width: 768px) {
  .swiper-slide {
    opacity: 0;
    transform: translateY(50px);
    transition: all 1s ease-in-out;
  }

  .swiper-slide-active {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Tùy chỉnh nút prev và next */
.swiper-button-prev,
.swiper-button-next {
  width: 40px; /* Kích thước nút */
  height: 40px;
  background-color: white; /* Nền trắng */
  border: 2px solid green; /* Viền xanh lá cây */
  border-radius: 50%; /* Hình tròn */
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Tạo bóng nhẹ */
  transition: all 0.3s ease; /* Hiệu ứng khi hover */
}

/* Biểu tượng mũi tên */
.swiper-button-prev::after,
.swiper-button-next::after {
  color: green; /* Mũi tên màu xanh lá cây */
  font-size: 16px;
  font-weight: bold;
}

/* Hiệu ứng hover */
.swiper-button-prev:hover,
.swiper-button-next:hover {
  background-color: green; /* Đổi nền thành xanh lá cây */
  color: white; /* Đổi màu mũi tên */
}

.swiper-button-prev:hover::after,
.swiper-button-next:hover::after {
  color: white; /* Mũi tên màu trắng khi hover */
}

.slide-content {
  position: absolute;
  bottom: 10px;
  left: 10px;
  right: 10px;
  background: rgba(0, 0, 0, 0.5);
  color: #fff;
  padding: 10px;
  border-radius: 8px;
}
</style>
