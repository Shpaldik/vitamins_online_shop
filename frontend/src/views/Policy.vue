<template>
  <section class="min-h-screen bg-background text-foreground py-20 px-6">
    <Header />
    <RouterLink to="/"><Button class="mt-10"><CircleArrowLeft />Назад</Button></RouterLink>
    <div class="max-w-4xl mx-auto rounded-2xl bg-card shadow-xl p-8 md:p-12 lg:p-16">
      <h1 class="text-3xl md:text-4xl font-bold mb-6 text-center">Политика конфиденциальности</h1>

      <p class="text-muted-foreground mb-6">
        Настоящая Политика конфиденциальности (далее — «Политика») определяет порядок обработки и защиты персональных данных пользователей сайта
        <a href="https://doctor-dulcamara.ru" target="_blank" class="text-primary underline">https://doctor-dulcamara.ru</a>
        (далее — «Сайт»), в соответствии с требованиями Федерального закона от 27.07.2006 №152-ФЗ «О персональных данных».
      </p>

      <div class="space-y-8 text-sm md:text-base leading-relaxed">
        <div>
          <h2 class="text-xl font-semibold">1. Правовой статус и цели сайта</h2>
          <ul class="list-disc list-inside mt-2">
            <li>1.1. Сайт носит исключительно информационный характер.</li>
            <li>1.2. Информация не является публичной офертой, не заменяет медицинскую консультацию.</li>
            <li>1.3. Все сведения о добавках даны для ознакомления и образования.</li>
          </ul>
        </div>

        <div>
          <h2 class="text-xl font-semibold">2. Персональные данные, обрабатываемые на Сайте</h2>
          <p class="mt-2">Сайт может собирать следующие данные:</p>
          <ul class="list-disc list-inside">
            <li>ФИО</li>
            <li>Контактный телефон</li>
            <li>Электронная почта</li>
            <li>Адрес доставки</li>
            <li>Иные добровольно предоставленные данные</li>
          </ul>
        </div>

        <div>
          <h2 class="text-xl font-semibold">3. Цели обработки персональных данных</h2>
          <ul class="list-disc list-inside mt-2">
            <li>Оформление заказов и обратная связь</li>
            <li>Уведомления о статусе заказа</li>
            <li>Рассылка обновлений и акций (при согласии)</li>
            <li>Аналитика и UX-улучшения</li>
            <li>Соблюдение законодательства</li>
          </ul>
        </div>

        <div>
          <h2 class="text-xl font-semibold">4. Основания обработки</h2>
          <ul class="list-disc list-inside mt-2">
            <li>Добровольное согласие пользователя</li>
            <li>Исполнение запроса или договора</li>
          </ul>
        </div>

        <div>
          <h2 class="text-xl font-semibold">5. Хранение и передача данных</h2>
          <ul class="list-disc list-inside mt-2">
            <li>Данные хранятся в защищённой среде</li>
            <li>Доступ имеют только уполномоченные лица</li>
            <li>Передача возможна:</li>
            <ul class="list-disc list-inside ml-6">
              <li>логистическим компаниям — для доставки</li>
              <li>госорганам — по закону</li>
            </ul>
          </ul>
        </div>

        <div>
          <h2 class="text-xl font-semibold">6. Права пользователя</h2>
          <ul class="list-disc list-inside mt-2">
            <li>Получение информации о своих данных</li>
            <li>Требование блокировки или удаления</li>
            <li>Отзыв согласия на обработку</li>
          </ul>
        </div>

        <div>
          <h2 class="text-xl font-semibold">7. Контактная информация</h2>
          <ul class="list-none mt-2">
            <li>📧 Email: <a href="mailto:info@doctor-dulcamara.ru" class="text-primary underline">info@doctor-dulcamara.ru</a></li>
            <li>🌐 Сайт: <a href="https://doctor-dulcamara.ru" class="text-primary underline" target="_blank">doctor-dulcamara.ru</a></li>
            <li>📍 Регион: Республика Башкортостан, Россия</li>
          </ul>
          <p class="italic mt-1">Уточнение юридического адреса — по запросу</p>
        </div>

        <div>
          <h2 class="text-xl font-semibold">8. Заключительные положения</h2>
          <p class="mt-2">
            Политика вступает в силу с момента публикации. Оператор может вносить изменения без уведомления. Актуальная версия: 
            <a href="https://doctor-dulcamara.ru/policy" target="_blank" class="text-primary underline">https://doctor-dulcamara.ru/policy</a>
          </p>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import Header from '@/components/Header.vue';
import { Button } from '@/components/ui/button';

import {
  CircleArrowLeft
} from 'lucide-vue-next'
</script>

