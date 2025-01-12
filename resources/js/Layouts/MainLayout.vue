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
import '@/Assets/fonts/Geomanist/Geomanist-Black.otf'
import '@/Assets/fonts/Geomanist/Geomanist-Bold.otf'
import '@/Assets/fonts/Geomanist/Geomanist-Light.otf'
import '@/Assets/fonts/Geomanist/Geomanist-Medium.otf'
import '@/Assets/fonts/Geomanist/Geomanist-Regular.otf'
import '@/Assets/fonts/Geomanist/Geomanist-Thin.otf'
import '@/Assets/fonts/Geomanist/Geomanist-Ultra.otf'

import Header from '@/Components/Header.vue'
import Footer from '@/Components/Footer.vue'
</script>
<style lang="css" scoped>
.main {
  background: url('@/Assets/images/background.jpg') no-repeat center center;
}
</style>
