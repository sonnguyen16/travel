<template>
  <Head>
    <title>Thư viện ảnh - Đà Lạt Tourist</title>
    <meta
      name="description"
      content="Dalattourist - Công ty du lịch - dịch vụ - lữ hành lâu đời nhất tại Đà Lạt. Được thành lập từ năm 1976, Dalattourist tiên phong cung cấp những dịch vụ du lịch gắn liền với thiên nhiên, văn hóa và bản sắc Đà Lạt."
    />
    <meta property="og:title" content="Thư viện ảnh - Đà Lạt Tourist" />
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
            <h2 class="text-center mb-5">
              {{ $t('gallery') }}
            </h2>
            <div class="mb-5">
              <div class="whitespace-nowrap flex border-b pb-2 mb-4 flex-wrap">
                <button
                  @click.prevent="currentLocation = 'all'"
                  class="tab-btn text-gray-600 pb-1 me-3"
                  :class="{ ' border-b-2 text-red-600 border-red-600 transition-all': currentLocation == 'all' }"
                >
                  {{ $t('all') }}
                </button>
                <button
                  @click.prevent="currentLocation = location.slug"
                  v-for="location in locations"
                  class="tab-btn text-gray-600 pb-1 me-3"
                  :class="{
                    '  border-b-2 text-red-600 border-red-600 transition-all': currentLocation == location.slug
                  }"
                >
                  {{ location.translations.find((t) => t.language.code == locale.toUpperCase())?.name }}
                </button>
              </div>

              <div class="grid md:grid-cols-3 gap-3">
                <img
                  v-if="currentLocation !== 'all'"
                  v-for="(image, index) in foundLocation.images"
                  :src="LOCATION_MEDIA_ENDPOINT + image.picture"
                  class="gallery-item rounded-lg h-[300px] object-cover w-full cursor-pointer"
                  alt="gallery"
                  @click="openPopup(index)"
                />

                <img
                  v-else
                  v-for="(image, index) in allImages.flat()"
                  :src="LOCATION_MEDIA_ENDPOINT + image.picture"
                  class="gallery-item rounded-lg h-[300px] object-cover w-full cursor-pointer"
                  alt="gallery"
                  @click="openPopup(index)"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div
      v-if="popupImage !== null"
      class="fixed inset-0 flex justify-center items-center z-[9999]"
      style="background-color: rgba(0, 0, 0, 0.5)"
      @click.self="popupImage = null"
    >
      <div class="relative w-[80%] max-w-4xl h-[75vh] bg-white shadow-lg rounded-lg flex justify-center items-center">
        <button
          class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-green-600 text-white h-[40px] w-[40px] p-2 rounded-full"
          @click.stop="prevImage"
        >
          &#10094;
        </button>
        <img :src="currentImage" class="max-w-[92%] h-[90%] object-cover" />
        <button
          class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-green-600 text-white h-[40px] w-[40px] p-2 rounded-full"
          @click.stop="nextImage"
        >
          &#10095;
        </button>
      </div>
    </div>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import { Head } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'
import { computed, ref } from 'vue'
import { LOCATION_MEDIA_ENDPOINT } from '@/Constants/endpoint'

const { t, locale } = useI18n()
const props = defineProps({
  locations: Object
})

const currentLocation = ref('all')
const popupImage = ref(null)
const imageIndex = ref(0)

const allImages = computed(() => props.locations.flatMap((location) => location.images))
const foundLocation = computed(() =>
  currentLocation.value === 'all' ? null : props.locations.find((location) => location.slug === currentLocation.value)
)
const images = computed(() => (currentLocation.value === 'all' ? allImages.value : foundLocation.value?.images || []))
const currentImage = computed(() =>
  images.value.length ? LOCATION_MEDIA_ENDPOINT + images.value[imageIndex.value].picture : ''
)

const openPopup = (index) => {
  imageIndex.value = index
  popupImage.value = true
}

const prevImage = () => {
  imageIndex.value = (imageIndex.value - 1 + images.value.length) % images.value.length
}

const nextImage = () => {
  imageIndex.value = (imageIndex.value + 1) % images.value.length
}
</script>

<style scoped></style>
