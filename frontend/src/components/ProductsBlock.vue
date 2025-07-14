<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'
import FilterPanel from './FilterPanel.vue'
import { Sheet, SheetContent, SheetTrigger } from '@/components/ui/sheet'
import { Button } from '@/components/ui/button'
import axios from 'axios'
import type { Product } from '@/types/products'

const filtersModel = ref<Record<string, string[]>>({})
const products = ref<Product[]>([])
const filters = ref<Record<string, string[]>>({})

const keyMap: Record<string, keyof Product> = {
  'Серия': 'series',
  'Категория': 'category',
  'Люди': 'age_group',
}

const filteredFeatures = computed(() => {
  return products.value.filter((product) => {
    return Object.entries(filtersModel.value).every(([key, selected]) => {
      const field = keyMap[key]
      const value = String((product as any)[field] ?? '')
      return selected.length === 0 || selected.includes(value)
    })
  })
})

const isMobile = ref(false)
const showFilters = ref(false)

onMounted(async () => {
  try {
    const response = await axios.get<Product[]>('http://127.0.0.1:8000/api/products')
    products.value = response.data

    console.log('Products:', products.value)

    const series = new Set<string>()
    const categories = new Set<string>()
    const people = new Set<string>()

    for (const p of response.data) {
      if (p.series) series.add(p.series)
      if (p.category) categories.add(p.category)
      if (p.age_group) people.add(p.age_group)
    }

    filters.value = {
      'Серия': Array.from(series),
      'Категория': Array.from(categories),
      'Люди': Array.from(people),
    }
    

    // ❗ Инициализация модели фильтров
    filtersModel.value = Object.keys(filters.value).reduce((acc, key) => {
      acc[key] = []
      return acc
    }, {} as Record<string, string[]>)

  } catch (error) {
    console.error('Ошибка при загрузке данных:', error)
  }

  const check = () => {
    isMobile.value = window.innerWidth < 1024
  }
  check()
  window.addEventListener('resize', check)
})
</script>

<template>
  <section class="bg-white py-8 md:py-16 lg:py-24 mt-20">
    <div class="container mx-auto px-4 md:px-6 lg:px-8">
      <h2 class="text-4xl font-bold tracking-tighter sm:text-5xl mb-8">
        <span class="text-primary">Товары</span>
      </h2>

      <!-- Мобилка: кнопка "Фильтры" -->
      <div class="lg:hidden mb-6">
        <Sheet v-model:open="showFilters">
          <SheetTrigger as-child>
            <Button variant="outline">Фильтры</Button>
          </SheetTrigger>
          <SheetContent side="left" class="w-[85%] max-w-sm">
            <FilterPanel v-model="filtersModel" :filters="filters" />
            <Button class="mt-4 w-full" @click="showFilters = false">Применить</Button>
          </SheetContent>
        </Sheet>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Десктоп: фильтры слева -->
        <div class="hidden lg:block lg:col-span-1">
          <FilterPanel v-model:modelValue="filtersModel" :filters="filters" />
        </div>

        <!-- Товары -->
        <div class="lg:col-span-3 max-h-80 grid gap-8 md:grid-cols-2 xl:grid-cols-3">
          <RouterLink
            v-for="(product, idx) in filteredFeatures"
            :key="idx"
            :to="`/products/${product.id}`"
            class="group relative bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300"
          >
            <div class="mb-6">
              <div class="inline-flex items-center justify-center rounded-xl group-hover:bg-primary transition-colors duration-300">
                <img
                  v-if="product.images?.length"
                  :src="`http://localhost:8000/storage/${product.images[0]}`"
                  class="w-80 text-primary group-hover:text-white transition-colors duration-300"
                />
              </div>
            </div>
            <div>
              <h3 class="text-lg font-semibold mb-1">{{ product.name }}</h3>
              <p class="text-muted-foreground text-sm">{{ product.description }}</p>
              <p class="font-bold mt-2 text-sm">{{ product.price }} цена</p>
              
            </div>
            <div
              class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-primary to-primary/60 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"
            />
          </RouterLink>

          <div
            v-if="filteredFeatures.length === 0"
            class="col-span-full text-center text-muted-foreground"
          >
            Ничего не найдено по заданным фильтрам.
          </div>
        </div>
      </div>
    </div>
  </section>
</template>