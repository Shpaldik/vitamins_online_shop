<script setup>
import {
  Boxes,
  Heart,
  ScrollText,
  Shield,
  Compass,
  CreditCard,
  Store,
  Sparkles,
  Puzzle,
  Zap,
  HelpCircle,
  DollarSign,
  Megaphone,
  Twitter,
  Instagram,
  Linkedin,
} from 'lucide-vue-next';

const sections = [
  {
    title: 'Главное',
    links: [
      { name: 'О нас', href: '#', icon: Compass },
      { name: 'Карьера', href: '#', icon: Store },
    ],
  },
  {
    title: 'Продукты',
    links: [
      { name: 'Контакты', href: '#', icon: Boxes },
      { name: 'Где купить', href: '#', icon: Heart },
    ],
  },
  {
    title: 'Социальные сети',
    links: [
      { name: 'Инстаграм', href: '#', icon: Instagram },
    ],
  },
];
</script>

<template>
  <section class="w-full" id="footer">
    <footer class="py-12 px-4">
      <div class="container mx-auto max-w-screen-xl flex flex-col justify-center gap-8">
        <div class="grid grid-cols-2 gap-8 lg:grid-cols-6">
          <div class="col-span-2 mb-8 lg:mb-0">
            <div class="flex items-center space-x-2 mb-4">
              <img
                src="https://ucarecdn.com/4927e58a-7110-4c68-ae10-6dd209af47dd/1.png"
                alt="Логотип"
                class="w-10 h-10 object-contain"
              />
              <span class="text-xl font-bold">Dr. Dulcamara</span>
            </div>
            <p class="font-bold">Улучши свое здоровье вместе с нами:)</p>
          </div>

          <div v-for="(section, sectionIdx) in sections" :key="sectionIdx">
            <h3 class="mb-4 font-bold">{{ section.title }}</h3>
            <ul class="space-y-4 text-muted-foreground">
              <li
                v-for="(link, linkIdx) in section.links"
                :key="linkIdx"
                class="font-medium hover:text-primary group"
              >
                <a :href="link.href" class="flex items-center gap-2">
                  <component :is="link.icon" class="size-4 group-hover:opacity-100 transition-opacity" />
                  {{ link.name }}
                </a>
              </li>
            </ul>
          </div>
        </div>

        <div
          class="mt-24 flex flex-col justify-between gap-4 border-t pt-8 text-sm font-medium text-muted-foreground md:flex-row md:items-center"
        >
          <p>2025 © Dr. Dulcamara. Все права защищены.</p>
          <ul class="flex gap-4">
            <li class="underline hover:text-primary">
              <a href="#" class="flex items-center gap-1">
                <ScrollText class="size-4" />
                Правила магазина
              </a>
            </li>
            <li class="underline hover:text-primary">
              <RouterLink to="/policy" class="flex items-center gap-1">
                <Shield class="size-4" />
                Политика конфиденциальности
              </RouterLink>
            </li>
          </ul>
        </div>
      </div>
    </footer>
  </section>
</template>