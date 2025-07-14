<script setup lang="ts">
import { Card, CardHeader, CardTitle, CardContent } from '@/components/ui/card'
import { Checkbox } from '@/components/ui/checkbox'
import { Label } from '@/components/ui/label'

const props = defineProps<{
  modelValue: Record<string, string[]>
  filters: Record<string, string[]>
}>()

const emit = defineEmits<{
  (e: 'update:modelValue', value: Record<string, string[]>): void
}>()

function toggleOption(key: string, value: string, checked: boolean) {
  console.log('toggleOption called', { key, value, checked })
  const current = props.modelValue[key] || []
  const updated = checked
    ? [...current, value]
    : current.filter((v) => v !== value)

  emit('update:modelValue', {
    ...props.modelValue,
    [key]: updated,
  })
}
</script>

<template>
  <Card class="p-6">
    <CardHeader>
      <CardTitle class="text-lg font-semibold">Фильтры</CardTitle>
    </CardHeader>
    <CardContent class="grid gap-6 md:grid-cols-1">
      <div v-for="(options, key) in filters" :key="key" class="space-y-2">
        <h4 class="text-sm font-medium text-black capitalize">{{ key }}</h4>
        <div
          v-for="option in options"
          :key="option"
          class="flex items-center space-x-2"
        >
          <Checkbox
            :id="`${key}-${option}`"
            :checked="modelValue[key]?.includes(option)"
            @change="toggleOption(key, option, $event)"
          />
          <Label :for="`${key}-${option}`" class="text-sm">{{ option }}</Label>
        </div>
      </div>
    </CardContent>
  </Card>
</template>