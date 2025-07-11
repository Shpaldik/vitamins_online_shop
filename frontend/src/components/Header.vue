<script setup lang="ts">
import { ref } from 'vue'
import { Menu, X } from 'lucide-vue-next'
import { Button } from '@/components/ui/button'
import { useRoute } from 'vue-router'

const isOpen = ref(false)
const route = useRoute()

const navigation = [
  { name: 'Главная', url: '/' },
  { name: 'Продукция', url: '/products' },
  { name: 'Категорий', href: 'categories' },
  { name: 'Популярное', href: 'popular'},
  { name: 'О нас', href: '#about_us'},
  { name: 'Контакты', href: '#footer'},
]
</script>

<template>
  <header class="fixed top-0 inset-x-0 z-50 bg-white/80 backdrop-blur border-b border-gray-200">
    <div class="container mx-auto px-4 md:px-6 lg:px-8">
      <nav class="flex items-center justify-between h-20">
        <!-- Logo -->
        <div class="flex items-center gap-3">
          <img
            src="https://ucarecdn.com/4927e58a-7110-4c68-ae10-6dd209af47dd/1.png"
            alt="Логотип"
            class="w-15 h-15 object-contain"
          />
          <span class="text-xl font-semibold tracking-tight text-gray-800">
            Dr. Dulcamara
          </span>
        </div>

        <div class="hidden md:flex items-center gap-8">
          <component
            v-for="item in navigation"
            :is="item.href ? 'a' : 'router-link'"
            v-show="!(item.url === '/' && route.path === '/')"
            :name="item.name"
            :key="item.name"
            :href="item.href"
            :to="item.url"
            class="text-gray-700 hover:text-black transition font-medium cursor-pointer"
          >
          {{ item.name }}

          </component>
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden">
          <Button
            variant="ghost"
            size="icon"
            class="rounded-full"
            @click="isOpen = !isOpen"
          >
            <Menu v-if="!isOpen" class="w-6 h-6 text-gray-700" />
            <X v-else class="w-6 h-6 text-gray-700" />
          </Button>
        </div>
      </nav>
    </div>

    <transition name="fade">
      <div
        v-if="isOpen"
        class="md:hidden bg-white shadow-md border-t border-gray-200"
      >
        <div class="flex flex-col space-y-4 p-6">
          <component
            v-for="item in navigation"
            :is="item.href ? 'a' : 'router-link'"
            v-show="!(item.url === '/' && route.path === '/')"
            :name="item.name"
            :href="item.href"
            :to="item.url"
            class="text-gray-700 hover:text-black transition font-medium cursor-pointer"
          >
          {{ item.name }}
          </component>
        </div>
      </div>
    </transition>
  </header>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: all 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
  transform: translateY(-10px);
}
</style>