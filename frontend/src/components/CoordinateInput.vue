<script setup lang="ts">
defineProps<{
  lat: number | null;
  lng: number | null;
}>();

defineEmits(["update:lat", "update:lng"]);
</script>

<template>
  <input type="number" @input="$emit('update:lat', +($event.target as HTMLInputElement).value)" />
  <input type="number" @input="$emit('update:lng', +($event.target as HTMLInputElement).value)" />
</template>
