<script setup lang="ts">
import { Carousel, CarouselContent, CarouselItem, CarouselNext, CarouselPrevious } from '@/components/ui/carousel'
</script>

<template>
  <Carousel class="relative w-full max-w-6xl mx-auto">
    <CarouselContent>
      <CarouselItem v-for="index in 5" :key="index">
        <div class="flex items-center justify-center">
          <img
            src="https://vitamir.ru/wp-content/uploads/2024/10/wms-vts-slide-pro-1.jpg"
            alt="Carousel Slide"
            class="object-cover rounded-xl shadow-md max-h-full max-w-full"
          />
        </div>
      </CarouselItem>
    </CarouselContent>
      <CarouselPrevious
      class="absolute left-2 top-1/2 transform -translate-y-1/2 z-10 bg-white/80 backdrop-blur rounded-full shadow p-2 hover:bg-white transition"
    />
    <CarouselNext
      class="absolute right-2 top-1/2 transform -translate-y-1/2 z-10 bg-white/80 backdrop-blur rounded-full shadow p-2 hover:bg-white transition"
    />
  </Carousel>
</template>