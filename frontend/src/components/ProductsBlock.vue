<script setup lang="ts">
import { ref, onMounted, provide } from 'vue'
import axios from 'axios'
import type { Product } from '@/types/products'

const products = ref<Product[]>([])
const allProducts = ref<Product[]>([])
const showFilterModal = ref(false)

const selectedFilters = ref({
  series: '',
  category: '',
  age_group: '',
  sort: '',
})

const uniqueSeries = ref<string[]>([])
const uniqueCategories = ref<string[]>([])
const uniqueAgeGroups = ref<string[]>([])

const fetchAllProducts = async () => {
  try {
    const response = await axios.get<Product[]>('http://127.0.0.1:8000/api/products')
    allProducts.value = response.data

    uniqueSeries.value = [...new Set(response.data.map(p => p.series).filter(Boolean))]
    uniqueCategories.value = [...new Set(response.data.map(p => p.category).filter(Boolean))]
    uniqueAgeGroups.value = [...new Set(response.data.map(p => p.age_group).filter(Boolean))]
  } catch (e) {
    console.error('Ошибка при загрузке продуктов:', e)
  }
}

const applyFilters = () => {
  let filtered = [...allProducts.value]

  if (selectedFilters.value.series)
    filtered = filtered.filter(p => p.series === selectedFilters.value.series)

  if (selectedFilters.value.category)
    filtered = filtered.filter(p => p.category === selectedFilters.value.category)

  if (selectedFilters.value.age_group)
    filtered = filtered.filter(p => p.age_group === selectedFilters.value.age_group)

  if (selectedFilters.value.sort === 'asc')
    filtered.sort((a, b) => a.price - b.price)
  else if (selectedFilters.value.sort === 'desc')
    filtered.sort((a, b) => b.price - a.price)

  products.value = filtered
  showFilterModal.value = false
}

const resetFilters = () => {
  selectedFilters.value = {
    series: '',
    category: '',
    age_group: '',
    sort: '',
  }
  applyFilters()
}

onMounted(async () => {
  await fetchAllProducts()
  applyFilters()
})

// Provide для FilterPanel
provide('filters', selectedFilters)
provide('series', uniqueSeries)
provide('categories', uniqueCategories)
provide('ageGroups', uniqueAgeGroups)
</script>

<template>
  <section class="bg-white py-10 md:py-5 lg:py-10 mt-20">
    <div class=" mx-auto md:px-6 lg:px-8">
      <div class="flex items-center justify-between mb-8">
        <h2 class="text-4xl font-bold tracking-tighter sm:text-5xl">
          <span class="text-primary">Товары</span>
        </h2>
        <button
          @click="showFilterModal = true"
          class="lg:hidden bg-primary text-white px-4 py-2 rounded-md text-sm font-medium"
        >
          Фильтры
        </button>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
      <aside class="hidden lg:block lg:col-span-1 bg-gray-50 border border-gray-200 p-6 rounded-2xl shadow-sm space-y-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Фильтры</h3>

        <div class="space-y-6">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Серия</label>
            <select
              v-model="selectedFilters.series"
              class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
            >
              <option value="">Все</option>
              <option v-for="item in uniqueSeries" :key="item" :value="item">{{ item }}</option>
            </select>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Категория</label>
            <select
              v-model="selectedFilters.category"
              class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
            >
              <option value="">Все</option>
              <option v-for="item in uniqueCategories" :key="item" :value="item">{{ item }}</option>
            </select>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Возраст</label>
            <select
              v-model="selectedFilters.age_group"
              class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
            >
              <option value="">Все</option>
              <option v-for="item in uniqueAgeGroups" :key="item" :value="item">{{ item }}</option>
            </select>
          </div>

          <div>
            <label class="block bg-none text-sm font-medium text-gray-700 mb-1">Сортировка</label>
            <select
              v-model="selectedFilters.sort"
              class="w-full rounded-lg border bg-none border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
            >
              <option value="">Без сортировки</option>
              <option value="asc">Цена: по возрастанию</option>
              <option value="desc">Цена: по убыванию</option>
            </select>
          </div>
        </div>

        <div class="pt-4 border-t border-gray-200 mt-6 flex flex-col gap-3">
          <button
            @click="applyFilters"
            class="w-full bg-primary text-white font-semibold py-2 px-4 rounded-lg hover:bg-primary/90 transition"
          >
            Применить
          </button>
          <button
            @click="resetFilters"
            class="w-full text-sm text-gray-500 hover:underline"
          >
            Сбросить фильтры
          </button>
        </div>
      </aside>

        <div class="lg:col-span-3 grid gap-8 md:grid-cols-2 xl:grid-cols-3">
          <RouterLink
            v-for="product in products"
            :key="product.id"
            :to="`/products/${product.id}`"
            class="group relative max-h-75 bg-white p-6 rounded-xl shadow-sm hover:shadow-lg transition"
          >
            <img
              v-if="product.images?.length"
              :src="`http://localhost:8000/storage/${product.images[0]}`"
              alt=""
              class="w-full h-40 object-cover rounded-md mb-4"
            />
            <h3 class="text-lg font-semibold">{{ product.name }}</h3>
            <p class="text-sm text-muted-foreground">{{ product.description }}</p>
            <p class="mt-2 font-bold">{{ product.price }} тг</p>
          </RouterLink>

          <div v-if="products.length === 0" class="col-span-full text-center text-muted-foreground">
            Продукты не найдены.
          </div>
        </div>
      </div>
    </div>

    <!-- Модалка фильтров -->
    <transition name="fade">
      <div
        v-if="showFilterModal"
        class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4 lg:hidden"
      >
        <div class="bg-white rounded-lg w-full max-w-sm mx-auto p-6 relative">
          <h3 class="text-lg font-semibold mb-4">Фильтры</h3>

          <div class="space-y-4">
            <div>
              <label class="block text-sm font-medium">Серия</label>
              <select v-model="selectedFilters.series" class="mt-1 block w-full border rounded px-3 py-2">
                <option value="">Все</option>
                <option v-for="item in uniqueSeries" :key="item" :value="item">{{ item }}</option>
              </select>
            </div>

            <div>
              <label class="block text-sm font-medium">Категория</label>
              <select v-model="selectedFilters.category" class="mt-1 block w-full border rounded px-3 py-2">
                <option value="">Все</option>
                <option v-for="item in uniqueCategories" :key="item" :value="item">{{ item }}</option>
              </select>
            </div>

            <div>
              <label class="block text-sm font-medium">Возраст</label>
              <select v-model="selectedFilters.age_group" class="mt-1 block w-full border rounded px-3 py-2">
                <option value="">Все</option>
                <option v-for="item in uniqueAgeGroups" :key="item" :value="item">{{ item }}</option>
              </select>
            </div>

            <div>
              <label class="block text-sm font-medium">Сортировка</label>
              <select v-model="selectedFilters.sort" class="mt-1 block w-full border rounded px-3 py-2">
                <option value="">Без сортировки</option>
                <option value="asc">Цена: по возрастанию</option>
                <option value="desc">Цена: по убыванию</option>
              </select>
            </div>
          </div>

          <div class="mt-6 flex justify-between">
            <button @click="resetFilters" class="text-sm text-gray-500 underline">
              Сбросить
            </button>
            <button
              @click="applyFilters"
              class="bg-primary text-white px-4 py-2 rounded-md text-sm font-medium"
            >
              Применить
            </button>
          </div>

          <button
            class="absolute top-3 right-3 text-gray-400 hover:text-gray-600"
            @click="showFilterModal = false"
          >
            ✕
          </button>
        </div>
      </div>
    </transition>
  </section>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.2s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>