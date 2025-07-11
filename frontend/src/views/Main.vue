<template>
  <div class="grid grid-cols gap-y-20 mx-4 sm:mx-8 md:mx-16 lg:mx-32 xl:mx-40">
    <Header />
    <Banner class="mt-20"/>
    <Categories />
    <Pharmacy />
    <PopularItems />
    <AboutBrand />
    <Footer id="footer"/>
  </div>
</template>

<script lang="ts" setup>
import Header from '../components/Header.vue'
import Banner from '../components/Banner.vue'
import Categories from '../components/Categories.vue'
import Pharmacy from '../components/Pharmacy.vue'
import PopularItems from '../components/PopularItems.vue'
import AboutBrand from '../components/AboutBrand.vue'
import Footer from '../components/Footer.vue'
</script>
