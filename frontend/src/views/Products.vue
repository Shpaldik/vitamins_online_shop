<template>
    <div class="grid grid-cols gap-10 mx-4 sm:mx-8 md:mx-16 lg:mx-32 xl:mx-40">
        <Header />
        <ProductsBlock class="mt-10"/>
        <Footer class="mt-0"/>
    </div>
</template>

<script setup lang="ts">
import Header from '@/components/Header.vue';
import ProductsBlock from '@/components/ProductsBlock.vue';
import Footer from '@/components/Footer.vue';
</script>