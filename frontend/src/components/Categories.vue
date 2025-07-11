<script setup lang="ts">
import { Button } from '@/components/ui/button'
</script>

<template>
  <section>
    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center mb-6 sm:mb-10">
      РЕКОМЕНДОВАННЫЕ КАТЕГОРИИ
    </h1>

    <div class="w-full flex items-center bg-white">
      <div class="container mx-auto px-4 sm:px-6 md:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 lg:gap-8">
          <div class="bg-gray-300 p-6 sm:p-8 rounded-lg min-h-[150px] sm:min-h-[200px]"></div>
          <div class="bg-gray-400 p-6 sm:p-8 rounded-lg min-h-[150px] sm:min-h-[200px]"></div>
          <div class="bg-gray-400 p-6 sm:p-8 rounded-lg min-h-[150px] sm:min-h-[200px]"></div>
          <div class="bg-gray-300 p-6 sm:p-8 rounded-lg min-h-[150px] sm:min-h-[200px]"></div>
        </div>

        <div class="flex justify-center mt-6 sm:mt-10">
          <Button class="w-full sm:w-40 border-black border-2 rounded-b-3xl">
            Открыть все
          </Button>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.grid {
  grid-auto-rows: minmax(150px, auto);
}
</style>