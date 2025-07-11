<script setup lang="ts">
import { Button } from '@/components/ui/button'
import { Card, CardContent } from '@/components/ui/card'
import {
  Tabs,
  TabsContent,
  TabsList,
  TabsTrigger,
} from "@/components/ui/tabs"

import {
  BuildingIcon,
  UsersIcon,
  GlobeIcon,
  BanknoteArrowDown,
  Store,
  ClockArrowUp,
  PackageCheck
} from 'lucide-vue-next'

interface CompanyInfo {
  name: string
  founded: string
  size: string
  location: string
  about: string
  mission: string
  vision: string
  values: {
    title: string
    description: string
    icon: any
  }[]
  culture: {
    title: string
    description: string
  }[]
  benefits: {
    title: string
    description: string
  }[]
}

const company: CompanyInfo = {
  name: "О нас",
  founded: "2015",
  size: "100+ продаж",
  location: "Находимся в Москве, Россия",
  about: "Благодаря развитию современных технологий и широкой доступности маркетплейсов, вы можете легко приобрести продукцию Dr. Dulcamara в любом городе России.",
  mission: "Дать возможность каждому человеку заботиться о своем здоровье и благополучии, предлагая высококачественные и доступные продукты.",
  vision: "Стать лидером в области онлайн-продаж товаров для здоровья и красоты, обеспечивая клиентов лучшими продуктами и сервисом.",
  values: [
    {
      title: "Мы представлены на:",
      description: "Ozon и Wildberries",
      icon: Store
    },
    {
      title: "Условия прямого заказа:",
      description: "Минимальная сумма заказа: 5000 ₽",
      icon: BanknoteArrowDown
    },
    {
      title: "География доставки:",
      description: "Работаем по всей территории России.",
      icon: PackageCheck
    }
  ],
  culture: [
    {
      title: "Чистый и проверенный состав",
      description: "Производство: Республика Башкортостан."
    },
    {
      title: "Современные технологии производства",
      description: "Форма выпуска: капсулы, таблетки, порошки."
    },
    {
      title: "Сбалансированные формулы и реальный эффект",
      description: "Контроль качества: каждый этап от сырья до упаковки."
    }
  ],
  benefits: [
    {
      title: "Натуральные решения для поддержки печени, ЖКТ и детокс-программ",
      description: "Поддержка здоровья печени, ЖКТ и детоксикация с помощью натуральных компонентов."
    },
    {
      title: "Формулы для улучшения обмена веществ, снижения веса и снятия отёков",
      description: "Активные добавки для обмена веществ, контроля веса и снятия отёков."
    },
    {
      title: "Добавки для сосудов, сердца, нервной системы и иммунитета",
      description: "Поддержка сосудов, сердца, нервной системы и иммунитета с помощью эффективных добавок."
    }
  ]
}
</script>

<template>
  <section class="w-full bg-white">
    <div class="container mx-auto px-4">
      <!-- Company Header -->
      <div class="text-center mb-12">
        <h1 class="text-4xl font-bold mb-4">{{ company.name }}</h1>
        <div class="flex justify-center items-center gap-6 text-gray-600 mb-6">
          <div class="flex items-center">
            <BuildingIcon class="h-5 w-5 mr-2" />
            <span>Создан в {{ company.founded }}</span>
          </div>
          <div class="flex items-center">
            <UsersIcon class="h-5 w-5 mr-2" />
            <span>{{ company.size }}</span>
          </div>
          <div class="flex items-center">
            <GlobeIcon class="h-5 w-5 mr-2" />
            <span>{{ company.location }}</span>
          </div>
        </div>
        <p class="text-gray-600 max-w-3xl mx-auto">
          {{ company.about }}
        </p>
      </div>

      <!-- Company Details Tabs -->
      <Tabs defaultValue="mission" class="w-full">
        <TabsList class="grid w-full grid-cols-3">
          <TabsTrigger value="mission">Миссия</TabsTrigger>
          <TabsTrigger value="values">Особенности</TabsTrigger>
          <TabsTrigger value="culture">Выгода</TabsTrigger>
        </TabsList>

        <!-- Mission & Vision Tab -->
        <TabsContent value="mission">
          <Card>
            <CardContent class="p-6">
              <div class="grid md:grid-cols-2 gap-8">
                <div>
                  <h3 class="text-2xl font-bold mb-4">Наша миссия</h3>
                  <p class="text-gray-600">{{ company.mission }}</p>
                </div>
                <div>
                  <h3 class="text-2xl font-bold mb-4">Наш взгляд</h3>
                  <p class="text-gray-600">{{ company.vision }}</p>
                </div>
              </div>
            </CardContent>
          </Card>
        </TabsContent>

        <!-- Values Tab -->
        <TabsContent value="values">
          <Card>
            <CardContent class="p-6">
              <div class="grid md:grid-cols-3 gap-6">
                <div v-for="value in company.values" :key="value.title" class="text-center p-6">
                  <component :is="value.icon" class="h-12 w-12 mx-auto mb-4 text-primary" />
                  <h3 class="text-xl font-bold mb-2">{{ value.title }}</h3>
                  <p class="text-gray-600">{{ value.description }}</p>
                </div>
              </div>
            </CardContent>
          </Card>
        </TabsContent>

        <!-- Culture & Benefits Tab -->
        <TabsContent value="culture">
          <Card>
            <CardContent class="p-6">
              <div class="grid md:grid-cols-2 gap-8">
                <div>
                  <h3 class="text-2xl font-bold mb-6">Что отличает нашу продукцию:</h3>
                  <div class="space-y-6">
                    <div v-for="item in company.culture" :key="item.title" class="border-l-4 border-primary pl-4">
                      <h4 class="text-lg font-bold mb-2">{{ item.title }}</h4>
                      <p class="text-gray-600">{{ item.description }}</p>
                    </div>
                  </div>
                </div>
                <div>
                  <h3 class="text-2xl font-bold mb-6">Что мы предлагаем:</h3>
                  <div class="space-y-6">
                    <div v-for="benefit in company.benefits" :key="benefit.title"
                      class="border-l-4 border-primary pl-4">
                      <h4 class="text-lg font-bold mb-2">{{ benefit.title }}</h4>
                      <p class="text-gray-600">{{ benefit.description }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </CardContent>
          </Card>
        </TabsContent>
      </Tabs>

      <!-- Action Buttons -->
      <div class="flex justify-center gap-4 mt-8">
        <Button size="lg">Демо текст</Button>
        <Button variant="outline" size="lg">Демо текст</Button>
      </div>
    </div>
  </section>
</template>
