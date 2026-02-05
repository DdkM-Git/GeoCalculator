<template>
  <form>
    <input v-model="pointA.lat" placeholder="Lat A" />
    <input v-model="pointA.lng" placeholder="Lng A" />
    <input v-model="pointB.lat" placeholder="Lat B" />
    <input v-model="pointB.lng" placeholder="Lng B" />

    <button :disabled="!isValid">Oblicz</button>
  </form>
</template>

<script setup>
import { reactive, computed } from "vue";

const pointA = reactive({ lat: "", lng: "" });
const pointB = reactive({ lat: "", lng: "" });

const isValid = computed(() => pointA.lat && pointA.lng && pointB.lat && pointB.lng);
</script>
