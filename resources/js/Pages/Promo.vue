<template>
  <MainLayout>
    <Head>
      <title>Ưu đãi - Dalattourist</title>
      <meta
        name="description"
        content="Dalattourist - Công ty du lịch - dịch vụ - lữ hành lâu đời nhất tại Đà Lạt. Được thành lập từ năm 1976, Dalattourist tiên phong cung cấp những dịch vụ du lịch gắn liền với thiên nhiên, văn hóa và bản sắc Đà Lạt."
      />
      <meta property="og:title" content="Ưu đãi - Dalattourist" />
      <meta
        property="og:description"
        content="Dalattourist - Công ty du lịch - dịch vụ - lữ hành lâu đời nhất tại Đà Lạt. Được thành lập từ năm 1976, Dalattourist tiên phong cung cấp những dịch vụ du lịch gắn liền với thiên nhiên, văn hóa và bản sắc Đà Lạt."
      />
      <meta property="og:image" content="/images/logo.png" />
    </Head>

    <!-- Ưu đãi nổi bật -->
    <div class="container pt-[70px]">
      <h2 class="section-title fw-bold mb-4 uppercase font-bold text-[32px]">
        {{ $t('promo.highlight') }}
      </h2>

      <div class="row g-3">
        <!-- Ưu đãi lớn bên trái -->
        <div class="col-md-8">
          <div
            v-if="blogs?.length > 0 && mounted"
            @click.prevent="router.visit(`/uu-dai/${blogs[0].slug}`)"
            class="img-container w-full hover:cursor-pointer big-promo"
          >
            <img
              :src="BLOG_MEDIA_ENDPOINT + blogs[0].image_fe?.picture"
              alt="Ưu đãi nổi bật"
              class="w-full object-cover rounded-lg hover:cursor-pointer"
            />
          </div>
        </div>

        <!-- Ưu đãi nhỏ bên phải -->
        <div class="col-md-4">
          <div
            v-if="blogs?.length > 1 && mounted"
            @click.prevent="router.visit(`/uu-dai/${blogs[1].slug}`)"
            class="img-container w-full mb-3 small-promo"
          >
            <img
              :src="BLOG_MEDIA_ENDPOINT + blogs[1].image_fe?.picture"
              alt="Ưu đãi"
              class="w-full object-cover rounded-lg hover:cursor-pointer"
            />
          </div>

          <div
            v-if="blogs?.length > 2 && mounted"
            @click.prevent="router.visit(`/uu-dai/${blogs[2].slug}`)"
            class="img-container w-full small-promo"
          >
            <img
              :src="BLOG_MEDIA_ENDPOINT + blogs[2].image_fe?.picture"
              alt="Ưu đãi"
              class="w-full object-cover rounded-lg hover:cursor-pointer"
            />
          </div>
        </div>
      </div>
    </div>

    <!-- Ưu đãi theo điểm đến -->
    <div class="container mt-5 mb-5">
      <h2 class="section-title fw-bold mb-4 uppercase font-bold text-[32px]">
        {{ $t('promo.destination') }}
      </h2>

      <!-- Tabs điểm đến -->
      <ul class="nav nav-tabs mb-4 border-0">
        <li v-for="dest in destinations" :key="dest.id" class="nav-item">
          <a
            class="nav-link"
            :class="{ active: selectedTab === dest.id }"
            href="#"
            @click.prevent="selectedTab = dest.id"
          >
            {{ dest.name }}
          </a>
        </li>
      </ul>

      <!-- Danh sách ưu đãi theo điểm đến -->
      <div class="row g-4">
        <template v-if="filteredBlogs.length > 0 && mounted" v-for="blog in filteredBlogs" :key="blog.id">
          <div class="col-md-4">
            <div
              @click.prevent="router.visit(`/uu-dai/${blog.slug}`)"
              class="promo-location-card bg-white shadow-md hover:cursor-pointer"
            >
              <img
                :src="BLOG_MEDIA_ENDPOINT + blog.image_fe?.picture"
                alt="Ưu đãi"
                class="w-100 object-cover"
                style="height: 200px; border-top-left-radius: 8px; border-top-right-radius: 8px"
              />
              <div class="p-3">
                <div class="location mb-2">
                  <i class="fas fa-map-marker-alt text-danger me-2"></i>
                  <span class="text-secondary small">
                    {{
                      locations
                        ?.find((loc) => loc.id === blog.location_id)
                        ?.translations.find((t) => t.language.code === locale.toUpperCase())?.name ||
                      locations?.find((loc) => loc.id === blog.location_id)?.translations[0]?.name ||
                      'Không xác định'
                    }}
                  </span>
                </div>
                <h5 class="text-dark mb-0 line-clamp-2">
                  {{
                    blog.translations.find((t) => t.language.code == locale.toUpperCase())?.name ||
                    blog.translations[0].name
                  }}
                </h5>
              </div>
            </div>
          </div>
        </template>

        <!-- Hiển thị thông báo khi không có ưu đãi nào -->
        <div v-if="filteredBlogs.length === 0 && mounted" class="col-12 text-center py-5">
          <p class="text-muted">
            {{ t('no_promo') }}
          </p>
        </div>
      </div>
    </div>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import { router, Head } from '@inertiajs/vue3'
import { onMounted, ref, computed } from 'vue'
import { BANNER_MEDIA_ENDPOINT, PRODUCT_MEDIA_ENDPOINT, BLOG_MEDIA_ENDPOINT } from '@/Constants/endpoint'
import { useI18n } from 'vue-i18n'

const { t, locale } = useI18n()
const props = defineProps({
  blogs: Object,
  products: Object,
  banner: Object,
  locations: Object
})
const mounted = ref(false)

// Thêm ref cho selectedTab
const selectedTab = ref('all')

// Tạo danh sách điểm đến từ locations
const destinations = computed(() => {
  if (!props.locations) return [{ id: 'all', name: 'Tất cả' }]

  const locationItems = props.locations.map((location) => ({
    id: location.id.toString(),
    name:
      location.translations.find((t) => t.language.code === locale.value.toUpperCase())?.name ||
      location.translations[0]?.name ||
      'Không có tên'
  }))

  return [{ id: 'all', name: t('all') }, ...locationItems]
})

// Lọc blogs theo location_id
const filteredBlogs = computed(() => {
  if (!props.blogs) return []
  if (selectedTab.value === 'all') return props.blogs

  return props.blogs.filter((blog) => blog.location_id?.toString() === selectedTab.value)
})

onMounted(async () => {
  mounted.value = true
  if (typeof window !== 'undefined' && typeof document !== 'undefined') {
    const ScrollReveal = (await import('scrollreveal')).default
    const scrollReveal = ScrollReveal()

    // ScrollReveal - Hiệu ứng cho các phần
    ScrollReveal().reveal('.section-title', {
      duration: 1500,
      origin: 'left',
      distance: '50px',
      easing: 'ease-in-out'
    })

    scrollReveal.reveal('.img-container', {
      duration: 1500,
      origin: 'bottom',
      distance: '30px',
      easing: 'ease-in-out',
      interval: 200
    })

    scrollReveal.reveal('.promo-location-card', {
      duration: 1500,
      origin: 'bottom',
      distance: '30px',
      easing: 'ease-in-out',
      interval: 100
    })
  }
})
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
  padding-top: 20px;
}

.promo-overlay {
  background: linear-gradient(
    to top,
    rgba(22, 163, 74, 1),
    rgba(22, 163, 74, 0.8),
    rgba(22, 163, 74, 0.4),
    rgba(255, 255, 255, 0)
  );
}

.nav-tabs {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  border-bottom: none;
  padding-bottom: 8px;
  overflow-x: initial;
  -webkit-overflow-scrolling: initial;
  scrollbar-width: initial;
  -ms-overflow-style: initial;
}

.nav-tabs::-webkit-scrollbar {
  display: initial;
}

.nav-tabs .nav-item {
  margin-bottom: 8px;
}

.nav-tabs .nav-link {
  white-space: nowrap;
  color: #333;
  border: none;
  padding: 0.5rem 1rem;
  font-weight: 500;
  border-bottom: 2px solid transparent;
  transition: all 0.3s ease;
  border-radius: 4px;
}

.nav-tabs .nav-link.active {
  color: #16a34a;
  background: rgba(22, 163, 74, 0.1);
  border-bottom: 4px solid #16a34a;
}

.nav-tabs .nav-link:hover:not(.active) {
  border-bottom: 4px solid #ddd;
  color: #16a34a;
  background: rgba(22, 163, 74, 0.05);
}

.location-badge {
  font-size: 0.8rem;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.slide-content {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
}

.img-container {
  position: relative;
  overflow: hidden;
  border-radius: 0.5rem;
}

.img-container img {
  transition: transform 0.3s ease;
  height: 100%;
  width: 100%;
  object-fit: cover;
}

.img-container:hover img {
  transform: scale(1.05);
}

.big-promo {
  height: 418px;
}

.small-promo {
  height: 200px;
}

@media (max-width: 768px) {
  .big-promo {
    height: 300px;
  }

  .small-promo {
    height: 150px;
  }
}

.promo-location-card {
  border-radius: 8px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  overflow: hidden;
}

.promo-location-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.location {
  display: flex;
  align-items: center;
}

/* Loại bỏ các style không cần thiết */
.location-badge,
.promo-overlay {
  display: none;
}
</style>
