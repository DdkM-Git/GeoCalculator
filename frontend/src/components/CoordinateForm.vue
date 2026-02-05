<template>
  <form @submit.prevent="submit">
    <CoordinateInput v-model:lat="pointA.lat" v-model:lng="pointA.lng" />

    <CoordinateInput v-model:lat="pointB.lat" v-model:lng="pointB.lng" />

    <button type="submit" :disabled="!isValid">Oblicz</button>
  </form>
</template>

<script lang="ts" setup>
import { ref, computed } from "vue";
import CoordinateInput from "./CoordinateInput.vue";
import type { Coordinate } from "@/types/Coordinate";

const pointA = ref<Coordinate>({ lat: null, lng: null });
const pointB = ref<Coordinate>({ lat: null, lng: null });

const isValid = computed(() => pointA.value.lat !== null && pointA.value.lng !== null && pointB.value.lat !== null && pointB.value.lng !== null);

function submit() {
  console.log("Submitting", pointA.value, pointB.value);
}
</script>
