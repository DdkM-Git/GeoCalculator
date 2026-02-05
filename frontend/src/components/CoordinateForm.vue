<script setup lang="ts">
import { ref, computed } from "vue";
import type { Coordinate } from "@/types/Coordinate";

const pointA = ref<Coordinate>({ lat: null, lng: null });
const pointB = ref<Coordinate>({ lat: null, lng: null });

const isValid = computed(() => pointA.value.lat !== null && pointA.value.lng !== null && pointB.value.lat !== null && pointB.value.lng !== null);
</script>

<template>
  <button :disabled="!isValid">Oblicz</button>
</template>
