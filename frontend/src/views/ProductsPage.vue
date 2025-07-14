<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import axios from 'axios'
import type { Product } from '@/types/products'
import { Button } from '@/components/ui/button'
import { Badge } from '@/components/ui/badge'
import { Skeleton } from '@/components/ui/skeleton'
import Header from '@/components/Header.vue'
import Footer from '@/components/Footer.vue'

const route = useRoute()
const router = useRouter()
const product = ref<Product | null>(null)

onMounted(async () => {
  try {
    const response = await axios.get<Product>(
      `http://127.0.0.1:8000/api/products/${route.params.id}`
    )
    product.value = response.data
  } catch (error) {
    console.error('Ошибка при загрузке товара:', error)
  }
})

const goBack = () => {
  router.back()
}
</script>

<template>
  <Header />

  <section class="min-h-screen mt-24 px-4 sm:px-8 lg:px-16 py-16 bg-white">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-start animate-fade-in">

      <!-- Изображения -->
      <div class="flex flex-col lg:flex-row gap-6">
        <!-- Галерея -->
        <div
          v-if="product?.images?.length > 1"
          class="flex lg:flex-col gap-3 lg:overflow-y-auto max-h-[480px] pr-1"
        >
          <img
            v-for="(img, idx) in product.images"
            :key="idx"
            :src="`http://localhost:8000/storage/${img}`"
            class="w-20 h-20 object-cover rounded-lg border hover:ring-2 ring-primary cursor-pointer transition hover:scale-105"
            alt="Миниатюра"
          />
        </div>

        <!-- Главное изображение -->
        <div class="flex-1 rounded-2xl shadow-md border bg-white min-h-[400px] flex items-center justify-center">
          <img
            v-if="product?.images?.length"
            :src="`http://localhost:8000/storage/${product.images[0]}`"
            alt="Изображение товара"
            class="max-h-[460px] w-auto object-contain transition-transform hover:scale-105 duration-500"
          />
          <Skeleton v-else class="w-full h-[400px] rounded-2xl" />
        </div>
      </div>

      <!-- Детали товара -->
      <div v-if="product" class="space-y-6">
        <div>
          <h1 class="text-3xl font-semibold tracking-tight text-gray-900">{{ product.name }}</h1>
          <p class="text-gray-500 mt-2 text-base leading-relaxed">{{ product.description }}</p>
        </div>

        <!-- Метки -->
        <div class="flex flex-wrap gap-2">
          <Badge variant="secondary">{{ product.category }}</Badge>
          <Badge variant="outline">{{ product.series }}</Badge>
          <Badge>{{ product.age_group }}+</Badge>
        </div>

        <!-- Инструкция -->
        <div v-if="product.instruction_file">
          <a
            :href="`http://localhost:8000/storage/${product.instruction_file}`"
            target="_blank"
            download
            class="text-sm text-primary hover:underline"
          >
            📄 Скачать инструкцию
          </a>
        </div>

        <!-- Цена -->
        <div class="text-2xl font-bold text-primary mt-4">
          {{ product.price }} ₽
        </div>

        <!-- Характеристики -->
        <div class="grid grid-cols-2 gap-x-4 gap-y-2 text-sm text-gray-600 mt-2">
          <div><span class="font-medium text-gray-700">Возраст:</span> {{ product.age_group }}</div>
          <div><span class="font-medium text-gray-700">Таблеток:</span> {{ product.tablet_count }}</div>
        </div>

        <!-- Кнопки -->
        <div class="flex flex-col sm:flex-row gap-4 pt-6">
          <Button variant="outline" class="w-full sm:w-auto" @click="goBack">← Назад</Button>
          <Button variant="default" class="w-full sm:w-auto">🛒 Купить</Button>
        </div>
      </div>

      <div v-else class="text-center text-muted-foreground col-span-full py-24">
        Загрузка товара...
      </div>
    </div>
  </section>
  <Footer />
</template>

<style scoped>
@keyframes fade-in {
  from {
    opacity: 0;
    transform: translateY(15px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
.animate-fade-in {
  animation: fade-in 0.5s ease-out;
}
</style>