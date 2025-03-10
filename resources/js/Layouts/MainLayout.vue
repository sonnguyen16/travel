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
</script>
<style lang="css" scoped>
.main {
  background: url('@/Assets/images/background.jpg') no-repeat center center;
  background-size: cover;
}
</style>
