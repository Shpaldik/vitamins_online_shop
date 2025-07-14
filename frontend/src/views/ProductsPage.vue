<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import axios from 'axios'
import type { Product } from '@/types/products'
import { Button } from '@/components/ui/button'
import { Badge } from '@/components/ui/badge'
import { Skeleton } from '@/components/ui/skeleton'
import Header from '@/components/Header.vue'

const route = useRoute()
const router = useRouter()
const product = ref<Product | null>(null)

onMounted(async () => {
  try {
    const response = await axios.get<Product>(`http://127.0.0.1:8000/api/products/${route.params.id}`)
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
  <section class="min-h-screen mt-20 px-4 sm:px-6 lg:px-8 py-12 bg-gradient-to-b from-white to-gray-50">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-start animate-fade-in">
      <!-- Изображение -->
      <div class="overflow-hidden rounded-3xl shadow-xl border bg-white">
        <img
          v-if="product"
          :src="`http://localhost:8000/storage/${product.image}`"
          alt="product"
          class="w-full object-cover h-auto transition-transform hover:scale-105 duration-500"
        />
        <Skeleton v-else class="w-full h-auto rounded-3xl" />
      </div>

      <!-- Информация -->
      <div v-if="product" class="space-y-6">
        <div>
          <h1 class="text-4xl font-extrabold tracking-tight">Название: {{ product.name }}</h1>
          <p class="text-muted-foreground mt-2 text-lg">Описание: {{ product.description }}</p>
        </div>

        <div class="flex flex-wrap items-center gap-2">
          <Badge variant="secondary">{{ product.category }}</Badge>
          <Badge variant="outline">{{ product.series }}</Badge>
          <Badge>{{ product.age_group }}+</Badge>
        </div>

        <div class="text-3xl font-bold text-primary mt-4">
          Цена: {{ product.price }} рублей
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm text-gray-600">
          <div><span class="font-semibold">Возраст:</span> {{ product.age_group }}</div>
          <div><span class="font-semibold">Таблеток:</span> {{ product.tablet_count }}</div>
        </div>

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
  animation: fade-in 0.6s ease-out;
}
</style>