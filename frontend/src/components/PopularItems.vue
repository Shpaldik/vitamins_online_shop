<script setup lang="ts">
import {
  Rocket,
  Sparkles,
  ShieldCheck,
  Users,
  PiggyBank,
  HeartHandshake,
} from 'lucide-vue-next'

const features = [
  {
    title: 'Название',
    description:
      'Категория',
        img: 'https://vitamir.ru/wp-content/uploads/2024/09/wms-product-pikolinat-hroma-premium-30t-1.jpg',
    amount: 1,
  },
  {
    title: 'Название',
    description:
      'Категория',
        img: 'https://vitamir.ru/wp-content/uploads/2024/09/wms-product-pikolinat-hroma-premium-30t-1.jpg',
    amount: 1,
  },
  {
    title: 'Название',
    description:
      'Категория',
        img: 'https://vitamir.ru/wp-content/uploads/2024/09/wms-product-pikolinat-hroma-premium-30t-1.jpg',
    amount: 1,
  },
  {
    title: 'Название',
    description:
      'Категория',
        img: 'https://vitamir.ru/wp-content/uploads/2024/09/wms-product-pikolinat-hroma-premium-30t-1.jpg',
    amount: 1,
  },
  {
    title: 'Название',
    description:
      'Категория',
        img: 'https://vitamir.ru/wp-content/uploads/2024/09/wms-product-pikolinat-hroma-premium-30t-1.jpg',
    amount: 1,
  },
  {
    title: 'Название',
    description:
      'Категория',
        img: 'https://vitamir.ru/wp-content/uploads/2024/09/wms-product-pikolinat-hroma-premium-30t-1.jpg',
    amount: 1,
  },
]
</script>

<template>
  <section class="relative w-full flex items-center bg-white">
    <div class="container mx-auto px-4 md:px-6 lg:px-8">
      <!-- Header -->
      <div class="text-center mb-12 max-w-3xl mx-auto">
        <h2 class="text-4xl font-bold tracking-tighter sm:text-5xl">
          <span class="text-primary">Популярные товары</span>
        </h2>
      </div>

      <!-- Features Grid -->
      <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 mt-16">
        <div v-for="(feature, idx) in features" :key="idx"
          class="group relative bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300">
          <!-- Icon Container -->
          <div class="mb-6">
            <div
              class="inline-flex items-center justify-center  rounded-xl group-hover:bg-primary transition-colors duration-300">
              <img :src="feature.img"
                class="w-80 text-primary group-hover:text-white transition-colors duration-300" />
            </div>
          </div>

          <!-- Content -->
          <div>
            <h3 class="text-xl font-semibold mb-3">{{ feature.title }}</h3>
            <p class="text-muted-foreground">{{ feature.description }}</p>
            <p class="font-bold mt-2">{{ feature.amount }} таблеток</p>
          </div>

          <!-- Hover Effect Line -->
          <div
            class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-primary to-primary/60 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300" />
        </div>
      </div>
    </div>
  </section>
</template>