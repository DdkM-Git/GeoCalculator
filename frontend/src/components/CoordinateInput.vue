<template>
  <div>
    <input type="number" :value="lat" @input="$emit('update:lat', +$event.target.value)" placeholder="Latitude" />
    <input type="number" :value="lng" @input="$emit('update:lng', +$event.target.value)" placeholder="Longitude" />
  </div>
</template>

<script lang="ts" setup>
defineProps<{
  lat: number | null;
  lng: number | null;
}>();

defineEmits(["update:lat", "update:lng"]);
</script>
