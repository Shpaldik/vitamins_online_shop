<script setup lang="ts">
import { Card, CardHeader, CardTitle, CardContent } from '@/components/ui/card'
import { Checkbox } from '@/components/ui/checkbox'
import { Label } from '@/components/ui/label'

const modelValue = defineModel<Record<string, string[]>>() // <-- добавляем

const props = defineProps<{
  filters: Record<string, string[]>
}>()

function toggleOption(key: string, value: string, checked: boolean) {
  const current = modelValue.value?.[key] || []
  const updated = checked
    ? [...current, value]
    : current.filter((v) => v !== value)

  modelValue.value = {
    ...modelValue.value,
    [key]: updated,
  }
}
</script>

<template>
  <Card class="p-6">
    <CardHeader>
      <CardTitle class="text-lg font-semibold">Фильтры</CardTitle>
    </CardHeader>
    <CardContent class="grid gap-6 md:grid-cols-1">
      <div v-for="(options, key) in filters" :key="key" class="space-y-2">
        <h4 class="text-sm font-medium text-black">{{ key }}</h4>
        <div
          v-for="option in options"
          :key="option"
          class="flex items-center space-x-2"
        >
          <Checkbox
            :id="`${key}-${option}`"
            :checked="modelValue?.[key]?.includes(option)"
            @update:checked="toggleOption(key, option, $event)"
          />
          <Label :for="`${key}-${option}`" class="text-sm">{{ option }}</Label>
        </div>
      </div>
    </CardContent>
  </Card>
</template>