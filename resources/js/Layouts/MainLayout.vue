<template>
  <Header></Header>
  <div class="main">
    <slot></slot>
  </div>
  <Footer></Footer>
</template>
<script setup>
import '@/Assets/bootstrap/css/bootstrap.min.css'
import '@/Assets/fontawesome/css/all.min.css'
import '@/Assets/style.css'
import Header from '@/Components/Header.vue'
import Footer from '@/Components/Footer.vue'
import { usePage } from '@inertiajs/vue3'
import { BANNER_MEDIA_ENDPOINT } from '@/Constants/endpoint'
import { computed, onMounted } from 'vue'

const page = usePage()
const background = computed(() => page.props.background)

onMounted(() => {
  if (background.value.picture) {
    const main = document.querySelector('.main')
    main.style.background = `url(${BANNER_MEDIA_ENDPOINT + background.value.picture})`
    main.style.backgroundSize = 'cover'
    main.style.backgroundPosition = 'center'
    main.style.backgroundRepeat = 'no-repeat'
  }
})
</script>
<style lang="css" scoped>
.main {
  background: url('@/Assets/images/background.jpg') no-repeat center center;
  background-size: cover;
}
</style>
